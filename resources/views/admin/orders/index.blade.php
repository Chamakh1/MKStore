<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin dashboard</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('dashassets/img/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('dashassets/img/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('dashassets/img/favicons/favicon-16x16.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dashassets/img/favicons/favicon.ico')}}">
    <link rel="manifest" href="{{asset('dashassets/img/favicons/site.webmanifest')}}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{asset('dashassets/css/phoenix.min.css')}}" rel="stylesheet" id="style-default">
    <link href="{{asset('dashassets/css/user.min.css')}}" rel="stylesheet" id="user-style-default">
    <style>
      body {
        opacity: 0;
      }
      .error-text-small {
        font-size: 12px;
        color: #dc3545; /* Rouge Bootstrap */
        margin-top: 0.25rem;
      }
    </style>
    
</head>
<body>
   
    <main class="main" id="top">
      <div class="container-fluid px-0">
      <!-- Sidebar -->
      @include('includes.admin.sidebar')
      <!-- End Sidebar -->

        <!--Navigation Bar -->
            @include('includes.admin.nav')
        <!--Navigation Bar -->

        <div class="content">

            <!-- Title and Actions -->
            <div class="row justify-content-between align-items-center mb-4">
              <div class="col-auto">
                <h1 class="mb-0">Orders</h1>
              </div>
              <div class="col-auto">
                <div class="btn-toolbar d-flex align-items-center gap-2">

                  <!-- Bouton Add Category -->
                  <div class="btn-group" role="group">
                    <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <span class="fas fa-plus me-1"></span>Add Order
                    </button>
                  </div>

                  <!-- Bouton Filter -->
                  <div class="btn-group" role="group">
                    <button class="btn btn-outline-dark" type="button" id="toggleFilter">
                      <span class="fas fa-filter me-1"></span>Filter
                    </button>
                  </div>

                  <!-- Formulaire Search masqué/affiché dynamiquement -->
                  <div id="filterForm" style="display: none;">
                    <form action="{{ url('/admin/orders') }}" method="GET" class="d-flex align-items-center gap-2">
                      <input
                        type="text"
                        name="search"
                        class="form-control w-auto"
                        placeholder="Search by category name"
                        value="{{ request()->get('search') }}"
                      >
                      <button type="submit" class="btn btn-dark btn-sm rounded-pill">Search</button>
                      <a href="{{ url('/admin/orders') }}" class="btn btn-outline-secondary btn-sm rounded-pill">Reset</a>
                    </form>
                  </div>

                </div>
              </div>
            </div>

<div class="table-responsive mx-n1 px-1 scrollbar">
  <table class="table fs--1 mb-0">
    <thead>
      <tr>
        <th class="white-space-nowrap fs--1 border-top ps-0 align-middle">
          <div class="form-check mb-0 fs-0"><input class="form-check-input" type="checkbox"></div>
        </th>
        <th class="sort border-top white-space-nowrap align-middle" scope="col"></th>
        <th class="sort border-top white-space-nowrap align-middle" scope="col" style="min-width:360px;" data-sort="product">PRODUCTS</th>
        <th class="sort border-top align-middle" scope="col" data-sort="customer" style="min-width:200px;">CUSTOMER</th>
        <th class="sort border-top align-middle" scope="col" data-sort="customer" style="min-width:200px;">PHONE</th>
        <th class="sort border-top text-start ps-5 align-middle" scope="col" data-sort="status">STATUS</th>
        <th class="sort border-top text-start ps-5 align-middle" scope="col" data-sort="total_price">TOTAL PRICE</th>
        <th class="sort border-top text-end align-middle" scope="col" data-sort="time">TIME</th>
        <th class="sort border-top text-end pe-0 align-middle" scope="col">ACTION</th>
      </tr>
    </thead>
    <tbody class="list" id="table-orders-body">

      @foreach($orders as $order)
        @php
            // Classe du badge status
            $statusClass = match($order->status) {
                'pending' => 'badge-light-warning',
                'preparing' => 'badge-light-info',
                'delivered' => 'badge-light-success',
                'canceled' => 'badge-light-danger',
                default => 'badge-light-secondary',
            };
        @endphp
        <tr class="hover-actions-trigger btn-reveal-trigger position-static">

          <td class="fs--1 align-middle ps-0">
            <div class="form-check mb-0 fs-0">
              <input class="form-check-input" type="checkbox" name="order_ids[]" value="{{ $order->id }}">
            </div>
          </td>

          <td class="align-middle product white-space-nowrap py-0">
            @php
              $firstItem = $order->items->first();
              $imagePath = $firstItem && $firstItem->product && $firstItem->product->image
                ? asset('uploads/' . $firstItem->product->image)
                : asset('dashassets/img/products/default.png');
            @endphp
            <img src="{{ $imagePath }}" alt="" width="53">
          </td>

          <td class="align-middle product white-space-nowrap">
            <h6 class="fw-semi-bold mb-0">
              @foreach($order->items as $item)
                {{ $item->product->name ?? 'Unknown product' }} (x{{ $item->quantity }})@if(!$loop->last), @endif
              @endforeach
            </h6>
          </td>

          <td class="align-middle customer white-space-nowrap">
              <div class="d-flex align-items-center">
                  <div class="avatar avatar-l">
                      <div class="avatar-name rounded-circle">
                          <span>{{ strtoupper(substr($order->name ?? 'U', 0, 1)) }}</span>
                      </div>
                  </div>
                  <h6 class="mb-0 ms-3 text-900">{{ $order->name ?? 'Unknown user' }}</h6>
              </div>
          </td>
          <td class="align-middle customer white-space-nowrap">
              <div class="d-flex align-items-center">
                  
                  <h6 class="mb-0 ms-3 text-900">{{ $order->phone ?? 'Unknown phone' }}</h6>
              </div>
          </td>
          <!-- Colonne STATUS avec dropdown -->
          <td class="align-middle text-start ps-5 status">
            <div class="dropdown">
              <button class="btn btn-sm fs--1 dropdown-toggle {{ $statusClass }}" type="button" id="dropdownStatus{{ $order->id }}" data-bs-toggle="dropdown" aria-expanded="false" style="min-width:110px;">
                  {{ ucfirst($order->status) }}
                  @if($order->status === 'delivered') <span class="ms-1 fas fa-check"></span> @endif
                  @if($order->status === 'pending') <span class="ms-1 fas fa-stopwatch"></span> @endif
                  @if($order->status === 'canceled') <span class="ms-1 fas fa-times"></span> @endif
                  @if($order->status === 'preparing') <span class="ms-1 fas fa-cogs"></span> @endif
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownStatus{{ $order->id }}">
                  @foreach(['pending','preparing','delivered','canceled'] as $status)
                      @if($status !== $order->status)
                          <li>
                              <a href="#" class="dropdown-item update-status-link" 
                                 data-order-id="{{ $order->id }}" 
                                 data-status="{{ $status }}">
                                 {{ ucfirst($status) }}
                              </a>
                          </li>
                      @endif
                  @endforeach
              </ul>
            </div>
          </td>

          <!-- Colonne TOTAL PRICE -->
          <td class="align-middle text-start ps-5 fw-bold">
              {{ number_format($order->total, 2) }} dt
          </td>

          <td class="align-middle text-end time white-space-nowrap">
            <div class="hover-hide">
              <h6 class="text-1000 mb-0">{{ $order->created_at->diffForHumans() }}</h6>
            </div>
          </td>

          <!-- Colonne ACTION -->
          <td class="align-middle white-space-nowrap text-end ml-5 mb-10">
            <div class="position-relative">
                <div class="hover-actions">
                    <a href="/admin/orders/show/{{$order->id}}" class="btn btn-sm btn-phoenix-secondary me-1 fs--2" title="View">
                        <span class="fas fa-eye"></span>
                    </a>
                    <form action="/admin/orders/delete/{{ $order->id }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$order->id}}" data-name="Order #{{ $order->id }}">
                            <span class="fas fa-trash"></span>
                        </button>
                    </form>
                </div>
            </div>
          </td>

        </tr>
      @endforeach

    </tbody>
  </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        <p class="mb-0 fs--1">
            Showing {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} items
        </p>
    </div>
    <div>
        {{ $orders->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</div>



         
    </main>

    


      <!-- Modal de confirmation de suppression -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header text-white  rounded-top-4">
              <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-center mb-0">Are you sure you want to delete <strong id="deleteOrderName"></strong>?</p>
            </div>
            <div class="modal-footer bg-body-tertiary border-top-0 rounded-bottom-4">
              <form id="deleteForm" action="" method="POST" class="d-inline">
                @csrf
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger rounded-pill">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>

<script>
  // Enable/disable quantity input when product checkbox toggled
  document.addEventListener('DOMContentLoaded', function () {
    const productsList = document.getElementById('products-list');
    productsList.querySelectorAll('input[type="checkbox"]').forEach(function(checkbox) {
      checkbox.addEventListener('change', function() {
        const qtyInput = this.parentElement.querySelector('input[type="number"]');
        if (this.checked) {
          qtyInput.removeAttribute('disabled');
          qtyInput.value = qtyInput.value || 1;
        } else {
          qtyInput.setAttribute('disabled', 'disabled');
          qtyInput.value = '';
        }
      });
    });
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.update-status-link').forEach(function(link) {
    link.addEventListener('click', function(event) {
      event.preventDefault();
      const orderId = this.dataset.orderId;
      const status = this.dataset.status;
      const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

      // Création du formulaire caché
      const form = document.createElement('form');
      form.method = 'POST';
      form.action = `/admin/orders/${orderId}/update-status`;

      // CSRF token
      const csrfInput = document.createElement('input');
      csrfInput.type = 'hidden';
      csrfInput.name = '_token';
      csrfInput.value = csrfToken;
      form.appendChild(csrfInput);

      // Method spoofing PATCH
      const methodInput = document.createElement('input');
      methodInput.type = 'hidden';
      methodInput.name = '_method';
      methodInput.value = 'PATCH';
      form.appendChild(methodInput);

      // Status input
      const statusInput = document.createElement('input');
      statusInput.type = 'hidden';
      statusInput.name = 'status';
      statusInput.value = status;
      form.appendChild(statusInput);

      document.body.appendChild(form);
      form.submit();
    });
  });
});
</script>



    <script>
    const deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      const OrderId = button.getAttribute('data-id');
      const OrderName = button.getAttribute('data-name');

      const deleteForm = document.getElementById('deleteForm');
      const deleteOrderName = document.getElementById('deleteOrderName');

      // Mise à jour du nom dans le texte
      deleteOrderName.textContent = OrderName;

      // Mise à jour de l'action du formulaire
      deleteForm.action = `/admin/orders/delete/${OrderId}`;
    });
  </script>


  </body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script src="{{asset('dashassets/js/phoenix.js')}}"></script>
    <script src="{{asset('dashassets/js/ecommerce-dashboard.js')}}"></script>
    <script src="{{asset('dashassets/js/phoenix.js')}}"></script>
<script src="{{asset('dashassets/js/ecommerce-dashboard.js')}}"></script>

</html>
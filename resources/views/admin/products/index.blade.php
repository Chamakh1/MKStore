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
                <h1 class="mb-0">Products</h1>
              </div>
              <div class="col-auto">
                <div class="btn-toolbar d-flex align-items-center gap-2">

                  <!-- Bouton Add Category -->
                  <div class="btn-group" role="group">
                    <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <span class="fas fa-plus me-1"></span>Add Product
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
                    <form action="{{ url('/admin/products') }}" method="GET" class="d-flex align-items-center gap-2">
                      <input
                        type="text"
                        name="search"
                        class="form-control w-auto"
                        placeholder="Search by category name"
                        value="{{ request()->get('search') }}"
                      >
                      <button type="submit" class="btn btn-dark btn-sm rounded-pill">Search</button>
                      <a href="{{ url('/admin/products') }}" class="btn btn-outline-secondary btn-sm rounded-pill">Reset</a>
                    </form>
                  </div>

                </div>
              </div>
            </div>


                <!-- Table -->
                <div id="tableExample" data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered fs--1 w-100">
                      <thead class="bg-light text-dark">
                        <tr>
                          <th class="sort" data-sort="id">Id</th>
                          <th class="sort" data-sort="name">Product Name</th>
                          <th class="sort" data-sort="description">Product Description</th>
                          <th class="sort" data-sort="price">Price</th>
                          <th class="sort" data-sort="quantity">quantity</th>
                          <th class="sort" data-sort="image">Image</th>
                          <th class="sort" data-sort="age">Actions</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        
                          
                        @foreach ($products as $index=>$p )
                          
                        
                        <tr>
                          <td class="id">{{ $index }}</td>
                          <td class="name">{{ $p->name }}</td>
                          <td class="description">{{ $p->description }}</td>
                          <td class="price">{{ $p->price }} dt</td>
                          <td class="quantity">{{ $p->quantity }}</td>
                          <td>
                            
                            @if($p->image)
                              <img src="{{ asset('uploads/' . $p->image) }}" alt="{{ $p->name }}" class="img-fluid" style="max-width: 100px; max-height: 100px;">
                            @else
                              <span class="text-muted">No Image</span>
                            @endif
                          </td>
                          <td class="action">
                            <div class="btn-group" role="group">
                              
                              <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $p->id }}">Edit</button>
                              <form action="/admin/product/delete/{{$p->id}}" method="POST" style="display:inline;">
                                @csrf
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $p->id }}" data-name="{{ $p->name }}">
                                      Delete
                                </button>
                              </form>
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
                        Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} items
                      </p>
                    </div>
                    <div>
                    <div>
                      {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
                    </div>

                    </div>
                  </div>
                </div>
            

                    
        
          <footer class="footer">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-900">Thank you for Choosing us<span class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none">2025 &copy; </p>
              </div>

            </div>
          </footer>
        </div>
      
    </main>

<!-- Modal: Add product -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow rounded-4">

      <!-- Header -->
      <div class="modal-header text-white rounded-top-4">
        <h5 class="modal-title" id="exampleModalLabel">Add a Product</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body + Form -->
      <form id="addProductForm" method="POST" action="/admin/products/create" enctype="multipart/form-data">
        @csrf
        <div class="modal-body bg-body-tertiary px-4">
          <div class="mb-3">
            <label for="addProductForm" class="form-label text-dark">Product Name</label>
            <input name="name" type="text" class="form-control rounded-pill border-dark-subtle" id="categoryName" placeholder="e.g. Facial care" required>
            @error('name')
            <div class="text-danger mt-1 small" style="font-size: 5px;">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="categoryDescription" class="form-label text-dark">Description</label>
            <textarea name="description" class="form-control rounded-3 border-dark-subtle" id="categoryDescription" rows="3" placeholder="Describe the product..."></textarea>
            @error('description')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="addProductForm" class="form-label text-dark"> Price</label>
            <input name="price" type="number" step="0.01"  class="form-control rounded-pill border-dark-subtle" id="categoryName" placeholder="e.g. 150" required>
            @error('price')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
            <div class="mb-3">
            <label for="addProductForm" class="form-label text-dark"> Quantity</label>
            <input name="quantity" type="number" class="form-control rounded-pill border-dark-subtle" id="categoryName" placeholder="e.g. 50" required>
            @error('quantity')
            <div class="text-danger mt-2">{{ $message }}</div> 
            @enderror   
          </div>
          <div class="mb-3">
          <label for="category_id" class="form-label text-dark">Category</label>
          <select name="category_id" id="category_id" class="form-control rounded-pill border-dark-subtle" required>
            <option value="">-- Select a category --</option>
            @foreach($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
          @error('category_id')
            <div class="text-danger mt-2">{{ $message }}</div>
          @enderror
        </div>

          <div class="mb-3">
            <label for="addProductForm" class="form-label text-dark"> Photo</label>
            <input name="image" type="file" class="form-control rounded-pill border-dark-subtle" id="categoryName" placeholder="upload a product photo " required>
            @error('image')  
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <!-- Footer -->
        <div class="modal-footer bg-body-tertiary border-top-0 rounded-bottom-4 px-4">
          <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-sm btn-dark rounded-pill">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


      <!-- Modal de confirmation de suppression -->
      <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content border-0 shadow rounded-4">
            <div class="modal-header text-white  rounded-top-4">
              <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="text-center mb-0">Are you sure you want to delete <strong id="deleteProductName"></strong>?</p>
            </div>
            <div class="modal-footer bg-body-tertiary border-top-0 rounded-bottom-4">
              <form id="deleteForm"  method="POST">
                @csrf
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger rounded-pill">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal: Edit Category -->  
@foreach ($products as $index => $p)
    <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $p->id }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">

          <!-- Header -->
          <div class="modal-header text-white rounded-top-4">
            <h5 class="modal-title" id="exampleModalLabel{{ $p->id }}">Edit {{ $p->name }} </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Body -->
          <div class="modal-body bg-body-tertiary px-4">
          <div class="modal-body text-center">
              @if($p->image)
                <img src="{{ asset('uploads/' . $p->image) }}" alt="{{ $p->name }}" class="img-fluid" style="max-width: 100px; max-height: 100px;">
              @else
                <span class="text-muted">No Image</span>
              @endif
          </div>
            <form action="/admin/product/update" method="POST" id="categoryForm{{ $p->id }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <label for="categoryName{{ $p->id }}" class="form-label text-dark">Product Name</label>
                <input
                  name="name"
                  type="text"
                  class="form-control rounded-pill border-dark-subtle"
                  id="categoryName{{ $p->id }}"
                  placeholder="e.g. Facial care"
                  required
                  value="{{ $p->name }}">
                
              @error('name')
              <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
              </div>
            
              <div class="mb-3">
                <label for="categoryDescription{{ $p->id }}" class="form-label text-dark">Description</label>
                <textarea
                  name="description"
                  class="form-control rounded-3 border-dark-subtle"
                  id="categoryDescription{{ $p->id }}"
                  rows="3"
                  placeholder="Describe the category..."
                >{{ $p->description }}</textarea>
                
              @error('description')
              <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
              </div>

              <div class="mb-3">
                <label for="categoryDescription{{ $p->id }}" class="form-label text-dark">Price</label>
                <input
                  type="number"
                  name="price"
                  class="form-control rounded-3 border-dark-subtle"
                  id="categoryDescription{{ $p->id }}"
                  rows="3"
                  placeholder="e.g. 150"
                  step="0.01"
                 value={{ $p->price }}>
                
              @error('price')
              <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
              </div>

              <div class="mb-3">
                <label for="categoryDescription{{ $p->id }}" class="form-label text-dark">Quantity</label>
                <input
                  type="number"
                  name="quantity"
                  class="form-control rounded-3 border-dark-subtle"
                  id="categoryDescription{{ $p->id }}"
                  rows="3"
                  placeholder="e.g. 50"
                  
                value={{ $p->quantity }}>
                
              @error('quantity')
              <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
              </div>
              </div>
          <div class="mb-3">
            <label for="addProductForm" class="form-label text-dark"> Photo</label>
            <input name="image" type="file" class="form-control rounded-pill border-dark-subtle" id="categoryName" placeholder="upload a product photo " >
            @error('image')  
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div> 


              <input type="hidden" name="id_product" value="{{ $p->id }}">

              <!-- Footer -->
              <div class="modal-footer bg-body-tertiary border-top-0 rounded-bottom-4 px-4">
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-dark rounded-pill">Save</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    @endforeach
 
 
    
 
        
    <script src="{{asset('dashassets/js/phoenix.js')}}"></script>
    <script src="{{asset('dashassets/js/ecommerce-dashboard.js')}}"></script>
    <script>
      @if ($errors->any())
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
      @endif
    </script>
<script>
  const deleteModal = document.getElementById('deleteModal');
  deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget; // bouton qui a déclenché la modal
    const productId = button.getAttribute('data-id');
    const productName = button.getAttribute('data-name');

    const deleteForm = document.getElementById('deleteForm');
    const deleteProductName = document.getElementById('deleteProductName');

    // Mise à jour du nom du produit dans la modal
    deleteProductName.textContent = productName;

    // Mise à jour de l'URL d'action du formulaire de suppression
    deleteForm.action = `/admin/product/delete/${productId}`;
  });
</script>

  <script>
  document.getElementById('toggleFilter').addEventListener('click', function () {
    const filterForm = document.getElementById('filterForm');
    filterForm.style.display = filterForm.style.display === 'none' ? 'block' : 'none';
  });
</script>

  


  </body>

</html>
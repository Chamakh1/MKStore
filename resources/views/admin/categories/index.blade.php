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
    </style>
</head>
<body>
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
                <h1 class="mb-0">Categories</h1>
              </div>
              <div class="col-auto">
                <div class="btn-toolbar d-flex align-items-center gap-2">

                  <!-- Bouton Add Category -->
                  <div class="btn-group" role="group">
                    <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      <span class="fas fa-plus me-1"></span>Add Category
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
                    <form action="{{ url('/admin/categories') }}" method="GET" class="d-flex align-items-center gap-2">
                      <input
                        type="text"
                        name="search"
                        class="form-control w-auto"
                        placeholder="Search by category name"
                        value="{{ request()->get('search') }}"
                      >
                      <button type="submit" class="btn btn-dark btn-sm rounded-pill">Search</button>
                      <a href="{{ url('/admin/categories') }}" class="btn btn-outline-secondary btn-sm rounded-pill">Reset</a>
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
                          <th class="sort" data-sort="name">Id</th>
                          <th class="sort" data-sort="name">Category Name</th>
                          <th class="sort" data-sort="email">Category Description</th>
                          <th class="sort" data-sort="age">Actions</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @foreach ($categories as $index => $c)
                          
                        
                        <tr>
                          <td class="id">{{$index}}</td>
                          <td class="name">{{$c->name}}</td>
                          <td class="name">{{$c->description}}</td>
                          <td class="action">
                            <div class="btn-group" role="group">
                              
                              <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#editModal{{ $c->id }}">Edit</button>
                              <form action="/admin/categories/delete/{{$c->id}}" method="POST" style="display:inline;">
                                @csrf
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$c->id}}" data-name="{{$c->name}}">
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
                        Showing {{ $categories->firstItem() }} to {{ $categories->lastItem() }} of {{ $categories->total() }} items
                      </p>
                    </div>
                    <div>
                      <div>
                      {{ $categories->appends(request()->query())->links('pagination::bootstrap-5') }}
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

   <!-- Modal: Add Category -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow rounded-4">

      <!-- Header -->
      <div class="modal-header text-white rounded-top-4">
        <h5 class="modal-title" id="exampleModalLabel">Add a Category</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body + Form -->
      <form id="categoryForm" method="POST" action="/admin/categories/create">
        @csrf
        <div class="modal-body bg-body-tertiary px-4">
          <div class="mb-3">
            <label for="categoryName" class="form-label text-dark">Category Name</label>
            <input name="name" type="text" class="form-control rounded-pill border-dark-subtle" id="categoryName" placeholder="e.g. Facial care" required>
            @error('name')
            <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="categoryDescription" class="form-label text-dark">Description</label>
            <textarea name="description" class="form-control rounded-3 border-dark-subtle" id="categoryDescription" rows="3" placeholder="Describe the category..."></textarea>
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
              <p class="text-center mb-0">Are you sure you want to delete <strong id="deleteCategoryName"></strong>?</p>
            </div>
            <div class="modal-footer bg-body-tertiary border-top-0 rounded-bottom-4">
              <form id="deleteForm" method="POST">
                @csrf
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-sm btn-danger rounded-pill">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <!-- Modal: Edit Category -->  

    @foreach ($categories as $index => $c)
    <div class="modal fade" id="editModal{{ $c->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $c->id }}" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow rounded-4">

          <!-- Header -->
          <div class="modal-header text-white rounded-top-4">
            <h5 class="modal-title" id="exampleModalLabel{{ $c->id }}">Edit {{ $c->name }} Category</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Body -->
          <div class="modal-body bg-body-tertiary px-4">
            <form action="/admin/categories/update" method="POST" id="categoryForm{{ $c->id }}">
              @csrf
              <div class="mb-3">
                <label for="categoryName{{ $c->id }}" class="form-label text-dark">Category Name</label>
                <input
                  name="name"
                  type="text"
                  class="form-control rounded-pill border-dark-subtle"
                  id="categoryName{{ $c->id }}"
                  placeholder="e.g. Facial care"
                  required
                  value="{{ $c->name }}"
                >
              </div>

              <div class="mb-3">
                <label for="categoryDescription{{ $c->id }}" class="form-label text-dark">Description</label>
                <textarea
                  name="description"
                  class="form-control rounded-3 border-dark-subtle"
                  id="categoryDescription{{ $c->id }}"
                  rows="3"
                  placeholder="Describe the category..."
                >{{ $c->description }}</textarea>
              </div>

              @error('name')
              <div class="text-danger mt-2">{{ $message }}</div>
              @enderror

              <input type="hidden" name="id_category" value="{{ $c->id }}">

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
      const button = event.relatedTarget;
      const categoryId = button.getAttribute('data-id');
      const categoryName = button.getAttribute('data-name');

      const deleteForm = document.getElementById('deleteForm');
      const deleteCategoryName = document.getElementById('deleteCategoryName');

      // Mise à jour du nom dans le texte
      deleteCategoryName.textContent = categoryName;

      // Mise à jour de l'action du formulaire
      deleteForm.action = `/admin/categories/delete/${categoryId}`;
    });
  </script>
  <script>
  document.getElementById('toggleFilter').addEventListener('click', function () {
    const filterForm = document.getElementById('filterForm');
    filterForm.style.display = filterForm.style.display === 'none' ? 'block' : 'none';
  });
</script>

  


  </body>
</body>
</html>
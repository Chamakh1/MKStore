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
      /* Cache le logo si la fenêtre est inférieure à 1000px de large */
@media (max-width: 1000px) {
  .logoimg {
    display: none !important;
  }
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
          <div class="pb-5">
            <div class="row g-5">
              <div class="col-12 col-xxl-6">
                <div class="mb-8">
                  @include('includes.flash-message')
                  <h2 class="mb-2">Admin Edit Profile</h2>
                  
                </div>

                <div class="card">
                    <form class="card-body" method="POST" action="/admin/update-profile">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $u->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $u->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="new password..." >
                        </div>
                        <button type="submit" class="btn btn border ">Update Profile</button>
                    </form>
                    
                </div>







 
          <footer class="footer">
            <div class="row g-0 justify-content-between align-items-center h-100 mb-3">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-900">Thank you for choosing us<span class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none">2025 &copy; </p>
              </div>
              <div class="col-12 col-sm-auto text-center">
               
              </div>
            </div>
          </footer>
        </div>
      </div>
    </main>
    <script src="{{asset('dashassets/js/phoenix.js')}}"></script>
    <script src="{{asset('dashassets/js/ecommerce-dashboard.js')}}"></script>
  </body>

</html>
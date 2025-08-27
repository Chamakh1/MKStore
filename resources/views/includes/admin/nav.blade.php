        <nav class="navbar navbar-light navbar-top navbar-expand " >
          <div class="navbar-logo pb-7 pt-4">
            <button class="btn navbar-toggler navbar-toggler-humburger-icon" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
              <span class="navbar-toggle-icon">
                </span></button> 
                
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center pt-5">
                    
                    <img src="{{asset('dashassets/img/icons/MK2.png')}}" alt="MKStore" height="80px" width="auto"class="logoimg d-none d-md-block my-5" >


                    
                </div>
              </div>
            </a></div>
          <div class="collapse navbar-collapse">
            <div class="search-box d-none d-lg-block" style="width:25rem;">
              <form class="position-relative" data-bs-toggle="search" data-bs-display="static"><input class="form-control form-control-sm search-input search min-h-auto" type="search" placeholder="Search..." aria-label="Search"> <span class="fas fa-search search-box-icon"></span></form>
            </div>
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row">
              
              

<li class="nav-item dropdown">
    <a href="#" class="nav-link p-0 d-flex align-items-center" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="cursor:pointer;">
        <div class="avatar rounded-circle border border-primary " 
             style="width:40px; height:40px; overflow:hidden; transition: transform 0.2s, box-shadow 0.2s;">
            <img src="{{ asset('dashassets/img/team/avatar.png') }}" alt="User Avatar" class="rounded-circle w-100 h-100">
        </div>
        <i class="fas fa-caret-down ms-1 text-primary"></i>
    </a>

    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdownUser" style="min-width:220px;">
        <li class="dropdown-header text-center">
            <div class="avatar avatar-xl mb-2">
                <img src="{{ asset('dashassets/img/team/avatar.png') }}" alt="" class="rounded-circle w-100 h-100">
            </div>
            <strong>{{ $u->name }}</strong>
        </li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="/admin/profil"><i data-feather="user" class="me-2"></i>Profile</a></li>
        <li><a class="dropdown-item" href="/admin/dashbord"><i data-feather="pie-chart" class="me-2"></i>Dashboard</a></li>
        <li><hr class="dropdown-divider"></li>
        <li>
            <a class="dropdown-item text-danger" href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               <i data-feather="log-out" class="me-2"></i>Sign out
            </a>
        </li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
</li>






            </ul>
          </div>
        </nav>
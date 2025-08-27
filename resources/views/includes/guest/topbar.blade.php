<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        
        <!-- Logo + Search -->
        <div class="col-lg-8 col-8 d-flex align-items-center">
            <!-- Logo -->
            <a href="/" class="text-decoration-none mr-3 d-none d-lg-block">
                <img class="m-0 display-5 font-weight-semi-bold" src="{{asset('mainassets/img/logo.png')}}" alt="Logo" style="height: 80px;">
            </a>
            <!-- Search Bar -->
            <form action="/product/search" class="flex-grow-1" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher un produit" name="search_query" required>
                    <div class="input-group-append">
                    <button type="submit" class="input-group-text bg-transparent text-primary border-0">
                        <i class="fa fa-search"></i>
                    </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Icons -->
        <div class="col-lg-4 col-4 text-right">
            
            <a href="/panier" class="btn border">
                <i class="fas fa-shopping-cart text-dark"></i>
                
            </a>
        </div>

    </div>
</div>
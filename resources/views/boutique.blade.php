@extends('layout/master')
@section('content')


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
       
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Tous nos produits</span></h2>
        <div class="container pt-8 pb-3">
            <input type="text" placeholder="Rechercher un produit" id="searchInput" class="form-control">
        </div>
        <div class="row px-xl-5" id="myTable">
            @foreach($produits as $produit)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1 product-item">
                <div class="product-item bg-light mb-4">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $produit->photo) }}" alt="image">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                            <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate produit-designation" href="{{route('produit_show', ['id' => $produit->id])}}">{{$produit->designation}}</a>
                        <div class="d-flex align-items-center justify-content-center mt-2">
                            <h5>{{$produit->prix}}/Fcfa</h5><h6 class="text-muted ml-2"><del></del></h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mb-1">
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small class="fa fa-star text-primary mr-1"></small>
                            <small>(99)</small>
                        </div>
                        <a href="{{route('produit_show', ['id' => $produit->id])}}" class="btn btn-primary">Detail</a>
                        <a href="{{route('produit_show', ['id' => $produit->id])}}" class="btn btn-danger">Commander</a>
                        <p>{{$produit->user->pseudo}}</p>
                    </div>
                </div>
            </div>
            @endforeach
            {{$produits->links()}}
        </div>
        
        <script>
            document.getElementById('searchInput').addEventListener('keyup', function() {
                // Get the search input value and convert to lower case
                var input = this.value.toLowerCase();
        
                // Get all product items
                var productItems = document.querySelectorAll('.product-item');
        
                // Loop through each product item
                productItems.forEach(function(item) {
                    // Get the designation text content and convert to lower case
                    var designation = item.querySelector('.produit-designation').textContent.toLowerCase();
        
                    // Check if the designation includes the search input value
                    if (designation.includes(input)) {
                        // If it includes, display the item
                        item.style.display = 'block';
                    } else {
                        // If not, hide the item
                        item.style.display = 'none';
                    }
                });
            });
        </script>
@endsection
@extends('layout/master')
@section('content')
<div class="container-fluid pb-5">
    <div class="row px-xl-5">
        <div class="col-lg-5 mb-30">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner bg-light">
                    <div class="carousel-item active">
                        <img class="w-100 h-100" src="{{ asset('storage/' . $produitdetail->photo) }}" alt="Image">
                    </div>
                    
                </div>
                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                </a>
                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-7 h-auto mb-30">
            <div class="h-100 bg-light p-30">
                <div class="alert-success">
                    @if (session('success'))
                    <p style="color: green;">{{ session('success') }}</p>
                    @endif
                </div>
                <div class="alert-danger">
                    @if (session('error'))
                    <p style="color: green;">{{ session('error') }}</p>
                    @endif
                </div>
              
                <h3> {{$produitdetail->designation}} </h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(99 Reviews)</small>
                </div>
                
                <h3 class="font-weight-semi-bold mb-4">{{$produitdetail->prix}}</h3>
                <p class="mb-4">{{$produitdetail->description}}</p>
                <div class="d-flex mb-3">
                    <strong class="text-dark mr-3">{{$produitdetail->categorie->nomcategorie}}</strong>
                </div>
                <div class="d-flex align-items-center mb-4 pt-2">
                    
                    <form action="{{route('add_produit_cart')}}" method="post">
                        @csrf 
                        @method('post')
                        <div class="input-group quantity mr-3" style="width: 130px;">
                            <label for="text">Quantité:</label>
                            <input type="number" name="quantite" class="form-control bg-secondary border-0 text-center" value="1">
                        </div>
                        <input type="hidden" name="idproduit" value="{{ $produitdetail->id }}">
                        <input type="hidden" name="designation" value="{{ $produitdetail->designation }}">
                        <input type="hidden" name="prix" value="{{ $produitdetail->prix }}">
                        <br>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Panier</button>
                    </form>
                   
                </div>
                <div class="d-flex pt-2">
                    <strong class="text-dark mr-2">Share on:</strong>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row px-xl-5">
        <div class="col">
            <div class="bg-light p-30">
                <div class="nav nav-tabs mb-4">
                    <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-3">Commentaire</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <p>{{$produitdetail->description}}</p>
                       
                    </div>

                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                @if(session('success'))
                                <div class="alert-success">{{session('success')}}</div>
                                @endif

                                @if(session('error'))
                                <div class="alert-success">{{session('error')}}</div>
                                @endif
                                <form method="post" action="{{route('commentaire_store')}}">
                                    @csrf 
                                    @method('post')
                                    <div class="form-group">
                                        <label for="message">Commentaire</label>
                                        <textarea name="description" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" value="{{Auth::user()->id}}" name="iduser">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" value="{{$produitdetail->id}}" name="idproduit">
                                    </div>
                    
                                    <div class="form-group mb-0">
                                        <input type="submit" value="Commenté" class="btn btn-primary px-3">
                                    </div>
                                </form>
                                <br>
                                @foreach($commentaire as $commentaires)
                                <h6>User: {{$commentaires->user->pseudo}}</h6> <p> {{$commentaires->description}}</p><hr>
                                @endforeach
                              
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
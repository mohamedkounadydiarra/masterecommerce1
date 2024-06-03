@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-xl-4 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                       
                        <h6 class="text-muted m-b-0">Produit actuel<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                       
                        <h6 class="text-muted m-b-0">Commande non valider<i class="fa fa-caret-up text-c-green m-l-10"></i></h6>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                      
                        <h6 class="text-muted m-b-0">Commande validé<i class="fa fa-caret-down text-c-red m-l-10"></i></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
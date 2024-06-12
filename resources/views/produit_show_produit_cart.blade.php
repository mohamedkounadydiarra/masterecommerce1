@extends('layout/master')
@section('content')
    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    @if(session('success'))
                    <div class="alert-success"><p> {{session('success')}} </p></div>
                    @endif
                
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <thead class="thead-dark">
                        <tr>
                            <th>Designation</th>
                            <th>Prix</th>
                            <th>Quantite</th>
                            <th>Total</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach($cart as $id => $item)
                        <tr>       
                            <td>{{$item['designation']}}</td>
                            <td>{{$item['prix']}}</td>
                            <td>{{$item['quantite']}}</td>
                            <td>{{$item['quantite'] * $item['prix']}}</td>
                            <td><a href="{{ route('delete_cart', $id) }}" class="btn btn-danger">Retirer</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                <div class="col-lg-4 mt-3">
                    <form class="mb-30" action="{{ route('commande_store') }}" method="post">
                        @csrf 
                        @method('post')
                
                        @foreach($cart as $item)
                            <input type="hidden" value="{{ $item['quantite'] }}" name="quantite">
                            <input type="hidden" value="{{ $item['quantite'] * $item['prix'] }}" name="total">
                            <input type="hidden" value="{{ $item['idproduit'] }}" name="idproduit">
                        @endforeach
                        
                        <input type="hidden" value="{{ Auth::user()->id }}" name="iduser">
                        <div class="input-group mb-3">
                            <input class="form-control" name="localisation" placeholder="localisation" value="{{ old('localisation') }}" type="text" id="localisation">
                            <button class="btn btn-primary" type="button" onclick="getLocation()">Obtenir la localisation</button>
                        </div>
                        <input type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Valider commande">
                    </form>
                </div>
                
            </div>
   
                
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Infos client</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Identifiant:</h6>
                            <h6>{{Auth::user()->pseudo}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Telephone:</h6>
                            <h6 class="font-weight-medium">{{Auth::user()->telephone}}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        {{-- <input type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3" value="Valider commande"> --}}
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <!-- Cart End -->
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("La géolocalisation n'est pas prise en charge par ce navigateur.");
            }
        }
        
        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            
            var localisationInput = document.getElementById("localisation");
            localisationInput.value = "Latitude: " + latitude + ", Longitude: " + longitude;
        }
        </script>

@endsection

@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
           
            <div class="card-header">
               
                <h5>Nos Commandes</h5>
                <p>Recherche</p>
                <input type="search" class="form-control" id="searchInput" placeholder="recheche">
            </div>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-body table-border-style">
                <div class="table-responsive">
                <table id="myTable" class="table">
                <thead>
                <tr>
                    <th>date</th>
                    <th>statut</th>
                    <th>designation</th>
                    <th>quantite</th>
                    <th>total</th>
                    <th>nom</th>
                  
                    
                    <th>localisation</th>
                </tr>
                </thead>
                <tbody>

               @foreach ($commande as $commandes)
               <tr>
                    <td>{{$commandes->created_at}}</td>
                    <td>{{$commandes->statut}}</td>
                    <td>{{$commandes->produit->designation}}</td>
                    <td>{{$commandes->quantite}}</td>
                    <td>{{$commandes->total}}</td>
                    <td>{{$commandes->user->pseudo}}</td>
                    <td>{{$commandes->localisation}}</td>               
                   
                    <td>
                        <form action="{{ route('commande_update', $commandes->id) }}" method="post">
                            @csrf 
                            @method('put')
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('commande_delete', $commandes->id) }}" method="post">
                            @csrf 
                            @method('delete')
                            <input type="submit" value="supprimer" class="btn btn-danger">
                        </form>
                    </td>
                    
               </tr>
               @endforeach
                </tbody>
               </table>
                <div class="pagination">
                    {{$commande->links()}}
                </div>
                </div>
           </div>
    </div>
</div>


@endsection
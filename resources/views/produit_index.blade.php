@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <th><a href="{{route('produit_create')}}" class="btn btn-dark">Add+</a></th>
            <div class="card-header">
               
                <h5>Nos Produits</h5>
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
                    <th>designation</th>
                    <th>description</th>
                    <th>prix</th>
                    <th>photo</th>
                    <th>categorie</th>
                </tr>
                </thead>
                <tbody>

               @foreach ($produit as $produits)
               <tr>
                    <td>{{$produits->designation}}</td>
                    <td>{{$produits->description}}</td>
                    <td>{{$produits->prix}}</td>
                    <td>{{$produits->photo}}</td>
                    <td>{{$produits->categorie->nomcategorie}}</td>
                    <td>
                        <a href="{{route('produit_edit',['id' => $produits->id])}}"><input type="submit" value="editer" class="btn btn-primary"></a>
                    </td>
                    <td>
                        <form action="{{route('produit_delete', ['id' => $produits->id])}}" method="post">
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
                    {{$produit->links()}}
                </div>
                </div>
           </div>
    </div>
</div>


@endsection
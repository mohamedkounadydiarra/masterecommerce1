@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5>Nos categories</h5>
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
                    <th>Nom</th>
                    <th>code utilisateur</th>
                </tr>
                </thead>
                <tbody>

               @foreach ($categorie as $categories)
               <tr>
                    <td>{{$categories->nomcategorie}}</td>
                    <td>{{$categories->iduser}}</td>
                    <td>
                        <a href="{{route('categorie_edit',['id' => $categories->id])}}"><input type="submit" value="editer" class="btn btn-primary"></a>
                    </td>
                    <td>
                        <form action="{{route('categorie_delete', ['id' => $categories->id])}}" method="post">
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
                    {{$categorie->links()}}
                </div>
                </div>
           </div>
    </div>
</div>


@endsection
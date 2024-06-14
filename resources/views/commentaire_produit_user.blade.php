@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <th><a href="{{route('produit_index')}}" class="btn btn-dark">List+</a></th>
            <div class="card-header">
               
                <h5>Nos Commentaire</h5>
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
                    
                    <th>Commentaire</th>
                   
                </tr>
                </thead>
                <tbody>

               @foreach ($commentaire as $commentaires)
               <tr>
                   
                    <td>{{$commentaires->description}}</td>

               </tr>
               @endforeach
                </tbody>
               </table>
                <div class="pagination">
                    {{$commentaire->links()}}
                </div>
                </div>
           </div>
    </div>
</div>


@endsection
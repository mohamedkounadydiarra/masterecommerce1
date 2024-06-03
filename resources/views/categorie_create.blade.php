@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Ajout de Catégorie</h5>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-body">
                    <form method="post" action="{{route('categorie_store')}}">
                        @csrf 
                        @method('post')
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label" for="Email">Nom</label>
                                    <input type="text" class="form-control" maxlength="30" minlength="1" name="nomcategorie" aria-describedby="">
                                </div>
                            </div>
               
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Enregistrer" style="margin-top:30px;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
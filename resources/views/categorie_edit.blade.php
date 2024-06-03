@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Editer de Catégorie</h5>
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
                <div class="card-body">

                    <form method="post" action="{{route('categorie_edit', ['id' => $categorie->id])}}">
                        @csrf 
                        @method('put')

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label" for="Email">Nom</label>
                                    <input type="text" class="form-control"  value="{{ $categorie->nomcategorie }}" name="nomcategorie" aria-describedby="">
                                </div>
                            </div>
               
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Mettre à jour" style="margin-top:30px;">
                                </div>
                            </div>
                        </div>
                    </form>
               
                </div>
            </div>
        </div>
    </div>
@endsection
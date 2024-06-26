@extends('layout/dashboard')
@section('content')
<div class="row">
    <div class="col-sm-12">
        
            <div class="card">
                <th><a href="{{route('produit_index')}}" class="btn btn-dark">Voir la Liste</a></th>
                <div class="card-header">
                    <h5>Ajout de Produit</h5>
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
                    <form method="post" action="{{route('produit_store')}}" enctype="multipart/form-data">
                        @csrf 
                        @method('post')
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label" for="Email">Designation</label>
                                    <input type="text" class="form-control" maxlength="30" minlength="1" name="designation" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label" for="Email">Description</label>
                                    <textarea name="description" class="form-control" cols="30" rows="1"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label" for="Email">Photo</label>
                                    <input type="file" class="form-control" minlength="1" name="photo" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label" for="Email">Prix</label>
                                    <input type="number" class="form-control" maxlength="30" minlength="1" name="prix" aria-describedby="">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="floating-label" for="">Categorie</label>
                                    <select name="idcategorie" class="form-control">
                                        @foreach($categorie as $categories)
                                        <option value="{{$categories->id}}">{{$categories->nomcategorie}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="iduser" value="{{ auth()->user()->id }}">
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
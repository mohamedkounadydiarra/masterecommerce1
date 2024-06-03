@extends('layout/login')
@section('content')
<div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
           
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center mb-4">
               <h3 style="color:white;">Login</h3>
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

              <form method="post" action="{{route('user_loginstore')}}">
                @csrf 
                @method('post')
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="pseudo" name="pseudo" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="password" type="password">
                  </div>
                </div>
        
              
                <div class="text-center">
                  <input type="submit" class="btn btn-primary mt-4" value="Connexion">
                  <a href="{{route('user_create')}}"><button type="button" class="btn btn-secondary mt-4">Creer un compte</button></a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
@endsection
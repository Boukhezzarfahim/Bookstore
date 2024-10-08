@extends('layouts.auth')

@section('container')

<div class="login-box">
    <div class="login-logo">
        <a href="#" style="color: #b3b6b9; font-size: 1.2em;"><b style="font-weight:bold;">Bookstore</b><br>
            Dashboard</a>
            <hr/>
        </div>
        <!-- /.login-logo -->
        <div class="card bg-dark">
          <div class="card-body login-card-body">
      
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="input-group mb-3">
                <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
      
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
      
                <!-- /.col -->
                <div class="col">
                  <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
      
      
          </div>
          <!-- /.login-card-body -->
        </div>
      </div> 
@endsection
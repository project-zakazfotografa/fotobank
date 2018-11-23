@extends('layouts.app')
@section('content')
<div id="app">
  <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container"><a href="/" class="navbar-brand">
        zakazfotografa.ru
      </a> <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
      <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="javascript:void(0);" class="nav-link">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">Login</div>
            <div class="card-body">
              <form method="POST" action="javascript:void(0);" aria-label="Login"><input type="hidden" name="_token" value="fbipsywcM7x6rMGh923iXuDzuTdPQb8WGYsnMahG">
                <div class="form-group row"><label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>
                  <div class="col-md-6"><input id="email" type="email" name="email" value="" required="required" autofocus="autofocus" class="form-control"></div>
                </div>
                <div class="form-group row"><label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                  <div class="col-md-6"><input id="password" type="password" name="password" required="required" class="form-control"></div>
                </div>
                <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                    <div class="form-check"><input type="checkbox" name="remember" id="remember" class="form-check-input"> <label for="remember" class="form-check-label">
                        Remember Me
                      </label></div>
                  </div>
                </div>
                <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4"><button type="submit" class="btn btn-primary">
                      Login
                    </button> <a href="javascript:void(0);" class="btn btn-link">
                      Forgot Your Password?
                    </a></div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
@endsection

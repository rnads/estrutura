@extends('layouts.admin.app')

@section('title')
    LOGIN
@endsection

@section('content')
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row justify-content-center">
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col-md-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Bem vindo!</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            id="email" aria-describedby="emailHelp" placeholder="E-mail" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password"
                                            class="form-control form-control-user @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password"
                                            placeholder="Senha">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>


                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Entrar
                                    </button>
                                    {{-- <hr>
                                    <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> {{ __('Entrar com Google') }}
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> {{ __('Entrar com Facebook') }}
                                    </a> --}}
                                </form>
                                <hr>
                                <div class="text-center">
                                <a class="small" href="{{ Route('password.request') }}">Esqueci minha
                                    senha...</a>
                                </div>
                                {{-- <div class="text-center">
                                    <a class="small" href="register.html">Create an Account!</a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

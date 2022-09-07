@extends('layouts.app')

@section('content')
<div class="cart-table-area section-padding-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <main class="container-fluid w-100" role="main">
                    <div class="row">
                        <div class="col-lg-6 d-flex flex-column justify-content-center align-items-center bg-white mnh-100vh">
                            

                            <div class="u-login-form">
                                

                                <form class="mb-3" role="form" method="POST" action="{{ url('/password/reset') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <h1 class="h2">Resetear Password</h1>
                                    <p class="small">Si no recibes un email, porfavor revisa tu folder de correo no deseado.</p>

                                    <div class="form-group mb-4">
                                        <label for="email">Tu email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password">Nueva Contraseña</label>
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="password-confirm">Confirma Contraseña</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                        @if ($errors->has('password_confirmation'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button class="btn btn-info btn-block" type="submit"><i class="fas fa-check-double"></i> Resetear Contraseña</button>
                                </form>

                                <!--<p class="small">
                                    No tienes Cuenta? <a href="{{ route('register') }}">Registrate aqui</a>
                                    <i class="far fa-question-circle mr-1"></i><br>
                                    Si no puedes entrar a tu cuenta <a href="#">contactanos</a>.
                                </p>-->
                            </div>

                            
                        </div>

                        <div class="col-lg-6 d-none d-lg-flex flex-column align-items-center justify-content-center bg-light">
                            <img class="img-fluid position-relative u-z-index-3 mx-5" src="{{asset('assets/svg/mockups/mockup.svg')}}" alt="Image description">

                            <figure class="u-shape u-shape--top-right u-shape--position-5">
                                <img src="{{asset('assets/svg/shapes/shape-1.svg')}}" alt="Image description">
                            </figure>
                            <figure class="u-shape u-shape--center-left u-shape--position-6">
                                <img src="{{asset('assets/svg/shapes/shape-2.svg')}}" alt="Image description">
                            </figure>
                            <figure class="u-shape u-shape--center-right u-shape--position-7">
                                <img src="{{asset('assets/svg/shapes/shape-3.svg')}}" alt="Image description">
                            </figure>
                            <figure class="u-shape u-shape--bottom-left u-shape--position-8">
                                <img src="{{asset('assets/svg/shapes/shape-4.svg')}}" alt="Image description">
                            </figure>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>
@endsection

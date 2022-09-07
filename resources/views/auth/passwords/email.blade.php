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
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form class="mb-3" method="POST" action="{{ route('password.email') }}">
                                    {{ csrf_field() }}
                                    <h1 class="h2">Recupera tu Contraseña</h1>
                                    <p class="small">Si no recibes un email, porfavor revisa tu folder de correo no deseado.</p>

                                    <div class="form-group mb-4">
                                        <label for="email">Tu email</label>
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <button class="btn btn-info btn-block" type="submit"><i class="fas fa-check-double"></i> Enviar Correo</button>
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

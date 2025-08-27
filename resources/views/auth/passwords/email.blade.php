@extends('layouts.app')

@section('content')
<style>
    body {
       font-family: 'Josefin Sans', sans-serif;
    }

    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 20px;
        padding: 2rem;
        flex-wrap: wrap;
    }

    .logo-container {
        flex: 1;
        display: flex;
        justify-content: center;
    }

    .logo-container img {
        max-width: 350px;
        height: auto;
        width: 100%;
    }

    .login-card {
        background: #fff;
        border-radius: 15px;
        padding: 2rem;
        box-shadow: 0px 5px 20px rgba(0,0,0,0.1);
        max-width: 400px;
        width: 100%;
        flex: 1;
    }

    .login-title {
        text-align: center;
        font-size: 1.8rem;
        font-weight: 600;
        color: #868884;
        margin-bottom: 1rem;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 0.75rem;
    }

    .form-control:focus {
        border-color: #A3B18A;
        box-shadow: 0 0 5px rgba(163, 177, 138, 0.3);
    }

    .btn-login {
        background-color: #868884;
        border: none;
        padding: 0.7rem 1.5rem;
        font-weight: 500;
        border-radius: 8px;
        transition: background 0.3s ease;
        color: #fff;
        width: 100%;
    }

    .btn-login:hover {
        background-color: #868884;
    }

    .alert-success {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        margin-bottom: 1rem;
    }

    @media (max-width: 768px) {
        .login-container {
            flex-direction: column;
            text-align: center;
        }

        .logo-container img {
            max-width: 250px;
            margin-bottom: 20px;
        }

        .login-card {
            max-width: 100%;
        }
    }
</style>

<div class="container py-5">
    <div class="login-container">
        
        <!-- Logo -->
        <div class="logo-container">
            <a href="{{ route('guest.home') }}">
                <img src="{{ asset('mainassets/img/MK.png') }}" alt="Logo">
            </a>
        </div>

        <!-- Formulaire Forgot Password -->
        <div class="login-card">
            <h2 class="login-title">{{ __('Réinitialisation du mot de passe') }}</h2>

            @if (session('status'))
                <div class="alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Adresse Email') }}</label>
                    <input id="email" type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-login">
                        {{ __('Envoyer le lien de réinitialisation') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

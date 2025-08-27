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
    }

    .btn-login:hover {
        background-color: #868884;
    }

    .link-forgot {
        text-decoration: none;
        font-size: 0.9rem;
        color: #868884;
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

        <!-- Formulaire Reset Password -->
        <div class="login-card">
            <h2 class="login-title">{{ __('Réinitialiser le mot de passe') }}</h2>
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Adresse Email') }}</label>
                    <input id="email" type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Mot de passe') }}</label>
                    <input id="password" type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }}</label>
                    <input id="password-confirm" type="password" class="form-control" 
                           name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-login">
                        {{ __('Réinitialiser le mot de passe') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

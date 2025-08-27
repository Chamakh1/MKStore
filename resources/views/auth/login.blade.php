<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MK Store</title>
        <!-- Favicon -->
    <link href="{{ asset('mainassets/img/favicon.ico')}}" rel="icon">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
        :root {
            --noir: #1C1C1C;
            --beige-gris: #A39E93;
            --vert-sage: #A3B18A;
            --bleu-gris: #C7D2D2;
            --brun-fonce: #5C4033;
            --blanc: #FFFFFF;
            --gris-clair: #F8F7F5;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--gris-clair);
            color: var(--noir);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            line-height: 1.6;
            
        }

        .login-container {
            display: flex;
            max-width: 1100px;
            width: 100%;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(28, 28, 28, 0.08);
            position: relative;
            z-index: 1;
            border: 1px solid var(--bleu-gris);
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: rgb(114, 112, 112);
            z-index: 2;
        }

        .logo-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(247, 247, 245, 0.8) 0%, rgba(247, 247, 245, 0.9) 100%);
        }

        .logo-container::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(163, 177, 138, 0.05);
        }

        .logo-container::after {
            content: '';
            position: absolute;
            bottom: -30px;
            left: -30px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(92, 64, 51, 0.05);
        }

        .logo-container img {
            max-width: 100%;
            height: auto;
            width: 100%;
            max-width: 300px;
            z-index: 1;
            transition: var(--transition);
        }

        .login-card {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--blanc);
        }

        .login-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .login-title {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 2.4rem;
            font-weight: 700;
            color: black;
            margin-bottom: 8px;
            position: relative;
            display: inline-block;
            letter-spacing: -0.5px;
        }

        .login-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--beige-gris);
            border-radius: 3px;
        }

        .login-subtitle {
            font-size: 1.1rem;
            color: var(--beige-gris);
            font-weight: 400;
            margin-top: 15px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-weight: 500;
            color: black;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }

        .form-label i {
            margin-right: 10px;
            color: var(--beige-gris);
        }

        .input-with-icon {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--beige-gris);
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 14px 20px 14px 45px;
            border: 1px solid ;
            border-radius: 10px;
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: rgba(199, 210, 210, 0.05);
            color: var(--noir);
        }

        .form-control:focus {
            
            
            outline: none;
            background-color: var(--blanc);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgb(75, 75, 75);
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.1rem;
        }

      

        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .form-check-input {
            width: 18px;
            height: 18px;
            border: 2px solid var(--bleu-gris);
            border-radius: 4px;
            margin-right: 10px;
            position: relative;
            cursor: pointer;
            transition: var(--transition);
            background-color: rgba(199, 210, 210, 0.1);
        }

        .form-check-input:checked {
            background-color: var(--vert-sage);
            border-color: var(--vert-sage);
        }

        .form-check-label {
            font-size: 0.95rem;
           
            cursor: pointer;
        }

        .login-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .btn-login {
            background: rgb(128, 127, 127);
            color: var(--blanc); /* Fond clair pour élégance */
            border: none;  /* Bordure fine et nette */
            padding: 12px 32px;           /* Dimensions harmonieuses */
            font-size: 1rem;
            font-weight: 600;
            border-radius: 8px;           /* Coins légèrement arrondis */
            cursor: pointer;
            transition: all 0.3s ease;    /* Transition douce */
            display: inline-flex;
            align-items: center;
            justify-content: center;
            letter-spacing: 0.5px;
        }



        .btn-login i {
            margin-left: 10px;
            transition: var(--transition);
        }

       

        .link-forgot {
            color: black;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            padding: 5px 0;
        }

        .link-forgot i {
            margin-right: 8px;
            font-size: 0.9rem;
            
        }


        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
            color: var(--beige-gris);
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid var(--bleu-gris);
        }

        .divider::before {
            margin-right: 15px;
        }

        .divider::after {
            margin-left: 15px;
        }

        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        .social-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gris-clair);
            border: 1px solid var(--bleu-gris);
            color: rgb(96, 94, 94);
            font-size: 1.2rem;
            transition: black 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
        }

        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            
            background: var(--blanc);
        }

        .register-link {
            text-align: center;
            font-size: 0.95rem;
            color: var(--beige-gris);
            margin-top: 25px;
        }

        .register-link a {
            color: black;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: var(--transition);
            position: relative;
        }

        .register-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 1px;
            background: var(--brun-fonce);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }

        .register-link a:hover {
            color: rgb(128, 127, 127);
        }

        .register-link a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }

        .invalid-feedback {
            display: block;
            margin-top: 8px;
            font-size: 0.85rem;
            color: #e74c3c;
            font-weight: 500;
            padding-left: 5px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 30px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background: rgba(199, 210, 210, 0.1);
            border-radius: 8px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: var(--gris-clair);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: var(--brun-fonce);
            font-size: 1.1rem;
            border: 1px solid var(--bleu-gris);
        }

        .feature-text {
            font-size: 0.9rem;
            color: var(--brun-fonce);
        }

        /* Animation d'arrière-plan */
        @keyframes float {
            0% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(3deg); }
            100% { transform: translateY(0px) rotate(0deg); }
        }

        .floating-element {
            position: absolute;
            z-index: 0;
            opacity: 0.07;
            animation: float 10s ease-in-out infinite;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .floating-element:nth-child(1) {
            top: 10%;
            left: 5%;
            width: 100px;
            height: 100px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M50,10 A40,40 0 1,1 50,90 A40,40 0 1,1 50,10 Z" fill="%235C4033"/></svg>');
            animation-delay: 0s;
        }

        .floating-element:nth-child(2) {
            top: 70%;
            right: 10%;
            width: 80px;
            height: 80px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><polygon points="50,10 90,90 10,90" fill="%23A3B18A"/></svg>');
            animation-delay: 1.5s;
        }

        .floating-element:nth-child(3) {
            bottom: 20%;
            left: 15%;
            width: 70px;
            height: 70px;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><rect x="20" y="20" width="60" height="60" rx="15" fill="%23A39E93"/></svg>');
            animation-delay: 3s;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .login-container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .logo-container {
                padding: 30px 20px;
            }
            
            .logo-container img {
                max-width: 220px;
            }
            
            .login-card {
                padding: 40px 25px;
            }
            
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .login-footer {
                flex-direction: column;
                gap: 20px;
                align-items: stretch;
            }
            
            .btn-login {
                width: 100%;
                padding: 14px;
            }
            
            .link-forgot {
                text-align: center;
                justify-content: center;
            }
            
            .login-title {
                font-size: 1.9rem;
            }
            
            .login-subtitle {
                font-size: 1rem;
            }
        }
    </style>

</head>
<body>
    <!-- Éléments flottants décoratifs -->
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>

    <div class="login-container">
        <!-- Logo -->
        <div class="logo-container">
            <a href="{{ route('guest.home') }}">
                <img src="{{ asset('mainassets/img/logo.png') }}" alt="Logo Professionnel">
            </a>
        </div>

        <!-- Formulaire -->
        <div class="login-card">
            <div class="login-header">
                <h1 class="login-title">Connexion</h1>
                <p class="login-subtitle">Accédez à votre espace sécurisé</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> {{ __('Adresse Email') }}
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" 
                               required autocomplete="email" autofocus
                               placeholder="votre@email.com">
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock"></i> {{ __('Mot de passe') }}
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" required autocomplete="current-password"
                               placeholder="••••••••">
                        <button type="button" class="password-toggle">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" 
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>

                <div class="login-footer">
                    <button type="submit" class="btn btn-login" id="login-btn">
                        {{ __('Se connecter') }} <i class="fas fa-arrow-right"></i>
                    </button>
                    
                    @if (Route::has('password.request'))
                        <a class="link-forgot" href="{{ route('password.request') }}">
                            <i class="fas fa-key"></i> {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif
                </div>
            </form>

            <div class="divider">Ou continuer avec</div>

            <div class="social-login">
                <a href="#" class="social-btn"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-microsoft"></i></a>
            </div>

            <div class="register-link">
                Nouveau sur notre plateforme ? <a href="{{ route('register') }}">Créer un compte</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.querySelector('.password-toggle').addEventListener('click', function() {
            const passwordInput = document.querySelector('#password');
            const icon = this.querySelector('i');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    </script>
</body>
</html>
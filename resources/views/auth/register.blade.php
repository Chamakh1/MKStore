<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Votre Site E-commerce</title>
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

        .register-container {
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

        .register-container::before {
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

        .register-card {
            flex: 1;
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: var(--blanc);
        }

        .register-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .register-title {
            font-family: 'Josefin Sans', sans-serif;
            font-size: 2.4rem;
            font-weight: 700;
            color: black;
            margin-bottom: 8px;
            position: relative;
            display: inline-block;
            letter-spacing: -0.5px;
        }

        .register-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--beige-gris);
            border-radius: 3px;
        }

        .register-subtitle {
            font-size: 1.1rem;
            color: var(--beige-gris);
            font-weight: 400;
            margin-top: 15px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
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
            border: 1px solid var(--bleu-gris);
            border-radius: 10px;
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: rgba(199, 210, 210, 0.05);
            color: var(--noir);
        }

        .form-control:focus {
            border-color: var(--vert-sage);
            box-shadow: 0 0 0 3px rgba(163, 177, 138, 0.15);
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
            color: var(--beige-gris);
            cursor: pointer;
            transition: var(--transition);
            font-size: 1.1rem;
        }

        .password-toggle:hover {
            color: var(--brun-fonce);
        }

        .btn-register {
            background: rgb(128, 127, 127);
            color: var(--blanc);
            border: none;
            padding: 14px 35px;
            font-size: 1rem;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            transition: var(--transition);
            box-shadow: 0 4px 15px rgba(92, 64, 51, 0.15);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            letter-spacing: 0.5px;
            width: 100%;
            margin-top: 10px;
        }

      

        .btn-register i {
            margin-left: 10px;
            transition: var(--transition);
        }

        .btn-register:hover i {
            
        }

        .login-link {
            text-align: center;
            font-size: 0.95rem;
            color: var(--beige-gris);
            margin-top: 25px;
        }

        .login-link a {
            color: black;
            text-decoration: none;
            font-weight: 600;
            margin-left: 5px;
            transition: var(--transition);
            position: relative;
        }

        .login-link a::after {
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

        .login-link a:hover {
            color: rgb(128, 127, 127);
        }

        .login-link a:hover::after {
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

        .password-strength {
            height: 6px;
            background: var(--bleu-gris);
            border-radius: 3px;
            margin-top: 8px;
            overflow: hidden;
            position: relative;
        }

        .password-strength-meter {
            height: 100%;
            width: 0;
            background: var(--vert-sage);
            border-radius: 3px;
            transition: var(--transition);
        }

        .password-requirements {
            margin-top: 10px;
            font-size: 0.8rem;
            color: var(--beige-gris);
        }

        .requirement {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .requirement i {
            margin-right: 5px;
            font-size: 0.7rem;
            color: var(--beige-gris);
        }

        .requirement.valid i {
            color: var(--vert-sage);
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
            .register-container {
                flex-direction: column;
                max-width: 500px;
            }
            
            .logo-container {
                padding: 30px 20px;
            }
            
            .logo-container img {
                max-width: 220px;
            }
            
            .register-card {
                padding: 40px 25px;
            }
            
            .feature-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .register-title {
                font-size: 1.9rem;
            }
            
            .register-subtitle {
                font-size: 1rem;
            }
            
            .form-control {
                padding: 12px 15px 12px 40px;
            }
        }
    </style>
</head>
<body>
    <!-- Éléments flottants décoratifs -->
    <div class="floating-element"></div>
    <div class="floating-element"></div>
    <div class="floating-element"></div>

    <div class="register-container">
        <!-- Logo -->
        <div class="logo-container">
            <div style="text-align: center;">
                <a href="{{ route('guest.home') }}">
                    <img src="{{ asset('mainassets/img/logo.png') }}" alt="Logo" style="max-width: 200px; margin-bottom: 30px;">
                </a>
                
                
                
                
            </div>
        </div>

        <!-- Formulaire d'inscription -->
        <div class="register-card">
            <div class="register-header">
                <h1 class="register-title">Créer un compte</h1>
                <p class="register-subtitle">Rejoignez notre communauté de passionnés de cosmétiques naturels</p>
            </div>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="fas fa-user"></i> {{ __('Nom complet') }}
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-user input-icon"></i>
                        <input id="name" type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                               placeholder="Votre nom complet">
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope"></i> {{ __('Adresse Email') }}
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope input-icon"></i>
                        <input id="email" type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" value="{{ old('email') }}" required autocomplete="email"
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
                               name="password" required autocomplete="new-password"
                               placeholder="••••••••">
                        <button type="button" class="password-toggle" id="password-toggle">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    
                    <div class="password-strength">
                        <div class="password-strength-meter" id="password-strength-meter"></div>
                    </div>
                    
                    <div class="password-requirements">
                        <div class="requirement" id="length-req">
                            <i class="fas fa-circle"></i> 8 caractères minimum
                        </div>
                        <div class="requirement" id="number-req">
                            <i class="fas fa-circle"></i> Au moins un chiffre
                        </div>
                        <div class="requirement" id="special-req">
                            <i class="fas fa-circle"></i> Au moins un caractère spécial
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="form-label">
                        <i class="fas fa-lock"></i> {{ __('Confirmer le mot de passe') }}
                    </label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock input-icon"></i>
                        <input id="password-confirm" type="password" 
                               class="form-control" 
                               name="password_confirmation" required autocomplete="new-password"
                               placeholder="••••••••">
                        <button type="button" class="password-toggle" id="confirm-toggle">
                            <i class="far fa-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn btn-register">
                    {{ __('S’inscrire') }} <i class="fas fa-user-plus"></i>
                </button>
            </form>

            <div class="login-link">
                Vous avez déjà un compte ? <a href="{{ route('login') }}">Se connecter</a>
            </div>
        </div>
    </div>

    <script>
        // Toggle password visibility
        document.querySelectorAll('.password-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function() {
                const inputId = this.parentElement.querySelector('input').id;
                const passwordInput = document.getElementById(inputId);
                const icon = this.querySelector('i');
                
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });

        // Password strength meter
        const passwordInput = document.getElementById('password');
        const strengthMeter = document.getElementById('password-strength-meter');
        const requirements = {
            length: document.getElementById('length-req'),
            number: document.getElementById('number-req'),
            special: document.getElementById('special-req')
        };

        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Reset requirements
            for (const key in requirements) {
                requirements[key].classList.remove('valid');
            }
            
            // Check password length
            if (password.length >= 8) {
                strength += 30;
                requirements.length.classList.add('valid');
            }
            
            // Check for numbers
            if (/\d/.test(password)) {
                strength += 30;
                requirements.number.classList.add('valid');
            }
            
            // Check for special characters
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) {
                strength += 40;
                requirements.special.classList.add('valid');
            }
            
            // Update meter
            strengthMeter.style.width = strength + '%';
            strengthMeter.style.backgroundColor = strength < 50 ? '#e74c3c' : 
                                                 strength < 80 ? '#f39c12' : 
                                                 '#2ecc71';
        });
    </script>
</body>
</html>
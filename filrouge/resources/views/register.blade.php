<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Inscription</title>
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #1a1e2e;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .auth-card {
            width: 100%;
            max-width: 400px;
            padding: 24px;
            border-radius: 6px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            background-image: url('{{ asset('images/background.jpg') }}');
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .auth-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(26, 30, 46, 0.85);
            border-radius: 6px;
            z-index: 0;
        }
        
        .auth-content {
            position: relative;
            z-index: 1;
        }
        
        .tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            margin-bottom: 24px;
        }
        
        .tab {
            padding: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
            color: #9ca3af;
            background: transparent;
            border: none;
        }
        
        .tab.active {
            color: #60a5fa;
            border-bottom: 2px solid #60a5fa;
        }
        
        .tab-content {
            display: none;
        }
        
        .tab-content.active {
            display: block;
        }
        
        .form-group {
            margin-bottom: 16px;
        }
        
        .form-input {
            width: 100%;
            height: 48px;
            padding: 0 16px;
            background-color: #2a304a;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 14px;
        }
        
        .form-input::placeholder {
            color: #9ca3af;
        }
        
        .btn {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 4px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            margin-top: 16px;
        }
        
        .btn-register {
            background-color: #ff6b35;
            color: white;
        }
        
        .btn-register:hover {
            background-color: #ff5a20;
        }
        
        .btn-login {
            background-color: #1a73e8;
            color: white;
        }
        
        .btn-login:hover {
            background-color: #1565d4;
        }
        
        .text-center {
            text-align: center;
        }
        
        .mt-4 {
            margin-top: 16px;
        }
        
        .text-sm {
            font-size: 12px;
        }
        
        .text-gray {
            color: #9ca3af;
        }
        
        a {
            color: #9ca3af;
            text-decoration: none;
        }
        
        a:hover {
            color: #d1d5db;
        }
    </style>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="auth-card">
        <div class="auth-content">
            <div class="tabs">
                <button class="tab active" data-tab="register">REGISTER</button>
                <button class="tab" data-tab="login">LOGIN</button>
            </div>
            
            <div class="tab-content active" id="register-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="Email" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="password" class="form-input" placeholder="Password" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="text" name="username" class="form-input" placeholder="Username" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm Password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-register">REGISTER</button>
                </form>
                
                <div class="text-center mt-4">
                    <a href="{{ route('password.request') }}" class="text-sm text-gray">Forgot Password?</a>
                    
                    <div class="text-sm text-gray mt-4">Already registered?</div>
                    
                    <button class="btn btn-login" id="switch-to-login">LOGIN</button>
                </div>
            </div>
            
            <div class="tab-content" id="login-content">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="form-group">
                        <input type="email" name="email" class="form-input" placeholder="Email" required>
                    </div>
                    
                    <div class="form-group">
                        <input type="password" name="password" class="form-input" placeholder="Password" required>
                    </div>
                    
                    <button type="submit" class="btn btn-login">LOGIN</button>
                </form>
                
                <div class="text-center mt-4">
                    <a href="{{ route('password.request') }}" class="text-sm text-gray">Forgot Password?</a>
                    
                    <div class="text-sm text-gray mt-4">Don't have an account?</div>
                    
                    <button class="btn btn-register" id="switch-to-register">REGISTER</button>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            const switchToLogin = document.getElementById('switch-to-login');
            const switchToRegister = document.getElementById('switch-to-register');
            
            function setActiveTab(tabId) {
                // Update tab buttons
                tabs.forEach(tab => {
                    if (tab.dataset.tab === tabId) {
                        tab.classList.add('active');
                    } else {
                        tab.classList.remove('active');
                    }
                });
                
                // Update tab contents
                tabContents.forEach(content => {
                    if (content.id === tabId + '-content') {
                        content.classList.add('active');
                    } else {
                        content.classList.remove('active');
                    }
                });
            }
            
            // Tab click handlers
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    setActiveTab(this.dataset.tab);
                });
            });
            
            // Button handlers
            switchToLogin.addEventListener('click', function() {
                setActiveTab('login');
            });
            
            switchToRegister.addEventListener('click', function() {
                setActiveTab('register');
            });
        });
    </script>
</body>
</html>


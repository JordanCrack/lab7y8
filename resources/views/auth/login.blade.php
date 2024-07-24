<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            max-width: 500px;
        }
        .login-card {
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            width: 100%;
            text-align: center;
            animation: fadeIn 0.6s ease-in-out;
        }
        .login-card h2 {
            margin-bottom: 2rem;
            font-weight: 600;
            color: #333;
        }
        .login-card .form-label {
            font-weight: 500;
            color: #555;
        }
        .login-card .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            margin-bottom: 1rem;
            padding: 0.75rem;
            font-size: 1rem;
        }
        .login-card .btn-primary {
            background-color: #6c5ce7;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            padding: 0.75rem;
            width: 100%;
            transition: background-color 0.3s, transform 0.2s;
        }
        .login-card .btn-primary:hover {
            background-color: #5a4bc2;
            transform: scale(1.02);
        }
        .login-card .form-text {
            margin-top: 1rem;
            color: #777;
        }
        .login-card .form-text a {
            color: #6c5ce7;
            text-decoration: none;
            font-weight: 500;
        }
        .login-card .form-text a:hover {
            text-decoration: underline;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @media (max-width: 500px) {
            .login-card {
                padding: 1.5rem;
            }
            .login-card h2 {
                font-size: 1.8rem;
            }
            .login-card .btn-primary {
                font-size: 0.9rem;
                padding: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card login-card">
            <h2>Login</h2>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <div class="form-text mt-3">
                    Don't have an account? <a href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

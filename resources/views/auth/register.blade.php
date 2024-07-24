<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }
        .register-container {
            background: #fff;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .register-container h2 {
            margin-bottom: 1.5rem;
            font-weight: 600;
            color: #333;
        }
        .register-container .form-label {
            font-weight: 600;
            color: #333;
            text-align: left;
        }
        .register-container .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 0.75rem;
            font-size: 1rem;
            margin-bottom: 1rem;
        }
        .register-container .btn-primary {
            background-color: #6c5ce7;
            border: none;
            padding: 0.75rem;
            width: 100%;
            border-radius: 10px;
            font-size: 1rem;
            transition: background-color 0.3s, transform 0.2s;
        }
        .register-container .btn-primary:hover {
            background-color: #5a4bc2;
            transform: scale(1.02);
        }
        .register-container .form-text {
            color: #333;
            margin-top: 1rem;
        }
        .register-container .form-text a {
            color: #6c5ce7;
            text-decoration: none;
            font-weight: 600;
        }
        .register-container .form-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <h2>Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <div class="form-text mt-3">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

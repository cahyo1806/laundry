<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f3f3f3, #1e90ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background: #fff;
            padding: 30px 50px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .login-container h1 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }

        .form-floating {
            margin-bottom: 20px;
        }

        .login-button {
            background: #1e90ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
        }

        .login-button:hover {
            background: #1c86ee;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>Login</h1>
        <form id="login-form" action="/path/to/your/login/handler" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                <label for="username">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                <label for="password">Password</label>
            </div>
            <button type="submit" class="btn login-button" onclick="redirectToTable(event)">Login</button>
        </form>
        <div class="mt-3">
            <a href="/forgot-password" class="link-primary">Forgot Password?</a>
        </div>
        <div class="mt-2">
            <a href="/register" class="link-primary">Register</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function redirectToTable(event) {
            event.preventDefault(); // Mencegah form submit default
            window.open('/pegawai', '_blank'); // Buka halaman Data Pegawai di tab baru
        }
    </script>
</body>
</html>

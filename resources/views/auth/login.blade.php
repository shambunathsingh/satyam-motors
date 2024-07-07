<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satyam Motors | Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body,
        html {
            height: 100%;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .image-side {
            flex: 1;
            position: relative;
        }

        .image-side img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .login-form {
            background: white;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-side">
            <img src="/images/bg-login.jpg" alt="Truck">
        </div>
        <div class="form-side">
            <div class="login-form">
                <h2>Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <button type="submit">Login</button>
                    <div class="register-div">Not registered yet? <a href="{{ 'register' }}"
                            class="link create-account" -link>Create
                            an account ?</a></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

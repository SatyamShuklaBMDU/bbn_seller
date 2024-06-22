<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .login-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .textbox {
            margin-bottom: 15px;
        }

        .textbox label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .textbox input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            outline: none;
        }

        .textbox input:focus {
            border-color: #007bff;
        }

        .btn {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .forgot {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-box">
            <h1>BBN Seller</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="textbox">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email"
                        value="{{ old('email') }}" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div class="textbox">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        value="{{ old('password') }}" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>

</html>

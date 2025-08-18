<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(-45deg, rgba(255, 154, 158, 0.5), rgba(250, 208, 196, 0.5), rgba(161, 196, 253, 0.5), rgba(194, 233, 251, 0.5));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            z-index: 0;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        h3 {
            font-style: italic;
        }

        .form-card {
            position: relative;
            z-index: 1;
            background: transparent;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            max-width: 420px;
            width: 100%;
            margin: auto;
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-label,
        .form-card h3 {
            font-family: 'Merriweather', serif;
            font-weight: 700;
        }

        .btn-primary {
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #764ba2, #667eea);
        }

        .toggle-link {
            text-align: right;
            display: block;
            margin-top: 10px;
            font-size: 0.9rem;
            color: black;
            cursor: pointer;
        }

        .container-fullscreen {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }
    </style>
</head>

<body>
    <div class="container-fullscreen">
        <div class="form-card">
            <h3 class="text-center mb-4">Login</h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" type="email" name="email" :value="old('email')" required
                        autofocus autocomplete="username" />
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" required
                        autocomplete="current-password" />>
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100">Login</button>
                <a href="forgotpassword.html" class="toggle-link">Forgot Password?</a>
            </form>
        </div>
    </div>
</body>

</html>
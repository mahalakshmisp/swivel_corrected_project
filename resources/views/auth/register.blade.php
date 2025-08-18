<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Student Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        a {
            color: #000;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(-45deg, rgba(255, 154, 158, 0.5), rgba(250, 208, 196, 0.5), rgba(161, 196, 253, 0.5), rgba(194, 233, 251, 0.5));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            z-index: 0;
        }

        @keyframes gradientBG {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .form-card {
            position: relative;
            z-index: 1;
            border-radius: 20px;
            padding: 2rem 3rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            max-width: 800px;
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
        h3 {
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

        .form-check-label {
            margin-right: 15px;
            font-weight: bold;
        }

        .toggle-password,
        .match-icon {
            position: absolute;
            top: 72%;
            transform: translateY(-50%);
            font-size: 1rem;
            cursor: pointer;
            color: #666;
        }

        .toggle-password {
            right: 40px;
        }

        .label {
            font-family: 'Merriweather', serif;
            font-weight: 700;
            color: #ede8edff;
        }

        .match-icon {
            right: 15px;
            pointer-events: none;
        }

        .match-icon.correct {
            color: green;
        }

        .match-icon.incorrect {
            color: red;
        }

        .container-fullscreen {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .form-control {
            border-color: #000;
        }
    </style>
</head>

<body>
    <div class="container-fullscreen">
        <div class="form-card">
            <h3 class="text-center mb-4">Student Signup</h3>

            <form method="POST" action="{{ route('register') }}" onsubmit="return validateForm()">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="name" :value="__('Full Name')" />
                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')"
                            required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="age" :value="__('Age')" />
                        <x-text-input id="age" class="form-control" type="text" name="age" :value="old('age')"
                            required />
                        <x-input-error :messages="$errors->get('age')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="email" :value="__('Email')" />
                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')"
                            required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="phone" :value="__('Phone Number')" />
                        <x-text-input id="phone" class="form-control" type="tel" name="phone" :value="old('phone')"
                            required />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="school" :value="__('School/College Name')" />
                        <x-text-input id="school" class="form-control" type="text" name="school" :value="old('school')"
                            required />
                        <x-input-error :messages="$errors->get('school')" class="mt-2" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="department" :value="__('Department')" />
                        <x-text-input id="department" class="form-control" type="text" name="department"
                            :value="old('department')" required />
                        <x-input-error :messages="$errors->get('department')" class="mt-2" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="address" :value="__('Address')" />
                        <textarea id="address" name="address" class="form-control" rows="2"
                            required>{{ old('address') }}</textarea>
                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-input-label class="label" for="district" :value="__('District')" />
                        <x-text-input id="district" class="form-control" type="text" name="district"
                            :value="old('district')" required />
                        <x-input-error :messages="$errors->get('district')" class="mt-2" />
                    </div>
                </div>

                <div class="mb-3">
                    <x-input-label class="label" :value="__('Gender')" />
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="other" name="gender" value="other" {{ old('gender') == 'other' ? 'checked' : '' }} required>
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                    <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 position-relative">
                        <x-input-label class="label" for="password" :value="__('Password')" />
                        <x-text-input id="password" class="form-control" type="password" name="password" required
                            minlength="5" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="col-md-6 mb-3 position-relative">
                        <x-input-label class="label" for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="form-control" type="password"
                            name="password_confirmation" required minlength="5" onkeyup="checkMatch()" />
                        <span id="matchIcon" class="match-icon"></span>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100 mt-3">Sign Up</button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}"
                        class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100">
                        Already registered?
                    </a>
                </div>
            </form>
        </div>
    </div>


    <script>
        const checkMatch = () => {
            const pass = document.getElementById("password").value;
            const confirm = document.getElementById("password_confirmation").value;
            const icon = document.getElementById("matchIcon");
            icon.textContent = confirm.length >= 5 ? (pass === confirm ? "✔" : "✖") : "";
            icon.className = `match-icon ${pass === confirm ? "correct" : "incorrect"}`;
        };

        const validateForm = () => {
            const pass = document.getElementById("password").value;
            const confirm = document.getElementById("password_confirmation").value;
            if (pass.length < 5 || confirm.length < 5) return alert("Password must be at least 5 characters."), false;
            if (pass !== confirm) return alert("Passwords do not match."), false;
            return true;
        };
    </script>
</body>

</html>
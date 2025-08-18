<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Course Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&display=swap" rel="stylesheet">


    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Raleway:wght@600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: url('./assets/Images/form.jpg') no-repeat center center fixed;
            background-size: cover;
            position: relative;
            font-family: 'Poppins', sans-serif;
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

        .form-card {
            position: relative;
            z-index: 1;
            background-color: transparent;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            max-width: 550px;
            width: 100%;
            animation: fadeIn 1s ease-in;
            margin: auto;
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

        h3 {
            font-family: Georgia, 'Times New Roman', Times, serif;
            font-style: italic;
            font-weight: 700;
            letter-spacing: 1px;
        }


        .form-label {
            font-weight: 600;
            font-size: 0.95rem;
            color: #1d06e983;
        }

        label {
            color: #1d06e983;

        }

        .btn-primary {
            background: linear-gradient(to right, #667eea, #764ba2);
            border: none;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background: linear-gradient(to right, #764ba2, #667eea);
        }

        .container-fullscreen {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }

        .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-fullscreen">
        <div class="form-card">
            <h3 class="text-center mb-4">Registration</h3>

            <form method="POST" action="/formdata">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="tel" class="form-control" name="phone" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control" name="location" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Payment Method</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="paymentMethod" value="upi" id="upi" required>
                        <label class="form-check-label" for="upi">UPI / Scanner</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="paymentMethod" value="emi" id="emi">
                        <label class="form-check-label" for="emi">EMI</label>
                    </div>
                </div>

                <div class="mb-3 hidden" id="emiDuration">
                    <label class="form-label">EMI Duration</label>
                    <select class="form-select" name="duration">
                        <option disabled selected>Select duration</option>
                        <option value="3">3 months</option>
                        <option value="6">6 months</option>
                        <option value="9">9 months</option>
                        <option value="12">12 months</option>
                        <option value="18">18 months</option>
                        <option value="24">24 months</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course Name</label>
                    <input type="text" class="form-control" id="course" name="course" readonly>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>

        </div>
    </div>

    <script>
        const radios = document.querySelectorAll('input[name="paymentMethod"]');
        const emiDiv = document.getElementById('emiDuration');

        radios.forEach(radio => {
            radio.addEventListener('change', () => {
                emiDiv.classList.toggle('hidden', radio.value !== 'emi');
            });
        });

        const urlParams = new URLSearchParams(window.location.search);
        const course = urlParams.get('course');
        const price = urlParams.get('price');

        document.getElementById('course').value = course;
        document.getElementById('price').value = price;
    </script>
</body>

</html>
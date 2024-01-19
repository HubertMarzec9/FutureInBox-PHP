<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="logo.png" type="image/png">
    <link rel="shortcut icon" href="logo.png" type="image/png">

    <style>
        body {
            background-color: #000000;
        }

        .nav-bg {
            background-color: #343a40;
        }

        .nav-link {
            color: #f0f0f0;
        }

        .main-bg {
            background-color: #e0e0e0;
        }

        .main-text {
            color: #000000;
        }

        .form-input {
            border-color: #00a0ff;
            color: #808080;
        }

        .submit-btn {
            background-color: #00a0ff;
            color: #ffffff;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .login-link {
            color: #00a0ff;
        }

        .footer-bg {
            background-color: #343a40;
        }

        #mobile-menu {
            display: none;
            position: absolute;
            top: 56px;
            right: 0;
            background-color: #343a40;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #mobile-menu a {
            display: block;
            padding: 8px 16px;
            color: #ffffff;
            text-decoration: none;
        }

        #logo-container {
            display: flex;
            align-items: center;
        }

        #logo-container img {
            margin-right: 8px;
        }

        #banner {
            background-color: #1A1D20;
            color: #9cc5dd;
            padding: 16px;
            text-align: center;
            margin-bottom: 20px;
        }

        .grecaptcha-badge {
            width: 70px !important;
            overflow: hidden !important;
            transition: all 0.3s ease !important;
            right: 1px !important;
        }

        .grecaptcha-badge:hover {
            width: 256px !important;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("form").submit();
        }
    </script>
    <title>Future In Box</title>
</head>

<body class="min-h-screen flex flex-col">
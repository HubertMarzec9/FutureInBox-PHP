<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #000000; /* Zmiana koloru tła strony na czarny */
        }

        .nav-bg {
            background-color: #343a40; /* Ciemny kolor tła nawigacji */
        }

        .nav-link {
            color: #f0f0f0; /* Zmiana koloru tekstu nawigacji na jasnoszary */
        }

        .main-bg {
            background-color: #e0e0e0; /* Zmiana koloru tła sekcji głównej na szary */
        }

        .main-text {
            color: #000000; /* Zmiana koloru tekstu sekcji głównej na czarny */
        }

        .form-input {
            border-color: #00a0ff; /* Zmiana koloru obramowania inputa na niebieski */
            color: #808080; /* Zmiana koloru tekstu inputa na szary */
        }

        .submit-btn {
            background-color: #00a0ff; /* Zmiana koloru tła przycisku submit na niebieski */
            color: #ffffff; /* Zmiana koloru tekstu przycisku submit na biały */
        }

        .submit-btn:hover {
            background-color: #0056b3; /* Zmiana koloru tła przycisku submit po najechaniu myszką */
        }

        .login-link {
            color: #00a0ff; /* Zmiana koloru tekstu linku logowania na niebieski */
        }

        .footer-bg {
            background-color: #343a40; /* Ciemny kolor tła stopki */
        }

        #mobile-menu {
            display: none;
            position: absolute;
            top: 56px;
            right: 0;
            background-color: #343a40; /* Ciemny kolor tła mobilnego menu */
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        #mobile-menu a {
            display: block;
            padding: 8px 16px;
            color: #ffffff; /* Kolor tekstu mobilnego menu */
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
    </style>
    <title>Future In Box</title>
</head>

<body class="min-h-screen flex flex-col">
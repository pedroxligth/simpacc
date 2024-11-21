<?php

use App\Controllers\Logout;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f4; /* Light background for modern look */
            font-family: 'Roboto', sans-serif; /* Modern font */
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-univicosa {
            max-width: 150px;
            margin-bottom: 20px;
        }

        /* Centralizando a imagem Simpac */
        .logo-simpac {
            display: block;
            max-width: 200px;
            margin: 0 auto 20px; /* Centraliza a imagem com margem inferior */
        }

        .btn-custom {
            width: 100%;
            margin-bottom: 15px;
            padding: 15px;
            border-radius: 10px;
            background-color: #0056b3;
            color: white;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-custom:hover {
            background-color: #004494;
            transform: translateY(-2px);
        }

        .btn-row {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .btn-small {
            width: 45%;
        }

        .btn-voltar {
            width: 150px;
            margin-top: 30px;
            background-color: #ccc;
            color: #333;
            border-radius: 10px;
            padding: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-voltar:hover {
            background-color: #bbb;
        }
        .btn-danger{
            width: 150px;
            margin-top: 30px;
            background-color: #C82333;
            color: #333;
            border-radius: 10px;
            padding: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease;

        }

        footer {
            background-color: #205483; /* Footer background color */
            color: #fff;
            text-align: center;
            padding: 40px 0; /* Increased padding for a taller footer */
            font-size: 16px; /* Increased font size */
            font-weight: bold;
            width: 100%; /* Ensure footer takes full width */
            position: relative; /* Position relative to allow for proper layout */
            bottom: 0; /* Stick to the bottom */
            margin-top: 30px; /* Add some space between the button and footer */
        }

        footer img {
            max-width: 80px;
            margin-top: 10px;
        }
        

        /* Responsividade para telas menores */
        @media (max-width: 768px) {
            .btn-custom {
                font-size: 16px;
            }

            .logo-simpac {
                max-width: 180px;
            }

            .btn-small {
                width: 100%;
            }

            footer {
                padding: 20px;
            }

            footer p {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <header>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa" class="logo-univicosa">
    </header>

    <div class="container">
        <!-- Logo Simpac centralizada -->
        <img src="<?= base_url('assets/images/simpac.png') ?>" alt="Logo Simpac" class="logo-simpac">

        <div class="btn-row">
            <a href="<?= site_url('simposio/iniciar') ?>" class="btn btn-custom btn-small">Iniciar Simpósio</a>
            <a href="<?= site_url('simposio/terminar') ?>" class="btn btn-custom btn-small">Terminar Simpósio</a>
        </div>

        <a href="<?= site_url('trabalhos/criar') ?>" class="btn btn-custom">Criar Trabalhos</a>
        <a href="<?= site_url('avaliador/dashboard') ?>" class="btn btn-custom">Resultados</a>
        <a href="<?= site_url('useradmin') ?>" class="btn btn-custom">Cadastrar Usuário</a>
        <a href="<?= site_url('usuarios') ?>" class="btn btn-custom">Avaliadores Cadastrados</a>

        
        <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>
    </div>

    <footer>
        <p>Univiçosa<br>contato@univicosa.com.br<br>(31) 3899-8000<br>Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa">
    </footer>

    
   


    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>

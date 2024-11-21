<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General page layout */
        body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
            margin: 0;
            background-color: #f4f4f4; /* Light background for modern look */
            font-family: 'Roboto', sans-serif; /* Modern font */
        }

        header {
            text-align: center;
            padding: 40px 0;
            background-color: #205483; /* Header background color */
            color: white;
        }

        /* Logo styling */
        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        /* Image container for XV and Simpac */
        .img-container {
            text-align: center;
            margin: 40px 0;
            position: relative;
            height: 250px;
        }

        /* Increased size and reduced gap between XV and Simpac */
        .img-container img {
            max-width: 250px;
            margin: 0 10px;
        }

        .img-container .xv-img {
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        .img-container .simpac-img {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Buttons styling */
        .content {
            text-align: center;
            flex-grow: 1;
            padding: 20px;
        }

        .content .btn {
            display: block;
            padding: 10px 20px;
            margin: 10px auto;
            font-size: 18px;
            border-radius: 25px;
            font-weight: bold;
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            width: fit-content;
            border: none; /* Remove border for a cleaner look */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .content .btn:hover {
            transform: translateY(-2px);
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Footer styling */
        footer {
            background-color: #205483; /* Footer background color */
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            font-weight: bold;
            margin-top: auto;
        }

        /* Logo in the footer */
        footer img {
            max-width: 100px;
            margin-top: 10px;
        }

        /* Alert styling */
        .alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1050; /* Bootstrap alert z-index */
            width: auto;
            max-width: 300px; /* Max width for alert */
        }
    </style>
</head>
<body>
    <header>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa" class="logo">
    </header>

    <div class="img-container">
        <img src="<?= base_url('assets/images/XV.png') ?>" alt="Imagem XV" class="xv-img">
        <img src="<?= base_url('assets/images/Simpac.png') ?>" alt="Imagem Simpac" class="simpac-img">
    </div>

    <div class="content">
        <a href="<?= site_url('login') ?>" class="btn">Admin</a>
        <a href="<?= site_url('avaliador') ?>" class="btn">Avaliador</a>
        <a href="<?= site_url('resumos') ?>" class="btn">Resumos Aprovados</a>
    </div>

    <footer>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa" class="logo">
        <p>Univiçosa<br> contato@univicosa.com.br<br> (31) 3899-8000<br> Viçosa - MG</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('message') ?>
    </div>
    <?php endif; ?>

</body>
</html>
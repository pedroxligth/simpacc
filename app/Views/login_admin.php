<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
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
            padding: 20px 0;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 10px;
        }

        .img-container {
            text-align: center;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .img-container img {
            max-width: 200px;
            margin: 10px 0;
        }

        .img-container img:nth-child(2) {
            margin-top: -110px;
        }

        .content {
            text-align: center;
            width: 100%;
            max-width: 400px; /* Tamanho máximo do formulário */
            margin: 20px auto; /* Centraliza o conteúdo */
            background-color: white; /* Fundo branco para o formulário */
            padding: 20px;
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra para o formulário */
        }

        h1, h2 {
            color: #00AFEF; /* Cor azul */
            margin-top: 10px;
            font-weight: bold;
        }

        h1 {
            font-size: 28px;
        }

        h2 {
            font-size: 20px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ccc;
            border-radius: 25px;
            font-size: 16px;
            color: #333;
        }

        button {
            display: block;
            padding: 10px 20px;
            margin: 10px auto;
            font-size: 18px;
            border-radius: 25px;
            font-weight: bold;
            background-color: #007bff; /* Bootstrap primary color */
            color: #fff;
            border: none; /* Remove border for a cleaner look */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            background-color: #0056b3; /* Darker shade on hover */
        }

        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
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
        }

        footer img {
            max-width: 80px;
            margin-top: 10px;
        }

        .voltar-btn {
            margin-top: 20px;
            padding: 10px 20px;
            border-radius: 25px;
            background-color: #ccc; /* Light gray for the back button */
            color: #333;
            border: none;
            cursor: pointer ;
            transition: background-color 0.3s ease;
        }

        .voltar-btn:hover {
            background-color: #bbb; /* Darker gray on hover */
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
    
    <h1>Portal do Admin</h1>
    <h2>BOAS VINDAS</h2>

    <div class="content">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('login/authenticate') ?>" method="post">
            <input type="text" name="username" placeholder="Usuário" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
    
    <button onclick="window.history.back()" class="voltar-btn">Voltar</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

    <footer>
        <p>Univiçosa<br> contato@univicosa.com.br<br> (31) 3899-8000<br> Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa">
    </footer>
</body>
</html>
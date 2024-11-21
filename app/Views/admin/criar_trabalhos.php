<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Trabalho</title>
    <style>
        /* Estilos gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(to bottom, #f0f4f7, #d9e5f3);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            flex-grow: 1;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 120px;
            margin-bottom: 10px;
        }

        .title {
            font-size: 32px;
            color: #205483;
            font-weight: 600;
        }

        /* Formulário */
        .form {
            background-color: #fff;
            width: 100%;
            max-width: 500px;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-size: 15px;
            color: #333;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            color: #555;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f7f9fc;
            transition: border-color 0.3s ease;
        }

        .form-input:focus {
            border-color: #007bff;
            outline: none;
        }

        textarea.form-input {
            min-height: 120px;
            resize: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #205483;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #164367;
        }

        /* Mensagens */
        .messages {
            width: 100%;
            margin-bottom: 15px;
            text-align: center;
        }

        .success-message {
            color: green;
            font-size: 14px;
            font-weight: 600;
        }

        .error-message {
            color: red;
            font-size: 14px;
            font-weight: 600;
        }

        .error-list {
            list-style-type: none;
            padding: 0;
            color: red;
            font-size: 14px;
        }

        /* Botão voltar */
        .voltar-btn {
            margin-top: 20px;
            padding: 12px 25px;
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .voltar-btn:hover {
            background-color: #5a6268;
        }

        /* Rodapé */
        footer {
            background-color: #205483;
            color: white;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
        }

        footer img {
            max-width: 80px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa" class="logo">
            <h1 class="title">Criar Trabalho</h1>
        </header>

        <div class="messages">
            <?php if (session()->getFlashdata('success')): ?>
                <p class="success-message"><?= session()->getFlashdata('success') ?></p>
            <?php elseif (session()->getFlashdata('error')): ?>
                <p class="error-message"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>

            <?php if (isset($errors)): ?>
                <ul class="error-list">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <form action="<?= base_url('criar-trabalho') ?>" method="post" class="form">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="protocolo" class="form-label">Protocolo:</label>
                <input type="text" name="protocolo" id="protocolo" value="<?= old('protocolo') ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="resumo" class="form-label">Resumo:</label>
                <textarea name="resumo" id="resumo" required class="form-input"><?= old('resumo') ?></textarea>
            </div>

            <div class="form-group">
                <label for="curso" class="form-label">Curso:</label>
                <input type="text" name="curso" id="curso" value="<?= old('curso') ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="modelo_avaliativo" class="form-label">Modelo Avaliativo:</label>
                <input type="text" name="modelo_avaliativo" id="modelo_avaliativo" value="<?= old('modelo_avaliativo') ?>" required class="form-input">
            </div>

            <div class="form-group">
                <label for="avaliadores" class="form-label">Avaliadores:</label>
                <input type="text" name="avaliadores" id="avaliadores" value="<?= old('avaliadores') ?>" required class="form-input">
            </div>

            <button type="submit">Criar Trabalho</button>
        </form>

        <button onclick="window.history.back()" class="voltar-btn">Voltar</button>
    </div>

    <footer>
        <p>Univiçosa<br>contato@univicosa.com.br<br>(31) 3899-8000<br>Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univicosa">
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 100vh;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: #205483;
        }

        header img {
            max-width: 120px;
        }

        h1 {
            color: #00AFEF;
            font-weight: bold;
            font-size: 28px;
            margin-top: 20px;
        }

        .content {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card {
            width: 100%;
            max-width: 500px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .form-group label {
            font-size: 14px;
            color: #666;
        }

        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 25px;
            border: 2px solid #ccc;
            font-size: 16px;
            color: #333;
        }

        button {
            display: block;
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            font-size: 18px;
            border-radius: 25px;
            font-weight: bold;
            background-color: #205483;
            color: #fff;
            border: 2px solid #00456b;
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        button:hover {
            transform: scale(1.05);
            border-color: #00385f;
        }

        .voltar-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #ccc;
            border-radius: 25px;
            color: #333;
            font-size: 16px;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            transition: background-color 0.3s ease;
        }

        .voltar-btn:hover {
            background-color: #bbb;
        }

        footer {
            background-color: #205483;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            font-size: 14px;
            font-weight: bold;
        }

        footer img {
            max-width: 80px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo">
    </header>

    <div class="content">
        <div class="card">
            <h1>Cadastrar Novo Usuário</h1>

            <?php if (session()->get('success')) : ?>
                <div class="alert alert-success"><?= session()->get('success') ?></div>
            <?php endif; ?>

            <form action="<?= site_url('useradmin/cadastrar') ?>" method="post">
                <div class="form-group">
                    <label for="username">Nome de Usuário</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="role">Tipo de Usuário</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="admin">Admin</option>
                        <option value="avaliador">Avaliador</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>

            <button onclick="window.history.back()" class="voltar-btn">Voltar</button>
        </div>
    </div>

    <footer>
        <p>Univiçosa<br>contato@univicosa.com.br<br>(31) 3899-8000<br>Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa">
    </footer>
</body>
</html>

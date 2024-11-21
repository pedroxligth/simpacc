<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
    <style>
        /* Reset de estilos */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9; /* Cor de fundo suave */
            color: #333; /* Cor do texto */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            background-color: #fff; /* Fundo branco para o container */
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 32px;
            letter-spacing: 2px;
            font-weight: 700;
            color: #333; /* Título em cor escura */
        }

        .table-container {
            background-color: #fff; /* Fundo branco para a tabela */
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        table {
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            font-size: 18px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 2px solid #ddd; /* Borda leve */
        }

        th {
            background-color: #007bff; /* Cor azul para cabeçalhos */
            color: white;
        }

        td {
            background-color: #f9f9f9; /* Cor de fundo clara para as células */
        }

        tr:hover td {
            background-color: #007bff; /* Cor azul no hover */
            color: #fff;
        }

        .back-btn-container {
            display: flex;
            justify-content: center;
        }

        .btn-voltar {
            display: inline-block;
            background-color: #007bff; /* Cor azul */
            color: white;
            padding: 12px 25px;
            font-size: 18px;
            text-align: center;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-voltar:hover {
            background-color: #0056b3; /* Cor mais escura no hover */
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .header h2 {
                font-size: 26px;
            }

            table th, table td {
                font-size: 16px;
            }

            .btn-voltar {
                font-size: 16px;
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Usuários Cadastrados</h2>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome de Usuário</th>
                    <th>Função</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($usuarios) > 0): ?>
                    <?php foreach ($usuarios as $usuario): ?>
                        <tr>
                            <td><?= esc($usuario['id']) ?></td>
                            <td><?= esc($usuario['username']) ?></td>
                            <td><?= esc($usuario['role']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">Nenhum usuário cadastrado.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="back-btn-container">
        <a href="javascript:history.back()" class="btn-voltar">Voltar</a>
    </div>
</div>

</body>
</html>

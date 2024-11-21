<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliação de Trabalhos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7fa;
            color: #333;
        }

        header {
            padding: 20px 0;
            text-align: center;
            background-color: #ffffff;
        }

        .logo {
            max-width: 180px;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-top: 30px;
            padding: 20px;
        }

        h2 {
            font-size: 2rem;
            font-weight: 500;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .trabalho {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .trabalho:hover {
            box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
        }

        .trabalho .badge {
            font-size: 14px;
            border-radius: 20px;
        }

        .avaliado {
            border-left: 5px solid #28a745;
        }

        .nao-avaliado {
            border-left: 5px solid #dc3545;
        }

        .avaliacao-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            font-size: 14px;
            padding: 8px 16px;
            border-radius: 4px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .modal-content {
            border-radius: 8px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #007bff;
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .modal-title {
            font-weight: 500;
        }

        .modal-body {
            padding: 20px;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
        }

        footer {
            background-color: #ffffff;
            color: #333;
            text-align: center;
            padding: 20px;
            font-size: 14px;
            box-shadow: 0px -2px 4px rgba(0, 0, 0, 0.1);
        }

        footer img {
            max-width: 60px;
            margin-top: 10px;
        }

        .filtro-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filtro-container input {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 10px;
            flex: 1;
        }

        .content {
            flex: 1;
            padding: 20px;
            padding-bottom: 100px;
        }
        .btn-excluir {
            margin-top: 10px; /* Espaço superior */
            margin-left: 10px; /* Espaço à esquerda, se necessário */
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
    </style>
</head>
<body>
<header>
    <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa" class="logo">
</header>

<div class="container">
    <h2>Avaliação de Trabalhos</h2>

    <div class="filtro-container">
        <input type="text" id="filtroProtocolo" class="form-control" placeholder="Buscar por protocolo">
        <input type="text" id="filtroAvaliador" class="form-control" placeholder="Buscar por avaliador">
        <button class="btn btn-primary" onclick="filtrarTrabalhos()">Filtrar</button>
    </div>
    
    <?php foreach ($trabalhos as $trabalho): ?>
    <div class="trabalho <?= $trabalho['avaliado'] ? 'avaliado' : 'nao-avaliado'; ?>" 
         data-protocolo="<?= esc($trabalho['protocolo']); ?>" 
         data-avaliador="<?= esc($trabalho['avaliadores']); ?>">
        <h3><?= esc($trabalho['resumo']); ?></h3>
        <p><strong>Curso:</strong> <?= esc($trabalho['curso']); ?></p>
        <p><strong>Protocolo:</strong> <?= esc($trabalho['protocolo']); ?></p>
        <p><strong>Modelo Avaliativo:</strong> <?= esc($trabalho['modelo_avaliativo']); ?></p>
        <p><strong>Avaliadores:</strong> <?= esc($trabalho['avaliadores']); ?></p>

        <?php if (!$trabalho['avaliado']): ?>
        <div class="avaliacao-buttons">
            <button class="btn btn-primary" data-toggle="modal" data-target="#avaliarPosterModal" data-trabalho-id="<?= $trabalho['id']; ?>" data-resumo="<?= esc($trabalho['resumo']); ?>">Avaliar Pôster</button>
            <button class="btn btn-secondary" data-toggle="modal" data-target="#avaliarOralModal" data-trabalho-id="<?= $trabalho['id']; ?>" data-resumo="<?= esc($trabalho['resumo']); ?>">Avaliar Oral</button>
        </div>
        <?php else: ?>
        <span class="badge badge-success">✓ Avaliado</span>
        <?php endif; ?>

        <button class="btn btn-danger btn-sm btn-excluir" data-toggle="modal" data-target="#confirmDeleteModal" 
        data-trabalho-id="<?= $trabalho['id']; ?>">
        <i class="fas fa-trash-alt"></i> Excluir
        </button>

    </div>
    <?php endforeach; ?>

</div>
<!-- Modal de Confirmação de Exclusão -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Exclusão</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Tem certeza de que deseja excluir este trabalho?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-danger" id="confirmDeleteButton">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal para Avaliação Pôster -->
                <div class="modal fade" id="avaliarPosterModal" tabindex="-1" role="dialog" aria-labelledby="avaliarPosterModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="avaliarPosterModalLabel">Avaliar Trabalho - Pôster</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="avaliacaoForm" method="post" action="<?= site_url('trabalho/avaliar'); ?>">
                                    <div class="modal-body">
                                        <input type="hidden" name="trabalho_id" id="trabalho_id" value="">
                                        <div class="form-group">
                                            <label for="comentario">Comentário</label>
                                            <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="elementosPainel">Elementos do Painel</label>
                                            <input type="number" class="form-control" name="elementosPainel" id="elementosPainel" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="clarezaInformacoes">Clareza nas Informações</label>
                                            <input type="number" class="form-control" name="clarezaInformacoes" id="clarezaInformacoes" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="autoresDescritores">Autores e seus descritores</label>
                                            <input type="number" class="form-control" name="autoresDescritores" id="autoresDescritores" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="distribuicaoInformacoes">Distribuição das Informações</label>
                                            <input type="number" class="form-control" name="distribuicaoInformacoes" id="distribuicaoInformacoes" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="apresentacao">Apresentação Oral do Pôster</label>
                                            <input type="number" class="form-control" name="apresentacao" id="apresentacao" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="pensamentoCientifico">Pensamento Científico</label>
                                            <input type="number" class="form-control" name="pensamentoCientifico" id="pensamentoCientifico" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="habilidade">Habilidade</label>
                                            <input type="number" class="form-control" name="habilidade" id="habilidade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="clareza">Clareza</label>
                                            <input type="number" class="form-control" name="clareza" id="clareza" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="minuciosidade">Minuciosidade</label>
                                            <input type="number" class="form-control" name="minuciosidade" id="minuciosidade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="conclusao">Conclusão</label>
                                            <input type="number" class="form-control" name="conclusao" id="conclusao" min="0" max="10">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn btn-primary">Salvar Avaliação</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>

                <!-- Modal para Avaliação Oral -->
                <div class="modal fade" id="avaliarOralModal" tabindex="-1" role="dialog" aria-labelledby="avaliarOralModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="avaliarOralModalLabel">Avaliar Trabalho - Oral</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="avaliacaoOralForm" method="post" action="<?= site_url('trabalho/avaliarOral'); ?>">
                                <div class="modal-body">
                                    <input type="hidden" name="trabalho_id" id="trabalho_id_oral" value="">
                                    <!-- Campos específicos para avaliação oral -->
                                    <div class="form-group">
                                            <label for="introducao_clareza_objetividade">Introdução: Clareza e Objetividade</label>
                                            <input type="number" class="form-control" name="introducao_clareza_objetividade" id="introducao_clareza_objetividade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="habilidade_organizacao_logica">Habilidade (Organização lógica da apresentação)</label>
                                            <input type="number" class="form-control" name="habilidade_organizacao_logica" id="habilidade_organizacao_logica" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="repeticoes_digressoes">repeticoes_digressoes</label>
                                            <input type="number" class="form-control" name="repeticoes_digressoes" id="repeticoes_digressoes" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="clareza_minuciosidade">Clareza e Minuciosidade</label>
                                            <input type="number" class="form-control" name="clareza_minuciosidade" id="clareza_minuciosidade" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="conclusao_objetiva">Conclusão e/ou Considerações Finais</label>
                                            <input type="number" class="form-control" name="conclusao_objetiva" id="conclusao_objetiva" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="independencia_raciocinio">Independência do Material e Raciocínio Lógico</label>
                                            <input type="number" class="form-control" name="independencia_raciocinio" id="independencia_raciocinio" min="0" max="10">
                                        </div>
                                        <div class="form-group">
                                            <label for="tempo_satisfatorio">Tempo de Apresentação Satisfatório</label>
                                            <input type="number" class="form-control" name="tempo_satisfatorio" id="tempo_satisfatorio" min="0" max="10">
                                        </div>

                                    <!-- Outros critérios da avaliação oral -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Salvar Avaliação</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                
                <a href="<?= site_url('logout') ?>" class="btn btn-danger">Logout</a>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
// Scripts para abrir modais com os dados correspondentes
$('#avaliarPosterModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);  // O botão que abriu o modal
    var trabalhoId = button.data('trabalho-id');  // Obtém o ID do trabalho
    var modal = $(this);
    modal.find('#trabalho_id').val(trabalhoId);  // Preenche o campo hidden com o ID do trabalho
});

$('#avaliarOralModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);  // O botão que abriu o modal
    var trabalhoId = button.data('trabalho-id');  // Obtém o ID do trabalho
    var modal = $(this);
    modal.find('#trabalho_id_oral').val(trabalhoId);  // Preenche o campo hidden com o ID do trabalho
});

function filtrarTrabalhos() {
    const protocoloInput = document.getElementById('filtroProtocolo').value.toLowerCase();
    const avaliadorInput = document.getElementById('filtroAvaliador').value.toLowerCase();
    const trabalhos = document.querySelectorAll('.trabalho');

    trabalhos.forEach(trabalho => {
        const protocolo = trabalho.getAttribute('data-protocolo').toLowerCase();
        const avaliador = trabalho.getAttribute('data-avaliador').toLowerCase();

        if ((protocolo.includes(protocoloInput) || protocoloInput === '') &&
            (avaliador.includes(avaliadorInput) || avaliadorInput === '')) {
            trabalho.style.display = 'block';
        } else {
            trabalho.style.display = 'none';
        }
    });
}

// Script para abrir o modal de confirmação de exclusão com o ID do trabalho
$('#confirmDeleteModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);  // O botão que abriu o modal
    var trabalhoId = button.data('trabalho-id');  // Obtém o ID do trabalho
    var modal = $(this);
    modal.find('#confirmDeleteButton').data('trabalho-id', trabalhoId);  // Armazena o ID do trabalho para exclusão
});

// Script para excluir o trabalho quando o botão de confirmação é clicado
$('#confirmDeleteButton').on('click', function () {
    var trabalhoId = $(this).data('trabalho-id');  // Obtém o ID do trabalho a ser excluído
    $.ajax({
        url: '<?= site_url('trabalho/excluir'); ?>/' + trabalhoId,  // URL para excluir o trabalho
        type: 'POST',
        success: function(response) {
            // Esconde o modal e recarrega a página ou remove o trabalho da lista
            $('#confirmDeleteModal').modal('hide');
            location.reload(); // Recarrega a página para refletir a exclusão
        },
        error: function() {
            alert('Erro ao excluir o trabalho.');
        }
    });
});
</script>
    <footer>
    <p>Univiçosa<br> contato@univicosa.com.br<br> (31) 3899-8000<br> Viçosa - MG</p>
        <img src="<?= base_url('assets/images/logo.png') ?>" alt="Logo Univiçosa">
    </footer>
</body>
</html>

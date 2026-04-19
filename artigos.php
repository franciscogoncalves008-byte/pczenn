<?php
// Mostra todos os erros PHP no browser (para diagnóstico)
ini_set('display_errors', 1);
error_reporting(E_ALL);

/*
 * artigos.php — Página de artigos com filtro por categoria
 *
 * O filtro funciona através de um parâmetro na URL:
 *   artigos.php              → mostra todos
 *   artigos.php?categoria=otimizacao  → mostra só otimização
 *   artigos.php?categoria=seguranca   → mostra só segurança
 *   artigos.php?categoria=hardware    → mostra só hardware
 *
 * O PHP lê esse parâmetro e decide quais os artigos a mostrar.
 * Não é necessária base de dados — os artigos estão escritos diretamente aqui.
 */

// Lê a categoria da URL. Se não vier nenhuma, usa "todos" por defeito
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';

// Lista de todos os artigos disponíveis
// Cada artigo tem: imagem, tag (categoria), título, data e texto
$artigos = [
    ['img' => 'pc.png',      'tag' => 'otimizacao', 'titulo' => 'Como Acelerar o Windows',         'data' => '24 de Março de 2026',     'texto' => 'Aprende técnicas simples para melhorar o desempenho do Windows: limpeza de ficheiros temporários, desativar programas na inicialização e ajustar as definições de energia.'],
    ['img' => 'backup.png',  'tag' => 'seguranca',  'titulo' => 'Backup Seguro',                   'data' => '20 de Março de 2026',     'texto' => 'Descobre diferentes métodos de backup — disco externo, nuvem, ou ambos — para garantir que os teus ficheiros estão sempre protegidos contra perdas acidentais.'],
    ['img' => 'digital.png', 'tag' => 'seguranca',  'titulo' => 'Dicas de Segurança Digital',     'data' => '18 de Março de 2026',     'texto' => 'Boas práticas para manteres o teu computador e dados seguros: usar antivírus, criar senhas fortes, manter o sistema atualizado e reconhecer tentativas de phishing.'],
    ['img' => 'setup.png',   'tag' => 'hardware',   'titulo' => 'Ideias de Setup',                 'data' => '10 de Março de 2026',     'texto' => 'Dicas para criares um ambiente de trabalho mais organizado e agradável. Desde a escolha do monitor até à organização dos cabos, pequenos detalhes fazem diferença.'],
    ['img' => 'drivers.png', 'tag' => 'otimizacao', 'titulo' => 'Atualizar Drivers no Windows',   'data' => '5 de Março de 2026',      'texto' => 'Os drivers são o que permite ao Windows comunicar com o hardware. Manter os drivers atualizados evita erros, melhora o desempenho e resolve problemas de compatibilidade.'],
    ['img' => 'repara.png',  'tag' => 'hardware',   'titulo' => 'Problemas Comuns e Como Resolver','data' => '28 de Fevereiro de 2026', 'texto' => 'PC a desligar sozinho? Ecrã azul? Som que não funciona? Este guia cobre os problemas mais comuns e como os resolver sem precisar de ir a uma loja.'],
];

// Nomes das categorias para mostrar nas etiquetas dos cartões
$nomes_categorias = [
    'otimizacao' => 'Otimização',
    'seguranca'  => 'Segurança',
    'hardware'   => 'Hardware',
];
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PcZen - Artigos</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <!-- Cabeçalho -->
    <div class="header-container">
        <div class="titulo-logo">
            <img src="img/logo3.png" alt="Logo PcZen" class="logo">
            <h1 class="titulo">PcZen</h1>
        </div>
        <p class="subtitulo">Manutenção e Otimização de Computadores</p>
    </div>

    <!-- Menu de navegação -->
    <nav id="menu">
        <ul class="menu-lista">
            <li class="menu-item"><a href="index.php"><i class="fa fa-home"></i>Início</a></li>
            <li class="menu-item"><a href="manutencao.php"><i class="fa fa-wrench"></i>Manutenção</a></li>
            <li class="menu-item"><a href="otimizacao.php"><i class="fa fa-desktop"></i>Otimização</a></li>
            <li class="menu-item"><a href="artigos.php"><i class="fa fa-newspaper"></i>Artigos</a></li>
            <li class="menu-item"><a href="contactos.php"><i class="fa fa-phone"></i>Contactos</a></li>
        </ul>
    </nav>

    <section class="artigos">
        <h2>Artigos</h2>
        <hr>
        <p class="intro-artigos">
            Tutoriais, guias práticos e dicas sobre computadores, segurança e tecnologia.
            Conteúdo escrito de forma simples para qualquer pessoa conseguir seguir.
        </p>

        <!--
            Botões de filtro — cada botão é um link para esta mesma página
            com um parâmetro diferente na URL (?categoria=...).
            O PHP adiciona a classe "ativo" ao botão que corresponde à categoria atual.
        -->
        <div class="filtro-categorias">
            <a href="artigos.php"                        class="btn-filtro <?= $categoria === 'todos'      ? 'ativo' : '' ?>">Todos</a>
            <a href="artigos.php?categoria=otimizacao"   class="btn-filtro <?= $categoria === 'otimizacao' ? 'ativo' : '' ?>">Otimização</a>
            <a href="artigos.php?categoria=seguranca"    class="btn-filtro <?= $categoria === 'seguranca'  ? 'ativo' : '' ?>">Segurança</a>
            <a href="artigos.php?categoria=hardware"     class="btn-filtro <?= $categoria === 'hardware'   ? 'ativo' : '' ?>">Hardware</a>
        </div>

        <!-- Cartões dos artigos filtrados pelo PHP -->
        <div class="artigos-cards">
            <?php foreach ($artigos as $artigo):
                // Se a categoria selecionada não for "todos" e o artigo não pertencer
                // a essa categoria, o PHP salta para o próximo sem mostrar nada
                if ($categoria !== 'todos' && $artigo['tag'] !== $categoria) continue;
            ?>
            <div class="card">
                <img src="img/<?= $artigo['img'] ?>" alt="<?= htmlspecialchars($artigo['titulo']) ?>">
                <span class="tag"><?= $nomes_categorias[$artigo['tag']] ?></span>
                <h3><?= htmlspecialchars($artigo['titulo']) ?></h3>
                <p class="data">Publicado em: <?= $artigo['data'] ?></p>
                <p><?= htmlspecialchars($artigo['texto']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 PcZen. Todos os direitos reservados.</p>
    </footer>

</body>
</html>

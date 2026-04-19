<?php
// Inclui o ficheiro de ligação à base de dados vou tirar e meter nas notas
require 'db.php';

// Função auxiliar que converte um número (1 a 5) em estrelas
// Exemplo: estrelas(3) devolve "★★★☆☆"
function estrelas($n) {
    return str_repeat('★', $n) . str_repeat('☆', 5 - $n);
}

// Variáveis que controlam se o formulário foi enviado com sucesso ou com erro
$avaliacao_enviada = isset($_GET['sucesso']);
$avaliacao_erro    = false;

// Verifica se o formulário foi submetido (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Lê os valores enviados pelo formulário e remove espaços desnecessários
    $nome          = trim($_POST['nome']          ?? '');
    $classificacao = intval($_POST['classificacao'] ?? 0);
    $texto         = trim($_POST['texto']          ?? '');

    // Valida se todos os campos estão preenchidos e a classificação é válida (1 a 5)
    if ($nome !== '' && $texto !== '' && $classificacao >= 1 && $classificacao <= 5) {

        // Prepara a instrução SQL para inserir na tabela "avaliacoes"
        // O "?" é um marcador de posição para evitar SQL Injection
        $stmt = $conn->prepare("INSERT INTO avaliacoes (nome, classificacao, texto) VALUES (?, ?, ?)");

        // Liga os valores reais aos marcadores: s=texto, i=número inteiro
        $stmt->bind_param('sis', $nome, $classificacao, $texto);

        // Executa a instrução e guarda se correu bem ou não
       if ($stmt->execute()) {
    header('Location: index.php?sucesso=1');
    exit;
} else {
    $avaliacao_erro = true;
}


// Carrega todas as avaliações da base de dados, da mais recente para a mais antiga
$avaliacoes = [];
$resultado = $conn->query("SELECT * FROM avaliacoes ORDER BY id DESC");
if ($resultado) {
    // Percorre cada linha devolvida e adiciona ao array
    while ($linha = $resultado->fetch_assoc()) {
        $avaliacoes[] = $linha;
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PcZen</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <!-- Cabeçalho com o logo e título do site -->
    <div class="header-container">
        <div class="titulo-logo">
            <img src="img/logo3.png" alt="Logo PcZen" class="logo">
            <h1 class="titulo">PcZen</h1>
        </div>
        <p class="subtitulo">Manutenção e Otimização de Computadores</p>
    </div>

    <!-- Menu de navegação principal -->
    <nav id="menu">
        <ul class="menu-lista">
            <li class="menu-item"><a href="index.php"><i class="fa fa-home"></i>Início</a></li>
            <li class="menu-item"><a href="manutencao.php"><i class="fa fa-wrench"></i>Manutenção</a></li>
            <li class="menu-item"><a href="otimizacao.php"><i class="fa fa-desktop"></i>Otimização</a></li>
            <li class="menu-item"><a href="artigos.php"><i class="fa fa-newspaper"></i>Artigos</a></li>
            <li class="menu-item"><a href="contactos.php"><i class="fa fa-phone"></i>Contactos</a></li>
        </ul>
    </nav>

    <!-- Texto de apresentação do site -->
    <section class="intro">
        <h2>Bem-vindo ao PcZen</h2>
        <hr>
        <p>O PcZen é um site criado para ajudar qualquer pessoa a entender melhor o seu computador,
           seja para o manter a funcionar bem, seja para o tornar mais rápido.
           Não precisas de ser um especialista — aqui explicamos tudo de forma simples e direta.</p>
        <p>Vais encontrar guias sobre manutenção, dicas de otimização, artigos sobre tecnologia
           e muito mais. O objetivo é que saias daqui com mais conhecimento do que quando entraste.</p>
        <p>Usa o menu em cima para navegar entre as secções ou clica nos cartões abaixo
           para ir diretamente ao que precisas.</p>
    </section>

    <!-- Cartões que ligam às três áreas principais do site -->
    <section class="categorias">
        <h2>O que podes encontrar aqui</h2>
        <hr>
        <div class="categorias-cards">
            <a href="manutencao.php" class="card-cat">
                <i class="fa fa-wrench"></i>
                <h3>Manutenção</h3>
                <p>Limpeza, atualizações, antivírus e backups. Mantém o teu PC em boas condições.</p>
            </a>
            <a href="otimizacao.php" class="card-cat">
                <i class="fa fa-tachometer-alt"></i>
                <h3>Otimização</h3>
                <p>Dicas para tornar o teu computador mais rápido e eficiente no dia a dia.</p>
            </a>
            <a href="artigos.php" class="card-cat">
                <i class="fa fa-newspaper"></i>
                <h3>Artigos</h3>
                <p>Tutoriais, guias práticos e notícias do mundo da tecnologia e computadores.</p>
            </a>
        </div>
    </section>

    <!-- Dois vídeos do YouTube incorporados na página -->
    <section class="videos">
        <h2>Aprende com Vídeo</h2>
        <hr>
        <p style="color:#94a3b8; font-size:15px;">Dois vídeos selecionados para começares bem.</p>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/QpQMr9WeOGU" allowfullscreen></iframe>
            <iframe src="https://www.youtube.com/embed/ojw5jmPK5Qg" allowfullscreen></iframe>
        </div>
    </section>

    <!-- Frase de destaque a itálico -->
    <section class="highlight">
        <p>Tecnologia não precisa de ser complicada — no PcZen, simplificamos para ti.</p>
    </section>

    <!-- Secção de avaliações dos utilizadores -->
    <section class="avaliacoes">
        <h2>Avaliações</h2>
        <hr>
        <p style="color:#94a3b8; font-size:15px; margin-bottom:25px;">O que os utilizadores dizem sobre o PcZen:</p>

        <div class="comentarios-lista">

            <!-- Avaliações fixas de exemplo -->
            <div class="comentario">
                <p class="nome-avaliador">João M.</p>
                <div class="estrelas-static">★★★★★</div>
                <p class="texto-comentario">"Muito bom site, aprendi bastante sobre como fazer backup dos meus ficheiros. Recomendo a toda a gente!"</p>
            </div>
            <div class="comentario">
                <p class="nome-avaliador">Ana P.</p>
                <div class="estrelas-static">★★★★☆</div>
                <p class="texto-comentario">"Boa informação, os vídeos ajudaram muito. Gostava de ver mais artigos sobre hardware."</p>
            </div>
            <div class="comentario">
                <p class="nome-avaliador">Carlos F.</p>
                <div class="estrelas-static">★★★★★</div>
                <p class="texto-comentario">"Finalmente um site em português que explica as coisas de forma simples. Muito bom trabalho!"</p>
            </div>

            <!-- Avaliações vindas da base de dados -->
            <!-- O PHP percorre o array $avaliacoes e cria um bloco HTML para cada uma -->
            <?php foreach ($avaliacoes as $av): ?>
            <div class="comentario">
                <!-- htmlspecialchars() converte caracteres especiais para evitar que código malicioso seja executado -->
                <p class="nome-avaliador"><?= htmlspecialchars($av['nome']) ?></p>
                <div class="estrelas-static"><?= estrelas($av['classificacao']) ?></div>
                <p class="texto-comentario">"<?= htmlspecialchars($av['texto']) ?>"</p>
            </div>
            <?php endforeach; ?>

        </div>

        <!-- Formulário para o utilizador deixar a sua avaliação -->
        <div class="form-avaliacao">
            <h3>Deixa a tua avaliação</h3>

            <!-- Mostra mensagem de sucesso ou erro conforme o resultado do envio -->
            <?php if ($avaliacao_enviada): ?>
                <p class="mensagem-sucesso">Obrigado! A tua avaliação foi publicada.</p>
            <?php elseif ($avaliacao_erro): ?>
                <p class="mensagem-erro">Preenche todos os campos antes de publicar.</p>
            <?php endif; ?>

            <!-- O formulário envia os dados para esta mesma página (index.php) via POST -->
            <form method="POST" action="index.php">

                <input type="text" name="nome" placeholder="O teu nome" required>

                <!-- Menu de seleção para a classificação em estrelas -->
                <select name="classificacao" required>
                    <option value="" disabled selected>Escolhe uma classificação</option>
                    <option value="5">★★★★★ — Excelente</option>
                    <option value="4">★★★★☆ — Muito bom</option>
                    <option value="3">★★★☆☆ — Bom</option>
                    <option value="2">★★☆☆☆ — Razoável</option>
                    <option value="1">★☆☆☆☆ — Mau</option>
                </select>

                <textarea name="texto" placeholder="Escreve aqui a tua opinião sobre o site..." required></textarea>
                <button type="submit">Publicar avaliação</button>
            </form>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 PcZen. Todos os direitos reservados.</p>
    </footer>

</body>
</html>

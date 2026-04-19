<?php
/*
 * contactos.php — Página de contacto com formulário
 *
 * Quando o utilizador preenche e envia o formulário:
 *   1. O PHP recebe os dados via POST
 *   2. Valida se todos os campos estão preenchidos
 *   3. Guarda a mensagem na tabela "contactos" da base de dados
 *   4. Mostra uma mensagem de sucesso (ou de erro se algo falhar)
 */

// Inclui a ligação à base de dados
require "db.php";

// Controla se o formulário foi enviado com sucesso ou se houve erro
$enviado = false;
$erro    = false;

// Verifica se o formulário foi submetido (método POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Lê e limpa os valores enviados
    // O operador "?? ''" devolve '' se a variável não existir (evita erros)
    $nome     = trim($_POST['nome']     ?? '');
    $email    = trim($_POST['email']    ?? '');
    $assunto  = trim($_POST['assunto']  ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    // Verifica se nenhum campo está vazio
    if ($nome !== '' && $email !== '' && $assunto !== '' && $mensagem !== '') {

        // Prepara a instrução SQL com marcadores "?" para evitar SQL Injection
        $stmt = $conn->prepare("INSERT INTO contactos (nome, email, assunto, mensagem) VALUES (?, ?, ?, ?)");

        // Liga os valores reais: s = string (texto)
        $stmt->bind_param('ssss', $nome, $email, $assunto, $mensagem);

        // Executa a instrução e guarda o resultado
        $enviado = $stmt->execute();
        if (!$enviado) $erro = true;

    } else {
        // Algum campo estava vazio
        $erro = true;
    }
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PcZen - Contactos</title>
   <link rel="stylesheet" href="CSS/estilo.css">
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
            <li class="menu-item"><a href="site.php"><i class="fa fa-home"></i>Início</a></li>
            <li class="menu-item"><a href="manutencao.php"><i class="fa fa-wrench"></i>Manutenção</a></li>
            <li class="menu-item"><a href="otimizacao.php"><i class="fa fa-desktop"></i>Otimização</a></li>
            <li class="menu-item"><a href="artigos.php"><i class="fa fa-newspaper"></i>Artigos</a></li>
            <li class="menu-item"><a href="contactos.php"><i class="fa fa-phone"></i>Contactos</a></li>
        </ul>
    </nav>

    <section class="contactos">
        <h2>Contacte-nos</h2>
        <hr>
        <p class="intro-contactos">
            Tens dúvidas, sugestões ou queres reportar um problema?
            Preenche o formulário abaixo e entraremos em contacto o mais breve possível.
        </p>

        <?php if ($enviado): ?>
            <!-- Mensagem mostrada depois de enviar com sucesso -->
            <!-- O formulário não aparece para evitar reenvios acidentais -->
            <p class="mensagem-sucesso">Obrigado! A tua mensagem foi enviada com sucesso. Responderemos em breve.</p>

        <?php else: ?>

            <!-- Mensagem de erro, se houver (aparece acima do formulário) -->
            <?php if ($erro): ?>
                <p class="mensagem-erro">Preenche todos os campos antes de enviar.</p>
            <?php endif; ?>

            <!-- Formulário que envia os dados para esta mesma página via POST -->
            <form method="POST" action="contactos.php">
                <input type="text"  name="nome"     placeholder="O teu nome"    required>
                <input type="email" name="email"    placeholder="O teu e-mail"  required>
                <input type="text"  name="assunto"  placeholder="Assunto"       required>
                <textarea           name="mensagem" placeholder="Descreve aqui a tua dúvida ou mensagem..." required></textarea>
                <button type="submit">Enviar mensagem</button>
            </form>

        <?php endif; ?>

        <!-- Informações de contacto alternativas -->
        <div class="info-contacto">
            <p><i class="fa fa-envelope"></i> pczen.info@gmail.com</p>
            <p><i class="fa fa-map-marker-alt"></i> Portugal</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 PcZen. Todos os direitos reservados.</p>
    </footer>

</body>
</html>

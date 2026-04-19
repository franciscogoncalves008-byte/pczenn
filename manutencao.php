<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PcZen - Manutenção</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

    <div class="header-container">
        <div class="titulo-logo">
            <img src="img/logo3.png" alt="Logo PcZen" class="logo">
            <h1 class="titulo">PcZen</h1>
        </div>
        <p class="subtitulo">Manutenção e Otimização de Computadores</p>
    </div>

    <nav id="menu">
        <ul class="menu-lista">
            <li class="menu-item"><a href="index.php"><i class="fa fa-home"></i>Início</a></li>
            <li class="menu-item"><a href="manutencao.php"><i class="fa fa-wrench"></i>Manutenção</a></li>
            <li class="menu-item"><a href="otimizacao.php"><i class="fa fa-desktop"></i>Otimização</a></li>
            <li class="menu-item"><a href="artigos.php"><i class="fa fa-newspaper"></i>Artigos</a></li>
            <li class="menu-item"><a href="contactos.php"><i class="fa fa-phone"></i>Contactos</a></li>
        </ul>
    </nav>

    <section class="manutencao">
        <h2>Manutenção de Computadores</h2>
        <hr>
        <p>Manter o computador em boas condições é essencial para que dure mais tempo e funcione sem problemas.
           Nesta secção encontras os principais tópicos que deves conhecer para cuidar bem do teu PC.</p>

        <div class="manutencao-cards">
            <div class="card">
                <h3><i class="fa fa-fan"></i> Limpeza Física</h3>
                <p>A poeira acumula-se dentro do computador ao longo do tempo e provoca sobreaquecimento.
                   Deves limpar o interior com ar comprimido a cada 6 meses, com especial atenção às ventoinhas
                   e ao dissipador do processador.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-sync"></i> Atualizações</h3>
                <p>Manter o Windows e os drivers atualizados é importante para a segurança e estabilidade.
                   As atualizações corrigem erros e protegem o sistema contra ameaças. Ativa as atualizações
                   automáticas para não te esqueceres.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-shield-alt"></i> Antivírus e Segurança</h3>
                <p>Um bom antivírus protege o teu computador de vírus, malware e outras ameaças.
                   O Windows Defender que vem com o Windows já oferece uma boa proteção base.
                   Faz análises regulares e evita descarregar ficheiros de fontes desconhecidas.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-save"></i> Backup de Dados</h3>
                <p>Fazer backup dos teus ficheiros importantes protege-te de perdas acidentais.
                   Podes usar um disco externo ou serviços de nuvem como o Google Drive ou OneDrive.
                   O ideal é ter uma cópia local e outra online.</p>
            </div>
        </div>

        <div class="dicas-lista">
            <h3><i class="fa fa-lightbulb"></i> Dicas Rápidas</h3>
            <ul>
                <li>Reinicia o computador pelo menos uma vez por semana para limpar a memória RAM.</li>
                <li>Não deixes o portátil a carregar toda a noite — isso desgasta a bateria mais rápido.</li>
                <li>Mantém pelo menos 10% do espaço do disco livre para o sistema funcionar bem.</li>
                <li>Não desligas o PC pelo botão de ligar enquanto está a funcionar, podes perder dados.</li>
                <li>Verifica regularmente se tens programas desnecessários a abrir com o Windows.</li>
            </ul>
        </div>

        <div class="videos-titulo" style="margin-top:40px;">
            <h2>Vídeos sobre Manutenção</h2>
            <hr>
        </div>
        <div class="manutencao-videos">
            <iframe src="https://www.youtube.com/embed/IBOyVkHDlts" allowfullscreen></iframe>
            <iframe src="https://www.youtube.com/embed/6Z-iFYyzpsg" allowfullscreen></iframe>
        </div>
    </section>

    <footer>
        <p>&copy; 2026 PcZen. Todos os direitos reservados.</p>
    </footer>

</body>
</html>

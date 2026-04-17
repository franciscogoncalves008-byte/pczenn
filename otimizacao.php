<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PcZen - Otimização</title>
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
            <li class="menu-item"><a href="site.php"><i class="fa fa-home"></i>Início</a></li>
            <li class="menu-item"><a href="manutencao.php"><i class="fa fa-wrench"></i>Manutenção</a></li>
            <li class="menu-item"><a href="otimizacao.php"><i class="fa fa-desktop"></i>Otimização</a></li>
            <li class="menu-item"><a href="artigos.php"><i class="fa fa-newspaper"></i>Artigos</a></li>
            <li class="menu-item"><a href="contactos.php"><i class="fa fa-phone"></i>Contactos</a></li>
        </ul>
    </nav>

    <section class="otimizacao">
        <h2>Otimização de Computadores</h2>
        <hr>
        <p>Um computador lento não significa que esteja avariado — muitas vezes só precisa de alguns ajustes.
           Aqui estão as formas mais eficazes de melhorar o desempenho do teu PC sem precisar de gastar dinheiro.</p>

        <div class="otimizacao-cards">
            <div class="card">
                <h3><i class="fa fa-rocket"></i> Velocidade do Sistema</h3>
                <p>Remove ficheiros temporários, desativa efeitos visuais desnecessários e ajusta
                   as definições de energia para desempenho. O Windows tem ferramentas próprias para isso.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-hdd"></i> Gestão do Armazenamento</h3>
                <p>Organiza os teus ficheiros, esvazia o Caixote do Lixo regularmente e usa o
                   Desfragmentador de disco (para HDDs). Se tiveres um SSD, não precisas de desfragmentar.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-cogs"></i> Programas na Inicialização</h3>
                <p>Muitos programas abrem sozinhos quando ligas o PC e tornam-no lento.
                   Vai ao Gestor de Tarefas, separador Inicialização, e desativa o que não precisas logo ao ligar.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-memory"></i> Memória RAM</h3>
                <p>Fecha programas que não estás a usar para libertar memória. Se o PC tiver menos
                   de 8 GB de RAM e for lento com várias abas abertas, uma atualização de hardware pode fazer grande diferença.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-shield-alt"></i> Segurança e Proteção</h3>
                <p>Vírus e malware podem deixar o computador muito lento. Mantém o antivírus ativo
                   e atualizado, e evita instalar programas de sites que não conheces.</p>
            </div>
            <div class="card">
                <h3><i class="fa fa-plug"></i> Energia e Temperatura</h3>
                <p>Define o plano de energia para "Alto desempenho" quando precisas de mais velocidade.
                   Temperaturas altas também reduzem o desempenho — verifica se as ventoinhas estão a funcionar.</p>
            </div>
        </div>

        <div class="imagens-final">
            <img src="img/limpeza.png" alt="Limpeza de ficheiros">
            <img src="img/drivers.png" alt="Atualização de drivers">
            <img src="img/software.png" alt="Otimização de software">
            <img src="img/seguranca.png" alt="Segurança do sistema">
        </div>
    </section>

    <footer>
        <p>&copy; 2026 PcZen. Todos os direitos reservados.</p>
    </footer>

</body>
</html>

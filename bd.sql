-- Tabela para guardar as avaliações dos utilizadores
CREATE TABLE IF NOT EXISTS avaliacoes (
    id            INT AUTO_INCREMENT PRIMARY KEY,
    nome          VARCHAR(100)  NOT NULL,
    classificacao TINYINT       NOT NULL,
    texto         TEXT          NOT NULL,
    data_envio    DATETIME      DEFAULT CURRENT_TIMESTAMP
);

-- Tabela para guardar as mensagens do formulário de contacto
CREATE TABLE IF NOT EXISTS contactos (
    id           INT AUTO_INCREMENT PRIMARY KEY,
    nome         VARCHAR(100)  NOT NULL,
    email        VARCHAR(150)  NOT NULL,
    assunto      VARCHAR(200)  NOT NULL,
    mensagem     TEXT          NOT NULL,
    data_envio   DATETIME      DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE candidatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    partido VARCHAR(50) NOT NULL,
    numero_votos INT DEFAULT 0,
    data_eleicao DATE NOT NULL
);
/* Arquivo: perguntas.sql */
/* Página para criar a tabela Perguntas */

CREATE TABLE perguntas (
    id SERIAL PRIMARY KEY,
    texto VARCHAR(255) NOT NULL
);
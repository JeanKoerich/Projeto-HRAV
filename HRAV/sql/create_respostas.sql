/* Arquivo: respostas.sql */
/* Página para criar Tabela de respostas */

CREATE TABLE respostas (
    id SERIAL PRIMARY KEY,
    pergunta_id INTEGER NOT NULL,
    usuario_id INTEGER NULL,
    valor INTEGER CHECK (valor BETWEEN 0 AND 10),
    feedback TEXT,
    dispositivo_id INTEGER NULL,
    data_avaliacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (pergunta_id) REFERENCES perguntas(id) ON DELETE CASCADE,
    FOREIGN KEY (dispositivo_id) REFERENCES dispositivos(id)
);
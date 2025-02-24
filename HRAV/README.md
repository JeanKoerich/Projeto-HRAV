# **HRAV**

    ##**Instruções de Instalação e Configuração**

    Este projeto é um sistema de feedback desenvolvido para o Hospital Regional Alto Vale. Siga as instruções abaixo para garantir que o sistema funcione corretamente em sua máquina local.

    ###**Requisitos do Sistema**
        - Banco de Dados PostgreSQL
        - PHP 7.4 ou superior

    ---

    ###**Passos para a configuração**

    ####**Arquivos**
    1. Clonar a pasta HRAV

    ---

    ####**Banco de Dados**
    2. Criar o Banco de Dados com o nome HRAV
    3. Importe os scripts da pasta SQL para o Banco de Dados:
        - sql/create_perguntas.sql
        - sql/create_respostas.sql 
        - sql/create_dispositivos.sql
        - sql/insert_dispositivos.sql
        - sql/insert_perguntas.sql

    ---

    ####**PHP.INI**    
    4. Habilitar extensão do PostgreSQL:
        - extension=pgsql
        - extension=pdo_pgsql

    ---

    ####**Arquivo Database.php**
    5. Atualize as informações de conexão com o Banco de Dados
        - $host = "localhost";
        - $port = "5432"; //Porta Padrão
        - $dbname = "HRAV";
        - $user = "seu_usuario_postgres";
        - $password = "sua_senha_postgres";
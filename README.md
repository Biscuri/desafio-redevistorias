# Desafio Rede Vistorias

Este repositório se refere à solução do desafio proposto.

# Dependências

Esse projeto requer um servidor web configurado (como nginx ou apache), com a porta 80 liberada e um banco de dados MySQL 5.7.
A máquina deve possuir pelo menos 4GB de RAM disponível para a instalação dos pacotes pelo composer (não são necessários 4GB para o projeto em si operar, apenas a instalação).

# Variáveis de ambiente

O arquivo .env disponibilizado já vem configurado, com exceção do bancos de dados. O seguinte trecho deve ser alterado no arquivo para a conexão:

```DB_HOST=ENDERECO_DO_HOST
DB_PORT=PORTA_DO_HOST
DB_DATABASE=NOME_DA_BASE_DE_DADOS
DB_USERNAME=NOME_DE_USUARIO
DB_PASSWORD=SENHA_DE_USUARIO
```

O usuário em questão deve ter permissão de SELECT, UPDATE e DELETE.

# Instalação

O projeto deve ser descompactado dentro da pasta configurada como entrada do servidor web (por exemplo, /var/www/).

O arquivo .env deve ser configurado da forma descrita acima.

O arquivo install.sh disponibilizado deve ser executado na pasta no projeto, uma única vez, e o projeto estará no ar.
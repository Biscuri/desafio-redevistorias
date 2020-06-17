# Desafio Rede Vistorias

Este repositório se refere à solução do desafio proposto.

# Dependências

Esse projeto requer um servidor web configurado (como nginx ou apache), com a porta 80 liberada e um banco de dados MySQL 5.7.
A máquina deve possuir pelo menos 4GB de RAM disponível para a instalação dos pacotes pelo composer (não são necessários 4GB para o projeto em si operar, apenas a instalação).

O usuário em questão deve ter permissão de SELECT, UPDATE e DELETE.

# Instalação

O projeto deve ser descompactado dentro da pasta configurada como entrada do servidor web (por exemplo, /var/www/html/).

O arquivo install.sh disponibilizado deve ser executado na pasta no projeto, com cinco parâmetros referentes à conexão do banco de dados:

```
./install.sh HOST PORTA NOME_DO_BANCO USUARIO SENHA
```

Feito isso, o projeto estará rodando.
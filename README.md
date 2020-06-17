# Desafio Rede Vistorias

Este repositório se refere à solução do desafio proposto.

# Dependências

Esse projeto requer um servidor web configurado (como nginx ou apache), com a porta 80 liberada e um banco de dados MySQL 5.7.

Recomenda-se que a máquina possua pelo menos 4GB de RAM disponível para a instalação dos pacotes pelo composer (não são necessários 4GB para o projeto em si operar, apenas a instalação).

Caso a máquina tenha pouca memória disponível, os seguintes comandos irão liberar temporariamente memória suficiente para rodar a instalação:

```
swapon -s
fallocate -l 4G /swapfile
chmod 600 /swapfile
mkswap /swapfile
swapon /swapfile
```

# Instalação

O projeto deve ser descompactado dentro da pasta configurada como entrada do servidor web (por exemplo, /var/www/html/).

O arquivo install.sh disponibilizado deve ser executado na pasta no projeto, com cinco parâmetros referentes à conexão do banco de dados:

```
./install.sh HOST PORTA NOME_DO_BANCO USUARIO SENHA
```

Digite yes quando o prompt pedir. Terminando de executar o script, o projeto estará rodando. Para rodar os testes, basta usar o comando:

```
php artisan test
```

Para que os testes rodem devidamente, o driver mysqlite deve estar habilitado no php.ini
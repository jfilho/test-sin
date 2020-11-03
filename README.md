# Sin Solution - Teste 

Teste para a vaga de desenvolvedor PHP

# Stack

 - Linguagem: [PHP](https://www.php.net/) -   [7.3.17](https://www.php.net/releases/index.php)
 - Framework: [Laravel](https://laravel.com/) -   [8.12](https://laravel.com/docs/8.x)
 - Framework JavaScript: [Vue.js](https://br.vuejs.org/) - [2.5.17](https://github.com/vuejs/vue)
 - Servidor de banco de dados: [Mysql](https://www.mysql.com/) - [5.7](https://dev.mysql.com/doc/relnotes/mysql/5.7/en/)

# Executar o projeto

Subir os containers com o comando abaixo:

```shell script
docker-compose up -d
```

Após isso rodar os comandos no container para configurar a aplicação:

```shell script
docker exec -it dev-app php composer install
docker exec -it dev-app cp .env.example .env
docker exec -it dev-app php artisan key:generate
docker exec -it dev-app php artisan migrate
docker exec -it dev-app php artisan db:seed
```

Feito isso a aplicação já estará funcionado no endereço http://localhost, para efetuar o login utilizar os dados abaixo:
- *usuário*: admin@admin.com
- *senha*: admin

Caso queira preencher o banco de dados com alguns dados aleatórios existem um seed para isso:

```shell script
docker exec -it dev-app php artisan db:seed --class "\Database\Seeders\TestSeeder"
```

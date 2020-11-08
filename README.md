## About API

Para iniciar a API:
    Passos: 
        1. docker-compose up --build -d
        2. docker-compose exec php-fpm composer install
        3. docker-compose exec php-fpm chmod 777 -R storage
        4. docker-compose exec php-fpm cp .env.example .env
        5. Editar o .env para colocar os dados de conexção do banco de dados (caso use o banco do docker utilizar o nome dado no docker-compose com host)
        6. docker exec -it voxus-mysql bash
        7. mysql -uadmin -pvoxus
        8. use voxus;
        9. copiar o sql em phpdocker/mysql/create-table.sql

Para executar os testes:
    1. docker-compose exec php-fpm php artisan test


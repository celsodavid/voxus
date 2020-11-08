## About API

Para iniciar a API

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
  10. Acessar http://localhost:8000/, se aparcer a página de bem vindo do Laravel, ocorreu tudo bem

Para executar os testes:
   1. docker-compose exec php-fpm php artisan test

Caso queira utilizar, tem a documentação criada em swagger:
[Api Doc](http://localhost:8000/swagger/);


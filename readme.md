# IngresseAPI

## Requisitos

```bash
PHP >= 7.1.3
Composer
MariaDB 10.1.38
```

## Antes de iniciar

Criar um banco de dados com o nome de ingresse_api

As credenciais do banco de dados podesem ser checadas e configuradas em /.env

```
Database => ingresse_api
Username => root
Password =>  (não definida, padrão da instalação)
```

## Iniciação

Abrir o Prompt de Comando do SO, navegar até a raiz desse projeto e executar os seguintes comandos

```bash
php artisan migrate
php artisan db:seed
php artisan serve

```

## Endpoins

GET /cliente/ 

POST /cliente/salvar

GET /cliente/info/{id}

PUT /cliente/atualizar/{id}

DELETE /cliente/{id}

## License
[MIT](https://choosealicense.com/licenses/mit/)
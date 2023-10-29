# Laravel Forum

Um CRUD de um forum de duvidas, usado para exercitar os conhecimentos de laravel.
Ainda pretendo adicionar:
- Sistema de Autenticação (cadastro/login);
- Gerenciamento de perfil de conta;
- Vincular duvidas a usuários;

## Passo a passo para rodar o projeto
Clone o projeto
```sh
git clone https://github.com/dihsantanna/laravel-forum.git
```

```sh
cd laravel-forum/
```


Crie o Arquivo .env
```sh
cp .env.example .env
```


Atualize essas variáveis de ambiente no arquivo .env
```dosini
APP_NAME="Laravel Forum"
APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=nome_que_desejar_db
DB_USERNAME=nome_usuario
DB_PASSWORD=senha_aqui

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acesse o container
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```


Gere a key do projeto Laravel
```sh
php artisan key:generate
```

Rode as migrations e seeders
```sh
php artisan migrate --seed
```


Acesse o projeto
[http://localhost:8989](http://localhost:8989)

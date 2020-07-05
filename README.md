<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
</p>

## Инструкция:

1.Загрузить репозиторий. Настроить подключение к базе данных в файле .env в корне проекта

Пример: 

DB_DATABASE=laravel_api <br>
DB_USERNAME=root   <br>
DB_PASSWORD=        <br>

**Запустить миграции:** <br>
php artisan migrate

**Запустить сидер**

composer dump-autoload

Запустить сервер. Открыть сайт. В правам верхнем углу выбрать Register
Зарегистрироваться.

После регистрации вы будете перенаправленны на адрес /home, где указан адрес запросов и инструкция по использованию API

При регистрации пользователя в событии email не отпраляетсья, но создаёться записи в логах 
storage\logs\message.log

Запуск тестов:

php artisan test


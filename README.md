# MiniShop — экзаменационный интернет-магазин на Laravel + AJAX

Тема: интернет-магазин аксессуаров для телефонов.

В проекте есть:
- регистрация и авторизация через Laravel Breeze;
- роли `admin` и `user`;
- админ-панель;
- CRUD товаров и категорий;
- каталог товаров;
- AJAX-поиск и фильтрация;
- AJAX-корзина через session;
- оформление заказа;
- история заказов пользователя;
- изменение статуса заказа в админке через AJAX;
- серверная валидация.

## Как установить

1. Создай новый Laravel-проект:

```bash
composer create-project laravel/laravel minishop
cd minishop
```

2. Установи Breeze:

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run build
```

3. Скопируй файлы из этого архива в папку проекта с заменой.

4. Настрой `.env`, например для SQLite:

```env
DB_CONNECTION=sqlite
```

Создай файл базы:

```bash
touch database/database.sqlite
```

Или настрой MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=minishop
DB_USERNAME=root
DB_PASSWORD=
```

5. Выполни миграции и сидеры:

```bash
php artisan migrate:fresh --seed
php artisan storage:link
```

6. Запусти сайт:

```bash
php artisan serve
```

## Админ

Email: `admin@example.com`

Password: `password`

## Пользователь

Email: `user@example.com`

Password: `password`

## Основные адреса

- `/` — главная
- `/products` — каталог
- `/cart` — корзина
- `/orders` — мои заказы
- `/admin` — админ-панель
- `/admin/products` — товары
- `/admin/categories` — категории
- `/admin/orders` — заказы

## Важно

Архив не содержит папку `vendor`, `node_modules` и стандартные файлы Laravel. Это набор файлов для копирования в чистый Laravel-проект.

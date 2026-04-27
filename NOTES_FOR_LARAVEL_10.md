# Если у тебя Laravel 10

В Laravel 10 middleware регистрируется не в `bootstrap/app.php`, а в `app/Http/Kernel.php`.

Добавь в `$middlewareAliases`:

```php
'admin' => \App\Http\Middleware\AdminMiddleware::class,
```

Файл `bootstrap/app.php` из архива нужен для Laravel 11/12.

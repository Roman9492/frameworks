# Frameworks - PHP Web Development

## Студент
- **Прізвище:** Задоєнко Роман
- **Група:** ІПЗ-24-3
  
## Опис
CRUD операції для ресурсу **Employee** (Працівник) реалізовані на двох фреймворках.

## Технології
- PHP 8.5.7
- Composer 2.10.1
- Symfony 8.1
- Laravel 13.16.1

## Endpoints

### Symfony (http://localhost:8001)
| Метод | URL | Опис |
|-------|-----|------|
| GET | /employees | Отримати всіх працівників |
| GET | /employees/{id} | Отримати працівника за ID |
| POST | /employees | Створити працівника |
| PATCH | /employees/{id} | Оновити працівника |
| DELETE | /employees/{id} | Видалити працівника |

### Laravel (http://127.0.0.1:8000)
| Метод | URL | Опис |
|-------|-----|------|
| GET | /api/employees | Отримати всіх працівників |
| GET | /api/employees/{id} | Отримати працівника за ID |
| POST | /api/employees | Створити працівника |
| PATCH | /api/employees/{id} | Оновити працівника |
| DELETE | /api/employees/{id} | Видалити працівника |

## Встановлення

### Symfony
```bash
cd symfony
composer install
php -S localhost:8001 -t public
```

### Laravel
```bash
cd laravel
composer install
php artisan migrate
php artisan serve
```

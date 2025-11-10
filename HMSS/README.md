# Hospital Management System (Laravel 10) - Starter Project

## Steps to install (recommended way)

1. Make sure you have PHP >= 8.1, Composer, Node/npm, and MySQL installed.

2. Create a fresh Laravel 10 project:
```bash
composer create-project laravel/laravel hospital
cd hospital
```

3. Copy files from this zip into your Laravel project root, overwriting the corresponding files/folders:
- `app/Models/*`
- `app/Http/Controllers/*`
- `database/migrations/*`
- `resources/views/*`
- `routes/web.php`

4. Install Laravel Breeze for auth scaffolding:
```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install
npm run dev
```

5. Configure your `.env` to use MySQL and set DB credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass
```

6. Run migrations:
```bash
php artisan migrate
```

7. Serve the app:
```bash
php artisan serve
```

8. Visit `http://127.0.0.1:8000`, register an account, then access Doctors / Patients / Appointments / Bills (routes are protected by auth).



# Student Result Portal — Laravel + XAMPP

This project implements Question 2 from the Web Engineering Lab exam.

## Included requirements
- Students migration: `name`, `roll`, `department`, `email`
- Results migration: `student_id`, `course_code`, `marks`, `grade`
- One-to-many Eloquent relationship (`Student hasMany Results`, `Result belongsTo Student`)
- Student resource controller with create, read, update and delete
- Blade views using a shared layout
- Server-side validation with field-level error messages
- Student result page with automatically calculated grade
- Authentication middleware protects student CRUD and result management routes
- Login/logout interface and a seeded admin account

## Front end and back end
- Front end: `resources/views/` contains the Blade pages and `public/css/app.css` contains the responsive styling.
- Back end: `routes/web.php` defines the routes; `app/Http/Controllers/` handles requests and validation; `app/Models/` contains the Eloquent relationships and grade calculation.
- The shared Blade layout is `resources/views/layouts/app.blade.php`.

## Requirements
- XAMPP with Apache and MySQL
- PHP 8.2 or newer (Laravel 12 requirement)
- Composer 2

## Installation on XAMPP (Windows)
1. Extract this folder into `C:\xampp\htdocs\student-result-portal`.
2. Start **Apache** and **MySQL** from XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin` and select the database you already created. The current `.env` points to `student_result_portal`; if your database has a different name, update only `DB_DATABASE` in `.env`.
4. Open Command Prompt in the project folder:
   ```bash
   cd C:\xampp\htdocs\student-result-portal
   composer install
   ```
5. The included `.env` is configured for the usual XAMPP MySQL defaults:
   - host: `127.0.0.1`
   - port: `3306`
   - database: `student_result_portal`
   - username: `root`
   - password: blank

   If your MySQL root account has a password, update `DB_PASSWORD` in `.env`.
6. The project already has an `APP_KEY`, and the migrations are already applied to the configured database. To start the app, run:
   ```bash
   php artisan serve
   ```
7. Open `http://127.0.0.1:8000`.

If you are setting up a fresh database, run `php artisan migrate --seed` once before `php artisan serve`. Do not run `migrate:fresh` on a database containing data; it deletes all tables and records.

## Default login
- Email: `admin@example.com`
- Password: `password`

Change this password after first login in a real deployment. This is a lab/demo starter account.

## Grade calculation
The question asks for automatic grade calculation but does not specify a grade scale. This project uses the following configurable default in `app/Models/Result.php`:

| Marks | Grade |
|---:|:---|
| 80–100 | A+ |
| 70–79.99 | A |
| 60–69.99 | A- |
| 50–59.99 | B |
| 40–49.99 | C |
| 0–39.99 | F |

Grade is assigned automatically whenever a result is saved; it is not accepted from the form.

## Useful commands
```bash
php artisan route:list
php artisan migrate:status
php artisan migrate:fresh --seed
```

`migrate:fresh` deletes existing tables and data, so use it only when you are okay resetting the database.

## Notes
- `vendor/` is not included in the ZIP; Composer creates it with `composer install`.
- Do not upload `.env` to a public Git repository. It is included here only because you requested a ready-to-configure XAMPP package.

# StudentHub - Student Management System (Laravel 13 + Breeze)

Login/register (Laravel Breeze, blade stack), relational migrations (students -> departments),
CRUD with search + filters, dashboard, and an animated UI.

## Quick setup

```bash
bash setup.sh        # creates ../student-management, installs Breeze, copies these files
cd ../student-management
# edit .env: DB_CONNECTION=mysql, DB_DATABASE=laravel, DB_USERNAME=root, DB_PASSWORD=
php artisan migrate:fresh --seed
php artisan serve
```

Or manually:

1. `composer create-project laravel/laravel:^13.0 student-management`
2. `composer require laravel/breeze --dev` then `php artisan breeze:install blade`
3. Copy `app/ database/ resources/ routes/` from this folder over the project (overwrite).
4. `npm install && npm run build`
5. Set MySQL in `.env`, then `php artisan migrate:fresh --seed` and `php artisan serve`.

Demo login: `admin@example.com` / `password`

### If Breeze will not install on Laravel 13
Copy the contents of `fallback-without-breeze/` over the project. It adds a small `AuthController`
and `routes/auth.php` with the same route names, so all views keep working.

## Requirements checklist

| Requirement | Where |
|---|---|
| Login & Register (Breeze) | Breeze controllers + `resources/views/auth/` (restyled) |
| Migrations with relationship | `database/migrations/*departments*`, `*students*` (FK `students.department_id` -> `departments.department_id`) |
| Models connected | `Student::department()` belongsTo, `Department::students()` hasMany |
| Seeding | `database/seeders/DatabaseSeeder.php` |
| CRUD + search by name + filters | `StudentController`, `DepartmentController`, `Student::scopeFilter` |
| HTML table listing | `students/index`, `departments/index` |

## Push to GitHub

```bash
git init
git add .
git commit -m "Laravel 13 Student Management System"
git branch -M main
git remote add origin https://github.com/<your-username>/<repo>.git
git push -u origin main
```

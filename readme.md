# GPlus project

### How to make it run?
1. `composer install`
2. `@php -r "file_exists('.env') || copy('.env.example', '.env');"`
3. Create the database and update the credentials in the `.env.` file
4. `php artisan key:generate`
5. `php artisan migrate`
6. `php artisan db:seed`
7. `npm i`
8. `npm run dev`
9. `php artisan serve`
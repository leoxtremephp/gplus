# GPlus project

### How to make it run?
1. `composer install`
2. `@php -r "file_exists('.env') || copy('.env.example', '.env');"`
3. Create the database and update the credentials in the `.env.` file
4. `php artisan migrate`
5. `php artisan db:seed`
6. `npm i`
7. `npm run dev`
8. `php artisan serve`
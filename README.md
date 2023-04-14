To install this project:
-create a .env file by copying it from .env.example
-run composer install
-run npm install
-create a new database in phpyadmin and change the name in .env file
-run php artisan migrate
-run php artisan db:seed --class=CategoriesTableSeeder
-run php artisan db:seed --class=CountriesTableSeeder
and that should work!

github repo for this project: https://github.com/TaniaZaitouny/project.git 
Admin Panel
1 ) git clone https://github.com/Ykutio/dashboard.git
2 ) go into chosen dir "XXX" : cd XXX (XXX - folder's name)
3 ) run install : composer install
4 ) create ".env" file from ".env.example" file
5 ) php artisan key:generate
6 ) add params to ".env" file for Database eg : DB_DATABASE=laravel8 DB_USERNAME=root DB_PASSWORD=root
7 ) migrate all tables : php artisan migrate
8 ) add admin and other data : php artisan db:seed
9 ) go to link https://your_domain/admin/login user : admin@gmail.com pass : admin
10 ) enjoy :)
=======

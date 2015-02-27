#Fural / Admin Panel

###Auto Installation
Just go to this route:
```
localhost/config
```
>Follow the instructions

**Enjoy!**

******
###Manual Installation
Configurate your database in the following route and file:
```
/app/config/database.php
```
Then run:
```
php artisan migrate --package=cartalyst/sentry
```

If you want a default seed, just run:
```
php artisan db:seed
```
> This seed will create the first user

* User:
```
fural@admin.com
```
* Password:
```
fural
```

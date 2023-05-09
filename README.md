Credentials for login:
Admin-> email = adminOne@gmail.com & password = 123456
User-> email = userOne@gmail.com & password = 123456

Please create a database and connect it with the env file. Once the database connection is established use the command php artisan migrate to create tables.
After migration use the command php artisan db:seed --class=CreateUsers so users will be created automatically.

Thank you!
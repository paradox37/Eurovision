## Requirements

- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- BCMath PHP Extension

## Eurovision voting application

To deploy this application localy you need to do the following:

- Clone the project
- Run the command `composer install --no-dev` to install dependencies
- Run the command `npm install`
- Run the command `npm run production`
- Create the copy of the file .env.example and name it .env
- Create MySQL database with utf8mb4 charset and utf8mb4_unicode_ci collation
- Set up the database connection in .env file (database name, username, password)
- Run the command `php artisan config:cache` to cache the configuration;
- Run the command `php artisan migrate -seed` to create database tables and fill it with data;
- Run the command `php artisan serve` to start the project. You can open it on localhost:8000.
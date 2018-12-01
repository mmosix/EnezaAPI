# EnezaAPI

> How to install
 - Clone the repository
 - Rename .env.example to .env
 - Set up database credentials in .env file
 - Run `composer update`
 - Run `php artisan migrate` to migrate the database
 - Run `php artisan passport:install` to configure OAuth
 - Run `php artisan db:seed` to load sample data
 - Run `phpunit`
 - Run `php artisan serve` to start application

 > Using a REST Client i.e Postman. Connect to the application and register. Endpoint should be in this form (http://localhost:8000/api/register)

 ## Parameters are
 - email
 - password
 - name
 > Login with {email, password} and a token will be generated.
 > Communicate with the API using the token as a Bearer Token.

 ### HEADERS
  - Accept           application/json
  - Authorization    Bearer generated_token_after_login
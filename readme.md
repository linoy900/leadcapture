## leadcapture
This project was generated with laravel 5.5 and  jquery 3.0.1


## installation requirement
php>=5.6
mysql>=5.5

## Configuration of projects
git clone https://github.com/linoy900/leadcapture.git
create a database called leadcapture
rename the file .env.example to .env
update SITE_URL and FOOTAGE_UPLOAD constant in .env file
update the database credentials in the .env file
run composer install
run php artisan migrate in terminal
run php artisan db:seed --class=UsersTableSeeder in terminal
run sql leads.sql which is in database/migrations

type in browser 'localhost/leadcapture/public'

##samplecredentials
Agent: login:linock007@gmail.com
password:secret

##flow
Leads can be created bhy guests
Agent registry is done
Registered agent can login and view the leads created by guests



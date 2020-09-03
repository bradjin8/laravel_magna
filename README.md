## Install

- Prerequisite
    - PHP 7.3
    - MySQL 5.7
    - Laravel 7.x

- Database settings
    - create a new database named as ```magna_db``` in MySQL
    - import ```magna_db.sql``` file to the database created
    - change database related values in ```.env``` file in the root directory
    ```DB_CONNECTION=mysql
       DB_HOST=127.0.0.1        # mysql server host
       DB_PORT=3306             # mysql server port
       DB_DATABASE=magna_db     # database name
       DB_USERNAME=root         # database user
       DB_PASSWORD=root         # database password
    ```


# Ready To Innovate

## Requirements
*  PHP
*  MySQL
* Apache

## Setup
Use database.sql to setup the table for the spider database.

Edit dbconnect.php with your mysql credentials.

Create the database and tables:

mysql -u XXXX -p readytoi_spider < database.sql

This app uses a captcha to ensure no robot creation of users.

Securimage: A PHP class dealing with CAPTCHA images, audio, and validation
https://www.phpcaptcha.org/documentation/quickstart-guide/

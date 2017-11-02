# create new database
CREATE DATABASE plug_db;

# set current table
USE plug_db;

# create a user_table admin for the DB
# mysql -u user_tableadmin -p < example.sql
GRANT ALL PRIVILEGES ON user_table TO 'user_admin'@'localhost' IDENTIFIED BY 'password';
SHOW GRANTS FOR  'user_admin'@'localhost';

# display all db admin users in mysql db
SELECT user FROM mysql.user GROUP BY user;

# remove an admin db user from mysql db
#DELETE FROM mysql.user WHERE user = 'username';

# display all records
SELECT * FROM user_table;


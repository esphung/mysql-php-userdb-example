/* DATABASE Method Outputs */
USE testdb;

DROP TABLE test;

CREATE TABLE test ( id_num INTEGER PRIMARY KEY auto_increment,username VARCHAR(30) not null, imageUrl VARCHAR(255) );

INSERT INTO test( id_num, username, imageUrl ) VALUES ( 1234567890, 'fbar100','http://faceflickr.com' );

SELECT * FROM test WHERE id_num = 1234567890;

DELETE FROM test WHERE id_num = 1234567890;

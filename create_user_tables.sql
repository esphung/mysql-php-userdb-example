--
-- Table structure for table `user_table`
--
CREATE TABLE user_table (
	user_id int(10) unsigned NOT NULL auto_increment,
	group_id int(10) unsigned NOT NULL default '0',
	user_login varchar(100) NOT NULL default '',
	user_email varchar(255) NOT NULL default '',
	user_fname varchar(255) NOT NULL default '',
	user_lname varchar(255) NOT NULL default '',
	user_phone varchar(15) NOT NULL default '',
	user_image_url varchar(255),
	PRIMARY KEY  (user_id),
	UNIQUE KEY user_login (user_login),
	KEY group_id (group_id)
);

-- 
-- Table structure for table `user_groups`
-- 

CREATE TABLE user_groups (
	group_id int(10) unsigned NOT NULL auto_increment,
	group_name varchar(255) NOT NULL default '',
	group_description text NOT NULL,
	group_attributes smallint(5) unsigned NOT NULL,
	PRIMARY KEY  (`group_id`),
  	UNIQUE KEY group_name (`group_name`)
);

-- 
-- Dumping data for table `user_table`
-- 

INSERT INTO user_table 
(user_id, group_id, user_login, user_email, user_fname, user_lname, user_phone,user_image_url) 
VALUES 
(1, 1, 'admin', 'admin@site.net', 'John', 'Doe', '+10123456789','http://www.foobar.com/'),
(2, 2, 'bob', 'bob@site.net', 'Bob', 'Smith', '+10123456789','http://www.foobar.com/'),
(3, 2, 'brian', 'brian@site.net', 'Brian', 'Doyle', '+10123456789','http://www.foobar.com/'),
(4, 3, 'cip', 'chip@site.net', 'Chip', 'Dale', '+10123456789','http://www.foobar.com/'),
(5, 3, 'chris', 'chris@site.net', 'Chris', 'Johnson', '+10123456789','http://www.foobar.com/');

-- --------------------------------------------------------------------------------------------------------------------------------------

-- 
-- Dumping data for table `user_groups`
-- 

INSERT INTO user_groups 
(group_id, group_name, group_description, group_attributes)
 VALUES 
(1, 'Administrators', 'Site Administrator''s Group', 555),
(2, 'Editors', 'Group with the article editors', 120),
(3, 'Users', 'Registered users', 40);


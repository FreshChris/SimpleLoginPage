CREATE TABLE datasystem (
   id int(11) AUTO_INCREMENT PRIMARY KEY not null,
   user_first varchar(255) not null,
   user_last varchar(256) not null,
   user_email varchar(256) not null,
   user_nickname varchar(256) not null,
   user_pwd (varchar(256) not null,
 );

INSERT INTO datasystem (user_first, user_last, user_email, user_nickname, user_pwd)
    VALUES ('Jora', 'Ursachi', 'ursachi@gmail.com', 'Jorik', 'test123');
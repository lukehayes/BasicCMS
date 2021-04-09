PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS users;

CREATE TABLE users(
    id integer PRIMARY KEY auto_increment,
    username text,
    password text
);

CREATE TABLE posts(
    id integer PRIMARY KEY AUTO_INCREMENT,
    title text,
    content text,
    user_id integer,
    FOREIGN KEY(user_id) REFERENCES posts(id)
);

insert into users(id, username, password) values(1, 'admin', 'password');
insert into posts(id, title, content, user_id) values(1, 'Example Title 1', 'Example Content 1', 1);
insert into posts(id, title, content, user_id) values(2, 'Example Title 2', 'Example Content 2', 1);
insert into posts(id, title, content, user_id) values(3, 'Example Title 3', 'Example Content 3', 1);

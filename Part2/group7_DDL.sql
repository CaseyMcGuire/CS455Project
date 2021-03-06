.mode columns
.headers on
.nullvalue NULL
PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Post;
DROP TABLE IF EXISTS Follows;

create table User(
       email TEXT PRIMARY KEY,
       password TEXT,
       screen_name TEXT
);

create table Comment(
       id INTEGER PRIMARY KEY,
       post_id INTEGER,
       user_email TEXT,
       content TEXT,
       date TEXT,
       time TEXT CHECK(GLOB('??:??', time)),

       foreign key(post_id) references Post(id)
       	       on update cascade
       	       on delete cascade

       foreign key(user_email) references User(email)
       	       on update cascade
	       on delete cascade
);

create table Post(
       id INTEGER PRIMARY KEY,
       user_email TEXT,
       title TEXT,
       content TEXT,
       date TEXT,
       time TEXT CHECK(GLOB('??:??', time)),

       foreign key(user_email) references User(email)
       	       on update cascade
	       on delete cascade
);

create table Follows(
       follower_email TEXT,
       followee_email TEXT,
       PRIMARY KEY(follower_email, followee_email),

       foreign key(follower_email) references User(email)
       	       on update cascade
	       on delete cascade,

       foreign key(followee_email) references User(email)
       	       on update cascade
	       on delete cascade

);

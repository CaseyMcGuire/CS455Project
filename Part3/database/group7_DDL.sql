.mode columns
.headers on
.nullvalue NULL
PRAGMA foreign_keys = ON;

create table User(
       email TEXT PRIMARY KEY,
       password TEXT,
       screen_name TEXT
);

create table Faves(
	email TEXT,
	id INTEGER,
  title TEXT,
	PRIMARY KEY(email, id),

	foreign key(email) references User(email)
		on update cascade
		on delete cascade,
    
	foreign key(id,title) references Post(id,title)
		on update cascade
		on delete cascade
);

create table Comment(
       id INTEGER PRIMARY KEY,
       post_id INTEGER,
       user_email TEXT,
       content TEXT,
       date TEXT,
       time TEXT CHECK(GLOB('??:??:??', time)),

       foreign key(post_id) references Post(id)
       	       on update cascade
       	       on delete cascade,

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
       time TEXT CHECK(GLOB('??:??:??', time)),

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

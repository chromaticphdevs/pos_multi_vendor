create table companies(
	id int(10) not null primary key auto_increment,
	company_name varchar(100),
	nature_of_business varchar(100),
	logo text,
	is_verified int(10),
	status enum('active','inactive'),
	created_by int(10),
	created_at timestamp default now()
);
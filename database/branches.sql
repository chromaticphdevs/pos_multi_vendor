create table branches(
	id int(10) not null primary key auto_increment,
	company_id varchar(100),
	branch_code varchar(50),
	branch_name varchar(100),
	login_key CHAR(10),
	created_by int(10),
	created_at timestamp default now()
);
create table products(
	id int(10) not null primary key auto_increment,
	sku varchar(50),
	company_id int(10),
	product_name varchar(50),
	branch_name varchar(100),
	created_by int(10),
	created_at timestamp default now()
);
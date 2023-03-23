create table branch_products(
	id int(10) not null primary key auto_increment,
	company_id int(10),
	branch_id int(10),
	product_id int(10),
	cost_price decimal(10,2),
	sell_price decimal(10,2),

	created_at timestamp default now()
);
/* tables for creating our tables */

/* -- user table -- */
/* user(id, email, password) */

create table user (
		user_id int not null primary key auto_increment, 
		email varchar(100),
		password char(64)
		);


/* -- customer table -- */
/* customer(id, first_name, last_name, address, city, state, zip_code) */

create table user_details (
		user_id int not null primary key,
		first_name varchar(25),
		last_name varchar(25),
		address varchar(100),
		city varchar(25),
		state varchar(25),
		zip_code char(10)
		);	


/* -- current_plan table -- */
/* current_plan(id, plan_type, date) */

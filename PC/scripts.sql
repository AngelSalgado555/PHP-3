use shop;

create table if not exists shop.components (
	id int PRIMARY key auto_increment,
	name varchar(255) not null,
	brand varchar(255),
	model varchar(255));

create table if not exists shop.pcs (
	id varchar(255) PRIMARY KEY ,
	owner varchar(255),
	brand varchar(255),
	price float
);

/* inserto una nueva columna */
alter table shop.components 
	add pc_id varchar(255);

/* añado la constraint con la foreign key */
alter table shop.components 
	add foreign key (pc_id) references shop.pcs(id);

/*
insert into shop.components (name, brand, model) values ("uno", "marca", "modelo");
insert into shop.components (id, name, brand, model) values (27, "uno", "marca", "modelo");
select * from shop.components where id = 99;
update  shop.components set name = "nuevo" where id = 31;
delete from shop.components  where id = 99;
*/

/*Añadir el pc 'pc7' que tiene 3 componentes n1, n2, n3*/
INSERT INTO shop.pcs (id, owner, brand, price) VALUES ('pc7', 'o', 'b', 150);
INSERT INTO shop.components (name, brand, model, pc_id) VALUES ('n1', 'b', 'm', 'pc7');
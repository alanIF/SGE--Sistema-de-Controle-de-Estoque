create table logs(
	id int auto_increment not null,
	data_i varchar(200) not null,
	acao varchar(200) not null,
	id_usuario int not null,
	primary key(id),
	foreign key(id_usuario) references users(id)
);

create table produto(
	id int auto_increment not null,
	descricao text not null,
	tipo text not null,
	estoque_minimo int not null,
    estoque_atual int not null,
	primary key(id)
);
create table entrada(
	id int auto_increment not null,
	id_produto int not null,
	id_usuario int not null,
	qtd int not null,
	data_entrada text not null,
	data_validade text not null,
	data_fabricacao text not null,
	observacao text,
	primary key(id)
);
create table saida(
	id int auto_increment not null,
	id_produto int not null,
	id_usuario int not null,
	qtd int not null,
	data_saida text not null,
	observacao text,
	primary key(id)
);

ALTER TABLE produto ADD created_at2 timestamp ;
ALTER TABLE produto ADD update_at timestamp ;


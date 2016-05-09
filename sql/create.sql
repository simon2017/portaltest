create table usuario (
id_usuario INT not null AUTO_INCREMENT,
nickname varchar(20) not null,
password varchar(20) not null,
PRIMARY KEY (id_usuario)
);

create table permisos(
id_permiso INT not null AUTO_INCREMENT,
nombre varchar(25) not null,
PRIMARY KEY (id_permiso)
);

create table permisos_usuario(
id_usuario INT not null,
id_permiso INT not null,
foreign key(id_usuario) references usuario(id_usuario) on delete cascade on update cascade,
foreign key(id_permiso) references permisos(id_permiso) on delete cascade on update cascade
);

insert into usuario(nickname,password) values('admin','admin');
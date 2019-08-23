CREATE DATATABLE BIBLIOTECA;

create table estado(
	idestado int PRIMARY key AUTO_INCREMENT,
    nombre varchar(45) not null
);

create table usuario(
	idusuario int PRIMARY key AUTO_INCREMENT,
    nombre varchar(45) not null,
    apellido varchar(45) not null,
    username varchar(45) not null,
	pass varchar(80) not null,
    fecha_create datetime DEFAULT CURRENT_TIMESTAMP,
    estado_idestado int,
    foreign key(estado_idestado) REFERENCES estado(idestado)  
);

create table tipo_prestamo(
	idtipo_prestamo int primary key AUTO_INCREMENT,
    nombre varchar(45) not null
);

create table autor(
	idautor int PRIMARY key AUTO_INCREMENT,
    nombre varchar(45) not null,
    estado_idestado int,
    foreign key(estado_idestado) REFERENCES estado(idestado)  

);


create table idioma(
	ididioma int primary key AUTO_INCREMENT,
    nombre varchar(45) not null
);

create table estado_libro(
	idestado_libro int PRIMARY key AUTO_INCREMENT,
    nombre varchar(45) not null
);


create table libro(
	idlibro int PRIMARY key AUTO_INCREMENT,
    codprefijo int not null,
    codpais int not null,
    codeditorial int not null,
    codreguistro int not null,
    titulo varchar(80) not null,
    copias int not null,
    costo int not null,
    edicion INT not null,
    anioedicion date not null,
    auto_idautor int not null,
    idioma_ididioma int not null,
    estado_libro_idestado int not null,
    FOREIGN key(auto_idautor) references autor(idautor),
    FOREIGN key(idioma_ididioma) REFERENCES idioma(ididioma),
    FOREIGN key(estado_libro_idestado) REFERENCES estado_libro(idestado_libro)
    
);

create table prestamo(
	idprestamo int PRIMARY key AUTO_INCREMENT,
    cantidad int not null,
    fecha date not null,
    usuario_idusuario int,
    tipo_prestamo_idtipo_prestamo int,
    libro_idlibro int,
    foreign key(usuario_idusuario) REFERENCES usuario(idusuario),
    foreign key(tipo_prestamo_idtipo_prestamo) REFERENCES tipo_prestamo(idtipo_prestamo),
    FOREIGN key(libro_idlibro) REFERENCES libro(idlibro)
);


create table descontinuados(
	iddescontinuados int primary key AUTO_INCREMENT,
    copias int not null,
    libro_idlibro int,
    foreign key (libro_idlibro) REFERENCES libro(idlibro)
);

/*tipos de estado de usuario*/
insert into estado(nombre) VALUES('activo');
insert into estado(nombre)VALUES('eliminado');

/*tipo de prestamo*/
insert into tipo_prestamo(nombre) VALUES('interno');
insert into tipo_prestamo(nombre)VALUES('externo');

/*tipo de estado del libro*/
insert into estado_libro(nombre) VALUES('activo');
insert into estado_libro(nombre)VALUES('descontinuado');

/*idiomas*/
insert into idioma(nombre) VALUES('español');
insert into idioma(nombre)VALUES('ingles');
insert into idioma(nombre)VALUES('frances');
insert into idioma(nombre)VALUES('italiano');
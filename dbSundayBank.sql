/*este codigo es en sintaxis MYSQL*/
CREATE DATABASE sundayBank;
USE sundayBank;

create table trabajador(
idtrabajador int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(50) not null,
app varchar(50) not null,
apm varchar(50) not null,
direccion varchar(100) not null,
email varchar(50) not null,
/*perfil se refiere a si es cajera o sistemas*/
perfil varchar(50) not null,
telefono varchar(50) not null,
/*acceso se refiere a tipo de usuario, administrador o usuario comun*/
acceso varchar(20) not null, 
/*usuario es el nombre para logearce*/
usuario varchar(20) not null,
password varchar(20) not null
);

create table cliente(
idcliente int AUTO_INCREMENT PRIMARY KEY,
nombre varchar(50)not null,
app varchar(50) not null,
apm varchar(50) not null,
ci varchar(50) unique not null
);

create table cuenta(
idcuenta int AUTO_INCREMENT PRIMARY KEY,
numcuenta int NOT null,
idclientefk INT NOT null,
monto decimal(19,2) not null,
FOREIGN KEY(idclientefk) REFERENCES cliente(idcliente)
);

create table detalle(
iddetalle int AUTO_INCREMENT PRIMARY KEY,
idtrabajadorfk int not null,
idclientefk int not null,
idcuentafk int not null,
/*para insertar fecha por deflut o mediante insercccion pero no se puede actualizar*/
fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
descripcion varchar(50),
monto decimal(19,2) not null,
FOREIGN key(idtrabajadorfk) references trabajador(idtrabajador),
FOREIGN key(idclientefk) references cliente(idcliente),
FOREIGN key(idcuentafk) references cuenta(idcuenta)
);

create table informacion(
idinformacion int auto_increment primary key,
idsalvado int
);
/*--------procedimiento almacenados*/
/*-----buscar cliente por ci*/
create procedure buscar_ci_cliente(ci int)
select * from cliente 
where cliente.cicliente=ci;
/*-----CALL buscar_ci_cliente(1111)*/
/*------creando vista vis_cliente_cuenta*/
create view vis_cliente_cuenta
as
SELECT * FROM cuenta C
INNER JOIN cliente CI
ON C.idclientefk=CI.idcliente;
/*-----select * from vis_cliente_cuenta*/
/*------------insertando datos en la database para el reporte*/

insert into trabajador(nombre,app,apm,direccion,email,perfil,telefono,acceso,usuario,password)
values('ali','condori','ticona','zona sur','ali@ali.com','sistemas','777777','administrador','ali',1234);

insert into cliente(nombre,app,apm,ci) values('aldo','caspa','ponce',10253697);
insert into cliente(nombre,app,apm,ci) values('jorge','elvis','cuellar',1025658);
insert into cliente(nombre,app,apm,ci) values('alejandro','guarachi','cuellar',1024796);
insert into cliente(nombre,app,apm,ci) values('kevin','zarate','lopez',1035699);
insert into cliente(nombre,app,apm,ci) values('manuel','velis','montaño',1077777);
insert into cliente(nombre,app,apm,ci) values('valerio','padilla','cruz',1055555);

insert into cuenta(numcuenta,idclientefk,monto) values(9065449,1,200);
insert into cuenta(numcuenta,idclientefk,monto) values(9022255,2,100);
insert into cuenta(numcuenta,idclientefk,monto) values(9036987,3,400);
insert into cuenta(numcuenta,idclientefk,monto) values(9061212,4,700);
insert into cuenta(numcuenta,idclientefk,monto) values(9089897,5,800);
insert into cuenta(numcuenta,idclientefk,monto) values(9065999,6,100);




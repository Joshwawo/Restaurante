Create database Restaurante;

use Restaurante;

create table Comidas(
id_Comida int(50) not null AUTO_INCREMENT,
`name` varchar(50) not Null,
`price` varchar(50) not null,
`image` varchar(250) not null,
constraint PK_Comida_ID_Comida Primary Key(id_Comida)
);

create table Usuarios(
    id_usuario varchar(50) not null,
    contrasena varchar(50) not null,
    nombreCompleto varchar(100) not null,
    correo varchar(50) not null,
    direccion varchar(50) not null,
    constraint PK_Usuarios_ID_Usuarios Primary key(id_usuario)
);

create table Pedido(
    id_Pedido int(50) not null AUTO_INCREMENT,
    id_Factura varchar(50) not null,
    id_Comida int(50) not Null,
    id_usuario varchar(50) not null,
constraint PK_Pedido_ID_Pedido Primary Key(id_Pedido)
);

create table Factura(
    id_factura int(50) not null AUTO_INCREMENT,
    id_Comida int(50) not Null,
    id_usuario varchar(50) not null,
    fechadeFactura date not null,
    total decimal(5,2) not null,
    constraint PK_FACTURA_ID Primary key(id_factura)
);

Alter table Factura
add constraint FK_id_Comida
foreign Key(id_Comida)
References Comidas(id_Comida)
ON update CASCADE
on delete CASCADE;

Alter table Factura
add constraint FK_Usuarios_ID_Usuario
foreign key(id_usuario)
References Usuarios(id_usuario)
ON update CASCADE
on delete CASCADE;



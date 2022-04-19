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
    id_order int(255) not null,
    id int(255) not null,
    id_Pedido int(50) not null,
    constraint PK_FACTURA_ID Primary key(id_factura)
);

Create table cart(
    id int(255) not null AUTO_INCREMENT,
    `name` varchar(255) not null,
    price varchar(255) not null,
    `image` varchar(255) not null,
    quantity int(255) not null,
    constraint PK_id_Pedido Primary key(id)
);


Create table `Order`(
    id_order int(255) not null AUTO_INCREMENT,
    `name` varchar(100) not null,
    `number` varchar (100) not null,
    email varchar (100) not null,
    method varchar (100) not null,
    flat varchar (100) not null,
    street varchar (255) not null,
    city varchar (100) not null,
    `state` varchar (100) not null,
    country varchar (100) not null,
    pin_code int (10) not null,
    total_products varchar (255) not null,
    total_price varchar (255) not null,
    constraint PK_ID_ORDER Primary key(id_order)
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

Alter table Factura
add constraint PK_ID_ORDER
foreign key(id_order)
References `Order`(id_order)
ON update CASCADE
on delete CASCADE;

Alter table Factura
add constraint PK_id_Pedido
foreign Key(id)
References cart(id)
ON update CASCADE
on delete CASCADE;

Alter table Factura
add constraint PK_Pedido_ID_Pedido
foreign Key(id_Pedido)
References Pedido(id_Pedido)
ON update CASCADE
on delete CASCADE;




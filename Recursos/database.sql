drop database simpsondexlopezducas;

create database simpsondexlopezducas;

use simpsondexlopezducas;

create table Usuario(
id int not null,
usuario varchar(20),
contrasenia text,
primary key (id)
);
create table Personaje(
id int not null,
nombre varchar(30) not null,
ciudad varchar(15) not null,
url_imagen varchar(30),
descripcion text not null,
primary key (id)
);

insert into Personaje(id, nombre, ciudad, url_imagen, descripcion)
values (1,"Homero Simpson","Springfield", "homero.jpg", "Es el personaje principal. Es una sátira de los norteamericanos promedio. Las bromas indirectas se pueden encontrar en su personalidad, su actitud, su filosofía, su idiosincrasia, etc. Su alimentación es poco equilibrada: Grasas saturadas, cerveza y tulipanes."),
(2,"Marge Simpson","Springfield", "marge.jpg", "Es uno de los personajes principales. Representa el papel de madre trabajadora, cariñosa, paciente y devota, normalmente despreciada por sus hijos y cuyo marido no la escucha."),
(3,"Bart Simpson","Springfield", "bart.jpg", "Es uno de los personajes principales. Es un niño al que poco le gusta estudiar, pero atiende con regularidad al colegio. Prefiere pasar su tiempo libre fuera de casa, desatendiendo sus tareas escolares, socializándose con sus amigos y planeando bromas o trastadas con su mejor amigo Milhouse"),
(4,"Lisa Simpson","Springfield", "lisa.jpg", "Es uno de los personajes principales. Lisa es lista, curiosa, ambiciosa, tiene un gran orgullo y un alto ego como se demuestra varios episodios y demuestra ser el miembro de la familia con más conocimiento intelectual, sobre todo de ámbitos académicos."),
(5,"Maggie Simpson","Springfield", "maggie.jpg", "Es uno de los personajes principales. Maggie representa el papel de un bebé desatendido en una familia disfuncional, que ha tenido que desarrollar una forzada autosuficiencia. "),
(6,"Ayudante de Santa","Springfield", "santa.png", "Es el perro de la familia Simpson. Es de raza galgo, concretamente un greyhound, y lo tienen tan mal atendido que a simple vista parece un animal de la calle. ");

insert into Usuario(id, usuario, contrasenia)
values (1, "Admin", "1234");
select * from Usuario;

alter user 'root'@'localhost' identified with mysql_native_password by '123456';
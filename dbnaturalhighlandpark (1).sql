-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2022 a las 18:43:31
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbnaturalhighlandpark`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `idbitacora` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`idbitacora`, `idusuario`, `fecha`, `tipo`, `descripcion`) VALUES
(1, 57, '2021-07-09 17:56:01', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabañas, Descripción: Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados  finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes., Estado: Activo, Maximo Personas: 6, Minimo Personas: 1, Menores Gratis X Pareja: 1, Mascotas: SI, Maximo Mascotas: 2'),
(2, 57, '2021-07-09 18:00:03', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabañas, Descripción: Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados  finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes., Estado: Activo, Maximo Personas: 6, Minimo Personas: 1, Menores Gratis X Pareja: 1, Maximo Mascotas: 2'),
(3, 57, '2021-07-09 18:03:14', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: 1 cama King Size, Descripción: King'),
(4, 57, '2021-07-09 18:04:34', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: 2 Camas Matrimoniales, Descripción: matri'),
(5, 57, '2021-07-09 18:04:50', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Sala Familiar, Descripción: sala'),
(6, 57, '2021-07-09 18:05:04', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: 1 Baño, Descripción: baño'),
(7, 57, '2021-07-09 18:05:05', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: 1 Baño, Descripción: baño'),
(8, 57, '2021-07-09 18:05:16', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: 1 Sala Familiar, Descripción: sala'),
(9, 57, '2021-07-09 18:05:24', 'inmuebles', 'Se elimino una caracteristica de tipo de inmueble, Nombre: 1 Baño'),
(10, 57, '2021-07-09 18:05:37', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Balcón, Descripción: balcón'),
(11, 57, '2021-07-09 18:06:21', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Aire Acondicionado, Descripción: aire'),
(12, 57, '2021-07-09 18:11:54', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Glamping, Descripción: Glamping Monarca, ofrece una experiencia única en cinco carpas equipadas con todas las comodidades en medio del bosque nuboso. Además de ofrecer un ambiente tranquilo en medio de la naturaleza, tiene una area exclusiva donde el huesped cuenta con una sala en el exterior, servicio de baño y ducha privada. Es una experencia donde la comodidad y la naturaleza se vuelven uno., Estado: Activo, Maximo Personas: 3, Minimo Personas: 1, Menores Gratis X Pareja: 1, Mascotas: NO, Maximo Mascotas: 0'),
(13, 57, '2021-07-09 18:12:12', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: 1 Cama Matrimonial, Descripción: matri'),
(14, 57, '2021-07-09 18:12:27', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: 1 Cama Imperial, Descripción: imperial'),
(15, 57, '2021-07-09 18:12:40', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: 1 Baño Con ducha, Descripción: baño'),
(16, 57, '2021-07-09 18:12:57', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Televisor con Cable, Descripción: TV'),
(17, 57, '2021-07-09 18:13:09', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Frigobar, Descripción: 1'),
(18, 57, '2021-07-09 18:13:27', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Sala Privada Exterior, Descripción: sala'),
(19, 57, '2021-07-09 18:13:41', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Termo de Café y Champurradas, Descripción: termo'),
(20, 57, '2021-07-09 18:15:44', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Cabaña Arcoiris, Descripción: La cabaña Arcoiris es de color verde y cuenta con dos pisos en su interior, una sala familiar, tres camas, un baño y un balcón desde el cual puedes observar un bello atardecer. La cabaña incluye un ambiente acogedor privado en el exterior para poder compartir con su familia y amigos.  Es el lugar perfecto para estar en sintonía con la naturaleza., Estado: Activo'),
(21, 57, '2021-07-09 18:17:06', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(22, 57, '2021-07-09 18:18:10', 'Inmuebles', 'Se edito un inmueble, Nombre: Cabaña Arcoiris, Descripción: La cabaña Arcoiris es de color verde y cuenta con dos pisos en su interior, una sala familiar, tres camas, un baño y un balcón desde el cual puedes observar un bello atardecer. La cabaña incluye un ambiente acogedor privado en el exterior para poder compartir con su familia y amigos.  Es el lugar perfecto para estar en sintonía con la naturaleza., Estado: '),
(23, 57, '2021-07-09 18:19:16', 'Inmuebles', 'Se edito una imagen de inmueble'),
(24, 57, '2021-07-09 18:19:52', 'Inmuebles', 'Se edito un inmueble, Nombre: Cabaña Arcoiris, Descripción: La cabaña Arcoiris es de color verde y cuenta con dos pisos en su interior, una sala familiar, tres camas, un baño y un balcón desde el cual puedes observar un bello atardecer. La cabaña incluye un ambiente acogedor privado en el exterior para poder compartir con su familia y amigos.  Es el lugar perfecto para estar en sintonía con la naturaleza., Estado: '),
(25, 57, '2021-07-09 18:20:21', 'Inmuebles', 'Se edito una imagen de inmueble'),
(26, 57, '2021-07-09 18:20:54', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(27, 1, '2021-07-12 11:47:12', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Direccion, Descripción: Los esperamos en el Km 232, San Martín Chile Verde, Sacatepequez, Quetzaltenango, donde podrán encontrar nuestro Parque, Hotel, y Restaurantes rodeados de naturaleza y color!\r\nBuscanos en Waze para una ubicación más precisa. ¡Los esperamos pronto!'),
(28, 1, '2021-07-12 11:47:55', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: 1 cama King Size, Descripción: '),
(29, 1, '2021-07-12 11:48:06', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: 2 Camas Matrimoniales, Descripción: '),
(30, 1, '2021-07-12 11:48:13', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: 1 Sala Familiar, Descripción: '),
(31, 1, '2021-07-12 11:48:20', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: 1 Baño, Descripción: '),
(32, 1, '2021-07-12 11:48:27', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: Balcón, Descripción: '),
(33, 1, '2021-07-12 11:48:34', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: Aire Acondicionado, Descripción: aire'),
(34, 1, '2021-07-12 11:48:41', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: Aire Acondicionado, Descripción: '),
(35, 1, '2021-07-12 16:05:13', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: 1 cama King Size, Descripción: en cabaña arcoiris, margarita, lirio la cama king estara en el 1er nivel.  En cabaña 1, 2, 3, cama king estara en 2do nivel.'),
(36, 1, '2021-07-20 09:09:04', 'Seguridad', 'Se creo un usuario de administrador, Nombre: Juan Perez, Email: jperez@hotmail.com, Pais: , Departamento: , Dirección: , Teléfono: , tipo: Administrador'),
(37, 1, '2021-07-20 09:11:29', 'Seguridad ', 'Se edito un usuario administrador: Nombre: Juan Perez, Email: jperez@hotmail.com, Pais: Guatemala, Departamento: , Dirección: , Teléfono: , tipo: Administrador'),
(38, 1, '2021-07-20 09:13:01', 'Seguridad', 'Se elimino un Administrador, Nombre: Juan Perez'),
(39, 1, '2021-07-20 09:26:36', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña Pequeña, Descripción: Cabaña Pequeña con 1 habitacion para 2 personas ,, Estado: Activo, Maximo Personas: 4, Minimo Personas: 2, Menores Gratis X Pareja: 1, Mascotas: SI, Maximo Mascotas: 1'),
(40, 1, '2021-07-20 09:27:27', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: WiFi, Descripción: '),
(41, 1, '2021-07-20 09:27:51', 'Inmuebles', 'Se edito una característica tipo de inmueble, Nombre: WiFi, Descripción: '),
(42, 1, '2021-07-20 09:35:40', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña Pequeña, Descripción: Cabaña Pequeña con 1 habitacion para 2 personas ,, Estado: Activo, Maximo Personas: 6, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(43, 1, '2021-07-20 09:39:23', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña Pequeña, Descripción: Cabaña Pequeña con 1 habitacion para 2 personas ,, Estado: Inactivo, Maximo Personas: 6, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(44, 1, '2021-07-20 09:40:25', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña Pequeña, Descripción: Cabaña Pequeña con 1 habitacion para 2 personas ,, Estado: Activo, Maximo Personas: 6, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(45, 1, '2021-07-20 09:42:42', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Cocina, Descripción: Cocina con todos sus implementos'),
(46, 1, '2021-07-20 09:45:03', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Lirios, Descripción: ksdfasdfjka ladjf ladj aldfjk alsdf jalsdf jaldfj ladj fladjf aldf jalsdf lsdf jalksdf alsdkf alskdj lasdkf alkdfj adf, Estado: Activo'),
(47, 1, '2021-07-20 09:48:40', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(48, 1, '2021-07-20 09:49:17', 'Inmuebles', 'Se edito una imagen de inmueble'),
(49, 1, '2021-07-20 09:49:37', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(50, 1, '2021-07-20 09:49:59', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(51, 1, '2021-07-20 09:50:16', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(52, 1, '2021-07-20 09:55:37', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Girasoles, Descripción: asdf adsf asdf adfas dasd fasdf asdf asdf asd fasdf dasf s, Estado: Activo'),
(53, 1, '2021-07-20 09:56:02', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Tulipanes, Descripción: asdf asdf asdf adf asdf asdf asdf asdf asdf asdf sdf, Estado: Activo'),
(54, 1, '2021-07-20 09:56:12', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(55, 1, '2021-07-20 09:56:30', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(56, 1, '2021-07-20 09:56:45', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(57, 1, '2021-07-20 09:56:57', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(58, 1, '2021-07-20 10:02:58', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 20-07-2021, Fecha Final: 23-07-2021, Precio: Q.375, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Habilitado, Promocion Numero de Personas Gratis: Q.2'),
(59, 1, '2021-07-20 10:04:59', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 20-07-2021, Fecha Final: 23-07-2021, Precio: Q.375.00, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Habilitado, Promocion Numero de Personas Gratis: Q.2'),
(60, 1, '2021-07-20 10:07:34', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 24-07-2021, Fecha Final: 25-07-2021, Precio: Q.390, Precio Menor: Q.180, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(61, 1, '2021-07-20 10:08:31', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 26-07-2021, Fecha Final: 30-07-2021, Precio: Q.350, Precio Menor: Q.150, Precio Mascota: Q.50, Promocion Persona Extra: Habilitado, Promocion Numero de Personas Gratis: Q.1'),
(62, 1, '2021-07-20 11:09:23', 'Seguridad', 'Se creo un usuario de administrador, Nombre: Juan Reyes, Email: ingresos.highlandpark@gmail.com, Pais: , Departamento: , Dirección: , Teléfono: , tipo: Administrador'),
(63, 1, '2021-07-20 11:11:36', 'Seguridad', 'Se creo un usuario de administrador, Nombre: Esdras Sulugui, Email: contabilidad.highlandpark@gmail.com, Pais: , Departamento: , Dirección: , Teléfono: , tipo: Administrador'),
(64, 53, '2021-08-11 15:15:09', 'Inmuebles', 'Se edito un inmueble, Nombre: Cabaña Arcoiris, Descripción: La cabaña Arcoiris es de color verde y cuenta con dos pisos en su interior, una sala familiar, tres camas, un baño y un balcón desde el cual puedes observar un bello atardecer. La cabaña incluye un ambiente acogedor privado en el exterior para poder compartir con su familia y amigos.  Es el lugar perfecto para estar en sintonía con la naturaleza., Estado: '),
(65, 59, '2021-08-12 12:59:45', 'Seguridad', 'Se creo un usuario de administrador, Nombre: Emely, Email: emely@gmail.com, Pais: Guatemala, Departamento: Totonicapan, Dirección: avenida lucia 4-23, Teléfono: 77674565, Tipo: Administrador, Tipo Administrador: Recepcionista'),
(66, 60, '2021-08-12 12:59:47', 'Seguridad', 'Se creo un usuario de administrador, Nombre: Gerado Cruz, Email: compras.highalndpar@gmail.com, Pais: Guatemala, Departamento: Quetzaltenango, Dirección: , Teléfono: 4564444464646464, Tipo: Administrador, Tipo Administrador: Total'),
(67, 59, '2021-08-12 13:00:12', 'Seguridad', 'Se elimino un Administrador, Nombre: Emely'),
(68, 60, '2021-08-12 13:00:35', 'Seguridad ', 'Se edito un usuario administrador: Nombre: Gerado Cruz, Email: compras.highalndpar@gmail.com, Pais: Guatemala, Departamento: Quetzaltenango, Dirección: , Teléfono: 4564444464646464, tipo: Administrador, Tipo Administrador: Total'),
(69, 60, '2021-08-12 13:01:54', 'Seguridad', 'Se elimino un Administrador, Nombre: Gerado Cruz'),
(70, 60, '2021-08-12 13:03:33', 'Seguridad ', 'Se edito un usuario administrador: Nombre: Esdras Sulugui, Email: contabilidad.highlandpark@gmail.com, Pais: Guatemala, Departamento: Sololá, Dirección: , Teléfono: 41237046, tipo: Administrador, Tipo Administrador: Total'),
(71, 59, '2021-08-12 13:06:40', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña individual, Descripción: hospedaje para una persona, un desayuno y uso de piscina y jacuzzi, Estado: Activo, Maximo Personas: 1, Minimo Personas: 1, Menores Gratis X Pareja: 0, Mascotas: SI, Maximo Mascotas: 1'),
(72, 60, '2021-08-12 13:07:38', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: TEMPLO 1, Descripción: Habitaciones con camas múltiples exclusivos para retiros espirituales, Estado: Activo, Maximo Personas: 10, Minimo Personas: 5, Menores Gratis X Pareja: 2, Mascotas: NO, Maximo Mascotas: 0'),
(73, 60, '2021-08-12 13:10:32', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: BAUTISTERIO, Descripción: Cuentan con un lugar con techo y nivel de agua a la cintura'),
(74, 59, '2021-08-12 13:10:37', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Cabaña Almendras, Descripción: color rosada con deck, tres camas, sala de estar con television cable, Estado: Activo'),
(75, 60, '2021-08-12 13:11:01', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: DUCHAS MULTIPLES, Descripción: '),
(76, 59, '2021-08-12 13:13:24', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Baño, Descripción: '),
(77, 59, '2021-08-12 13:14:16', 'Inmuebles', 'Se creo una nueva caracteristica de tipo de inmueble nuevo, Nombre: Sala de Estar, Descripción: Con television con cable y bocina envolvente'),
(78, 60, '2021-08-12 13:16:07', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: JESUS, Descripción: Cuenta con camas tipo literas donde se permiten el ingreso de un mismo sexo, Estado: Activo'),
(79, 60, '2021-08-12 13:17:38', 'Inmuebles', 'Se edito un inmueble, Nombre: JESUS, Descripción: Cuenta con camas tipo literas donde se permiten el ingreso de un mismo sexo, Estado: '),
(80, 60, '2021-08-12 13:17:52', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(81, 59, '2021-08-12 13:18:08', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(82, 60, '2021-08-12 13:18:36', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(83, 59, '2021-08-12 13:22:47', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Glamping Monarca, Descripción: Carpa individual dentro del bosque, Estado: Activo'),
(84, 60, '2021-08-12 13:23:09', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: TEMPLO 1, Descripción: Habitaciones con camas múltiples exclusivos para retiros espirituales, Estado: Activo, Maximo Personas: 10, Minimo Personas: 5, Menores Gratis X Pareja: 5, Maximo Mascotas: 0'),
(85, 59, '2021-08-12 13:23:51', 'Inmuebles', 'Se edito un inmueble, Nombre: Glamping Monarca, Descripción: Carpa individual dentro del bosque, Estado: '),
(86, 59, '2021-08-12 13:25:41', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(87, 60, '2021-08-12 13:26:01', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: AZUCENA, Descripción: cabañas entre la naturaleza, Estado: Activo'),
(88, 60, '2021-08-12 13:27:03', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(89, 60, '2021-08-12 13:27:24', 'Inmuebles', 'Se agrego una imagen nueva a inmueble.'),
(90, 60, '2021-08-12 13:32:24', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 13-08-2021, Fecha Final: 15-08-2021, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(91, 59, '2021-08-12 13:32:34', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 13-08-2021, Fecha Final: 15-08-2021, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(92, 60, '2021-08-12 13:34:53', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 16-08-2021, Fecha Final: 19-08-2021, Precio: Q.375, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Habilitado, Promocion Numero de Personas Gratis: Q.1'),
(93, 59, '2021-08-12 13:34:58', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 16-08-2021, Fecha Final: 19-08-2021, Precio: Q.375, Precio Menor: Q.150, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(94, 60, '2021-08-12 14:00:00', 'Seguridad', 'Se creo un usuario de huesped, Nombre: Armando Rios, Email: armando_123@gmail.com, Pais: Argentina, Departamento: , Dirección: 3ra. calle norte, Teléfono: 12345678, tipo: Huesped'),
(95, 59, '2021-08-12 14:00:41', 'Seguridad', 'Se creo un usuario de huesped, Nombre: zenaida, Email: zenaida@gmail.com, Pais: guatemala, Departamento: Quetzaltenango, Dirección: colomba, Teléfono: 77654321, tipo: Huesped'),
(96, 59, '2021-08-18 13:25:24', 'Inmuebles', 'Se edito un inmueble, Nombre: JESUS, Descripción: Cuenta con camas tipo literas donde se permiten el ingreso de un mismo sexo, Estado: '),
(97, 59, '2021-08-18 13:26:20', 'Inmuebles', 'Se edito un inmueble, Nombre: Cabaña Arcoiris, Descripción: La cabaña Arcoiris es de color verde y cuenta con dos pisos en su interior, una sala familiar, tres camas, un baño y un balcón desde el cual puedes observar un bello atardecer. La cabaña incluye un ambiente acogedor privado en el exterior para poder compartir con su familia y amigos.  Es el lugar perfecto para estar en sintonía con la naturaleza., Estado: '),
(98, 59, '2021-08-18 13:26:39', 'Inmuebles', 'Se edito un inmueble, Nombre: AZUCENA, Descripción: cabañas entre la naturaleza, Estado: '),
(99, 59, '2021-08-18 13:27:01', 'Inmuebles', 'Se edito un inmueble, Nombre: Lirios, Descripción: ksdfasdfjka ladjf ladj aldfjk alsdf jalsdf jaldfj ladj fladjf aldf jalsdf lsdf jalksdf alsdkf alskdj lasdkf alkdfj adf, Estado: '),
(100, 59, '2021-08-18 13:27:15', 'Inmuebles', 'Se edito un inmueble, Nombre: Girasoles, Descripción: asdf adsf asdf adfas dasd fasdf asdf asdf asd fasdf dasf s, Estado: '),
(101, 59, '2021-08-18 13:27:32', 'Inmuebles', 'Se edito un inmueble, Nombre: Tulipanes, Descripción: asdf asdf asdf adf asdf asdf asdf asdf asdf asdf sdf, Estado: '),
(102, 59, '2021-08-18 13:27:49', 'Inmuebles', 'Se edito un inmueble, Nombre: Cabaña Almendras, Descripción: color rosada con deck, tres camas, sala de estar con television cable, Estado: '),
(103, 59, '2021-08-18 13:28:05', 'Inmuebles', 'Se edito un inmueble, Nombre: Glamping Monarca, Descripción: Carpa individual dentro del bosque, Estado: '),
(104, 59, '2021-08-18 14:02:56', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña individual, Descripción: hospedaje para una persona, un desayuno y uso de piscina y jacuzzi, Estado: Inactivo, Maximo Personas: 1, Minimo Personas: 1, Menores Gratis X Pareja: 0, Maximo Mascotas: 1'),
(105, 59, '2021-08-18 14:03:18', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña Pequeña, Descripción: Cabaña Pequeña con 1 habitacion para 2 personas ,, Estado: Inactivo, Maximo Personas: 6, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(106, 59, '2021-08-18 14:04:00', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabañas, Descripción: Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados  finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes., Estado: Inactivo, Maximo Personas: 6, Minimo Personas: 1, Menores Gratis X Pareja: 1, Maximo Mascotas: 2'),
(107, 59, '2021-08-18 14:04:20', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Glamping, Descripción: Glamping Monarca, ofrece una experiencia única en cinco carpas equipadas con todas las comodidades en medio del bosque nuboso. Además de ofrecer un ambiente tranquilo en medio de la naturaleza, tiene una area exclusiva donde el huesped cuenta con una sala en el exterior, servicio de baño y ducha privada. Es una experencia donde la comodidad y la naturaleza se vuelven uno., Estado: Inactivo, Maximo Personas: 3, Minimo Personas: 1, Menores Gratis X Pareja: 1, Maximo Mascotas: 0'),
(108, 59, '2021-08-18 14:04:43', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: TEMPLO 1, Descripción: Habitaciones con camas múltiples exclusivos para retiros espirituales, Estado: Inactivo, Maximo Personas: 10, Minimo Personas: 5, Menores Gratis X Pareja: 5, Maximo Mascotas: 0'),
(109, 59, '2021-08-18 14:09:30', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña para 2 adultos y 2 niños gratis, Descripción: Hospedaje para dos adultos y dos menores de 12 años gratis, uso de piscinas y jacuzzi, desayuno gratis y uso de areas verdes, Estado: Activo, Maximo Personas: 2, Minimo Personas: 2, Menores Gratis X Pareja: 2, Mascotas: SI, Maximo Mascotas: 1'),
(110, 59, '2021-08-18 14:14:30', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña para 3 adultos y 2 niños gratis, Descripción: Hospedaje para 3 adultos y 2 niños menores de doce años gratis, uso de piscinas y jacuzzi, desayunos gratis y uso de areas verdes, Estado: Activo, Maximo Personas: 3, Minimo Personas: 3, Menores Gratis X Pareja: 2, Mascotas: SI, Maximo Mascotas: 1'),
(111, 59, '2021-08-18 14:16:41', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña para 4 adultos y dos niños gratis, Descripción: Hospedaje para cuatro adultos y dos menores de doce años gratis, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes., Estado: Activo, Maximo Personas: 4, Minimo Personas: 4, Menores Gratis X Pareja: 2, Mascotas: SI, Maximo Mascotas: 1'),
(112, 59, '2021-08-18 14:23:39', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña para 5 adultos y 1 niño gratis, Descripción: Hospedaje para cinco adultos y un menor de doce años gratis, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes., Estado: Activo, Maximo Personas: 5, Minimo Personas: 5, Menores Gratis X Pareja: 1, Mascotas: SI, Maximo Mascotas: 1'),
(113, 59, '2021-08-18 14:26:06', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña para 6 adultos, Descripción: Hospedaje para 6 adultos, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes, Estado: Activo, Maximo Personas: 6, Minimo Personas: 6, Menores Gratis X Pareja: 0, Mascotas: SI, Maximo Mascotas: 1'),
(114, 59, '2021-08-18 14:30:00', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Glamping para 2 personas, Descripción: Hospedaje en casa de campaña con todas sus comodidades dentro del bosque, para dos personas, uso de piscina y jacuzzi, areas verdes y termo de cafe y champurradas, Estado: Activo, Maximo Personas: 2, Minimo Personas: 2, Menores Gratis X Pareja: 0, Mascotas: SI, Maximo Mascotas: 1'),
(115, 59, '2021-08-18 14:31:45', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Glamping para 3 personas, Descripción: Hospedaje en Casa de Campaña con todas sus comodidades dentro del bosque, para 3 personas, uso de piscina y jacuzzi, desayuno gratis, termo de cafe y champurradas, y uso de areas verdes, Estado: Activo, Maximo Personas: 3, Minimo Personas: 3, Menores Gratis X Pareja: 0, Mascotas: SI, Maximo Mascotas: 1'),
(116, 59, '2021-08-18 15:49:25', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Cabaña 1 Arcoíris, Descripción: Cabaña con 1 cama King Size, 2 camas matrimoniales, Sala de estar, Television con cable, Frigobar, baño y ducha, Estado: Activo'),
(117, 1, '2021-08-25 16:09:27', 'Configuración ', 'Se edito la configuración, Empresa: Szystems, Zona Horaria: America/Guatemala, Moneda: Q.'),
(118, 59, '2021-09-13 15:25:07', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña para 2 adultos y 2 niños gratis, Descripción: Hospedaje para dos adultos y dos menores de 12 años gratis, uso de piscinas y jacuzzi, desayuno gratis y uso de areas verdes, Estado: Inactivo, Maximo Personas: 2, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(119, 59, '2021-09-13 15:25:45', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña para 3 adultos y 2 niños gratis, Descripción: Hospedaje para 3 adultos y 2 niños menores de doce años gratis, uso de piscinas y jacuzzi, desayunos gratis y uso de areas verdes, Estado: Inactivo, Maximo Personas: 3, Minimo Personas: 3, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(120, 59, '2021-09-13 15:26:28', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña para 4 adultos y dos niños gratis, Descripción: Hospedaje para cuatro adultos y dos menores de doce años gratis, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes., Estado: Inactivo, Maximo Personas: 4, Minimo Personas: 4, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(121, 59, '2021-09-13 15:27:33', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña para 5 adultos y 1 niño gratis, Descripción: Hospedaje para cinco adultos y un menor de doce años gratis, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes., Estado: Inactivo, Maximo Personas: 5, Minimo Personas: 5, Menores Gratis X Pareja: 1, Maximo Mascotas: 1'),
(122, 59, '2021-09-13 15:28:18', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña para 6 adultos, Descripción: Hospedaje para 6 adultos, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes, Estado: Inactivo, Maximo Personas: 6, Minimo Personas: 6, Menores Gratis X Pareja: 0, Maximo Mascotas: 1'),
(123, 59, '2021-09-13 15:28:37', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Glamping para 2 personas, Descripción: Hospedaje en casa de campaña con todas sus comodidades dentro del bosque, para dos personas, uso de piscina y jacuzzi, areas verdes y termo de cafe y champurradas, Estado: Inactivo, Maximo Personas: 2, Minimo Personas: 2, Menores Gratis X Pareja: 0, Maximo Mascotas: 1'),
(124, 59, '2021-09-13 15:29:16', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Glamping para 3 personas, Descripción: Hospedaje en Casa de Campaña con todas sus comodidades dentro del bosque, para 3 personas, uso de piscina y jacuzzi, desayuno gratis, termo de cafe y champurradas, y uso de areas verdes, Estado: Inactivo, Maximo Personas: 3, Minimo Personas: 3, Menores Gratis X Pareja: 0, Maximo Mascotas: 1'),
(125, 59, '2021-09-13 15:35:44', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Arcoiris, Descripción: Cabaña color verde oscuro con deck para desayuno, sala de estar, television con cable, bocina y frigobar, Estado: Activo'),
(126, 59, '2021-09-13 15:36:16', 'Inmuebles', 'Se edito un inmueble, Nombre: Cabaña 1 Arcoíris, Descripción: Cabaña con 1 cama King Size, 2 camas matrimoniales, Sala de estar, Television con cable, Frigobar, baño y ducha, Estado: '),
(127, 59, '2021-09-13 15:37:38', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabaña para 2 adultos y 2 niños gratis, Descripción: Hospedaje para dos adultos y dos menores de 12 años gratis, uso de piscinas y jacuzzi, desayuno gratis y uso de areas verdes, Estado: Activo, Maximo Personas: 2, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 1'),
(128, 59, '2021-09-13 15:40:50', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Girasol, Descripción: Cabaña color verde aqua con deck, sala de estar, television con cable, bocina, frigobar y 3 camas, Estado: Activo'),
(129, 59, '2021-09-13 15:43:28', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Hortencia, Descripción: Cabaña con deck, sala de esta, television con cable, bocina, frigobar y 3 camas, Estado: Activo'),
(130, 59, '2021-09-13 15:44:58', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Margarita, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(131, 59, '2021-09-13 15:45:29', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Jazmin, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(132, 59, '2021-09-13 15:46:05', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Lavanda, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(133, 59, '2021-09-13 15:46:33', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Lavanda, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(134, 59, '2021-09-13 15:47:07', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Tulipanes, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(135, 59, '2021-09-13 15:49:12', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Lirios, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(136, 59, '2021-09-13 15:49:35', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Orquideas, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(137, 59, '2021-09-13 15:50:02', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Gladiolas, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(138, 59, '2021-09-13 15:50:43', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Pensamientos, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(139, 59, '2021-09-13 15:51:08', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Violetas, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(140, 59, '2021-09-13 15:51:31', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Magnolias, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(141, 59, '2021-09-13 15:51:57', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Primavera, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(142, 59, '2021-09-13 15:52:36', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Primavera, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(143, 59, '2021-09-13 15:53:04', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Cerezos, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(144, 59, '2021-09-13 15:53:35', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Narcisos, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(145, 59, '2021-09-13 15:54:02', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Ave del Paraiso, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: Activo'),
(146, 59, '2021-09-13 15:56:07', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Lavanda'),
(147, 59, '2021-09-13 15:56:26', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Primavera'),
(148, 60, '2021-09-13 16:16:29', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Glamping para 2 personas'),
(149, 60, '2021-09-13 16:18:27', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 1. Arcoíris, Descripción: , Estado: Activo'),
(150, 60, '2021-09-13 16:21:01', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabañas, Descripción: Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados  finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes., Estado: Inactivo, Maximo Personas: 6, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 2'),
(151, 60, '2021-09-13 16:22:34', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Glamping, Descripción: Glamping Monarca, ofrece una experiencia única en cinco carpas equipadas con todas las comodidades en medio del bosque nuboso. Además de ofrecer un ambiente tranquilo en medio de la naturaleza, tiene una area exclusiva donde el huesped cuenta con una sala en el exterior, servicio de baño y ducha privada. Es una experencia donde la comodidad y la naturaleza se vuelven uno., Estado: Inactivo, Maximo Personas: 3, Minimo Personas: 1, Menores Gratis X Pareja: 0, Maximo Mascotas: 0'),
(152, 60, '2021-09-13 16:23:24', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Glamping para 3 personas'),
(153, 60, '2021-09-13 16:23:30', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: TEMPLO 1'),
(154, 60, '2021-09-13 16:23:37', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña Pequeña'),
(155, 60, '2021-09-13 16:23:41', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña individual'),
(156, 60, '2021-09-13 16:23:46', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña para 2 adultos y 2 niños gratis'),
(157, 60, '2021-09-13 16:23:51', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña para 3 adultos y 2 niños gratis'),
(158, 60, '2021-09-13 16:23:55', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña para 4 adultos y dos niños gratis'),
(159, 60, '2021-09-13 16:24:03', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña para 6 adultos'),
(160, 60, '2021-09-13 16:24:12', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña para 5 adultos y 1 niño gratis'),
(161, 60, '2021-09-13 16:26:03', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: AZUCENA'),
(162, 60, '2021-09-13 16:27:25', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Lirios'),
(163, 60, '2021-09-13 16:27:32', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Girasoles'),
(164, 60, '2021-09-13 16:27:39', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Tulipanes'),
(165, 60, '2021-09-13 16:27:45', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña 1 Arcoíris'),
(166, 60, '2021-09-13 16:27:48', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Arcoiris'),
(167, 60, '2021-09-13 16:29:58', 'Inmuebles', 'Se edito un inmueble, Nombre: 2. Girasol, Descripción: , Estado: '),
(168, 60, '2021-09-13 16:30:14', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña Arcoiris'),
(169, 60, '2021-09-13 16:30:25', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: JESUS'),
(170, 60, '2021-09-13 16:30:32', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Hortencia'),
(171, 60, '2021-09-13 16:30:40', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Glamping Monarca'),
(172, 60, '2021-09-13 16:32:36', 'Inmuebles', 'Se edito un inmueble, Nombre: 3. Hortencia, Descripción: , Estado: '),
(173, 60, '2021-09-13 16:32:57', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Jazmin'),
(174, 60, '2021-09-13 16:33:01', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Lavanda'),
(175, 60, '2021-09-13 16:33:35', 'Inmuebles', 'Se edito un inmueble, Nombre: Tulipanes, Descripción: Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas, Estado: '),
(176, 60, '2021-09-13 16:33:45', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Tulipanes'),
(177, 60, '2021-09-13 16:33:49', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Lirios'),
(178, 60, '2021-09-13 16:33:54', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Orquideas'),
(179, 60, '2021-09-13 16:33:57', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Gladiolas'),
(180, 60, '2021-09-13 16:34:02', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Pensamientos'),
(181, 60, '2021-09-13 16:34:07', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Violetas'),
(182, 60, '2021-09-13 16:34:11', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Primavera'),
(183, 60, '2021-09-13 16:34:16', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Magnolias'),
(184, 60, '2021-09-13 16:34:21', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cerezos'),
(185, 60, '2021-09-13 16:34:26', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Narcisos'),
(186, 60, '2021-09-13 16:34:30', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Ave del Paraiso'),
(187, 60, '2021-09-13 16:34:34', 'inmuebles', 'Se elimino un tipo de inmueble, Nombre: Cabaña Almendras'),
(188, 60, '2021-09-13 16:35:31', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 4. Margarita, Descripción: , Estado: Activo'),
(189, 60, '2021-09-13 16:36:10', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 5. Jazmín, Descripción: , Estado: Activo'),
(190, 60, '2021-09-13 16:37:45', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabañas, Descripción: Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados  finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes., Estado: Activo, Maximo Personas: 6, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 2'),
(191, 60, '2021-09-13 16:38:03', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Glamping, Descripción: Glamping Monarca, ofrece una experiencia única en cinco carpas equipadas con todas las comodidades en medio del bosque nuboso. Además de ofrecer un ambiente tranquilo en medio de la naturaleza, tiene una area exclusiva donde el huesped cuenta con una sala en el exterior, servicio de baño y ducha privada. Es una experencia donde la comodidad y la naturaleza se vuelven uno., Estado: Activo, Maximo Personas: 3, Minimo Personas: 1, Menores Gratis X Pareja: 0, Maximo Mascotas: 0'),
(192, 60, '2021-09-13 16:42:30', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 1. Apolo, Descripción: , Estado: Activo'),
(193, 60, '2021-09-13 16:43:09', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 2. Azul, Descripción: , Estado: Activo'),
(194, 60, '2021-09-13 16:46:16', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 3. Monarca, Descripción: , Estado: Activo'),
(195, 60, '2021-09-13 16:47:26', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 4. Vanessa, Descripción: , Estado: Activo'),
(196, 60, '2021-09-13 16:48:14', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Ulises, Descripción: , Estado: Activo'),
(197, 59, '2021-09-13 17:05:48', 'Inmuebles', 'Se creo un nuevo tipo de inmueble, Nombre: Cabaña Campestre, Descripción: , Estado: Activo, Maximo Personas: 2, Minimo Personas: 1, Menores Gratis X Pareja: 0, Mascotas: NO, Maximo Mascotas: 0'),
(198, 59, '2021-09-13 17:06:19', 'Inmuebles', 'Se edito un inmueble, Nombre: 5. Ulises, Descripción: , Estado: '),
(199, 59, '2021-09-13 17:08:32', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 6. Lavanda, Descripción: , Estado: Activo'),
(200, 59, '2021-09-13 17:09:37', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 7. Tulipanes, Descripción: , Estado: Activo'),
(201, 59, '2021-09-13 17:12:16', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 8. Lirios, Descripción: , Estado: Activo'),
(202, 59, '2021-09-13 17:14:18', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 9. Orquideas, Descripción: , Estado: Activo'),
(203, 59, '2021-09-13 17:15:08', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 10. Gladiolas, Descripción: , Estado: Activo'),
(204, 59, '2021-09-13 17:15:47', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 11. Pensamientos, Descripción: , Estado: Activo'),
(205, 59, '2021-09-13 17:18:37', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 12. Violetas, Descripción: , Estado: Activo'),
(206, 59, '2021-09-13 17:19:28', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 13. Magnolias, Descripción: , Estado: Activo'),
(207, 59, '2021-09-13 17:20:09', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 14. Primavera, Descripción: , Estado: Activo'),
(208, 59, '2021-09-13 17:23:28', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 15. Cerezos, Descripción: , Estado: Activo'),
(209, 59, '2021-09-13 17:24:00', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: 16. Narcisos, Descripción: , Estado: Activo'),
(210, 59, '2021-09-13 17:24:22', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Ave de Paraiso, Descripción: , Estado: Activo'),
(211, 59, '2021-09-13 17:25:14', 'Inmuebles', 'Se creo un nuevo inmueble, Nombre: Casa Campestre, Descripción: , Estado: Activo'),
(212, 59, '2021-09-13 17:26:25', 'Inmuebles', 'Se edito un inmueble, Nombre: Cabaña Campestre, Descripción: , Estado: '),
(213, 59, '2021-09-13 17:35:26', 'Inmuebles', 'Se edito un inmueble, Nombre: 17. Ave de Paraiso, Descripción: , Estado: '),
(214, 59, '2021-09-13 17:35:35', 'Inmuebles', 'Se edito un inmueble, Nombre: 17. Ave de Paraiso, Descripción: , Estado: '),
(215, 59, '2021-09-13 17:36:43', 'Inmuebles', 'Se edito un inmueble, Nombre: 17. Ave de Paraiso, Descripción: , Estado: '),
(216, 1, '2021-09-17 17:31:02', 'Seguridad ', 'Se edito un usuario administrador: Nombre: Ana Sofia Molina, Email: admonhighlandpark@gmail.com, Pais: Guatemala, Departamento: , Dirección: , Teléfono: 30012067, tipo: Administrador, Tipo Administrador: Total'),
(217, 59, '2021-10-21 16:48:25', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-07-20 ,Fecha Final: 2021-07-23'),
(218, 59, '2021-10-21 16:48:33', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-07-24 ,Fecha Final: 2021-07-25'),
(219, 59, '2021-10-21 16:48:43', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-07-26 ,Fecha Final: 2021-07-30'),
(220, 59, '2021-10-21 16:48:48', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-08-13 ,Fecha Final: 2021-08-15'),
(221, 59, '2021-10-21 16:48:53', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-08-13 ,Fecha Final: 2021-08-15'),
(222, 59, '2021-10-21 16:48:58', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-08-16 ,Fecha Final: 2021-08-19'),
(223, 59, '2021-10-21 16:49:03', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-08-16 ,Fecha Final: 2021-08-19'),
(224, 59, '2021-10-21 16:50:56', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 22-10-2021, Fecha Final: 24-10-2021, Precio: Q.395, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(225, 59, '2021-10-21 16:56:10', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 22-10-2021, Fecha Final: 24-10-2021, Precio: Q.390.00, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(226, 59, '2021-10-21 17:02:51', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 25-10-2021, Fecha Final: 28-10-2021, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(227, 59, '2021-10-21 17:08:13', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 25-10-2021, Fecha Final: 28-10-2021, Precio: Q.340, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(228, 59, '2021-10-21 17:21:49', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 22-10-2021, Fecha Final: 24-10-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(229, 59, '2021-10-21 17:24:31', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 29-10-2021, Fecha Final: 01-11-2021, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(230, 59, '2021-10-21 17:25:27', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 25-10-2021, Fecha Final: 28-10-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(231, 59, '2021-10-21 17:29:26', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-11-2021, Fecha Final: 04-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(232, 59, '2021-10-21 17:30:52', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 05-11-2021, Fecha Final: 07-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(233, 59, '2021-10-21 17:31:34', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 08-11-2021, Fecha Final: 11-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(234, 59, '2021-10-21 17:32:32', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 12-11-2021, Fecha Final: 14-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(235, 59, '2021-10-21 17:41:26', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 15-11-2021, Fecha Final: 18-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(236, 59, '2021-10-21 17:42:19', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 19-11-2021, Fecha Final: 21-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(237, 59, '2021-10-21 17:43:27', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 22-11-2021, Fecha Final: 25-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(238, 59, '2021-10-22 17:18:32', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 26-11-2021, Fecha Final: 28-11-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(239, 59, '2021-10-22 17:21:08', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 29-11-2021, Fecha Final: 02-12-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(240, 59, '2021-10-22 17:25:36', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 03-12-2021, Fecha Final: 05-12-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(241, 59, '2021-10-22 17:28:09', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-05 ,Fecha Final: 2021-11-07'),
(242, 59, '2021-10-22 17:28:20', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-08 ,Fecha Final: 2021-11-11'),
(243, 59, '2021-10-22 17:28:43', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-12 ,Fecha Final: 2021-11-14'),
(244, 59, '2021-10-22 17:28:53', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-15 ,Fecha Final: 2021-11-18'),
(245, 59, '2021-10-22 17:29:03', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-19 ,Fecha Final: 2021-11-21'),
(246, 59, '2021-10-22 17:29:15', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-22 ,Fecha Final: 2021-11-25'),
(247, 59, '2021-10-22 17:29:25', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-26 ,Fecha Final: 2021-11-28'),
(248, 59, '2021-10-22 17:29:32', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-29 ,Fecha Final: 2021-12-02'),
(249, 59, '2021-10-22 17:29:40', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-12-03 ,Fecha Final: 2021-12-05'),
(250, 59, '2021-10-22 17:30:11', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-02 ,Fecha Final: 2021-11-04'),
(251, 59, '2021-10-22 17:30:50', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-11-2021, Fecha Final: 16-12-2021, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1');
INSERT INTO `bitacora` (`idbitacora`, `idusuario`, `fecha`, `tipo`, `descripcion`) VALUES
(252, 59, '2021-10-22 17:32:18', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 17-12-2021, Fecha Final: 05-01-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(253, 59, '2021-10-22 17:34:00', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 06-01-2022, Fecha Final: 11-02-2022, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(254, 59, '2021-10-22 17:51:40', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 12-02-2022, Fecha Final: 14-02-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(255, 59, '2021-10-22 17:52:41', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 15-02-2022, Fecha Final: 07-04-2022, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(256, 59, '2021-10-22 18:00:49', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 08-04-2022, Fecha Final: 17-04-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(257, 59, '2021-10-22 18:02:04', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 18-04-2022, Fecha Final: 30-04-2022, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(258, 59, '2021-10-22 18:04:05', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-05-2022, Fecha Final: 01-05-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(259, 59, '2021-10-22 18:05:37', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-05-2022, Fecha Final: 09-05-2022, Precio: Q.225, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(260, 59, '2021-10-22 18:07:49', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 10-05-2022, Fecha Final: 10-05-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(261, 59, '2021-10-22 18:09:14', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 11-05-2022, Fecha Final: 16-06-2022, Precio: Q.275, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(262, 59, '2021-10-22 18:10:48', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 22-10-2021, Fecha Final: 24-10-2021, Precio: Q.275, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(263, 59, '2021-10-22 18:11:10', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 25-10-2021, Fecha Final: 28-10-2021, Precio: Q.275, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(264, 59, '2021-10-22 18:11:28', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-11-2021, Fecha Final: 16-12-2021, Precio: Q.275, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(265, 59, '2021-10-22 18:11:44', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 06-01-2022, Fecha Final: 11-02-2022, Precio: Q.275, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(266, 59, '2021-10-22 18:12:01', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 15-02-2022, Fecha Final: 07-04-2022, Precio: Q.275, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(267, 59, '2021-10-22 18:13:00', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 18-04-2022, Fecha Final: 30-04-2022, Precio: Q.275, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(268, 59, '2021-10-22 18:13:23', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-05-2022, Fecha Final: 09-05-2022, Precio: Q.275, Precio Menor: Q.185.00, Precio Mascota: Q.50.00, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(269, 59, '2021-10-22 18:14:33', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 17-06-2022, Fecha Final: 30-06-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(270, 59, '2021-10-22 18:16:49', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-07-2022, Fecha Final: 02-07-2022, Precio: Q.275, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(271, 59, '2021-10-22 18:17:29', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 03-07-2022, Fecha Final: 03-07-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(272, 59, '2021-10-22 18:18:41', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 04-07-2022, Fecha Final: 31-08-2022, Precio: Q.275, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(273, 59, '2021-10-22 18:20:44', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-09-2022, Fecha Final: 30-09-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(274, 59, '2021-10-22 18:21:44', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-10-2022, Fecha Final: 19-10-2022, Precio: Q.275, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(275, 59, '2021-10-22 18:24:05', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 20-10-2022, Fecha Final: 20-10-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(276, 59, '2021-10-22 18:24:56', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 21-10-2022, Fecha Final: 31-10-2022, Precio: Q.275, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(277, 59, '2021-10-24 09:43:31', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-11-2022, Fecha Final: 01-11-2022, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(278, 59, '2021-10-24 09:45:37', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-11-2022, Fecha Final: 14-12-2022, Precio: Q.275, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(279, 59, '2021-10-24 09:47:18', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 15-12-2022, Fecha Final: 05-01-2023, Precio: Q.325, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(280, 59, '2021-10-24 10:09:36', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-10-25 ,Fecha Final: 2021-10-28'),
(281, 59, '2021-10-24 10:09:44', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-10-22 ,Fecha Final: 2021-10-24'),
(282, 59, '2021-10-24 11:49:51', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 25-10-2021, Fecha Final: 28-10-2021, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(283, 59, '2021-10-24 11:53:25', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 29-10-2021, Fecha Final: 01-11-2021, Precio: Q.530, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(284, 59, '2021-10-24 11:55:05', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-11-2021, Fecha Final: 16-11-2021, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(285, 59, '2021-10-24 11:56:15', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2021-11-02 ,Fecha Final: 2021-11-16'),
(286, 59, '2021-10-24 11:57:08', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-11-2021, Fecha Final: 16-12-2021, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(287, 59, '2021-10-24 12:00:00', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 17-12-2021, Fecha Final: 05-01-2022, Precio: Q.530, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(288, 59, '2021-10-24 12:03:19', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 06-01-2022, Fecha Final: 11-02-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(289, 59, '2021-10-24 12:13:43', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 12-02-2022, Fecha Final: 14-02-2022, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(290, 59, '2021-10-24 12:23:01', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 15-02-2022, Fecha Final: 07-04-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(291, 59, '2021-10-24 12:30:47', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 08-04-2022, Fecha Final: 17-04-2022, Precio: Q.530, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(292, 59, '2021-10-24 12:31:46', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 18-04-2022, Fecha Final: 30-04-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(293, 59, '2021-10-24 12:32:34', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-05-2022, Fecha Final: 01-05-2022, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(294, 59, '2021-10-24 12:33:58', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-05-2022, Fecha Final: 09-05-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(295, 59, '2021-10-24 12:42:33', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 10-05-2022, Fecha Final: 10-05-2022, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(296, 59, '2021-10-24 12:43:47', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 11-05-2022, Fecha Final: 16-05-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(297, 59, '2021-10-24 12:59:07', 'Reservacion', 'Se elimino una temporada, Fecha Inicial: 2022-05-11 ,Fecha Final: 2022-05-16'),
(298, 59, '2021-10-24 12:59:53', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 11-05-2022, Fecha Final: 16-06-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(299, 59, '2021-10-24 13:05:21', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 17-06-2022, Fecha Final: 30-06-2022, Precio: Q.530, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(300, 59, '2021-10-24 13:09:19', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-07-2022, Fecha Final: 02-07-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(301, 59, '2021-10-24 13:59:03', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 03-07-2022, Fecha Final: 03-07-2022, Precio: Q.530, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(302, 59, '2021-10-24 14:10:36', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 04-07-2022, Fecha Final: 31-08-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(303, 59, '2021-10-24 14:31:29', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-09-2022, Fecha Final: 30-09-2022, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(304, 59, '2021-10-24 14:59:53', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-10-2022, Fecha Final: 19-10-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(305, 59, '2021-10-24 15:01:45', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 20-10-2022, Fecha Final: 20-10-2022, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(306, 59, '2021-10-24 15:07:18', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 21-10-2022, Fecha Final: 31-10-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(307, 59, '2021-10-24 15:13:06', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 01-11-2022, Fecha Final: 01-11-2022, Precio: Q.390, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(308, 59, '2021-10-24 15:21:43', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 02-11-2022, Fecha Final: 14-12-2022, Precio: Q.340, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(309, 59, '2021-10-24 15:24:21', 'Reservacion', 'Se creo una temporada nueva, Fecha Inicial: 15-12-2022, Fecha Final: 05-01-2023, Precio: Q.530, Precio Menor: Q.185, Precio Mascota: Q.50, Promocion Persona Extra: Inhabilitado, Promocion Numero de Personas Gratis: Q.1'),
(310, 60, '2021-11-10 11:28:32', 'Inmuebles', 'Se edito un tipo de inmueble, Nombre: Cabañas, Descripción: Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados  finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes., Estado: Activo, Maximo Personas: 6, Minimo Personas: 2, Menores Gratis X Pareja: 2, Maximo Mascotas: 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristica`
--

CREATE TABLE `caracteristica` (
  `idcaracteristica` int(11) NOT NULL,
  `idtipo_inmueble` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `caracteristica`
--

INSERT INTO `caracteristica` (`idcaracteristica`, `idtipo_inmueble`, `nombre`, `descripcion`) VALUES
(1, 13, '1 cama King Size', 'en cabaña arcoiris, margarita, lirio la cama king estara en el 1er nivel.  En cabaña 1, 2, 3, cama king estara en 2do nivel.'),
(2, 13, '2 Camas Matrimoniales', NULL),
(3, 13, '1 Sala Familiar', NULL),
(4, 13, '1 Baño', NULL),
(6, 13, 'Balcón', NULL),
(7, 13, 'Aire Acondicionado', NULL),
(8, 14, '1 Cama Matrimonial', 'matri'),
(9, 14, '1 Cama Imperial', 'imperial'),
(10, 14, '1 Baño Con ducha', 'baño'),
(11, 14, 'Televisor con Cable', 'TV'),
(12, 14, 'Frigobar', '1'),
(13, 14, 'Sala Privada Exterior', 'sala'),
(14, 14, 'Termo de Café y Champurradas', 'termo'),
(15, 13, 'Direccion', 'Los esperamos en el Km 232, San Martín Chile Verde, Sacatepequez, Quetzaltenango, donde podrán encontrar nuestro Parque, Hotel, y Restaurantes rodeados de naturaleza y color!\r\nBuscanos en Waze para una ubicación más precisa. ¡Los esperamos pronto!'),
(16, 15, 'WiFi', NULL),
(17, 15, 'Cocina', 'Cocina con todos sus implementos'),
(18, 17, 'BAUTISTERIO', 'Cuentan con un lugar con techo y nivel de agua a la cintura'),
(19, 17, 'DUCHAS MULTIPLES', NULL),
(20, 16, 'Baño', NULL),
(21, 16, 'Sala de Estar', 'Con television con cable y bocina envolvente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reservacion`
--

CREATE TABLE `detalle_reservacion` (
  `iddetalle_reservacion` int(11) NOT NULL,
  `idreservacion` int(11) NOT NULL,
  `idtemporada` int(11) NOT NULL,
  `idinmueble` int(11) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `comentarios` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cant_mayores` int(11) NOT NULL,
  `cant_menores` int(11) NOT NULL,
  `cant_mascotas` int(11) NOT NULL,
  `precio_mayores` decimal(11,2) NOT NULL,
  `precio_menores` decimal(11,2) NOT NULL,
  `preciomascotas` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `detalle_reservacion`
--

INSERT INTO `detalle_reservacion` (`iddetalle_reservacion`, `idreservacion`, `idtemporada`, `idinmueble`, `fecha_entrada`, `fecha_salida`, `comentarios`, `cant_mayores`, `cant_menores`, `cant_mascotas`, `precio_mayores`, `precio_menores`, `preciomascotas`) VALUES
(2, 2, 1, 3, '2021-07-20', '2021-07-21', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 2 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 2, 0, 3, '375.00', '185.00', '50.00'),
(3, 2, 1, 2, '2021-07-23', '2021-07-23', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 2 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 3, 1, 2, '375.00', '185.00', '50.00'),
(4, 2, 1, 3, '2021-07-23', '2021-07-23', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 2 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 2, 0, 2, '375.00', '185.00', '50.00'),
(5, 2, 2, 3, '2021-07-24', '2021-07-25', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 2, 0, 2, '390.00', '180.00', '50.00'),
(6, 2, 3, 3, '2021-07-26', '2021-07-26', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 2, 0, 2, '350.00', '150.00', '50.00'),
(7, 3, 2, 2, '2021-07-24', '2021-07-24', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 3, 1, 1, '390.00', '180.00', '50.00'),
(8, 5, 4, 1, '2021-08-14', '2021-08-14', 'Menores a 12 años gratis por 2 adultos: 1. Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 4, 0, 0, '390.00', '185.00', '50.00'),
(9, 6, 5, 7, '2021-08-13', '2021-08-13', ' Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 1, 0, 1, '390.00', '185.00', '50.00'),
(10, 7, 4, 8, '2021-08-13', '2021-08-14', 'Menores a 12 años gratis por 2 adultos: 1. Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 3, 1, 2, '390.00', '185.00', '50.00'),
(11, 8, 5, 5, '2021-08-13', '2021-08-14', ' Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 1, 0, 1, '390.00', '185.00', '50.00'),
(12, 10, 8, 11, '2021-10-22', '2021-10-22', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 3, 1, 0, '390.00', '185.00', '50.00'),
(13, 11, 8, 13, '2021-10-22', '2021-10-23', 'Menores a 12 años gratis por 2 adultos: 2. Gratis 1 adulto al pagar minimo 3 personas adultas mayores a 12 años.', 3, 0, 2, '390.00', '185.00', '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `idinmueble` int(11) NOT NULL,
  `idtipo_inmueble` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado_inmueble` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`idinmueble`, `idtipo_inmueble`, `nombre`, `descripcion`, `estado_inmueble`, `estado`) VALUES
(1, 13, 'Cabaña Arcoiris', 'La cabaña Arcoiris es de color verde y cuenta con dos pisos en su interior, una sala familiar, tres camas, un baño y un balcón desde el cual puedes observar un bello atardecer. La cabaña incluye un ambiente acogedor privado en el exterior para poder compartir con su familia y amigos.  Es el lugar perfecto para estar en sintonía con la naturaleza.', 'Inactivo', 'Eliminado'),
(2, 15, 'Lirios', 'ksdfasdfjka ladjf ladj aldfjk alsdf jalsdf jaldfj ladj fladjf aldf jalsdf lsdf jalksdf alsdkf alskdj lasdkf alkdfj adf', 'Inactivo', 'Eliminado'),
(3, 15, 'Girasoles', 'asdf adsf asdf adfas dasd fasdf asdf asdf asd fasdf dasf s', 'Inactivo', 'Eliminado'),
(4, 15, 'Tulipanes', 'asdf asdf asdf adf asdf asdf asdf asdf asdf asdf sdf', 'Inactivo', 'Eliminado'),
(5, 16, 'Cabaña Almendras', 'color rosada con deck, tres camas, sala de estar con television cable', 'Inactivo', 'Eliminado'),
(6, 17, 'JESUS', 'Cuenta con camas tipo literas donde se permiten el ingreso de un mismo sexo', 'Inactivo', 'Eliminado'),
(7, 16, 'Glamping Monarca', 'Carpa individual dentro del bosque', 'Inactivo', 'Eliminado'),
(8, 13, 'AZUCENA', 'cabañas entre la naturaleza', 'Inactivo', 'Eliminado'),
(9, 18, 'Cabaña 1 Arcoíris', 'Cabaña con 1 cama King Size, 2 camas matrimoniales, Sala de estar, Television con cable, Frigobar, baño y ducha', 'Inactivo', 'Eliminado'),
(10, 18, 'Arcoiris', 'Cabaña color verde oscuro con deck para desayuno, sala de estar, television con cable, bocina y frigobar', 'Inactivo', 'Eliminado'),
(11, 13, '2. Girasol', NULL, 'Activo', 'Habilitado'),
(12, 18, 'Hortencia', 'Cabaña con deck, sala de esta, television con cable, bocina, frigobar y 3 camas', 'Inactivo', 'Eliminado'),
(13, 13, '3. Hortencia', NULL, 'Activo', 'Habilitado'),
(14, 18, 'Jazmin', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(15, 18, 'Lavanda', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(16, 18, 'Lavanda', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(17, 13, 'Tulipanes', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(18, 18, 'Lirios', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(19, 18, 'Orquideas', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(20, 18, 'Gladiolas', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(21, 18, 'Pensamientos', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(22, 18, 'Violetas', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(23, 18, 'Magnolias', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(24, 18, 'Primavera', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(25, 18, 'Primavera', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(26, 18, 'Cerezos', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(27, 18, 'Narcisos', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(28, 18, 'Ave del Paraiso', 'Cabaña con deck, sala de estar, television con cable, baño con agua caliente, bocina, 3 camas', 'Inactivo', 'Eliminado'),
(29, 13, '1. Arcoíris', NULL, 'Activo', 'Habilitado'),
(30, 13, '4. Margarita', NULL, 'Activo', 'Habilitado'),
(31, 13, '5. Jazmín', NULL, 'Activo', 'Habilitado'),
(32, 14, '1. Apolo', NULL, 'Activo', 'Habilitado'),
(33, 14, '2. Azul', NULL, 'Activo', 'Habilitado'),
(34, 14, '3. Monarca', NULL, 'Activo', 'Habilitado'),
(35, 14, '4. Vanessa', NULL, 'Activo', 'Habilitado'),
(36, 14, '5. Ulises', NULL, 'Activo', 'Habilitado'),
(37, 13, '6. Lavanda', NULL, 'Activo', 'Habilitado'),
(38, 13, '7. Tulipanes', NULL, 'Activo', 'Habilitado'),
(39, 13, '8. Lirios', NULL, 'Activo', 'Habilitado'),
(40, 13, '9. Orquideas', NULL, 'Activo', 'Habilitado'),
(41, 13, '10. Gladiolas', NULL, 'Activo', 'Habilitado'),
(42, 13, '11. Pensamientos', NULL, 'Activo', 'Habilitado'),
(43, 13, '12. Violetas', NULL, 'Activo', 'Habilitado'),
(44, 13, '13. Magnolias', NULL, 'Activo', 'Habilitado'),
(45, 13, '14. Primavera', NULL, 'Activo', 'Habilitado'),
(46, 13, '15. Cerezos', NULL, 'Activo', 'Habilitado'),
(47, 13, '16. Narcisos', NULL, 'Activo', 'Habilitado'),
(48, 13, '17. Ave de Paraiso', NULL, 'Activo', 'Habilitado'),
(49, 25, 'Cabaña Campestre', NULL, 'Activo', 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble_img`
--

CREATE TABLE `inmueble_img` (
  `idinmueble_img` int(11) NOT NULL,
  `idinmueble` int(11) NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `inmueble_img`
--

INSERT INTO `inmueble_img` (`idinmueble_img`, `idinmueble`, `imagen`) VALUES
(1, 1, '2RGNVarcoiris.jpg'),
(2, 1, 'WMJFXr2.jpg'),
(3, 2, '17GL5descarga.jpg'),
(4, 2, '3K4VQdescarga (3).jpg'),
(5, 2, 'WVM40descarga (2).jpg'),
(6, 2, 'JPD1Sdescarga (1).jpg'),
(7, 4, 'ZXA90descarga (2).jpg'),
(8, 4, 'R2LEHdescarga.jpg'),
(9, 3, '8ERIPdescarga (1).jpg'),
(10, 3, 'C8G17descarga (2).jpg'),
(11, 6, 'I17D9992deee364e2fd8b39fd147f407bd4fa.jpg'),
(12, 5, '4GCYKMy Invitation.jpeg'),
(13, 6, '73CRP948b85cb393c45246e5edc8b83d3c333.jpg'),
(14, 7, 'GYPMSTelefonos Lulu 2.jpg'),
(15, 8, 'LIR9Fdescarga.jpg'),
(16, 8, 'LJEG1las-flores-1570559222-8294525027.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('szotto18@hotmail.com', '$2y$10$5QIwHqsuqoMEvDZPElWhqOMA/AkaQF.pl19FCO7uLhIzzbPJQkTFW', '2021-07-20 20:56:33'),
('riveralldesign@gmail.com', '$2y$10$Nvm.3JCKizHL7BYtSzmXMer2qIBzAuGgPmXiS3Z5Pxhx1gEbqgtly', '2021-08-12 01:12:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `idreservacion` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idhuesped` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `abonado` decimal(11,2) NOT NULL,
  `tipo_pago` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_reservacion` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_saldo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `comentario` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `no_transaccion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen_transaccion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`idreservacion`, `idusuario`, `idhuesped`, `fecha`, `codigo`, `abonado`, `tipo_pago`, `estado_reservacion`, `estado_saldo`, `estado`, `total`, `comentario`, `no_transaccion`, `imagen_transaccion`) VALUES
(2, 1, 49, '2021-07-20', 'PH47KN92IY', '2310.00', 'Link de Pago', 'Confirmada', 'Pendiente', 'Habilitado', '4840.00', 'programar picnic', '6565454654', 'X7G0Fdescarga (2).jpg'),
(3, 1, 49, '2021-07-20', '24KC69FXH8', '0.00', 'Link de Pago', 'Pendiente', 'Pendiente', 'Habilitado', '1400.00', NULL, NULL, NULL),
(4, 1, 49, '2021-07-20', 'Y6VSXR74Q2', '0.00', 'Link de Pago', 'Pendiente', 'Pendiente', 'Habilitado', '1400.00', NULL, NULL, NULL),
(5, 60, 63, '2021-08-12', 'TRMBJPEHN4', '1540.00', 'Deposito', 'Confirmada', 'Pendiente', 'Habilitado', '1560.00', 'restante agregar a mi favor para consumo en restaurante', '154545', 'YDWCZdescarga (1).png'),
(6, 59, 64, '2021-08-12', 'WU7EMIRQP0', '440.00', 'Link de Pago', 'Confirmada', 'Pagado', 'Habilitado', '440.00', NULL, NULL, NULL),
(7, 1, 65, '2021-08-12', 'TRE7H91XJ4', '0.00', 'Deposito', 'Pendiente', 'Pendiente', 'Habilitado', '1455.00', NULL, '11513213', '246DZdescarga.png'),
(8, 1, 66, '2021-08-12', 'YDFNSWMXHO', '0.00', 'Link de Pago', 'Pendiente', 'Pendiente', 'Habilitado', '440.00', NULL, NULL, NULL),
(9, 1, 49, '2021-10-01', '7GBLVS4YH5', '0.00', 'Efectivo', 'Confirmada', 'Pagado', 'Habilitado', '0.00', '', NULL, NULL),
(10, 59, 47, '2021-10-21', 'P756AKFVUY', '0.00', 'Link de Pago', 'Confirmada', 'Pendiente', 'Habilitado', '1355.00', '', NULL, NULL),
(11, 60, 48, '2021-10-21', 'L1A7WTEKN5', '0.00', 'Link de Pago', 'Confirmada', 'Pendiente', 'Habilitado', '1270.00', '', NULL, NULL),
(12, 1, 47, '2021-11-08', 'CTGXS2BYQH', '0.00', 'Efectivo', 'Confirmada', 'Pagado', 'Habilitado', '0.00', '', NULL, NULL),
(13, 1, 49, '2022-02-19', 'QJV1F24EXC', '0.00', 'Efectivo', 'Confirmada', 'Pagado', 'Habilitado', '0.00', '', NULL, NULL),
(14, 1, 49, '2022-02-19', 'CRKQ8U6304', '0.00', 'Efectivo', 'Confirmada', 'Pagado', 'Habilitado', '0.00', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `idtemporada` int(11) NOT NULL,
  `idtipo_inmueble` int(11) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `preciomenor` decimal(11,2) NOT NULL,
  `preciomascota` decimal(11,2) NOT NULL,
  `promopersonagratis` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `promonumpersonas` int(11) NOT NULL,
  `estado_temporada` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `temporada`
--

INSERT INTO `temporada` (`idtemporada`, `idtipo_inmueble`, `fecha_inicial`, `fecha_final`, `precio`, `preciomenor`, `preciomascota`, `promopersonagratis`, `promonumpersonas`, `estado_temporada`, `estado`) VALUES
(1, 15, '2021-07-20', '2021-07-23', '375.00', '185.00', '50.00', 'Inhabilitado', 2, 'Inactivo', 'Eliminado'),
(2, 15, '2021-07-24', '2021-07-25', '390.00', '180.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(3, 15, '2021-07-26', '2021-07-30', '350.00', '150.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(4, 13, '2021-08-13', '2021-08-15', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(5, 16, '2021-08-13', '2021-08-15', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(6, 13, '2021-08-16', '2021-08-19', '375.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(7, 16, '2021-08-16', '2021-08-19', '375.00', '150.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(8, 13, '2021-10-22', '2021-10-24', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(9, 13, '2021-10-25', '2021-10-28', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(10, 14, '2021-10-22', '2021-10-24', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(11, 14, '2021-10-29', '2021-11-01', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(12, 14, '2021-10-25', '2021-10-28', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(13, 14, '2021-11-02', '2021-11-04', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(14, 14, '2021-11-05', '2021-11-07', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(15, 14, '2021-11-08', '2021-11-11', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(16, 14, '2021-11-12', '2021-11-14', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(17, 14, '2021-11-15', '2021-11-18', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(18, 14, '2021-11-19', '2021-11-21', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(19, 14, '2021-11-22', '2021-11-25', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(20, 14, '2021-11-26', '2021-11-28', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(21, 14, '2021-11-29', '2021-12-02', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(22, 14, '2021-12-03', '2021-12-05', '225.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(23, 14, '2021-11-02', '2021-12-16', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(24, 14, '2021-12-17', '2022-01-05', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(25, 14, '2022-01-06', '2022-02-11', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(26, 14, '2022-02-12', '2022-02-14', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(27, 14, '2022-02-15', '2022-04-07', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(28, 14, '2022-04-08', '2022-04-17', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(29, 14, '2022-04-18', '2022-04-30', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(30, 14, '2022-05-01', '2022-05-01', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(31, 14, '2022-05-02', '2022-05-09', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(32, 14, '2022-05-10', '2022-05-10', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(33, 14, '2022-05-11', '2022-06-16', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(34, 14, '2022-06-17', '2022-06-30', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(35, 14, '2022-07-01', '2022-07-02', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(36, 14, '2022-07-03', '2022-07-03', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(37, 14, '2022-07-04', '2022-08-31', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(38, 14, '2022-09-01', '2022-09-30', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(39, 14, '2022-10-01', '2022-10-19', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(40, 14, '2022-10-20', '2022-10-20', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(41, 14, '2022-10-21', '2022-10-31', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(42, 14, '2022-11-01', '2022-11-01', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(43, 14, '2022-11-02', '2022-12-14', '275.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(44, 14, '2022-12-15', '2023-01-05', '325.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(45, 13, '2021-10-25', '2021-10-28', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(46, 13, '2021-10-29', '2021-11-01', '530.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(47, 13, '2021-11-02', '2021-11-16', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(48, 13, '2021-11-02', '2021-12-16', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(49, 13, '2021-12-17', '2022-01-05', '530.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(50, 13, '2022-01-06', '2022-02-11', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(51, 13, '2022-02-12', '2022-02-14', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(52, 13, '2022-02-15', '2022-04-07', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(53, 13, '2022-04-08', '2022-04-17', '530.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(54, 13, '2022-04-18', '2022-04-30', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(55, 13, '2022-05-01', '2022-05-01', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(56, 13, '2022-05-02', '2022-05-09', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(57, 13, '2022-05-10', '2022-05-10', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(58, 13, '2022-05-11', '2022-05-16', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Inactivo', 'Eliminado'),
(59, 13, '2022-05-11', '2022-06-16', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(60, 13, '2022-06-17', '2022-06-30', '530.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(61, 13, '2022-07-01', '2022-07-02', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(62, 13, '2022-07-03', '2022-07-03', '530.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(63, 13, '2022-07-04', '2022-08-31', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(64, 13, '2022-09-01', '2022-09-30', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(65, 13, '2022-10-01', '2022-10-19', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(66, 13, '2022-10-20', '2022-10-20', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(67, 13, '2022-10-21', '2022-10-31', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(68, 13, '2022-11-01', '2022-11-01', '390.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(69, 13, '2022-11-02', '2022-12-14', '340.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado'),
(70, 13, '2022-12-15', '2023-01-05', '530.00', '185.00', '50.00', 'Inhabilitado', 1, 'Activo', 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_inmueble`
--

CREATE TABLE `tipo_inmueble` (
  `idtipo_inmueble` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `maxpersonas` int(11) NOT NULL,
  `minpersonas` int(11) NOT NULL,
  `menoresxpareja` int(11) NOT NULL,
  `mascotas` varchar(5) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `maxmascotas` int(11) DEFAULT NULL,
  `estado_tipoinmueble` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_inmueble`
--

INSERT INTO `tipo_inmueble` (`idtipo_inmueble`, `nombre`, `descripcion`, `maxpersonas`, `minpersonas`, `menoresxpareja`, `mascotas`, `maxmascotas`, `estado_tipoinmueble`, `estado`) VALUES
(13, 'Cabañas', 'Las cabañas cuentan con un diseño rustico y acogedor; llena de acabados  finos y diseños distintos en cada una de ellas, haciendo de cada cabaña únicas en su interior y exterior. Nuestro hotel cuenta con deiciocho cabañas donde nuestra prioridad es la satisfacción de nuestros clientes.', 6, 2, 2, 'SI', 2, 'Activo', 'Habilitado'),
(14, 'Glamping', 'Glamping Monarca, ofrece una experiencia única en cinco carpas equipadas con todas las comodidades en medio del bosque nuboso. Además de ofrecer un ambiente tranquilo en medio de la naturaleza, tiene una area exclusiva donde el huesped cuenta con una sala en el exterior, servicio de baño y ducha privada. Es una experencia donde la comodidad y la naturaleza se vuelven uno.', 3, 1, 0, 'NO', 0, 'Activo', 'Habilitado'),
(15, 'Cabaña Pequeña', 'Cabaña Pequeña con 1 habitacion para 2 personas ,', 6, 2, 2, 'SI', 1, 'Inactivo', 'Eliminado'),
(16, 'Cabaña individual', 'hospedaje para una persona, un desayuno y uso de piscina y jacuzzi', 1, 1, 0, 'SI', 1, 'Inactivo', 'Eliminado'),
(17, 'TEMPLO 1', 'Habitaciones con camas múltiples exclusivos para retiros espirituales', 10, 5, 5, 'NO', 0, 'Inactivo', 'Eliminado'),
(18, 'Cabaña para 2 adultos y 2 niños gratis', 'Hospedaje para dos adultos y dos menores de 12 años gratis, uso de piscinas y jacuzzi, desayuno gratis y uso de areas verdes', 2, 2, 2, 'SI', 1, 'Inactivo', 'Eliminado'),
(19, 'Cabaña para 3 adultos y 2 niños gratis', 'Hospedaje para 3 adultos y 2 niños menores de doce años gratis, uso de piscinas y jacuzzi, desayunos gratis y uso de areas verdes', 3, 3, 2, 'SI', 1, 'Inactivo', 'Eliminado'),
(20, 'Cabaña para 4 adultos y dos niños gratis', 'Hospedaje para cuatro adultos y dos menores de doce años gratis, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes.', 4, 4, 2, 'SI', 1, 'Inactivo', 'Eliminado'),
(21, 'Cabaña para 5 adultos y 1 niño gratis', 'Hospedaje para cinco adultos y un menor de doce años gratis, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes.', 5, 5, 1, 'SI', 1, 'Inactivo', 'Eliminado'),
(22, 'Cabaña para 6 adultos', 'Hospedaje para 6 adultos, uso de piscina y jacuzzi, desayunos gratis y uso de areas verdes', 6, 6, 0, 'SI', 1, 'Inactivo', 'Eliminado'),
(23, 'Glamping para 2 personas', 'Hospedaje en casa de campaña con todas sus comodidades dentro del bosque, para dos personas, uso de piscina y jacuzzi, areas verdes y termo de cafe y champurradas', 2, 2, 0, 'SI', 1, 'Inactivo', 'Eliminado'),
(24, 'Glamping para 3 personas', 'Hospedaje en Casa de Campaña con todas sus comodidades dentro del bosque, para 3 personas, uso de piscina y jacuzzi, desayuno gratis, termo de cafe y champurradas, y uso de areas verdes', 3, 3, 0, 'SI', 1, 'Inactivo', 'Eliminado'),
(25, 'Cabaña Campestre', NULL, 2, 1, 0, 'NO', 0, 'Activo', 'Habilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `empresa` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idempresa` int(11) NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pais` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departamento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_documento` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_usuario` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zona_horaria` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moneda` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `principal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_administrador` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `empresa`, `idempresa`, `telefono`, `pais`, `departamento`, `direccion`, `num_documento`, `logo`, `tipo_usuario`, `zona_horaria`, `moneda`, `principal`, `tipo_administrador`, `estado`) VALUES
(1, 'Otto Szarata', 'ottoszarata@szystems.com', '$2y$10$2jK4FT004xeXrkEVLqYwFePi.HojvwHnwr1anpTcZ3.2zlOWvMcOS', '9s1XcShahkeH7OdqWSVTgl4hbMwGmTYhdoKWwgFS1Eu8TJLJwL2xDsQJ2L03', '2019-02-19 23:13:45', '2021-03-23 04:35:25', 'Szystems', 1, '42153288', 'Guatemala', 'Quetzaltenango', 'diagonal 2 32-22 zona 3', '1676902560901', '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'SI', 'Total', 'Habilitado'),
(46, 'Edgar Sajquim', 'Eliminado', '$2y$10$BIHG6jNeTy4PuJNgTrKRY.4KRExXaSTIqOEBB8Xm3cB71eTRRB5R2', NULL, '2021-03-23 23:38:22', '2021-05-18 03:42:17', 'Szystems', 1, '564545', 'Guatemala', 'Quetzaltenango', 'adfasdfasdfasdfasdf', '4456456-5', '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Eliminado'),
(47, 'Carlos Villagran', 'cvillagran@hotmail.com', '$2y$10$uSkU.iPyzpvJRmAkGgeciePtHeYBpP8V99idB1/mUFr/ofC9j1t7i', NULL, '2021-03-23 23:40:17', '2021-03-23 23:42:12', 'Szystems', 1, '+502 5465454654', 'Guatemala', 'Quetzaltenango', 'quetgo cerca de burguer', '23423423423488', '1628799533logo.png', 'Huesped', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(48, 'maradona', 'maradona@hotmail.com', '$2y$10$AFA8jl5ZzrpKVilzIbQ2TO6J.u0kpIhY/ycZlAJqkHXAfFHquk/3W', '7553V80HBol6ksOJa2PVTZvuhycHTisZuwQJVZSCEFjlDamZo6fvIm9yrNnR', '2021-05-05 04:12:15', '2021-05-06 04:54:32', 'Szystems', 1, '334534545', 'Guatemala', 'Guatemala', 'diagonal 2 32', '3493503-7', '1628799533logo.png', 'Huesped', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(49, 'Otto Francisco Szarata Maldonado', 'szotto18@hotmail.com', '$2y$10$r3r/vBCjU3ESzyHHaHLaPOyMt02Anf1sVEhxAoqiaIbzvXksVA1.O', 'IgCkeLbWPd7xqcTVqbSZ7tno543dTQzqRTPcNUqNx3DC3PoNMMI9ExkzwVaa', '2021-05-07 04:57:37', '2021-05-07 05:00:19', 'Szystems', 1, '+50242153288', 'Guatemala', NULL, 'diagonal 2 32-22 zona 3 chi', NULL, '1628799533logo.png', 'Huesped', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(50, 'Pablo Rivera', 'Eliminado', '$2y$10$WWYPMaeOph3KHCxQMAXGUeXwftQldcIC6doOHtJOkeeFrXh.GkJ5u', NULL, '2021-05-20 21:13:27', '2021-05-20 21:27:34', 'Szystems', 1, '46565552', 'Guatemala', 'Quetzaltenango', 'cantel', '654654654', '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Eliminado'),
(51, 'Pablo Rivera', 'Eliminado', '$2y$10$k8z.qY3svu1ilZcWy4jLOuwOzkv7DL.VM56O6dKOR.f64B6bs84rm', NULL, '2021-05-20 21:27:46', '2021-05-20 21:27:52', 'Szystems', 1, '6454654', NULL, NULL, NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Eliminado'),
(52, 'carlos ordones', 'Eliminado', '$2y$10$zxQlZEOhShzcwezbZ9Q1T.Tdv1NSF1gA.SIS6bFHAB53EWKV.EoGy', NULL, '2021-05-20 21:36:04', '2021-05-20 21:37:01', 'Szystems', 1, '5465454', 'guatemala', NULL, NULL, NULL, '1628799533logo.png', 'Huesped', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Eliminado'),
(53, 'Pablo Rivera', 'riveralldesign@gmail.com', '$2y$10$lBTkmKRcCwm7oCc9TxIUDOd4STnR3PKRgVEtnF3rzk705QK9/FA9.', 'jGBuJ3h8lsh3RyOhe420XowkUDSonDIEyFonURXMDG7ne1Y1C6f14AUls1Mc', '2021-05-21 21:52:00', '2021-08-12 01:02:23', 'Szystems', 1, '56789054', 'Guatemala', 'Quetzaltenango', '5ta calle, Casa 5 Zona 3, Quetzaltenango', '234456777880901', '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(54, 'Katherin Lopez', 'kl.highlandpark@gmail.com', '$2y$10$j5oJE4.KIh5FEF51USkJkuKYoNhY2Kz4SbpNbSuUp.wN.XmjCuvia', 'tHBMILMoN3UjmYJbfIeQleWyCWQp0wCTYPX6qV7xRytSWg4LZTJZM3lu9G8Y', '2021-05-21 22:50:13', '2021-05-21 22:54:16', 'Szystems', 1, NULL, NULL, NULL, NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(55, 'Henry Lopez', 'henrylopez1002@gmail.com', '$2y$10$nruMUXikT7M4Eu2Bjbz6betfT6EG0GCtCI/ghYgP114P9kwK4vuju', 'Oa2vG79iYn91sVWvSaMtk3ySeqsxBic7iuA21EPHjIQYXwOfgfKIslfqpDHD', '2021-05-21 22:51:45', '2021-05-21 22:53:41', 'Szystems', 1, NULL, NULL, NULL, NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(56, 'Ana Sofia Molina', 'admonhighlandpark@gmail.com', '$2y$10$mJMKGgV4yRZrOPGQ5yJBUeEa2QVvu8Don80mjC4GjAJBkgCsSDemy', NULL, '2021-05-21 23:02:49', '2021-05-21 23:02:49', 'Szystems', 1, '30012067', 'Guatemala', NULL, NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(57, 'Pablo Rivera', 'p130690@gmail.com', '$2y$10$lBz4ItbSzGOO8.3RjVuD.eTYCwdHQBH4nxbDy2hqXItDAVq76FFzG', 'bx2tPPYLKSNykBj6nNvvEkVuMll2Gw11Au5fEUqndSkw8c3cTQ1Gwwe0gvvO', '2021-07-10 03:05:09', '2021-07-10 03:07:49', 'Szystems', 1, NULL, NULL, NULL, NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(58, 'Juan Perez', 'Eliminado', '$2y$10$oUxlU9TYEk.BIPwDecKe0eL1ZZUVRiWUF8xdplF0SOOl9A0e82SC2', NULL, '2021-07-20 19:09:04', '2021-07-20 19:13:01', 'Szystems', 1, NULL, 'Guatemala', NULL, NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Eliminado'),
(59, 'Juan Reyes', 'ingresos.highlandpark@gmail.com', '$2y$10$CqcIVFU7kGR.KjKgaOnqGudO0hZQ2/527rGeCZHKEO4tJS3pM3JpW', 'vl54mU7QZtiBgGe6Oh8mpb8YxliTeDUs4Rld6eWZbrhSK9HQbkuYLlXHwS2V', '2021-07-20 21:09:23', '2021-08-12 22:49:22', 'Szystems', 1, NULL, NULL, NULL, NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(60, 'Esdras Sulugui', 'contabilidad.highlandpark@gmail.com', '$2y$10$p/Tjqv9OGeFHpqKoWamoO.HZxIGn/v85cjNkoxBGkgn77xcYi04pi', 'XLXSTGNNPpv0GDXxislwWYXjIiL0H00aWSK9ouxnQtvvIC8B7u1zS8tPyX7T', '2021-07-20 21:11:36', '2021-08-12 23:03:33', 'Szystems', 1, '41237046', 'Guatemala', 'Sololá', NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Habilitado'),
(61, 'Emely', 'Eliminado', '$2y$10$PM5Cmdqo1XVKPMI4bz2L9e9Sfre/3RE0fljYJ2pZQP6EECCCck3ye', NULL, '2021-08-12 22:59:45', '2021-08-12 23:00:12', 'Szystems', 1, '77674565', 'Guatemala', 'Totonicapan', 'avenida lucia 4-23', '1234 456789 0901', '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Recepcionista', 'Eliminado'),
(62, 'Gerado Cruz', 'Eliminado', '$2y$10$0loESS4xnYASC.NR/HH.6.ctKSAMg3ItVCY9Sjq7rFPPO6Z1/xcCO', NULL, '2021-08-12 22:59:47', '2021-08-12 23:01:54', 'Szystems', 1, '4564444464646464', 'Guatemala', 'Quetzaltenango', NULL, NULL, '1628799533logo.png', 'Administrador', 'America/Guatemala', 'Q.', 'NO', 'Total', 'Eliminado'),
(63, 'Armando Rios', 'armando_123@gmail.com', '$2y$10$hQEBNoQHqSHfVg5dDTMBYeg/u3UKxiXO4Q1SLTlxTEKTc2SxZRiKC', NULL, '2021-08-13 00:00:00', '2021-08-13 00:00:00', 'Szystems', 1, '12345678', 'Argentina', NULL, '3ra. calle norte', NULL, '1628799533logo.png', 'Huesped', 'America/Guatemala', 'Q.', 'NO', NULL, 'Habilitado'),
(64, 'zenaida', 'zenaida@gmail.com', '$2y$10$Jc.M.CPWc7nW7BBYZfWlt.4NXr2m4ASC3gWr2yT3xMZfhK5Rvf5Iy', NULL, '2021-08-13 00:00:41', '2021-08-13 00:00:41', 'Szystems', 1, '77654321', 'guatemala', 'Quetzaltenango', 'colomba', '1234 56789 0901', '1628799533logo.png', 'Huesped', 'America/Guatemala', 'Q.', 'NO', NULL, 'Habilitado'),
(65, 'Esdras Aldair sulugui', 'es_aldair@hotmail.com', '$2y$10$zrz6V5E/gBpGjHtnbT4VYe0VWox12BSteFGkGbZiEayLquvB3WAp.', NULL, '2021-08-13 00:22:49', '2021-08-13 00:22:49', 'Szystems', 1, '41237046', 'Guatemala', 'Guatemala', NULL, '2751018000713', NULL, 'Huesped', 'America/Guatemala', 'Q.', 'NO', NULL, 'Habilitado'),
(66, 'Javier Hernandez', 'jpra5@hotmail.com', '$2y$10$oVTo3ZH5M8R68a9xKjmgNem0rfbJPMpEcMMa9GzdnfOXqBrLH8Yra', 'fAk4BEeJs3F1UWT9FjMSvIwibeeNngbvT2IlxaAkTAhDcDmrHyoL6F5dCNtH', '2021-08-13 00:27:03', '2021-08-13 00:27:03', 'Szystems', 1, '58243500', 'Guatemala', 'Guatemala', 'diagonal 2 32-22 zona 3 JLP', '167690256090188', NULL, 'Huesped', 'America/Guatemala', 'Q.', 'NO', NULL, 'Habilitado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`idbitacora`);

--
-- Indices de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD PRIMARY KEY (`idcaracteristica`),
  ADD KEY `idtipo_inmueble` (`idtipo_inmueble`);

--
-- Indices de la tabla `detalle_reservacion`
--
ALTER TABLE `detalle_reservacion`
  ADD PRIMARY KEY (`iddetalle_reservacion`),
  ADD KEY `idreservacion` (`idreservacion`),
  ADD KEY `idinmueble` (`idinmueble`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`idinmueble`),
  ADD KEY `idtipo_inmueble` (`idtipo_inmueble`);

--
-- Indices de la tabla `inmueble_img`
--
ALTER TABLE `inmueble_img`
  ADD PRIMARY KEY (`idinmueble_img`),
  ADD KEY `idinmueble` (`idinmueble`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`idreservacion`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`idtemporada`),
  ADD KEY `idtipo_inmueble` (`idtipo_inmueble`);

--
-- Indices de la tabla `tipo_inmueble`
--
ALTER TABLE `tipo_inmueble`
  ADD PRIMARY KEY (`idtipo_inmueble`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `idbitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT de la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  MODIFY `idcaracteristica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `detalle_reservacion`
--
ALTER TABLE `detalle_reservacion`
  MODIFY `iddetalle_reservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `idinmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `inmueble_img`
--
ALTER TABLE `inmueble_img`
  MODIFY `idinmueble_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  MODIFY `idreservacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `temporada`
--
ALTER TABLE `temporada`
  MODIFY `idtemporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `tipo_inmueble`
--
ALTER TABLE `tipo_inmueble`
  MODIFY `idtipo_inmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristica`
--
ALTER TABLE `caracteristica`
  ADD CONSTRAINT `caracteristica_ibfk_1` FOREIGN KEY (`idtipo_inmueble`) REFERENCES `tipo_inmueble` (`idtipo_inmueble`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

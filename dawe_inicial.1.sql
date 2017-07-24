-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2017 a las 02:34:05
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dawe_inicial`
--

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`idAccesos`, `Agrega`, `Modifica`, `Mostrar`, `Elimina`, `idUsuarios`, `idModulo`) VALUES
(1, 1, 1, 1, 1, 0, 2),
(2, 1, 1, NULL, 1, 0, 1),
(3, 1, 1, NULL, 1, 0, 4),
(4, 1, 1, NULL, 1, 0, 3),
(5, 1, 1, NULL, 1, 0, 6),
(6, 1, 1, NULL, 1, 0, 5),
(7, 1, 1, NULL, 1, 0, 8),
(8, 1, 1, NULL, 1, 0, 7),
(9, 1, 1, NULL, 1, 0, 9),
(10, 1, 1, NULL, 1, 0, 10);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idModulos`, `Nombre`, `Dir`, `estado`, `RefId`, `tipo`) VALUES
(1, 'Inicio', '../app/img/inicio.png', 1, 'inicio', 0),
(2, 'Usuarios', '../app/img/usuariotab.png', 1, 'usuario', 0),
(3, 'Compras', '../app/img/carro-de-la-compra.png', 1, 'compras', 0),
(4, 'Cuentas', '../app/img/etiqueta-del-precio.png', 1, 'cuentas', 0),
(5, 'Estadistica', '../app/img/reparacion-mecanismo.png', 1, 'estadistica', 1),
(6, 'Inventario', '../app/img/notas.png', 1, 'inventario', 0),
(7, 'Ventas', '../app/img/diagrama.png', 1, 'ventas', 0),
(8, 'Pagos', '../app/img/pagos.png', 1, 'pagos', 1),
(9, 'Clientes', '../app/img/clientes.png', 1, 'clientes1', 0),
(10, 'Proveedores', '../app/img/proveedores.png', 1, 'proveedores1', 0);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`idPuestos`, `Descripcion`) VALUES
(1, 'Jefe'),
(2, 'Vendedor');

-- --------------------------------------------------------



INSERT INTO `roles` (`idRol`, `Descripcion`, `ModulosDefecto`, `estado`) VALUES
(0, 'Soporte', '12345678', 0),
(1, 'Administrador', '12345678', 1),
(2, 'Usuario', '1456', 1);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `tipocompra`
--

INSERT INTO `tipocompra` (`idTipo`, `Descripcion`, `Observacion`, `estado`) VALUES
(1, 'Contado', NULL, 1),
(2, 'Credito', NULL, 1),
(3, 'Donacion', NULL, 1);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`idTipo`, `Descripcion`, `Observacion`, `estado`) VALUES
(1, 'Contado', NULL, 1),
(2, 'Credito', NULL, 1),
(3, 'Donacion', NULL, 1);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Email`, `user`, `Contra`, `estado`, `idRol`, `idEmpleados`) VALUES
(0, NULL, 'admin', '123412341234', 1, 0, NULL);

-- --------------------------------------------------------



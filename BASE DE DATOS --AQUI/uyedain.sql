-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-02-2021 a las 16:59:07
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uyedain`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizar`
--

CREATE TABLE `autorizar` (
  `Id_Autoriza` int(11) NOT NULL,
  `Id_Requisicion` int(11) NOT NULL,
  `Autoriza1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Fec_Autoriza1` date NOT NULL DEFAULT current_timestamp(),
  `Hr_Autoriza1` time NOT NULL DEFAULT current_timestamp(),
  `Com_Autoriza1` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoriza_dos`
--

CREATE TABLE `autoriza_dos` (
  `Id_AutorizaD` int(10) NOT NULL,
  `Id_Requisicion` int(10) NOT NULL,
  `Autoriza2` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Fec_Autoriza2` date NOT NULL DEFAULT current_timestamp(),
  `Hr_Autoriza2` time NOT NULL DEFAULT current_timestamp(),
  `Com_Autoriza2` varchar(130) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autoriza_tres`
--

CREATE TABLE `autoriza_tres` (
  `Id_AutorizaT` int(10) NOT NULL,
  `Id_Requisicion` int(11) NOT NULL,
  `Autoriza3` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Fec_Autoriza3` date NOT NULL DEFAULT current_timestamp(),
  `Hr_autoriza3` time NOT NULL DEFAULT current_timestamp(),
  `Com_Autoriza3` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancelado`
--

CREATE TABLE `cancelado` (
  `Id_cancelado` int(11) NOT NULL,
  `Id_requisicion` int(11) NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Fec_Cancela` date NOT NULL DEFAULT current_timestamp(),
  `Hr_cancela` time NOT NULL DEFAULT current_timestamp(),
  `Comentario` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Id_Compra` int(11) NOT NULL,
  `Id_Requisicion` int(10) NOT NULL,
  `OrdenCompra` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Comentarios` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Fe_AsignaOC` date NOT NULL DEFAULT current_timestamp(),
  `Hr_Asigna` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `IdCorreo` int(11) NOT NULL,
  `Usuario` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(160) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(190) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_contable`
--

CREATE TABLE `c_contable` (
  `Id_Cuenta` int(10) NOT NULL,
  `Cuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Area` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Bloqueado` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `c_contable`
--

INSERT INTO `c_contable` (`Id_Cuenta`, `Cuenta`, `Descripcion`, `Area`, `Bloqueado`) VALUES
(1, '50020-100', 'FLEXOGRAFIA', 'Manufactura', 'FALSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id_RegistroP` int(10) NOT NULL,
  `Proveedor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Telefonos` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Contacto` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Categoria` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `WebSite` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Notas` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Terminos` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `RFC` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Bloqueado` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id_RegistroP`, `Proveedor`, `Direccion`, `Telefonos`, `Contacto`, `Email`, `Categoria`, `WebSite`, `Notas`, `Terminos`, `RFC`, `Bloqueado`) VALUES
(1235, ' SA DE CV', 'COLONIA SAN NICOLAS TOLENTINO', '', '', '', 'Misc.', '', '', 'CONTADO', 'TRA1', 'FALSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rechazado`
--

CREATE TABLE `rechazado` (
  `Id_rechazar` int(10) NOT NULL,
  `Id_requisicion` int(10) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Fec_Rechazo` date NOT NULL DEFAULT current_timestamp(),
  `Hr_Rechazo` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reenvio`
--

CREATE TABLE `reenvio` (
  `Id_reenvio` int(10) NOT NULL,
  `Id_requisicion` int(10) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Fec_Reenvio` date NOT NULL DEFAULT current_timestamp(),
  `Hr_Reenvio` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rq_requisiciond`
--

CREATE TABLE `rq_requisiciond` (
  `Id_Registro` int(10) NOT NULL,
  `Id_Requisicion` int(10) NOT NULL,
  `numeroOC` int(11) NOT NULL,
  `Producto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `Descripciond` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` decimal(10,2) NOT NULL,
  `Unidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Recibido` date NOT NULL,
  `CuentaCont` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `Justificacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Status` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rq_requisicione`
--

CREATE TABLE `rq_requisicione` (
  `Id_Requisicion` int(11) NOT NULL,
  `NumCompras` int(10) NOT NULL,
  `Proveedor` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `Requisicion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Maquila` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Papeleria` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_solicitud` date NOT NULL DEFAULT current_timestamp(),
  `Fecha_requerida` date NOT NULL,
  `Moneda` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Requisitor` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `JefeAutiriza` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Importe` decimal(10,2) NOT NULL,
  `Status` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `CorreoRequisicion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Fec_Envio` date NOT NULL,
  `Ult_Envio` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rq_seguimiento`
--

CREATE TABLE `rq_seguimiento` (
  `Id_Registro` int(11) NOT NULL,
  `Id_Requisicion` int(11) NOT NULL,
  `Fecha` date NOT NULL DEFAULT current_timestamp(),
  `Hora` time NOT NULL DEFAULT current_timestamp(),
  `Comentarios` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Solicita` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `No_Empleado` int(8) NOT NULL,
  `Asistencia` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `Area` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Departamento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Jefe` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `JefeAutoriza` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `JefeDelega` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `JefeEvalua` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Maquila` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Bloqueado` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `RegistraReq` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Cierre` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Puesto` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autorizar`
--
ALTER TABLE `autorizar`
  ADD PRIMARY KEY (`Id_Autoriza`),
  ADD KEY `Id_Requisicion` (`Id_Requisicion`);

--
-- Indices de la tabla `autoriza_dos`
--
ALTER TABLE `autoriza_dos`
  ADD PRIMARY KEY (`Id_AutorizaD`),
  ADD KEY `Fk_AE` (`Id_Requisicion`);

--
-- Indices de la tabla `autoriza_tres`
--
ALTER TABLE `autoriza_tres`
  ADD PRIMARY KEY (`Id_AutorizaT`),
  ADD KEY `Id_Requisicion` (`Id_Requisicion`);

--
-- Indices de la tabla `cancelado`
--
ALTER TABLE `cancelado`
  ADD PRIMARY KEY (`Id_cancelado`),
  ADD KEY `Id_requisicion` (`Id_requisicion`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Id_Compra`),
  ADD KEY `FK_CompE` (`Id_Requisicion`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`IdCorreo`);

--
-- Indices de la tabla `c_contable`
--
ALTER TABLE `c_contable`
  ADD PRIMARY KEY (`Id_Cuenta`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id_RegistroP`);

--
-- Indices de la tabla `rechazado`
--
ALTER TABLE `rechazado`
  ADD PRIMARY KEY (`Id_rechazar`),
  ADD KEY `Id_requisicion` (`Id_requisicion`);

--
-- Indices de la tabla `reenvio`
--
ALTER TABLE `reenvio`
  ADD PRIMARY KEY (`Id_reenvio`),
  ADD KEY `FK_reenreq` (`Id_requisicion`);

--
-- Indices de la tabla `rq_requisiciond`
--
ALTER TABLE `rq_requisiciond`
  ADD PRIMARY KEY (`Id_Registro`),
  ADD KEY `FK_de` (`Id_Requisicion`);

--
-- Indices de la tabla `rq_requisicione`
--
ALTER TABLE `rq_requisicione`
  ADD PRIMARY KEY (`Id_Requisicion`);

--
-- Indices de la tabla `rq_seguimiento`
--
ALTER TABLE `rq_seguimiento`
  ADD PRIMARY KEY (`Id_Registro`),
  ADD KEY `FK_se` (`Id_Requisicion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autorizar`
--
ALTER TABLE `autorizar`
  MODIFY `Id_Autoriza` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autoriza_dos`
--
ALTER TABLE `autoriza_dos`
  MODIFY `Id_AutorizaD` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autoriza_tres`
--
ALTER TABLE `autoriza_tres`
  MODIFY `Id_AutorizaT` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cancelado`
--
ALTER TABLE `cancelado`
  MODIFY `Id_cancelado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Id_Compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `IdCorreo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `c_contable`
--
ALTER TABLE `c_contable`
  MODIFY `Id_Cuenta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id_RegistroP` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1236;

--
-- AUTO_INCREMENT de la tabla `rechazado`
--
ALTER TABLE `rechazado`
  MODIFY `Id_rechazar` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reenvio`
--
ALTER TABLE `reenvio`
  MODIFY `Id_reenvio` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rq_requisiciond`
--
ALTER TABLE `rq_requisiciond`
  MODIFY `Id_Registro` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rq_requisicione`
--
ALTER TABLE `rq_requisicione`
  MODIFY `Id_Requisicion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rq_seguimiento`
--
ALTER TABLE `rq_seguimiento`
  MODIFY `Id_Registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autorizar`
--
ALTER TABLE `autorizar`
  ADD CONSTRAINT `autorizar_ibfk_1` FOREIGN KEY (`Id_Requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `autoriza_dos`
--
ALTER TABLE `autoriza_dos`
  ADD CONSTRAINT `Fk_AE` FOREIGN KEY (`Id_Requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `autoriza_tres`
--
ALTER TABLE `autoriza_tres`
  ADD CONSTRAINT `autoriza_tres_ibfk_1` FOREIGN KEY (`Id_Requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `cancelado`
--
ALTER TABLE `cancelado`
  ADD CONSTRAINT `cancelado_ibfk_1` FOREIGN KEY (`Id_requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `FK_CompE` FOREIGN KEY (`Id_Requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `rechazado`
--
ALTER TABLE `rechazado`
  ADD CONSTRAINT `rechazado_ibfk_1` FOREIGN KEY (`Id_requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `reenvio`
--
ALTER TABLE `reenvio`
  ADD CONSTRAINT `FK_reenreq` FOREIGN KEY (`Id_requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `rq_requisiciond`
--
ALTER TABLE `rq_requisiciond`
  ADD CONSTRAINT `FK_de` FOREIGN KEY (`Id_Requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);

--
-- Filtros para la tabla `rq_seguimiento`
--
ALTER TABLE `rq_seguimiento`
  ADD CONSTRAINT `FK_se` FOREIGN KEY (`Id_Requisicion`) REFERENCES `rq_requisicione` (`Id_Requisicion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

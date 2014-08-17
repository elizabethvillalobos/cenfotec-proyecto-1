-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-08-2014 a las 20:00:33
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigoactivacion`
--

CREATE TABLE IF NOT EXISTS `codigoactivacion` (
  `idUsuario` varchar(50) NOT NULL,
  `codigoActivacion` varchar(50) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE IF NOT EXISTS `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE IF NOT EXISTS `horarios` (
  `idUsuario` varchar(50) NOT NULL,
  `horario` varchar(300) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEmisor` varchar(50) NOT NULL,
  `idReceptor` varchar(50) NOT NULL,
  `mensaje` varchar(160) NOT NULL,
  `horaFecha` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `leido` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcarrera`
--

CREATE TABLE IF NOT EXISTS `tcarrera` (
  `id` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idDirector` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcarrera`
--

INSERT INTO `tcarrera` (`id`, `nombre`, `idDirector`, `activo`) VALUES
('BISOFT', 'Desarrollo de software', 'mucros@ucenfotec.ac.cr', 1),
('INGTEC', 'Inglés', 'aespinach@ucenfotec.ac.cr', 1),
('SITEC', 'Integración de tecnologías', 'lchacon@ucenfotec.ac.cr', 1),
('TELTEC', 'Telemática', 'nbrenes@ucenfotec.ac.cr', 1),
('WEBTEC', 'Desarrollo y diseño web', 'pmonestel@ucenfotec.ac.cr', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcitas`
--

CREATE TABLE IF NOT EXISTS `tcitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idSolicitante` varchar(50) NOT NULL,
  `idSolicitado` varchar(50) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `asunto` varchar(150) NOT NULL,
  `modalidad` int(2) NOT NULL,
  `tipo` int(2) NOT NULL,
  `observaciones` varchar(300) NOT NULL,
  `curso` varchar(25) NOT NULL,
  `estado` int(2) NOT NULL,
  `esCita` tinyint(1) NOT NULL,
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `tcitas`
--

INSERT INTO `tcitas` (`id`, `idSolicitante`, `idSolicitado`, `fechaInicio`, `fechaFin`, `asunto`, `modalidad`, `tipo`, `observaciones`, `curso`, `estado`, `esCita`, `fechaCreacion`) VALUES
(33, 'evillalobos@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-25 16:00:00', '2014-08-25 17:00:00', 'CUFEs', 0, 0, 'Revision de CUFEs y documentos para el proyecto.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(34, 'evillalobos@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-26 15:00:00', '2014-08-26 16:00:00', 'PHP y mySql', 0, 0, 'Preguntas sobre conexion a la BD usando PHP.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(35, 'evillalobos@ucenfotec.ac.cr', 'aluna@ucenfotec.ac.cr', '2014-08-27 17:00:00', '2014-08-27 18:00:00', 'Grafos', 0, 0, 'Preguntas sobre grafos.', 'INF-02', 1, 1, '2014-08-16 17:59:38'),
(36, 'evillalobos@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-11 17:00:00', '2014-08-11 18:00:00', 'Examen de procesos', 0, 0, 'Hola profe, tengo algunas preguntas sobre el examen.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(37, 'evillalobos@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-25 15:00:00', '2014-08-25 16:00:00', 'Revision de prototipo.', 1, 1, 'Hola, queremos revisar el prototipo que tenemos y recibir retroalimentacion.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(38, 'evillalobos@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-10 17:00:00', '2014-08-10 18:00:00', 'Revision de codigo PHP.', 1, 0, 'Hola, quisiera revisar el codigo que he desarrollado hasta ahora.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(39, 'evillalobos@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-18 13:00:00', '2014-08-18 14:00:00', 'Prueba para cancelar cita.', 0, 0, 'Testing.........', 'BISOFT-04', 5, 1, '2014-08-16 17:59:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcitascanceladas`
--

CREATE TABLE IF NOT EXISTS `tcitascanceladas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(500) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `tcitascanceladas`
--

INSERT INTO `tcitascanceladas` (`id`, `motivo`, `idUsuario`) VALUES
(13, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(14, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(15, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(16, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(17, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(18, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcursos`
--

CREATE TABLE IF NOT EXISTS `tcursos` (
  `id` varchar(25) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcursos`
--

INSERT INTO `tcursos` (`id`, `activo`, `nombre`) VALUES
('BISOFT-04', 1, 'Proyecto de ingeniería de software 1'),
('BISOFT-07', 1, 'Programación orientada a objetos'),
('COMP-01', 1, 'Procesos empresariales'),
('INF-01', 1, 'Introducción a la tecnología de información'),
('INF-02', 1, 'Fundamentos de programación'),
('INF-03', 1, 'Fundamentos de bases de datos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tcursosxcarrera`
--

CREATE TABLE IF NOT EXISTS `tcursosxcarrera` (
  `idCarrera` varchar(25) NOT NULL,
  `idCurso` varchar(25) NOT NULL,
  PRIMARY KEY (`idCarrera`,`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tcursosxcarrera`
--

INSERT INTO `tcursosxcarrera` (`idCarrera`, `idCurso`) VALUES
('BISOFT', 'BISOFT-04'),
('BISOFT', 'BISOFT-07'),
('BISOFT', 'COMP-01'),
('BISOFT', 'INF-01'),
('BISOFT', 'INF-02'),
('BISOFT', 'INF-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tevaluaciones`
--

CREATE TABLE IF NOT EXISTS `tevaluaciones` (
  `idCita` int(11) NOT NULL,
  `nota1` int(11) NOT NULL,
  `nota2` int(11) NOT NULL,
  `nota3` int(11) NOT NULL,
  `nota4` int(11) NOT NULL,
  `nota5` int(11) NOT NULL,
  `realizada` tinyint(1) NOT NULL,
  PRIMARY KEY (`idCita`,`nota1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE IF NOT EXISTS `trol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Rector'),
(3, 'Director de carrera'),
(4, 'Profesor'),
(5, 'Estudiante'),
(6, 'Asistente'),
(7, 'Mercadeo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE IF NOT EXISTS `tusuarios` (
  `id` varchar(50) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `ranking` int(2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido1` varchar(25) NOT NULL,
  `apellido2` varchar(25) NOT NULL,
  `imagen` varchar(10000) NOT NULL,
  `skypeid` varchar(25) NOT NULL,
  `rol` int(2) NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `carrera` varchar(10) NOT NULL,
  `curso` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`id`, `contrasena`, `ranking`, `activo`, `nombre`, `apellido1`, `apellido2`, `imagen`, `skypeid`, `rol`, `telefono`, `carrera`, `curso`) VALUES
('acordero@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Álvaro', 'Cordero', 'Peña', '', '', 4, '', 'BISOFT', NULL),
('aespinach@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Andrea', 'Espinach', '', '', '', 3, '', 'INGTEC', NULL),
('aguevara@ucenfotec.ac.cr', 'Cenfo2014', 0, 0, 'Alonso', 'Guevara', '', '', '', 4, '', 'BISOFT', NULL),
('aluna@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Antonio', 'Luna', '', '', '', 4, '', 'BISOFT', NULL),
('dbarillasv@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Diego', 'Barillas', 'Valverde', '', '', 5, '', 'BISOFT', NULL),
('evillalobosm@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Elizabeth', 'Villalobos', 'Molina', '', '', 5, '', 'BISOFT', NULL),
('jbarbozas@ucenfotec.ac.cr', 'Cenfo2014', 0, 0, 'Javier', 'Barboza', 'Solís', '', 'javi', 3, '5555-5555', 'SITEC', NULL),
('jcerdasg@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Jose', 'Cerdas', 'González', '', '', 5, '', 'BISOFT', NULL),
('jromero@ucenfotec.ac.cr', 'Cenfo2014', 0, 0, 'Jose', 'Romero', '', '', '', 4, '', 'BISOFT', NULL),
('lchacon@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Luis', 'Chacón', 'Abarca', '', '', 3, '', 'SITEC', NULL),
('mcotog@ucenfotec.ac.cr', 'Cenfo2014', 0, 0, 'Miguel', 'Coto', 'García', '', '', 5, '86511641', 'BISOFT', NULL),
('mucros@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'María Eugenia', 'Ucrós', '', '', '', 3, '', 'BISOFT', NULL),
('nbrenes@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Nelson', 'Brenes', '', '', '', 3, '', 'CISTEC', NULL),
('osantamariav@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Oscar', 'Santamaría', 'Venegas', '', '', 5, '', 'BISOFT', NULL),
('pmonestel@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Pablo', 'Monestel', '', '../images/users/pablo-monestel.jpg', '', 3, '8844-5566', 'WEBTEC', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuariosxcurso`
--

CREATE TABLE IF NOT EXISTS `tusuariosxcurso` (
  `idCurso` varchar(25) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idCurso`,`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tusuariosxcurso`
--

INSERT INTO `tusuariosxcurso` (`idCurso`, `idUsuario`) VALUES
('BISOFT-04', 'acordero@ucenfotec.ac.cr'),
('BISOFT-04', 'evillalobosm@ucenfotec.ac.cr'),
('BISOFT-04', 'pmonestel@ucenfotec.ac.cr'),
('BISOFT-07', 'aluna@ucenfotec.ac.cr'),
('COMP-01', 'acordero@ucenfotec.ac.cr'),
('INF-01', 'pmonestel@ucenfotec.ac.cr'),
('INF-02', 'aluna@ucenfotec.ac.cr'),
('INF-03', 'pmonestel@ucenfotec.ac.cr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

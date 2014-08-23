-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 23, 2014 at 07:19 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gic`
--

-- --------------------------------------------------------

--
-- Table structure for table `codigoactivacion`
--

CREATE TABLE `codigoactivacion` (
  `idUsuario` varchar(50) NOT NULL,
  `codigoActivacion` varchar(50) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parametro` varchar(50) NOT NULL,
  `valor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `configuracion`
--

INSERT INTO `configuracion` (`id`, `parametro`, `valor`) VALUES
(1, 'diasExpiracion', '16'),
(2, 'caracteresMaximos', '80'),
(3, 'correoNotificacion', 'gestorinteligentedecitas@gmail.com'),
(4, 'contrasena', 'Cenfo2014');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `idUsuario` varchar(50) NOT NULL,
  `horario` varchar(300) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
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
-- Table structure for table `tcarrera`
--

CREATE TABLE `tcarrera` (
  `id` varchar(25) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idDirector` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcarrera`
--

INSERT INTO `tcarrera` (`id`, `nombre`, `idDirector`, `activo`) VALUES
('BISOFT', 'Bachillerato en ingeniería de software', 'mucros@ucenfotec.ac.cr', 1),
('INGTEC', 'Inglés', 'aespinach@ucenfotec.ac.cr', 1),
('SITEC', 'Integración de tecnologías', 'lchacon@ucenfotec.ac.cr', 1),
('TDS', 'Diplomado en tecnologías de desarrollo de software', 'mucros@ucenfotec.ac.cr', 1),
('TELTEC', 'Telemática', 'nbrenes@ucenfotec.ac.cr', 1),
('WEBTEC', 'Desarrollo y diseño web', 'pmonestel@ucenfotec.ac.cr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tcitas`
--

CREATE TABLE `tcitas` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `tcitas`
--

INSERT INTO `tcitas` (`id`, `idSolicitante`, `idSolicitado`, `fechaInicio`, `fechaFin`, `asunto`, `modalidad`, `tipo`, `observaciones`, `curso`, `estado`, `esCita`, `fechaCreacion`) VALUES
(33, 'evillalobosm@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-25 16:00:00', '2014-08-25 17:00:00', 'CUFEs', 0, 0, 'Revision de CUFEs y documentos para el proyecto.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(34, 'evillalobosm@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-26 15:00:00', '2014-08-26 16:00:00', 'PHP y mySql', 0, 0, 'Preguntas sobre conexion a la BD usando PHP.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(35, 'evillalobosm@ucenfotec.ac.cr', 'aluna@ucenfotec.ac.cr', '2014-08-27 17:00:00', '2014-08-27 18:00:00', 'Grafos', 0, 0, 'Preguntas sobre grafos.', 'INF-02', 1, 1, '2014-08-16 17:59:38'),
(36, 'evillalobosm@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-23 09:00:00', '2014-08-23 10:00:00', 'Examen de procesos', 0, 0, 'Hola profe, tengo algunas preguntas sobre el examen.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(37, 'evillalobosm@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-25 15:00:00', '2014-08-25 16:00:00', 'Revision de prototipo.', 1, 1, 'Hola, queremos revisar el prototipo que tenemos y recibir retroalimentacion.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(38, 'evillalobosm@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-28 17:00:00', '2014-08-28 18:00:00', 'Revision de codigo PHP.', 1, 0, 'Hola, quisiera revisar el codigo que he desarrollado hasta ahora.', 'BISOFT-04', 1, 1, '2014-08-16 17:59:38'),
(52, 'evillalobosm@ucenfotec.ac.cr', 'profetesting@ucenfotec.ac.cr', '2014-08-24 13:00:00', '2014-08-24 14:00:00', 'Prueba de envio de correo - Crear cita', 1, 1, 'testin', 'INF-02', 1, 0, '2014-08-23 16:48:01'),
(53, 'evillalobosm@ucenfotec.ac.cr', 'aluna@ucenfotec.ac.cr', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'test', 1, 1, 'test', '', 1, 0, '2014-08-23 17:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `tcitascanceladas`
--

CREATE TABLE `tcitascanceladas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(500) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tcitascanceladas`
--

INSERT INTO `tcitascanceladas` (`id`, `motivo`, `idUsuario`) VALUES
(13, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(14, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(15, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(16, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(17, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(18, 'Imprevisto', 'evillalobos@ucenfotec.ac.cr'),
(19, 'Testing', 'evillalobosm@ucenfotec.ac.cr'),
(20, 'Testing', 'evillalobosm@ucenfotec.ac.cr');

-- --------------------------------------------------------

--
-- Table structure for table `tcursos`
--

CREATE TABLE `tcursos` (
  `id` varchar(25) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcursos`
--

INSERT INTO `tcursos` (`id`, `activo`, `nombre`) VALUES
('BISOFT-04', 1, 'Proyecto de ingeniería de software 1'),
('BISOFT-07', 1, 'Programación orientada a objetos'),
('BISOFT-11', 1, 'Estructuras de datos 1'),
('BISOFT-12', 1, 'Programación con patrones'),
('BISOFT-13', 1, 'Proyecto de ingeniería de software 2'),
('BISOFT-15', 1, 'Diseño y construcción de componentes'),
('BISOFT-17', 1, 'Diseño conceptual de software'),
('BISOFT-18', 1, 'Programación de bases de datos'),
('BISOFT-20', 1, 'Estructuras de datos 2'),
('BISOFT-21', 1, 'Principios de sistemas operativos'),
('BISOFT-22', 1, 'Proyecto de ingeniería de software 3'),
('BISOFT-23', 1, 'Portafolio profesional'),
('BISOFT-24', 1, 'Proyecto en la empresa'),
('BISOFT-26', 1, 'Redes de computadoras'),
('BISOFT-28', 1, 'Ingeniería de requerimientos'),
('BISOFT-29', 1, 'Diseño de la interacción humano-computadora'),
('BISOFT-32', 1, 'Calidad, verificación y validación de software'),
('BISOFT-34', 1, 'Procesos de ingeniería de software'),
('BISOFT-36', 1, 'Sistemas colaborativos'),
('BISOFT-38', 1, 'Proyecto de ingeniería de software 4'),
('COMP-01', 1, 'Procesos empresariales'),
('COMP-02', 1, 'Ética y profesionalismo'),
('COMP-03', 1, 'Sociedad y tecnologías de información y comunicación'),
('DTDS0001', 1, 'Test'),
('DTDS2207', 1, 'Programación 2'),
('DTDS2208', 1, 'Bases de datos 1'),
('FIS-01', 1, 'Física 1'),
('FIS-02', 1, 'Física 2'),
('INF-01', 1, 'Introducción a la tecnología de la información'),
('INF-02', 1, 'Fundamentos de programación'),
('INF-03', 1, 'Fundamentos de bases de datos'),
('INF-04', 1, 'Arquitectura de computadoras'),
('ING-01', 1, 'Inglés para tecnologías de información 1'),
('ING-02', 1, 'Inglés para tecnologías de información 2'),
('ING-03', 1, 'Inglés para tecnologías de información 3'),
('ING-04', 1, 'Inglés para tecnologías de información 4'),
('MAT-01', 1, 'Estructuras discretas'),
('MAT-02', 1, 'Probabilidad y estadística 1'),
('MAT-03', 1, 'Cálculo diferencial e integral'),
('MAT-04', 1, 'Álgebra lineal'),
('MAT-05', 1, 'Probabilidad y estadística 2'),
('TDS2418', 1, 'Bases de datos 2');

-- --------------------------------------------------------

--
-- Table structure for table `tcursosxcarrera`
--

CREATE TABLE `tcursosxcarrera` (
  `idCarrera` varchar(25) NOT NULL,
  `idCurso` varchar(25) NOT NULL,
  PRIMARY KEY (`idCarrera`,`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcursosxcarrera`
--

INSERT INTO `tcursosxcarrera` (`idCarrera`, `idCurso`) VALUES
('BISOFT', 'BISOFT-04'),
('BISOFT', 'BISOFT-07'),
('BISOFT', 'BISOFT-11'),
('BISOFT', 'BISOFT-12'),
('BISOFT', 'BISOFT-13'),
('BISOFT', 'BISOFT-15'),
('BISOFT', 'BISOFT-17'),
('BISOFT', 'BISOFT-18'),
('BISOFT', 'BISOFT-20'),
('BISOFT', 'BISOFT-21'),
('BISOFT', 'BISOFT-22'),
('BISOFT', 'BISOFT-23'),
('BISOFT', 'BISOFT-24'),
('BISOFT', 'BISOFT-26'),
('BISOFT', 'BISOFT-28'),
('BISOFT', 'BISOFT-29'),
('BISOFT', 'BISOFT-32'),
('BISOFT', 'BISOFT-34'),
('BISOFT', 'BISOFT-36'),
('BISOFT', 'BISOFT-38'),
('BISOFT', 'COMP-01'),
('BISOFT', 'COMP-02'),
('BISOFT', 'COMP-03'),
('BISOFT', 'FIS-01'),
('BISOFT', 'FIS-02'),
('BISOFT', 'INF-01'),
('BISOFT', 'INF-02'),
('BISOFT', 'INF-03'),
('BISOFT', 'INF-04'),
('BISOFT', 'ING-01'),
('BISOFT', 'ING-02'),
('BISOFT', 'ING-03'),
('BISOFT', 'ING-04'),
('BISOFT', 'MAT-01'),
('BISOFT', 'MAT-02'),
('BISOFT', 'MAT-03'),
('BISOFT', 'MAT-04'),
('BISOFT', 'MAT-05'),
('TDS', 'DTDS0001'),
('TDS', 'DTDS2207'),
('TDS', 'DTDS2208'),
('TDS', 'TDS2418');

-- --------------------------------------------------------

--
-- Table structure for table `tevaluaciones`
--

CREATE TABLE `tevaluaciones` (
  `idCita` int(11) NOT NULL,
  `nota1` int(11) NOT NULL,
  `nota2` int(11) NOT NULL,
  `nota3` int(11) NOT NULL,
  `nota4` int(11) NOT NULL,
  `nota5` int(11) NOT NULL,
  `realizada` tinyint(1) NOT NULL,
  PRIMARY KEY (`idCita`,`nota1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tevaluaciones`
--

INSERT INTO `tevaluaciones` (`idCita`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `realizada`) VALUES
(43, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trol`
--

CREATE TABLE `trol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `trol`
--

INSERT INTO `trol` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Rector'),
(3, 'Director académico'),
(4, 'Profesor'),
(5, 'Estudiante'),
(6, 'Asistente'),
(7, 'Mercadeo');

-- --------------------------------------------------------

--
-- Table structure for table `tusuarios`
--

CREATE TABLE `tusuarios` (
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
-- Dumping data for table `tusuarios`
--

INSERT INTO `tusuarios` (`id`, `contrasena`, `ranking`, `activo`, `nombre`, `apellido1`, `apellido2`, `imagen`, `skypeid`, `rol`, `telefono`, `carrera`, `curso`) VALUES
('acordero@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Álvaro', 'Cordero', 'Peña', '', '', 4, '', 'BISOFT', NULL),
('admin@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Administrador', ' ', ' ', '', '', 1, '8800-0102', '', NULL),
('aespinach@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Andrea', 'Espinach', '', '', '', 3, '', 'INGTEC', NULL),
('aguevara@ucenfotec.ac.cr', 'Cenfo2014', 0, 0, 'Alonso', 'Guevara', '', '', '', 4, '', 'BISOFT', NULL),
('aluna@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Antonio', 'Luna', '', '', '', 4, '', 'BISOFT', NULL),
('dbarillasv@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Diego', 'Barillas', 'Valverde', '53f8ccbe82808.png', '', 5, '', 'BISOFT', NULL),
('evillalobosm@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Elizabeth', 'Villalobos', 'Molina', '53f8c46a0b140.png', 'villaloboselizabeth', 5, '8842-2267', 'BISOFT', NULL),
('itrejos@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Ignacio', 'Trejos', 'Zelaya', '53f89c42b1fc1.png', '', 2, '', '', NULL),
('jbarbozas@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Javier', 'Barboza', 'SolÃ­s', '53f8ccfdc8c79.png', 'javi', 3, '5555-5555', 'SITEC', NULL),
('jcerdasg@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Jose', 'Cerdas', 'GonzÃ¡lez', '53f8cc13276c4.png', '', 5, '', 'BISOFT', NULL),
('jromero@ucenfotec.ac.cr', 'Cenfo2014', 0, 0, 'Jose', 'Romero', '', '', '', 4, '', 'BISOFT', NULL),
('lchacon@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Luis', 'Chacón', 'Abarca', '', '', 3, '', 'SITEC', NULL),
('mcotog@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Miguel', 'Coto', 'GarcÃ­a', '53f8cbf273925.png', '', 5, '8651-1641', 'BISOFT', NULL),
('mucros@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'María Eugenia', 'Ucrós', '', '', '', 3, '', 'BISOFT', NULL),
('nbrenes@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Nelson', 'Brenes', '', '', '', 3, '', 'CISTEC', NULL),
('osantamariav@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Oscar', 'Santamaría', 'Venegas', '', '', 5, '', 'BISOFT', NULL),
('pmonestel@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Pablo', 'Monestel', '', 'pablo-monestel.jpg', '', 3, '8844-5566', 'WEBTEC', NULL),
('profetesting@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Profesor', 'Testing', 'Testing', '', '', 4, '', 'BISOFT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tusuariosxcurso`
--

CREATE TABLE `tusuariosxcurso` (
  `idCurso` varchar(25) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idCurso`,`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tusuariosxcurso`
--

INSERT INTO `tusuariosxcurso` (`idCurso`, `idUsuario`) VALUES
('BISOFT-04', 'acordero@ucenfotec.ac.cr'),
('BISOFT-04', 'evillalobosm@ucenfotec.ac.cr'),
('BISOFT-04', 'jromero@ucenfotec.ac.cr'),
('BISOFT-04', 'pmonestel@ucenfotec.ac.cr'),
('BISOFT-07', 'aluna@ucenfotec.ac.cr'),
('BISOFT-11', 'aluna@ucenfotec.ac.cr'),
('BISOFT-12', 'aluna@ucenfotec.ac.cr'),
('BISOFT-13', 'acordero@ucenfotec.ac.cr'),
('BISOFT-13', 'jromero@ucenfotec.ac.cr'),
('BISOFT-13', 'pmonestel@ucenfotec.ac.cr'),
('BISOFT-15', 'aluna@ucenfotec.ac.cr'),
('BISOFT-17', 'aluna@ucenfotec.ac.cr'),
('BISOFT-18', 'aluna@ucenfotec.ac.cr'),
('BISOFT-20', 'aluna@ucenfotec.ac.cr'),
('BISOFT-21', 'aluna@ucenfotec.ac.cr'),
('BISOFT-22', 'acordero@ucenfotec.ac.cr'),
('BISOFT-22', 'jromero@ucenfotec.ac.cr'),
('BISOFT-22', 'pmonestel@ucenfotec.ac.cr'),
('BISOFT-23', 'acordero@ucenfotec.ac.cr'),
('BISOFT-24', 'acordero@ucenfotec.ac.cr'),
('BISOFT-26', 'aluna@ucenfotec.ac.cr'),
('BISOFT-28', 'acordero@ucenfotec.ac.cr'),
('BISOFT-29', 'pmonestel@ucenfotec.ac.cr'),
('BISOFT-32', 'acordero@ucenfotec.ac.cr'),
('BISOFT-34', 'acordero@ucenfotec.ac.cr'),
('BISOFT-36', 'aluna@ucenfotec.ac.cr'),
('BISOFT-38', 'acordero@ucenfotec.ac.cr'),
('BISOFT-38', 'pmonestel@ucenfotec.ac.cr'),
('COMP-01', 'acordero@ucenfotec.ac.cr'),
('COMP-02', 'jromero@ucenfotec.ac.cr'),
('COMP-03', 'jromero@ucenfotec.ac.cr'),
('DTDS0001', 'aluna@ucenfotec.ac.cr'),
('DTDS2207', 'aluna@ucenfotec.ac.cr'),
('DTDS2208', 'aluna@ucenfotec.ac.cr'),
('FIS-01', 'aluna@ucenfotec.ac.cr'),
('FIS-02', 'aluna@ucenfotec.ac.cr'),
('INF-01', 'pmonestel@ucenfotec.ac.cr'),
('INF-02', 'aluna@ucenfotec.ac.cr'),
('INF-03', 'pmonestel@ucenfotec.ac.cr'),
('INF-04', 'aluna@ucenfotec.ac.cr'),
('ING-01', 'aespinach@ucenfotec.ac.cr'),
('ING-02', 'aespinach@ucenfotec.ac.cr'),
('ING-03', 'aespinach@ucenfotec.ac.cr'),
('ING-04', 'aespinach@ucenfotec.ac.cr'),
('MAT-01', 'aluna@ucenfotec.ac.cr'),
('MAT-02', 'aluna@ucenfotec.ac.cr'),
('MAT-03', 'aluna@ucenfotec.ac.cr'),
('MAT-04', 'aluna@ucenfotec.ac.cr'),
('MAT-05', 'aluna@ucenfotec.ac.cr'),
('TDS2418', 'aluna@ucenfotec.ac.cr');


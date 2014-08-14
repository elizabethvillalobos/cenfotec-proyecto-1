-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 14, 2014 at 02:50 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `nombre` varchar(50) NOT NULL,
  `idDirector` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tcarrera`
--

INSERT INTO `tcarrera` (`id`, `nombre`, `idDirector`, `activo`) VALUES
('BISOFT', 'Desarrollo de software', 'mucros@ucenfotec.ac.cr', 1),
('INGTEC', 'Inglés', 'aespinach@ucenfotec.ac.cr', 1),
('SITEC', 'Integración de tecnologías', 'lchacon@ucenfotec.ac.cr', 1),
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `tcitas`
--

INSERT INTO `tcitas` (`id`, `idSolicitante`, `idSolicitado`, `fechaInicio`, `fechaFin`, `asunto`, `modalidad`, `tipo`, `observaciones`, `curso`, `estado`, `esCita`) VALUES
(33, 'evillalobos@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-25 16:00:00', '2014-08-25 17:00:00', 'CUFEs', 0, 0, 'Revision de CUFEs y documentos para el proyecto.', 'BISOFT-04', 1, 1),
(34, 'evillalobos@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-26 15:00:00', '2014-08-26 16:00:00', 'PHP y mySql', 0, 0, 'Preguntas sobre conexion a la BD usando PHP.', 'BISOFT-04', 1, 1),
(35, 'evillalobos@ucenfotec.ac.cr', 'aluna@ucenfotec.ac.cr', '2014-08-27 17:00:00', '2014-08-27 18:00:00', 'Grafos', 0, 0, 'Preguntas sobre grafos.', 'INF-02', 1, 1),
(36, 'evillalobos@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-11 17:00:00', '2014-08-11 18:00:00', 'Examen de procesos', 0, 0, 'Hola profe, tengo algunas preguntas sobre el examen.', 'BISOFT-04', 1, 1),
(37, 'evillalobos@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-25 15:00:00', '2014-08-25 16:00:00', 'Revision de prototipo.', 1, 1, 'Hola, queremos revisar el prototipo que tenemos y recibir retroalimentacion.', 'BISOFT-04', 1, 1),
(38, 'evillalobos@ucenfotec.ac.cr', 'pmonestel@ucenfotec.ac.cr', '2014-08-10 17:00:00', '2014-08-10 18:00:00', 'Revision de codigo PHP.', 1, 0, 'Hola, quisiera revisar el codigo que he desarrollado hasta ahora.', 'BISOFT-04', 1, 1),
(39, 'evillalobos@ucenfotec.ac.cr', 'acordero@ucenfotec.ac.cr', '2014-08-18 13:00:00', '2014-08-18 14:00:00', 'Prueba para cancelar cita.', 0, 0, 'Testing.........', 'BISOFT-04', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tcitascanceladas`
--

CREATE TABLE `tcitascanceladas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(500) NOT NULL,
  `idUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tcitascanceladas`
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
('COMP-01', 1, 'Procesos empresariales'),
('INF-01', 1, 'Introducción a la tecnología de información'),
('INF-02', 1, 'Fundamentos de programación'),
('INF-03', 1, 'Fundamentos de bases de datos');

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
('BISOFT', 'COMP-01'),
('BISOFT', 'INF-01'),
('BISOFT', 'INF-02'),
('BISOFT', 'INF-03');

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
(3, 'Director de carrera'),
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tusuarios`
--

INSERT INTO `tusuarios` (`id`, `contrasena`, `ranking`, `activo`, `nombre`, `apellido1`, `apellido2`, `imagen`, `skypeid`, `rol`, `telefono`, `carrera`) VALUES
('acordero@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Álvaro', 'Cordero', 'Peña', '', '', 4, '', 'BISOFT'),
('aespinach@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Andrea', 'Espinach', '', '', '', 3, '', 'INGTEC'),
('aguevara@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Alonso', 'Guevara', '', '', '', 4, '', 'BISOFT'),
('aluna@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Antonio', 'Luna', '', '', '', 4, '', 'BISOFT'),
('dbarillasv@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Diego', 'Barillas', 'Valverde', '', '', 5, '', 'BISOFT'),
('evillalobosm@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Elizabeth', 'Villalobos', 'Molina', '', '', 5, '', 'BISOFT'),
('jbarbozas@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Javier', 'Barboza', 'Solís', '', '', 5, '', 'BISOFT'),
('jcerdasg@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Jose', 'Cerdas', 'González', '', '', 5, '', 'BISOFT'),
('jromero@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Jose', 'Romero', '', '', '', 4, '', 'BISOFT'),
('lchacon@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Luis', 'Chacón', 'Abarca', '', '', 3, '', 'SITEC'),
('mcotog@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Miguel', 'Coto', 'García', '', '', 5, '86511641', 'BISOFT'),
('mucros@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'María Eugenia', 'Ucrós', '', '', '', 3, '', 'BISOFT'),
('nbrenes@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Nelson', 'Brenes', '', '', '', 3, '', 'CISTEC'),
('osantamariav@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Oscar', 'Santamaría', 'Venegas', '', '', 5, '', 'BISOFT'),
('pmonestel@ucenfotec.ac.cr', 'Cenfo2014', 0, 1, 'Pablo', 'Monestel', '', '../images/users/pablo-monestel.jpg', '', 3, '8844-5566', 'WEBTEC');

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
('BISOFT-04', 'pmonestel@ucenfotec.ac.cr'),
('BISOFT-07', 'aluna@ucenfotec.ac.cr'),
('COMP-01', 'acordero@ucenfotec.ac.cr'),
('INF-01', 'pmonestel@ucenfotec.ac.cr'),
('INF-02', 'aluna@ucenfotec.ac.cr'),
('INF-03', 'pmonestel@ucenfotec.ac.cr');


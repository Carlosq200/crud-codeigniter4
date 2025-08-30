CREATE DATABASE `umg` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;

-- umg.alumnos definition

CREATE TABLE `alumnos` (
  `alumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `movil` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `fecha_creacion` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `inactivo` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- umg.cursos definition

CREATE TABLE `cursos` (
  `curso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `profesor` varchar(100) DEFAULT NULL,
  `inactivo` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`curso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- Tabla de detalle para N a N: alumnos - cursos
CREATE TABLE `detalle_alumno_curso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `alumno_id` INT NOT NULL,
  `curso_id` INT NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_alumno` (`alumno_id`),
  KEY `fk_curso` (`curso_id`),
  CONSTRAINT `fk_detalle_alumno` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`alumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_detalle_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`curso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- 
-- Estructura de tabla para la tabla `bookmarks`
-- 

CREATE TABLE `bookmarks` (
  `id_link` int(3) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `description` text ,
  `tags` varchar(75) NOT NULL default '',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY  (`id_link`)
)  ;

-- 
-- Volcar la base de datos para la tabla `bookmarks`
-- 

INSERT INTO `bookmarks` (`id_link`, `title`, `url`, `description`, `tags`, `created`, `modified`) VALUES 
(1, 'Pagina de Pedro Santana', 'http://www.pecesama.net', 'Co-Autor de sabros.us lite', 'php programacion web java javascript', '2008-04-24 17:44:12', '2008-04-24 00:30:00'),
(2, 'Pagina de Victor Bracco', 'http://www.vbracco.com.ar', 'Co-Autor de sabros.us lite', 'php programacion web javascript', '2008-04-24 17:44:12', '2008-04-24 17:43:02');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `configurations`
-- 

CREATE TABLE `configurations` (
  `id_configuration` int(1) NOT NULL auto_increment,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `language` varchar(10) NOT NULL,
  `limit` tinyint(3) NOT NULL,
  `admin_pass` varchar(250) NOT NULL,
  `theme` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime default NULL,
  PRIMARY KEY  (`id_configuration`)
)  ;

-- 
-- Volcar la base de datos para la tabla `configurations`
-- 

INSERT INTO `configurations` (`id_configuration`, `name`, `description`, `language`, `limit`, `admin_pass`, `theme`, `created`, `modified`) VALUES 
(1, 'mini sabros.us', 'Mis mini favoritos', 'es', 1, md5('demo'), 'sabrosus', '2008-04-24 17:44:12', '2008-04-24 17:44:12');




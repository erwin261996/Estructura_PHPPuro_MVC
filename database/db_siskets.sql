/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : db_testyota

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 12/09/2019 22:12:42
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb01_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tb01_usuario`;
CREATE TABLE `tb01_usuario`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellido` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb01_usuario
-- ----------------------------
INSERT INTO `tb01_usuario` VALUES (1, 'erwin@gmail.com', 'b76218a64ed6214901241aa669c1675f', 'erwin', 'vargas');

-- ----------------------------
-- Table structure for tb02_catalogo
-- ----------------------------
DROP TABLE IF EXISTS `tb02_catalogo`;
CREATE TABLE `tb02_catalogo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `strdescrip` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `orden` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb02_catalogo
-- ----------------------------
INSERT INTO `tb02_catalogo` VALUES (1, 'CONFIRMACION', 0);
INSERT INTO `tb02_catalogo` VALUES (2, 'SI', 1);
INSERT INTO `tb02_catalogo` VALUES (3, 'NO', 1);

-- ----------------------------
-- Table structure for tb03_gestion
-- ----------------------------
DROP TABLE IF EXISTS `tb03_gestion`;
CREATE TABLE `tb03_gestion`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `visitatecnica` int(3) NULL DEFAULT NULL,
  `idusuario` int(3) NULL DEFAULT NULL,
  `dtmregistro` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb03_gestion
-- ----------------------------
INSERT INTO `tb03_gestion` VALUES (1, 'Arreglo de pago', NULL, 1, '2019-09-11 01:27:32');
INSERT INTO `tb03_gestion` VALUES (2, 'Cancelación', NULL, 1, '2019-09-11 01:27:42');
INSERT INTO `tb03_gestion` VALUES (3, 'Compra', NULL, 1, '2019-09-11 01:27:58');
INSERT INTO `tb03_gestion` VALUES (4, 'Nuevo Servicio', NULL, 1, '2019-09-11 01:28:07');
INSERT INTO `tb03_gestion` VALUES (5, 'Reclamo', NULL, 1, '2019-09-11 01:28:16');
INSERT INTO `tb03_gestion` VALUES (6, 'Renovación', NULL, 1, '2019-09-11 01:28:23');
INSERT INTO `tb03_gestion` VALUES (7, 'Soporte Técnico', NULL, 1, '2019-09-11 01:28:32');
INSERT INTO `tb03_gestion` VALUES (8, 'Devolución', NULL, 1, '2019-09-11 01:28:36');
INSERT INTO `tb03_gestion` VALUES (9, 'Consulta', NULL, 1, '2019-09-11 01:28:43');
INSERT INTO `tb03_gestion` VALUES (10, 'Reclamo', NULL, 1, '2019-09-11 01:28:48');
INSERT INTO `tb03_gestion` VALUES (11, 'Reemplazo', NULL, 1, '2019-09-11 01:28:54');

-- ----------------------------
-- Table structure for tb04_gcliente
-- ----------------------------
DROP TABLE IF EXISTS `tb04_gcliente`;
CREATE TABLE `tb04_gcliente`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idgestion` int(3) NULL DEFAULT NULL,
  `atendido` int(4) NULL DEFAULT NULL,
  `dtmregistro` timestamp(0) NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb04_gcliente
-- ----------------------------
INSERT INTO `tb04_gcliente` VALUES (1, 6, 3, '2019-09-12 22:04:48');
INSERT INTO `tb04_gcliente` VALUES (2, 8, 2, '2019-09-12 22:04:58');
INSERT INTO `tb04_gcliente` VALUES (3, 4, 3, '2019-09-12 22:06:54');

-- ----------------------------
-- Table structure for tb05_ticket
-- ----------------------------
DROP TABLE IF EXISTS `tb05_ticket`;
CREATE TABLE `tb05_ticket`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idgcliente` int(4) NULL DEFAULT NULL,
  `nombre` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `apellido` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefono` int(11) NULL DEFAULT NULL,
  `idgestion` int(3) NULL DEFAULT NULL,
  `problema` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `solucion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb05_ticket
-- ----------------------------
INSERT INTO `tb05_ticket` VALUES (1, 2, 'Erwin Adrian', 'Vargas Mayorga', 'kajdklas salkjda sdlkajsd aslkdjsa', 89987867, 8, 'sdsjdfkjlskdf sdlkfjslkdf sdlksdjflks', 'lsjdflkds flsdjfk sdlkfjds flkdsjflksd lkdsjlfks');

-- ----------------------------
-- Procedure structure for splogin
-- ----------------------------
DROP PROCEDURE IF EXISTS `splogin`;
delimiter ;;
CREATE PROCEDURE `splogin`(in opc int, in usuario varchar(50), in passi varchar(255))
BEGIN
	
	IF opc = 1 THEN
		IF EXISTS (SELECT id FROM tb01_usuario WHERE login = usuario AND `password` = passi ) THEN
			SELECT 1 AS verificado, id, nombre, apellido FROM tb01_usuario WHERE login = usuario AND `password` = passi ;
		ELSE
			SELECT 0 AS verificado;
		END IF;
	END IF;


END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for spyota
-- ----------------------------
DROP PROCEDURE IF EXISTS `spyota`;
delimiter ;;
CREATE PROCEDURE `spyota`(in opc int, in idcod int, in num1 int, in spstrnombre varchar(40),
	in spstrapellido  varchar(40), in spatrdireccion  varchar(255), in sptelefono int, in spcb_gestion int,
	in spproblemaexpusto  varchar(255), in spsolucionbrindada  varchar(255), in acceso int)
BEGIN
	
	IF opc = 1 THEN
	BEGIN
	
		INSERT INTO tb04_gcliente (idgestion, atendido) VALUES(idcod, num1);
		
		SELECT LPAD(t4.id,3,0) as id, t4.id as cod, t4.idgestion, t3.nombre, t4.atendido, t3.idusuario
		FROM tb04_gcliente t4 INNER JOIN tb03_gestion t3 ON t4.idgestion = t3.id WHERE t4.atendido != 2;
		
		
	END;
	END IF;
	
	IF opc = 2 THEN -- Se agregaran las tickets
	BEGIN
	
		INSERT INTO tb05_ticket (idgcliente, nombre, apellido, direccion, telefono, idgestion, problema, solucion) VALUES
		(idcod, spstrnombre, spstrapellido, spatrdireccion, sptelefono, spcb_gestion, spproblemaexpusto, spsolucionbrindada);
		
		SET @_id = (SELECT idgcliente FROM tb05_ticket WHERE id = (SELECT max(id) FROM tb05_ticket));
		
		-- DELETE FROM tb04_gcliente WHERE id = @_id;
		UPDATE tb04_gcliente SET
			atendido = 2
		WHERE id = @_id;
		
		SELECT LPAD(t4.id,3,0) as id, t4.id as cod, t4.idgestion, t3.nombre, t4.atendido, t3.idusuario
		FROM tb04_gcliente t4 INNER JOIN tb03_gestion t3 ON t4.idgestion = t3.id WHERE t4.atendido != 2;
		
	END;
	END IF;
	
	IF opc = 3 THEN -- Lista de Gestion de los Clientes
	BEGIN
	
		SELECT LPAD(t4.id,3,0) as id, t4.id as cod, t4.idgestion, t3.nombre, t4.atendido, t3.idusuario
		FROM tb04_gcliente t4 INNER JOIN tb03_gestion t3 ON t4.idgestion = t3.id WHERE t4.atendido != 2;
		
	END;
	END IF;

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;

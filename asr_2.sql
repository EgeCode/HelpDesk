/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : asr

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 03/01/2023 15:47:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'CAMBIO DE PERFIL', NULL, NULL);
INSERT INTO `categorias` VALUES (2, 'INTERNET', NULL, NULL);
INSERT INTO `categorias` VALUES (3, 'CORREO', NULL, NULL);
INSERT INTO `categorias` VALUES (4, 'IMPRESORA', NULL, NULL);
INSERT INTO `categorias` VALUES (5, 'ESCANER', NULL, NULL);
INSERT INTO `categorias` VALUES (6, 'TELEFONIA', NULL, NULL);
INSERT INTO `categorias` VALUES (7, 'OFFICE', NULL, NULL);
INSERT INTO `categorias` VALUES (8, 'ACTIVACION WINDOWS', NULL, NULL);
INSERT INTO `categorias` VALUES (9, 'ANTIVIRUS', NULL, NULL);
INSERT INTO `categorias` VALUES (10, 'MONITOR', NULL, NULL);
INSERT INTO `categorias` VALUES (11, 'EQUIPO LENTO', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2022_11_23_195437_create_tickets_table', 1);
INSERT INTO `migrations` VALUES (4, '2022_11_24_163820_create_categorias_table', 1);
INSERT INTO `migrations` VALUES (5, '2022_11_29_213833_create_seguimientos_table', 1);
INSERT INTO `migrations` VALUES (6, '2022_12_01_230147_create_privilegios_table', 1);
INSERT INTO `migrations` VALUES (7, '2022_12_01_230236_create_user_privilegios_table', 1);
INSERT INTO `migrations` VALUES (8, '2023_01_02_025631_create_rols_table', 1);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp(0) NULL DEFAULT NULL,
  `expires_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for privilegios
-- ----------------------------
DROP TABLE IF EXISTS `privilegios`;
CREATE TABLE `privilegios`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of privilegios
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'Ver todos los tickets', 1, 1, '2023-01-02 21:45:29', '2023-01-02 21:45:29');
INSERT INTO `roles` VALUES (2, 'Seccion usuarios', 1, 1, '2023-01-02 21:45:29', '2023-01-02 21:45:29');

-- ----------------------------
-- Table structure for seguimientos
-- ----------------------------
DROP TABLE IF EXISTS `seguimientos`;
CREATE TABLE `seguimientos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `notas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` int NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seguimientos
-- ----------------------------
INSERT INTO `seguimientos` VALUES (1, 'Hector Castro de Control Interno solicita internet para entrar a pagina de Chihuahua de control interno y plataforma de Mejora Regulatoria', '1', 1, NULL, '2023-01-03 21:00:26', '2023-01-03 21:00:26');
INSERT INTO `seguimientos` VALUES (2, 'RH, el mouse del de servicio social no funciona el clic', '2', 1, NULL, '2023-01-03 21:04:59', '2023-01-03 21:04:59');
INSERT INTO `seguimientos` VALUES (3, 'Se ha asignado a : Luis', '2', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (4, 'Nancy Sanchez de ingresos reporta teléfono de continental, no se escucha ', '3', 1, NULL, '2023-01-03 21:17:29', '2023-01-03 21:17:29');
INSERT INTO `seguimientos` VALUES (5, 'Se ha asignado a : Luis', '3', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (6, 'Jonathan Chacon de drenaje pluvial reporta su PC, no prende. Se apago de repente', '4', 1, NULL, '2023-01-03 21:52:53', '2023-01-03 21:52:53');
INSERT INTO `seguimientos` VALUES (7, 'Solicita RU instalar Kodak S208w con DSI 10635 que estará en salvarcar', '5', 1, NULL, '2023-01-03 21:57:46', '2023-01-03 21:57:46');
INSERT INTO `seguimientos` VALUES (8, 'Ing. Fernando Cavazos:\nPor medio de la presente solicito la reposicion de dos aparatos de telefonia asignados a la Srta. Veronica Gonzalez y al sr. Jose Camara, del Dpto de Bienes patrimoniales, lo anterior porque sus aparatos actuales presentan fallas', '6', 1, NULL, '2023-01-03 22:05:51', '2023-01-03 22:05:51');
INSERT INTO `seguimientos` VALUES (9, 'Status ha cambiado: Abierto -> Pendiente', '6', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (10, 'Status ha cambiado: Pendiente -> Abierto', '6', 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `asignado` int NULL DEFAULT NULL,
  `edificio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `usuario_red` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `autoriza` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `creador` int NOT NULL,
  `prioridad` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `usuario` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES (1, 'Internet', 'Hector Castro de Control Interno solicita internet para entrar a pagina de Chihuahua de control interno y plataforma de Mejora Regulatoria', 'Ext 3524', 'Control Interno', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2023-01-03 21:00:26', '2023-01-03 21:00:26', 1);
INSERT INTO `tickets` VALUES (2, 'Mouse - RH', 'RH, el mouse del de servicio social no funciona el clic', 'Ext 1237', 'RH', '', 9, '', '', '', 1, 'Media', '', 'Abierto', '2023-01-03 21:04:59', '2023-01-03 21:10:48', 1);
INSERT INTO `tickets` VALUES (3, 'Revisar tel - Ingresos', 'Nancy Sanchez de ingresos reporta teléfono de continental, no se escucha ', 'Ext 2201', 'Ingresos', '', 9, 'Continental', '', '', 1, 'Media', 'TELEFONIA', 'Abierto', '2023-01-03 21:17:29', '2023-01-03 21:17:49', 1);
INSERT INTO `tickets` VALUES (4, 'No prende PC', 'Jonathan Chacon de drenaje pluvial reporta su PC, no prende. Se apago de repente', 'Ext 3518', 'Drenaje Pluvial', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2023-01-03 21:52:53', '2023-01-03 21:52:53', 1);
INSERT INTO `tickets` VALUES (5, 'Instalar escaner de archivo', 'Solicita RU instalar Kodak S208w con DSI 10635 que estará en salvarcar', '0', 'RU', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2023-01-03 21:57:46', '2023-01-03 21:57:46', 1);
INSERT INTO `tickets` VALUES (6, 'Revisar tel de patrimonio', 'Ing. Fernando Cavazos:\nPor medio de la presente solicito la reposicion de dos aparatos de telefonia asignados a la Srta. Veronica Gonzalez y al sr. Jose Camara, del Dpto de Bienes patrimoniales, lo anterior porque sus aparatos actuales presentan fallas', '0', 'Bienes patrimoniales', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2023-01-03 22:05:51', '2023-01-03 22:10:17', 1);

-- ----------------------------
-- Table structure for user_privilegios
-- ----------------------------
DROP TABLE IF EXISTS `user_privilegios`;
CREATE TABLE `user_privilegios`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `privilegio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_privilegios
-- ----------------------------
INSERT INTO `user_privilegios` VALUES (7, 3, 'Ver todos los tickets', '2023-01-03 21:45:02', '2023-01-03 21:45:02');
INSERT INTO `user_privilegios` VALUES (12, 4, 'Seccion usuarios', '2023-01-03 21:53:10', '2023-01-03 21:53:10');
INSERT INTO `user_privilegios` VALUES (14, 2, 'Ver todos los tickets', '2023-01-03 21:54:30', '2023-01-03 21:54:30');
INSERT INTO `user_privilegios` VALUES (15, 2, 'Seccion usuarios', '2023-01-03 21:54:30', '2023-01-03 21:54:30');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `telefono` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrador', NULL, 'admin', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (2, 'Eloy', 'Garcia', 'egarlue', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (3, 'Daniela', 'Morales', 'dmorales', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (4, 'Eduardo', 'Gutierrez', 'egutierrez', 'lalogtz_20@hotmail.com', NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (5, 'David', 'Ramirez', 'dramirez', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (6, 'Jorge', 'Ramirez', 'jramirez', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (7, 'Alfredo', 'Ramirez', 'aramirez', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (8, 'Marcos', 'Rodriguez', 'mrodriguez', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');
INSERT INTO `users` VALUES (9, 'Luis', 'Tarin', 'ltarin', NULL, NULL, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-01-02 21:45:28', '2023-01-02 21:45:28');

-- ----------------------------
-- Triggers structure for table tickets
-- ----------------------------
DROP TRIGGER IF EXISTS `insertLogs`;
delimiter ;;
CREATE TRIGGER `insertLogs` AFTER UPDATE ON `tickets` FOR EACH ROW BEGIN

IF old.tema <> new.tema THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES (CONCAT(OLD.tema,' -> ', NEW.tema), new.id, new.usuario);
END IF;

IF old.telefono <> new.telefono THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Teléfono ha cambiado: ', OLD.telefono,' -> ', NEW.telefono), new.id, new.usuario);
END IF;

IF old.departamento <> new.departamento THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Departamento ha cambiado: ', OLD.departamento,' -> ', NEW.departamento), new.id, new.usuario);
END IF;

IF old.ip <> new.ip THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('IP ha cambiado: ', OLD.ip,' -> ', NEW.ip), new.id, new.usuario);
END IF;

CASE

WHEN old.asignado IS NULL AND new.asignado IS NOT NULL THEN
	SET @nombre_user = (SELECT  `name` FROM users WHERE id = NEW.asignado); 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Se ha asignado a : ', @nombre_user), new.id, new.usuario);
WHEN new.asignado IS NULL AND old.asignado IS NOT NULL THEN 
	SET @nombre_user = (SELECT  `name` FROM users WHERE id = OLD.asignado); 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT(@nombre_user,'-> Sin asignar'), new.id, new.usuario);
WHEN old.asignado <> new.asignado THEN
	SET @nombre_user_old = (SELECT  `name` FROM users WHERE id = OLD.asignado); 
	SET @nombre_user_new = (SELECT  `name` FROM users WHERE id = NEW.asignado); 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Se ha asignado a otra persona: ', @nombre_user_old,' -> ', @nombre_user_new), new.id, new.usuario);
ELSE BEGIN END;
END CASE;

IF old.edificio <> new.edificio THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Edificio ha cambiado: ', OLD.edificio,' -> ', NEW.edificio), new.id, new.usuario);
END IF;

IF old.usuario_red <> new.usuario_red THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Usuario de red ha cambiado: ', OLD.usuario_red,' -> ', NEW.usuario_red), new.id, new.usuario);
END IF;

IF old.autoriza <> new.autoriza THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Quien autoriza ha cambiado: ', OLD.autoriza,' -> ', NEW.autoriza), new.id, new.usuario);
END IF;

IF old.prioridad <> new.prioridad THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Prioridad ha cambiado: ', OLD.prioridad,' -> ', NEW.prioridad), new.id, new.usuario);
END IF;

CASE 
WHEN old.categoria is null THEN
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Categoria ha cambiado: ->', NEW.categoria), new.id, new.usuario);
WHEN new.categoria is null THEN
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Categoria ha cambiado: ', OLD.categoria,' -> '), new.id, new.usuario);
WHEN old.categoria <> new.categoria THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Categoria ha cambiado: ', OLD.categoria,' -> ', NEW.categoria), new.id, new.usuario);
ELSE BEGIN END;
END CASE;

IF old.`status` <> new.`status` THEN 
	INSERT INTO seguimientos (seguimientos.notas, seguimientos.ticket, seguimientos.usuario) VALUES 
	(CONCAT('Status ha cambiado: ', OLD.`status`,' -> ', NEW.`status`), new.id, new.usuario);
END IF;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;

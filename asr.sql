/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100425
 Source Host           : localhost:3306
 Source Schema         : asr

 Target Server Type    : MySQL
 Target Server Version : 100425
 File Encoding         : 65001

 Date: 30/12/2022 12:15:54
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
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'CAMBIO DE PERFIL', NULL, NULL);
INSERT INTO `categorias` VALUES (2, 'INTERNET', NULL, NULL);
INSERT INTO `categorias` VALUES (3, 'CORREO', NULL, NULL);
INSERT INTO `categorias` VALUES (4, 'IMPRESORA', NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of seguimientos
-- ----------------------------
INSERT INTO `seguimientos` VALUES (1, 'Fernando Del Río de Supervisión de Obra, solicita mantenimiento a equipo debido a que esta lenta, respaldo y correr antovirus.\nExt. 4082', '1', 1, NULL, '2022-12-26 19:38:12', '2022-12-26 19:38:12');
INSERT INTO `seguimientos` VALUES (2, 'Se ha asignado a : Daniela Morales', '1', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (3, 'Vuelve a marcar Fernando del Rio por que no le han resuelto', '1', 2, NULL, '2022-12-26 19:39:39', '2022-12-26 19:39:39');
INSERT INTO `seguimientos` VALUES (4, 'Se ha asignado a otra persona: Daniela Morales -> Eloy Garcia', '1', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (5, 'Julio César Amador de Supervisión de Obra, no prende PC, tiene un sonido raro.\nExt. 4082', '2', 2, NULL, '2022-12-26 19:42:10', '2022-12-26 19:42:10');
INSERT INTO `seguimientos` VALUES (6, 'Se ha asignado a otra persona: Eloy Garcia -> Daniela Morales', '1', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (7, 'Patricio Urquidi de planeación hidráulica solicita cable de Red, debido a que el actual ya no sirve. (3.5 mts aprox.)\nExt. 4010', '3', 2, NULL, '2022-12-26 19:56:32', '2022-12-26 19:56:32');
INSERT INTO `seguimientos` VALUES (8, 'Configurar NAV en equipo de Mayra Vidales a Víctor Alderete, a partir del día 26 de diciembre.\nExt. 1040', '4', 2, NULL, '2022-12-26 19:57:24', '2022-12-26 19:57:24');
INSERT INTO `seguimientos` VALUES (9, 'Nancy Sánchez de Ingresos reporta teléfono de Continental, no se escucha.\nExt. 2201.', '5', 2, NULL, '2022-12-26 19:57:56', '2022-12-26 19:57:56');
INSERT INTO `seguimientos` VALUES (10, 'Instalar impresora de Alcantarillado en el lugar de Ing. Devora.\nExt. 4064', '6', 2, NULL, '2022-12-26 19:58:29', '2022-12-26 19:58:29');
INSERT INTO `seguimientos` VALUES (11, 'RH, el mouse del de Servcio social no funciona bien el clic.\nExt. 1237', '7', 2, NULL, '2022-12-26 19:59:16', '2022-12-26 19:59:16');
INSERT INTO `seguimientos` VALUES (12, 'Héctor Castro de Control Interno solicita Internet para entrar a pagina de Gobierno de Chihuahua de control interno, y plataforma de Mejora regulatoria.\nExt. 3524', '8', 2, NULL, '2022-12-26 19:59:39', '2022-12-26 19:59:39');
INSERT INTO `seguimientos` VALUES (13, 'Aaron González de Proyectos, solicita Internet.\nExt. 4010', '9', 2, NULL, '2022-12-26 20:00:52', '2022-12-26 20:00:52');
INSERT INTO `seguimientos` VALUES (14, 'Perla Espinoza de Proyectos, solicita Internet.\nExt. 4010', '10', 2, NULL, '2022-12-26 20:02:03', '2022-12-26 20:02:03');
INSERT INTO `seguimientos` VALUES (26, 'eweqw', '18', 1, NULL, '2022-12-26 21:59:58', '2022-12-26 21:59:58');
INSERT INTO `seguimientos` VALUES (27, 'dasdas', '19', 1, NULL, '2022-12-26 22:00:22', '2022-12-26 22:00:22');
INSERT INTO `seguimientos` VALUES (28, 'dasdas', '20', 1, NULL, '2022-12-26 22:01:30', '2022-12-26 22:01:30');
INSERT INTO `seguimientos` VALUES (29, 'dasdas', '21', 1, NULL, '2022-12-26 22:02:42', '2022-12-26 22:02:42');
INSERT INTO `seguimientos` VALUES (30, 'dasd', '22', 1, NULL, '2022-12-26 22:09:07', '2022-12-26 22:09:07');
INSERT INTO `seguimientos` VALUES (31, 'asdas', '23', 1, NULL, '2022-12-26 22:10:30', '2022-12-26 22:10:30');
INSERT INTO `seguimientos` VALUES (32, 'qewewq', '24', 1, NULL, '2022-12-26 22:22:32', '2022-12-26 22:22:32');
INSERT INTO `seguimientos` VALUES (33, 'Archivo adjunto', '24', 1, 'public/documents/8UVnbhybWW51qSuQG6Cnea3eSdoEJr1GQlTKYNai.png', '2022-12-26 22:22:32', '2022-12-26 22:22:32');
INSERT INTO `seguimientos` VALUES (34, 'asdas', '25', 1, NULL, '2022-12-26 22:40:27', '2022-12-26 22:40:27');
INSERT INTO `seguimientos` VALUES (35, 'dasdas', '26', 1, NULL, '2022-12-30 15:54:42', '2022-12-30 15:54:42');
INSERT INTO `seguimientos` VALUES (36, 'eqweqweqw', '27', 1, NULL, '2022-12-30 15:56:09', '2022-12-30 15:56:09');
INSERT INTO `seguimientos` VALUES (37, 'eqweqweqw', '28', 1, NULL, '2022-12-30 15:57:12', '2022-12-30 15:57:12');
INSERT INTO `seguimientos` VALUES (38, 'eqweqwe', '29', 1, NULL, '2022-12-30 16:10:27', '2022-12-30 16:10:27');
INSERT INTO `seguimientos` VALUES (39, 'eqweqwe', '30', 1, NULL, '2022-12-30 16:10:57', '2022-12-30 16:10:57');
INSERT INTO `seguimientos` VALUES (40, 'Archivo adjunto', '30', 1, 'public/documents/6sC04Wu2IzMv98gOk5VkJIklaDyGqAITuhaGJg5s.jpg', '2022-12-30 16:10:57', '2022-12-30 16:10:57');
INSERT INTO `seguimientos` VALUES (41, 'Ing. Fernando Cavazos:\nBuenas tardes, por medio de la presente le solicito la reposición de dos aparatos de telefonia asignados a la Srta. Veronica Gonzalez y al Sr. José Camara, del Departamento de Administración de Bienes, lo anterior porque sus aparatos actuales presentan fallas. \n\nAtentamente\nLic. José M. Fernández Sigala\nJefatura de Administración del Patrimonio ', '31', 1, NULL, '2022-12-30 16:17:57', '2022-12-30 16:17:57');
INSERT INTO `seguimientos` VALUES (42, 'Archivo adjunto', '31', 1, 'public/documents/wVW5HOrDhkPp3rmTBanjcVvRTe4icK29Qg8OPcSz.pdf', '2022-12-30 16:17:57', '2022-12-30 16:17:57');
INSERT INTO `seguimientos` VALUES (43, 'jghasjdhghjasdas', '31', 1, NULL, '2022-12-30 17:36:38', '2022-12-30 17:36:38');
INSERT INTO `seguimientos` VALUES (44, 'Archivo adjunto', '31', 1, 'public/documents/ZXR3nqld6B5g1UwMT0FqxWlpgAoBIp6OiuSa6UHv.pdf', '2022-12-30 17:41:37', '2022-12-30 17:41:37');
INSERT INTO `seguimientos` VALUES (45, 'Archivo adjunto', '31', 1, 'public/documents/UEMWHMJQqHN6CnXH3ZFiesKUJjRfe7nSTi8arVrU.jpg', '2022-12-30 17:45:14', '2022-12-30 17:45:14');
INSERT INTO `seguimientos` VALUES (46, 'jashdghjasdgjhs', '31', 1, NULL, '2022-12-30 17:45:28', '2022-12-30 17:45:28');
INSERT INTO `seguimientos` VALUES (47, 'qjigeqwigeqwgejhashjdhjasdgas\nkasjhdkjashdkjashdkjhasjkdhkjashdjashdkhasdj', '31', 1, NULL, '2022-12-30 17:45:43', '2022-12-30 17:45:43');
INSERT INTO `seguimientos` VALUES (48, 'Archivo adjunto', '31', 1, 'public/documents/oTCZUUFQ0IhpwtOPYbOhQ6ofXHXrF991G0DRXliR.jpg', '2022-12-30 17:45:43', '2022-12-30 17:45:43');
INSERT INTO `seguimientos` VALUES (49, 'asdasdasdasdasdasd', '31', 1, NULL, '2022-12-30 17:50:14', '2022-12-30 17:50:14');
INSERT INTO `seguimientos` VALUES (50, 'Archivo adjunto', '31', 1, 'public/documents/DGaWncYEtRKqIqb0zwVuxX7FuOv5k27FQThODpal.jpg', '2022-12-30 17:50:30', '2022-12-30 17:50:30');
INSERT INTO `seguimientos` VALUES (52, 'Departamento ha cambiado: Patrimonio -> Patrimonios', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (53, '', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (54, 'Departamento ha cambiado: Patrimonios -> Patrimonio', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (55, '', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (56, 'Departamento ha cambiado: Patrimonio -> Patrimonios', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (57, '', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (58, 'Departamento ha cambiado: Patrimonios -> Patrimonio', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (59, '', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (60, 'Departamento ha cambiado: Proyectos -> Proyectos de gestion', '10', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (61, '', '10', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (62, 'Se ha asignado a : Administrador', '10', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (63, 'Categoria ha cambiado:  -> CAMBIO DE PERFIL', '10', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (64, 'Departamento ha cambiado: Proyectos de gestion -> Proyectos', '10', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (65, 'Status ha cambiado: Abierto -> Pendiente', '10', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (66, '', '4', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (67, 'Categoria ha cambiado:  -> CAMBIO DE PERFIL', '4', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (68, 'Se ha asignado a : Administrador', '4', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (69, 'Departamento ha cambiado: Seguridad y transporte -> Seguridad y transportes', '4', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (70, 'Se ha asignado a : Administrador', '5', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (71, 'Status ha cambiado: Abierto -> Pendiente', '6', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (72, 'Se ha asignado a : Daniela Morales', '6', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (73, 'Se ha asignado a otra persona: Daniela Morales -> Eloy Garcia', '6', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (74, 'Status ha cambiado: Pendiente -> Abierto', '6', 2, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (75, 'Status ha cambiado: Abierto -> Pendiente', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (76, 'Se ha asignado a : Eloy Garcia', '31', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (77, 'Archivo adjunto', '6', 1, 'public/documents/22z1xmKqUPkpTdYl52R1pu5tMjsl7i9Hkypqwdbs.jpg', '2022-12-30 18:53:22', '2022-12-30 18:53:22');
INSERT INTO `seguimientos` VALUES (78, 'Status ha cambiado: Abierto -> Pendiente', '1', 1, NULL, NULL, NULL);
INSERT INTO `seguimientos` VALUES (79, 'Se hace revision del equipo, probablemente sea la fuenta', '2', 1, NULL, '2022-12-30 19:03:16', '2022-12-30 19:03:16');
INSERT INTO `seguimientos` VALUES (80, 'El equipo presenta falla en la fuente, se le cambia ', '2', 1, NULL, '2022-12-30 19:03:30', '2022-12-30 19:03:30');
INSERT INTO `seguimientos` VALUES (81, 'Status ha cambiado: Abierto -> Cerrado', '2', 2, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tickets
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `usuario` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES (1, 'Mantenimiento de PC', 'Fernando Del Río de Supervisión de Obra, solicita mantenimiento a equipo debido a que esta lenta, respaldo y correr antovirus.\nExt. 4082', '4082', 'Supervisión de obra', '', 2, '', '', '', 1, 'Media', '', 'Pendiente', '2022-12-26 19:38:12', '2022-12-30 18:58:46', 1);
INSERT INTO `tickets` VALUES (2, 'No prende PC', 'Julio César Amador de Supervisión de Obra, no prende PC, tiene un sonido raro.\nExt. 4082', '4082', 'Supervisión de obra', '', NULL, '', '', '', 2, 'Media', '', 'Cerrado', '2022-12-26 19:42:10', '2022-12-30 19:03:32', 2);
INSERT INTO `tickets` VALUES (3, 'Cable de red', 'Patricio Urquidi de planeación hidráulica solicita cable de Red, debido a que el actual ya no sirve. (3.5 mts aprox.)\nExt. 4010', '4010', 'Planeacion hidraulica', '', NULL, '', '', '', 2, 'Media', '', 'Abierto', '2022-12-26 19:56:32', '2022-12-26 19:56:32', 2);
INSERT INTO `tickets` VALUES (4, 'NAV Victor', 'Configurar NAV en equipo de Mayra Vidales a Víctor Alderete, a partir del día 26 de diciembre.\nExt. 1040', '1040', 'Seguridad y transportes', '', 1, '', '', '', 2, 'Media', 'CAMBIO DE PERFIL', 'Abierto', '2022-12-26 19:57:24', '2022-12-30 18:22:22', 2);
INSERT INTO `tickets` VALUES (5, 'Revisar tel de ingresos', 'Nancy Sánchez de Ingresos reporta teléfono de Continental, no se escucha.\nExt. 2201.', '2201', 'Ingresos', '', 1, '', '', '', 2, 'Media', '', 'Abierto', '2022-12-26 19:57:56', '2022-12-30 18:22:33', 2);
INSERT INTO `tickets` VALUES (6, 'Instalar impresora ', 'Instalar impresora de Alcantarillado en el lugar de Ing. Devora.\nExt. 4064', '4064', 'Alcantarillado', '', 3, '', '', '', 2, 'Media', '', 'Abierto', '2022-12-26 19:58:29', '2022-12-30 18:36:31', 2);
INSERT INTO `tickets` VALUES (7, 'Mouse RH', 'RH, el mouse del de Servcio social no funciona bien el clic.\nExt. 1237', '1237', 'Recursos humanos', '', NULL, '', '', '', 2, 'Media', '', 'Abierto', '2022-12-26 19:59:16', '2022-12-26 19:59:16', 2);
INSERT INTO `tickets` VALUES (8, 'Internet', 'Héctor Castro de Control Interno solicita Internet para entrar a pagina de Gobierno de Chihuahua de control interno, y plataforma de Mejora regulatoria.\nExt. 3524', '3524', 'Mejora Regulatoria', '', NULL, '', '', '', 2, 'Media', '', 'Abierto', '2022-12-26 19:59:39', '2022-12-26 19:59:39', 2);
INSERT INTO `tickets` VALUES (9, 'Internet', 'Aaron González de Proyectos, solicita Internet.\nExt. 4010', '4010', 'Proyectos', '', NULL, '', '', '', 2, 'Media', '', 'Abierto', '2022-12-26 20:00:52', '2022-12-26 20:00:52', 2);
INSERT INTO `tickets` VALUES (10, 'Internet', 'Perla Espinoza de Proyectos, solicita Internet.\nExt. 4010', '4010', 'Proyectos', '', 1, '', '', '', 2, 'Media', 'CAMBIO DE PERFIL', 'Pendiente', '2022-12-26 20:02:03', '2022-12-30 18:21:35', 2);
INSERT INTO `tickets` VALUES (20, 'sdsadas', 'dasdas', 'dasdas', 'dasd', 'dsaasd', NULL, 'das', '', 'dasda', 1, 'Media', '', 'Abierto', '2022-12-26 22:01:30', '2022-12-26 22:01:30', 1);
INSERT INTO `tickets` VALUES (21, 'dasdas', 'dasdas', 'dasda', 'dasd', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-26 22:02:42', '2022-12-26 22:02:42', 1);
INSERT INTO `tickets` VALUES (22, 'adasdasd', 'dasd', 'dsadas', 'das', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-26 22:09:07', '2022-12-26 22:09:07', 1);
INSERT INTO `tickets` VALUES (23, 'dasdasd', 'asdas', 'dasda', 'dasd', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-26 22:10:30', '2022-12-26 22:10:30', 1);
INSERT INTO `tickets` VALUES (24, 'qeweqweqw', 'qewewq', 'ewqeqw', 'eqweqw', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-26 22:22:32', '2022-12-26 22:22:32', 1);
INSERT INTO `tickets` VALUES (25, 'dasdasd', 'asdas', 'dasdas', 'das', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-26 22:40:27', '2022-12-26 22:40:27', 1);
INSERT INTO `tickets` VALUES (26, 'dasdasdas', 'dasdas', 'dasd', 'aadsas', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-30 15:54:42', '2022-12-30 15:54:42', 1);
INSERT INTO `tickets` VALUES (27, 'eqweqwwq', 'eqweqweqw', '6563045936', 'asdasdasdas', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-30 15:56:09', '2022-12-30 15:56:09', 1);
INSERT INTO `tickets` VALUES (28, 'eqweqwwq', 'eqweqweqw', '6563045936', 'asdasdasdas', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-30 15:57:12', '2022-12-30 15:57:12', 1);
INSERT INTO `tickets` VALUES (29, 'eqweqwe', 'eqweqwe', 'ext 1013', 'asdasdasda', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-30 16:10:27', '2022-12-30 16:10:27', 1);
INSERT INTO `tickets` VALUES (30, 'eqweqwe', 'eqweqwe', 'ext 1013', 'asdasdasda', '', NULL, '', '', '', 1, 'Media', '', 'Abierto', '2022-12-30 16:10:57', '2022-12-30 16:10:57', 1);
INSERT INTO `tickets` VALUES (31, 'Revisar Tel - Patrimonio', 'Ing. Fernando Cavazos:\nBuenas tardes, por medio de la presente le solicito la reposición de dos aparatos de telefonia asignados a la Srta. Veronica Gonzalez y al Sr. José Camara, del Departamento de Administración de Bienes, lo anterior porque sus aparatos actuales presentan fallas. \n\nAtentamente\nLic. José M. Fernández Sigala\nJefatura de Administración del Patrimonio ', 'Ext 4202', 'Patrimonio', '', 3, '', '', '', 1, 'Media', '', 'Pendiente', '2022-12-30 16:17:57', '2022-12-30 18:36:55', 1);

-- ----------------------------
-- Table structure for user_privilegios
-- ----------------------------
DROP TABLE IF EXISTS `user_privilegios`;
CREATE TABLE `user_privilegios`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` int NOT NULL,
  `privilegio` int NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_privilegios
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_username_unique`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Administrador', 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-02 15:11:36', '2022-12-02 15:11:36');
INSERT INTO `users` VALUES (2, 'Daniela Morales', 'dmorales', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2022-12-02 15:11:36', '2022-12-02 15:11:36');
INSERT INTO `users` VALUES (3, 'Eloy Garcia', 'egarlue', '$2y$10$sPaLcIb3OuUdfoCQwx1Dy.x9KkbbiWVeGZw83AkvzExTbOMREJ4Ny', '2022-12-02 15:11:36', '2022-12-02 15:11:36');

-- ----------------------------
-- Triggers structure for table tickets
-- ----------------------------
DROP TRIGGER IF EXISTS `updateSeguimientos`;
delimiter ;;
CREATE TRIGGER `updateSeguimientos` AFTER UPDATE ON `tickets` FOR EACH ROW BEGIN
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

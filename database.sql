/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : arduino

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 12/10/2022 16:01:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for tfg_gases
-- ----------------------------
DROP TABLE IF EXISTS `tfg_gases`;
CREATE TABLE `tfg_gases`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FechaHora` timestamp(6) NULL DEFAULT current_timestamp(6),
  `SN` int(11) NULL DEFAULT NULL,
  `CO2` float NULL DEFAULT NULL,
  `NH3` float NULL DEFAULT NULL,
  `humedad` float NULL DEFAULT NULL,
  `presion` float NULL DEFAULT NULL,
  `temperatura` float NULL DEFAULT NULL,
  `altitud` float NULL DEFAULT NULL,
  `ITH` float NULL DEFAULT NULL,
  `mail` enum('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'no',
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tfg_gases
-- ----------------------------
INSERT INTO `tfg_gases` VALUES (1, '2022-10-11 00:19:42.099884', 2147483647, 600, 17, 40, 1030, 37, 750, 75, 'no');

SET FOREIGN_KEY_CHECKS = 1;

/*
 Navicat MySQL Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50617
 Source Host           : localhost:3306
 Source Schema         : weibo

 Target Server Type    : MySQL
 Target Server Version : 50617
 File Encoding         : 65001

 Date: 18/06/2018 21:37:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for weibo_approve
-- ----------------------------
DROP TABLE IF EXISTS `weibo_approve`;
CREATE TABLE `weibo_approve`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '认证名称',
  `info` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '认证资料',
  `state` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '认证状态',
  `create` int(10) UNSIGNED NOT NULL COMMENT '申请时间',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户登录的ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of weibo_approve
-- ----------------------------
INSERT INTO `weibo_approve` VALUES (2, '马云', '阿里巴巴董事局主席，淘宝网创始人！', 1, 1420551253, 7);
INSERT INTO `weibo_approve` VALUES (3, '健康美食', '11111111111', 1, 1529328848, 1);

-- ----------------------------
-- Table structure for weibo_comment
-- ----------------------------
DROP TABLE IF EXISTS `weibo_comment`;
CREATE TABLE `weibo_comment`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '评论的ID',
  `content` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '评论的内容',
  `create` int(10) UNSIGNED NOT NULL COMMENT '评论发布时间',
  `ip` int(10) UNSIGNED NOT NULL COMMENT 'IP',
  `tid` int(10) UNSIGNED NOT NULL COMMENT '微博的ID',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '用户ID',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  INDEX `tid`(`tid`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of weibo_comment
-- ----------------------------
INSERT INTO `weibo_comment` VALUES (10, '这是第二次评论', 1521633574, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (9, 'tets 评论', 1521631707, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (11, '这是第三次评论', 1521633596, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (12, '这是第四次评论', 1521633601, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (13, '这是第五次评论', 1521633606, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (14, '这是第六次评论', 1521633612, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (15, '这是第七次评论', 1521633618, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (16, '这是第八次评论', 1521633623, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (17, '这是第九次评论', 1521633629, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (18, '这是第十次评论', 1521633642, 0, 41, 1);
INSERT INTO `weibo_comment` VALUES (19, '我去我去', 1521633751, 0, 41, 1);

-- ----------------------------
-- Table structure for weibo_image
-- ----------------------------
DROP TABLE IF EXISTS `weibo_image`;
CREATE TABLE `weibo_image`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `data` char(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '微博配图URL的JSON格式',
  `tid` int(10) UNSIGNED NOT NULL COMMENT '配图绑定微博的ID',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 226 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of weibo_image
-- ----------------------------
INSERT INTO `weibo_image` VALUES (13, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa9138f951b3.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa9138f951b3.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa9138f951b3.jpg\"}', 24);
INSERT INTO `weibo_image` VALUES (14, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa91460a5381.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa91460a5381.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa91460a5381.jpg\"}', 25);
INSERT INTO `weibo_image` VALUES (15, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa91483bb2cf.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa91483bb2cf.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa91483bb2cf.jpg\"}', 26);
INSERT INTO `weibo_image` VALUES (16, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa91490560a4.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa91490560a4.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa91490560a4.jpg\"}', 27);
INSERT INTO `weibo_image` VALUES (17, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa922e0ab8a5.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa922e0ab8a5.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa922e0ab8a5.jpg\"}', 28);
INSERT INTO `weibo_image` VALUES (18, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa922e17ae2f.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa922e17ae2f.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa922e17ae2f.jpg\"}', 28);
INSERT INTO `weibo_image` VALUES (19, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa92bb2d5ffb.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa92bb2d5ffb.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa92bb2d5ffb.jpg\"}', 30);
INSERT INTO `weibo_image` VALUES (20, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa92bb3a313d.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa92bb3a313d.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa92bb3a313d.jpg\"}', 30);
INSERT INTO `weibo_image` VALUES (21, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa92bb40d0dd.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa92bb40d0dd.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa92bb40d0dd.jpg\"}', 30);
INSERT INTO `weibo_image` VALUES (22, '{\"thumb\":\".\\/Uploads\\/2018-03-14\\/180_5aa92bb45daf4.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-14\\/550_5aa92bb45daf4.jpg\",\"source\":\".\\/Uploads\\/2018-03-14\\/5aa92bb45daf4.jpg\"}', 30);
INSERT INTO `weibo_image` VALUES (23, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa255b9853c.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa255b9853c.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa255b9853c.jpg\"}', 33);
INSERT INTO `weibo_image` VALUES (24, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa27888db1a.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa27888db1a.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa27888db1a.jpg\"}', 35);
INSERT INTO `weibo_image` VALUES (25, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa29d4dee0f.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa29d4dee0f.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa29d4dee0f.jpg\"}', 36);
INSERT INTO `weibo_image` VALUES (26, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa29d572362.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa29d572362.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa29d572362.jpg\"}', 36);
INSERT INTO `weibo_image` VALUES (27, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa29d5dde1e.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa29d5dde1e.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa29d5dde1e.jpg\"}', 36);
INSERT INTO `weibo_image` VALUES (28, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa29d64cc12.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa29d64cc12.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa29d64cc12.jpg\"}', 36);
INSERT INTO `weibo_image` VALUES (29, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2afecb6f8.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2afecb6f8.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2afecb6f8.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (30, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2aff58903.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2aff58903.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2aff58903.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (31, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2affc0e3b.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2affc0e3b.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2affc0e3b.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (32, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2b0024567.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2b0024567.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2b0024567.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (33, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2b006e9a1.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2b006e9a1.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2b006e9a1.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (34, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2b00b279b.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2b00b279b.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2b00b279b.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (35, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2b0108c0f.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2b0108c0f.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2b0108c0f.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (36, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa2b014fddb.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa2b014fddb.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa2b014fddb.jpg\"}', 37);
INSERT INTO `weibo_image` VALUES (37, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671a71a11.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671a71a11.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671a71a11.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (38, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671bb7f41.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671bb7f41.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671bb7f41.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (39, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671c4084f.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671c4084f.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671c4084f.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (40, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671cac830.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671cac830.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671cac830.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (41, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671d0d7f1.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671d0d7f1.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671d0d7f1.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (42, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671d607c5.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671d607c5.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671d607c5.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (43, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671daec3f.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671daec3f.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671daec3f.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (44, '{\"thumb\":\".\\/Uploads\\/2018-03-15\\/180_5aaa671e1418f.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-15\\/550_5aaa671e1418f.jpg\",\"source\":\".\\/Uploads\\/2018-03-15\\/5aaa671e1418f.jpg\"}', 41);
INSERT INTO `weibo_image` VALUES (45, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca44e073e.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca44e073e.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca44e073e.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (46, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca45d19cc.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca45d19cc.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca45d19cc.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (47, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca4653665.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca4653665.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca4653665.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (48, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca46cb9db.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca46cb9db.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca46cb9db.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (49, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca474beb5.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca474beb5.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca474beb5.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (50, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca47bf855.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca47bf855.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca47bf855.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (51, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca482d5e1.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca482d5e1.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca482d5e1.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (52, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacca48987c5.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacca48987c5.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacca48987c5.jpg\"}', 42);
INSERT INTO `weibo_image` VALUES (53, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacf3a5ada2a.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacf3a5ada2a.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacf3a5ada2a.jpg\"}', 43);
INSERT INTO `weibo_image` VALUES (54, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacf3edc6dfb.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacf3edc6dfb.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacf3edc6dfb.jpg\"}', 44);
INSERT INTO `weibo_image` VALUES (55, '{\"thumb\":\".\\/Uploads\\/2018-03-17\\/180_5aacf4528e4c0.jpg\",\"unfold\":\".\\/Uploads\\/2018-03-17\\/550_5aacf4528e4c0.jpg\",\"source\":\".\\/Uploads\\/2018-03-17\\/5aacf4528e4c0.jpg\"}', 45);
INSERT INTO `weibo_image` VALUES (220, '{\"thumb\":\".\\/Uploads\\/2018-06-18\\/180_5b27b4912bbc3.jpg\",\"unfold\":\".\\/Uploads\\/2018-06-18\\/550_5b27b4912bbc3.jpg\",\"source\":\".\\/Uploads\\/2018-06-18\\/5b27b4912bbc3.jpg\"}', 206);
INSERT INTO `weibo_image` VALUES (221, '{\"thumb\":\".\\/Uploads\\/2018-06-18\\/180_5b27b49f1dc2a.jpg\",\"unfold\":\".\\/Uploads\\/2018-06-18\\/550_5b27b49f1dc2a.jpg\",\"source\":\".\\/Uploads\\/2018-06-18\\/5b27b49f1dc2a.jpg\"}', 207);
INSERT INTO `weibo_image` VALUES (222, '{\"thumb\":\".\\/Uploads\\/2018-06-18\\/180_5b27b4a0413b4.jpg\",\"unfold\":\".\\/Uploads\\/2018-06-18\\/550_5b27b4a0413b4.jpg\",\"source\":\".\\/Uploads\\/2018-06-18\\/5b27b4a0413b4.jpg\"}', 207);
INSERT INTO `weibo_image` VALUES (223, '{\"thumb\":\".\\/Uploads\\/2018-06-18\\/180_5b27b4a27992a.jpg\",\"unfold\":\".\\/Uploads\\/2018-06-18\\/550_5b27b4a27992a.jpg\",\"source\":\".\\/Uploads\\/2018-06-18\\/5b27b4a27992a.jpg\"}', 207);
INSERT INTO `weibo_image` VALUES (224, '{\"thumb\":\".\\/Uploads\\/2018-06-18\\/180_5b27b4a397111.jpg\",\"unfold\":\".\\/Uploads\\/2018-06-18\\/550_5b27b4a397111.jpg\",\"source\":\".\\/Uploads\\/2018-06-18\\/5b27b4a397111.jpg\"}', 207);
INSERT INTO `weibo_image` VALUES (225, '{\"thumb\":\".\\/Uploads\\/2018-06-18\\/180_5b27b4a4a9806.jpg\",\"unfold\":\".\\/Uploads\\/2018-06-18\\/550_5b27b4a4a9806.jpg\",\"source\":\".\\/Uploads\\/2018-06-18\\/5b27b4a4a9806.jpg\"}', 207);

-- ----------------------------
-- Table structure for weibo_manage
-- ----------------------------
DROP TABLE IF EXISTS `weibo_manage`;
CREATE TABLE `weibo_manage`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `manager` char(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '管理员帐号',
  `password` char(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL COMMENT '管理员密码',
  `create` int(10) UNSIGNED NOT NULL COMMENT '创建的时间',
  `last_login` int(10) UNSIGNED NOT NULL COMMENT '最后登录的时间',
  `last_ip` int(10) UNSIGNED NOT NULL COMMENT '最后登录的IP',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of weibo_manage
-- ----------------------------
INSERT INTO `weibo_manage` VALUES (1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1406080825, 1529328887, 0);

-- ----------------------------
-- Table structure for weibo_nav
-- ----------------------------
DROP TABLE IF EXISTS `weibo_nav`;
CREATE TABLE `weibo_nav`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `text` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单名称',
  `state` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单状态',
  `url` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '模块链接',
  `iconCls` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '图标',
  `nid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '菜单层次',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of weibo_nav
-- ----------------------------
INSERT INTO `weibo_nav` VALUES (1, '系统管理', 'closed', '', 'icon-system', 0);
INSERT INTO `weibo_nav` VALUES (2, '基本信息', 'open', '', 'icon-text', 1);
INSERT INTO `weibo_nav` VALUES (3, '管理员管理', 'open', 'Manage/index', 'icon-manager', 1);
INSERT INTO `weibo_nav` VALUES (4, '会员管理', 'closed', '', 'icon-user', 0);
INSERT INTO `weibo_nav` VALUES (5, '会员列表', 'open', 'User/index', 'icon-group', 4);
INSERT INTO `weibo_nav` VALUES (6, '认证审核', 'open', 'Approve/index', 'icon-award', 4);
INSERT INTO `weibo_nav` VALUES (7, '内容管理', 'closed', '', 'icon-folder', 0);
INSERT INTO `weibo_nav` VALUES (8, '微博管理', 'open', 'Topic/index', 'icon-report', 7);
INSERT INTO `weibo_nav` VALUES (9, '评论管理', 'open', 'Comment/index', 'icon-smile', 7);

-- ----------------------------
-- Table structure for weibo_refer
-- ----------------------------
DROP TABLE IF EXISTS `weibo_refer`;
CREATE TABLE `weibo_refer`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `tid` int(10) UNSIGNED NOT NULL COMMENT '微博ID',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '被@的用户',
  `read` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '是否阅读',
  `create` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  INDEX `tid`(`tid`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of weibo_refer
-- ----------------------------
INSERT INTO `weibo_refer` VALUES (1, 166, 19, 0, 1414940422);
INSERT INTO `weibo_refer` VALUES (2, 166, 7, 1, 1414940422);
INSERT INTO `weibo_refer` VALUES (3, 166, 9, 0, 1414940422);
INSERT INTO `weibo_refer` VALUES (4, 166, 10, 0, 1414940422);
INSERT INTO `weibo_refer` VALUES (5, 167, 7, 1, 1416966019);
INSERT INTO `weibo_refer` VALUES (6, 168, 7, 1, 1416967364);
INSERT INTO `weibo_refer` VALUES (7, 169, 7, 1, 1417156170);
INSERT INTO `weibo_refer` VALUES (8, 170, 7, 1, 1417156183);
INSERT INTO `weibo_refer` VALUES (9, 171, 7, 1, 1417157535);
INSERT INTO `weibo_refer` VALUES (10, 172, 7, 1, 1417157547);

-- ----------------------------
-- Table structure for weibo_topic
-- ----------------------------
DROP TABLE IF EXISTS `weibo_topic`;
CREATE TABLE `weibo_topic`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `content` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '微博内容',
  `content_over` char(25) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '微博溢出的内容',
  `reid` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '转播的源微博ID',
  `recount` tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '转播的次数',
  `comcount` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `ip` int(10) UNSIGNED NOT NULL COMMENT 'IP',
  `create` int(10) UNSIGNED NOT NULL COMMENT '发表时间',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '发表用户',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `id`(`id`) USING BTREE,
  INDEX `uid`(`uid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 208 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of weibo_topic
-- ----------------------------
INSERT INTO `weibo_topic` VALUES (24, '分享图片', '', 0, 0, 0, 0, 1521030033, 2);
INSERT INTO `weibo_topic` VALUES (25, '#狐妖小红娘# 你的2018，我罩了！新年快乐！！ ​​​​', '', 0, 0, 0, 0, 1521030241, 1);
INSERT INTO `weibo_topic` VALUES (26, '#苏苏归来##狐妖小红娘# 植树节，种一棵相思树，许个愿试试？ ​​​​', '', 0, 0, 0, 0, 1521030277, 1);
INSERT INTO `weibo_topic` VALUES (27, '年轻时做事还是要有计划性，不能太重一时。一干活整天不睡觉，持久不了，有些临时突击的可以这样，但多数工作得一步步来，你太猛，到后来常难乎为继。二要考虑别人，你要让大家都和你一样干，最后大家都有意见。还是有些韧性，每天坚持，一段时间之后成绩就不小。古语说：“狂风不竟日，暴雨不终朝。”', '', 0, 0, 0, 0, 1521030292, 1);
INSERT INTO `weibo_topic` VALUES (28, '分享图片', '', 0, 0, 0, 0, 1521033954, 1);
INSERT INTO `weibo_topic` VALUES (29, '这是一个无图的微博', '', 0, 0, 0, 0, 1521034512, 1);
INSERT INTO `weibo_topic` VALUES (30, '分享图片', '', 0, 0, 0, 0, 1521036217, 1);
INSERT INTO `weibo_topic` VALUES (38, '表情解析[a_3][a_6]', '', 0, 0, 0, 0, 1521102053, 1);
INSERT INTO `weibo_topic` VALUES (37, '无动态刷新多张图片', '', 0, 0, 0, 0, 1521101571, 1);
INSERT INTO `weibo_topic` VALUES (36, '无动态刷新多张图片', '', 0, 0, 0, 0, 1521101271, 1);
INSERT INTO `weibo_topic` VALUES (35, '无动态刷新一张图片', '', 0, 0, 0, 0, 1521100682, 1);
INSERT INTO `weibo_topic` VALUES (39, '无动态刷新表情解析[a_3]', '', 0, 0, 0, 0, 1521102259, 1);
INSERT INTO `weibo_topic` VALUES (40, '[a_2]', '', 0, 0, 0, 0, 1521102284, 1);
INSERT INTO `weibo_topic` VALUES (41, '自动加载', '', 0, 1, 11, 0, 1521116959, 1);
INSERT INTO `weibo_topic` VALUES (42, 'test.............', '', 0, 0, 0, 0, 1521273423, 50);
INSERT INTO `weibo_topic` VALUES (43, 'test face', '', 0, 0, 0, 0, 1521284007, 1);
INSERT INTO `weibo_topic` VALUES (47, '@阳毅 你好啊', '', 0, 2, 0, 0, 1521459580, 1);
INSERT INTO `weibo_topic` VALUES (50, '转发测试', '', 47, 0, 0, 0, 1521533396, 1);
INSERT INTO `weibo_topic` VALUES (51, 'test转播', '', 41, 0, 0, 0, 1521535068, 1);
INSERT INTO `weibo_topic` VALUES (52, '@admin 试一试', '', 0, 0, 0, 0, 1521714439, 1);
INSERT INTO `weibo_topic` VALUES (53, '@admin  测试', '', 0, 0, 0, 0, 1521714524, 50);
INSERT INTO `weibo_topic` VALUES (54, '@admin 测试  @阳毅   考虑到viu反对和规范的和vu地', '', 0, 0, 0, 0, 1521716269, 50);
INSERT INTO `weibo_topic` VALUES (55, '122332', '', 0, 0, 0, 0, 1521959318, 1);
INSERT INTO `weibo_topic` VALUES (56, '111111111111111', '', 0, 0, 0, 0, 1521959593, 1);
INSERT INTO `weibo_topic` VALUES (57, '21212121', '', 0, 0, 0, 0, 1524577228, 1);
INSERT INTO `weibo_topic` VALUES (206, '[a_3]', '', 0, 0, 0, 0, 1529328787, 1);
INSERT INTO `weibo_topic` VALUES (207, '[a_32]111111', '', 0, 0, 0, 0, 1529328807, 1);

-- ----------------------------
-- Table structure for weibo_user
-- ----------------------------
DROP TABLE IF EXISTS `weibo_user`;
CREATE TABLE `weibo_user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '编号',
  `username` char(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户名',
  `password` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `email` char(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '电子邮件',
  `face` char(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人头像',
  `domain` char(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个性域名',
  `create` int(10) UNSIGNED NOT NULL COMMENT '创建时间',
  `last_login` int(10) NOT NULL DEFAULT 0 COMMENT '最后登录的时间',
  `last_ip` int(10) NOT NULL DEFAULT 0 COMMENT '最后登录的IP',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `domain`(`domain`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 95 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of weibo_user
-- ----------------------------
INSERT INTO `weibo_user` VALUES (50, '阳毅', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '112132432@263.com', '{\"big\":\".\\/Uploads\\/face\\/50.jpg\",\"small\":\".\\/Uploads\\/face\\/50_small.jpg\"}', 'yangyi', 1521203837, 1521714475, 0);
INSERT INTO `weibo_user` VALUES (1, 'admin', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '115183203@qq.com', '{\"big\":\".\\/Uploads\\/face\\/1.jpg\",\"small\":\".\\/Uploads\\/face\\/1_small.jpg\"}', 'admin', 1406637671, 1529328585, 0);
INSERT INTO `weibo_user` VALUES (51, 'admin02', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', '212121@263.com', '', '', 1521282740, 1521282765, 0);

-- ----------------------------
-- Table structure for weibo_user_extend
-- ----------------------------
DROP TABLE IF EXISTS `weibo_user_extend`;
CREATE TABLE `weibo_user_extend`  (
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户简介',
  `uid` int(10) UNSIGNED NOT NULL COMMENT '关联用户ID',
  UNIQUE INDEX `uid`(`uid`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of weibo_user_extend
-- ----------------------------
INSERT INTO `weibo_user_extend` VALUES ('大家好，我是admin，感谢大家的关注。。。', 1);
INSERT INTO `weibo_user_extend` VALUES ('大家好我是阳毅，感谢大家的关注。。。', 50);
INSERT INTO `weibo_user_extend` VALUES (NULL, 51);

SET FOREIGN_KEY_CHECKS = 1;

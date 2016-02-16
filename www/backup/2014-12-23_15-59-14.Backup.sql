set charset utf8;
CREATE TABLE `staffinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `staffName` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `staffSex` int(10) NOT NULL,
  `staffDepartment` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `staffTelephone` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `staffEmail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `staffAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `staffBirthday` date NOT NULL,
  `Authorization` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `staffOffice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `staffFlag` int(10) DEFAULT NULL,
  `remember_token` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `staffName` (`staffName`)
) ENGINE=InnoDB AUTO_INCREMENT=415 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('123','4297f44b13955235245b2497399d7a93','方师傅','1','电算部','14151345123','135136753@163.com','地方											','1971-08-00','level1','人文馆-百姓阁','2014-11-24','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('323','4297f44b13955235245b2497399d7a93','零光片羽','0','销售部门','00000000000','24341@er.com','的深入各色													','1984-05-00','level1','零号基地','2014-10-31','2014-12-16','','6');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('324','4297f44b13955235245b2497399d7a93','一言为定','0','后勤部门','11111111111','11111111111@195.com','知道Novi																																		123kyrsy																																																','1993-08-00','level1','一号基地','0000-00-00','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('325','4297f44b13955235245b2497399d7a93','二缶锺惑','1','地球防卫部','22222222123','222222222@qq.com','	多大个事																																																					','1970-06-00','level1','二号基地','2014-08-01','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('326','4297f44b13955235245b2497399d7a93','三生万物','1','电算部门','33333333333','12434345435@143.com','		额外人范围而放弃																																																																										','1985-11-00','level1','三号基地','2014-08-01','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('327','4297f44b13955235245b2497399d7a93','四方辐辏','0','地球防卫部','12435435412','444444@456.com','都发福为feWWFA																													','1974-10-00','level1','四号基地','2014-08-02','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('328','4297f44b13955235245b2497399d7a93','五蕴皆空','1','人事部门','55555555555','55555555@56.com','知道吗！疯狂世界哦	！									','1979-07-00','level1','五号基地','2014-10-31','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('410','f6fdffe48c908deb0f4c3bd36c032e72','admin','0','地球防卫部','12345678900','admin@admin.com','','2014-01-00','super','','2014-12-16','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('412','4297f44b13955235245b2497399d7a93','123','0','销售部门','12345678900','12434345435@143.com','','1984-06-00','level1','','2014-12-16','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('413','4297f44b13955235245b2497399d7a93','user','0','人事部门','11111111111','123456@qq.com','','2014-01-00','level1','','2014-12-16','2014-12-16','','0');
insert into `staffinfo`(`id`,`password`,`staffName`,`staffSex`,`staffDepartment`,`staffTelephone`,`staffEmail`,`staffAddress`,`staffBirthday`,`Authorization`,`staffOffice`,`created_at`,`updated_at`,`staffFlag`,`remember_token`) values('414','96e79218965eb72c92a549dd5a330112','1','0','人事部门','11111111111','123456@qq.com','','2014-01-00','level1','','2014-12-16','2014-12-16','','0');
CREATE TABLE `tb_company` (
  `CompanyID` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '供应商ID编号',
  `CompanyName` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '供应商名称',
  `CompanyDirector` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '供应商负责人',
  `CompanyPhone` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '供应商联系电话',
  `CompanyFax` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '供应商传真',
  `CompanyAddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '供应商地址',
  `CompanyRemark` text COLLATE utf8_unicode_ci NOT NULL COMMENT '供应商相关备注信息',
  `ReDateTime` date NOT NULL COMMENT '回复日期',
  `updated_at` date NOT NULL COMMENT '更新时间',
  `created_at` date NOT NULL COMMENT '创建时间',
  `Flag` int(10) NOT NULL COMMENT '标记',
  PRIMARY KEY (`CompanyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='公司信息表';
insert into `tb_company`(`CompanyID`,`CompanyName`,`CompanyDirector`,`CompanyPhone`,`CompanyFax`,`CompanyAddress`,`CompanyRemark`,`ReDateTime`,`updated_at`,`created_at`,`Flag`) values('C-33333','levelC-Supplier','C','33333333333','33333333','1234567890','    levelC-Supplier                      ','0000-00-00','2014-11-24','2014-11-24','0');
insert into `tb_company`(`CompanyID`,`CompanyName`,`CompanyDirector`,`CompanyPhone`,`CompanyFax`,`CompanyAddress`,`CompanyRemark`,`ReDateTime`,`updated_at`,`created_at`,`Flag`) values('company_00000','levelA-Supplier','A','000000000000','00000000','1234567890','levelA','0000-00-00','0000-00-00','0000-00-00','0');
insert into `tb_company`(`CompanyID`,`CompanyName`,`CompanyDirector`,`CompanyPhone`,`CompanyFax`,`CompanyAddress`,`CompanyRemark`,`ReDateTime`,`updated_at`,`created_at`,`Flag`) values('company_11111','levelB-Supplier','B','11111111111','11111111','1234567890','levelB','0000-00-00','0000-00-00','0000-00-00','0');
CREATE TABLE `tb_jhgoodsinfo` (
  `GoodsID` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '进货编号',
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '进货负责员工id',
  `JhCompanyName` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '进货供应商',
  `DepotName` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '所属仓库',
  `GoodsName` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT '进货商品名称',
  `GoodsNum` float NOT NULL COMMENT '商品进货数量',
  `GoodsUnit` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品进货数量单位',
  `GoodsJhPrice` float NOT NULL COMMENT '商品进货单价',
  `GoodsSellPrice` float NOT NULL COMMENT '商品销售单价',
  `GoodsNeedPrice` float NOT NULL COMMENT '进货商品需付款',
  `GoodsNoPrice` float NOT NULL COMMENT '进货商品实付款',
  `GoodsRemark` text COLLATE utf8_unicode_ci NOT NULL COMMENT '进货商品备注信息',
  `GoodsTime` date NOT NULL COMMENT '进货时间',
  `Falg` int(10) NOT NULL COMMENT '标记',
  PRIMARY KEY (`GoodsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='物品进货信息';
insert into `tb_jhgoodsinfo`(`GoodsID`,`id`,`JhCompanyName`,`DepotName`,`GoodsName`,`GoodsNum`,`GoodsUnit`,`GoodsJhPrice`,`GoodsSellPrice`,`GoodsNeedPrice`,`GoodsNoPrice`,`GoodsRemark`,`GoodsTime`,`Falg`) values('Soft Drinks-00000','staff-00000','Soft Drinks-company','Soft Drinks','Soft Drinks-A','100','瓶','2','3','200','200','Soft Drinks-A','2014-11-11','0');
CREATE TABLE `tb_kcgoods` (
  `KcID` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '库存商品ID编号',
  `GoodsID` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品ID编号',
  `JhCompanyName` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品进货供应商',
  `KcDeptName` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '库存所属仓库',
  `KcGoodsName` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '库存商品名称',
  `KcNum` int(20) NOT NULL COMMENT '库存商品数量',
  `KcAlarmNum` float NOT NULL COMMENT '库存警报数量',
  `KcUnit` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '库存商品数量单位',
  `KcTime` date NOT NULL COMMENT '入库时间',
  `KcGoodsPrice` float NOT NULL COMMENT '库存商品进货单价',
  `KcSellPrice` float NOT NULL COMMENT '库存商品销售单价',
  `KcEmp` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '负责入库员工',
  `KcRemark` text COLLATE utf8_unicode_ci NOT NULL COMMENT '入库物品备注信息',
  PRIMARY KEY (`KcID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='物品库存表';
insert into `tb_kcgoods`(`KcID`,`GoodsID`,`JhCompanyName`,`KcDeptName`,`KcGoodsName`,`KcNum`,`KcAlarmNum`,`KcUnit`,`KcTime`,`KcGoodsPrice`,`KcSellPrice`,`KcEmp`,`KcRemark`) values('Stock-000000','Soft Drinks-00000','levelA-Supplier','Soft Drinks','Soft Drinks-A','70','30','瓶','2014-11-11','2','3','staff-00000','Stock-000000--Soft Drinks-A');
CREATE TABLE `tb_sellgoods` (
  `SellID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '销售编号',
  `KcID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '库存商品ID编号',
  `GoodsID` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL COMMENT '进货商品ID编号',
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '员工ID编号',
  `GoodsName` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名称',
  `SellGoodsNum` int(30) NOT NULL COMMENT '商品销售数量',
  `SellGoodsTime` date NOT NULL COMMENT '商品售出时间',
  `SellPrice` float NOT NULL COMMENT '商品销售单价',
  `SellNeedPay` float NOT NULL COMMENT '商品应付款',
  `SellHasPay` float NOT NULL COMMENT '商品实付款',
  `SellRemark` text COLLATE utf8_unicode_ci NOT NULL COMMENT '销售备注',
  `SellFlag` int(10) NOT NULL COMMENT '标记',
  PRIMARY KEY (`SellID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品销售表';
insert into `tb_sellgoods`(`SellID`,`KcID`,`GoodsID`,`id`,`GoodsName`,`SellGoodsNum`,`SellGoodsTime`,`SellPrice`,`SellNeedPay`,`SellHasPay`,`SellRemark`,`SellFlag`) values('S-00000','k-000000','Soft Drinks-00000','staff-00000','Soft Drinks-A','30','2014-11-18','3','90','90','Soft Drinks-A','0');
insert into `tb_sellgoods`(`SellID`,`KcID`,`GoodsID`,`id`,`GoodsName`,`SellGoodsNum`,`SellGoodsTime`,`SellPrice`,`SellNeedPay`,`SellHasPay`,`SellRemark`,`SellFlag`) values('S-11111','K-111111','Soft Drinks-11111','staff-00000','Soft Drinks-B','450','2014-08-12','5','2250','2250','测试','0');
CREATE TABLE `tb_thgoodsinfo` (
  `ThGoodsID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品退货ID编号',
  `KcID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品库存ID编号',
  `GoodsID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品进货ID编号',
  `SellID` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品销售ID编号',
  `id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '员工ID编号',
  `ThGoodsName` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '退货商品名称',
  `ThGoodsNum` int(20) NOT NULL COMMENT '商品退货数量',
  `ThGoodsTime` date NOT NULL COMMENT '商品退货时间',
  `ThGoodsPrice` float NOT NULL COMMENT '退货商品单价',
  `ThNeedPay` float NOT NULL COMMENT '退货商品需付款',
  `ThHasPay` float NOT NULL COMMENT '退货商品实付款',
  `ThGoodsResult` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '退货商品原因',
  PRIMARY KEY (`ThGoodsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='商品退货信息表';
insert into `tb_thgoodsinfo`(`ThGoodsID`,`KcID`,`GoodsID`,`SellID`,`id`,`ThGoodsName`,`ThGoodsNum`,`ThGoodsTime`,`ThGoodsPrice`,`ThNeedPay`,`ThHasPay`,`ThGoodsResult`) values('R-00000','k-000000','Soft Drinks-00000','S-00000','staff-00000','Soft Drinks-A','3','2014-11-12','3','9','9','包装损坏');

-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 07:20 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aestheticpartner`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_client`
--

CREATE TABLE `t_client` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `clientname` varchar(250) COLLATE utf8_bin NOT NULL,
  `phonenumber` int(15) NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `address` varchar(250) COLLATE utf8_bin NOT NULL,
  `age` int(2) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '0' COMMENT '0:female 1:male',
  `image` varchar(1000) COLLATE utf8_bin NOT NULL DEFAULT '/upload/model_1.png',
  `points` longtext COLLATE utf8_bin NOT NULL,
  `date_last_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `draft` tinyint(1) NOT NULL DEFAULT '0',
  `points_count` int(2) NOT NULL,
  `points_image` varchar(250) COLLATE utf8_bin NOT NULL,
  `signature` varchar(250) COLLATE utf8_bin NOT NULL,
  `emotions_shown` varchar(250) COLLATE utf8_bin NOT NULL DEFAULT '[false, false, false, false]'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_client`
--

INSERT INTO `t_client` (`id`, `userid`, `clientname`, `phonenumber`, `email`, `address`, `age`, `gender`, `image`, `points`, `date_last_saved`, `finished`, `draft`, `points_count`, `points_image`, `signature`, `emotions_shown`) VALUES
(20, 2, 'Mike Mayers', 123, '13@sdf.com', 'sdf', 6, 1, '/upload/model_3.png', '', '2016-12-28 22:16:13', 0, 0, 4, '/upload/point_image_1.png', '', ''),
(37, 2, 'wer', 234234, 'sdf@wre.com', 'wetwe', 34, 0, '/upload/model_2.png', '', '2016-12-28 22:16:35', 0, 0, 0, '/upload/point_image_2.png', '', ''),
(39, 3, 'Hello Hello', 123123123, 'hello@hello.com', 'sdfsdf', 23, 1, '/upload/model_3.png', '{"objects":[{"type":"image","originX":"left","originY":"top","left":299,"top":0,"width":765,"height":705,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1.02,"scaleY":1.02,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":false,"id":0,"src":"http://192.168.0.123/upload/model_3.png","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"group","originX":"left","originY":"top","left":515.5,"top":20,"width":332,"height":504,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":false,"id":1,"objects":[{"type":"image","originX":"left","originY":"top","left":-166,"top":-252,"width":332,"height":504,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_face.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":-146,"top":-224,"width":298,"height":205,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_forehead.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":-147,"top":-27,"width":135,"height":86,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_righteye.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":15,"top":-27,"width":135,"height":88,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_lefteye.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":-34,"top":-20,"width":82,"height":148,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_nose.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":-146,"top":49,"width":111,"height":81,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_rightcheek.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":34,"top":49,"width":108,"height":77,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_leftcheek.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":-70,"top":133,"width":131,"height":60,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_mouth.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"image","originX":"left","originY":"top","left":-81,"top":193,"width":139,"height":52,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":0,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":false,"hasBorders":true,"src":"http://192.168.0.123/img/mask_chin.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"}]},{"type":"image","originX":"left","originY":"top","left":571,"top":148,"width":96,"height":96,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"selectable":true,"hasControls":true,"hasBorders":true,"src":"http://192.168.0.123/img/zone_point.svg","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet"},{"type":"path","originX":"center","originY":"center","left":675.25,"top":325,"width":93.5,"height":62,"fill":null,"stroke":"rgb(79, 203, 128)","strokeWidth":1.6,"strokeDashArray":[3,4],"strokeLineCap":"round","strokeLineJoin":"round","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"path":[["M",628.5,356],["Q",628.5,356,629,356],["Q",629.5,356,629.75,356],["Q",630,356,637,354],["Q",644,352,654.5,349.5],["Q",665,347,674,342.5],["Q",683,338,691,331.5],["Q",699,325,706.5,317.5],["Q",714,310,718,302],["L",722,294]],"pathOffset":{"x":675.25,"y":325},"description":"","patternColor":"rgb(131, 215, 164)","myCustomOptionKeepStrokeWidth":1.6}],"background":""}', '2016-12-28 22:16:43', 0, 0, 0, '/upload/point_image_3.png', '', ''),
(40, 3, 'Lisa Stelffi', 123123123, 'hongtai@hongtai.com', 'hongtai', 12, 1, '/upload/model_2.png', '', '2016-12-28 22:16:50', 0, 0, 2, '/upload/point_image_4.png', '', ''),
(56, 3, 'wer', 123123, 'ggg', '', 0, 0, '/upload/model_1.png', '', '2017-01-09 06:59:35', 0, 0, 0, '', '', ''),
(118, 4, 'Lucia Mayer', 17777, 'lu@cia.com', 'Kellerbergstraße 1', 22, 0, '/upload/model_2.png', '{"objects":[],"background":"","height":676}', '2017-02-24 18:38:33', 0, 0, 0, '/upload/client/configuration_gi9m5r1mdcztm3vp9yvx.png', '', '[false,false,false,false]'),
(119, 4, 'Lucia Mayer', 17777, 'lu@cia.com', 'Kellerbergstraße 1', 22, 0, '/upload/model_2.png', '{"objects":[{"type":"image","originX":"left","originY":"top","left":216,"top":19.5,"width":808,"height":704,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"src":"http://83.169.4.108/upload/client/customer_ym1gscqro84kg2ez8r8r.png","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet","id":0,"createdWidth":1240,"hasControls":false,"hasBorders":false,"lockMovementX":false,"lockMovementY":false,"selectable":false},{"type":"image","originX":"left","originY":"top","left":207,"top":16.5,"width":808,"height":704,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"src":"http://83.169.4.108/upload/client/customer_csmw3tj8baxm43wggfqb.png","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet","id":0,"createdWidth":1240,"hasControls":false,"hasBorders":false,"lockMovementX":false,"lockMovementY":false,"selectable":false}],"background":"","height":743}', '2017-02-24 18:38:36', 0, 0, 1, '/upload/client/configuration_lcthliq7sdht6gzla4dq.png', '/upload/client/signature_e7x4d7psae4swf9q33ak.png', '[true,false,false,false]'),
(120, 4, 'ggg', 123123, 'sf@sdf.com', 'sdfsfd', 24, 0, '/upload/model_2.png', '{"objects":[{"type":"image","originX":"left","originY":"top","left":286.5,"top":25,"width":821,"height":688,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":0,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","fillRule":"nonzero","globalCompositeOperation":"source-over","transformMatrix":null,"skewX":0,"skewY":0,"src":"http://83.169.4.108/upload/client/customer_f6vh88glbe84ti5x7dvl.png","filters":[],"resizeFilters":[],"crossOrigin":"","alignX":"none","alignY":"none","meetOrSlice":"meet","id":0,"createdWidth":1364,"hasControls":false,"hasBorders":false,"lockMovementX":false,"lockMovementY":false,"selectable":false}],"background":"","height":720}', '2017-02-24 18:38:39', 0, 0, 0, '/upload/client/configuration_i2slridamyp41mc2pysi.png', '/upload/client/signature_vd6lyyrn977fkwd43dz0.png', '[false,false,false,false]');

-- --------------------------------------------------------

--
-- Table structure for table `t_company`
--

CREATE TABLE `t_company` (
  `id` int(11) NOT NULL,
  `activated` int(1) NOT NULL,
  `email` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `fullname` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `type` int(1) NOT NULL,
  `phone` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `website` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `avatar` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `infoemail` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `street` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `postal` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `city` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `country` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bc_check` int(1) DEFAULT NULL,
  `sv_check` int(1) DEFAULT NULL,
  `cc_check` int(1) DEFAULT NULL,
  `ds_check` int(1) DEFAULT NULL,
  `wlc_check` int(1) DEFAULT NULL,
  `frontend_language` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `paymenttype` int(1) NOT NULL,
  `payment_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `payment_nachname` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `payment_iban` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `payment_geburtsdatum` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `payment_phonenumber` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_last_saved` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `removed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_company`
--

INSERT INTO `t_company` (`id`, `activated`, `email`, `password`, `fullname`, `type`, `phone`, `website`, `avatar`, `infoemail`, `street`, `postal`, `city`, `country`, `bc_check`, `sv_check`, `cc_check`, `ds_check`, `wlc_check`, `frontend_language`, `paymenttype`, `payment_name`, `payment_nachname`, `payment_iban`, `payment_geburtsdatum`, `payment_phonenumber`, `date_last_saved`, `removed`) VALUES
(8, 1, 'admin@admin.com', '7815696ecbf1c96e6894b779456d330e', 'company1', 0, '(111) 111-1111', 'http://www.abc.com11', '/upload/user/member_d7rzq3b2xrpyiog1c4sh.png', 'asdfasdf@adsfasdf', '1111111', '1111', 'adfasdf', 'DE', 1, NULL, NULL, NULL, NULL, 'AK', 0, 'adf', 'ef', 'asdf', '30/02/2012', '(222) 111-1111', '2017-02-23 00:00:00', 0),
(9, 0, 'admin@admin.com', '7815696ecbf1c96e6894b779456d330e', 'company2', 1, '(111) 111-1111', 'http://www.com', '/upload/user/member_d7rzq3b2xrpyiog1c4sh.png', 'asdfasdf@adsfasdf', '1111111', '1111', 'adfasdf', 'DE', 1, NULL, NULL, NULL, NULL, 'AK', 0, '', '', '', '', '', '2017-02-14 00:00:00', 0),
(11, 1, 'admin@admin.com', '7815696ecbf1c96e6894b779456d330e', 'company4', 2, '(111) 111-1111', 'http://www.com', '/upload/user/member_d7rzq3b2xrpyiog1c4sh.png', 'asdfasdf@adsfasdf', '1111111', '1111', 'adfasdf', 'DE', 1, NULL, NULL, NULL, NULL, 'AK', 0, 'asdf', 'aasdf', '123123', '30/02/2012', '(111) 111-1111', '2017-02-22 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_configuration`
--

CREATE TABLE `t_configuration` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `clientname` varchar(250) COLLATE utf8_bin NOT NULL,
  `phonenumber` varchar(250) COLLATE utf8_bin NOT NULL,
  `email` varchar(250) COLLATE utf8_bin NOT NULL,
  `address` varchar(250) COLLATE utf8_bin NOT NULL,
  `age` int(2) NOT NULL,
  `gender` int(1) NOT NULL DEFAULT '0' COMMENT '0:female 1:male',
  `image` varchar(1000) COLLATE utf8_bin NOT NULL,
  `points` varchar(3000) COLLATE utf8_bin NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_last_saved` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `draft` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `companyid` int(11) NOT NULL,
  `activated` int(1) NOT NULL DEFAULT '0',
  `username` varchar(250) COLLATE utf8_bin NOT NULL,
  `passwd` varchar(250) COLLATE utf8_bin NOT NULL,
  `usertype` int(1) NOT NULL DEFAULT '1' COMMENT 'admin:0 user:1',
  `company` varchar(250) COLLATE utf8_bin NOT NULL,
  `fullname` varchar(250) COLLATE utf8_bin NOT NULL,
  `street` varchar(250) COLLATE utf8_bin NOT NULL,
  `postal` int(8) NOT NULL,
  `city` varchar(250) COLLATE utf8_bin NOT NULL,
  `country` varchar(250) COLLATE utf8_bin NOT NULL,
  `avatar` varchar(1000) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `category` varchar(250) COLLATE utf8_bin NOT NULL,
  `language` varchar(250) COLLATE utf8_bin NOT NULL,
  `date_last_saved` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` varchar(11) COLLATE utf8_bin NOT NULL DEFAULT 'New',
  `qualification` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT 'Cosmethic Artist',
  `website` varchar(250) COLLATE utf8_bin NOT NULL,
  `phonenumber` varchar(30) COLLATE utf8_bin NOT NULL,
  `accounttype` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `companyid`, `activated`, `username`, `passwd`, `usertype`, `company`, `fullname`, `street`, `postal`, `city`, `country`, `avatar`, `category`, `language`, `date_last_saved`, `state`, `qualification`, `website`, `phonenumber`, `accounttype`) VALUES
(2, 8, 0, 'user1', '7815696ecbf1c96e6894b779456d330e', 1, '', 'Visagistin Huber', 'München', 0, 'München', '', '/upload/avatar_1.png', '', '', '2017-02-26 02:56:57', 'New', 'Cosmethic Artist', 'http://localost.com', '111111', ''),
(3, 8, 0, 'admin@admin.com', '7815696ecbf1c96e6894b779456d330e', 0, '', 'Lucia Mayer', 'hdhdhdhdh1111', 456456, 'sample city', '', '', '', '', '2017-02-27 07:22:25', '', 'Visagist', 'http://aa.com', '', ''),
(4, 8, 1, 'abc@com', '900150983cd24fb0d6963f7d28e17f72', 1, 'abc', 'abc', 'dfefef', 2132, 'sadffdffg', '12', '123213', '122', '1222', '2017-02-26 09:11:00', 'New', 'Cosmethic Artist', 'http://test.com', '123123123', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_client`
--
ALTER TABLE `t_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_company`
--
ALTER TABLE `t_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_configuration`
--
ALTER TABLE `t_configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_client`
--
ALTER TABLE `t_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `t_company`
--
ALTER TABLE `t_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `t_configuration`
--
ALTER TABLE `t_configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

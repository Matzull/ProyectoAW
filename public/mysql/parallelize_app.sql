-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 01:37 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parallelize_app`
--
CREATE DATABASE IF NOT EXISTS `parallelize_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `parallelize_app`;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `user_email` varchar(60) NOT NULL,
  `comment` varchar(1024) CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`user_email`, `comment`) VALUES
('diego@email.com', 'buah, una web genial, 10/10'),
('diego@email.com', 'pues ya no me gusta, todo mal'),
('jaime@email.com', 'kfhkfhjkfk'),
('jaime@email.com', 'hola,lugo,fjdsaf,asdfads'),
('jaime@email.com', '1,2,3,4,5,6');

-- --------------------------------------------------------

--
-- Table structure for table `execution_segments`
--

CREATE TABLE `execution_segments` (
  `user_email` varchar(60) NOT NULL,
  `start_time` time(3) NOT NULL DEFAULT current_timestamp(3),
  `kernel_id` int(11) NOT NULL,
  `results` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `iteration_start` int(11) NOT NULL,
  `iteration_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `execution_segments`
--

INSERT INTO `execution_segments` (`user_email`, `start_time`, `kernel_id`, `results`, `iteration_start`, `iteration_end`) VALUES
('admin@parallelize.com', '13:08:32.140', 3, '3.1569600105285645,3.1497199535369873,3.142439842224121,3.146399974822998,3.157320022583008,3.14955997467041,3.1448798179626465,3.1511199474334717,3.148360013961792,3.1410000324249268,3.1530399322509766', 0, 11),
('admin@parallelize.com', '13:08:32.739', 3, '3.148319959640503,3.1450400352478027,3.1467599868774414,3.1476798057556152,3.1469600200653076,3.152359962463379,3.153359889984131,3.147519826889038,3.150319814682007,3.149359941482544,3.1600399017333984', 11, 22),
('admin@parallelize.com', '13:08:33.196', 3, '3.1467998027801514,3.1551198959350586,3.1499199867248535,3.1511199474334717,3.1458799839019775,3.1511600017547607,3.1510798931121826,3.1459598541259766,3.1487598419189453,3.151719808578491,3.145439863204956', 22, 33),
('admin@parallelize.com', '13:08:33.662', 3, '3.1550798416137695,3.148239850997925,3.150279998779297,3.163879871368408,3.1518399715423584,3.148279905319214,3.159719944000244,3.1420400142669678,3.1580398082733154,3.147519826889038,3.140439987182617', 33, 44),
('admin@parallelize.com', '13:08:34.125', 3, '3.148399829864502,3.1528398990631104,3.152479887008667,3.1518800258636475,3.1571998596191406,3.156440019607544,3.1603198051452637,3.163640022277832,3.1530799865722656,3.1469199657440186,3.1478400230407715', 44, 55),
('admin@parallelize.com', '13:08:34.577', 3, '3.1440398693084717,3.143359899520874,3.150279998779297,3.1541998386383057,3.1456799507141113,3.150399923324585,3.1520798206329346,3.1521999835968018,3.149519920349121,3.1496798992156982,3.1387999057769775', 55, 66),
('admin@parallelize.com', '13:10:04.719', 3, '3.138360023498535,3.1559598445892334,3.1471199989318848,3.1447999477386475,3.1506400108337402,3.1459999084472656,3.154279947280884,3.1518800258636475,3.154399871826172,3.1486399173736572,3.1579198837280273', 66, 77),
('admin@parallelize.com', '13:10:04.992', 3, '3.154439926147461,3.1471199989318848,3.149479866027832,3.157519817352295,3.1530799865722656,3.1552798748016357,3.1562798023223877,3.1552798748016357,3.1499199867248535,3.1416399478912354,3.1509199142456055', 77, 88),
('admin@parallelize.com', '13:10:05.167', 3, '3.150480031967163,3.1476798057556152,3.158679962158203,3.154320001602173,3.144559860229492,3.1439998149871826,3.1420400142669678,3.1639199256896973,3.1487200260162354,3.144160032272339,3.142319917678833', 88, 99),
('admin@parallelize.com', '13:10:05.324', 3, '3.1521599292755127,3.153719902038574,3.1466798782348633,3.1460399627685547,3.1538798809051514,3.149399995803833,3.1562798023223877,3.1477599143981934,3.149240016937256,3.152599811553955,3.1471199989318848', 99, 110),
('admin@parallelize.com', '13:10:05.497', 3, '3.153439998626709,3.1510000228881836,3.1478400230407715,3.1470799446105957,3.152240037918091,3.1520400047302246,3.153599977493286,3.1480000019073486,3.1619198322296143,3.145439863204956,3.1440799236297607', 110, 121),
('admin@parallelize.com', '13:10:05.669', 3, '3.1562798023223877,3.1568799018859863,3.149279832839966,3.151479959487915,3.146639823913574,3.1547598838806152,3.153640031814575,3.1498799324035645,3.153679847717285,3.1491599082946777,3.150480031967163', 121, 132),
('admin@parallelize.com', '13:10:05.817', 3, '3.1531598567962646,3.146239995956421,3.1437599658966064,3.15447998046875,3.1609199047088623,3.1506400108337402,3.151439905166626,3.1399598121643066,3.150319814682007,3.1499199867248535,3.160759925842285', 132, 143),
('admin@parallelize.com', '13:19:43.981', 3, '3.1563198566436768,3.1469600200653076,3.143440008163452,3.149319887161255,3.1487200260162354,3.147599935531616,3.148399829864502,3.1490800380706787,3.1489198207855225,3.148319959640503,3.1447598934173584', 143, 154),
('admin@parallelize.com', '13:19:44.252', 3, '3.1487998962402344,3.1578400135040283,3.159359931945801,3.1511199474334717,3.1594398021698,3.148279905319214,3.153280019760132,3.1529998779296875,3.1520798206329346,3.146199941635132,3.1467599868774414', 154, 165),
('admin@parallelize.com', '13:19:44.452', 3, '3.1560399532318115,3.143440008163452,3.146519899368286,3.150519847869873,3.152679920196533,3.1445999145507812,3.1426799297332764,3.1499598026275635,3.1539998054504395,3.148319959640503,3.155639886856079', 165, 176),
('admin@parallelize.com', '13:19:44.646', 3, '3.1548399925231934,3.142239809036255,3.14411997795105,3.159799814224243,3.1489198207855225,3.153479814529419,3.140159845352173,3.1429598331451416,3.1478400230407715,3.153559923171997,3.149439811706543', 176, 187),
('admin@parallelize.com', '13:20:18.673', 3, '3.1511998176574707,3.165639877319336,3.144519805908203,3.150359869003296,3.160679817199707,3.1507198810577393,3.1479599475860596,3.1459200382232666,3.163439989089966,3.1557199954986572,3.15339994430542', 187, 198),
('admin@parallelize.com', '13:20:18.940', 3, '3.159799814224243,3.1480398178100586,3.1528398990631104,3.141119956970215,3.1591598987579346,3.1466798782348633,3.161720037460327,3.1561999320983887,3.146399974822998,3.1480000019073486,3.152639865875244', 198, 209),
('admin@parallelize.com', '13:20:19.095', 3, '3.148559808731079,3.157559871673584,3.1467998027801514,3.152519941329956,3.1496798992156982,3.144479990005493,3.146639823913574,3.1560399532318115,3.1538798809051514,3.1328399181365967,3.1541600227355957', 209, 220),
('admin@parallelize.com', '13:20:19.279', 3, '3.1457998752593994,3.1530799865722656,3.1511600017547607,3.1517598628997803,3.1511199474334717,3.1471598148345947,3.147599935531616,3.158439874649048,3.1518399715423584,3.139400005340576,3.149359941482544', 220, 231),
('admin@parallelize.com', '13:20:19.416', 3, '3.144160032272339,3.148559808731079,3.1510398387908936,3.159759998321533,3.1520798206329346,3.150599956512451,3.153559923171997,3.1507599353790283,3.154599905014038,3.150599956512451,3.149479866027832', 231, 242),
('admin@parallelize.com', '13:21:01.642', 3, '3.1530799865722656,3.155439853668213,3.1507999897003174,3.150439977645874,3.152519941329956,3.153679847717285,3.152400016784668,3.149479866027832,3.15447998046875,3.14523983001709,3.1671998500823975', 242, 253),
('admin@parallelize.com', '13:21:01.863', 3, '3.151479959487915,3.157399892807007,3.1517999172210693,3.1580798625946045,3.1471598148345947,3.1490399837493896,3.1562798023223877,3.1569998264312744,3.153719902038574,3.1506400108337402,3.151479959487915', 253, 264),
('admin@parallelize.com', '13:21:02.065', 3, '3.157519817352295,3.144519805908203,3.15939998626709,3.147599935531616,3.153479814529419,3.1491599082946777,3.163839817047119,3.145599842071533,3.15667986869812,3.145359992980957,3.156359910964966', 264, 275),
('admin@parallelize.com', '13:21:02.266', 3, '3.154359817504883,3.1491599082946777,3.161759853363037,3.142199993133545,3.147320032119751,3.147559881210327,3.153719902038574,3.151479959487915,3.148200035095215,3.1467599868774414,3.1601598262786865', 275, 286),
('admin@parallelize.com', '13:21:02.439', 3, '3.1506400108337402,3.1427998542785645,3.1387999057769775,3.1479198932647705,3.149279832839966,3.156719923019409,3.148279905319214,3.1439199447631836,3.1488800048828125,3.158439874649048,3.1460800170898438', 286, 297),
('admin@parallelize.com', '13:21:02.619', 3, '3.154279947280884,3.1532399654388428,3.1489999294281006,3.1601998805999756,3.1579198837280273,3.157320022583008,3.142359972000122,3.1517999172210693,3.15067982673645,3.1568398475646973,3.1519198417663574', 297, 308),
('admin@parallelize.com', '13:21:02.818', 3, '3.159679889678955,3.1487200260162354,3.1571998596191406,3.1496798992156982,3.1518800258636475,3.1415998935699463,3.1497199535369873,3.15556001663208,3.148159980773926,3.1517999172210693,3.152240037918091', 308, 319),
('admin@parallelize.com', '13:21:03.020', 3, '3.143079996109009,3.154320001602173,3.1459999084472656,3.156599998474121,3.1450798511505127,3.150359869003296,3.1499598026275635,3.1466798782348633,3.149279832839966,3.152559995651245,3.151479959487915', 319, 330),
('admin@parallelize.com', '13:21:03.186', 3, '3.155359983444214,3.1517598628997803,3.157519817352295,3.1476399898529053,3.154559850692749,3.1519598960876465,3.154639959335327,3.1573598384857178,3.1439599990844727,3.1567599773406982,3.146479845046997', 330, 341),
('admin@parallelize.com', '13:21:03.359', 3, '3.1480798721313477,3.156719923019409,3.152400016784668,3.152599811553955,3.147239923477173,3.1538000106811523,3.1501998901367188,3.1550798416137695,3.1469600200653076,3.150359869003296,3.1561198234558105', 341, 352),
('admin@parallelize.com', '13:21:03.552', 3, '3.148200035095215,3.151599884033203,3.147199869155884,3.1539998054504395,3.148279905319214,3.1365199089050293,3.147439956665039,3.154520034790039,3.155679941177368,3.1531198024749756,3.154359817504883', 352, 363),
('admin@parallelize.com', '13:21:03.756', 3, '3.156599998474121,3.1633198261260986,3.153519868850708,3.153359889984131,3.1572399139404297,3.1527998447418213,3.15447998046875,3.1632399559020996,3.154559850692749,3.1578400135040283,3.147559881210327', 363, 374),
('admin@parallelize.com', '13:21:03.956', 3, '3.158799886703491,3.1540799140930176,3.15231990814209,3.1450400352478027,3.146479845046997,3.1476399898529053,3.145159959793091,3.155759811401367,3.15556001663208,3.1542398929595947,3.153719902038574', 374, 385),
('admin@parallelize.com', '13:21:04.129', 3, '3.1459999084472656,3.157599925994873,3.145279884338379,3.157320022583008,3.152400016784668,3.13703989982605,3.157639980316162,3.154520034790039,3.1530799865722656,3.1458399295806885,3.147239923477173', 385, 396),
('admin@parallelize.com', '13:21:04.321', 3, '3.156440019607544,3.14955997467041,3.143319845199585,3.1569998264312744,3.1487998962402344,3.1540799140930176,3.1486799716949463,3.151719808578491,3.1572399139404297,3.154599905014038,3.1499598026275635', 396, 407),
('admin@parallelize.com', '13:21:04.524', 3, '3.1477999687194824,3.1518800258636475,3.1572799682617188,3.1490399837493896,3.1521999835968018,3.155679941177368,3.1509199142456055,3.147519826889038,3.1466000080108643,3.1479198932647705,3.1457998752593994', 407, 418),
('admin@parallelize.com', '13:21:04.730', 3, '3.145519971847534,3.1531198024749756,3.151559829711914,3.152279853820801,3.1561198234558105,3.154520034790039,3.1499998569488525,3.149639844894409,3.1468398571014404,3.154599905014038,3.1499199867248535', 418, 429),
('admin@parallelize.com', '13:21:04.934', 3, '3.156599998474121,3.149279832839966,3.149199962615967,3.1439199447631836,3.1468398571014404,3.150559902191162,3.156359910964966,3.146440029144287,3.151639938354492,3.148279905319214,3.1572799682617188', 429, 440),
('admin@parallelize.com', '13:21:05.139', 3, '3.1506400108337402,3.1476798057556152,3.1581199169158936,3.1603598594665527,3.1480798721313477,3.143239974975586,3.1410000324249268,3.1510398387908936,3.1531598567962646,3.147320032119751,3.1458799839019775', 440, 451),
('admin@parallelize.com', '13:21:05.323', 3, '3.1428799629211426,3.1550400257110596,3.140479803085327,3.1531999111175537,3.154279947280884,3.155359983444214,3.156440019607544,3.1461198329925537,3.14411997795105,3.163439989089966,3.152519941329956', 451, 462),
('admin@parallelize.com', '13:21:05.510', 3, '3.1459999084472656,3.1510798931121826,3.1477599143981934,3.1471199989318848,3.154320001602173,3.153280019760132,3.1521198749542236,3.1406400203704834,3.1530799865722656,3.1521999835968018,3.153599977493286', 462, 473),
('admin@parallelize.com', '13:21:05.686', 3, '3.152439832687378,3.148399829864502,3.1620399951934814,3.156359910964966,3.1491599082946777,3.152639865875244,3.1518399715423584,3.1447999477386475,3.1501598358154297,3.1507198810577393,3.1572799682617188', 473, 484),
('admin@parallelize.com', '13:21:05.886', 3, '3.1409199237823486,3.1582398414611816,3.1517999172210693,3.14847993850708,3.150319814682007,3.151439905166626,3.1456398963928223,3.150239944458008,3.140479803085327,3.156440019607544,3.149479866027832', 484, 495),
('admin@parallelize.com', '13:21:06.089', 3, '3.145319938659668,3.1632800102233887,3.154559850692749,3.1497998237609863,3.142400026321411,3.144199848175049,3.1539599895477295,3.153719902038574,3.1590399742126465,3.150559902191162,3.147239923477173', 495, 506),
('admin@parallelize.com', '13:21:06.294', 3, '3.1547999382019043,3.1598799228668213,3.1557199954986572,3.1488800048828125,3.1542398929595947,3.1364400386810303,3.1620399951934814,3.1509599685668945,3.1457598209381104,3.1538000106811523,3.1609599590301514', 506, 517),
('admin@parallelize.com', '13:21:06.473', 3, '3.1460800170898438,3.152599811553955,3.147239923477173,3.157480001449585,3.1491599082946777,3.15339994430542,3.148279905319214,3.1488800048828125,3.145439863204956,3.151599884033203,3.1509199142456055', 517, 528),
('admin@parallelize.com', '13:21:06.655', 3, '3.145479917526245,3.1501200199127197,3.1480798721313477,3.1530799865722656,3.1519999504089355,3.142279863357544,3.1557998657226562,3.1501598358154297,3.149279832839966,3.158399820327759,3.1491599082946777', 528, 539),
('admin@parallelize.com', '13:21:06.854', 3, '3.144519805908203,3.151360034942627,3.152479887008667,3.1583199501037598,3.151319980621338,3.155319929122925,3.153319835662842,3.1590399742126465,3.153559923171997,3.1437599658966064,3.1508398056030273', 539, 550),
('admin@parallelize.com', '13:21:07.033', 3, '3.150599956512451,3.1468799114227295,3.1529200077056885,3.1521599292755127,3.1518800258636475,3.140519857406616,3.1507198810577393,3.1496798992156982,3.152439832687378,3.1539998054504395,3.1521198749542236', 550, 561),
('admin@parallelize.com', '13:21:07.244', 3, '3.150599956512451,3.148239850997925,3.1517598628997803,3.144479990005493,3.151360034942627,3.1469998359680176,3.1478400230407715,3.141359806060791,3.154559850692749,3.149199962615967,3.146279811859131', 561, 572),
('admin@parallelize.com', '13:21:07.449', 3, '3.1446800231933594,3.1477999687194824,3.148399829864502,3.16267991065979,3.147599935531616,3.1448798179626465,3.1429598331451416,3.161679983139038,3.1560399532318115,3.146559953689575,3.1568000316619873', 572, 583),
('admin@parallelize.com', '13:21:07.654', 3, '3.150399923324585,3.1531999111175537,3.152240037918091,3.1507599353790283,3.1481199264526367,3.1507599353790283,3.144479990005493,3.155679941177368,3.1491599082946777,3.160719871520996,3.150519847869873', 583, 594),
('admin@parallelize.com', '13:21:07.853', 3, '3.1559998989105225,3.1450400352478027,3.158759832382202,3.166839838027954,3.1549599170684814,3.1600399017333984,3.159639835357666,3.149279832839966,3.1459200382232666,3.1628799438476562,3.1497600078582764', 594, 605),
('admin@parallelize.com', '13:21:08.056', 3, '3.155479907989502,3.1468398571014404,3.145319938659668,3.1521198749542236,3.158759832382202,3.152639865875244,3.144519805908203,3.159600019454956,3.151639938354492,3.158560037612915,3.1438000202178955', 605, 616);

-- --------------------------------------------------------

--
-- Table structure for table `kernels`
--

CREATE TABLE `kernels` (
  `name` varchar(30) NOT NULL,
  `is_finished` tinyint(1) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `id` int(11) NOT NULL,
  `js_code` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `reward_per_line` double NOT NULL,
  `total_reward` double NOT NULL,
  `description` longtext NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `iteration_count` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kernels`
--

INSERT INTO `kernels` (`name`, `is_finished`, `user_email`, `id`, `js_code`, `reward_per_line`, `total_reward`, `description`, `upload_time`, `iteration_count`) VALUES
('deveres de FAL', 0, 'jaime@email.com', 2, 'return i;', 0.71428571428571, 100, 'buah, pues si yo te contara lo que hace, te quedabas cuajao', '2023-04-06 14:53:50', 2000),
('calcular pi', 1, 'diego@email.com', 3, 'function is_inside_circle(x,y){\n 	return x*x+y*y &lt; 1 ? 1 : 0;         \n}\n\nlet res = 0;\n\nfor(let t = 0; t &lt; 100000; t++){\n   	res += is_inside_circle(Math.random(),Math.random());\n}\n\nreturn res / 25000;', 0.0047619047619048, 10, 'calcula pi con montecarlo', '2023-04-08 11:28:45', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `kernel_comments`
--

CREATE TABLE `kernel_comments` (
  `user_email` varchar(60) NOT NULL,
  `kernel_id` int(11) NOT NULL,
  `comment` varchar(1024) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_report` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kernel_comments`
--

INSERT INTO `kernel_comments` (`user_email`, `kernel_id`, `comment`, `time`, `is_report`) VALUES
('juan@email.com', 2, 'buen kernel\r\n', '2023-04-26 12:30:32', 0),
('juan@email.com', 2, 'faltan los ejercicios de vuelta atras', '2023-04-26 12:36:22', 0),
('juan@email.com', 2, 'a', '2023-04-26 12:42:07', 0),
('juan@email.com', 2, 'no m gusta', '2023-04-26 13:01:41', 0),
('juan@email.com', 2, 'b', '2023-04-27 12:15:42', 0),
('juan@email.com', 2, 'holahola', '2023-04-27 17:48:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `token_transactions`
--

CREATE TABLE `token_transactions` (
  `id` int(11) NOT NULL,
  `transaction_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quantity` double NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `description` varchar(60) NOT NULL DEFAULT 'sin descripcion',
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `token_transactions`
--

INSERT INTO `token_transactions` (`id`, `transaction_timestamp`, `quantity`, `user_email`, `description`, `balance`) VALUES
(23, '2023-04-30 10:29:30', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 0.55),
(24, '2023-04-30 10:29:30', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 1.1),
(25, '2023-04-30 10:29:30', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 1.65),
(26, '2023-04-30 10:29:30', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 2.2),
(27, '2023-04-30 10:29:30', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 2.75),
(28, '2023-04-30 10:29:30', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 3.3),
(29, '2023-04-30 10:32:13', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 3.85),
(30, '2023-04-30 10:32:13', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 4.4),
(31, '2023-04-30 10:32:13', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 4.95),
(32, '2023-04-30 10:32:13', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 5.5),
(33, '2023-04-30 10:32:13', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 6.05),
(34, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 6.6),
(35, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 7.15),
(36, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 7.7),
(37, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 8.25),
(38, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 8.8),
(39, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 9.35),
(40, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 9.9),
(41, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 10.45),
(42, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 11),
(43, '2023-04-30 10:32:14', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 11.55),
(44, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 12.1),
(45, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 12.65),
(46, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 13.2),
(47, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 13.75),
(48, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 14.3),
(49, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 14.85),
(50, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 15.4),
(51, '2023-04-30 10:33:58', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 15.95),
(52, '2023-04-30 10:34:31', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 16.5),
(53, '2023-04-30 10:34:31', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 17.05),
(54, '2023-04-30 10:34:31', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 17.6),
(55, '2023-04-30 10:34:31', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 18.15),
(56, '2023-04-30 10:34:31', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 18.7),
(57, '2023-04-30 10:34:31', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 19.25),
(58, '2023-04-30 10:34:31', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 19.8),
(59, '2023-04-30 10:55:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 20.35),
(60, '2023-04-30 10:55:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 20.9),
(61, '2023-04-30 10:55:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 21.45),
(62, '2023-04-30 10:55:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 22),
(63, '2023-04-30 10:55:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 22.55),
(64, '2023-04-30 10:55:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 23.1),
(65, '2023-04-30 10:55:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 23.65),
(66, '2023-04-30 10:55:43', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 24.2),
(67, '2023-04-30 10:55:43', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 24.75),
(68, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 25.3),
(69, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 25.85),
(70, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 26.4),
(71, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 26.95),
(72, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 27.5),
(73, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 28.05),
(74, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 28.6),
(75, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 29.15),
(76, '2023-04-30 10:56:02', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 29.7),
(77, '2023-04-30 10:56:18', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 30.25),
(78, '2023-04-30 10:56:18', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 30.8),
(79, '2023-04-30 10:56:18', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 31.35),
(80, '2023-04-30 10:56:18', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 31.9),
(81, '2023-04-30 10:56:53', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 32.45),
(82, '2023-04-30 10:56:54', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 33),
(83, '2023-04-30 10:56:54', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 33.55),
(84, '2023-04-30 10:56:54', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 34.1),
(85, '2023-04-30 10:57:16', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 34.65),
(86, '2023-04-30 10:57:16', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 35.2),
(87, '2023-04-30 10:57:16', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 35.75),
(88, '2023-04-30 10:57:16', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 36.3),
(89, '2023-04-30 10:57:16', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 36.85),
(90, '2023-04-30 10:57:16', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 37.4),
(91, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 37.95),
(92, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 38.5),
(93, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 39.05),
(94, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 39.6),
(95, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 40.15),
(96, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 40.7),
(97, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 41.25),
(98, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 41.8),
(99, '2023-04-30 10:57:34', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 42.35),
(100, '2023-04-30 10:59:22', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 42.9),
(101, '2023-04-30 10:59:23', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 43.45),
(102, '2023-04-30 10:59:23', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 44),
(103, '2023-04-30 10:59:23', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 44.55),
(104, '2023-04-30 10:59:41', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 45.1),
(105, '2023-04-30 10:59:41', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 45.65),
(106, '2023-04-30 10:59:41', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 46.2),
(107, '2023-04-30 10:59:41', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 46.75),
(108, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 47.3),
(109, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 47.85),
(110, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 48.4),
(111, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 48.95),
(112, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 49.5),
(113, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 50.05),
(114, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 50.6),
(115, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 51.15),
(116, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 51.7),
(117, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 52.25),
(118, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 52.8),
(119, '2023-04-30 10:59:42', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 53.35),
(120, '2023-04-30 10:59:43', 0.55, 'admin@parallelize.com', 'recompensa por trabajo en el kernel deveres de FAL', 53.9),
(121, '2023-04-30 11:00:28', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 55),
(122, '2023-04-30 11:00:28', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 56.1),
(123, '2023-04-30 11:00:29', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 57.2),
(124, '2023-04-30 11:00:29', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 58.3),
(125, '2023-04-30 11:00:29', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 59.4),
(126, '2023-04-30 11:00:29', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 60.5),
(127, '2023-04-30 11:00:29', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 61.6),
(128, '2023-04-30 11:00:30', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 62.7),
(129, '2023-04-30 11:00:30', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 63.8),
(130, '2023-04-30 11:00:30', 0.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 63.9),
(131, '2023-04-30 11:08:32', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 65),
(132, '2023-04-30 11:08:33', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 66.1),
(133, '2023-04-30 11:08:33', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 67.2),
(134, '2023-04-30 11:08:33', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 68.3),
(135, '2023-04-30 11:08:34', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 69.4),
(136, '2023-04-30 11:08:34', 1.1, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.5),
(137, '2023-04-30 11:10:04', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50011),
(138, '2023-04-30 11:10:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50022),
(139, '2023-04-30 11:10:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50033),
(140, '2023-04-30 11:10:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50044),
(141, '2023-04-30 11:10:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50055),
(142, '2023-04-30 11:10:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50066),
(143, '2023-04-30 11:10:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50077),
(144, '2023-04-30 11:19:44', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50088),
(145, '2023-04-30 11:19:44', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50099),
(146, '2023-04-30 11:19:44', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.5011),
(147, '2023-04-30 11:19:44', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50121),
(148, '2023-04-30 11:20:18', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50132),
(149, '2023-04-30 11:20:19', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50143),
(150, '2023-04-30 11:20:19', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50154),
(151, '2023-04-30 11:20:19', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50165),
(152, '2023-04-30 11:20:19', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50176),
(153, '2023-04-30 11:21:01', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50187),
(154, '2023-04-30 11:21:02', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50198),
(155, '2023-04-30 11:21:02', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50209),
(156, '2023-04-30 11:21:02', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.5022),
(157, '2023-04-30 11:21:02', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50231),
(158, '2023-04-30 11:21:02', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50242),
(159, '2023-04-30 11:21:02', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50253),
(160, '2023-04-30 11:21:03', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50264),
(161, '2023-04-30 11:21:03', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50275),
(162, '2023-04-30 11:21:03', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50286),
(163, '2023-04-30 11:21:03', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50297),
(164, '2023-04-30 11:21:03', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50308),
(165, '2023-04-30 11:21:04', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50319),
(166, '2023-04-30 11:21:04', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.5033),
(167, '2023-04-30 11:21:04', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50341),
(168, '2023-04-30 11:21:04', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50352),
(169, '2023-04-30 11:21:04', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50363),
(170, '2023-04-30 11:21:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50374),
(171, '2023-04-30 11:21:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50385),
(172, '2023-04-30 11:21:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50396),
(173, '2023-04-30 11:21:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50407),
(174, '2023-04-30 11:21:05', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50418),
(175, '2023-04-30 11:21:06', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50429),
(176, '2023-04-30 11:21:06', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.5044),
(177, '2023-04-30 11:21:06', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50451),
(178, '2023-04-30 11:21:06', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50462),
(179, '2023-04-30 11:21:06', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50473),
(180, '2023-04-30 11:21:07', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50484),
(181, '2023-04-30 11:21:07', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50495),
(182, '2023-04-30 11:21:07', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50506),
(183, '2023-04-30 11:21:07', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50517),
(184, '2023-04-30 11:21:07', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50528),
(185, '2023-04-30 11:21:08', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.50539),
(186, '2023-04-30 11:21:08', 0.00011, 'admin@parallelize.com', 'recompensa por trabajo en el kernel calcular pi', 70.5055);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `millis_crunched` int(11) NOT NULL DEFAULT 0,
  `ranking` int(11) NOT NULL DEFAULT -1,
  `tokens` double NOT NULL DEFAULT 0,
  `last_active` date NOT NULL DEFAULT current_timestamp(),
  `blocked` tinyint(1) NOT NULL DEFAULT 0,
  `user_name` varchar(20) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_email`, `user_password`, `millis_crunched`, `ranking`, `tokens`, `last_active`, `blocked`, `user_name`, `is_admin`) VALUES
('admin@parallelize.com', '$2y$10$zQ06ag.N33pYnOk9Q.SVpOe90sKAjviDXIf5ZBT5zzJpXgtcYr2Mi', 5443, -1, 70.5055, '0000-00-00', 0, 'admin', 1),
('borjal@ucm.es', '$2y$10$Grc.4A8YQQFlmf6.xsPSsulr9KnJG8Iuu4UlGs0Wd21AGeSBqtuFy', 0, -1, 0, '2023-04-12', 0, 'Borja Lopez', 0),
('diego@email.com', '$2y$10$3TxN6531suwgIbfla70l3ujKv5XAgCSuNkBq7fJDGoecWGClaL4ZW', 0, -1, 0, '2023-04-06', 0, 'Diego Quiroga', 0),
('jaime@email.com', '$2y$10$rlrTSZHZoeyQrnQuxfrWSeoBaV8jmvcKvq4bxuLKD0xCJ/NKRSHjC', 0, -1, 0, '2023-04-06', 0, 'Jaime Gonzalez', 0),
('jaimev@ucm.es', '$2y$10$8lC/xKDpJeoiZs/oheFy.e.722qgLOZdvCVGU5rUslHvJvgWwasxe', 0, -1, 0, '2023-04-12', 0, 'Jaime Vazquez', 0),
('juan@email.com', '$2y$10$NvppguKXJyqI929HtOftLuPucBoS9LJL9ueMrbBarJL1QmpnipJm2', 0, -1, 0, '2023-04-06', 0, 'Juan Jerez', 0),
('juant@ucm.es', '$2y$10$o6wNhE2oqQnVxi9DRXefKe6sqk7SxggktnItTRmDasCO9TprmTYry', 0, -1, 0, '2023-04-12', 0, 'Juan Trillo', 0),
('laurar@ucm.es', '$2y$10$DIBDqzkXUj8/XtGqF1uWK.HfP8Qog7yKI7V5KwdK3jp3qIVPAnE/y', 0, -1, 0, '2023-04-12', 0, 'Laura Rodriguez', 0),
('luciam@ucm.es', '$2y$10$AbN5QqbgRYi42fKchanoGOmWLhVVANjSkFWRhrqu9BHkMylxml4qG', 0, -1, 0, '2023-04-12', 0, 'Lucia Marquez', 0),
('luz@ucm.es', '$2y$10$mBDcnGZMXDN0en/9v0wPhO8x/n64OWvMoFHgvjDQgoq2GuCku7vSO', 0, -1, 0, '2023-04-12', 0, 'Luz Rojas', 0),
('marcoj@ucm.es', '$2y$10$KJV3RNKeCnfTfEo.Rx7V5Ox6Pi8jn61d4jCxj6VAVZtzhmQLTGXMy', 0, -1, 0, '2023-04-12', 0, 'Marco Jim&eacute;nez', 0),
('marcos@email.com', '$2y$10$Yi.nxQT0Boj3jWbMjgd66.bSm3hZzpmbfxP1gHQKUerUKQ0ZLYFd2', 0, -1, 0, '2023-04-06', 0, 'Marcos Alonso', 0),
('martas@ucm.es', '$2y$10$VgRlv21OqmXycOsHIqehpuZIyp0aY2okfmrC168INEof1edOoR7YO', 0, -1, 0, '2023-04-12', 0, 'Marta Sillero', 0),
('pablop@ucm.es', '$2y$10$6VKBzixsytnVpbBqldfWlOmjHU8wVszs4oMwTaKRh5.Os7zuczphC', 0, -1, 0, '2023-04-12', 0, 'Pablo Perez', 0),
('susanao@ucm.es', '$2y$10$DYmCcgDDD.4opmwWHnqeCeDzT6yvwdIjCrgvZoae3qoaru.gh1pWq', 0, -1, 0, '2023-04-12', 0, 'Susana Bueno', 0),
('victorm@ucm.es', '$2y$10$AN67M/.Z0zwh6ZZpGPR69u4iwyo5K4BAKOrB4SSRWkHNyTbKY4QRe', 0, -1, 0, '2023-04-12', 0, 'Victor Martin', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_ranking`
-- (See below for the actual view)
--
CREATE TABLE `user_ranking` (
`user_email` varchar(60)
,`millis_crunched` int(11)
,`ranking` bigint(21)
);

-- --------------------------------------------------------

--
-- Structure for view `user_ranking`
--
DROP TABLE IF EXISTS `user_ranking`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_ranking`  AS SELECT `users`.`user_email` AS `user_email`, `users`.`millis_crunched` AS `millis_crunched`, row_number() over ( order by `users`.`millis_crunched` desc) AS `ranking` FROM `users``users`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `execution_segments`
--
ALTER TABLE `execution_segments`
  ADD PRIMARY KEY (`kernel_id`,`iteration_start`),
  ADD KEY `user_email_fk_ex_reg` (`user_email`);

--
-- Indexes for table `kernels`
--
ALTER TABLE `kernels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_email_fk` (`user_email`);

--
-- Indexes for table `kernel_comments`
--
ALTER TABLE `kernel_comments`
  ADD PRIMARY KEY (`user_email`,`kernel_id`,`time`);

--
-- Indexes for table `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_fk` (`user_email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kernels`
--
ALTER TABLE `kernels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token_transactions`
--
ALTER TABLE `token_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `execution_segments`
--
ALTER TABLE `execution_segments`
  ADD CONSTRAINT `kernel_id_fk_ex_seg` FOREIGN KEY (`kernel_id`) REFERENCES `kernels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_email_fk_ex_seg` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kernels`
--
ALTER TABLE `kernels`
  ADD CONSTRAINT `user_email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `token_transactions`
--
ALTER TABLE `token_transactions`
  ADD CONSTRAINT `email_fk` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

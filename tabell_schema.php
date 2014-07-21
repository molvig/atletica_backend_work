
CREATE TABLE IF NOT EXISTS `scehma` (
  `schemaID` int(10) NOT NULL AUTO_INCREMENT,
  `dag` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `starttid` time NOT NULL,
  `sluttid` time NOT NULL,
  `instname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `antalplatser` int(3) NOT NULL,
  `schematyp` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `information` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `installt` int(2) NOT NULL,
  `datum` date NOT NULL,
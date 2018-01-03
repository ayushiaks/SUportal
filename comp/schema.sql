CREATE DATABASE IF NOT EXISTS `cng`;

CREATE TABLE IF NOT EXISTS `grievance_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40),
  `id_no` varchar(40),
  `email` varchar(40),
  `phno` varchar(40),
  `rmno` varchar(40),
  `gr` varchar(40),
  `gr_others` varchar(40),
  `gr_to` varchar(40),
  `gr_to_others` varchar(40),
  `message` text,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `complaint_records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40),
  `id_no` varchar(40),
  `email` varchar(40),
  `phno` varchar(40),
  `rmno` varchar(40),
  `compon` varchar(40),
  `message` text,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

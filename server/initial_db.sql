-- DECKS - Databse
CREATE DATABASE IF NOT EXISTS `dds`;
USE `dds`;

/*
Table Name: deck
1. id        int    PK
2. name      vc 300 
3. uuid      vc 300 K (index)
4. deck_tar  BLOB
*/
DROP TABLE IF EXISTS `deck`;
CREATE TABLE `deck` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `uuid` varchar(300) NOT NULL,
  `data` LONGBLOB,
  PRIMARY KEY (`id`),
  KEY (`uuid`)
) ENGINE=InnoDB;

/*
Table Name: group_name
1. id         int    PK
2. name       vc 300
*/
DROP TABLE IF EXISTS `group_name`;
CREATE TABLE `group_name` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


/*
Table Name: deck_user
1. did        int  PK  FK
2. ldap_uid   int  PK
*/
DROP TABLE IF EXISTS `deck_user`;
CREATE TABLE `deck_user` (
  `did` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  PRIMARY KEY (`did`,`uid`),
  CONSTRAINT `fk_did_deck_user` FOREIGN KEY (`did`) REFERENCES `deck` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

/*
Table Name: machine_location
1. machine_fqdn vc 300  PK
2. location     vc 300
*/
DROP TABLE IF EXISTS `machine_location`;
CREATE TABLE `machine_location` (
  `machine_fqdn` varchar(300) NOT NULL,
  `location` varchar(300) NOT NULL,
  PRIMARY KEY (`machine_fqdn`)
) ENGINE=InnoDB;

/*.
Table Name: machine_deck_assignment
1. machine_fqdn   vc 300  FK
2. uuid           vc 300  FK
*/
DROP TABLE IF EXISTS `machine_deck_assignment`;
CREATE TABLE `machine_deck_assignment` (
  `uuid` varchar(300) NOT NULL,
  `machine_fqdn` varchar(300) NOT NULL,
  PRIMARY KEY (`uuid`,`machine_fqdn`),
  CONSTRAINT `fk_machine_fqdn_machine_deck_assignment` FOREIGN KEY (`machine_fqdn`) REFERENCES `machine_location` (`machine_fqdn`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_uuid_machine_deck_assignment` FOREIGN KEY (`uuid`) REFERENCES `deck` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

/*
Table Name: deck_group
1. did        int  FK
2. gid        int  FK
*/
DROP TABLE IF EXISTS `deck_group`;
CREATE TABLE `deck_group` (
  `did` int(255) NOT NULL,
  `gid` int(255) NOT NULL,
  CONSTRAINT `fk_did_deck_group` FOREIGN KEY (`did`) REFERENCES `deck` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_gid_deck_group` FOREIGN KEY (`gid`) REFERENCES `group_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

/*
Table Name: group_member
1. gid        int  PK FK
2. ldap_uid   int  PK
*/
DROP TABLE IF EXISTS `group_member`;
CREATE TABLE `group_member` (
  `gid` int(255) NOT NULL,
  `uid` int(255) NOT NULL,
  PRIMARY KEY (`gid`,`uid`),
  CONSTRAINT `fk_gid_group_member` FOREIGN KEY (`gid`) REFERENCES `group_name` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

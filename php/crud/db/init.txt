create database crud_tutorial;

CREATE TABLE  `customers` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 100 ) NOT NULL ,
`email` VARCHAR( 100 ) NOT NULL ,
`mobile` VARCHAR( 100 ) NOT NULL
) ENGINE = INNODB;

- See more at: http://www.startutorial.com/articles/view/php-crud-tutorial-part-1#sthash.eA0PUay5.dpuf
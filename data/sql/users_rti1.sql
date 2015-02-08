Drop table IF EXISTS users_rti1;
create table users_rti1 (
    id INT NOT NULL AUTO_INCREMENT,
	first_name VARCHAR(50),
	last_name VARCHAR(50),
	email VARCHAR(50),
	password VARCHAR(50),
    PRIMARY KEY ( `id` )
);
insert into users_rti1 (id, first_name, last_name, email, password) values (1, 'Joyce', 'Gibson', 'jgibson0@oracle.com', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (2, 'Judith', 'Banks', 'jbanks1@oracle.com', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (3, 'Heather', 'Hansen', 'hhansen2@mozilla.org', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (4, 'Janet', 'Day', 'jday3@phpbb.com', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (5, 'Brian', 'Hunt', 'bhunt4@1688.com', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (6, 'Timothy', 'Ford', 'tford5@businesswire.com', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (7, 'George', 'Hill', 'ghill6@umn.edu', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (8, 'Rose', 'Willis', 'rwillis7@epa.gov', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (9, 'Sandra', 'Morris', 'smorris8@usda.gov', 'e10adc3949ba59abbe56e057f20f883e');
insert into users_rti1 (id, first_name, last_name, email, password) values (10, 'Jack', 'Henderson', 'jhenderson9@acquirethisname.com', 'e10adc3949ba59abbe56e057f20f883e');

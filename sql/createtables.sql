CREATE TABLE test_questions(

	qID int(4) not null,
	qText varchar(250) not null,
	ls_code char(6) not null,
	PRIMARY KEY(qID),
	FOREIGN KEY(ls_code) REFERENCES faa(ls_code)
	
);

CREATE TABLE test_answers(

	answer char(1) not null,
	aText varchar(250) not null,
	bText varchar (250) not null,
	cText varchar (250) not null,
	qID int(4) not null,
	FOREIGN KEY (qID) REFERENCES test_questions(qID)
	
);

CREATE TABLE faa(
	ls_code char(6) not null,
	descrip varchar(100) not null,
	subj varchar(30) not null,
	topic varchar(30) not null,
	subtop varchar(30)

);


CREATE TABLE images
(
	img_id int not null auto_increment,
    img_name varchar(50),
    img blob,
    PRIMARY KEY(img_id)
);

CREATE TABLE notam
(
	notam_id char(6) not null,
	source_id char(1) not null,
	account_id char(3) not null,
	notam_part int(2) not null,
	cns_location_id char(3) not null,
	icao_id char(4) not null,
	icao_name varchar(30) not null,
	total_parts int(2) not null,
	notam_effective_dtg int(12) not null,
	notam_expire_dtg int(12) not null,
	notam_delete_dtg int(12) not null,
	notam_lastmod_dtg int(12) not null,
	notam_text varchar(150) not null,
	notam_report varchar(250) not null,
	notam_qcode char(5) not null,
	PRIMARY KEY(notam_id)
);

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


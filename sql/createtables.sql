CREATE TABLE test_questions
(
qID int(4),
qText varchar(250)
);

CREATE TABLE test_answers
(
answer char(1),
aText varchar(250),
bText varchar(250),
cText varchar(250),
qID int(4),
FOREIGN KEY (qID) REFERENCES test_questions(qID)
);

CREATE TABLE images
(
	img_id int not null auto_increment,
    img_name varchar(50),
    img blob,
    PRIMARY KEY(img_id)
);

CREATE TABLE faa
(
	ls_code char(6) not null,
    descrip varchar(100) not null,
    subj varchar(30) not null,
    topic varchar(30) not null,
    subtop varchar(30)
    
);

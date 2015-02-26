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

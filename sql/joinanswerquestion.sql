SELECT q.qText, a.aText, a.bText, a.cText, a.answer
FROM test_answers as a, test_questions as q
WHERE q.qID = a.qID
;

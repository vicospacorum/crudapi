INSERT INTO tutorias (id, Tutor, Aluno, Data)
VALUES ('vghyujm098', 'Maria', 'Joana', '2020-01-01 10:10:10'); 

UPDATE tutorias 
    SET Data = '2020-01-01 10:10:10'
    WHERE Aluno = 'Joana';
--create student table
CREATE TABLE students(

    id INT PRIMARY KEY,

    name VARCHAR(100),

    phone VARCHAR(20),

    department VARCHAR(50),

    semester VARCHAR(20),

    session VARCHAR(20)

);

--Create Subjects Table

CREATE TABLE subjects(

    id INT PRIMARY KEY,

    subject_name VARCHAR(100),

    subject_code VARCHAR(50),

    credit INT

);
--Create Marks Table

CREATE TABLE marks(

    id INT PRIMARY KEY AUTO_INCREMENT,

    student_id INT,

    subject_id INT,

    mark INT,

    FOREIGN KEY(student_id)
    REFERENCES students(id),

    FOREIGN KEY(subject_id)
    REFERENCES subjects(id)

);
--Insert Student Data

INSERT INTO students(id,name,phone,department,semester,session)

VALUES

(101,'Nilay','01711111111','CSE','Spring','2024-25'),

(102,'Rahim','01822222222','CSE','Fall','2024-25'),

(103,'Karim','01933333333','EEE','Spring','2024-25');

--Insert Subject Data
INSERT INTO subjects(id,subject_name,subject_code,credit)

VALUES

(1,'Database','CSE221',3),

(2,'Math','MAT101',3),

(3,'English','ENG101',2);

--insert marks data

INSERT INTO marks(student_id,subject_id,mark)

VALUES

(101,1,85),
(101,2,90),
(101,3,78),

(102,1,60),
(102,2,70),
(102,3,65),

(103,1,40),
(103,2,35),
(103,3,50);


//check_data

SELECT * FROM students;
SELECT * FROM subjects;
SELECT * FROM marks;

/main result query 


SELECT students.name,
       subjects.subject_name,
       marks.mark
FROM marks
JOIN students
ON marks.student_id = students.id
JOIN subjects
ON marks.subject_id = subjects.id;


//average marks
SELECT AVG(mark) AS Average_Mark
FROM marks;

//highest marks
SELECT MAX(mark) AS Highest_Mark
FROM marks
//lowest marks
SELECT MIN(mark) AS Lowest_Mark
FROM marks;

//Failed Students (Subquery)
SELECT name
FROM students
WHERE id IN(
    SELECT student_id
    FROM marks
    WHERE mark < 40
);
//Total_Students
//SELECT COUNT(*) AS Total_Students
FROM students;
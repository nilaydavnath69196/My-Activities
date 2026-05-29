--create student table
CREATE TABLE students(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    department VARCHAR(50),
    semester VARCHAR(20)
);

--Create Subjects Table

CREATE TABLE subjects(
    id INT PRIMARY KEY AUTO_INCREMENT,
    subject_name VARCHAR(100),
    credit INT
);

--Create Marks Table

CREATE TABLE marks(
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    subject_id INT,
    mark INT,
    
    FOREIGN KEY(student_id) REFERENCES students(id),
    FOREIGN KEY(subject_id) REFERENCES subjects(id)
);

--Insert Student Data

INSERT INTO students(name, department, semester)
VALUES
('Nilay', 'CSE', '5th'),
('Rahim', 'CSE', '5th'),
('Karim', 'EEE', '5th');

--Insert Subject Data

INSERT INTO subjects(subject_name, credit)
VALUES
('Database', 3),
('Math', 3),
('English', 2);
CREATE TABLE Students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100) UNIQUE,
    date_of_birth DATE,
    gender ENUM('Male', 'Female', 'Other'),
    major VARCHAR(50),
    enrollment_year YEAR
);

CREATE TABLE Courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(100),
    course_code VARCHAR(10) UNIQUE,
    credits INT,
    department VARCHAR(50)
);

CREATE TABLE Instructors (
    instructor_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    hire_date DATE,
    department VARCHAR(50)
);

CREATE TABLE Enrollments (
    enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    grade CHAR(1),
    FOREIGN KEY (student_id) REFERENCES Students(student_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

CREATE TABLE CourseAssignments (
    assignment_id INT AUTO_INCREMENT PRIMARY KEY,
    instructor_id INT,
    course_id INT,
    semester VARCHAR(10),
    year YEAR,
    FOREIGN KEY (instructor_id) REFERENCES Instructors(instructor_id),
    FOREIGN KEY (course_id) REFERENCES Courses(course_id)
);

-- Insert Students
INSERT INTO Students (first_name, last_name, email, date_of_birth, gender, major, enrollment_year) VALUES
('Alice', 'Smith', 'alice.smith@example.com', '2000-05-15', 'Female', 'Computer Science', 2022),
('Bob', 'Johnson', 'bob.johnson@example.com', '1999-09-20', 'Male', 'Mathematics', 2021),
('Charlie', 'Brown', 'charlie.brown@example.com', '2001-12-10', 'Male', 'Physics', 2023),
('Daisy', 'Miller', 'daisy.miller@example.com', '2000-07-25', 'Female', 'Biology', 2022),
('Ethan', 'Davis', 'ethan.davis@example.com', '1998-11-30', 'Male', 'History', 2021),
('Fiona', 'Garcia', 'fiona.garcia@example.com', '2002-03-05', 'Female', 'Art', 2023),
('George', 'Martinez', 'george.martinez@example.com', '2001-01-18', 'Male', 'Engineering', 2022),
('Hannah', 'Lopez', 'hannah.lopez@example.com', '1999-05-24', 'Female', 'Business', 2021),
('Ivy', 'Wilson', 'ivy.wilson@example.com', '2000-08-30', 'Female', 'Mathematics', 2022),
('Jake', 'Anderson', 'jake.anderson@example.com', '2001-04-15', 'Male', 'Computer Science', 2023);

-- Insert Courses
INSERT INTO Courses (course_name, course_code, credits, department) VALUES
('Intro to Computer Science', 'CS101', 3, 'Computer Science'),
('Calculus I', 'MATH101', 4, 'Mathematics'),
('Physics I', 'PHY101', 4, 'Physics'),
('Biology 101', 'BIO101', 3, 'Biology'),
('Art History', 'ART101', 3, 'Art');

-- Insert Instructors
INSERT INTO Instructors (first_name, last_name, email, hire_date, department) VALUES
('Dr. Alice', 'Taylor', 'alice.taylor@example.com', '2015-08-01', 'Computer Science'),
('Prof. Bob', 'Clark', 'bob.clark@example.com', '2018-06-15', 'Mathematics'),
('Dr. Charlie', 'Wright', 'charlie.wright@example.com', '2017-01-20', 'Physics'),
('Prof. Daisy', 'Evans', 'daisy.evans@example.com', '2016-09-05', 'Biology'),
('Dr. Ethan', 'Green', 'ethan.green@example.com', '2019-03-10', 'Art');

-- Assign Courses to Instructors
INSERT INTO CourseAssignments (instructor_id, course_id, semester, year) VALUES
(1, 1, 'Fall', 2023),
(2, 2, 'Fall', 2023),
(3, 3, 'Fall', 2023),
(4, 4, 'Fall', 2023),
(5, 5, 'Fall', 2023);

-- Enroll Students in Courses
INSERT INTO Enrollments (student_id, course_id, grade) VALUES
(1, 1, 'A'),
(1, 2, 'B'),
(2, 2, 'A'),
(2, 3, 'C'),
(3, 3, 'B'),
(3, 1, 'A'),
(4, 4, 'B'),
(4, 1, 'C'),
(5, 2, 'B'),
(5, 4, 'A'),
(6, 5, 'A'),
(7, 1, 'C'),
(8, 2, 'B'),
(9, 3, 'A'),
(10, 1, 'B');



SELECT * FROM Students;

SELECT COUNT(*) FROM Courses;

SELECT S.first_name, S.last_name FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
JOIN Courses C ON E.course_id = C.course_id
WHERE C.course_code = 'CS101';

SELECT email FROM Instructors WHERE department = 'Mathematics';


SELECT C.course_name, COUNT(E.student_id) AS num_students
FROM Courses C
LEFT JOIN Enrollments E ON C.course_id = E.course_id
GROUP BY C.course_id;


SELECT DISTINCT S.first_name, S.last_name FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
WHERE E.grade = 'A';


SELECT C.course_name, I.first_name, I.last_name
FROM Courses C
JOIN CourseAssignments CA ON C.course_id = CA.course_id
JOIN Instructors I ON CA.instructor_id = I.instructor_id
WHERE CA.semester = 'Fall' AND CA.year = 2023;


SELECT AVG(CASE E.grade 
           WHEN 'A' THEN 4 
           WHEN 'B' THEN 3 
           WHEN 'C' THEN 2 
           WHEN 'D' THEN 1 
           ELSE 0 END) AS average_grade
FROM Enrollments E
JOIN Courses C ON E.course_id = C.course_id
WHERE C.course_code = 'CS101';


SELECT S.first_name, S.last_name
FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
JOIN Courses C ON E.course_id = C.course_id
WHERE C.semester = 'Fall' AND C.year = 2023
GROUP BY S.student_id
HAVING COUNT(E.course_id) > 3;


SELECT S.first_name, S.last_name
FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
WHERE E.grade IS NULL;


SELECT S.first_name, S.last_name, AVG(CASE E.grade 
          WHEN 'A' THEN 4 
          WHEN 'B' THEN 3 
          WHEN 'C' THEN 2 
          WHEN 'D' THEN 1 
          ELSE 0 END) AS average_grade
FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
GROUP BY S.student_id
ORDER BY average_grade DESC
LIMIT 1;


SELECT C.department, COUNT(C.course_id) AS num_courses
FROM Courses C
JOIN CourseAssignments CA ON C.course_id = CA.course_id
WHERE CA.year = 2023
GROUP BY C.department
ORDER BY num_courses DESC
LIMIT 1;



SELECT C.course_name
FROM Courses C
LEFT JOIN Enrollments E ON C.course_id = E.course_id
WHERE E.enrollment_id IS NULL;


CREATE FUNCTION CalculateAge(birthdate DATE)
RETURNS INT DETERMINISTIC
BEGIN
    RETURN YEAR(CURDATE()) - YEAR(birthdate) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(birthdate, '%m%d'));
END;


DELIMITER //
CREATE PROCEDURE EnrollStudent(IN studentId INT, IN courseId INT)
BEGIN
    DECLARE course_capacity INT;

    -- Assuming a predefined capacity for simplicity
    SET course_capacity = 30;

    IF (SELECT COUNT(*) FROM Enrollments WHERE course_id = courseId) < course_capacity THEN
        INSERT INTO Enrollments (student_id, course_id) VALUES (studentId, courseId);
    ELSE
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Course capacity exceeded';
    END IF;
END //
DELIMITER ;


SELECT C.department, AVG(CASE E.grade 
           WHEN 'A' THEN 4 
           WHEN 'B' THEN 3 
           WHEN 'C' THEN 2 
           WHEN 'D' THEN 1 
           ELSE 0 END) AS average_grade
FROM Courses C
JOIN Enrollments E ON C.course_id = E.course_id
GROUP BY C.department;


START TRANSACTION;

DECLARE course_capacity INT;

SET course_capacity = 30;

IF (SELECT COUNT(*) FROM Enrollments WHERE course_id = @courseId) < course_capacity THEN
    INSERT INTO Enrollments (student_id, course_id) VALUES (@studentId, @courseId);
ELSE
    ROLLBACK;
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Course capacity exceeded';
END IF;

COMMIT;



CREATE INDEX idx_course_code ON Courses(course_code);


EXPLAIN SELECT S.first_name, S.last_name FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
WHERE E.course_id = 1;


SELECT S.first_name, S.last_name, C.course_name
FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
JOIN Courses C ON E.course_id = C.course_id;


SELECT I.first_name, I.last_name, C.course_name
FROM Instructors I
LEFT JOIN CourseAssignments CA ON I.instructor_id = CA.instructor_id
LEFT JOIN Courses C ON CA.course_id = C.course_id;


SELECT first_name, last_name, 'Student' AS role FROM Students
UNION
SELECT first_name, last_name, 'Instructor' AS role FROM Instructors;


SELECT S.first_name, S.last_name, S.email, S.major, 
       C.course_name, I.first_name AS instructor_first, I.last_name AS instructor_last, 
       E.grade, COALESCE(SUM(C.credits), 0) AS total_credits
FROM Students S
JOIN Enrollments E ON S.student_id = E.student_id
JOIN Courses C ON E.course_id = C.course_id
JOIN CourseAssignments CA ON C.course_id = CA.course_id
JOIN Instructors I ON CA.instructor_id = I.instructor_id
GROUP BY S.student_id, C.course_id;




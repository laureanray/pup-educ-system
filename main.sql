DROP DATABASE colc_pup;
CREATE DATABASE IF NOT EXISTS colc_pup;
USE colc_pup;
CREATE TABLE IF NOT EXISTS administrators (
        id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL ,
        password VARCHAR(255) NOT NULL,
        last_access VARCHAR(255),
        UNIQUE(username)
);


INSERT INTO administrators (`name`, `username`, `password`)
VALUES 
('Laurean Ray Bahala', 'laureanray', 'password123'),
('Default Administrator', 'default__admin', 'default__password');


CREATE TABLE IF NOT EXISTS faculties (
        id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        last_name VARCHAR(255) NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        middle_name VARCHAR(255) NOT NULL,
        icon_url VARCHAR(255),
        email VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL ,
        password VARCHAR(255) NOT NULL,
        last_access VARCHAR(255),
        UNIQUE(username),
        UNIQUE(icon_url),
        UNIQUE(email)
);

INSERT INTO faculties (`last_name`, `first_name`, `middle_name`, 
                        `email`, `username`, `password`)
VALUES 
('Bahala', 'Laurean Ray', 'Salvan', 'laureanraybahala@gmail.com', 'laureanray', '5f4dcc3b5aa765d61d8327deb882cf99');

CREATE TABLE IF NOT EXISTS enrollees (
        id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        last_name VARCHAR(255) NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        middle_name VARCHAR(255) NOT NULL,
        nickname VARCHAR(255) NOT NULL,
        address VARCHAR(255) NOT NULL,
        date_of_birth VARCHAR(255) NOT NULL,
        age VARCHAR(255) NOT NULL,
        gender VARCHAR(255) NOT NULL,
        mothers_name VARCHAR(255) NOT NULL,
        mothers_contact VARCHAR(255) NOT NULL,
        mothers_occupation VARCHAR(255) NOT NULL,
        fathers_name VARCHAR(255) NOT NULL,
        fathers_contact VARCHAR(255) NOT NULL,
        fathers_occupation VARCHAR(255) NOT NULL,
        number_of_siblings VARCHAR(255) NOT NULL,
        is_enrolled VARCHAR(255) NOT NULL DEFAULT "FALSE"
);

CREATE TABLE IF NOT EXISTS students (
        id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
        last_name VARCHAR(255) NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        middle_name VARCHAR(255) NOT NULL,
        nickname VARCHAR(255) NOT NULL,
        address VARCHAR(255) NOT NULL,
        date_of_birth VARCHAR(255) NOT NULL,
        age VARCHAR(255) NOT NULL,
        gender VARCHAR(255) NOT NULL,
        mothers_name VARCHAR(255) NOT NULL,
        mothers_contact VARCHAR(255) NOT NULL,
        mothers_occupation VARCHAR(255) NOT NULL,
        fathers_name VARCHAR(255) NOT NULL,
        fathers_contact VARCHAR(255) NOT NULL,
        fathers_occupation VARCHAR(255) NOT NULL,
        number_of_siblings VARCHAR(255) NOT NULL,
        username VARCHAR(255) NOT NULL,
        password VARCHAR (255) NOT NULL,
        date_enrolled VARCHAR(32) NOT NULL,
        UNIQUE(username)
);

CREATE TABLE IF NOT EXISTS logs (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id VARCHAR (255) NOT NULL,
    time_in VARCHAR (255) NOT NULL,
    time_out VARCHAR (255) NOT NULL
);

INSERT INTO logs 
(`user_id`, `time_in`, `time_out`)
VALUES
('1', '8:00 AM', '12:00 PM');

CREATE TABLE IF NOT EXISTS subjects (
     id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
     title VARCHAR (255) NOT NULL,
     schedule VARCHAR (255) NOT NULL,
     faculty_id VARCHAR (255) NOT NULL
);

INSERT INTO subjects
(`title`, `schedule`, `faculty_id`)
VALUES
('Mathematics', 'M/2:00 PM - 3:00 PM', '1');

CREATE TABLE IF NOT EXISTS grades (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    subject_id INT (10) NOT NULL,
    grade FLOAT NOT NULL,
    student_id INT (10) NOT NULL
);

INSERT INTO grades
(`subject_id`, `grade`, `student_id`)
VALUES
('1', '98.74', '1');


CREATE TABLE IF NOT EXISTS announcements (
    id INT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content VARCHAR(255) NOT NULL,
    author_id VARCHAR(255) NOT NULL,
    updated VARCHAR(255) NOT NULL,
);


INSERT INTO announcements
(`title`, `content`, `author_id`, `updated`)
VALUES
('Hello World', '<p> This is an announcement </p> ', '1', 'Today');

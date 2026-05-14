create database portfolio_db;
use portfolio_db;

CREATE TABLE user_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    title VARCHAR(100),
    bio TEXT,
    gpa VARCHAR(10),
    university VARCHAR(255),
    expected_grad VARCHAR(50)
);


INSERT INTO user_info (name, title, bio, gpa, university, expected_grad) VALUES 
('Sulaiman', 'Software Engineer', " I'm a passionate Web Developer with experience in creating dynamic and responsive websites, 
         As a Software Engineer, I possess strong technical skills and a deep interest in innovative technology.", '3.6 / 4.0', ' University of Hail - 
                     College of Computer Science and Engineering', 'Aug 2022 - May 2027 Expected');


CREATE TABLE skills (
    id INT AUTO_INCREMENT PRIMARY KEY,
    skill_name VARCHAR(100),
    description TEXT,
    icon VARCHAR(50)
);

INSERT INTO skills (skill_name, description, icon) VALUES 
('Software Engineering', 'Focusing on the complete SDLC (Software Development Life Cycle) to deliver 
                  high-quality solutions, Software Architecture & design, 
                  and integrating efficient Project Management practices to
                   ensure scalable architecture and timely delivery.', 'bx-cog'),
('Full Stack Development', 'Developing end-to-end web applications by crafting interactive user 
                  interfaces with HTML, CSS, and JavaScript, while building robust server-side
                   logic and database structures using PHP and MySQL.', 'bx-code'),
('IT & Infrastructure', 'Providing technical support for Operating Systems and managing Network infrastructure,
                   including router configuration, troubleshooting connectivity issues.', 'bx-server');
                   

-- (Projects)
CREATE TABLE projects (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100),
    description TEXT,
    image_path VARCHAR(255),
    github_link VARCHAR(255)
);

INSERT INTO projects (title, description, image_path, github_link) VALUES  
('Student Marks Management System', 
 'A full-stack system featuring CRUD operations for student records, registration, and grade calculation.', 
 'imges/asystem.png', 
 'https://github.com/Sul-SWE/SMMS'),

('Task Timer', 
 'A web-based productivity tool developed using vanilla JavaScript to track task durations.', 
 'imges/taskt.png', 
 'https://github.com/Sul-SWE/Task-Timer'),

('CV Website', 
 'A lightweight, fully responsive professional portfolio and CV website built with HTML and CSS.', 
 'imges/cvw.png', 
 'https://github.com/Sul-SWE/cv');
 
CREATE TABLE contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(255),
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);





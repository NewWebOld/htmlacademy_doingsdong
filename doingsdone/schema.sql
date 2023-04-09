CREATE DATABASE doingsdone
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE doingsdone;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email VARCHAR(128) NOT NULL UNIQUE,
    name_user VARCHAR(128),
    password_user CHAR(12)
);
CREATE TABLE project (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name_category VARCHAR(128),
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id) 
);
CREATE TABLE task (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status TINYINT(0),
    name_task VARCHAR(255),
    file VARCHAR(255),
    date_completion DATE,
    user_id INT,
    project_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (project_id) REFERENCES project(id)
);

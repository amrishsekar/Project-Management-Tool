CREATE DATABASE authoraized_pmt;

USE authoraized_pmt;

CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE projects(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(255),
    manager VARCHAR(255),
    created_at timestamp,
    updated_at timestamp
);

CREATE TABLE tasks(
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255),
    allocated_person VARCHAR(255),
    description VARCHAR(255),
    status VARCHAR(255),
    image varchar(255),
    is_delete INT,
    projects_id INT NOT NULL,
    created_at timestamp,
    updated_at timestamp,

    FOREIGN KEY (projects_id) REFERENCES projects(id)
);
-- DROP DATABASE IF EXISTS construction;
-- CREATE DATABASE construction;
-- USE construction;

-- -- Roles Table
-- CREATE TABLE roles (
--     role_ID INT PRIMARY KEY,
--     role_name VARCHAR(50) NOT NULL
-- );

-- -- Inserting roles into the roles table
-- INSERT INTO roles (role_ID, role_name) VALUES
-- (1, 'Primary Project Manager'),
-- (2, 'Head of Plumbers'),
-- (3, 'Head of Electricians'),
-- (4, 'Head of Concrete Workers'),
-- (5, 'Head of Carpenters'),
-- (6, 'Head of Roofers'),
-- (7, 'Head of Surveyors'),
-- (8, 'Head of Welders'),
-- (9, "General Worker");

-- -- Departments Table
-- CREATE TABLE departments (
--     department_ID INT PRIMARY KEY,
--     department_name VARCHAR(50) NOT NULL
-- );

-- -- Inserting departments into the departments table
-- INSERT INTO departments (department_ID, department_name) VALUES
-- (1, 'Head quarters'),
-- (2, 'Plumbing Department'),
-- (3, 'Electrical Department'),
-- (4, 'Concretery Department'),
-- (5, 'Carpentry Department'),
-- (6, 'Roofing Department'),
-- (7, "Surveying & Mapping Department"),
-- (8, 'Welding Department');

-- -- Employees Table
-- CREATE TABLE employees (
--     employee_ID INT PRIMARY KEY AUTO_INCREMENT,
--     first_name VARCHAR(20) NOT NULL,
--     last_name VARCHAR(20) NOT NULL,
--     phone_number VARCHAR(20) NOT NULL,
--     department_ID INT,
--     role_ID INT,
--     email VARCHAR(50) NOT NULL,
--     password VARCHAR(255) NOT NULL,  -- hashed password
--     FOREIGN KEY (department_ID) REFERENCES departments(department_ID),
--     FOREIGN KEY (role_ID) REFERENCES roles(role_ID)
-- );

-- CREATE TABLE requests (
--     request_ID INT PRIMARY KEY AUTO_INCREMENT,
--     project_name VARCHAR(100) NOT NULL,
--     employee_ID INT,
--     begin_date DATE,
--     end_date DATE,
--     request_status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
--     FOREIGN KEY (employee_ID) REFERENCES employees(employee_ID)
-- );

-- CREATE TABLE projects (
--     project_ID INT PRIMARY KEY AUTO_INCREMENT,
--     request_ID INT,
--     project_name VARCHAR(100) NOT NULL,
--     department_ID INT,
--     employee_ID INT,
--     begin_date DATE,
--     end_date DATE,
--     workflow ENUM('In Progress', 'Incomplete', 'Complete', 'Unassigned', 'Assigned') DEFAULT 'Unassigned',
--     status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
--     FOREIGN KEY (department_ID) REFERENCES departments(department_ID),
--     FOREIGN KEY (request_ID) REFERENCES requests(request_ID),
--     FOREIGN KEY (employee_ID) REFERENCES employees(employee_ID)
-- );

-- CREATE TABLE assignment (
--     assignment_ID INT PRIMARY KEY AUTO_INCREMENT,
--     project_ID INT,
--     department_ID INT,
--     begin_date DATE,
--     end_date DATE,
--     workflow ENUM('In Progress', 'Incomplete', 'Complete', 'Unassigned', 'Assigned') DEFAULT 'Unassigned',
--     FOREIGN KEY (project_ID) REFERENCES projects(project_ID),
--     FOREIGN KEY (department_ID) REFERENCES departments(department_ID)
-- );
























-- DROP DATABASE IF EXISTS construction;
-- CREATE DATABASE construction;
-- USE construction;

-- -- Roles Table
-- CREATE TABLE roles (
--     role_ID INT PRIMARY KEY,
--     role_name VARCHAR(50) NOT NULL
-- );

-- -- Inserting roles into the roles table
-- INSERT INTO roles (role_ID, role_name) VALUES
-- (1, 'Primary Project Manager'),
-- (2, 'Head of Plumbers'),
-- (3, 'Head of Electricians'),
-- (4, 'Head of Concrete Workers'),
-- (5, 'Head of Carpenters'),
-- (6, 'Head of Roofers'),
-- (7, 'Head of Surveyors'),
-- (8, 'Head of Welders'),
-- (9, "General Worker");

-- -- Departments Table
-- CREATE TABLE departments (
--     department_ID INT PRIMARY KEY,
--     department_name VARCHAR(50) NOT NULL
-- );

-- -- Inserting departments into the departments table
-- INSERT INTO departments (department_ID, department_name) VALUES
-- (1, 'Head quarters'),
-- (2, 'Plumbing Department'),
-- (3, 'Electrical Department'),
-- (4, 'Concretery Department'),
-- (5, 'Carpentry Department'),
-- (6, 'Roofing Department'),
-- (7, "Surveying & Mapping Department"),
-- (8, 'Welding Department');

-- -- Employees Table
-- CREATE TABLE employees (
--     employee_ID INT PRIMARY KEY AUTO_INCREMENT,
--     first_name VARCHAR(20) NOT NULL,
--     last_name VARCHAR(20) NOT NULL,
--     phone_number VARCHAR(20) NOT NULL,
--     department_ID INT,
--     role_ID INT,
--     email VARCHAR(50) NOT NULL,
--     password VARCHAR(255) NOT NULL,  -- hashed password
--     FOREIGN KEY (department_ID) REFERENCES departments(department_ID),
--     FOREIGN KEY (role_ID) REFERENCES roles(role_ID)
-- );

-- CREATE TABLE requests (
--     request_ID INT PRIMARY KEY AUTO_INCREMENT,
--     project_name VARCHAR(100) NOT NULL,
--     employee_ID INT,
--     begin_date DATE,
--     end_date DATE,
--     request_status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
--     FOREIGN KEY (employee_ID) REFERENCES employees(employee_ID)
-- );

-- CREATE TABLE projects (
--     project_ID INT PRIMARY KEY AUTO_INCREMENT,
--     request_ID INT,
--     project_name VARCHAR(100) NOT NULL,
--     begin_date DATE,
--     end_date DATE,
--     workflow ENUM('In Progress', 'Incomplete', 'Complete', 'Unassigned', 'Assigned') DEFAULT 'Unassigned',
--     status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
--     FOREIGN KEY (request_ID) REFERENCES requests(request_ID)
-- );

-- CREATE TABLE assignment (
--     assignment_ID INT PRIMARY KEY AUTO_INCREMENT,
--     project_ID INT,
--     department_ID INT,
--     begin_date DATE,
--     end_date DATE,
--     workflow ENUM('In Progress', 'Incomplete', 'Complete', 'Unassigned', 'Assigned') DEFAULT 'Unassigned',
--     FOREIGN KEY (project_ID) REFERENCES projects(project_ID),
--     FOREIGN KEY (department_ID) REFERENCES departments(department_ID)
-- );
















DROP DATABASE IF EXISTS construction;
CREATE DATABASE construction;
USE construction;

-- Roles Table
CREATE TABLE roles (
    role_ID INT PRIMARY KEY,
    role_name VARCHAR(50) NOT NULL
);

-- Inserting roles into the roles table
INSERT INTO roles (role_ID, role_name) VALUES
(1, 'Primary Project Manager'),
(2, 'Head of Plumbers'),
(3, 'Head of Electricians'),
(4, 'Head of Concrete Workers'),
(5, 'Head of Carpenters'),
(6, 'Head of Roofers'),
(7, 'Head of Surveyors'),
(8, 'Head of Welders'),
(9, "General Worker");

-- Departments Table
CREATE TABLE departments (
    department_ID INT PRIMARY KEY,
    department_name VARCHAR(50) NOT NULL
);

-- Inserting departments into the departments table
INSERT INTO departments (department_ID, department_name) VALUES
(1, 'Head quarters'),
(2, 'Plumbing Department'),
(3, 'Electrical Department'),
(4, 'Concretery Department'),
(5, 'Carpentry Department'),
(6, 'Roofing Department'),
(7, "Surveying & Mapping Department"),
(8, 'Welding Department');

CREATE TABLE employees (
    employee_ID INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    department_ID INT,
    role_ID INT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    FOREIGN KEY (department_ID) REFERENCES departments(department_ID),
    FOREIGN KEY (role_ID) REFERENCES roles(role_ID)
);

CREATE TABLE requests (
    request_ID INT PRIMARY KEY AUTO_INCREMENT,
    project_name VARCHAR(100) NOT NULL,
    employee_ID INT,
    begin_date DATE,
    end_date DATE,
    request_status ENUM('PENDING', 'APPROVED', 'REJECTED') DEFAULT 'PENDING',
    FOREIGN KEY (employee_ID) REFERENCES employees(employee_ID)
);

CREATE TABLE projects (
    project_ID INT PRIMARY KEY AUTO_INCREMENT,
    project_name VARCHAR(100) NOT NULL,
    begin_date DATE,
    end_date DATE,
    workflow ENUM('IN PROGRESS', 'INCOMPLETE', 'COMPLETE', 'UNASSIGNED', 'ASSIGNED') DEFAULT 'UNASSIGNED',
    status ENUM('PENDING', 'APPROVED', 'REJECTED') DEFAULT 'PENDING'
);

CREATE TABLE assignments (
    assignment_ID INT PRIMARY KEY AUTO_INCREMENT,
    project_ID INT,
    department_ID INT,
    begin_date DATE,
    end_date DATE,
    workflow ENUM('IN PROGRESS', 'INCOMMPLETE', 'COMPLETE', 'UNASSIGNED', 'ASSIGNED') DEFAULT 'UNASSIGNED',
    FOREIGN KEY (project_ID) REFERENCES projects(project_ID),
    FOREIGN KEY (department_ID) REFERENCES departments(department_ID)
);

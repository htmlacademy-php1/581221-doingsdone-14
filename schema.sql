CREATE DATABASE doingsdone
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;

USE doingsdone;

CREATE TABLE users (
  id INT(11) unsigned AUTO_INCREMENT,
  dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(254) NOT NULL UNIQUE,
  password CHAR(64),
  PRIMARY KEY ('id')
);

CREATE TABLE projects (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128) NOT NULL,
  user_id INT NOT NULL,
  PRIMARY KEY ('id'),
  FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE tasks (
  id INT(11) unsigned AUTO_INCREMENT,
  dt_add TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  status BOOLEAN DEFAULT 0,
  name VARCHAR(128) NOT NULL,
  link VARCHAR(128),
  dt_expire TIMESTAMP,
  user_id INT(11) unsigned NOT NULL,
  project_id INT(11) unsigned NOT NULL,
  PRIMARY KEY ('id'),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (project_id) REFERENCES projects(id)
);

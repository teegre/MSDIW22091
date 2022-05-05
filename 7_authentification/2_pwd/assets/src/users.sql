CREATE DATABASE IF NOT EXISTS users;

USE users;

DROP TABLE IF EXISTS user;

CREATE TABLE user (
  user_lastname VARCHAR(255) NOT NULL,
  user_firstname VARCHAR(255) NOT NULL,
  user_email VARCHAR(255) NOT NULL PRIMARY KEY,
  user_password VARCHAR(255) NOT NULL
);

CREATE TRIGGER IF NOT EXISTS lowcase BEFORE INSERT ON user
FOR EACH ROW SET NEW.user_email = LOWER(NEW.user_email);

CREATE TRIGGER IF NOT EXISTS lowcase BEFORE UPDATE ON user
FOR EACH ROW SET NEW.user_email = LOWER(NEW.user_email);
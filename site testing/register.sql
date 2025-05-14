CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    discord VARCHAR(100),
    instagrame VARCHAR(100),
    telegram VARCHAR(100),
    fname VARCHAR(50),
    lname VARCHAR(50),
    phone VARCHAR(20),
    birthdate DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

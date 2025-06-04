-- Créer la base de données
CREATE DATABASE IF NOT EXISTS `social_network`;
USE `social_network`;

-- Table pour les utilisateurs
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `avatar` VARCHAR(255) DEFAULT 'default.png',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table pour les posts
CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `content` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

-- Table pour les likes
CREATE TABLE IF NOT EXISTS `likes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `post_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    UNIQUE (`post_id`, `user_id`) -- Un utilisateur ne peut liker un post qu'une seule fois
);

-- Table pour les commentaires
CREATE TABLE IF NOT EXISTS `comments` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `post_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `comment` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

-- Table pour les messages privés
CREATE TABLE IF NOT EXISTS `messages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `sender_id` INT NOT NULL,
    `receiver_id` INT NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`sender_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`receiver_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

-- Table pour les notifications
CREATE TABLE IF NOT EXISTS `notifications` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

-- Table pour les stories
CREATE TABLE IF NOT EXISTS `stories` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `content` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `expires_at` TIMESTAMP NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
);

-- Table pour les relations de suivi (exemple d'amis ou abonnés)
CREATE TABLE IF NOT EXISTS `followers` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `follower_id` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`follower_id`) REFERENCES `users`(`id`) ON DELETE CASCADE,
    UNIQUE (`user_id`, `follower_id`) -- Un utilisateur ne peut être suivi qu'une seule fois par un autre
);

-- Insérer un utilisateur par défaut (exemple)
INSERT INTO `users` (`email`, `password`, `avatar`) VALUES
('user@example.com', 'password_hash', 'avatar.png');

-- Table de test pour des messages privés (par exemple)
INSERT INTO `messages` (`sender_id`, `receiver_id`, `message`) VALUES
(1, 2, 'Salut, comment ça va ?');

-- Table de test pour des notifications
INSERT INTO `notifications` (`user_id`, `message`) VALUES
(1, 'Vous avez un nouveau message !');

-- Table de test pour un post
INSERT INTO `posts` (`user_id`, `content`) VALUES
(1, 'Premier post de test !');

-- Table de test pour un like
INSERT INTO `likes` (`post_id`, `user_id`) VALUES
(1, 2);

-- Table de test pour un commentaire
INSERT INTO `comments` (`post_id`, `user_id`, `comment`) VALUES
(1, 2, 'Super post !');

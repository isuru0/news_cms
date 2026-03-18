-- Database and table for Headline Hub (news_cms)

CREATE DATABASE IF NOT EXISTS db_news_cms DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE db_news_cms;

-- Posts table
DROP TABLE IF EXISTS posts;
CREATE TABLE posts (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  date VARCHAR(10) NOT NULL,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  image_path VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional seed data
INSERT INTO posts (date, title, content, image_path) VALUES
('2025/10/17', 'Welcome to Headline Hub', 'This is a sample post. You can add more from the Admin dashboard.', 'post_images_upload/SEI_223295734.jpg');

CREATE DATABASE IF NOT EXISTS `forms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `forms`;

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
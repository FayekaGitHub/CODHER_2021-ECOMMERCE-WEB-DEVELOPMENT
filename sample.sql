SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cust_email` varchar(255) NOT NULL,
  `buy` int(11) NOT NULL DEFAULT 0,
  `done` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `chat` (
  `chat_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `times` timestamp NOT NULL DEFAULT current_timestamp(),
  `sender` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `choice1` int(11) NOT NULL DEFAULT 0,
  `choice2` int(11) NOT NULL DEFAULT 0,
  `choice3` int(11) NOT NULL DEFAULT 0,
  `choice4` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `organisation` (
  `org_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `months` int(11) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `turnover` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `visibility` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `org_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);


ALTER TABLE `chat`
  ADD PRIMARY KEY (`chat_id`);


ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `cust_name` (`cust_name`);


ALTER TABLE `organisation`
  ADD PRIMARY KEY (`org_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `org_name` (`org_name`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);


ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

ALTER TABLE `chat`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;


ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;


ALTER TABLE `organisation`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

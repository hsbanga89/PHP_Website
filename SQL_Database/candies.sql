DROP DATABASE IF EXISTS `candies`;
CREATE DATABASE IF NOT EXISTS `candies`;
USE `candies`;

CREATE TABLE `accounts` (
  `userId` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `country` text NOT NULL
);

INSERT INTO `accounts` (`userId`, `email`, `password`, `firstName`, `lastName`, `country`) VALUES
(19, 'bing@bing.com', 'ddaf35a193617abacc417349ae20413112e6fa4e89a97ea20a9eeee64b55d39a2192992a274fc1a836ba3c23a3feebbd454d4423643ce80e2a9ac94fa54ca49f', 'Bing', 'Liu', 'Australia'),
(20, 's1478212@gmail.com', 'bae99a79ecf59369969a65e939cf6e2279fbc5f62a010e5290bd5b1a338e9e780f0c6ee08d443ec2eff8b7695a0a6c1e6f55445d057e34c67f83b6ad2bad1db0', 'Hapy', 'Singh', 'India');


CREATE TABLE `products` (
  `productId` int(10) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productDescription` text NOT NULL,
  `productImage` varchar(125) NOT NULL
);

INSERT INTO `products` (`productId`, `productName`, `productDescription`, `productImage`) VALUES
(18, 'RASPBERRY TWISTS', 'Great for that extra treat in your childs lunchbox or a secret stash of deliciousness.', 'raspberry.jpg'),
(19, 'LUCKY CHARMS', 'Frosted toasted oat cereals with marshmallows, theyre magically delicious!', 'charms.png'),
(20, 'JOLLY RANCHER', 'When will our friend the Jolly Rancher stop making delicious candy?', 'jolly.jpg'),
(22, 'BUTTERFINGER', 'America loves peanut butter, and this candy bar takes their obsession to new heights!', 'butter.jpg'),
(40, 'tootsie roll', 'A staple in all childhood hearts and homes of most Americans.', 'roll.jpg'),
(41, 'strawberry clouds', 'Made by Chunkee Funkeez', 'cloulds.jpg');

ALTER TABLE `accounts`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `productName` (`productName`) USING HASH;

ALTER TABLE `accounts`
  MODIFY `userId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

ALTER TABLE `products`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

GRANT ALL PRIVILEGES ON `candies`.* TO 'user'@'localhost' WITH GRANT OPTION;

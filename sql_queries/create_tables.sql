-- Active: 1771948510793@@127.0.0.1@3306@kafka_local_database
CREATE TABLE `products` (
  `id_product` integer PRIMARY KEY,
  `id_manufacturer` integer,
  `product_name` varchar(255),
  `quantity` integer,
  `price` integer,
  about varchar(255),
  specs varchar(255),
  img varchar(255)
);

CREATE TABLE `tags` (
  `id_tag` integer PRIMARY KEY,
  `tag_name` varchar(255)
);

CREATE TABLE `products_tags` (
  `id_product` int,
  `id_tag` int
);

CREATE TABLE `users` (
  `id_user` integer PRIMARY KEY,
  `username` varchar(255),
  `fullname` varchar(255),
  `birthday` date,
  `email` varchar(255),
  `ip` varchar(255)
);

CREATE TABLE `manufacturers` (
  `id_manufacturer` integer PRIMARY KEY,
  `manufacturer_name` varchar(255),
  `contact_number` integer
);

CREATE TABLE `note` (
  `for_now_this_is` int,
  `gonna_be_db_for_my_project` int,
  `There_will_be_updates__maybe_` int
);

ALTER TABLE `products_tags` ADD FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`);

ALTER TABLE `products_tags` ADD FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id_tag`);

ALTER TABLE `products` ADD FOREIGN KEY (`id_manufacturer`) REFERENCES `manufacturers` (`id_manufacturer`);
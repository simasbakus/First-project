CREATE DATABASE eshop;

CREATE TABLE categories (
  id int AUTO_INCREMENT PRIMARY KEY,
  main_cat_name varchar(40) NOT NULL,
  sub_cat_name varchar(40) NOT NULL
);

INSERT INTO categories VALUES (NULL, "MEN", "Pants");
INSERT INTO categories VALUES (NULL, "MEN", "Shirts");
INSERT INTO categories VALUES (NULL, "MEN", "Jackets");
INSERT INTO categories VALUES (NULL, "MEN", "Hoodies");
INSERT INTO categories VALUES (NULL, "WOMEN", "Pants");
INSERT INTO categories VALUES (NULL, "WOMEN", "Shirts");
INSERT INTO categories VALUES (NULL, "WOMEN", "Jackets");
INSERT INTO categories VALUES (NULL, "WOMEN", "Hoodies");
INSERT INTO categories VALUES (NULL, "WOMEN", "Skirts");
INSERT INTO categories VALUES (NULL, "WOMEN", "Dresses");
INSERT INTO categories VALUES (NULL, "CHILDREN", "Pants");
INSERT INTO categories VALUES (NULL, "CHILDREN", "Shirts");
INSERT INTO categories VALUES (NULL, "CHILDREN", "Jackets");
INSERT INTO categories VALUES (NULL, "CHILDREN", "Hoodies");
INSERT INTO categories VALUES (NULL, "ACCESSORIES", "Hats");
INSERT INTO categories VALUES (NULL, "ACCESSORIES", "Sunglasses");
INSERT INTO categories VALUES (NULL, "ACCESSORIES", "Handbags");
INSERT INTO categories VALUES (NULL, "ACCESSORIES", "Backpacks");
INSERT INTO categories VALUES (NULL, "ACCESSORIES", "Wallets");
INSERT INTO categories VALUES (NULL, "ACCESSORIES", "Other");

-- ********************************************************************

CREATE TABLE items (
  id int AUTO_INCREMENT PRIMARY KEY,
  name varchar(60) NOT NULL,
  about varchar(500) NOT NULL,
  maker varchar(40) NOT NULL,
  price int NOT NULL,
  quantity int
);

INSERT INTO items VALUES (NULL,
                          "Kelnės",
                          "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                          "Unnamed",
                          70,
                          300 );
INSERT INTO items VALUES (NULL,
                          "Marškinėliai",
                          "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                          "Unnamed",
                          52,
                          50 );
INSERT INTO items VALUES (NULL,
                          "Švarkas",
                          "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                          "Unnamed",
                          100,
                          100 );
INSERT INTO items VALUES (NULL,
                          "Piniginė",
                          "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                          "Unnamed",
                          10,
                          20 );
INSERT INTO items VALUES (NULL,
                          "Džempas",
                          "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
                          "Unnamed",
                          40,
                          100 );








-- ***********************************************************************

CREATE TABLE images (
  id int AUTO_INCREMENT PRIMARY KEY,
  img_name varchar(40) NOT NULL,
  position int,
  item_id int
);

INSERT INTO images VALUES (NULL, "jeans1.jpg", 1, 1);
INSERT INTO images VALUES (NULL, "pants-women.jpg", 2, 1);
INSERT INTO images VALUES (NULL, "shirt.jpg", 1, 2);
INSERT INTO images VALUES (NULL, "header.jpg", 2, 2);
INSERT INTO images VALUES (NULL, "jacket.jpg", 1, 3);
INSERT INTO images VALUES (NULL, "header.jpg", 2, 3);
INSERT INTO images VALUES (NULL, "wallet.jpg", 1, 4);
INSERT INTO images VALUES (NULL, "header.jpg", 2, 4);
INSERT INTO images VALUES (NULL, "accessories.jpg", 3, 4);
INSERT INTO images VALUES (NULL, "hoodie1.jpg", 1, 5);
INSERT INTO images VALUES (NULL, "header.jpg", 2, 5);


INSERT INTO images VALUES (NULL, "hoodie2.jpg", 1, 11);
INSERT INTO images VALUES (NULL, "hoodie1.jpg", 2, 11);




-- ***********************************************************************

CREATE TABLE users (
  id int AUTO_INCREMENT PRIMARY KEY,
  user_name varchar(40) NOT NULL,
  pass varchar(255) NOT NULL,
  name varchar(50) NOT NULL,
  lname varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  adress varchar(50) NOT NULL
);

-- ***********************************************************************

CREATE TABLE orders (
  id int AUTO_INCREMENT PRIMARY KEY,
  user_id int,
  name varchar(50) NOT NULL,
  lname varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  adress varchar(50) NOT NULL,
  order_date datetime NOT NULL
);

-- **********************************************************************

CREATE TABLE order_detail (
  id int AUTO_INCREMENT PRIMARY KEY,
  order_id int NOT NULL,
  item_id int NOT NULL,
  quantity int NOT NULL
);

-- *********************************************************************

-- tarpine tarp kategoriju ir prekiu
-- del prekes galimybes buti keliose kategorijose
CREATE TABLE items_in_categories (
  item_id int,
  categorie_id int
);

INSERT INTO items_in_categories VALUES (1, 1);

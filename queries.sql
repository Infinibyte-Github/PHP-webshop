-- create database
CREATE DATABASE IF NOT EXISTS webshop;
USE webshop

--  query to make users table
CREATE TABLE users (
    userID INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(50),
    lastName VARCHAR(50),
    address VARCHAR(255),
    email VARCHAR(100),
    password VARCHAR(255),
    active BOOLEAN,
    admin BOOLEAN
);

-- query to make products table
CREATE TABLE products (
    productID INT PRIMARY KEY AUTO_INCREMENT,
    productName VARCHAR(50),
    description TEXT,
    price DECIMAL(10,2),
    stock INT,
    active BOOLEAN,
    image VARCHAR(255)
);

-- query to make orders table
CREATE TABLE orders (
    orderID INT PRIMARY KEY AUTO_INCREMENT,
    userID INT,
    orderDate DATE,
    FOREIGN KEY (userID) REFERENCES users(userID)
);

-- query to make orderlines table
CREATE TABLE orderlines (
    orderID INT,
    productID INT,
    quantity INT,
    FOREIGN KEY (orderID) REFERENCES orders(orderID),
    FOREIGN KEY (productID) REFERENCES products(productID)
);

-- query to make shoppingcart table
CREATE TABLE shoppingcart (
    userID INT,
    productID INT,
    quantity INT,
    FOREIGN KEY (userID) REFERENCES users(userID),
    FOREIGN KEY (productID) REFERENCES products(productID)
);

-- add some products to the products table
INSERT INTO products (productName, description, price, stock, active, image) VALUES ('Arduino Uno', 'Arduino Uno is a microcontroller board based on the ATmega328P (datasheet). It has 14 digital input/output pins (of which 6 can be used as PWM outputs), 6 analog inputs, a 16 MHz ceramic resonator (CSTCE16M0V53-R0), a USB connection, a power jack, an ICSP header and a reset button. It contains everything needed to support the microcontroller; simply connect it to a computer with a USB cable or power it with a AC-to-DC adapter or battery to get started.', 22.50, 10, true, 'https://www.arduino.cc/en/uploads/Main/ArduinoUno_R3_Front.jpg');
INSERT INTO products (productName, description, price, stock, active, image) VALUES ('Arduino Mega', 'The Arduino Mega 2560 is a microcontroller board based on the ATmega2560 (datasheet). It has 54 digital input/output pins (of which 15 can be used as PWM outputs), 16 analog inputs, 4 UARTs (hardware serial ports), a 16 MHz crystal oscillator, a USB connection, a power jack, an ICSP header, and a reset button. It contains everything needed to support the microcontroller; simply connect it to a computer with a USB cable or power it with a AC-to-DC adapter or battery to get started.', 45.00, 10, true, 'https://www.arduino.cc/en/uploads/Main/ArduinoMega2560_R3_Front_450px.jpg');
INSERT INTO products (productName, description, price, stock, active, image) VALUES ('Arduino Nano', 'The Arduino Nano is a small, complete, and breadboard-friendly board based on the ATmega328 (Arduino Nano 3.x). It has more or less the same functionality of the Arduino Duemilanove, but in a different package. It lacks only a DC power jack, and works with a Mini-B USB cable instead of a standard one.', 18.00, 10, true, 'https://www.arduino.cc/en/uploads/Main/ArduinoNanoFront_3_sm.jpg');
INSERT INTO products (productName, description, price, stock, active, image) VALUES ('Arduino Leonardo', 'The Arduino Leonardo is a microcontroller board based on the ATmega32u4 (datasheet). It has 20 digital input/output pins (of which 7 can be used as PWM outputs and 12 as analog inputs), a 16 MHz crystal oscillator, a micro USB connection, a power jack, an ICSP header, and a reset button. It contains everything needed to support the microcontroller; simply connect it to a computer with a USB cable or power it with a AC-to-DC adapter or battery to get started.', 20.00, 10, true, 'https://store.arduino.cc/cdn/shop/products/A000057_03.front_deadf61d-5880-4f10-aa7d-8fc524eb3827_934x700.jpg');
INSERT INTO products (productName, description, price, stock, active, image) VALUES ('Arduino Micro', 'The Arduino Micro is a microcontroller board based on the ATmega32u4 (datasheet), developed in conjunction with Adafruit. It has 20 digital input/output pins (of which 7 can be used as PWM outputs and 12 as analog inputs), a 16 MHz crystal oscillator, a micro USB connection, an ICSP header, and a reset button. It contains everything needed to support the microcontroller; simply connect it to a computer with a micro USB cable to get started. It has a form factor that enables it to be easily placed on a breadboard.', 20.00, 10, true, 'https://www.arduino.cc/en/uploads/Main/ArduinoMicroFront_450px.jpg');
INSERT INTO products (productName, description, price, stock, active, image) VALUES ('Arduino Esplora', 'The Arduino Esplora is a microcontroller board derived from the Arduino Leonardo. The Esplora differs from all preceding Arduino boards in that it provides a number of built-in, ready-to-use setof onboard sensors for interaction. It\'s designed for people who want to get up and running with Arduino without having to learn about the electronics first. For a step-by-step introduction to the Esplora, check out the Getting Started with Esplora guide.', 45.00, 10, true, 'https://docs.arduino.cc/static/9fd966b3468857478ccde27964f2dce7/a2510/A000095_top_2.jpg');
INSERT INTO products (productName, description, price, stock, active, image) VALUES ('Arduino Mini', 'The Arduino Mini is a small microcontroller board originally based on the ATmega168, but now supplied with the 328.(datasheet), intended for use on breadboards and when space is at a premium. It has 14 digital input/output pins (of which 6 can be used as PWM outputs), 8 analog inputs, and a 16 MHz crystal oscillator. It can be programmed with the USB Serial adapter or other USB or RS232 to TTL serial adapter.', 18.00, 10, true, 'https://docs.arduino.cc/static/6ef0d448db73013667ac934fd00f5914/a207c/e000025_featured.jpg');
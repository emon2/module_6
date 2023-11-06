<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully\n";
} else {
  echo "Error creating database: " . $conn->error . "\n";
}

// Connect to database
$conn = new mysqli($servername, $username, $password, "myDB");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create Customers table
$sql = "CREATE TABLE Customers (
  CustomerID INT PRIMARY KEY,
  Name VARCHAR(255),
  Email VARCHAR(255),
  Location VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Customers created successfully\n";
} else {
  echo "Error creating table: " . $conn->error . "\n";
}

// Create Orders table
$sql = "CREATE TABLE Orders (
  OrderID INT PRIMARY KEY,
  CustomerID INT,
  OrderDate DATE,
  TotalAmount DECIMAL(10, 2),
  FOREIGN KEY (CustomerID) REFERENCES Customers(CustomerID)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Orders created successfully\n";
} else {
  echo "Error creating table: " . $conn->error . "\n";
}

// Create Products table
$sql = "CREATE TABLE Products (
  ProductID INT PRIMARY KEY,
  Name VARCHAR(255),
  Description TEXT,
  Price DECIMAL(10, 2)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Products created successfully\n";
} else {
  echo "Error creating table: " . $conn->error . "\n";
}

// Create Categories table
$sql = "CREATE TABLE Categories (
  CategoryID INT PRIMARY KEY,
  Name VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Categories created successfully\n";
} else {
  echo "Error creating table: " . $conn->error . "\n";
}

// Create Order_Items table
$sql = "CREATE TABLE Order_Items (
  OrderItemID INT PRIMARY KEY,
  OrderID INT,
  ProductID INT,
  Quantity INT,
  UnitPrice DECIMAL(10, 2),
  FOREIGN KEY (OrderID) REFERENCES Orders(OrderID),
  FOREIGN KEY (ProductID) REFERENCES Products(ProductID)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Order_Items created successfully\n";
} else {
  echo "Error creating table: " . $conn->error . "\n";
}

$conn->close();
?>


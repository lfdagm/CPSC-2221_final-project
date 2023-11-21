CREATE TABLE Customer (
    Customer_ID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(30),
    LastName VARCHAR(30),
    Gender CHAR(1)
);

CREATE TABLE Passport (
    PassportNumber VARCHAR(10),
    Customer_ID INT,
    PRIMARY KEY (PassportNumber, Customer_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE Military (
    Customer_ID INT, 
    MilitaryID INT UNIQUE, 
    PRIMARY KEY (Customer_ID), 
    FOREIGN KEY (Customer_ID) REFERENCES Customer(Customer_ID) 
        ON DELETE CASCADE 
        ON UPDATE CASCADE
);

Create Table Hotel(
    HotelID INT AUTO_INCREMENT Primary KEY,
    HotelName varchar(100),
    HotelLocation varchar(100),
    Rating REAL
);

CREATE TABLE Discount (
    Customer_ID INT,
    Hotel_ID INT,
    Percentage INT,
    PRIMARY KEY (Customer_ID, Hotel_ID),
    FOREIGN KEY (Customer_ID) REFERENCES Military (Customer_ID) ON DELETE CASCADE,
    FOREIGN KEY (Hotel_ID) REFERENCES Hotel (HotelID) ON DELETE CASCADE
);


CREATE TABLE Has_Booking(
	BookingID INT not null,
    BookingData Date,
    PaymentMethod varchar(20),
    AmountPaid Float,
    CustomerID Integer not null,
    Primary Key (BookingID, CustomerID),
    Foreign Key (CustomerID) references Customer(Customer_ID) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE TripPackage (
    TripPackID INT AUTO_INCREMENT PRIMARY KEY,
    DepartureDate DATE,
    ReturnDate DATE
);


CREATE TABLE Provide_Hotel (
    TripPackID INT,
    Hotel_ID INT,
    SpecialRequest VARCHAR(255),
    PRIMARY KEY (TripPackID, Hotel_ID),
    FOREIGN KEY (TripPackID) REFERENCES TripPackage(TripPackID) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (Hotel_ID) REFERENCES Hotel(HotelID) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE Destination (
    DestinationID INT,
    Reviews VARCHAR(255),
    Country VARCHAR(20),
    City VARCHAR(20),
    LocationName VARCHAR(20),
    PRIMARY KEY(DestinationID)
);


CREATE TABLE Trip_Package_Has_Destination (
    TripPackID INTEGER,
    DestinationID INTEGER,
    PRIMARY KEY(TripPackID, DestinationID),
    FOREIGN KEY(TripPackID) REFERENCES TripPackage(TripPackID)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    FOREIGN KEY(DestinationID) REFERENCES Destination(DestinationID)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);
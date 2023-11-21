-- this one is not for the project. It's just a temp value i use to check out my program

INSERT INTO Destination (DestinationID, Reviews, Country, City, LocationName)
VALUES
    (1, 'Great destination with beautiful scenery', 'USA', 'New York', 'Central Park'),
    (2, 'Amazing historical sites and friendly people', 'Italy', 'Rome', 'Colosseum'),
    (3, 'Fantastic beaches and vibrant nightlife', 'Spain', 'Barcelona', 'Barceloneta Beach'),
    (4, 'Scenic landscapes and outdoor activities', 'Canada', 'Vancouver', 'Stanley Park'),
    (5, 'Rich culture and delicious cuisine', 'Japan', 'Tokyo', 'Shinjuku'),
    (6, 'Relaxing atmosphere and charming architecture', 'France', 'Paris', 'Montmartre');


INSERT INTO TripPackage (DepartureDate, ReturnDate)
VALUES
    ('2023-12-01', '2023-12-10'),
    ('2023-11-15', '2023-11-25'),
    ('2024-01-05', '2024-01-15'),
    ('2023-11-01', '2023-11-07'),
    ('2023-12-20', '2023-12-30');


INSERT INTO Trip_Package_Has_Destination (TripPackID, DestinationID)
VALUES
    (1, 1),
    (1, 2),
    (2, 3),
    (2, 4),
    (3, 5),
    (3, 6);


INSERT INTO Hotel (HotelName, HotelLocation, Rating)
VALUES
    ('Luxury Resort', 'Beachfront Paradise', 4.8),
    ('City View Inn', 'Downtown City Center', 3.5),
    ('Mountain Lodge', 'Scenic Mountainside', 4.2),
    ('Urban Oasis Hotel', 'Metropolitan Area', 4.0),
    ('Riverside Retreat', 'Nearby Riverfront', 4.5);

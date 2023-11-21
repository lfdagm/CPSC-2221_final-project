
 <?php
//  Display errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Connect to the database
require '../../database/database.php';


//Get values
$firstName=$_POST["first-name"];
$lastName=$_POST["last-name"];
$passport=$_POST["passport"];
$gender=$_POST["gender"];
$military=$_POST["military"];
$militaryID=$_POST["military-id"];


// echo $firstName;
// echo $lastName;
// echo $gender;
// echo $military;
echo $passport;

//construct the query
$query = "INSERT INTO Customer (FirstName, LastName, Gender) VALUES('$firstName','$lastName','$gender')";

//Insert into customer table
if ($conn->query($query) === TRUE) {
    echo "New customer created successfully!";
    //Last inserted id
    $lastCustomerId = $conn->insert_id; 

    echo $lastCustomerId;

    //Insert into Passport table
    $passportQuery="INSERT INTO Passport (PassportNumber, Customer_ID) VALUES('$passport', '$lastCustomerId')";
    if ($conn->query($passportQuery) === TRUE) {
        echo "New passport created successfully!";
    }else{
        echo "Error inserting passport ". $conn->error;
    }

    if ($military === "yes" && !empty($militaryId)) {
        // Construct and execute query to insert into the Military table
        $militaryQuery = "INSERT INTO Military (Customer_ID, MilitaryID) VALUES ('$lastCustomerId', '$militaryId')";
        if ($conn->query($militaryQuery) === TRUE) {
            echo "Military record created successfully!";
        } else {
            echo "Error in Military insert: " . $conn->error;
        }
    }
} else {
    echo "Error in customer: " . $conn->error;
}

//construct the query
// $query = "INSERT INTO Passport (PassportNumber) VALUES('$passport')";
// //Execute the query
// if ($conn->query($query) === TRUE) {
//     echo "New record created successfully!";
// } else {
//     echo "Error: " . $conn->error;
// }


$conn->close();

?>
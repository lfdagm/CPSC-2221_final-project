<?php

// For question number 3 in milestone 5

// Display errors
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect to the database
require_once '../database/database.php';



// Get the departure date from the form
$departure = $_POST["departure-date"];

//
global $tripPackageSearch;
$tripPackageSearch = [];

// Construct the query to retrieve trip packages and their associated destinations
$query = "SELECT TripPackage.*, Destination.Reviews, Destination.Country, Destination.City, Destination.LocationName
          FROM TripPackage
          JOIN Trip_Package_Has_Destination ON TripPackage.TripPackID = Trip_Package_Has_Destination.TripPackID
          JOIN Destination ON Trip_Package_Has_Destination.DestinationID = Destination.DestinationID
          WHERE TripPackage.DepartureDate = '$departure'";

// Execute the query
$result = $conn->query($query);

// Display the results
if ($result->num_rows > 0) {
    echo "<h2>Search Results</h2>";
    while ($row = $result->fetch_assoc()) {
        $tripPackageSearch[] = $row;

    }
}

// print_r ($tripPackageSearch);
// Close the database connection
$conn->close();
?>

<?php include '../components/head.php'; ?>
<?php include '../components/navbar.php'; ?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Trip Package Search</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Search Trip</li>
            </ol>

            <div class="card mb-4">
                <form class="m-3" action="tripPackage-search.php" method="post">
                    <div class="mb-3">
                        <label for="departure-date" class="form-label">Search by departure date</label>
                        <select class="form-select" id="departure-date" name="departure-date"
                            aria-describedby="lastnameHelp">
                            <?php
                            for ($i = 1; $i <= 100; $i++) {
                                $date = date('Y-m-d', strtotime("+" . $i . " days"));
                                $formattedDate = date('F d, Y', strtotime("+" . $i . " days"));
                                echo "<option value='$date'>$formattedDate</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    List results
                </div>
                <div class="card-body">


                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Trip Package ID</th>
                                <th>Departure Date</th>
                                <th>Destination Date</th>
                                <th>Reviews</th>
                                <th>Country</th>
                                <th>City</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Trip Package ID</th>
                                <th>Departure Date</th>
                                <th>Destination Date</th>
                                <th>Reviews</th>
                                <th>Country</th>
                                <th>City</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($tripPackageSearch as $package) { ?>
                                <tr>

                                    <td>
                                        <?php echo $package["TripPackID"] ?>
                                    </td>
                                    <td>
                                        <?php echo $package["DepartureDate"] ?>
                                    </td>
                                    <td>
                                        <?php echo $package["ReturnDate"] ?>
                                    </td>
                                    <td>
                                        <?php echo $package["Reviews"] ?>
                                    </td>
                                    <td>
                                        <?php echo $package["City"] ?>
                                    </td>
                                    <td>
                                        <?php echo $package["LocationName"] ?>
                                    </td>

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <?php include '../components/footer.php'; ?>
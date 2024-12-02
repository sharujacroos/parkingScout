<?php
require("../classes/Parkings/Parking.php");

$parkings = new Parking();


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"], $_GET["slot"])) {
        $parkid = $_GET["id"];
        $slotid = $_GET["slot"];

        $allparkings = $parkings->getParkingByParkid($parkid, $slotid);
    } else {
        $allparkings = $parkings->getAllParkings();
    }
} else {
    echo "error";
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {

    $message = null;
    if (isset($_GET["state"])) {
        $status = $_GET["state"];
        if ($status == 0) {
            $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Connection Problem ! Try Again.
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
        } else if ($status == 1) {


            $message = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Fill All Feilds!
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
        } else if ($status == 3) {

            $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>No Such Vehicle registerd
                        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/reserve.css" />
    <link rel="stylesheet" href="../styles/footer.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>ParkingScout</title>
</head>

<body>
    <?php
    require_once('../includes/navbar.php');
    ?>

    <div class="container mt-4">

        <div class="row">
            <div class="col">
                <div class="card">
                    <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title text-truncate"><?php echo $allparkings["Park_name"]; ?></h5>
                        <h6 class="card-subtitle text-muted"><?php echo $allparkings["Location"]; ?></h6>
                        <div class="card-foot">
                            <span class="card-text"><?php echo $allparkings["Slot_price"]; ?>/h</span>
                            <span class="card-text"><?php echo $allparkings["Available_slots"] . " " . $allparkings["Vehicle_type"]; ?> slots</span>
                        </div>

                        <!-- <a href="#" class="btn btn-primary w-100">View</a> -->
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="parking w-100 mt-4">
                    <!-- <div class="container d-flex flex-column w-100">
                        <h5 class="fw-bold">Vehicle type</h5>
                        <div class="container">

                            <div class="btn btn-primary rounded-pill vehi-button mb-2" id="car" onclick="setActiveVehicle('car')">Car</div>
                            <div class="btn btn-primary rounded-pill vehi-button mb-2" id="bike" onclick="setActiveVehicle('bike')">Bike</div>
                            <div class="btn btn-primary rounded-pill vehi-button mb-2" id="van" onclick="setActiveVehicle('van')">Van</div>
                            <div class="btn btn-primary rounded-pill vehi-button mb-2" id="lorry" onclick="setActiveVehicle('lorry')">Lorry</div>
                            <div class="btn btn-primary rounded-pill vehi-button mb-2" id="other" onclick="setActiveVehicle('other')">Other</div>
                            <input type="text" disabled placeholder="Vehicle type" value="" name=class="visually-hidden" />
                        </div>
                    </div> -->

                    <div class="container d-flex flex-column w-100 mt-3 mb-3">
                        <h5 class="fw-bold">Vehicle Details</h5>

                        <form action="../controllers/parkcon.php" method="POST">
                            <div class="form-group">
                                <input type="text" name="vehi_number" class="form-control mb-3" id="vehicle_number" placeholder="Vehicle Number" />
                            </div>
                            <?php echo $message ?>
                            <h5 class="fw-bold">Reserve Date</h5>

                            <div class="row mt-3 mb-3">
                                <div class="form-group">
                                    <label for="inputEmail4" name="vehi_number" class="text-secondary">Date</label>
                                    <input type="date" name="r_date" class="form-control" id="date-from" placeholder="From" value="">
                                </div>
                            </div>

                            <h5 class="fw-bold">Reserve Time</h5>
                            <div class="row mt-3 mb-3">
                                <div class="form-group">
                                    <label for="inputEmail4" class="text-secondary">Arrive Time</label>
                                    <input type="time" name="r_time" class="form-control" id="time-from" placeholder="From">
                                </div>

                            </div>
                            <input type="text" placeholder="Vehicle type" value="<?php echo $parkid ?>" name="parkid" class="visually-hidden" />
                            <input type="text" placeholder="Vehicle type" value="<?php echo $slotid ?>" name="slotid" class="visually-hidden" />
                            <input type="submit" class="btn btn-primary w-100 mt-3" value="Reserve Now" />
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php
    require_once('../includes/footer.php');
    ?>

    <script>
        function setActiveVehicle(vid) {
            const actCard = document.getElementsByClassName(" Active_btn");
            if (actCard[0] !== undefined) {
                console.log(actCard[0].id);
                document.getElementById(actCard[0].id).classList.remove("Active_btn");
            }
            document.getElementById(vid).classList.toggle("Active_btn");
        }

        function setDateDisable() {
            if (document.getElementById("today-from").checked) {
                document.getElementById("date-from").disabled = true;
            } else {
                document.getElementById("date-from").disabled = false;
            }
        }
    </script>
</body>

</html>
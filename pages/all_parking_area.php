<?php
require("../classes/Parkings/Parking.php");

$parkings = new Parking();
$allparkings = $parkings->getAllParkings();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $vehitype = $_POST["filtervehi"];
    if ($vehitype == "all") {
        $allparkings = $parkings->getAllParkings();
    } else {
        $allparkings = $parkings->getParkingByVehicle($vehitype);
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
    <div class="container">
        <div class="container mt-4">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="row justify-around align-center">
                    <div class="col-sm d-flex justify-center align-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><img src="../src/search.png" style="width:100%;height:24px"></div>
                            </div>
                            <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Search town">
                        </div>
                    </div>
                    <div class="col-sm d-flex justify-content-end">
                        <select class="custom-select w-25 mr-2" id="inlineFormCustomSelect" name="filtervehi">
                            <option selected value="all">All</option>
                            <option value="car">Car</option>
                            <option value="van">Van</option>
                            <option value="bike">Bike</option>
                            <option value="lorry">Lorry</option>
                            <option value="other">Other</option>
                        </select>
                        <input type="submit" class="btn btn-primary" value="Filter" /><i class="bi bi-funnel"></i>
                    </div>

                </div>
            </form>
        </div>

        <div class="container mt-4">
            <div class="row gx-2 gy-2">
                <?php
                for ($i = 0; $i <= count($allparkings) - 1; $i++) { ?>
                    <div class="col-6  col-md-4 col-lg-3">
                        <a href="../pages/reserveslot.php?id=<?php echo $allparkings[$i]["Park_id"]; ?>&slot=<?php echo $allparkings[$i]["Slot_type_id"]; ?>" style="text-decoration:none;color:black">
                            <div class="card">
                                <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate"><?php echo $allparkings[$i]["Park_name"]; ?></h5>
                                    <h6 class="card-subtitle text-muted"><?php echo $allparkings[$i]["Location"]; ?></h6>
                                    <div class="card-foot">
                                        <span class="card-text"><?php echo $allparkings[$i]["Slot_price"]; ?>/h</span>
                                        <span class="card-text"><?php echo $allparkings[$i]["Available_slots"] . " " . $allparkings[$i]["Vehicle_type"]; ?> slots</span>
                                    </div>

                                    <a href="#" class="btn btn-primary w-100">View</a>
                                </div>
                            </div>

                        </a>

                    </div>

                <?php
                }

                ?>
                <!-- <div class="col">
                    <a href="../pages/reserveslot.php" style="text-decoration:none;color:black" class="all">
                        <div class="card">
                            <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Commercial Center Parking</h5>
                                <h6 class="card-subtitle text-muted">Colombo</h6>
                                <div class="card-foot">
                                    <span class="card-text">Rs:250/h</span>
                                    <span class="card-text">10 slots</span>
                                </div>

                                <a href="#" class="btn btn-primary w-100">View</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="../pages/reserveslot.php" style="text-decoration:none;color:black" class="all">
                        <div class="card">
                            <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Commercial Center Parking</h5>
                                <h6 class="card-subtitle text-muted">Colombo</h6>
                                <div class="card-foot">
                                    <span class="card-text">Rs:250/h</span>
                                    <span class="card-text">10 slots</span>
                                </div>

                                <a href="#" class="btn btn-primary w-100">View</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="../pages/reserveslot.php" style="text-decoration:none;color:black" class="all">
                        <div class="card">
                            <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Commercial Center Parking</h5>
                                <h6 class="card-subtitle text-muted">Colombo</h6>
                                <div class="card-foot">
                                    <span class="card-text">Rs:250/h</span>
                                    <span class="card-text">10 slots</span>
                                </div>

                                <a href="#" class="btn btn-primary w-100">View</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="../pages/reserveslot.php" style="text-decoration:none;color:black" class="all">
                        <div class="card">
                            <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Commercial Center Parking</h5>
                                <h6 class="card-subtitle text-muted">Colombo</h6>
                                <div class="card-foot">
                                    <span class="card-text">Rs:250/h</span>
                                    <span class="card-text">10 slots</span>
                                </div>
                                <a href="#" class="btn btn-primary w-100">View</a>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="../pages/reserveslot.php" style="text-decoration:none;color:black" class="all">
                        <div class="card">
                            <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">Commercial Center Parking</h5>
                                <h6 class="card-subtitle text-muted">Colombo</h6>
                                <div class="card-foot">
                                    <span class="card-text">Rs:250/h</span>
                                    <span class="card-text">10 slots</span>
                                </div>

                                <a href="#" class="btn btn-primary w-100">View</a>
                            </div>
                        </div>
                    </a>
                </div>

            </div> -->
            </div>
        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    ?>

</body>

</html>
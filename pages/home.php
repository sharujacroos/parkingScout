<?php
require("../classes/Parkings/Parking.php");

$parkings = new Parking();


if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["type"])) {
        $vehitype = $_GET["type"];
        if ($vehitype == "all") {
            $allparkings = $parkings->getAllParkings();
        } else {
            $allparkings = $parkings->getParkingByVehicle($vehitype);
        }
    } else {
        $allparkings = $parkings->getAllParkings();
    }
} else {
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/home.css" />
    <link rel="stylesheet" href="../styles/footer.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>ParkingScout</title>
</head>

<body>

    <?php
    require_once('../includes/navbar.php');
    ?>


    <div class="main-con">
        <img src="../src/main_img.jpg" class="main-img" />
        <div class="slogan">
            <h1>Find the best parkings</h1>
            <h2>Near You.</h2>
        </div>


        <div class=" container search-con">
            <form class="form-inline">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search by town" aria-label="Username" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><img src="../src/search.png" class="search-img" /></span>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row" style="margin-left:0px;">
            <div class="col-3 vehi">
                <a class="card p-3" id="car" onclick="setActiveVehicle('car')" href="../pages/home.php?type=car" style="text-decoration:none">
                    <img class="card-img-top vehi-img" src="../src/car.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Car</h5>
                    </div>
                </a>
            </div>
            <div class="col-3 vehi">
                <a class="card p-3" id="van" onclick="setActiveVehicle('van')" href="../pages/home.php?type=van" style="text-decoration:none">
                    <img class="card-img-top vehi-img" src="../src/van.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Van</h5>

                    </div>
                </a>
            </div>
            <div class="col-3 vehi">
                <a class="card p-3" id="bike" onclick="setActiveVehicle('bike')" href="../pages/home.php?type=bike" style="text-decoration:none">
                    <img class="card-img-top vehi-img" src="../src/bike.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Bike</h5>

                    </div>
                </a>
            </div>
            <div class="col-3 vehi">
                <a class="card p-3" id="lorry" onclick="setActiveVehicle('lorry')" href="../pages/home.php?type=lorry" style="text-decoration:none">
                    <img class="card-img-top vehi-img" src="../src/lorry.png" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Lorry</h5>

                    </div>
                </a>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="d-flex">
            <div class="container w-100 d-flex flex-row justify-content-between">
                <span class="fs-4 fw-bold">Parking Near You</span>
                <a href="../pages/all_parking_area.php" class="btn btn-outline-secondary">See all</a>
            </div>
        </div>
        <div class="row mt-4 gy-2" style="margin-left:0px;">
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
            <!-- <div class="col-6  col-md-4 col-lg-3">
                <a href="../pages/reserveslot.php" style="text-decoration:none;color:black">
                    <div class="card">
                        <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-truncate">Commercial Center Parking</h5>
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
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Commercial Center Parking</h5>
                        <h6 class="card-subtitle">Colombo</h6>
                        <div class="card-foot">
                            <span class="card-text">Rs:250/h</span>
                            <span class="card-text">10 slots</span>
                        </div>

                        <a href="#" class="btn btn-primary w-100">View</a>
                    </div>
                </div>


            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Commercial Center Parking</h5>
                        <h6 class="card-subtitle">Colombo</h6>
                        <div class="card-foot">
                            <span class="card-text">Rs:250/h</span>
                            <span class="card-text">10 slots</span>
                        </div>

                        <a href="#" class="btn btn-primary w-100">View</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Commercial Center Parking</h5>
                        <h6 class="card-subtitle">Colombo</h6>
                        <div class="card-foot">
                            <span class="card-text">Rs:250/h</span>
                            <span class="card-text">10 slots</span>
                        </div>

                        <a href="#" class="btn btn-primary w-100">View</a>
                    </div>
                </div>

            </div>
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card">
                    <img class="card-img-top" src="../src/parking.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Commercial Center Parking</h5>
                        <h6 class="card-subtitle muted">Colombo</h6>
                        <div class="card-foot">
                            <span class="card-text">Rs:250/h</span>
                            <span class="card-text">10 slots</span>
                        </div>

                        <a href="#" class="btn btn-primary w-100">View</a>
                    </div>
                </div>

            </div>

        </div> -->

        </div>
    </div>
    <?php
    require_once('../includes/footer.php');
    ?>

    <script>
        function setActiveVehicle(vid) {
            const actCard = document.getElementsByClassName("Active_card");
            if (actCard[0] !== undefined) {
                console.log(actCard[0].id);
                document.getElementById(actCard[0].id).classList.remove("Active_card");
            }



            document.getElementById(vid).classList.toggle("Active_card");

        }
    </script>

</body>

</html>
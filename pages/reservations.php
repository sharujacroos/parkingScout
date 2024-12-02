<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../styles/allreservations.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>ParkingScout</title>
    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        body::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        body {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body>
    <div class="container-sm">
        <div class="container">
            <h1 class="title">Reservations</h1>

            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../src/parking.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Parking name</h5>
                            <h6 class="card-sub-title text-muted">Colombo</h6>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="Reserve Date" class="text-muted">Reserve Date</label>
                                    <label for="Reserve Date">19/09/2023</label>
                                </div>
                                <div class="col">
                                    <label for="Reserve time" class="text-muted">Reserve time</label>
                                    <label for="Reserve Date">12.33 A.M</label>
                                </div>
                            </div>

                            <div class="row">
                                <h6 class="card-sub-title text-muted">Realtime Charging:</h6>
                                <div class="col">
                                    <div class="alert alert-primary" role="alert">
                                        00:25:02 H
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="alert alert-info" role="alert">
                                        Rs: 100.00
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3 mb-3">
                                <div class="col-sm"><button type="button" class="btn btn-success">Pay</button></div>
                                <div class="col-sm-5"><button type="button" class="btn btn-warning">Cancel Reservation</button></div>

                            </div>
                            <h6 class="card-sub-title text-right">Charging Rate: <small class="text-success">Rs 100.00/h</small></h6>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php

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
                        <strong>Email Or Passowrd incorrect!
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../styles/login.css" />
    <title>ParkingScout|Login</title>
</head>

<body>
    <div class="container" style="max-width: 100%">
        <div class="row align-items-center">
            <div class="col">
                <img src="../src/login.jpg" class="login-hero" />
            </div>
            <div class="col align-items-center col-right-login">
                <div class="row align-items-center">
                    <div class="p-3">
                        <div class="mb-5">
                            <strong class="fs-2">Welcome Back!</strong>
                            <div>to your parking assistance.</div>
                        </div>

                        <form action="../controllers/logincon.php" method="POST">
                            <div class="form-group pt-2 pb-2">
                                <label for="exampleInputEmail1" class="text-secondary">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                            </div>
                            <div class="form-group pt-2 pb-2">
                                <label for="exampleInputPassword1" class="text-secondary">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" />
                            </div>
                            <?php echo $message ?>
                            <div style="text-align: right; margin-bottom: 5px">
                                <label class="form-check-label" for="exampleCheck1"><a href="#" style="color: #256d85; text-decoration: none">Forgot password?</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary p-2">Login</button>
                            <div style="text-align: center; margin-top: 8px">
                                <label class="form-check-label text-secondary" for="exampleCheck1">Don't have an account?
                                    <a href="signin.php" style="color: #256d85; text-decoration: none">Register</a></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>
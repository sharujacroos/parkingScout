<?php

require("../classes/Auth/authenticate.php");

if (isset($_POST['email'], $_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        
            $auth = new UserAuth();
            $authstate = $auth->login($_POST['email'], $_POST['password']);
        
    } else {
        header("Location: ../pages/login.php?state=1");
    }
} else {
    echo "set all feilds";
}

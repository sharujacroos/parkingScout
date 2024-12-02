<?php

require("../classes/Auth/authenticate.php");

if (isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['phone'], $_POST['confirm_psw'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['phone']) && !empty($_POST['confirm_psw'])) {
        if ($_POST['password'] === $_POST['confirm_psw']) {
            $auth = new UserAuth();
            $authstate = $auth->register($_POST['email'], $_POST['password'], $_POST['name'], $_POST['phone']);
        } else {
            header("Location: ../pages/signin.php?state=2");
        }
    } else {
        header("Location: ../pages/signin.php?state=1");
    }
} else {
    echo "set all feilds";
}

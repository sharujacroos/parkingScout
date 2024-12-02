<?php

require("../classes/Parkings/Parking.php");

if (isset($_POST['vehi_number'], $_POST['r_date'], $_POST['r_time'])) {
    if (!empty($_POST['vehi_number']) && !empty($_POST['r_date']) && !empty($_POST['r_time'])) {
        
        $park = new Parking();
        $parking = $park->reservePark($_POST['parkid'], $_POST['slotid'], $_POST['vehi_number'], $_POST['r_date'], $_POST['r_time']);

        // header("Location: ../pages/signin.php?state=2");

    } else {
        header("Location: ../pages/signin.php?state=1");
    }
} else {
    echo "set all feilds";
}

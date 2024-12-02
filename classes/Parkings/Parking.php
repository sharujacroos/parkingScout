<?php

require("../classes/DBConnector.php");
class Parking
{

    private $parkid;
    private $parkname;
    private $location;
    private $address;
    private $contact;

    function getAllParkings()
    {
        try {
            $dbcon = new DBConnector();
            $connection = $dbcon->getConnection();
            $query = "SELECT * FROM parking_area,slot_type where parking_area.Park_id=slot_type.Park_id;";
            $result = $connection->query($query);
            if ($result) {
                // while ($row = $result->fetch()) {
                //     echo $row["Park_name"]."<br>";
                // }
                $row = $result->fetchAll();
                return $row;
            } else {
                header("Location: ../pages/home.php?state=2");
            }
        } catch (PDOException $ex) {
            header("Location: ../pages/home.php?state=0");
            echo $ex->getMessage();
        }
    }

    function getParkingByVehicle($vehicle_type)
    {
        try {
            $dbcon = new DBConnector();
            $connection = $dbcon->getConnection();
            $query = "select * from parking_area,slot_type where parking_area.Park_id=slot_type.Park_id and slot_type.Vehicle_type='" . $vehicle_type . "';";
            $result = $connection->query($query);
            if ($result) {
                // while ($row = $result->fetch()) {
                //     echo $row["Park_name"]."<br>";
                // }
                $row = $result->fetchAll();
                return $row;
            } else {
                header("Location: ../pages/home.php?state=2");
            }
        } catch (PDOException $ex) {
            header("Location: ../pages/home.php?state=0");
            echo $ex->getMessage();
        }
    }
    function getParkingByParkid($parkid, $slotid)
    {
        try {
            $dbcon = new DBConnector();
            $connection = $dbcon->getConnection();
            $query = "select * from parking_area,slot_type where parking_area.Park_id=slot_type.Park_id and slot_type.Park_id='" . $parkid . "' and slot_type.Slot_type_id='" . $slotid . "';";
            $result = $connection->query($query);
            if ($result) {
                // while ($row = $result->fetch()) {
                //     echo $row["Park_name"]."<br>";
                // }
                $row = $result->fetch();
                return $row;
            } else {
                header("Location: ../pages/home.php?state=2");
            }
        } catch (PDOException $ex) {
            header("Location: ../pages/home.php?state=0");
            echo $ex->getMessage();
        }
    }
    function reservePark($parkid, $slotid, $vehi_number, $r_date, $r_time)
    {
        try {
            $dbcon = new DBConnector();
            $connection = $dbcon->getConnection();

            $query = "SELECT Vehicle_id FROM vehicle where Vehicle_number='" . $vehi_number . "';";
            $result_vehi = $connection->query($query);

            if ($row = $result_vehi->fetch()) {
                // $row = $result_vehi->fetch();
                $vehicle_id = $row["Vehicle_id"];

                $query = "INSERT INTO `slot` (`Vehicle_id`, `Park_id`, `Reserved_date`, `Reserved_time`, `Slot_type_id`) VALUES (?,?,?,?,?);";
                $pstmt = $connection->prepare($query);
                $result = $pstmt->execute([$vehicle_id, $parkid, $r_date, $r_time, $slotid]);

                if ($result) {
                    header("Location: ../pages/profile.php");
                } else {
                    header("Location: ../pages/reserveslot.php?state=2");
                }
            } else {
                header("Location: ../pages/reserveslot.php?state=3&id=$parkid&slot=$slotid");
            }
        } catch (PDOException $ex) {
            // header("Location: ../pages/home.php?state=0");
            echo $ex->getMessage();
        }
    }
    function getReservationDetails($parkid, $slotid, $vehi_number, $r_date, $r_time)
    {
        try {

            if (!isset($_COOKIE['user_id'])) {
                header("Location: ../pages/login.php");
            } else {
                $userID=$_COOKIE['user_id'];
            }


            $dbcon = new DBConnector();
            $connection = $dbcon->getConnection();

            $query = "SELECT Vehicle_id FROM vehicle where Vehicle_number='" . $vehi_number . "';";
            $result_vehi = $connection->query($query);
            if ($result_vehi) {
                $row = $result_vehi->fetch();
                $vehicle_id = $row["Vehicle_id"];

                $query = "INSERT INTO `slot` (`Vehicle_id`, `Park_id`, `Reserved_date`, `Reserved_time`, `Slot_type_id`) VALUES (?,?,?,?,?);";
                $pstmt = $connection->prepare($query);
                $result = $pstmt->execute([$vehicle_id, $parkid, $r_date, $r_time, $slotid]);

                if ($result) {
                    header("Location: ../pages/profile.php");
                } else {
                    header("Location: ../pages/reserveslot.php?state=2");
                }
            } else {
                header("Location: ../pages/reserveslot.php?state=3");
            }
        } catch (PDOException $ex) {
            // header("Location: ../pages/home.php?state=0");
            echo $ex->getMessage();
        }
    }
}

// $p = new Parking();
// print_r($p->getParkingByParkid("7891", "1"));

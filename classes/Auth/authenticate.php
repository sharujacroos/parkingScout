<?php
require("../classes/DBConnector.php");
require("../classes/Auth/user.php");
class UserAuth
{
    private $name;
    private $email;
    private $phone;
    private $password;

    function login($email, $psw)
    {
        try {
            $dbcon = new DBConnector();
            $connection = $dbcon->getConnection();
            $query = "SELECT Password,Name FROM user where Email='" . $email . "';";
            $result = $connection->query($query);
            if ($result) {
                $row = $result->fetch();
                if ($row['Password'] === $psw) {
                    $user = new User($row['Name'], $email);
                    $user->setUserCookei();
                    header("Location: ../pages/home.php");
                }else{
                    header("Location: ../pages/login.php?state=3");
                }
            }else{
                header("Location: ../pages/login.php?state=2");
            }
            
        } catch (PDOException $ex) {
            header("Location: ../pages/login.php?state=0");
            echo $ex->getMessage();
        }
    }

    function register($email, $psw, $name, $phone)
    {
        try {
            $dbcon = new DBConnector();
            $connection = $dbcon->getConnection();
            $query = "INSERT INTO user (Name,Password,Email,Phone_number,User_role) values (?,?,?,?,?);";
            $pstmt = $connection->prepare($query);
            $pstmt->execute([$name, $psw, $email, $phone,"User"]);

            $user = new User($name, $email);
            $user->setUserCookei();

            header("Location: ../pages/home.php");
        } catch (PDOException $ex) {
            header("Location: ../pages/signin.php?state=0");
            echo $ex->getMessage();
        }
    }
}

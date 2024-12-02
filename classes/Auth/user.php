
<?php

class User
{

    private $username;
    private $userID;

    function __construct($username, $userid)
    {
        $this->username = $username;
        $this->userID = $userid;
    }

    function setUserCookei()
    {
        setcookie("username", $this->username, time() + (86400 * 30), "/");
        setcookie("userid", $this->userID, time() + (86400 * 30), "/");
        return true;
    }
}

$user = new User("sasith", "nimasha");
$user->setUserCookei();



?>

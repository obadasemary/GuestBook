<?php

/**
 * Created by PhpStorm.
 * User: obada
 * Date: 11/7/2015
 * Time: 6:12 PM
 */
class GuestBook
{
    /**
     * @param $name
     * @param $message
     */
    public function Add($name, $message)
    {

        //Validate Date

        $general = new General();
        $name = $general->xss_filter($name);
        $message = $general->xss_filter($message);

        //Empty or not
        if (empty($name) || empty($message)) {
            exit("You Can`t leave data empty");
        }

        //Name Length
        if (strlen($name) >= 100 || strlen($name) < 3) {
            exit("Name Must be > 3 and <= 100");
        }

        //Message Length
        if (strlen($message) < 10) {
            exit("Name Must be > 10 Chars");
        }

        $date = date("d-m-Y");
        //Database
        $connection = mysqli_connect('localhost', 'root', '', 'guestbook');

        $Insert = "INSERT INTO `messages`( `name`, `message`, `date`) VALUES ('$name' ,'$message','$date')";

        $query = mysqli_query($connection, $Insert);

        if ($query == true) {
            //Message
            echo "Message Added";
        } else {
            //Error Message
            echo "Error Adding New Message";
        }

        mysqli_close($connection);
    }

    /**
     *
     */
    public function GetAll()
    {
        //Database
        $connection = mysqli_connect('localhost', 'root', '', 'guestbook');

        $SelectAll = "select * from `messages`";

        $query = mysqli_query($connection, $SelectAll);

        if ($query == true) {
            $messages = array();
            while ($row = mysqli_fetch_assoc($query)) {
                $messages[] = $row;
            }
            return $messages;
        } else {
            //Error Message
            mysqli_close($connection);
            return null;
        }

        mysqli_close($connection);
    }

    /**
     * @param $id
     * @return array|null
     */
    public function GetMessage($id)
    {

        $id = (int)$id;
        //Database
        $connection = mysqli_connect('localhost', 'root', '', 'guestbook');

        $SelectMessage = "select * from `messages` WHERE `id`=$id";

        $query = mysqli_query($connection, $SelectMessage);

        if ($query == true) {
            $message = mysqli_fetch_assoc($query);
            return $message;
        } else {
            //Error Message
            mysqli_close($connection);
            return null;
        }

        mysqli_close($connection);
    }

    /**
     *
     */
    public function Update($id, $name, $message)
    {
        $id = (int)$id;
        //Database
        $connection = mysqli_connect('localhost', 'root', '', 'guestbook');

        $UpdateMessage = "UPDATE `messages` SET `name` = '$name', `message` = '$message' WHERE `id`=$id";

        $query = mysqli_query($connection, $UpdateMessage);

        if ($query && mysqli_affected_rows($connection) > 0) {
            mysqli_close($connection);
            return true;
        } else {
            mysqli_close($connection);
            return false;
        }
    }

    /**
     *
     */
    public function Delete($id)
    {
        $id = (int)$id;
        //Database
        $connection = mysqli_connect('localhost', 'root', '', 'guestbook');

        $DeleteMessage = "Delete from `messages` WHERE `id`=$id";

        $query = mysqli_query($connection, $DeleteMessage);

        if ($query == true) {
            header('Location: index.php');
        } else {
            mysqli_close($connection);
            exit("Error Not Deleted");
        }
        mysqli_close($connection);
    }
}
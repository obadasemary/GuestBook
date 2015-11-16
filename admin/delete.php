<?php
/**
 * Created by PhpStorm.
 * User: obada
 * Date: 11/10/2015
 * Time: 5:18 AM
 */

require_once('../GuestBook.php');
require_once('../validation.php');

$gb = new GuestBook();

$id = 0;

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
}

$gb->Delete($id);

?>



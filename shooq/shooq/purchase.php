<?php

$server="localhost";
$username="root";
$password="ٍا#1313خخض0@";
$database_name="purchase.db";
$errors = array();
$con = mysqli_connect($server, $username, $password, $database_name);
if($con){
    if (isset($_POST['purchase'])) {
        
        $itemcode = mysqli_real_escape_string($con, $_POST['itemcode']);
        $itemCatogory = mysqli_real_escape_string($con, $_POST['ItemCatogory']);
        $itemName = mysqli_real_escape_string($con, $_POST['ItemName']);
        $itemPrice = mysqli_real_escape_string($con, $_POST['ItemPrice']);
        $quantity = mysqli_real_escape_string($con, $_POST['Quantity']);
        $address = mysqli_real_escape_string($con, $_POST['Address']);
        $email = mysqli_real_escape_string($con, $_POST['Email']);
        $contactnumber = mysqli_real_escape_string($con, $_POST['Contact Number']);
        
        if (empty($itemcode)) {
        array_push($errors, "itemcode is required");
        }
        if (empty($ItemCatogory)) {
        array_push($errors, "ItemCatogory is required");
        }
        if (empty($ItemName)) {
            array_push($errors, "ItemName is required");
            }
        if (empty($ItemPrice)) {
            array_push($errors, "ItemPrice is required");
            }
            
        $get_all = "SELECT * FROM contactnumber WHERE contactnumber='$contactnumber' OR email='$email' LIMIT 1";
        $result = mysqli_query($con, $get_all);
        $user = mysqli_fetch_assoc($result);

        if ($contactnumber) { 
        if ($user['contactnumber'] === $contactnumber) {
            array_push($errors, "contactnumber is already existed");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email is already existed");
        }
        }

        
        if (count($errors) == 0) {
            $itemName = md5($itemName);

            $PURCHASE = "INSERT INTO purchase (itemcode, itemCatogory, contactnumber, itemPrice, quantity, address, email)
                    VALUES('$itemcode', '$itemCatogory', '$contactnumber', '$itemPrice', '$quantity', '$address', '$email')";
            mysqli_query($con, $PURCHASE);
            header('Location: purchase.db');
        }
    }
}

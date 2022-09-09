<?php
  $itemcode = $_POST['itemcode'];
  $itemCatogory = $_POST['ItemCatogory'];
  $itemName = $_POST['ItemName'];
  $itemPrice = $_POST['ItemPrice'];
  $quantity = $_POST['Quantity'];
  $address = $_POST['Address'];
  $email = $_POST['Email'];
  $contactnumber = $_POST['Contact Number'];
  

  $conn = new mysqli ('localhost', 'root','test');
  if($conn->connection_error){
      die('connecton failed : ' .$conn->connect_error);
  }else{
      $stmt = $conn->prepare("insert into purchase"purchase(itemcode, itemCatogory, contactnumber, itemPrice, quantity, address, email)
         VALUES('$itemcode', '$itemCatogory', '$contactnumber', '$itemPrice', '$quantity', '$address', '$email')");
      $stmt->bind_param("issiiisas",$itemcode, $itemCatogory, $contactnumber, $itemPrice, $quantity, $address, $email)
      $stmt->execute();
      echo "purchase successful");
      $stmt->close();
      $conn->close();
  }
?>
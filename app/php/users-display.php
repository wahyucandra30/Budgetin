<?php
// include 'connect.php';

// session_start();

// $username = $_SESSION['currentusername'];

// $selectUser = "SELECT * FROM `users` WHERE `username` = '$username'";

// $userQuery = $connection->query($selectUser);

// if ($userQuery->num_rows > 0) {
//     $row = $userQuery->fetch_assoc();
    
//     $domfname = new DOMDocument;

//     $domfname->loadHTML( "<input type='text' id='fname' placeholder='First name' class='textfield'>" );
    
//     $img = $dom->getElementsByTagName("img");
    
//     foreach ( $img as $current ) {
//         $sibling = $current->nextSibling;
//         if ( $sibling->nodeName === "br" )
//             $current->parentNode->removeChild( $sibling );
//     }
    
//     echo $dom->saveHTML();
// }
// header("Location:../account.html")
?>
<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {

    $roomType = $_POST['roomType'];

    switch ($roomType) {
        case 'standard':
            echo "<p> You have successfully reserve a standard Room. </p>";
            break;

        case 'vip' :
            echo "<p> You have successfully reserve a VIP Room. </p>";
            break;

        case 'vvip':
            goto vvip_approval;
    }
    vvip_approval:
    echo "<p>VVIP room requires special Approval </p>"; 

}

?>

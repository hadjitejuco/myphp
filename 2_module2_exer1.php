
<?php
//ticketing system
//code divisible by 3 - regular events
//code divisible by 5 - VIP events
//code divisible by 15 - VVIP events
//code not divible by 3 or 5 - general inquiries


for ($code = 1; $code <=50; $code++){

    //terminate the loop if $code = 50

    if ($code == 50) {
        echo "Processing Terminated: $code<br>";
        break;
    }

    if ($code % 15 ==0){
        echo "Processing VVIP event ticket: $code<br>";
        goto end_of_loop;
    }

    if ($code % 3 != 0 && $code % 5 != 0){
        echo "General inquiry for code $code...skipping <br>";
        continue;
    }

    if ($code % 3 == 0){
        echo "Procesing regular event tickets $code<br>";
    }

     if ($code % 5 == 0){
        echo "Procesing VIP event tickets $code<br>";
    }

    end_of_loop:  //label
    echo "End of Processing for code: $code<br><br>";

}

?>

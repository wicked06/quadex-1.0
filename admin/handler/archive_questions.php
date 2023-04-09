<?php
    include "../connection.php";


        date_default_timezone_set("Etc/GMT+8");
        $query = mysqli_query($link, "SELECT * FROM exam");
        $date = date("Y-m-d");
        while($fetch = mysqli_fetch_array($query)){
                mysqli_query($link, "INSERT INTO a_exam VALUES( '','$fetch[question]','$fetch[opt1]','$fetch[opt2]','$fetch[opt3]','$fetch[opt4]','$fetch[answer]','$fetch[category]','$date')")or die(mysqli_error($link));
                mysqli_query($link, "DELETE FROM exam WHERE category = '$fetch[category]'") or die(mysqli_error($conn));	
        }

?>
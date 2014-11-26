<?php
    include("check.php");
   

    $string = file_get_contents("playerinfo.json");
   $jsonRS = json_decode ($string,true);
    //echo $jsonRS = serialize(json_decode($string));
    
    $playerCounter = 0;
    $activityCounter = 100;
    $historyCounter = 500;


    foreach ($jsonRS as $rs) {
        echo $playerCounter = $playerCounter+1;
         echo "<br>";
        echo $name=$rs["name"]." ";
        echo "<br>";
        $score=$rs["score"]." ";
        echo "<br>";
        $rank=$rs["rank"]." ";
        echo "<br>";
        echo $photo=$rs["photo"]." ";
        echo "<br>";
        //echo $activity1=$rs->activity->activityTitle; 

        foreach($rs["activity"] as $ra)
        {
            echo $activityCounter = $activityCounter+1;
            echo "<br>";
            echo "in activity";
            echo "<br>";
            echo $activityTitle= $ra["activityTitle"]." ";
            echo "<br>";
            echo $activityDetail=$ra["activityDetail"]."";
            echo "<br>";
           
        

            foreach($rs["history"] as $rh)
            {
                echo $historyCounter = $historyCounter+1;
                echo "<br>";
                echo "in history";
                echo "<br>";
                echo $historyTitle=$rh["historyTitle"]." ";
                echo "<br>";
                echo $historyDetail=$rh["historyDetail"]."";
                echo "<br>";
                
            


                echo $sql="INSERT INTO playerinfo (pname, score, rank,photo,activity_title,activity_detail,history_title,history_detail ) 
                VALUES ('$name', '$score', '$rank','$photo','$activityTitle','$activityDetail','$historyTitle','$historyDetail')";
                if ($conn->query($sql) === TRUE) 
                {
                    echo "New record created successfully";
                    echo "<br>";
                }   
                else 
               {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                    echo "<br>";
                }
           }
   }
         
    }

    

    //echo $sql="INSERT INTO playerinfo (pname, score, rank,photo,activity_title,activity_detail,history_title,history_detail ) 
    //VALUES ('$name', '$score', '$rank','$photo','$activityTitle','$activityDetail','$historyTitle','$historyDetail')";



    /*if ($conn->query($sql) === TRUE) 
    {
        echo "New record created successfully";
    }   
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    echo "reached ends";*/
?>


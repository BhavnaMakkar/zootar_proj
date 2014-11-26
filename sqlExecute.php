     <?php
       $conn = new mysqli( 'localhost',$username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    }   
    
     function executeQuery() {
            echo $sql="INSERT INTO playerinfo (pname, score, rank,photo,activity_title,activity_detail,history_title,history_detail ) 
            VALUES ('$name', '$score', '$rank','$photo','$activityTitle','$activityDetail','$historyTitle','$historyDetail')";
            if ($conn->query($sql) === TRUE) 
            {
                echo "New record created successfully";
            }   
            else 
           {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
        ?>
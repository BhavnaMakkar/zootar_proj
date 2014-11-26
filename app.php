<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Game Score Information System </title>
	<link rel="stylesheet"  href="player.css">
	 <?php include("check.php"); ?>


</head>

<body>
  <?php  
  if(isset($_GET['pname']))
                {
                 $rt=$_GET['pname'];
                }
                else
                {
                 
                 $rt="player1";
             
                }
              ?>
   <!--header -->
	<header id="head">
		<p> Game Scoring <span class="red">for <?php echo $rt; ?></span> </p>
	</header>
  <!-- header close -->

  <!-- sidebar -->

	<aside id="sidebar">
		<?php
    
		echo '<table id="tab"> <tr class="tr1"> <td align="center"> <input type"text" placeholder="Type a name" class="input" ></td></tr></table>' ;
	
	     $sql="SELECT DISTINCT pname FROM playerinfo";

            if ($result=mysqli_query($conn,$sql))
            {
 
               while ($row=mysqli_fetch_row($result))
                { $pn=$row[0];
    	          echo '<table  id="table"> <tr> <td > ' ;
                  echo '<a href="app.php?pname=' .$pn . '"  id="link" >'.$pn.'</a>';    
                  echo '</td></tr></table>';

                }
               

 
              mysqli_free_result($result);

            } 

        ?>
             </aside>
    <!--sidebar close-->
    
    <!--whole section -->
    <section id="sec1">
      <!--img section-->
    	<article id ="arc1">
        <div id="img_sec">

    	  <img src="abc.jpg"  alt="Player Image" class="img">
      </div>
      <div id="score_sec">
        <h1 id="heading">Your Score</h1>
        <?php


     $sql="Select DISTINCT score,rank from playerinfo where pname='$rt'";
         if ($result=mysqli_query($conn,$sql))
         {
          while ($row=mysqli_fetch_row($result))
                {
          echo '<div id="rsp">'.$row[0].'</div>';
          echo '<br/>';
          echo '<div id="rsp_r"> Your Rank-'.$row[1].'</div>';
         }
         }
         ?>
      </div>

    		

    	
        </article>
        <!--img sec close-->
        <hr>
       <!--history and activity detail-->
        <article id="arc2"  >
           <?php
            
              $sql="SELECT activity_detail,history_detail FROM playerinfo WHERE pname='$rt'";
             if ($result=mysqli_query($conn,$sql))
            {
 
               echo '<h1 id="heading"> <b>Activity</b> </h1>';
               echo '<span class="para">';
               $eventid=1;
               while ($row=mysqli_fetch_row($result))
                {
    	             echo '<span id="evac"><b>Event'.$eventid.' </b><br>';
                  echo $row[0].'</span><br>'; 

                $eventid++;

                }
                echo '</span>';

                mysqli_free_result($result);

            }
             if ($result=mysqli_query($conn,$sql))
            {
 
               echo '<h1 id="heading"> <b>History</b> </h1>';
               $eventid=1;
               echo '<span class="para">';
               while ($row=mysqli_fetch_row($result))
                {
                   echo '<span id="evac"><b>History'.$eventid.'</b><br>';
                  echo $row[1].'</span><br>'; 

                $eventid++;

                }
                echo '</span>';

                mysqli_free_result($result);

            }  




             
           ?>
    	
        </article>
          <!--his act close-->
    </section>

   
		

	</body>
	</html>




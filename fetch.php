<?php  
 require "dbcon/dbcon.php";  
 $output = '';  
 $sql = "SELECT * FROM deathpersondetails WHERE deadPersonName LIKE '%".$_POST["search"]."%' AND homecity LIKE '%".$_POST["baba"]."%' AND school LIKE '%".$_POST["scl"]."%' AND university LIKE '%".$_POST["uni"]."%' AND employee LIKE '%".$_POST["emp"]."%'";
 $result = mysqli_query($conn, $sql);  
 if(mysqli_num_rows($result) > 0)  
 {  
  //      $output .= '<h4 align="center">Search Result</h4>';  
      $output .= '<div id="drop_box1">
                      <ul class="drop_list">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= ' 
            <li class="drop_item">
                <a href="profile.php?id='.$row["deadPersonID"].'" class="person_link">
                  <div class="image">
                   
              ';
                  $sql_image = "SELECT * FROM deathpersondetails WHERE deadPersonID = '".$row["deadPersonID"]."'";
                  $result_image = mysqli_query($conn, $sql_image);
                     if(mysqli_num_rows($result_image) > 0)  
                     {
                      while($row_img = mysqli_fetch_array($result_image))
                      { 
                      $output .= '<img class="proimg" src = "data:image;base64,'.base64_encode($row['pro_img']).'" width="50px" height="50px">';
                      }
                  }
                $output .='  </div>
                  <div class="text">
                    '.$row["deadPersonName"].'
                    <br>
                    <span class="dis">City :
                    '.$row["homecity"].'
                    </span>
                  </div>
                </a>
            </li> 
            <hr>
           ';  
      }  
      echo $output;  
 }  
 else  
 {  
      echo 'Data Not Found';  
 }  
 ?>  
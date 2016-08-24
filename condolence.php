<html>
<head>
    <title>Condolence Screen</title>

    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu/simple_menu.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/condolence_style.css">
</head>
<body>

<?php include 'temp/header.php';  ?>

<div class = "condol" align="center">
    <div class="conform">
    <?php
        require "dbcon/dbcon.php";

        $error=FALSE;
            $deadnameerr = $visnameerr = $visnicerr = $relationerr = $messageerr = "";
            
            if (isset($_POST['submit'])) {
                
                if(empty($_POST['deadname'])){ 
                    $deadnameerr = "";
                    $error = TRUE;
                }else{
                    $deadname = $_POST['deadname'];
                }
                
                if(empty($_POST['visname'])){ 
                    $visnameerr = "";
                    $error = TRUE;
                }else{
                    $visname = $_POST['visname'];
                }
                
              if(empty($_POST['visnic'])){ 
                    $visnicerr = "";
                    $error = TRUE;
                }else{
                    $visnic = $_POST['visnic'];
                }
                
                if(empty($_POST['relation'])){ 
                    $relationerr = "";
                    $error = TRUE;
                }else{
                    $relation = $_POST['relation'];
                }
                if(empty($_POST['message'])){ 
                    $messagerr = "";
                    $error = TRUE;
                }else{
                    $message = $_POST['message'];
                }
                
                if ($error==FALSE){
               
                $sql = "INSERT INTO visitors (deadname,visname,visnic,relation,message) VALUES ('".$deadname."','".$visname."','".$visnic."','".$relation."','".$message."')";
                if(mysqli_query($conn,$sql)){
                    die();
                } else{echo "error";}
                 
                }
            }
        ?>
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div id="condolence">
            <form id="f3" action="condolence.php" method="post">
            <table id="tb3">
                <tr>
                    <td colspan="2">
                        <h2 id="heading2">Condolence message screen</h2>
                    </td>
                
                </tr>
                 <tr>
                    
                        <td><label for="deadname">Dead Person Name</label><span class="error"><?php echo $deadnameerr;?></span></td>
                        
                        <td><input type="text" name="deadname" id="deadname" required></td>
                
                </tr>
                <tr>
                    
                      <td><label for="visname">visitor Name</label><span class="error"><?php echo $visnameerr;?></span></td>
                        
                    <td> <input type="text" name="visname" id="visname" required></td>
                    
                </tr>
               
                <tr>
                    
                     <td><label for="visnic">Visitor NIC</label><span class="error"><?php echo $visnicerr;?></span></td>
                        
                       <td><input type="visnic" name="visnic" id="visnic" required></td>
                </tr>
                <tr>
                    
                     <td><label for="relation">Relationship</label><span class="error"><?php echo $relationerr;?></span></td>
                        
                       <td><input type="text" name="relation" id="relation" required></td>
                </tr>
                 <tr>
                    
                       <td><label for="message"></label><span class="error"><?php echo $messageerr;?></span></td>
                
                     <td> <textarea name="message" id="message" rows="10" cols="60" placeholder="Input your condolence message here" required></textarea></td>
                
                </tr>
                 <tr>
                    <td colspan="2">
                        <input type="submit" value="Submit" name="submit"> 
                        <input type="reset" value="Cancle" name="cancle">
                    </td>
                
                </tr>
                
                
                </table>
            </form>
            </div>
        </form>
    </div>
</div>

    <!-- include footer -->
    <?php include 'temp/footer.php';  ?>
    </body>
</html>
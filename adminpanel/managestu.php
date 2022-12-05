<?php
    include("session_validate.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    
    <title>Student review</title>
    <link href="assets/img/icon.png" rel="shortcut icon"/>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css?v=<?php echo time(); ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>       
          
    <div id="wrapper">
         <div class="navbar navbar-inverse" style="margin-bottom: 0px;">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                      <h1 class="heading">Admin panel</h1>
                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="logout.php" style="color:#fff;">Logout</a>  
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu" style="margin-top: -50px;">
                 
                    <li>
                        <a href="manageclg.php"><i class="fa fa-edit "></i>Manage colleges</a>
                    </li>
                   
                    <li class="active-link">
                        <a href="managestu.php"><i class="fa fa-edit "></i>Manage students</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Manage students</h2>
                     <hr>   
                    </div>
                 <!-- /. ROW  -->

                  <div class="col-lg-6 col-md-6">

                    <?php
                        if (isset($_REQUEST['suc'])) {
                            ?>
                        <div class="alert alert-success" style="width: 1150px;">
                             <strong>Record deleted successfully ! </strong> 
                        </div>
                            <?php
                        }
                    ?>

                        <?php
                            require_once("../connection.php");
                                    $query="SELECT * FROM `college_info` where approved=1;";
                                    $sql=mysqli_query($con,$query);
                                    if(mysqli_num_rows($sql) > 0)          
                                    {
                                        while($row = mysqli_fetch_assoc($sql))
                                        {
                                            $clgname=$row['collegename'];
                                            $clgid=$row['collegeid'];
                                            ?>

                                            <div class="row">
                                                <div class="col-md-12">
                                                 <h4 style="margin-top: 30px;"><?php echo $clgname;?></h4>
                                                <hr style="width: 1180px;">
                                                </div>
                                            </div>              
                                             <!-- /. ROW  -->
                                            <div class="table-responsive">
                                                <table class="table tbl">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Email</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>View data</th>
                                                            <th>Delete data</th>
                                                        </tr>
                                                    </thead>

                                                <?php
                                                    
                                                        $no=0;
                                                        $stuquery="SELECT * FROM `student_details` where collegeid=$clgid";
                                                        $stusql=mysqli_query($con,$stuquery);
                                                        if(mysqli_num_rows($stusql) > 0)          
                                                        {
                                                            while($row = mysqli_fetch_assoc($stusql))
                                                            {
                                                                $no=$no+1;
                                                                $id=$row['studentid'];
                                                                $email=$row['email'];
                                                                $fname=$row['fname'];
                                                                $lname=$row['lname'];
                                                                
                                                                ?>

                                                                <tbody>
                                                                    <tr class="info">
                                                                        <td><?php echo"$no";?></td>
                                                                        <td><?php echo"$email";?></td>
                                                                        <td><?php echo"$fname";?></td>
                                                                        <td><?php echo"$lname";?></td>
                                                                        <td><a href="viewstu.php?id=<?php echo $id; ?>">View</a></td>
                                                                        <td><a href="deletestu.php?id=<?php echo $id; ?>">Delete</a></td>
                                                                    </tr>
                                                                </tbody>

                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <td style="font-size: 20px; font-weight: 600; color: grey;">No records found...</td>
                                                            <?php
                                                        }
                                                        
                                                ?>
                                                </table>
                                            </div>
                                            <?php
                                        }
                                    }
                            require_once("../closeconnection.php");
                        ?>

                    </div>
                </div>
                 <!-- /. ROW  -->           
    		</div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->
    </div>
    <div class="footer">
            <div class="row">
                <div class="col-lg-12" >
                    &copy; 2020. All Rights Reserved. | Design by: <a style="color:#fff;" target="_blank">Student review</a>
                </div>
            </div>
    </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

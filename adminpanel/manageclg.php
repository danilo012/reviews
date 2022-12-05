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
                 
                    <li class="active-link">
                        <a href="manageclg.php"><i class="fa fa-edit "></i>Manage colleges</a>
                    </li>
                   
                    <li>
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
                     <h2>Manage colleges</h2>
                     <hr>   
                    </div>
                
                <!-- /. ROW  -->             

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
                        if (isset($_REQUEST['suc-approve'])) {
                            ?>
                        <div class="alert alert-success" style="width: 1150px;">
                             <strong>Record approved successfully ! </strong> 
                        </div>
                            <?php
                        }
                ?>

                <div class="row">
                    <div class="col-md-12">
                     <h4 style="margin-top: 30px; margin-left: 15px;">Colleges remaining to approve</h4>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr/>

                <div class="col-lg-6 col-md-6">

                        <div class="table-responsive">
                            <table class="table tbl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Email</th>
                                        <th>College Name</th>
                                        <th>View data</th>
                                        <th>Delete data</th>
                                        <th>Approve data </th>                                        
                                    </tr>
                                </thead>
                            <?php
                                
                                    $no=0;
                                    require_once("../connection.php");
                                    $query2="SELECT * FROM `college_info` where approved=0;";
                                    $sql2=mysqli_query($con,$query2);
                                    if(mysqli_num_rows($sql2) > 0)          
                                    {
                                        while($row = mysqli_fetch_assoc($sql2))
                                        {
                                            $no=$no+1;
                                            $id=$row['collegeid'];
                                            $email=$row['email'];
                                            $clgname=$row['collegename'];
                                            
                                            ?>

                                            <tbody>
                                                <tr class="info">
                                                    <td><?php echo"$no";?></td>
                                                    <td><?php echo"$email";?></td>
                                                    <td><?php echo"$clgname";?></td>
                                                    <td><a href="viewclg.php?id=<?php echo $id; ?>">View</a></td>
                                                    <td><a href="deleteclg.php?id=<?php echo $id; ?>">Delete</a></td>
                                                    <td><a href="approveclg.php?id=<?php echo $id; ?>">Approve</a></td>
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
                    </div>

                    <div class="row">
                    <div class="col-md-12">
                     <h4 style="margin-top: 30px; margin-left: 15px;">Approved colleges</h4>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr/>

                <div class="col-lg-6 col-md-6">
                        <div class="table-responsive">
                            <table class="table tbl">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Email</th>
                                        <th>College Name</th>
                                        <th>View data</th>
                                        <th>Delete data</th>
                                    </tr>
                                </thead>
                                <?php
                                
                                    $no=0;
                                    $query="SELECT * FROM `college_info` where approved=1;";
                                    $sql=mysqli_query($con,$query);
                                    if(mysqli_num_rows($sql) > 0)          
                                    {
                                        while($row = mysqli_fetch_assoc($sql))
                                        {
                                            $no=$no+1;
                                            $id=$row['collegeid'];
                                            $email=$row['email'];
                                            $clgname=$row['collegename'];
                                            
                                            ?>

                                            <tbody>
                                                <tr class="info">
                                                    <td><?php echo"$no";?></td>
                                                    <td><?php echo"$email";?></td>
                                                    <td><?php echo"$clgname";?></td>
                                                    <td><a href="viewclg.php?id=<?php echo $id; ?>">View</a></td>
                                                    <td><a href="deleteclg.php?id=<?php echo $id; ?>">Delete</a></td>
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
                                    require_once("../closeconnection.php");

                            ?>
                            </table>
                        </div>
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

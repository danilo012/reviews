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
                    </div>
                </div>              
                 <!-- /. ROW  -->
                <hr/>

                <div class="row">
                    <div class="col-md-12">
                     <h4 style="margin-top: 30px;">Student details</h4>   
                    </div>
                 <!-- /. ROW  -->
                <hr/>

                <div class="col-lg-6 col-md-6">
                        <div class="table-responsive">
                            <table class="table tbl" style="margin-bottom: 30px;">
                                    
                            <?php
                                
                                    require_once("../connection.php");
                                    $id=$_REQUEST['id'];
                                    $query="SELECT
                                                *, 
                                                course,
                                                collegename
                                            FROM
                                                student_details
                                            RIGHT JOIN
                                                college_info USING (collegeid)
                                            RIGHT JOIN
                                                course_details USING (courseid)
                                            where studentid=$id";
                                    $sql=mysqli_query($con,$query);
                                    if(mysqli_num_rows($sql) > 0)          
                                    {
                                        while($row = mysqli_fetch_assoc($sql))
                                        {
                                            $email=$row['email'];
                                            $fname=$row['fname'];
                                            $lname=$row['lname'];
                                            $gender=$row['gender'];
                                            $mob=$row['mobno'];
                                            $enno=$row['enno'];
                                            $sem=$row['sem'];
                                            $clgname=$row['collegename'];
                                            $course=$row['course'];
                                            $addr=$row['address'];
                                        }
                                    }
                                    require_once("../closeconnection.php");

                            ?>

                                    <tr>
                                        <th>Email</th>
                                       	<td class="info"><?php echo "$email";?></td>
                                    </tr>
                                    <tr>
                                        <th>First name</th>
                                       	<td class="info"><?php echo "$fname";?></td>
                                    </tr>
                                    <tr>
                                        <th>Last type</th>
                                       	<td class="info"><?php echo "$lname";?></td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                       	<td class="info"><?php echo "$gender";?></td>
                                    </tr>
                                    <tr>
                                        <th>Mobile no.</th>
                                       	<td class="info"><?php echo "$mob";?></td>
                                    </tr>
                                    <tr>
                                        <th>Enrolment no.</th>
                                       	<td class="info"><?php echo "$enno";?></td>
                                    </tr>
                                    <tr>
                                        <th>Semester</th>
                                       	<td class="info"><?php echo "$sem";?></td>
                                    </tr>
                                    <tr>
                                        <th>College name</th>
                                       	<td class="info"><?php echo "$clgname";?></td>
                                    </tr>
                                    <tr>
                                        <th>Course</th>
                                       	<td class="info"><?php echo "$course";?></td>
                                    </tr>
                                    <tr>
                                        <th>Address</th>
                                       	<td class="info"><?php echo "$addr";?></td>
                                    </tr>
                            </table>

                            <a class="back-btn" href="managestu.php">Back</a>

                        </div>
                    </div>
                 <!-- /. ROW  --> 
                 </div>          
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

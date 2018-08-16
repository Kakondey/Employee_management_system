<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= Admin_Signin.php");
    }
    else{
        error_reporting(0);
        include_once('../../config/dbconnect.php');
    }

       $Department_name = "";

    if (isset($_POST['Add'])) {
        $Department_name = $_POST['Department_name'];
    

        $sql = "INSERT INTO department(Department_name) VALUES ('$Department_name')";    

        if (mysqli_query($conn, $sql)) 
        {
            $successmsz = 'New Department Added.';
            header("refresh:1; url=Add_new_department.php");
        }
        else
        {
            $errormsz = mysqli_error($conn);
        }

    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../../Assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='../../Assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
        <div class="navbar navbar-fixed-top ">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="../Dashboard.php">Dashboard</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav">
                            <li><a class="options" href="Add_new_employee.php">Add New Employee</a></li>
                            <li><a class="options" href="../lists/employee_list.php">Employee List</a></li>
                            <li><a class="options" href="Add_new_department.php">Add new Department</a></li>
                            <li><a class="options" href="../lists/department_list.php">Department List</a></li>
                         </ul>   
                        <ul class="nav pull-right">
                            <li><a class="options" href="../../config/logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span9"  style="margin-left: 150px;">
                        <div class="content">
                            <div class="module">
                                <div class="module-head">
                                    <center><h3>Add Department</h3></center>
                                </div>
                                <div class="module-body">

                                        <?php
                                                if(isset($successmsz))
                                                 {
                                                  ?>
                                                  <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                                    <a href="signin.php"><?php echo $successmsz; ?><a/> 
                                                  </div>
                                                  <?php
                                                }
                                           ?>

                                        <br />

                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                            <div class="control-group">
                                                <label class="control-label" for="Department_name">Department Name</label>
                                                <div class="controls">
                                                    <input type="text" id="Department_name" name="Department_name" class="span8"><br><br>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <div class="controls">
                                                    <button name="Add" type="submit" class="btn btn-primary btn-xl" onclick="checkFields()">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div><!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <script src="../../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../../Assets/scripts/common.js" type="text/javascript"></script>

    </body>

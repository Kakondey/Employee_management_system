<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= ../Admin_Signin.php");
    }
    else{
        include_once('../../config/dbconnect.php');
    }

        $Publication_name = "";
        $Publication_type = "";
        $co_authors = "";
        $Employee = "";


    if (isset($_POST['Add'])) {
        $Publication_name = $_POST['Publication_name'];
        $Publication_type = $_POST['Publication_type'];
        $co_authors = $_POST['co_authors'];
        $Employee = $_POST['Employee'];

        $sqlP = "INSERT INTO publication(Publication_name, Publication_type, co_authors, employee_name) 
                VALUES ('$Publication_name','$Publication_type','$co_authors','$Employee')";    

                
        if (mysqli_query($conn, $sqlP)) 
        {
            $successmsz = 'Employee Publication Added.';
            header("refresh:1; url=../Dashboard.php");
        }
        else
        {
            echo $errormsz = mysqli_error($conn);
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
            <div class="container" style="height: 15000px;">
                <div class="row">
                    <div class="span9"  style="margin-left: 150px;">
                        <div class="content">
                        <div class="module">
                            <div class="module-body">

                                    <?php
                                            if(isset($successmsz))
                                            {
                                              ?>
                                              <div class="alert alert-success">
                                                <a href="#"><?php echo $successmsz; ?><a/> 
                                              </div>
                                              <?php
                                            }
                                       ?>

                                    <br />

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                        <br><hr><center><h3>Add Publication Details</h3></center><hr><br>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="Publication_name">Publication Name</label>
                                            <div class="controls">
                                                <input type="text" id="Publication_name" name="Publication_name" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Publication_type">Publication type</label>
                                            <div class="controls">
                                                <input type="text" id="Publication_type"
                                                name="Publication_type" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="co_authors">Co Authors</label>
                                            <div class="controls">
                                                <input type="text"
                                                name="co_authors" id="co_authors" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Employee</label>
                                            <div class="controls">
                                                <select name="Employee" class="span8">
                                                    <option selected="selected">--Select Employee--</option>
                                                    <?php
                                                        $queryC = "SELECT * FROM employee_details";
                                                        $resultC = mysqli_query($conn,$queryC);
                                                        while($rowC=mysqli_fetch_assoc($resultC))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $rowC['Employee_name']; ?>"><?php echo $rowC['Employee_name']; ?></option>
                                                            <?php
                                                        } 
                                                    ?> 
                                            </select>
                                            </div>
                                        </div>
         
                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Add" type="submit" class="btn btn-primary btn-xl">Add</button>
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

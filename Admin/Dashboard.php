<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= Admin_Signin.php");
    }
    else{
        error_reporting(0);
        include_once('../config/dbconnect.php');
    }

        $keywords = "";

        $E_id = "";
        $Employee_name = "";
        $Employee_phoneno = "";
        $designation = "";
        $Employee_address = "";
        $organization = "";
        $department = "";
        $status = "";

        $P_id = "";
        $Publication_name = "";
        $Publication_type = "";
        $co_authors = "";

        $S_id = "";
        $Gross_salary = "";
        $Total_salary = "";
        $Net_salary = "";
        $Deducation = "";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel</title>
        <link type="text/css" href="../Assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/theme.css" rel="stylesheet">
        <link type="text/css" href="../Assets/bootstrap/css/custom.css" rel="stylesheet">
        <link type="text/css" href="../Assets/images/icons/css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='../Assets/http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body  background="../Assets/images/dashboard.jpg">
        <div class="navbar navbar-fixed-top ">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="Dashboard.php">Dashboard</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav">
                            <li><a class="options" href="forms/Add_new_employee.php">Add New Employee</a></li>
                            <li><a class="options" href="lists/employee_list.php">Employee List</a></li>
                            <li><a class="options" href="forms/Add_new_department.php">Add new Department</a></li>
                            <li><a class="options" href="lists/department_list.php">List Department</a></li>
                            <li><a class="options" href="forms/Add_new_publication.php">Publication</a></li>
                            <form class="navbar-search pull-left input-append" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                            <input type="search" name="keywords" placeholder="Search..." class="span3">
                            </form>
                        </ul>
                        <ul class="nav pull-right">
                            <li><a class="options" href="../config/logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container" style="height: 15000px; " >
                <div class="row">
                    <div class="span9" style="margin-left: 150px;" background="Assets/images/dashboard.jpg">
                        
                        <div class="content">
                                <img src="dashboard.jpg" style="border-radius: 10px; float: 50px;">
                             <?php 

                                if (isset($_POST['keywords'])) 
                                {
                                    $keywords = $conn->escape_string($_POST['keywords']);

                                    $query1 = mysqli_query($conn,"SELECT * FROM employee_details
                                              WHERE E_id LIKE '%$keywords%' OR Employee_name LIKE '%$keywords%'
                                              OR department LIKE '%$keywords%' OR Employee_name LIKE '%$keywords%'
                                              OR Employee_name LIKE '%$keywords%' OR Employee_name LIKE '%$keywords%'");
                                    $num_rows1 = mysqli_num_rows($query1);

                                    while ($row1 = mysqli_fetch_array($query1)) {
                                        $E_id = $row1['E_id'];
                                        $Employee_name = $row1['Employee_name'];
                                        $Employee_phoneno = $row1['Employee_phoneno'];
                                        $designation = $row1['designation'];
                                        $Employee_address = $row1['Employee_address'];
                                        $organization = $row1['organization'];
                                        $department = $row1['department'];
                                        $status = $row1['status'];
                                   

                             ?>
                             <div class="module" style="">
                            <div class="module-head">
                                <h3 style="text-align: center;">Employee Details</h3>
                            </div>
                            <div class="module-body">
                                    <br />

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                        <input type="hidden" id="E_id" value="<?php echo $E_id; ?>" name="E_id" class="span8"><br><br>

                                        <div class="control-group">
                                            <label class="control-label" for="Employee_name">Employee Name : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Employee_name; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Phone Number : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Employee_phoneno; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="designation">Designation : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $designation; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Employee_address">Address : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Employee_address; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="organization">Organization : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $organization; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="department">Department : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $department; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="status">status : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $status; ?></p>
                                            </div>
                                        </div>

                                        <?php 

                                                    // quering the publication details.
                                                $sqlP = "SELECT * FROM publication WHERE employee_name='$Employee_name'";
                                                $eQueryP = mysqli_query($conn,$sqlP);
                                                if (mysqli_num_rows($eQueryP)>0){
                                                while($rowP = mysqli_fetch_object($eQueryP)){

                                                $P_id = $rowP->P_id;
                                                $Publication_name = $rowP->Publication_name;
                                                $Publication_type = $rowP->Publication_type;
                                                $co_authors = $rowP->co_authors;
                                            

                                         ?>
                                         <hr>
                                        <div><h5 style="color: white; text-align: center;">Publication Details</h5></div>
                                         <hr>

                                        <div class="control-group">
                                            <label class="control-label" for="Publication_name">Publication Name : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Publication_name; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Publication_type">Publication Type : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Publication_type; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="co_authors">Co Author : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $co_authors; ?></p>
                                            </div>
                                        </div>

                                        <?php 
                                            }}
                                            $sqlS = "SELECT * FROM salary WHERE S_id='$E_id'";
                                            $queryS = mysqli_query($conn,$sqlS);
                                            if (mysqli_num_rows($queryS)>0){
                                            while($rowS = mysqli_fetch_object($queryS)){

                                                $S_id = $rowS->S_id;
                                                $Gross_salary = $rowS->Gross_salary;
                                                $Total_salary = $rowS->Total_salary;
                                                $Net_salary = $rowS->Net_salary;
                                                $Deducation = $rowS->Deducation;
                                            

                                         ?>

                                        <hr>
                                        <div><h5 style="color: white; text-align: center;">Salary Details</h5></div>
                                         <hr>

                                         <div class="control-group">
                                            <label class="control-label" for="Gross_salary">Gross Salary : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Gross_salary; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Total_salary">Total Salary : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Total_salary; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Net_salary">Net Salary : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Net_salary; ?></p>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Deducation">Deducation : </label>
                                            <div class="controls">
                                                <p style="margin-top: 5px;"><?php echo $Deducation; ?></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            }}  }
                                } ?>
                        </div>
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <script src="../Assets/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="../Assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="../Assets/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="../Assets/scripts/common.js" type="text/javascript"></script>

    </body>

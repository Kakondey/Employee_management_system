<?php

    session_start();
    if (!isset($_SESSION['Admin_name'])) {
        header("refresh:1; url= ../Admin_Signin.php");
    }
    else{
        //error_reporting(0);
        include_once('../../config/dbconnect.php');
    }

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

    if (isset($_POST['Update'])) {
        $Employee_name = $_POST['Employee_name'];
        $Employee_phoneno = $_POST['Employee_phoneno'];
        $designation = $_POST['designation'];
        $Employee_address = $_POST['Employee_address'];
        $organization = $_POST['organization'];
        $department = $_POST['department'];
        $status = $_POST['status'];

        $Publication_name = $_POST['Publication_name'];
        $Publication_type = $_POST['Publication_type'];
        $co_authors = $_POST['co_authors'];

        $Gross_salary = $_POST['Gross_salary'];
        $Total_salary = $_POST['Total_salary'];
        $Net_salary = $_POST['Net_salary'];
        $Deducation = $_POST['Deducation'];

         $sqlu = "UPDATE employee_details SET Employee_name='$_POST[Employee_name]',
                 Employee_phoneno='$_POST[Employee_phoneno]',designation='$_POST[designation]',
                Employee_address='$_POST[Employee_address]',organization='$_POST[organization]',
                department='$_POST[department]',status='$_POST[status]' 
                WHERE E_id='$_POST[E_id]'";

        $sqluP = "UPDATE publication SET Publication_name='$_POST[Publication_name]',
                 Publication_type='$_POST[Publication_type]',co_authors='$_POST[co_authors]'
                WHERE P_id='$_POST[P_id]'";

        $sqluS = "UPDATE salary SET Gross_salary='$_POST[Gross_salary]',
                 Total_salary='$_POST[Total_salary]',Net_salary='$_POST[Net_salary]',
                Deducation='$_POST[Deducation]'
                WHERE S_id='$_POST[S_id]'"; 

        mysqli_query($conn, $sqlu);
        mysqli_query($conn, $sqluP);

        if (mysqli_query($conn, $sqluS)) 
        {
            $successmsz = 'Employee successfully Updated';
            header("refresh:1; url=../lists/employee_list.php");
        }
        else
        {
            $errormsz = mysqli_error($conn);
        }

    }

    if (isset($_GET['edit'])) {
        $sqlE = "SELECT * FROM employee_details WHERE E_id='{$_GET['E_id']}'";
        $eQuery = mysqli_query($conn,$sqlE);
        $row = mysqli_fetch_object($eQuery);



        $sqlEP = "SELECT * FROM publication WHERE employee_name='{$row->Employee_name}'";
        $eQueryP = mysqli_query($conn,$sqlEP);
        $rowP = mysqli_fetch_object($eQueryP);

        $sqlES = "SELECT * FROM salary WHERE S_id='{$_GET['E_id']}'";
        $eQueryS = mysqli_query($conn,$sqlES);
        $rowS = mysqli_fetch_object($eQueryS);

        $E_id = $row->E_id;
        $Employee_name = $row->Employee_name;
        $Employee_phoneno = $row->Employee_phoneno;
        $designation = $row->designation;
        $Employee_address = $row->Employee_address;
        $organization = $row->organization;
        $department = $row->department;
        $status = $row->status;

        $P_id = $rowP->P_id;
        $Publication_name = $rowP->Publication_name;
        $Publication_type = $rowP->Publication_type;
        $co_authors = $rowP->co_authors;

        $S_id = $rowS->S_id;
        $Gross_salary = $rowS->Gross_salary;
        $Total_salary = $rowS->Total_salary;
        $Net_salary = $rowS->Net_salary;
        $Deducation = $rowS->Deducation;

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
                            <div class="module-head">
                                <center><h3>Add Employee Details</h3></center>
                            </div>
                            <div class="module-body">

                                    <?php
                                            if(isset($successmsz))
                                            {
                                              ?>
                                              <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert">×</button>
                                                <a href="Add_new_employee.php"><?php echo $successmsz; ?><a/> 
                                              </div>
                                              <?php
                                            }
                                       ?>

                                    <br />

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal row-fluid" >

                                        <input type="hidden" id="E_id" value="<?php echo $E_id; ?>" name="E_id" class="span8">

                                        <div class="control-group">
                                            <label class="control-label" for="Employee_name">Employee Name</label>
                                            <div class="controls">
                                                <input type="text" id="Employee_name" value="<?php echo $Employee_name; ?>" name="Employee_name" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Employee_phoneno">Phone number</label>
                                            <div class="controls">
                                                <input type="number" id="Employee_phoneno" value="<?php echo $Employee_phoneno; ?>" name="Employee_phoneno" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="designation">Designation</label>
                                            <div class="controls">
                                                <input type="text" name="designation" id="designation"  value="<?php echo $designation; ?>" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Employee_address">Address</label>
                                            <div class="controls">
                                                <input type="text" name="Employee_address" id="Employee_address"  
                                                value="<?php echo $Employee_address; ?>" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="organization">Organization</label>
                                            <div class="controls">
                                                <input type="text" name="organization" id="organization" value="<?php echo $organization; ?>" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="department">Department</label>
                                            <div class="controls">
                                                <input type="text" name="department" id="department" value="<?php echo $department; ?>" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label">Status</label>
                                            <div class="controls">
                                                <label class="radio inline">
                                                    <input type="radio" name="status" id="optionsRadios1" 
                                                    value="Active"<?php echo ($status=='Active')?"checked":""; ?> >
                                                    Active
                                                </label> 
                                                <label class="radio inline">
                                                    <input type="radio" name="status" id="optionsRadios2"
                                                     value="InActive"<?php echo ($status=='InActive')?"checked":""; ?> >
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>

                                        <br><hr><center><h3>Add Publication Details</h3></center><hr><br>

                                        <input type="hidden" id="P_id" value="<?php echo $P_id; ?>" name="P_id" class="span8">
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="Publication_name">Publication Name</label>
                                            <div class="controls">
                                                <input type="text" id="Publication_name" value="<?php echo $Publication_name; ?>" name="Publication_name" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Publication_type">Publication type</label>
                                            <div class="controls">
                                                <input type="text" id="Publication_type" value="<?php echo $Publication_type; ?>" name="Publication_type" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="co_authors">Co Authors</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $co_authors; ?>" name="co_authors" id="co_authors" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <br><hr><center><h3>Add Salary Details</h3></center><hr><br>

                                        <input type="hidden" id="S_id" value="<?php echo $S_id; ?>" name="S_id" class="span8">
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="Gross_salary">Gross Salary</label>
                                            <div class="controls">
                                                <input type="text" id="Gross_salary" value="<?php echo $Gross_salary; ?>" name="Gross_salary" class="span8"><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Total_salary">Total Salary</label>
                                            <div class="controls">
                                                <input type="text" id="Total_salary" value="<?php echo $Total_salary; ?>" name="Total_salary" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Net_salary">Net Salary</label>
                                            <div class="controls">
                                                <input type="text" value="<?php echo $Net_salary; ?>" name="Net_salary" id="Net_salary" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="Deducation">Deducation</label>
                                            <div class="controls">
                                                <input type="text" name="Deducation" value="<?php echo $Deducation; ?>" id="Deducation" class="span8" required><br><br>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <div class="controls">
                                                <button name="Update" type="submit" class="btn btn-primary btn-xl" onclick="checkFields()">Update</button>
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

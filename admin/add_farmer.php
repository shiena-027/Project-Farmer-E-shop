<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();



if(isset($_POST['submit']))          
{

if(empty($_POST['c_name'])||empty($_POST['fr_name'])||$_POST['email']==''||$_POST['phone']==''||$_POST['frm_name']==''||$_POST['o_hr']==''||$_POST['c_hr']==''||$_POST['o_days']==''||$_POST['address']=='')
{	
        $error = 	'<div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>All fields Must be Fillup!</strong>
                        </div>';


                        
		}
	else
		{
		
$fname = $_FILES['file']['name'];
            $temp = $_FILES['file']['tmp_name'];
            $fsize = $_FILES['file']['size'];
            $extension = explode('.',$fname);
            $extension = strtolower(end($extension));  
            $fnew = uniqid().'.'.$extension;

            $store = "prod_img/".basename($fnew);                      

if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
{        
                if($fsize>=1000000)
                    {


$error = 	'<div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Max Image Size is 1024kb!</strong> Try different Image.
            </div>';

                    }

                else
                    {
                            
                            
$fr_name=$_POST['fr_name'];
    
$sql = "INSERT INTO farmer(c_id,title,email,phone,,o_hr,c_hr,o_days,address,image) VALUE('".$_POST['c_name']."','".$fr_name."','".$_POST['email']."','".$_POST['phone']."','".$_POST['frm_name']."','".$_POST['o_hr']."','".$_POST['c_hr']."','".$_POST['o_days']."','".$_POST['address']."','".$fnew."')";  // store the submited data ino the database :images
mysqli_query($db, $sql); 
move_uploaded_file($temp, $store);

    $success = 	'<div class="alert alert-success alert-dismissible fade show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    New Farmer Added Successfully.
            </div>';


                    }
}
elseif($extension == '')
{
    $error = 	'<div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>select image</strong>
                                        </div>';
}
else{

$error = 	'<div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>invalid extension!</strong>png, jpg, Gif are accepted.
                </div>';
    }               
	   
	   }

}

?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
<title>Add Farmer</title>
<link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="css/helper.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">

<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div>

<div id="main-wrapper">

    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <div class="navbar-header">
                <a class="navbar-brand" href="dashboard.php">

<span>
<img src="images/icn.png" alt="homepage" class="dark-logo" style="width: 32px; height: 32px; object-fit: contain;" />
</span>                                    
</a>
            </div>
            <div class="navbar-collapse">

                <ul class="navbar-nav mr-auto mt-md-0">


</ul>

<ul class="navbar-nav my-lg-0">
    <li class="nav-item dropdown">

        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
            <ul>
                <li>
                    <div class="drop-title">Notifications</div>
                </li>

                <li>
                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                </li>
            </ul>
        </div>
    </li>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/user-icn.png" alt="user" class="profile-pic" /></a>
                        
                                <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                            
                    </li>
                    </ul>
                </div>
            </nav>
        </div>
            </ul>
        </div>
    </nav>
</div>

<div class="left-sidebar">
                            

<div class="scroll-sidebar">

    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="nav-devider"></li>
            <li class="nav-label">Home</li>
            <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
            <li class="nav-label">Log</li>
            <li> <a href="all_users.php"> <span><i class="fa fa-user f-s-20 "></i></span><span>Users</span></a></li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-leaf f-s-20 color-warning"></i><span class="hide-menu">Farmer</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="all_farmer.php">All Farmers</a></li>
                    <li><a href="add_category.php">Add Product Category</a></li>
                    <li><a href="add_farmer.php">Add Farmer</a></li>
                    
                </ul>
            </li>
            <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="hide-menu">Product</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="all_product.php">All Products</a></li>
                    <li><a href="add_product.php">Add Product</a></li>


                </ul>
            </li>
            <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>

        </ul>
    </nav>

</div>
                          
</div>

<div class="page-wrapper">
<div style="padding-top: 10px;">
</div>
<div class="container-fluid">

<?php  echo $error;
echo $success; ?>

<div class="col-lg-12">
<div class="card card-outline-primary">
<div class="card-header">
<h4 class="m-b-0 text-white">Add Farmer</h4>
</div>
<div class="card-body">
<form action='' method='post' enctype="multipart/form-data">
<div class="form-body">

<hr>
<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Farmer's Name</label>
            <input type="text" name="fr_name" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group has-danger">
            <label class="control-label">Business E-mail</label>
            <input type="text" name="email" class="form-control form-control-danger">
        </div>
    </div>
                                                    
</div>

<div class="row p-t-20">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Phone </label>
            <input type="text" name="phone" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
    <div class="form-group has-danger">
        <label class="control-label">Farm Name</label>
        <input type="text" name="frm_name" class="form-control form-control-danger">
    </div>
</div>
</div>




<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Available From (Hours)</label>
            <select name="o_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                <option>--Select your Hours--</option>
                <option value="6am">6am</option>
                <option value="7am">7am</option>
                <option value="8am">8am</option>
                <option value="9am">9am</option>
                <option value="10am">10am</option>
                <option value="11am">11am</option>
                <option value="12pm">12pm</option>
            </select>
        </div>
    </div>
                                                      

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Available Until (Hours)</label>
            <select name="c_hr" class="form-control custom-select" data-placeholder="Choose a Category">
                <option>--Select your Hours--</option>
                <option value="3pm">3pm</option>
                <option value="4pm">4pm</option>
                <option value="5pm">5pm</option>
                <option value="6pm">6pm</option>
                <option value="7pm">7pm</option>
                <option value="8pm">8pm</option>
                <option value="9pm">9pm</option>
                <option value="10pm">10pm</option>
                <option value="11pm">11pm</option>
                <option value="12am">12am</option>
                <option value="1am">1am</option>
                <option value="2am">2am</option>
                <option value="3am">3am</option>
            </select>
        </div>
    </div>
                                                     

    <div class="col-md-6">
        <div class="form-group">
            <label class="control-label">Available Days</label>
            <select name="o_days" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                <option>--Select your Days--</option>
                <option value="Mon-Tue">Mon-Tue</option>
                <option value="Mon-Wed">Mon-Wed</option>
                <option value="Mon-Thu">Mon-Thu</option>
                <option value="Mon-Fri">Mon-Fri</option>
                <option value="Mon-Sat">Mon-Sat</option>
                <option value="24hr-x7">24/7</option>
            </select>
        </div>
    </div>


    <div class="col-md-6">
        <div class="form-group has-danger">
            <label class="control-label">Farm Image</label>
            <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
        </div>
    </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">Select Product Category</label>
                <select name="c_name" class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                    <option>--Select Category--</option>
                    <?php $ssql ="select * from p_category";
    $res=mysqli_query($db, $ssql); 
    while($row=mysqli_fetch_array($res))  
    {
        echo' <option value="'.$row['c_id'].'">'.$row['c_name'].'</option>';
    }  
    
    ?>
                </select>
            </div>
        </div>



    </div>

    <h3 class="box-title m-t-40">Farm Location</h3>
    <hr>
    <div class="row">
        <div class="col-md-12 ">
            <div class="form-group">

                <textarea name="address" type="text" style="height:100px;" class="form-control"></textarea>
            </div>
        </div>
    </div>
            </div>
                    </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                            <a href="add_farmer.php" class="btn btn-inverse">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php include "include/footer.php" ?>
        </div>

    </div>

    </div>

</div>

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Bootstrap (including Popper.js) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js"></script>

<!-- SlimScroll -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

<!-- Sticky Kit -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sticky-kit/1.1.3/sticky-kit.min.js"></script>

<!-- Custom Scripts (Local) -->
<script src="js/sidebarmenu.js"></script> <!-- Custom script, needs to be local or hosted online -->
<script src="js/custom.min.js"></script>   <!-- Custom script, needs to be local or hosted online -->
<script src="js/scripts.js"></script>      <!-- Custom script, needs to be local or hosted online -->


</body>

</html>
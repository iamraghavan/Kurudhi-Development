<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location:index.php');
}
require '../php/config.php';
$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id='$_SESSION[id]'");
$fetch = mysqli_fetch_array($query);
?>

<?php
require '../php/config.php';
$query = mysqli_query($conn, "SELECT * FROM tbl_registration INNER JOIN tbl_user on user_id = '$_SESSION[id]'");
$mysql_data = mysqli_fetch_array($query);
?>

<?php
//  $connect = mysqli_connect("localhost", "root", "", "kurudhi");  
//  $sql = "";  
//  $result = mysqli_query($connect, $sql);  
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    echo "<title>" . $fetch['username'] . " Dashboard </title>"
        ?>


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="./assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    <link rel="shortcut icon" href="./assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img
                                    src="https://firebasestorage.googleapis.com/v0/b/kurudhiweb.appspot.com/o/Assets%2Fkurudhi.png?alt=media&token=36c998ed-264c-42f2-84ef-f28e08f7d7dd"
                                    alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="javascript:void(0)" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="javascript:void(0)" class='sidebar-link'>
                                <i class="bi bi-person-lines-fill"></i>
                                <span>Edit Profile Data</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="./logout.php" class='sidebar-link'>
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>


                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body py-4 px-3">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <?php
                                        require '../php/config.php';


                                        $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id='$_SESSION[id]'");
                                        $fetch = mysqli_fetch_array($query);

                                        echo "<h5 class='font-bold'>" . $fetch['username'] . "</h5>";
                                        echo "<h6 class='text-muted mb-0'>" . $fetch['email'] . "</h6>";
                                        ?>


                            </div>


                            <div class="col-12 col-md-9 order-md-1 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">

                                        <form action="" method="post">
                                            <button name="generate_pdf" type="submit" value="submit"
                                                class="btn btn-dark" ">Download Profile <i style=" padding-left:10px;"
                                                class="bi bi-download"></i> </button>
                                        </form>

                                    </ol>
                                </nav>
                            </div>

                        </div>



                    </div>
                </div>


            </div>




            <div class="page-heading">
                <h3>My Profile</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-6">
                        <div class="row">

                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile View / General Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <!-- <th>Name</th>
                                                        <th>Comment</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Name </p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Name'] . "</p>"; ?>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Gender</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Sex'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Age</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Age'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-xl-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile View / Location Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">

                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Address </p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Address'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Country</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Country'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">State</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['State'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">City</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['City'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Area / Town / City</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Area'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Postal Code</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Pincode'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile View / Contact Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">

                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Email </p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Email'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Contact Number</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['ContactNumber'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Whatsapp Number</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['WhatsappNumber'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="col-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile View / Blood Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <tbody>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Blood Group </p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['BloodType'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Availability</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['Availability'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Weight (in Kg.)</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['WeightKG'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Date of Birth</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['DOB'] . "</p>"; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <p class="font-bold ms-3 mb-0">Late Date of Donation
                                                                    (Optional)</p>
                                                            </div>
                                                        </td>
                                                        <td class="col-auto">
                                                            <?php
                                                        echo "<p class=' mb-0'>" . $mysql_data['DOLBD'] . "</p>"; ?>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>
    <script src="./assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="./assets/js/pages/dashboard.js"></script>
    <script src="./assets/js/main.js"></script>
</body>




</html>
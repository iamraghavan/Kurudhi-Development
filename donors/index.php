<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: dashboard.html");
    exit;
}
 
// Include config file
require_once "../php/config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["usermail"]))){
        $username_err = "Please enter Email.";
    } else{
        $username = trim($_POST["usermail"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM tbl_user WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["useremail"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.html");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Real Estate Html Template">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll">
    <title>Signup and Login - HomeID</title>

    <script src="../cdn-cgi/apps/head/2oc_RD5SS6wgN5SiQnSEnWVNHg8.js"></script>
    <link
        href="../css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../vendors/fontawesome-pro-5/css/all.css">
    <link rel="stylesheet" href="../vendors/bootstrap-select/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../vendors/slick/slick.min.css">
    <link rel="stylesheet" href="../vendors/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" href="../vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="../vendors/dropzone/css/dropzone.min.css">
    <link rel="stylesheet" href="../vendors/animate.css">
    <link rel="stylesheet" href="../vendors/timepicker/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="../vendors/mapbox-gl/mapbox-gl.min.css">
    <link rel="stylesheet" href="../vendors/dataTables/jquery.dataTables.min.css">

    <link rel="stylesheet" href="../css/themes.css">

    <link rel="icon" href="../images/favicon.ico">

</head>

<body>
    <style>
        .logo-kurudhi {
            width: 280px;
            height: auto !important;
            margin-top: 10px;
        }
    </style>







        <main id="content">
           
            <section class="">

                <section class="py-4">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-lg-5 col-md-8 col-12">
                                <a href="index.html" class="mb-4 d-block text-center"><img src="https://firebasestorage.googleapis.com/v0/b/kurudhiweb.appspot.com/o/Assets%2Fkurudhi.png?alt=media&token=36c998ed-264c-42f2-84ef-f28e08f7d7dd" alt="logo"
                                        class="img-fluid logo-kurudhi"></a>           
                            </div>
                        </div>
                    </div>
                </section>

                <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mx-auto">
                            <div class="card border-0 shadow-xxs-2 login-register">
                                <div class="card-body p-6">
                                    <h2 class="card-title fs-30 font-weight-600 text-dark lh-16 mb-2">Log In</h2>
                                    <p class="mb-4">Don't have an account ? <a href="#"
                                            class="text-heading hover-primary"><u>Register Now</u></a></p>
                                    <form class="form" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                        <div class="form-group mb-4">
                                            <label for="username-1">Email</label>
                                            <input type="text" class="form-control form-control-lg border-0 <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>" id="username-1"
                                                name="usermail" placeholder="Your email">
                                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="password-2">Password</label>
                                            <div class="input-group input-group-lg">
                                                <input type="text" class="form-control border-0 shadow-none fs-13 <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                                    id="password-2" name="password" placeholder="Password">
                                                    <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                                <div class="input-group-append">
                                                    <span class="input-group-text bg-gray-01 border-0 text-body fs-18">
                                                        <i class="far fa-eye-slash"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="remember-me-1"
                                                    name="remember">
                                                <label class="form-check-label" for="remember-me-1">
                                                    Stay signed in
                                                </label>
                                            </div>
                                            <a href="password-recovery.html"
                                                class="d-inline-block ml-auto fs-13 lh-2 text-body">
                                                <u>Forgot your password?</u>
                                            </a>
                                        </div>
                                        <button  type ="submit" id ="btn" value="Login" class="btn btn-primary btn-lg btn-block rounded">Log
                                            in</button>
                                    </form>
                                    <!-- <div class="divider text-center my-2">
                                        <span class="px-4 bg-white lh-17 text text-heading">
                                            or Log-in with
                                        </span>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    </main>

    <script src="../vendors/jquery.min.js"></script>
    <script src="../vendors/jquery-ui/jquery-ui.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.bundle.js"></script>
    <script src="../vendors/bootstrap-select/js/bootstrap-select.min.js"></script>
    <script src="../vendors/slick/slick.min.js"></script>
    <script src="../vendors/waypoints/jquery.waypoints.min.js"></script>
    <script src="../vendors/counter/countUp.js"></script>
    <script src="../vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../vendors/chartjs/Chart.min.js"></script>
    <script src="../vendors/dropzone/js/dropzone.min.js"></script>
    <script src="../vendors/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../vendors/hc-sticky/hc-sticky.min.js"></script>
    <script src="../vendors/jparallax/TweenMax.min.js"></script>
    <script src="../vendors/mapbox-gl/mapbox-gl.js"></script>
    <script src="../vendors/dataTables/jquery.dataTables.min.js"></script>

    <script src="../js/theme.js"></script>
    <div class="position-fixed pos-fixed-bottom-right p-6 z-index-10">
        <a href="#"
            class="gtf-back-to-top bg-white text-primary hover-white bg-hover-primary shadow p-0 w-52px h-52 rounded-circle fs-20 d-flex align-items-center justify-content-center"
            title="Back To Top"><i class="fal fa-arrow-up"></i></a>
    </div>
</body>

</html>
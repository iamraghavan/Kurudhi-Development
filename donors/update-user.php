<?php
session_start();

require './php/config.php';
$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id='$_SESSION[id]'");
$fetch = mysqli_fetch_array($query);
$query_data = mysqli_query($conn, "SELECT * FROM tbl_registration INNER JOIN tbl_user on user_id = '$_SESSION[id]'");
$mysql_data = mysqli_fetch_array($query_data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<title>" . $fetch['username'] . " Profile Update </title>" ?>
    <!-- packages -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="./assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="./assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    <link rel="shortcut icon" href="./assets/images/favicon.svg" type="image/x-icon">
    <!-- packeges -->
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="https://firebasestorage.googleapis.com/v0/b/kurudhiweb.appspot.com/o/Assets%2Fkurudhi.png?alt=media&token=36c998ed-264c-42f2-84ef-f28e08f7d7dd" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item ">
                            <a href="./dashboard.php" class='sidebar-link'>
                                <i class="bi bi-person-circle"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item active">
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

            <div class="page-heading">
                
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Edit Your Profile / Information </h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Name</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" id="first-name-column" class="form-control"
                                                            placeholder="" value="<?php echo $mysql_data['Name']?>" name="fullname">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="last-name-column">Gender</label>
                                                      
                                                            <select id="id4" class="form-control" name="gender">
                                                <option value=""> <?php echo $mysql_data['Sex']?> </option>
                                                <option value="MALE">MALE</option>
                                                <option value="Female">FEMALE</option>
                                                <option>TRANSGENDER</option>
                                            </select>
                                                    
                                                        </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="city-column">Age</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" id="city-column" class="form-control"
                                                            placeholder="" value="<?php echo $mysql_data['Age']?>" name="agevalue">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="country-floating">Address</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" id="country-floating" class="form-control"
                                                        name="Address" value="<?php echo $mysql_data['Address']?>" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="company-column">Country</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" 
                                                        name="vCountry" value="<?php echo $mysql_data['Country']?>" class="countries form-control" id="id8">

                                            </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                    <label for="company-column">State</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" 
                                                        name="vState" value="<?php echo $mysql_data['State']?>" class="states form-control" id="id8">

                                            </input>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                    <label for="company-column">City </label>
                                                    <input oninput="this.value = this.value.toUpperCase()" 
                                                    name="vCity" value="<?php echo $mysql_data['City']?>" class="states form-control" id="id8">

                                            </in>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Area</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['Area']?>" id="email-id-column" class="form-control"
                                                        name="vArea" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="company-column">Postal Code</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['Pincode']?>" id="company-column" class="form-control"
                                                        name="vPincode" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Email</label>
                                                        <input  oninput="this.value = this.value.toUpperCase()" type="email" value="<?php echo $mysql_data['Email']?>" id="email-id-column" class="form-control"
                                                        name="mailid" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="company-column">Contact Number</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['ContactNumber']?>" id="company-column" class="form-control"
                                                        name="cNumber" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Whatsapp Number</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['WhatsappNumber']?>" id="email-id-column" class="form-control"
                                                        name="wNumber" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="company-column">Blood Group</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['BloodType']?>" id="company-column" class="form-control"
                                                        name="bloodGroup" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Donor Availability</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['Availability']?>" id="email-id-column" class="form-control"
                                                        name="isAvailable" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Weight (in KG.)</label>
                                                        <input oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['WeightKG']?>" id="email-id-column" class="form-control"
                                                        name="vWeightkg" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Date Of Birth</label>
                                                        <input  oninput="this.value = this.value.toUpperCase()"type="text" value="<?php echo $mysql_data['DOB']?>" id="fooDate" class="form-control"
                                                        name="vDob" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Date of Last Blood Donate</label>
                                                        <input id="fooDate2" oninput="this.value = this.value.toUpperCase()" type="text" value="<?php echo $mysql_data['DOLBD']?>" class="form-control"
                                                        name="vDOLBD" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12 d-flex justify-content-end" style="margin: 28px 0px 0px 0px ;">
                                                    <div class="form-group">
                                                        <div class="checkbox d-flex justify-content-end">
                                                            <div style="margin-right:30px; margin-top:8px;">
                                                            <input type="checkbox" id="terms_and_conditions" value="1"
                                                    onclick="terms_changed(this)" name="checkbox">
                                                            <label for="checkbox5">Remember Me</label>
                                                            </div>
                                                            
                                                            <div>
                                                                <button id="submit_button" disabled onclick="check()" type="submit" name="Submit"
                                            value="Submit" sendMessage() class="btn btn-primary me-1 mb-1">Submit</button>
                                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                            </div>
                                                
                                                        </div>
                                                
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group col-12">
                                                    <div class='form-check'>
                                                        <div class="checkbox">
                                                            <input type="checkbox" id="checkbox5"
                                                                class='form-check-input' checked>
                                                            <label for="checkbox5">Remember Me</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-flex justify-content-end">
                                                    
                                                </div> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            
            </div>

            <!-- // Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Social Media</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                        <div class="row">
                                            <div class="col-lg-6 mb-1">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" placeholder="instagram username"
                                                        aria-label="Username" aria-describedby="basic-addon1">
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="col-lg-6 mb-1">
                                                <div class="input-group mb-3">
                                                    <span class="input-group-text">$</span>
                                                    <input type="text" class="form-control"
                                                        aria-label="Amount (to the nearest dollar)"
                                                        placeholder="Addon on both side">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div> -->
                                        </div>
                                                
                                                
                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1" name='Submit'>Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->

                
           
        </div>
    </div>
    <script src="./assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
                                        var dateField = document.getElementById("fooDate");
                                        dateField.onkeyup = bar;
                                        function bar(evt) {
                                            var v = this.value;
                                            if (v.match(/^\d{2}$/) !== null) {
                                                this.value = v + '/';
                                            } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                                                this.value = v + '/';
                                            }

                                        }
                                        var dateField = document.getElementById("fooDate2");
                                        dateField.onkeyup = bar;
                                        function bar(evt) {
                                            var v = this.value;
                                            if (v.match(/^\d{2}$/) !== null) {
                                                this.value = v + '/';
                                            } else if (v.match(/^\d{2}\/\d{2}$/) !== null) {
                                                this.value = v + '/';
                                            }

                                        }
                                    </script>

                                    <script src="../js/isMain.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://demos.phplift.net/country-state-and-city-dropdown-jquery/js/countrystatecity.js?v3"></script>
</body>


<?php if (isset($_POST['Submit'])) {
       
            include './php/config.php';
            $sql1 =
                "INSERT INTO tbl_registration (Name, Sex, Age, Email, ContactNumber, WhatsappNumber, Address, Country, State, City, Area, BloodType, Availability, WeightKG, DOB, DOLBD, Pincode)
    VALUES (
        '" .
                $_POST['fullname'] .
                "'
        ,'" .
                $_POST['gender'] .
                "'
        ,'" .
                $_POST['agevalue'] .
                "'
        ,'" .
                $_POST['mailid'] .
                "'
        ,'" .
                $_POST['cNumber'] .
                "'
        ,'" .
                $_POST['wNumber'] .
                "'
        ,'" .
                $_POST['Address'] .
                "'
        ,'" .
                $_POST['vCountry'] .
                "'
        ,'" .
                $_POST['vState'] .
                "'
        ,'" .
                $_POST['vCity'] .
                "'
        ,'" .
                $_POST['vArea'] .
                "'
        ,'" .
                $_POST['bloodGroup'] .
                "'
        ,'" .
                $_POST['isAvailable'] .
                "'
        ,'" .
                $_POST['vWeightkg'] .
                "'
        ,'" .
                $_POST['vDob'] .
                "'
        ,'" .
                $_POST['vDOLBD'] .
                "'
        ,'" .
                $_POST['vPincode'] .
                "')";

            if ($conn->query($sql1) === true) {
                echo "
          <script>
          sweetAlert({
                title:'Good job!!',
                  text: 'Dear! Donar Your Record Will Be Submit By Sucessfully',
                  type:'success'
          },function(isConfirm){
                alert('ok');
          });
          $('.swal2-confirm').click(function(){
                window.location.href = 'index.html';
          });
          </script>";
            } else {
                echo "<script type= 'text/javascript'>
            alert('Error: Try Again ');
        </script>";
            }

            $conn->close();
        }
     else {
        $_SESSION['form_submit'] = 'NULL';
    } ?>

</html>
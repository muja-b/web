<?php
session_start();
if (isset($_POST['projectname']) && isset($_POST['numOfUsers']) && isset($_POST['sampelsGoal']) && isset($_POST['projectType'])) {
    if (!empty($_POST['projectname']) && !empty($_POST['numOfUsers']) && !empty($_POST['sampelsGoal']) && !empty($_POST['projectType'])) {
        $pName = $_POST['projectname'];
        $userNum = $_POST['numOfUsers'];
        $goalNum = $_POST['sampelsGoal'];
        $type = $_POST['projectType'];
        try {
            $db = new mysqli('localhost', 'root', '', 'webproject');
            $qString = 'select * from projects ';
            $result = $db->query($qString);
            $exsitingFlag = 0;
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                if ($pName === $row['name']) {
                    $exsitingFlag = 1;
                }
            }
            if ($exsitingFlag == 0) {
                $qString2 = "INSERT INTO `projects` (`name`, `numOfUsers`, `sampelsGoal`, `Type`) VALUES ('$pName', '$userNum', '$goalNum', '$type')";
                $db->query($qString2);
                $db->close();
            } else {
//                ?>
                <!--                <script>-->
                <!--                    alert('this project already exists')-->
                <!--                </script>-->
                <!--                --><?php

            }
        } catch (exception $e) {
//            ?>
            <!--            <script>-->
            <!--                alert('an error has happened ,please check the info you entered')-->
            <!--            </script>-->
            <!--            --><?php
        }
    }
}

if (isset($_POST['projectnameRemove'])) {
    if (!empty($_POST['projectnameRemove'])) {
        $pRname = $_POST['projectnameRemove'];
        try {
            $db = new mysqli('localhost', 'root', '', 'webproject');
            $quary = 'select * from projects ';
            $result = $db->query($quary);
            $exsitingFlag = 0;
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                if ($pRname === $row['name']) {
                    $exsitingFlag = 1;
                }
            }
            if ($exsitingFlag == 0) {
//                ?>
                <!--                <script>-->
                <!--                    alert('there is no project with this name')-->
                <!--                </script>-->
                <!--                --><?php

            } else {
                $removeQuery = "DELETE FROM `projects` WHERE `projects`.`name` = '$pRname'";
                $db->query($removeQuery);
                $db->close();
//                ?>
                <!--                <script>-->
                <!--                    alert('project removed successfully')-->
                <!--                </script>-->
                <!--                --><?php
            }
        } catch (Exception $e) {
//            ?>
            <!--            <script>-->
            <!--                alert('an error happened plz try again')-->
            <!--            </script>-->
            <!--            --><?php
        }
    }
}

if (isset($_POST['userid']) && isset($_POST['userPassword'])) {
    if (!empty($_POST['userid']) && !empty($_POST['userPassword'])) {
        $userID = $_POST['userid'];
        $userPassword = $_POST['userPassword'];
        try {
            $db = new mysqli('localhost', 'root', '', 'webproject');
            $quaryUser = "SELECT * FROM users";
            $result = $db->query($quaryUser);
            $exsitingFlag = 0;
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                if ($userID === $row['id']) {
                    $exsitingFlag = 1;
                }
            }
            if ($exsitingFlag == 0) {
                $quaryAddUser = "INSERT INTO `users` (`id`, `password`) VALUES ('$userID', '$userPassword')";
                $db->query($quaryAddUser);
                $db->close();
//                ?>
                <!--                <script>-->
                <!--                    alert('user added successfully')-->
                <!--                </script>-->
                <!--                --><?php

            } else {
//                ?>
                <!--                <script>-->
                <!--                    alert('there is an existing user with this id')-->
                <!--                </script>-->
                <!--                --><?php
            }
        } catch (Exception $e) {
//            ?>
            <!--            <script>-->
            <!--                alert('an error happened plz try again')-->
            <!--            </script>-->
            <!--            --><?php
        }
    }
}

if (isset($_POST['userIdRemove'])) {
    if (!empty($_POST['userIdRemove'])) {
        $userRemoveName = $_POST['userIdRemove'];
        try {
            $db = new mysqli('localhost', 'root', '', 'webproject');
            $quaryUser = "SELECT * FROM users";
            $result = $db->query($quaryUser);
            $exsitingFlag = 0;
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                if ($userRemoveName === $row['id']) {
                    $exsitingFlag = 1;
                }
            }
            if ($exsitingFlag == 0) {
                ?>
                <script>
                    alert('there is no user with this id')
                </script>
                <?php
            } else {
                $quaryRemoveUser = "DELETE FROM `users` WHERE `users`.`id` = $userRemoveName";
                $db->query($quaryRemoveUser);
                $db->close();
                ?>
                <script>
                    alert('user removed successfully')
                </script>
                <?php
            }
        } catch (Exception $e) {
            ?>
            <script>
                alert('an error happened plz try again')
            </script>
            <?php
        }
    }
}

if (isset($_POST['sampletext'])&&isset($_POST['sampleProjectName'])) {
    if (!empty($_POST['sampletext'])&&!empty($_POST['sampleProjectName'])) {
        $sampleText = $_POST['sampletext'];
        $projectName=$_POST['sampleProjectName'];
        $sampleNumber=0;
        try {
            $db = new mysqli('localhost', 'root', '', 'webproject');
            $quarysample="SELECT * FROM sampels";
            $result = $db->query($quarysample);
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                $sampleNumber=$row['number'];
                echo $sampleNumber;
            }

            $exsitingFlag=0;
            $quaryCheck='select * from projects ';
            $result2 = $db->query($quaryCheck);
            for ($i = 0; $i < $result2->num_rows; $i++) {
                $row = $result2->fetch_assoc();
                if ($projectName === $row['name']) {
                    $exsitingFlag = 1;
                }

            }
            if($exsitingFlag==1){
                $sampleNumber+=1;
                $quaryAddSample = "INSERT INTO `sampels` (`info`, `number`, `projectName`) VALUES ('$sampleText','$sampleNumber', '$projectName');";
                $db->query($quaryAddSample);
                $db->close();
                ?>
                <script>
                    alert('sample added successfully successfully')
                </script>
                <?php
            }else{
//                ?>
                <!--                <script>-->
                <!--                    alert('the project you are trying to add to does not exist')-->
                <!--                </script>-->
                <!--                --><?php
            }

        } catch (Exception $e) {
//            ?>
            <!--            <script>-->
            <!--                alert('an error happened plz try again')-->
            <!--            </script>-->
            <!--            --><?php
        }
    }
}

if (isset($_POST['removeSampletext'])) {
    if (!empty($_POST['removeSampletext'])) {
        $sampleRemoveText = $_POST['removeSampletext'];
        try {
            $db = new mysqli('localhost', 'root', '', 'webproject');
            $quaryUser = "SELECT * FROM sampels";
            $result = $db->query($quaryUser);
            $exsitingFlag = 0;
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_assoc();
                if ($sampleRemoveText === $row['info']) {
                    $exsitingFlag = 1;
                }
            }
            if ($exsitingFlag == 0) {
//                ?>
                <!--                <script>-->
                <!--                    alert('there is no user with this id')-->
                <!--                </script>-->
                <!--                --><?php
            } else {
                $quaryRemoveSample = " DELETE FROM sampels where info='$sampleRemoveText'";
                $db->query($quaryRemoveSample);
                $db->close();
//                ?>
                <!--                <script>-->
                <!--                    alert('sample removed successfully')-->
                <!--                </script>-->
                <!--                --><?php
            }
        } catch (Exception $e) {
//            ?>
            <!--            <script>-->
            <!--                alert('an error happened plz try again')-->
            <!--            </script>-->
            <!--            --><?php
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/dashcss.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Lumia - v2.2.1
    * Template URL: https://bootstrapmade.com/lumia-bootstrap-business-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body onload="funvis(),hideAddp(),hideRemovep(),hideAddUser(),hideRemoveUser(),hideAddSample(),hideremovesample()">
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
            <a href="index.html"><img src="assets/img/logomod.png" alt="" class="img-fluid"></a>

        </div>

        <nav class="nav-menu d-none d-lg-block">
            <ul>
                <li class="active"><a href="index.html">Home</a></li>
                <li class="drop-down"><a href="">User</a>
                    <ul>
                        <li><a href="#team">Profile</a></li>
                        <li class="contact Us"><a href="index.html">logout</a>

                        </li>
                    </ul>
                </li>
                <li><a href="#contact">Blog</a></li>

            </ul>
        </nav><!-- .nav-menu -->

        <div class="header-social-links">
            <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
        </div>

    </div>
</header><!-- End Header -->


<main class="container-fluid navbar-compensation" >
    <section class="container xl-top-margin">
        <div class="row l-bottom-pad">
            <div class="col-xs-offset-4 col-xs-4 col-sm-offset-0 col-sm-2 valign-middle nofloat">
                <div class="img-container profile-photo">
                    <div class="img-profile-photo profile-photo__container" style="background-image: url(https://dcpd01profile.blob.core.windows.net/avatars/Avatar_01.svg);" >

                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 valign-middle nofloat phone-center s-bottom-margin" >
                <h2 class="user-greeting no-bottom-margin" >Good evening!</h2>
                <span class="text-medium--light dc-text-italic" >Mr. <?php echo $_SESSION['username'] ?></span>
            </div>

        </div>
    </section>
    <section class="container xl-bottom-margin" >
        <center>

            <ul class="pagination pagination-lg" >
                <li>
                    <a  onclick="funvis1()">Available Jobs</a>
                </li>
                <li>
                    <a onclick="funvis2()" >Work History</a>
                </li>
                <li>
                    <a onclick="funvis3()">Skills &amp; Badges</a>
                </li>
            </ul>
        </center>

        <div class="container" style="margin-bottom: 100px;  "><div class="tab-empty" id="ahmad1">
                <form action="admin.php" method="post">
                    <input type="button" value="add project" id="addProjectButton" onclick="addp()" class="form-control">
                    <table id="addProjectTable">
                        <tr>
                            <td><input type="text" name="projectname" class="form-control" placeholder="project name"></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="numOfUsers" class="form-control" placeholder="number of users"></td>
                        </tr>
                        <tr>
                            <td><input type="number" name="sampelsGoal" class="form-control" placeholder="sample goal"></td>
                        </tr>
                        <tr>
                            <td>project type:</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="projectType" value="text" class="form-control">Anotate Text</td>


                            <td><input type="radio" name="projectType" value="voice" class="form-control">Record Voice lines</td>


                            <td><input type="radio" name="projectType" value="image" class="form-control">Check images</td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="add project" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="button" value="hide" onclick="hideAddp()" class="form-control"></td>
                        </tr>
                    </table>
                </form>

                <form action="admin.php" method="post">
                    <input type="button" value="remove project" id="removeProjectButton" onclick="removep()" class="form-control">
                    <table id="removeTable">
                        <tr>
                            <td>project name:</td>
                            <td><input type="text" name="projectnameRemove" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Remove Project" class="form-control"></td>
                        </tr>
                        <tr>
                            <td><input type="button" value="hide" onclick="hideRemovep()" class="form-control"></td>
                        </tr>
                    </table>
                </form>
                <h2 class="title-medium m-bottom-margin">No jobs available.</h2>
                <p class="text-big">Awesome! You have no more jobs to do!<br>We will email you as soon as new work is available.<br>Meanwhile, why not grab yourself a cup of coffee?
                </p>
            </div>
            <div class="container" style="margin-bottom: 100px; "><div class="tab-empty" id="ahmad2">

                    <form action="admin.php" method="post">
                        <input type="button" value="add user" id="useraddbutton" onclick="addUser()" class="form-control">
                        <table id="addUsertable">
                            <tr>
                                <td>User ID:</td>
                                <td><input type="number" name="userid" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>User password:</td>
                                <td><input type="password" name="userPassword" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="add user" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="button" value="hide" onclick="hideAddUser()" class="form-control"></td>
                            </tr>
                        </table>
                    </form>

                    <form action="admin.php" method="post">
                        <input type="button" value="Remove User " id="userRemoveButton" onclick="removeUser()" class="form-control">
                        <table id="removeUsertable">
                            <tr>
                                <td>User ID:</td>
                                <td><input type="number" name="userIdRemove" placeholder="User ID" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="remove user" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><input type="button" value="hide" onclick="hideRemoveUser()" class="form-control"></td>
                            </tr>
                        </table>
                    </form>

                </div>
                <div class="container" style="margin-bottom: 100px; "><div class="tab-empty" id="ahmad3">
                        <form action="admin.php" method="post">
                            <input type="button" value="add sample" id="sampleAddButton" onclick="addsample()" class="form-control">
                            <table id="addsampletable">
                                <tr>
                                    <td><input type="text" name="sampletext" placeholder="sample info" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="sampleProjectName" placeholder="project name" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="add sample" class="form-control"></td>
                                </tr>

                                <tr>
                                    <td><input type="button" value="hide" onclick="hideAddSample()" class="form-control"></td>
                                </tr>
                            </table>
                        </form>

                        <form action="admin.php" method="post">
                            <input type="button" value="remove sample" id="sampleRemoveButton" onclick="removesample()" class="form-control">
                            <table id="removeSampleTable">
                                <tr>
                                    <td><input type="text" name="removeSampletext" placeholder="sample info" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="remove sample" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td><input type="button" value="hide" onclick="hideremovesample()" class="form-control"></td>
                                </tr>
                            </table>
                        </form>
                        <h2 class="title-medium m-bottom-margin">Language Tests</h2>
                        <p class="text-big">You can find language tests as a requirement when trying to access a job. When you pass a test, you improve your ranking and potential for being allocated to paying jobs. You need a validated payment method to do language tests. For more info, check out our
                        </p>
                    </div>
                </div>
    </section>


    <!-- ======= Breadcrumbs ======= -->


</main><!-- End #main -->



<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="assets/vendor/counterup/counterup.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/venobox/venobox.min.js"></script>
<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>
    function funvis1() {
        var x = document.getElementById("ahmad1");
        var y = document.getElementById("ahmad2");
        var z = document.getElementById("ahmad3");
        if (x.style.display === "none") {
            x.style.display = "block";
            y.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
        }
    }
    function funvis2() {
        var x = document.getElementById("ahmad1");
        var y = document.getElementById("ahmad2");
        var z = document.getElementById("ahmad3");
        if (y.style.display === "none") {
            y.style.display = "block";
            x.style.display = "none";
            z.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
        }
    }
    function funvis3() {
        var x = document.getElementById("ahmad1");
        var y = document.getElementById("ahmad2");
        var z = document.getElementById("ahmad3");
        if (z.style.display === "none") {
            z.style.display = "block";
            x.style.display = "none";
            y.style.display = "none";
        } else {
            x.style.display = "none";
            y.style.display = "none";
            z.style.display = "none";
        }
    }
    function funvis() {
        var x = document.getElementById("ahmad1");
        var y = document.getElementById("ahmad2");
        var z = document.getElementById("ahmad3");
        x.style.display = "none";
        y.style.display = "none";
        z.style.display = "none";
    }
    function addp() {
        var x = document.getElementById('addProjectTable');
        x.style.display = 'block';
        var y = document.getElementById('addProjectButton');
        y.style.display = 'none';
    }

    function hideAddp() {
        var x = document.getElementById('addProjectTable');
        x.style.display = 'none';
        var y = document.getElementById('addProjectButton');
        y.style.display = 'block';
    }

    function removep() {
        var x = document.getElementById('removeTable');
        x.style.display = 'block';
        var y = document.getElementById('removeProjectButton');
        y.style.display = 'none';
    }

    function hideRemovep() {
        var x = document.getElementById('removeTable');
        x.style.display = 'none';
        var y = document.getElementById('removeProjectButton');
        y.style.display = 'block';
    }

    function addUser() {
        var x = document.getElementById('addUsertable');
        x.style.display = 'block';
        var y = document.getElementById('useraddbutton');
        y.style.display = 'none';
    }

    function hideAddUser() {
        var x = document.getElementById('addUsertable');
        x.style.display = 'none';
        var y = document.getElementById('useraddbutton');
        y.style.display = 'block';
    }

    function removeUser() {
        var x = document.getElementById('removeUsertable');
        x.style.display = 'block';
        var y = document.getElementById('userRemoveButton');
        y.style.display = 'none';
    }

    function hideRemoveUser() {
        var x = document.getElementById('removeUsertable');
        x.style.display = 'none';
        var y = document.getElementById('userRemoveButton');
        y.style.display = 'block';
    }

    function addsample() {
        var x = document.getElementById('addsampletable');
        x.style.display = 'block';
        var y = document.getElementById('sampleAddButton');
        y.style.display = 'none';
    }

    function hideAddSample() {
        var x = document.getElementById('addsampletable');
        x.style.display = 'none';
        var y = document.getElementById('sampleAddButton');
        y.style.display = 'block';
    }

    function removesample() {
        var x = document.getElementById('removeSampleTable');
        x.style.display = 'block';
        var y = document.getElementById('sampleRemoveButton');
        y.style.display = 'none';
    }

    function hideremovesample() {
        var x = document.getElementById('removeSampleTable');
        x.style.display = 'none';
        var y = document.getElementById('sampleRemoveButton');
        y.style.display = 'block'
    }
</script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php session_start();
if(isset($_POST['submitButton']) && isset($_POST['submitedSample'])){
    if(!empty($_POST['submitedSample'])){
        $sample=$_POST['submitedSample'];
        $project=$_SESSION['projectName'];
        $user=$_SESSION['Userid'];
//        $user=3121;
        $db = new mysqli('localhost', 'root', '', 'webproject');
        $quarysample="SELECT * FROM `samplesfinished`";
        $result = $db->query($quarysample);
        $sampleNumber='0';
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            $sampleNumber=$row['index'];
        }
        $sampleNumber=$sampleNumber+1;
        $quarysample="INSERT INTO `samplesfinished` (`data`, `project`, `index`, `UserID`) VALUES ('$sample', '$project', '$sampleNumber', '$user')";
        $db->query($quarysample);
        $qauryInc="SELECT * FROM `users` WHERE `id` = $user";
        $result = $db->query($qauryInc);
        $row=$result->fetch_assoc();
        $update=$row['samplesdone'];
        $update=$update+1;
        $qaury="UPDATE `users` SET `samplesdone`='$update' WHERE id='$user'";
        $db->query($qaury);
        $db->close();
    }
}
if(isset($_POST['imgsubmited']) && isset($_POST['imgButtonSubmit'])){
    if(!empty($_POST['imgsubmited'])){
        $sample=$_POST['imgsubmited'];
        $project=$_SESSION['projectName'];
        $user=$_SESSION['Userid'];
//        $user=3121;
        $db = new mysqli('localhost', 'root', '', 'webproject');
        $quarysample="SELECT * FROM `samplesfinished`";
        $result = $db->query($quarysample);
        $sampleNumber='0';
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_assoc();
            $sampleNumber=$row['index'];
        }
        $sampleNumber=$sampleNumber+1;
        $quarysample="INSERT INTO `samplesfinished` (`data`, `project`, `index`, `UserID`) VALUES ('$sample', '$project', '$sampleNumber', '$user')";
        $db->query($quarysample);
        $qauryInc="SELECT * FROM `users` WHERE `id` = $user";
        $result = $db->query($qauryInc);
        $row=$result->fetch_assoc();
        $update=$row['samplesdone'];
        $update=$update+1;
        $qaury="UPDATE `users` SET `samplesdone`='$update' WHERE id='$user'";
        $db->query($qaury);
        $db->close();
    }
}
?>
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $_POST['projectname'];?></title>
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

<body>
 ======= Header =======
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
<div style="margin-top: 100px;">
    <?php
    if(isset($_POST['projectname'])){
        $projectName=$_POST['projectname'];
        $_SESSION['projectName']=$_POST['projectname'];
    }
    else{
        $projectName=$_SESSION['projectName'];
    }
        $db = new mysqli('localhost', 'root', '', 'webproject');
        $quaryType="SELECT Type FROM `projects` WHERE `name` LIKE '$projectName'";
        $res= $db->query($quaryType);
        $hi=$res->fetch_assoc();
        $projectType=$hi['Type'];
        $qaury="SELECT * FROM `sampels` WHERE `projectName` LIKE '$projectName' ORDER BY `number` ASC";
        $result = $db->query($qaury);
        echo'<center><table>';
        for ($i = 0; $i < $result->num_rows; $i++) {
            $row = $result->fetch_object();
            if($projectType==='text'){
                echo "
                    <tr>
                        <td>
                          <div>$row->number.$row->info</div>
                        </td>
                    </tr>
                    <tr>
                     <td>
                         <form action='projectSamples.php' method='post'>
                           <input type='text' name='submitedSample' placeholder='describe the word...'>
                            <input type='submit' name='submitButton' value='submit'>
                         </form>
                         </td>
                         <td>
                    </td>
                    </tr>";
            }
            if($projectType==='image'){
                echo "
                    <tr>
                        <td>
                          <div>$row->number.</div>
                          <img src='$row->info' alt=''>
                        </td>
                    </tr>
                    <tr>
                     <td>
                         <form action='projectSamples.php' method='post'>
                            
                            <input type='text' name='imgsubmited' placeholder='describe the image'>
                            <input type='submit' name='imgButtonSubmit' value='submit'>
                         </form>
                         </td>
                         <td>
                    </td>
                    </tr>";
            }
            if($projectType==='voice'){
                echo "
                    <tr>
                        <td>
                          <div>$row->number.$row->info</div>
                        </td>
                    </tr>
                    <tr>
                     <td>
                         <form action='projectSamples.php' method='post'>
                            
                         </form>
                         </td>
                         <td>
                    </td>
                    </tr>";

            }
        }
        echo'</table></center>';
    ?>
</div>
</main><!-- End #main -->
</body>

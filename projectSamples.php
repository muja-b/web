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
    <script>
        let audioIN = { audio: true };
        //  audio is true, for recording
        // Access the permission for use
        // the microphone
        navigator.mediaDevices.getUserMedia(audioIN)

            // 'then()' method returns a Promise
            .then(function (mediaStreamObj) {

                // Connect the media stream to the
                // first audio element
                let audio = document.querySelector('audio');
                //returns the recorded audio via 'audio' tag

                // 'srcObject' is a property which
                // takes the media object
                // This is supported in the newer browsers
                if ("srcObject" in audio) {
                    audio.srcObject = mediaStreamObj;
                }
                else {   // Old version
                    audio.src = window.URL
                        .createObjectURL(mediaStreamObj);
                }
                // It will play the audio
                // audio.onloadedmetadata = function (ev) {
                //
                //     // Play the audio in the 2nd audio
                //     // element what is being recorded
                //     audio.play();
                //
                // };
                // Start record
                let start = document.getElementById('btnStart');
                // Stop record
                let stop = document.getElementById('btnStop');
                // 2nd audio tag for play the audio
                let playAudio = document.getElementById('adioPlay');
                // This is the main thing to recorde
                // the audio 'MediaRecorder' API
                let mediaRecorder = new MediaRecorder(mediaStreamObj);
                // Pass the audio stream

                // Start event
                start.addEventListener('click', function (ev) {
                    mediaRecorder.start();
                    // console.log(mediaRecorder.state);
                })

                // Stop event
                stop.addEventListener('click', function (ev) {
                    mediaRecorder.stop();
                    // console.log(mediaRecorder.state);
                });

                // If audio data available then push
                // it to the chunk array
                mediaRecorder.ondataavailable = function (ev) {
                    dataArray.push(ev.data);
                }

                // Chunk array to store the audio data
                let dataArray = [];

                // Convert the audio data in to blob
                // after stopping the recording
                mediaRecorder.onstop = function (ev) {

                    // blob of type mp3
                    let audioData = new Blob(dataArray,
                        { 'type': 'audio/mp3;' });

                    // After fill up the chunk
                    // array make it empty
                    dataArray = [];

                    // Creating audio url with reference
                    // of created blob named 'audioData'
                    let audioSrc = window.URL.createObjectURL(audioData);
                    // Pass the audio url to the 2nd video tag
                    playAudio.src = audioSrc;
                }
            })
            // If any error occurs then handles the error
            .catch(function (err) {
                console.log(err.name, err.message);
            });
    </script>
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
                           <input type='text' name='submitedSample' placeholder='describe the word...' class='form-control' style='width: 200px; height: 35px;'>
                            <input type='submit' name='submitButton' value='submit' class='form-control' style='width: 200px; height: 35px;'>
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
                            
                            <input type='text' name='imgsubmited' placeholder='describe the image...' class='form-control' style='width: 200px; height: 35px;'>
                            <input type='submit' name='imgButtonSubmit' value='submit' class='form-control' style='width: 200px; height: 35px;'>
                         </form>
                         </td>
                         <td>
                    </td>
                    </tr>";
            }

            if($projectType==='voice'){
                $_SESSION['info'] = $row->info ;
                echo "
                         <header>
    <h1>$row->info</h1>
    
</header>
<!--button for 'start recording'-->
<p>
    <button id='btnStart' class='form-control' style='width: 200px; height: 35px;'>START RECORDING</button>
    <br>
    <button id='btnStop' class='form-control' style='width: 200px; height: 35px;'>STOP RECORDING</button>
    <!--button for 'stop recording'-->
</p>
<!--for record-->
<audio style='display: none;' controls></audio>
<!--'controls' use for add
  play, pause, and volume-->
<!--for play the audio-->
<div>
    <audio id='adioPlay' controls></audio>
</div>
<form action='upload.php' method='post' enctype='multipart/form-data'>
    <input type='file' name='fileToUpload' id='fileToUpload' >
    <br>
    <input type='submit' value='Upload Image' name='submit' class='form-control' style='width: 200px; height: 35px;'>
</form>           
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
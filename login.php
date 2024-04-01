<?php
session_start();

if (isset($_POST['loginBtn']) && isset($_POST['username']) && isset($_POST['pass'])) {
        $username = $_POST['username'];
        $password = $_POST['pass'];
        //$pass = sha1($password);
        $choice = $_POST['choice'];

      try {
          $db = new mysqli('localhost', 'root', '123456', 'project');
          $qryStr = "SELECT * FROM user WHERE username = '$username' and password = '$password'";

          $res = $db->query($qryStr);

          if ($res->num_rows > 0) {
              $user = $res->fetch_object();

              $_SESSION['username'] = $username;
              $_SESSION['password'] = $password;
              $_SESSION['id'] = $user->id;
              $_SESSION['first_name'] = $user->first_name;
              $_SESSION['second_name'] = $user->second_name;
              $_SESSION['third_name'] = $user->third_name;
              $_SESSION['last_name'] = $user->last_name;

              if ($choice == 'admin') {
                  $qryStr1 = "SELECT * FROM admin WHERE id = '$user->id'";
                  $res1 = $db->query($qryStr1);

                  if ($res1->num_rows > 0) {
                      $admin = $res1->fetch_object();

                      //go to admins page
                      $_SESSION['isAdmin'] = 1;
                      $_SESSION['admin_id'] = $res1->admin_id;

                      header('Location: admin.php');
                  } else {
                      header('Location: login.php');
                  }
              }
              else if ($choice == 'doctor'){
                  $qryStr1 = "SELECT * FROM doctor WHERE id = '$user->id'";
                  $res1 = $db->query($qryStr1);

                  if ($res1->num_rows > 0) {
                      $doctor = $res1->fetch_object();

                      //go to doctors page
                      $_SESSION['isDoctor'] = 1;
                      $_SESSION['doctor_id'] = $doctor->doctor_id;

                      header('Location: doctor.php');
                  } else {
                      header('Location: login.php');
                  }
              }
              else if ($choice == 'recipient'){
                  $qryStr1 = "SELECT * FROM recipient WHERE id = '$user->id'";
                  $res1 = $db->query($qryStr1);

                  if ($res1->num_rows > 0) {
                      $recipient = $res1->fetch_object();

                      //go to recipients page
                      $_SESSION['isRecipient'] = 1;
                      $_SESSION['recipient_id'] = $recipient->recipient_id;

                      header('Location: recipient.php');
                  } else {
                      header('Location: login.php');
                  }
              }
              else if ($choice == 'donor'){
                  $qryStr1 = "SELECT * FROM donor WHERE id = '$user->id'";
                  $res1 = $db->query($qryStr1);

                  if ($res1->num_rows > 0) {
                      $donor = $res1->fetch_object();

                      //go to donors page
                      $_SESSION['isDonor'] = 1;
                      $_SESSION['donor_id'] = $res1->donor_id;

                      header('Location: donor.php');
                  } else {
                      header('Location: login.php');
                  }
              }
          }
          else {
              header('Location: login.php');
          }
          $db->close();

    } catch (Exception $exception) {
        echo $exception;
    }

}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V4</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="loginCSS/favicon.ico">
    <link rel="stylesheet" type="text/css" href="loginCSS/util.css">
    <link rel="stylesheet" type="text/css" href="loginCSS/main.css">
    <link href='fontawesome-free-6.2.1-web/css/fontawesome.css' rel='stylesheet'>
    <link href='fontawesome-free-6.2.1-web/css/brands.css' rel='stylesheet'>
    <link href='fontawesome-free-6.2.1-web/css/solid.css' rel='stylesheet'>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="loginCSS/spinner.css">
<link rel="stylesheet" type="text/css" href="loginCSS/AnimatedCircular.css">

    <script src='javascripts/loginScript.js'>

        var items = document.querySelectorAll('.circle a');

        for(var i = 0, l = items.length; i < l; i++) {
            items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";

            items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
        }

        document.querySelector('.menu-button').onclick = function(e) {
            e.preventDefault(); document.querySelector('.circle').classList.toggle('open');
        }
    </script>
</head>
<body onload="hideI()">

<div class="limiter">
    <div class="container-login100" style="background-image: url('loginCSS/bg-01.jpg');">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65" >
            <form class="login100-form validate-form" method="post" action="login.php">
					<span class="login100-form-title p-b-49">
						Login
					</span>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                    <span class="label-input100">Username</span>
                    <input class="input100" type="text" name="username" placeholder="Type your username">
                    <span class="focus-input100" ></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Password</span>
                    <input class="input100" type="password" name="pass" placeholder="Type your password">
                    <span class="focus-input100" ></span>
                </div>

                <div class="text-right p-t-8 p-b-31">
                    <a href="#">
                        Forgot password?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button type="submit" class="login100-form-btn" id="loginBtn" name="loginBtn">
                            Login
                        </button>
                    </div>
                </div>

                    <div>
                        <input type="text" name="choice" id="choice" style="background: black; color: red; visibility: hidden" value="admin" >
                    </div>

                <div class="txt1 text-center p-t-54 p-b-20">




	                    <span class="Circular">


<div class="menu">

    <?php
    $loginChoice = 1;
    ?>

    <div class="toggle" id="plusButton"><ion-icon name="add-outline"></ion-icon></div>
<li style="--i:1;"  >

        <a href="#" id="LoginDoctor" onclick="document.getElementById('choice').value= 'doctor';"  onmouseover="showLabels2()" onmouseleave="hideLabels2()"><i class="fa-solid fa-user-doctor" ></i><label class="crl" id="crlDoctor">Doctor</label> </a>
    </li>

    <li style="--i:3; ">
        <a href="#" id="LoginAdmin" name="LoginAdmin" onclick="document.getElementById('choice').value= 'admin';"  onmouseover="showLabels1()" onmouseleave="hideLabels1()"><i class="fa-sharp fa-solid fa-user-tie" id="crladmin"></i><label class="crl" id="crlAdmin">Admin</label></a>
    </li>

    <li style="--i:5;">
        <a href="#" id="LoginRecipient" onclick="document.getElementById('choice').value= 'recipient';"  onmouseover="showLabels4()" onmouseleave="hideLabels4()"><i class="fa-solid fa-user-shield"></i><label class="crl" id="crlRecipient">Recipient</label></a>
    </li>

    <li style="--i:7;" >
        <a href="#" id="LoginDonor" onclick="document.getElementById('choice').value= 'donor';"  onmouseover="showLabels3()" onmouseleave="hideLabels3()"><i class="fa-solid fa-user-plus"></i><label class="crl" id="crlDonor">Donor</label></a>
    </li>

            </form>

</div>




<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script>
    let toggle=document.querySelector('.toggle');
    let menu=document.querySelector('.menu');
    toggle.onclick = function (){
        menu. classList. toggle('active')
            }

</script>
						</span>
                </div>


                <div class="flex-c-m">

                </div>

                <div class="flex-col-c 5p-t-15  p-b-17" >
						<span class="txt1 p-b-17">
							Or Sign Up Using
						</span>

                    <a href="index.php#SignBox" class="txt2">
                        Sign Up
                    </a>
                </div>






        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>



</body>
</html>

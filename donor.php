<?php
session_start();
if (isset($_SESSION['isDonor'])){
    if ($_SESSION['isDonor'] == 1){
            $id = $_SESSION['id'];
            $donor_id = $_SESSION['donor_id'];

            $_SESSION['id'] = $id;
            $_SESSION['donor_id'] = $donor_id;
        ?>

<!--end of session-->
        <?php

//donor form
        if (isset($_POST['accept'])){
            //page1
            $firstName = $_POST['FN'];
            $secondName = $_POST['SN'];
            $thirdName = $_POST['TN'];
            $lastName = $_POST['LN'];
            $birthdate = $_POST['BD'];
            $idp = $_POST['IDP'];
            $city = $_POST['ADC'];
            $street = $_POST['ADS'];
            $gender = $_POST['GM1'];
            $email = $_POST['Email'];
            $phone = $_POST['PN'];
            $blooddtype = $_POST['Btype'];

            //page2
            $bloodType = $_POST['Btype'];
            $liver = isset($_POST['Liver']) ? "Yes" : "No";
            $heart = isset($_POST['Heart']) ? "Yes" : "No";
            $diabetes = isset($_POST['Diabetes']) ? "Yes" : "No";
            $bloodPressure = isset($_POST['BloodPressure']) ? "Yes" : "No";
            $smoke = isset($_POST['Smoke']) ? "Yes" : "No";
            $drink = isset($_POST['Drink']) ? "Yes" : "No";
            $noMental = isset($_POST['NoMental']) ? "Yes" : "No";
            $isClear = isset($_POST['isClear']) ? "Yes" : "No";
            //array of all diseases
            $diseases = array("Liver"=>"$liver", "Heart"=>"$heart", "Diabetes"=>"$diabetes", "BloodPressure"=>"$bloodPressure", "Smoke"=>"$smoke", "Drink"=>"$drink", "NoMental"=>"$noMental", "isClear"=>"$isClear");

            //page3
            $wFirstName = $_POST['WFN'];
            $wSecondName = $_POST['WSN'];
            $wThirdName = $_POST['WTN'];
            $wLastName = $_POST['WLN'];
            $wPhone = $_POST['WPN'];
            $wId = $_POST['WID'];

            //username & password
            $username = $_POST['usernameD'];
            $password = $_POST['passwordD'];

            //now we need to insert the data to our database
            try{
                $db = new mysqli('localhost', 'root', '123456', 'project');

                //insert into user
                $queryStr = "INSERT INTO user VALUES ('$idp', '$firstName', '$secondName', '$thirdName', '$lastName', '$phone',  '$gender', '$email',str_to_date('$birthdate','%Y-%m-%d'),  '$blooddtype','$city', '$street',  '$username', '$password'); ";
                $res = $db->query($queryStr);
                $db->commit();

                //insert into donor
                $queryStr1 = "INSERT INTO donor (id, wfirst_name, wsecond_name, wthird_name, wlast_name, wphone_number, state, donated) VALUES ('$idp', '$wFirstName', '$wSecondName', '$wThirdName', '$wLastName', '$wPhone', 'alive', 'no');";
                $res1 = $db->query($queryStr1);
                $db->commit();

                //we need to get the value of the current auto increment variable
                $queryStr2 = "SELECT donor_id FROM donor WHERE id = '$idp'";
                $res2 = $db->query($queryStr2);
                $arr = $res2->fetch_assoc();
                $cur_donor_id = $arr['donor_id'];

                //insert into donor-diseases
                foreach ($diseases as $x => $x_value){
                    $queryStr3 = "INSERT INTO donor_diseases VALUES ('$cur_donor_id', '$x', '$x_value');";
                    $res3 = $db->query($queryStr3);
                    $db->commit();
                }

                //end of insertion
                unset($_POST['accept']);
                $db->close();

            }catch (Exception $exception){
                echo $exception;
            }
        }


//recipient form
        if (isset($_POST['accept2'])){
            //page1 ---- the same as donor
            $firstName2 = $_POST['FN2'];
            $secondName2 = $_POST['SN2'];
            $thirdName2 = $_POST['TN2'];
            $lastName2 = $_POST['LN2'];
            $birthdate2 = $_POST['BD2'];
            $idp2 = $_POST['IDP2'];
            $city2 = $_POST['ADC2'];
            $street2 = $_POST['ADS2'];
            $gender2 = $_POST['GM2'];
            $email2 = $_POST['Email2'];
            $phone2 = $_POST['PN2'];
            $blooddtype2 = $_POST['Btype2'];

            //page2
            $bloodType2 = $_POST['Btype2'];
//    $retina2 = isset($_POST['retina']) ? "retina" : "";
//    $heart2 = $_POST['heart'];
//    $liver2 = $_POST['liver'];
//    $lungs2 = $_POST['lungs'];
//    $kidney2 = $_POST['kidney'];
            $isClear2 = isset($_POST['isClear2']) ? "Yes" : "No";
            $noMental2 = isset($_POST['noMental2']) ? "Yes" : "No";

            $organ = $_POST['organ'];
            $diseases2 = array("NoMental"=>"$noMental2", "isClear"=>"$isClear2");


            //page3
            $term = $_POST['term'];

            //username & password
            $username2 = $_POST['usernameR'];
            $password2 = $_POST['passwordR'];

            //now we need to insert the data to our database
            try{
                $db = new mysqli('localhost', 'root', '123456', 'project');

                //insert into user
                $queryStr = "INSERT INTO user VALUES ('$idp2', '$firstName2', '$secondName2', '$thirdName2', '$lastName2', '$phone2',  '$gender2', '$email2',str_to_date('$birthdate2','%Y-%m-%d'),  '$blooddtype2','$city2', '$street2',  '$username2', '$password2') ";
                $res = $db->query($queryStr);
                $db->commit();

                //insert into donor
                $queryStr1 = "INSERT INTO recipient (id, needed_member, recieved) VALUES ('$idp2', '$organ', 'no');";
                $res1 = $db->query($queryStr1);
                $db->commit();

                //we need to get the value of the current auto increment variable
                $queryStr2 = "SELECT recipient_id FROM recipient WHERE id = '$idp2'";
                $res2 = $db->query($queryStr2);
                $arr = $res2->fetch_assoc();
                $cur_recipient_id = $arr['recipient_id'];

                //insert into donor-diseases
                foreach ($diseases2 as $x => $x_value){
                    $queryStr3 = "INSERT INTO recipient_diseases VALUES ('$cur_recipient_id', '$x', '$x_value');";
                    $res3 = $db->query($queryStr3);
                    $db->commit();
                }

                unset($_POST['accept2']);
                $db->close();

            }catch (Exception $exception){
                echo $exception;
            }
        }
















//for statistics
        try {
            $db = new mysqli('localhost','root','123456','project');
            $querysta = "SELECT * FROM surgery where result = 'Success';";
            $res = $db->query($querysta);
            $n1 = $res->num_rows;

            $heartcount = $n1;

            $querysta2 = "SELECT * FROM surgery;";
            $res2 = $db->query($querysta2);
            $n2 = $res->num_rows;


            $x = 0;
            if($n2 == 0){
                $x = 0;
            }
            else{
                $x = ($n1/ $n2);

            }


//    ----------------------------
            $querysta3 = "SELECT * FROM donor where state = 'alive';";
            $res3 = $db->query($querysta3);
            $n3 = $res3->num_rows;




            $querysta4 = "SELECT * FROM recipient;";
            $res4 = $db->query($querysta4);
            $n4 = $res4->num_rows;

            $y = 0;
            if($n4 == 0 ){
                $n4 = 1;
            }
            $y = ( ($n3 / $n4) * 100 );


            $y = number_format((float)$y,2,'.','');
            $x = number_format((float)$x,2,'.','');






//    -----------------------------------

            $prog1 = abs(((100 - $x) / 100 )  * 1193)  ;
            $prog22 = abs(((100 - $y) / 100 )  * 1193) ;
            if($x > 100) {
                $prog1 = 0;
            }

            if($y > 100) {
                $prog22 = 0;
            }


            $db->close();
        }catch (Exception $e){
            echo $e;

        }
        ?>





        <?php
//donor
        if (isset($_POST['Save'])){
            $firstName = $_POST['FN'];
            $secondName = $_POST['SN'];
            $thirdName = $_POST['TN'];
            $lastName = $_POST['LN'];

            $username = $_POST['usernameD'];
            $password = $_POST['passwordD'];

            $birthdate = $_POST['BD'];
            $city = $_POST['ADC'];
            $street = $_POST['ADS'];
            $phone = $_POST['PN'];
            $email = $_POST['Email'];

            $bloodType = $_POST['Btype'];

            $liver = isset($_POST['Liver']) ? "Yes" : "No";
            $heart = isset($_POST['Heart']) ? "Yes" : "No";
            $diabetes = isset($_POST['Diabetes']) ? "Yes" : "No";
            $bloodPressure = isset($_POST['BloodPressure']) ? "Yes" : "No";
            $smoke = isset($_POST['Smoke']) ? "Yes" : "No";
            $drink = isset($_POST['Drink']) ? "Yes" : "No";
            $noMental = isset($_POST['NoMental']) ? "Yes" : "No";
            $isClear = isset($_POST['isClear']) ? "Yes" : "No";

            $diseases = array("Liver"=>"$liver", "Heart"=>"$heart", "Diabetes"=>"$diabetes", "BloodPressure"=>"$bloodPressure", "Smoke"=>"$smoke", "Drink"=>"$drink", "NoMental"=>"$noMental", "isClear"=>"$isClear");

            $organ = $_POST['Organ'];

            try{
                $db = new mysqli('localhost', 'root', '123456', 'project');

                $queryStr = "UPDATE user SET first_name = '$firstName', second_name = '$secondName', third_name = '$thirdName', last_name = '$lastName',
                phone_number = '$phone', email = '$email', birthdate = '$birthdate', blood_type = '$bloodType', city = '$city',
                street = '$street', username = '$username', password = '$password' WHERE id = '$id';";

                $res = $db->query($queryStr);
                $db->commit();

                foreach ($diseases as $x => $x_value){
                    $queryStr3 = "UPDATE donor_diseases SET infection = '$x_value' WHERE disease_name = '$x' AND donor_id = '$donor_id';";
                    $res3 = $db->query($queryStr3);
                    $db->commit();
                }

                $queryStr4 = "UPDATE donated_organs set organ_name = '$organ' WHERE id = '$donor_id';";
                $res4 = $db->query($queryStr4);
                $db->commit();

                //end of insertion
                $db->close();

            }catch (Exception $exception){
                echo $exception;
            }
        }


        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
            <?php

            echo "<title>Animations</title>
    <link rel='stylesheet' href='styles/mainPage.css'>
    <script src='javascripts/box.js'></script>
    <link rel='stylesheet' href='styles/newcss.css'>
    <link rel='stylesheet' href='styles/cssForRecipient.css'>
    <link href='fontawesome-free-6.2.1-web/css/fontawesome.css' rel='stylesheet'>
            <link href='fontawesome-free-6.2.1-web/css/brands.css' rel='stylesheet'>
            <link href='fontawesome-free-6.2.1-web/css/solid.css' rel='stylesheet'>
    ";
            ?>

            <?php
            echo "
     <style>
    
    
    @keyframes fillIt2 {
    100%{
    stroke-dashoffset: $prog22;
    }
    
    }
    @keyframes fillIt {
    100%{
    stroke-dashoffset: $prog1;
    }
   
    }
    
    
    </style>   
    <script>
    function performAnimation(){
    let cont = document.querySelector('.animation-container');
    let h1 = document.querySelector('.ha1-a1');
    let h2 =document.querySelector('.ha2-a2');
    let h3 = document.querySelector('.ha3-a3');
    
    const keyframes = document.createElement('style');
    const keyframes1= document.createElement('style');
    const keyframes2 = document.createElement('style');

    let  width = cont.offsetWidth - 240;
       
   keyframes2.innerHTML = `
        @keyframes juggle{
         0%{
            opacity: 0.5;
        }
        100%{
            opacity: 0.7;
        }
    
    }
    
    .ha3-a3{
        animation: juggle 4s ease-out forwards infinite;
        animation-direction: alternate;

    }
   
   `;
   keyframes1.innerHTML = `
        @keyframes fadeOut{
         0%{
            opacity: 0;
        }
        100%{
            opacity: 0.7;
        }
    
    }
    
    .ha3-a3{
        animation: fadeOut 2s linear forwards ;
        

    }
   
   `;
   
    
    keyframes.innerHTML = `
@keyframes moveright {
        0%{
        width: 200px;
        }
        10%{
        width: 290px;
        }
        70%{
        width: 250px;
        }
       
        100%{
            left: ` +width +`px;
            width: 45px;
            display: none;
        }
    }
    
    

    
    .ha2-a2{
        animation: moveright 0.8s linear forwards;
    }
   

`;

//             document.write(width);
            setTimeout(function() {
               document.getElementById('ha1').style = 'display: inline-block';
               
            },3130);
            setTimeout(function() {
               document.getElementById('ha2').style = 'display: block';
               h2.appendChild(keyframes);
            },3870);
            setTimeout(function() {
               document.getElementById('ha1').style = 'display: none';
               
            },3920);
            
            setTimeout(function() {
              
               h3.appendChild(keyframes1);
               
               
            },4720);
            setTimeout(function() {
               document.getElementById('ha2').style = 'display: none';
               
               setInterval(function (){
                   h3.appendChild(keyframes2);
                  
               },4000);
            
            },4720);
            
            
}
    
    </script>
    
    
";

            ?>



        </head>
        <body onload="performAnimation()">

        <div class="headerBack"></div>
        <div class="navBar">

            <div id="title" style="display: inline-block" data-aos="fade-out"  data-aos-duration="1000"><a  href="donor.php" style="text-decoration: none; color: white; font-style: normal;">PAODT</a></div>
            <div class="menu-close">
                <i class="fa-solid fa-bars fa-3x" onclick="showNav()"></i>
            </div>
            <ul class="navList" id="navList1">
                <li class="navItem"><span><a class = "navLink"  id="idWorks" href="#howItWorks" >How it works</a></span></li>
                <li class="navItem"><a class = "navLink" href="#movAboutUs">About us</a></li>
                <li class="navItem"><a class = "navLink" href="#movStat">Statistics</a></li>
                <li class="navItem"><a style="background: transparent; border:none;cursor: pointer" class = "navLink" href="Profile.php">Profile</a></li>
                <li class="navItem"><a class = "navLink" style="margin-left: 20px;" href="index.php">Logout</a></li>

            </ul>
        </div>



        <h1 class="o1Text" data-aos="fade-up"  data-aos-duration="1300">The Palestinian Association of <br>Organs Donation and Transplantation</h1>
        <h1 class="o1Text2" data-aos="fade-up" data-aos-duration="1800" >We help people, to help themselves</h1>


        <!--animation block-->
        <div class="animation-container">
            <div id="ha1" class="ha1-a1">
                <img src="BackGrounds/whiteheartbeat.gif" alt="hlllllllllllllllll" style="height: 250px;" >
            </div>
            <div id="ha2" class="ha2-a2">

            </div>
            <div id="ha3" class="ha3-a3">
                <svg id="Layer_1"  filter="#shadow2" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512">
                    <defs>
                        <linearGradient id="linear-gradient" x1="256" y1="528.81" x2="256" y2="-16.85" gradientUnits="userSpaceOnUse">
                            <stop offset="0" stop-color="#231f20"/>
                            <stop offset="1" stop-color="#58595b"/>
                        </linearGradient></defs><title>heart</title>
                    <filter id="shadow2">
                        <feDropShadow dx="0" dy="0" stdDeviation="10" flood-color="white" />
                    </filter>

                    <path d="M256,481.87c124.36-96.24,187.43-150,227.69-221.12,56.59-100.1,22.29-185-49.39-218.18C367,11.46,287.19,40.67,256,107.84,224.81,40.67,145,11.46,77.72,42.58,6,75.79-28.27,160.65,28.31,260.76,68.57,331.91,131.64,385.63,256,481.87Z" fill="white" filter="#shadow2"/></svg>
                <h1 style=" text-align: center; font-size: 75px; margin-top: 60px"><?php echo $heartcount?></h1>
            </div>



        </div>


        <!--where animation ends-->





        <div class="works-after-box" id="worksAfterBox" style="margin-top: 27%; margin-bottom: 20% ">

            <div class="centered-works-after-box">
                <div class="in-centered-works-after-box" >
                    <h1 class="header-after-box" id="howItWorks" data-aos="fade-up" data-aos-duration="2400">How it works</h1>
                    <h2 data-aos="fade-up" data-aos-duration="3000" data-aos-delay="100">Sign up as donor and complete your donation's information, to donate specific organs of your choice after death, your donation helps in saving the lives of other people, or altering it to the better, moreover each donated organ will be given to the most suitable person with the highest precedence on the waiting list, depending on specific criteria made by us.</h2>
                </div>





            </div>



        </div>

        <div class="centered-about-after-box" id="movAboutUs">
            <h1 class="header-after-box about-header" data-aos="fade-up" data-aos-duration="2400">About us</h1>
            <h2 class="about-content" data-aos="fade-up" data-aos-duration="3000" data-aos-delay="100">The Palestinian Organization of Organs Donation and Transplantation, is a non-profit organization managed directly by the Palestinian Ministry of Health, Our goal is to give people the chance to help themselves, by offering them ability to donate some of their organs after death, we collect the data of donors and recipients across the country and analyze it, we also supervise on hospitals and surgeons, and by the authority given to us we   schedule the transplantation surgeries.    </h2>


        </div>


        <div class="works-after-box specific" id="movStat">
            <h1 class="header-after-box stat-header" data-aos="fade-up" data-aos-duration="2000">Statistics</h1>
            <div class="centered-statistics-after-box">
                <div class="first-circle" data-aos="zoom-in" data-aos-duration="2500">
                    <div class="progress-container">
                        <div class="progress-outer">
                            <div class="progress-inner">
                                <div id="number">
                                    <?php
                                    echo "$x%";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 400px; height: 400px;">
                            <defs>
                                <linearGradient id="GradientColor">
                                    <stop offset="0%" stop-color="#4895df" />
                                    <stop offset="100%" stop-color="#59caa8" />
                                </linearGradient>
                            </defs>
                            <circle class="circle1" cx="200" cy="200" r="185" stroke-linecap="round" />
                        </svg>

                    </div>
                    <h1 class="after-circle-header">Success rate of Transplantation</h1>
                    <h2>it all starts by your donation, we use our resources to ensure everything is at it best, this includes our hospitals, surgeons and laboratories, all of that for the comfort of you.</h2>

                </div>
                <div class="second-circle" data-aos="zoom-in" data-aos-duration="2500">
                    <div class="progress-container">
                        <div class="progress-outer">
                            <div class="progress-inner">
                                <div id="number">
                                    <?php
                                    echo "$y%";
                                    ?>
                                </div>
                            </div>
                        </div>

                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 400px; height: 400px;">
                            <defs>
                                <linearGradient id="GradientColor">
                                    <stop offset="0%" stop-color="#4895df" />
                                    <stop offset="100%" stop-color="#59caa8" />
                                </linearGradient>
                            </defs>
                            <circle class="circle2" cx="200" cy="200" r="185" stroke-linecap="round" />
                        </svg>

                    </div>
                    <h1 class="after-circle-header">Ratio of Donors to Recipients</h1>
                    <h2>we always aim to have, ratio of 3 donors : 1 recipient or higher, the higher it is, the better its, which makes every recipient more likely to recieve his/her needed organ in time.</h2>
                </div>


            </div>
        </div>

        <div class="community-after-box">
            <h1 class="header-after-box article-header" id="articleHeader">Scientific Articles</h1>


            <!-- Bara 8/12 starts here  -->
            <!-- write the code here -->
            <?php

            //we need to store 7 doctors and 7 bodies --- each post has a doctor and body

            $doctors = array("a","b","c","d","e","f","g");
            $posts = array("a","b","c","d","e","f","g");

            try {
                $db = new mysqli('localhost', 'root', '123456', 'project');


                $sql0 = "SELECT * FROM post order by post_number DESC";
                $res0 = $db->query($sql0);

                $resultCount = $res0->num_rows;



                for ($i = 0 ; $i < 7 ; $i++){
                    if($i == $resultCount || $resultCount == 0){
                        break;
                    }

                    $post = $res0->fetch_object();

                    $sql = "SELECT * FROM doctor WHERE doctor_id = '$post->doctor_id';";
                    $res = $db->query($sql);
                    $doctor = $res->fetch_object();


                    //here i have the last post and the doctor
                    //now i need to print them
                    $posts[$i] = $post->post_content;


                    //i need to get doctor name
                    $sql1 = "SELECT * FROM user WHERE id = '$doctor->id'";
                    $res1 = $db->query($sql1);
                    $row = $res1->fetch_object();

                    $doctors[$i] = $row->first_name . ' ' . $row->second_name . ' ' . $row->third_name . ' ' . $row->last_name;
                }


                $db->close();

            }catch (Exception $e2){
                echo $e2;
            }


            ?>


            <!-- end of the code here  -->

            <div class="articles-container">

                <div class="in-articles-container">
                    <div class="article-left">
                        <h2 class="post-Doctor" data-aos="fade-down" data-aos-duration="1800"><?php echo$doctors[0];?></h2>
                        <p  data-aos="fade-up" data-aos-delay="300" data-aos-duration="2400"><?php echo $posts[0]; ?></p>
                    </div>
                </div>

                <div class="in-articles-container">
                    <div class="article-right">
                        <h2 class="post-Doctor" data-aos="fade-down" data-aos-duration="1800"><?php echo$doctors[1];?></h2>
                        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="2400"><?php echo $posts[1]; ?></p>
                    </div>
                </div>

                <div class="in-articles-container">
                    <div class="article-left">
                        <h2 class="post-Doctor" data-aos="fade-down" data-aos-duration="1800"><?php echo$doctors[2];?></h2>
                        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="2400"><?php echo $posts[2]; ?></p>
                    </div>
                </div>

                <div class="in-articles-container">
                    <div class="article-right">
                        <h2 class="post-Doctor" data-aos="fade-down" data-aos-duration="1800"><?php echo$doctors[3];?></h2>
                        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="2400"><?php echo $posts[3]; ?></p>
                    </div>
                </div>

                <div class="in-articles-container">
                    <div class="article-left">
                        <h2 class="post-Doctor" data-aos="fade-down" data-aos-duration="1800"><?php echo$doctors[4];?></h2>
                        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="2400"><?php echo $posts[4]; ?></p>
                    </div>
                </div>

                <div class="in-articles-container">
                    <div class="article-right">
                        <h2 class="post-Doctor" data-aos="fade-down" data-aos-duration="1800"><?php echo$doctors[5];?></h2>
                        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="2400"><?php echo $posts[5]; ?></p>
                    </div>
                </div>

                <div class="in-articles-container" style="margin-bottom: 0px;">
                    <div class="article-left" style="margin-bottom: 0px;">
                        <h2 class="post-Doctor" data-aos="fade-down" data-aos-duration="1800"><?php echo$doctors[6];?></h2>
                        <p data-aos="fade-up" data-aos-delay="300" data-aos-duration="2400"><?php echo $posts[6]; ?></p>
                    </div>
                </div>


            </div>


            <!-- Bara 8/12 ends here  -->
        </div>


        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init({
                duration: 3000,
                once: false,
            });
        </script>

        </body>
        </html>

<!--end of session-->
    <?php


}
else{
    header('Location: login.php');
}
}






else {
    header('Location: login.php');
}

?>
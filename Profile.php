<?php
session_start();
$id = $_SESSION['id'];
$donor_id = $_SESSION['donor_id'];

//fill the inputs with data from database

try{

    $db = new mysqli('localhost', 'root', '123456', 'project');

    $sql1 = "SELECT * FROM user WHERE id = '$id'";
    $sql2 = "SELECT * FROM donor WHERE id = '$id'";
    $sql3 = "SELECT * FROM donor_diseases WHERE donor_id = '$donor_id'";
    $sql4 = "SELECT * FROM donated_organs WHERE id = '$donor_id'";

    $res1 = $db->query($sql1);
    $res2 = $db->query($sql2);
    $res3 = $db->query($sql3);
    $res4 = $db->query($sql4);

    $user = $res1->fetch_object();
    $donor = $res2->fetch_object();
    $donorDiseases = $res3->fetch_object();

    if($res4->num_rows != 0) {
        $donatedOrgans = $res4 -> fetch_object();
        $organ = $donatedOrgans -> organ_name;
    }
    $blood = 0;
    $bloodType = $user->blood_type;

    if($bloodType == "AB+")  $blood = 0;
    else if($bloodType == "AB-") $blood = 1;
    else if($bloodType == "A+")  $blood = 2;
    else if($bloodType == "A-")  $blood = 3;
    else if($bloodType == "B+")  $blood = 4;
    else if($bloodType == "B-")  $blood = 5;
    else if($bloodType == "O+")  $blood = 6;
    else if($bloodType == "O-")  $blood = 7;

    while ($donorDiseases != null) {
        if ($donorDiseases->disease_name == "NoMental"){
            if ($donorDiseases->infection == "Yes") {
                $noMental = true;
            } else {
                $noMental = false;
            }
        }
        else if ($donorDiseases->disease_name == "isClear"){
            if ($donorDiseases->infection == "Yes"){
                $isClear = true;
            }  else {
                $isClear = false;
            }
        }
        else if ($donorDiseases->disease_name == "Smoke"){
            if ($donorDiseases->infection == "Yes"){
                $smoke = true;
            }else {
                $smoke = false;
            }
        }
        else if ($donorDiseases->disease_name == "Liver"){
            if ($donorDiseases->infection == "Yes"){
                $liver = true;
            } else {
                $liver = false;
            }
        }
        else if ($donorDiseases->disease_name == "Heart"){
            if ($donorDiseases->infection == "Yes"){
                $heart = true;
            } else {
                $heart = false;
            }
        }
        else if ($donorDiseases->disease_name == "Drink"){
            if ($donorDiseases->infection == "Yes"){
                $drink = true;
            }else {
                $drink = false;
            }
        }
        else if ($donorDiseases->disease_name == "Diabetes"){
            if ($donorDiseases->infection == "Yes"){
                $diabetes = true;
            } else {
                $diabetes = false;
            }
        }
        else if ($donorDiseases->disease_name == "BloodPressure"){
            if ($donorDiseases->infection == "Yes"){
                $bloodPressure = true;
            }else {
                $bloodPressure = false;
            }
        }
        else if ($donorDiseases->disease_name == "cancer"){
            if ($donorDiseases->infection == "Yes"){
                $cancer = true;
            } else {
                $cancer = false;
            }
        }
        $donorDiseases = $res3->fetch_object();
    }




    $db->close();

}catch (Exception $exception){
    echo $exception;
}

?>


    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="styles/ProfileCss.css">
    <link rel="stylesheet" href="styles/ProfileCss2.css">


</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row1D">
        <form action="donor.php" method="post">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><span class="font-weight-bold" style="color:black;">PAODT</span><span class="text-black-50" id="ProfileEmail"></span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels" for="usernameD">Username</label><div class="inputbox"><input id="usernameD" name="usernameD" type="text" class="form-control" placeholder="username" value="<?php echo $user->username;?>"></div></div>
                        <div class="col-md-6"><label class="labels" for="passwordD">Password</label> <div class="inputbox"> <input id="passwordD" name="passwordD" type="password" class="form-control" value="<?php echo $user->password;?>" placeholder="password"></div></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels" for="FN">First name</label><div class="inputbox"><input id="FN" name="FN" type="text" class="form-control" placeholder="enter first name" value="<?php echo $user->first_name;?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="SN">Second name</label><div class="inputbox"><input id="SN" name="SN" type="text" class="form-control" placeholder="enter second name" value="<?php echo $user->second_name;?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="TN">Third name</label><div class="inputbox"><input id="TN" name="TN" type="text" class="form-control" placeholder="enter third name" value="<?php echo $user->third_name;?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="LN">Last name</label><div class="inputbox"><input id="LN" name="LN" type="text" class="form-control" placeholder="enter last name" value="<?php echo $user->last_name;?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="BD">BirthDate</label><div class="inputbox"><input id="BD" name="BD" type="date" class="form-control"  value="<?php echo $user->birthdate ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="IDP">ID</label><div class="inputbox"><input id="IDP" name="IDP" type="text" class="form-control" placeholder="enter ID" value="<?php echo $user->id;?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="ADC">City</label><div class="inputbox"><input id="ADC" name="ADC" type="text" class="form-control" placeholder="enter city" value="<?php echo $user->city;?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="ADS">Street</label><div class="inputbox"><input id="ADS" name="ADS" type="text" class="form-control" placeholder="enter street" value="<?php echo $user->street;?>"></div></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels" for="PN">Phone number</label><div class="inputbox"><input id="PN" name="PN" type="text" class="form-control" placeholder="123-1234567" value="<?php echo $user->phone_number;?>"></div></div>
                        <div class="col-md-6"><label class="labels" for="Email">Email</label><div class="inputbox"><input id="Email" name="Email" type="text" class="form-control" value="<?php echo $user->email;?>" placeholder="example@mail.com"></div></div>
                    </div>
                    <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button" name="Save" id="Save" style="background: #4895df ; border-color:white; color:white;">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Medical Information</span><span class="border px-3 p-1 add-experience" id="MedicalButton"><i class="fa fa-plus"></i>&nbsp;Medical</span></div><br>
                    <div class="col-md-12"><label class="labels" for="Btype">Blood Type</label><div class="inputbox"> <select id="Btype" name="Btype">
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>

                            </select>
                        </div></div>



                    <br>
                    <div class="col-md-12"><label class="labels">Diseases</label><br>

                        <input type="checkbox" class="" id="Liver" name="Liver" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="Liver"  style=" margin-left: -45%; ">Liver diseases</label><br>
                        <input type="text" style="display: none" id="liverD" value="<?php echo $liver;?>">

                        <input type="checkbox" class="" id="Heart" name="Heart" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="Heart"  style=" margin-left: -45%; ">Heart diseases</label><br>
                        <input type="text" style="display: none" id="heartD" value="<?php echo $heart;?>">

                        <input type="checkbox" class="" id="Diabetes" name="Diabetes" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="Diabetes"  style=" margin-left: -45%; ">Diabetes</label><br>
                        <input type="text" style="display: none" id="diabetesD" value="<?php echo $diabetes;?>">

                        <input type="checkbox" class="" id="BloodPressure" name="BloodPressure" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="BloodPressure"  style=" margin-left: -45%; ">BloodPressure</label><br>
                        <input type="text" style="display: none" id="bloodPressureD" value="<?php echo $bloodPressure;?>">

                    </div>

                    <div class="col-md-12">
                        <label class="labels">Habits</label><br>

                        <input type="checkbox" class="" id="Smoke" name="Smoke" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="Smoke"  style=" margin-left: -45%; ">Smoking</label><br>
                        <input type="text" style="display: none" id="smokeD" value="<?php echo $smoke;?>">

                        <input type="checkbox" class="" id="Drink" name="Drink" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="Drink"  style=" margin-left: -45%; ">Drinking Alcohol</label><br>
                        <input type="text" style="display: none" id="drinkD" value="<?php echo $drink;?>">
                    </div>

                    <div class="col-md-12">
                        <label class="labels">issues</label><br>

                        <input type="checkbox" class="" id="NoMental" name="NoMental" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="NoMental"  style=" margin-left: -45%; ">I have no Mental issues</label><br>
                        <input type="text" style="display: none" id="noMentalD" value="<?php echo $noMental;?>">

                        <input type="checkbox" class="" id="isClear" name="isClear" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="isClear"  style=" margin-left: -45%; ">I am clear of (AIDS(HIV),Syphilis, HBV, </label><br>
                        <input type="text" style="display: none" id="isClearD" value="<?php echo $isClear;?>">

                        <label style="margin-left: 10%;"> HCV,Cancer(any type) and Immune diseases)</label>
                    </div>


                    <label style="margin-top: 2%; opacity: 0.3;">__________________________________________________</label><br>

                    <div class="col-md-12" style="margin-top: 4%;">
                        <label class="labels">Organs</label><br>
                        <input type="text" style="display: none" name="Organ" id="Organ" value="<?php echo $organ; ?>">

                        <input type="checkbox" class="" id="LiverO" name="LiverO" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="LiverO"  style=" margin-left: -45%; ">Liver</label><br>
                        <input type="checkbox" class="" id="HeartO" name="HeartO" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="HeartO"  style=" margin-left: -45%; ">Heart</label><br>
                        <input type="checkbox" class="" id="RetinaO" name="RetinaO" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="RetinaO"  style=" margin-left: -45%; ">Retina</label><br>
                        <input type="checkbox" class="" id="KidneyO" name="KidneyO" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="KidneyO"  style=" margin-left: -45%; ">Kidney</label><br>
                        <input type="checkbox" class="" id="LungsO" name="LungsO" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="LungsO"  style=" margin-left: -45%; ">Lungs</label><br>


                        <script>
                            document.getElementById("Btype").selectedIndex = <?php echo $blood;?>

                            //for diseases
                            if(document.getElementById("noMentalD").value){
                                document.getElementById("NoMental").checked = true;
                            }

                            if(document.getElementById("isClearD").value){
                                document.getElementById("isClear").checked = true;
                            }

                            if (document.getElementById("liverD").value){
                                document.getElementById("Liver").checked = true;
                            }

                            if (document.getElementById("heartD").value){
                                document.getElementById("Heart").checked = true;
                            }

                            if (document.getElementById("diabetesD").value){
                                document.getElementById("Diabetes").checked = true;
                            }

                            if (document.getElementById("bloodPressureD").value){
                                document.getElementById("BloodPressure").checked = true;
                            }

                            if (document.getElementById("smokeD").value){
                                document.getElementById("Smoke").checked = true;
                            }

                            if (document.getElementById("drinkD").value){
                                document.getElementById("Drink ").checked = true;
                            }

                            //for organs
                            if (document.getElementById('Organ').value == "liver"){
                                document.getElementById("LiverO").checked = true;
                            }
                            else if (document.getElementById('Organ').value == "heart"){
                                document.getElementById("HeartO").checked = true;
                            }
                            else if (document.getElementById('Organ').value == "retina"){
                                document.getElementById("RetinaO").checked = true;
                            }
                            else if (document.getElementById('Organ').value == "kidney"){
                                document.getElementById("KidneyO").checked = true;
                            }
                            else if (document.getElementById('Organ').value == "lungs"){
                                document.getElementById("LungsO").checked = true;
                            }

                        </script>

                    </div>

                </div>
            </div>
        </div>


        </form>


    </div>

</div>

</body>
</html>

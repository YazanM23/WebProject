<?php
session_start();
$id = $_SESSION['id'];
$recipient_id = $_SESSION['recipient_id'];

//fill the inputs with data from database

try{

    $db = new mysqli('localhost', 'root', '123456', 'project');

    $sql1 = "SELECT * FROM user WHERE id = '$id'";
    $sql2 = "SELECT * FROM recipient WHERE id = '$id'";
    $sql3 = "SELECT * FROM recipient_diseases WHERE recipient_id = '$recipient_id'";

    $res1 = $db->query($sql1);
    $res2 = $db->query($sql2);
    $res3 = $db->query($sql3);

    $user = $res1->fetch_object();
    $recipient = $res2->fetch_object();
    $recipientDiseases = $res3->fetch_object();

    $blood = 0;
    $bloodType = $user->blood_type;

    if($bloodType == "AB+")  $blood = 0;
    else if($bloodType == "AB-")  $blood = 1;
    else if($bloodType == "A+")  $blood = 2;
    else if($bloodType == "A-")  $blood = 3;
    else if($bloodType == "B+")  $blood = 4;
    else if($bloodType == "B-")  $blood = 5;
    else if($bloodType == "O+")  $blood = 6;
    else if($bloodType == "O-")  $blood = 7;

    while ($recipientDiseases != null) {
        if ($recipientDiseases->disease_name == "NoMental"){
            if ($recipientDiseases->infection == "Yes") {
                $noMental = true;
            } else {
                $noMental = false;
            }
        }
        else if ($recipientDiseases->disease_name == "isClear"){
            if ($recipientDiseases->infection == "Yes"){
                $isClear = true;
            }  else {
                $isClear = false;
            }
        }
        $recipientDiseases = $res3->fetch_object();
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
    <link rel="stylesheet" href="styles/ProfileCssR.css">
    <link rel="stylesheet" href="styles/ProfileCss2R.css">


</head>
<body>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row1D">
        <form action="recipient.php" method="post">
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
                        <div class="col-md-6"><label class="labels" for="usernameDR">Username</label><div class="inputbox"><input id="usernameDR" name="usernameDR" type="text" class="form-control" placeholder="username" value="<?php echo $user->username;?>"></div></div>
                        <div class="col-md-6"><label class="labels" for="passwordDR">Password</label> <div class="inputbox"> <input id="passwordDR" name="passwordDR" type="password" class="form-control" value="<?php echo $user->password; ?>" placeholder="password"></div></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels" for="FNR">First name</label><div class="inputbox"><input id="FNR" name="FNR" type="text" class="form-control" placeholder="enter first name" value="<?php echo $user->first_name; ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="SNR">Second name</label><div class="inputbox"><input id="SNR" name="SNR" type="text" class="form-control" placeholder="enter second name" value="<?php echo $user->second_name; ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="TNR">Third name</label><div class="inputbox"><input id="TNR" name="TNR" type="text" class="form-control" placeholder="enter third name" value="<?php echo $user->third_name; ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="LNR">Last name</label><div class="inputbox"><input id="LNR" name="LNR" type="text" class="form-control" placeholder="enter last name" value="<?php echo $user->last_name; ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="BDR">BirthDate</label><div class="inputbox"><input id="BDR" name="BDR" type="date" class="form-control"  value="<?php echo $user->birthdate; ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="IDPR">ID</label><div class="inputbox"><input id="IDPR" name="IDPR" type="text" class="form-control" placeholder="enter ID" value="<?php echo $user->id; ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="ADCR">City</label><div class="inputbox"><input id="ADCR" name="ADCR" type="text" class="form-control" placeholder="enter city" value="<?php echo $user->city; ?>"></div></div>
                        <div class="col-md-12"><label class="labels" for="ADSR">Street</label><div class="inputbox"><input id="ADSR" name="ADSR" type="text" class="form-control" placeholder="enter street" value="<?php echo $user->street; ?>"></div></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><label class="labels" for="PNR">Phone number</label><div class="inputbox"><input id="PNR" name="PNR" type="text" class="form-control" placeholder="123-1234567" value="<?php echo $user->phone_number; ?>"></div></div>
                        <div class="col-md-6"><label class="labels" for="EmailR">Email</label><div class="inputbox"><input id="EmailR" name="EmailR" type="text" class="form-control" value="<?php echo $user->email; ?>" placeholder="example@mail.com"></div></div>
                    </div>
                    <div class="mt-5 text-center"><button type="submit" class="btn btn-primary profile-button" type="button" name="SaveR" id="SaveR" style="background: #4895df ; border-color:white; color:white;">Save Profile</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Medical Information</span><span class="border px-3 p-1 add-experience" id="MedicalButton"><i class="fa fa-plus"></i>&nbsp;Medical</span></div><br>
                    <div class="col-md-12"><label class="labels" for="BtypeR">Blood Type</label><div class="inputbox"> <select id="BtypeR" name="BtypeR">
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>O+</option>
                                <option>O-</option>

                            </select>
                        </div></div> <br>




                    <div class="col-md-12">
                        <label class="labels">issues</label><br>

                        <input type="checkbox" class="" id="NoMentalR" name="NoMentalR" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="NoMentalR"  style=" margin-left: -45%; ">I have no Mental issues</label><br>
                        <input type="text" style="display: none" id="NoMentalRR" value="<?php echo $noMental;?>">

                        <input type="checkbox" class="" id="isClearR" name="isClearR" value="" style="height: 15px; margin-left: -45%; margin-top: 1%;"><label for="isClearR"  style=" margin-left: -45%; ">I am clear of (AIDS(HIV),Syphilis, HBV, </label><br>
                        <input type="text" style="display: none" id="isClearRR" value="<?php echo $isClear;?>">

                        <label style="margin-left: 10%;"> HCV,Cancer(any type) and Immune diseases)</label>
                    </div>

                    <script>
                        document.getElementById("BtypeR").selectedIndex = <?php echo $blood;?>


                        if(document.getElementById("NoMentalRR").value){
                            document.getElementById("NoMentalR").checked = true;
                        }

                        if(document.getElementById("isClearRR").value){
                            document.getElementById("isClearR").checked = true;
                        }

                    </script>

                    <label style="margin-top: 2%; opacity: 0.3;">__________________________________________________</label><br>


                </div>
            </div>
        </div>
        </form>
    </div>

</div>
</body>
</html>



<?php
session_start();
if (isset($_SESSION['isAdmin'])){
    if ($_SESSION['isAdmin'] == 1){

        try{
            $db = new mysqli('localhost', 'root', '123456', 'project');


            $queryStr = "SELECT * FROM recipient where recieved = 'no';";
            $res = $db->query($queryStr);
            $aydi1 = $res-> num_rows;

            $queryStr = "SELECT * FROM surgent;";
            $res = $db->query($queryStr);
            $aydi2 = $res-> num_rows;

            $queryStr = "SELECT * FROM post;";
            $res = $db->query($queryStr);
            $aydi3 = $res-> num_rows;

            //n1
            $queryStr = "SELECT * FROM recipient;";
            $res = $db->query($queryStr);
            $n1 = $res-> num_rows;

            //n2
            $queryStr = "SELECT * FROM donor;";
            $res = $db->query($queryStr);
            $n2 = $res->num_rows;

            //n3
            $queryStr = "SELECT * FROM doctor;";
            $res = $db->query($queryStr);
            $n3 = $res->num_rows;

            //n4
            $queryStr = "SELECT * FROM hospital WHERE valid = 'Yes';";
            $res = $db->query($queryStr);
            $n4 = $res->num_rows;

            //surgeries
            $queryStr = "SELECT * FROM surgery;";
            $res = $db->query($queryStr);
            $surgeries = $res->num_rows;

            //lives saved
            $queryStr = "SELECT * FROM surgery WHERE result = 'Success'";
            $res = $db->query($queryStr);
            $livesSaved = $res->num_rows;

            //succeed rate
            $successRate = 0;
            if($surgeries != 0) {
                $successRate = ($livesSaved / $surgeries) * 100;
            }
            $db->close();

        }catch (Exception $exception){
            echo $exception;
        }
?>
            

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- CSS only (bootstrap)-->
    <?php
    echo "
        <link rel='stylesheet' href='styles/adminStyle.css'>
        <link rel='stylesheet' href='styles/HospitalForm.css'>
        <link rel='stylesheet' href='styles/addNew.css'>

    ";
    ?>


    <title>PAODT</title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/adminTables.css">
    <link rel="stylesheet" href="styles/nav-slider.css">
    <script src="javascripts/adminHandler.js"></script>
    <link rel="stylesheet" href="styles/verticalNavBar.css">

    <!--    -->
    <link href="fontawesome-free-6.2.1-web/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome-free-6.2.1-web/css/brands.css" rel="stylesheet">
    <link href="fontawesome-free-6.2.1-web/css/solid.css" rel="stylesheet">
    <script src="update.js"></script>
</head>
<body >

<div class="full-container">

    <div class="bodyContainer">
        <div class="container3">

            <a href="#" class="toggleBox" >
                <span class="icon"></span>
            </a>
            <ul class="navItems">
                <li>
                    <a href="#" onclick="document.getElementById('ccall').style.display='block'; document.getElementById('hospital-add-from').style.display = 'block' ">
                        <i class="fa-solid fa-hospital" style="--i:1"></i>
                        <span style="--g:1">HOSPITAL</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="document.getElementById('ccall').style.display='block'; document.getElementById('surgeon-add-from').style.display = 'block' ">
                        <i class="fa-solid fa-user-nurse" style="--i:2"></i>
                        <span style="--g:2">SURGEON</span>
                    </a>
                </li>
                <li>
                    <a href="#" onclick="document.getElementById('ccall').style.display='block'; document.getElementById('doctor-add-from').style.display = 'block' ">
                        <i class="fa-solid fa-user-doctor" style="--i:3"></i>
                        <span style="--g:3">DOCTOR</span>
                    </a>
                </li>


            </ul>

        </div>
    </div>
    <script>
        var container=document.querySelector(".container3")
        var toggleClick=document.querySelector(".toggleBox");
        toggleClick.addEventListener('click',()=>{
            toggleClick.classList.toggle('active');
            container.classList.toggle('active');
        })
    </script>

    <div class="navBar">

        <a id="titleD" href="admin.php">Dashboard</a>
        <div class="menu-close">
            <i class="fa-solid fa-bars fa-3x" onclick="showNav()"></i>
        </div>
        <ul class="navList" id="navList1">
            <li class="navItem"><span><a class = "navLink"  id="idWorks" href="#lineD" >States</a></span></li>
            <li class="navItem"><a class = "navLink" href="#cnt" >Table</a></li>
            <li class="navItem"><a class = "navLink" href="#ns">Slider</a></li>
            <li
            <li class="navItem"><a class = "navLink" style="margin-left: 20px;" href="index.php">Logout</a></li>

        </ul>
    </div>
    <br>
    <br><br>


    <div class="line-div">
        <div class="first-line-card first-line-card-mid first-card" id="lineD">

            <table class="first-line-table">
                <tr>
                    <td rowspan="2"><i class="fa-solid fa-user fa-3x" style="color: white; width: 40%"></i></td>
                    <td style="font-size: 25px;text-align: left; width: 60%">Recipients</td>
                </tr>
                <tr>
                    <td id="recipientCount" style="font-size: 35px;text-align: left"><?php echo $n1 ?></td>
                </tr>
            </table>

        </div>

        <div class="first-line-card" >
            <table class="first-line-table">
                <tr>
                    <td rowspan="2"><i class="fa-solid fa-user fa-3x" style="color: white; width: 40%"></i></td>
                    <td style="font-size: 25px;text-align: left;width: 60% ">Donors</td>
                </tr>
                <tr>
                    <td id="donorCount" style="font-size: 35px;text-align: left"><?php echo $n2 ?></td>
                </tr>
            </table>

        </div>
        <div class="first-line-card first-line-card-mid " >
            <table class="first-line-table">
                <tr>
                    <td rowspan="2"><i class="fa-solid fa-user-doctor fa-3x" style="width: 40%"></i></td>
                    <td style="font-size: 25px;text-align: left; width: 60%">Doctors</td>
                </tr>
                <tr>
                    <td id="doctorCount" style="font-size: 35px;text-align: left"><?php echo $n3 ?></td>
                </tr>
            </table>

        </div>
        <div class="first-line-card" >
            <table class="first-line-table">
                <tr>
                    <td rowspan="2"><i class="fa-solid fa-hospital fa-3x" style="width: 40%"></i></td>
                    <td style="font-size: 25px;text-align: left; width: 60%">Hospitals</td>
                </tr>
                <tr>
                    <td id="hospitalCount" style="font-size: 35px;text-align: left"><?php echo $n4 ?></td>
                </tr>
            </table>


        </div>


    </div>
    <div class="line2-div">

        <div style="width: 100%">
        <div class="second-line-card second-line-card-mid first-card2 second-line-card-small" >
            <table style="width: 100%;  height: 100%; border-radius: 10px">
                <tr>
                    <td>
                        <h2>Surgeries</h2>
                        <h1 id="surgeryCount"><?php echo $surgeries ?></h1>
                    </td>
                </tr>

            </table>



        </div>
        <div class="second-line-card" >
            <table style="width: 100%;  height: 100%; border-radius: 10px">
                <tr>
                    <td>
                        <h2>Success Rate</h2>
                        <h1 id="surgeryPercentage" ><?php echo $successRate ?></h1>
                    </td>
                </tr>

            </table>
        </div>
        <div class="second-line-card second-line-card-small">
            <table style="width: 100%; height: 100%; border-radius: 10px">
                <tr>
                    <td>
                        <h2>Lives Saved</h2>
                        <h1 id="livesSaved"><?php echo $livesSaved ?></h1>
                    </td>
                </tr>

            </table>




        </div>
            <div class="second-line-card second-line-card-mid" >
                <table style="width: 100%;  height: 100%; border-radius: 10px">
                    <tr>
                        <td>
                            <h2>On Waiting</h2>
                            <h2>List</h2>
                            <h1><?php echo $aydi1;?></h1>
                        </td>
                    </tr>

                    <tr>

                    </tr>
                </table>


            </div>
            <div class="second-line-card second-line-card-small">

                <table style="width: 100%;  height: 100%; border-radius: 10px">
                    <tr>
                        <td>
                            <h2>Surgeons</h2>
                            <h1><?php echo $aydi2;?></h1>
                        </td>
                    </tr>

                    <tr>

                    </tr>
                </table>

            </div>
            <div class="second-line-card"">
                <table style="width: 100%;  height: 100%; border-radius: 10px">
                    <tr>
                        <td>
                            <h2>Posts</h2>
                            <h1><?php echo $aydi3;?></h1>
                        </td>
                    </tr>

                    <tr>
                        <td>

                        </td>
                    </tr>
                </table>
            </div>
        </div>

    <div class="container" id="cnt">
        <div class="table-n1 in-container" id="donor">
            <div style="overflow-x: scroll; -ms-scrollbar-track-color: transparent; scrollbar-shadow-color: transparent">
            <table class="tables">

                <tr>
<thead>
                    <th>Donor ID</th>
                    <th>Name</th>
                    <th>Blood type</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                </tr>

                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $queryStr = "SELECT id FROM donor";
                    $res = $db->query($queryStr);

                    for ($i = 0 ; $i < $res->num_rows ; $i++){
                        $donor = $res->fetch_object();
                        $id = $donor->id;
                        $queryStr1 = "SELECT * FROM user WHERE user.id = $id;";
                        $res1 = $db->query($queryStr1);

                        $row = $res1->fetch_object();

                        $n1 = 'id'.$i;
                        $n2 = 'name'.$i;
                        $n3 = 'blood'.$i;
                        $n4 = 'address'.$i;
                        $n5 = 'phone'.$i;
                        $n6 = 'email'.$i;
                        $b1 = 'btnUpdate'.$i;
                        $b2 = 'btnDelete'.$i;

                        $test = 'test'.$i;
                        echo "
                            <tr>
                             <form action='admin.php' method='get'>
                                <td id='$n1'>$row->id</td>
                                <td id='$n2' contenteditable='true'>$row->first_name $row->second_name $row->third_name $row->last_name</td>
                                <td id='$n3' contenteditable='true'>$row->blood_type</td>
                                <td id='$n4' contenteditable='true'>$row->city - $row->street</td>
                                <td id='$n5' contenteditable='true'>$row->phone_number</td>
                                <td id='$n6' contenteditable='true'>$row->email</td>
                                <td>
                                <input id='$test' type='text' name='$test' style='display: none'>
                                    <button type='submit' onclick='fillData($res->num_rows, $i)' id='$b1' name='$b1' class='updateB'>Update</button>
                                    <button type='submit' onclick='fillData($res->num_rows, $i)' id='$b2' name='$b2' class='deleteB'>Delete</button>
                                </td>
                                </form>
                            </tr>
                        ";
                    }

                    $db->close();

                }catch (Exception $exception){
                    echo $exception;
                }

                ?>

                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $select = "SELECT * FROM donor";
                    $res0 = $db->query($select);

                    $n = $res0->num_rows;

                    for ($i = 0 ; $i < $n ; $i++){
                        if(isset($_GET['btnDelete'.$i])){
                            $user = $_GET['test'.$i];

                            $array = explode('*', $user, 6);
                            $id = $array[0];


                            $sql = "DELETE FROM donor WHERE id = '$id'";
                            $res = $db->query($sql);


                        }

                        if (isset($_GET['btnUpdate'.$i])){

                            $user = $_GET['test'.$i];
                            $array = explode('*', $user, 6);

                            $name = explode(' ', $array[1], 4);
                            $address = explode('-', $array[3], 2);

                            try{
                                $db = new mysqli('localhost', 'root', '123456', 'project');

                                $sql = "UPDATE user SET first_name = '$name[0]', second_name = '$name[1]', third_name = '$name[2]', last_name = '$name[3]', blood_type = '$array[2]', city = '$address[0]', street = '$address[1]', phone_number = '$array[4]', email = '$array[5]' WHERE id = '$array[0]'";
                                $res = $db->query($sql);
                            }catch (Exception $exception){
                                echo $exception;
                            }
                        }

                        $db->commit();
                    }

                    $db->close();
                }catch (Exception $exception){
                    echo $exception;
                }



                ?>
            </table>
            </div>
        </div>
        <div class="table-n2 in-container" id="recipient">
                <div style="overflow-x: scroll; -ms-scrollbar-track-color: transparent; scrollbar-shadow-color: transparent">
                    <table class="tables">
                        <tr>
                            <thead>
                            <th>Recipient ID</th>
                            <th>Name</th>
                            <th>Blood type</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Action</th>
                            </thead>

                        </tr>
                        <?php

                        try {
                            $db = new mysqli('localhost', 'root', '123456', 'project');
                            $queryStr = "SELECT id FROM recipient";
                            $res = $db->query($queryStr);

                            for ($i = 0 ; $i < $res->num_rows ; $i++){
                                $recipient = $res->fetch_object();
                                $id = $recipient->id;
                                $queryStr1 = "SELECT * FROM user WHERE user.id = $id;";
                                $res1 = $db->query($queryStr1);

                                $row = $res1->fetch_object();

                                $n1 = 'idRec'.$i;
                                $n2 = 'nameRec'.$i;
                                $n3 = 'bloodRec'.$i;
                                $n4 = 'addressRec'.$i;
                                $n5 = 'phoneRec'.$i;
                                $n6 = 'emailRec'.$i;
                                $b1 = 'btnUpdateRec'.$i;
                                $b2 = 'btnDeleteRec'.$i;

                                $test = 'testRec'.$i;

                                echo "
                            <tr>
                             <form action='admin.php' method='get'>
                                <td id='$n1'>$row->id</td>
                                <td id='$n2' contenteditable='true'>$row->first_name $row->second_name $row->third_name $row->last_name</td>
                                <td id='$n3' contenteditable='true'>$row->blood_type</td>
                                <td id='$n4' contenteditable='true'>$row->city - $row->street</td>
                                <td id='$n5' contenteditable='true'>$row->phone_number</td>
                                <td id='$n6' contenteditable='true'>$row->email</td>
                                <td>
                                <input id='$test' type='text' name='$test' style='display: none'>
                                    <button type='submit' onclick='fillDataRec($res->num_rows, $i)' id='$b1' name='$b1' class='updateB'>Update</button>
                                    <button type='submit' onclick='fillDataRec($res->num_rows, $i)' id='$b2' name='$b2' class='deleteB'>Delete</button>
                                </td>
                                </form>
                            </tr>
                        ";
                            }

                            $db->close();

                        }catch (Exception $exception){
                            echo $exception;
                        }

                        ?>

                        <?php

                        try {
                            $db = new mysqli('localhost', 'root', '123456', 'project');
                            $select = "SELECT * FROM recipient";
                            $res0 = $db->query($select);

                            $n = $res0->num_rows;

                            for ($i = 0 ; $i < $n ; $i++){
                                if(isset($_GET['btnDeleteRec'.$i])){
                                    $user = $_GET['testRec'.$i];

                                    $array = explode('*', $user, 6);
                                    $id = $array[0];


                                    $sql = "DELETE FROM recipient WHERE id = '$id'";
                                    $res = $db->query($sql);


                                }

                                if (isset($_GET['btnUpdateRec'.$i])){

                                    $user = $_GET['testRec'.$i];
                                    $array = explode('*', $user, 6);

                                    $name = explode(' ', $array[1], 4);
                                    $address = explode('-', $array[3], 2);

                                    try{
                                        $db = new mysqli('localhost', 'root', '123456', 'project');

                                        $sql = "UPDATE user SET first_name = '$name[0]', second_name = '$name[1]', third_name = '$name[2]', last_name = '$name[3]', blood_type = '$array[2]', city = '$address[0]', street = '$address[1]', phone_number = '$array[4]', email = '$array[5]' WHERE id = '$array[0]'";
                                        $res = $db->query($sql);
                                    }catch (Exception $exception){
                                        echo $exception;
                                    }
                                }

                                $db->commit();
                            }

                            $db->close();
                        }catch (Exception $exception){
                            echo $exception;
                        }



                        ?>
                    </table>
                </div>


        </div>

        <div class="table-n3 in-container" id="doctor">
            <div style="overflow-x: scroll; -ms-scrollbar-track-color: transparent; scrollbar-shadow-color: transparent">
            <table class="tables">
                    <tr>
                        <thead>
                        <th>Surgeon ID</th>
                        <th>Surgeon Name</th>
                        <th>Hospital Name</th>
                        <th>Action</th>
                        </thead>

                    </tr>
                    <?php

                    try {
                        $db = new mysqli('localhost', 'root', '123456', 'project');
                        $queryStr = "SELECT * FROM surgent";
                        $res = $db->query($queryStr);

                        for ($i = 0 ; $i < $res->num_rows ; $i++){
                            $row = $res->fetch_object();

                            $n1 = 'idSur'.$i;
                            $n2 = 'nameSur'.$i;
                            $n3 = 'hospitalSur'.$i;
                            $b1 = 'btnUpdateSur'.$i;
                            $b2 = 'btnDeleteSur'.$i;

                            $test = 'testSur'.$i;
                            echo "
                            <tr>
                            <form action='admin.php' method='get'>
                                <td id='$n1'>$row->id</td>
                                <td id='$n2' contenteditable='true'>$row->first_name $row->second_name $row->third_name $row->last_name</td>
                                <td id='$n3' contenteditable='true'>$row->hospital_name</td>
                                <td>
                                <input id='$test' type='text' name='$test' style='display: none'>
                                    <button type='submit' onclick='fillDataSur($res->num_rows, $i)' id='$b1' name='$b1' class='updateB'>Update</button>
                                    <button type='submit' onclick='fillDataSur($res->num_rows, $i)' id='$b2' name='$b2' class='deleteB'>Delete</button>
                                </td>
                                </form>
                            </tr>
                        ";
                        }

                        $db->close();

                    }catch (Exception $exception){
                        echo $exception;
                    }

                    ?>

                    <?php

                    try {
                        $db = new mysqli('localhost', 'root', '123456', 'project');
                        $select = "SELECT * FROM surgent";
                        $res0 = $db->query($select);

                        $n = $res0->num_rows;

                        for ($i = 0 ; $i < $n ; $i++){
                            if(isset($_GET['btnDeleteSur'.$i])){
                                $user = $_GET['testSur'.$i];

                                $array = explode('*', $user, 3);
                                $id = $array[0];


                                $sql = "DELETE FROM surgent WHERE id = '$id'";
                                $res = $db->query($sql);


                            }

                            if (isset($_GET['btnUpdateSur'.$i])){

                                $user = $_GET['testSur'.$i];
                                $array = explode('*', $user, 3);

                                $name = explode(' ', $array[1], 4);

                                try{
                                    $db = new mysqli('localhost', 'root', '123456', 'project');

                                    $sql = "UPDATE surgent SET first_name = '$name[0]', second_name = '$name[1]', third_name = '$name[2]', last_name = '$name[3]', hospital_name = '$array[2]' WHERE id = '$array[0]'";
                                    $res = $db->query($sql);
                                }catch (Exception $exception){
                                    echo $exception;
                                }
                            }

                            $db->commit();
                        }

                        $db->close();
                    }catch (Exception $exception){
                        echo $exception;
                    }



                    ?>

                </table>
            </div>
        </div>

        <div class="table-n4 in-container" id="hospital">
            <div style="overflow-x: scroll; -ms-scrollbar-track-color: transparent; scrollbar-shadow-color: transparent">
            <table class="tables">
                <tr>
                    <thead>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                    </thead>

                </tr>
                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $queryStr = "SELECT * FROM hospital WHERE valid = 'Yes';";
                    $res = $db->query($queryStr);


                    for ($i = 0 ; $i < $res->num_rows ; $i++){
                        $row = $res->fetch_object() ;
                        $n1 = 'nameHos'.$i;
                        $n2 = 'addressHos'.$i;
                        $n3 = 'phoneHos'.$i;
                        $b1 = 'btnUpdateHos'.$i;
                        $b2 = 'btnDeleteHos'.$i;

                        $test = 'testHos'.$i;
                        echo "
                            <tr>
                            <form action='admin.php' method='get'>
                                <td id='$n1'>$row->hospital_name</td>
                                <td id='$n2' contenteditable='true'>$row->city - $row->street</td>
                                <td id='$n3' contenteditable='true'>$row->phone_number</td>
                                <td>
                                <input id='$test' type='text' name='$test' style='display: none'>
                                    <button type='submit' onclick='fillDataHos($res->num_rows, $i)' id='$b1' name='$b1' class='updateB'>Update</button>
                                    <button type='submit' onclick='fillDataHos($res->num_rows, $i)' id='$b2' name='$b2'class='deleteB'>Delete</button>
                                </td>
                                </form>
                            </tr>
                        ";
                        }

                    $db->close();

                }catch (Exception $exception){
                    echo $exception;
                }

                ?>
                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $select = "SELECT * FROM hospital";
                    $res0 = $db->query($select);

                    $n = $res0->num_rows;

                    for ($i = 0 ; $i < $n ; $i++){
                        if(isset($_GET['btnDeleteHos'.$i])){
                            $user = $_GET['testHos'.$i];

                            $array = explode('*', $user, 3);
                            $name = $array[0];


                            $sql = "DELETE FROM hospital WHERE hospital_name = '$name'";
                            $res = $db->query($sql);


                        }

                        if (isset($_GET['btnUpdateHos'.$i])){

                            $user = $_GET['testHos'.$i];
                            $array = explode('*', $user, 3);

                            $address = explode('-', $array[1], 2);

                            try{
                                $db = new mysqli('localhost', 'root', '123456', 'project');

                                $sql = "UPDATE hospital SET city = '$address[0]', street = '$address[1]', phone_number = '$array[2]' WHERE hospital_name = '$array[0]'";
                                $res = $db->query($sql);
                            }catch (Exception $exception){
                                echo $exception;
                            }
                        }

                        $db->commit();
                    }

                    $db->close();
                }catch (Exception $exception){
                    echo $exception;
                }



                ?>

            </table>
            </div>
        </div>
        <div class="table-n5 in-container" id="surgery">
            <div style="overflow-x: scroll; -ms-scrollbar-track-color: transparent; scrollbar-shadow-color: transparent">
            <table class="tables">
                <tr>
                    <thead>
                    <th>Surgery Number</th>
                    <th>Donor Id</th>
                    <th>Recipient Id</th>
                    <th>Date</th>
                    <th>Result</th>
                    <th>Action</th>
                    </thead>

                </tr>
                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $queryStr = "SELECT * FROM surgery;";
                    $res = $db->query($queryStr);

                    for ($i = 0 ; $i < $res->num_rows ; $i++){
                        $row = $res->fetch_object() ;
                        $n1 = 'numSurgery'.$i;
                        $n2 = 'donorSurgery'.$i;
                        $n3 = 'recipientSurgery'.$i;
                        $n4 = 'dateSurgery'.$i;
                        $n5 = 'resultSurgery'.$i;
                        $b1 = 'btnUpdateSurgery'.$i;
                        $b2 = 'btnDeleteSurgery'.$i;

                        $test = 'testSurgery'.$i;
                        echo "
                            <tr>
                            <form action='admin.php' method='get'>
                                <td id='$n1'>$row->surgery_number</td>
                                <td id='$n2'>$row->donor_id</td>
                                <td id='$n3'>$row->recipient_id</td>
                                <td id='$n4' contenteditable='true'>$row->surgery_date</td>
                                <td id='$n5' contenteditable='true'>$row->result</td>
                                <td>
                                <input id='$test' type='text' name='$test' style='display: none'>
                                    <button type='submit' onclick='fillDataSurgery($res->num_rows, $i)' id='$b1' name='$b1' class='updateB'>Update</button>
                                    <button type='submit' onclick='fillDataSurgery($res->num_rows, $i)' id='$b2' name='$b2' class='deleteB'>Delete</button>
                                </td>
                                </form>
                            </tr>
                        ";
                    }

                    $db->close();

                }catch (Exception $exception){
                    echo $exception;
                }

                ?>

                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $select = "SELECT * FROM surgery";
                    $res0 = $db->query($select);

                    $n = $res0->num_rows;

                    for ($i = 0 ; $i < $n ; $i++){
                        if(isset($_GET['btnDeleteSurgery'.$i])){
                            $user = $_GET['testSurgery'.$i];

                            $array = explode('*', $user, 5);
                            $num = $array[0];


                            $sql = "DELETE FROM surgery WHERE surgery_number = '$num'";
                            $res = $db->query($sql);


                        }

                        if (isset($_GET['btnUpdateSurgery'.$i])){

                            $user = $_GET['testSurgery'.$i];
                            $array = explode('*', $user, 5);

                            $date = explode('-', $array[3], 3);
                            $result = $array[4];

                            try{
                                $db = new mysqli('localhost', 'root', '123456', 'project');

                                $sql = "UPDATE surgery SET surgery_date = '$array[3]', result = '$result' WHERE surgery_number = '$array[0]'";
                                $res = $db->query($sql);
                            }catch (Exception $exception){
                                echo $exception;
                            }
                        }

                        $db->commit();
                    }

                    $db->close();
                }catch (Exception $exception){
                    echo $exception;
                }



                ?>


            </table>
            </div>
        </div>
        <div class="table-n6 in-container" id="test">
            <div style="overflow-x: scroll; -ms-scrollbar-track-color: transparent; scrollbar-shadow-color: transparent">
            <table class="tables">
                <tr>
                    <thead>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                    </thead>

                </tr>
                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $queryStr = "SELECT * FROM doctor";
                    $res = $db->query($queryStr);

                    for ($i = 0 ; $i < $res->num_rows ; $i++){
                        $doctor = $res->fetch_object() ;

                        $id = $doctor->id;
                        $queryStr1 = "SELECT * FROM user WHERE user.id = $id;";
                        $res1 = $db->query($queryStr1);

                        $row = $res1->fetch_object();

                        $n1 = 'idDoc'.$i;
                        $n2 = 'nameDoc'.$i;
                        $n3 = 'phoneDoc'.$i;
                        $n4 = 'emailDoc'.$i;
                        $n5 = 'addressDoc'.$i;
                        $b1 = 'btnUpdateDoc'.$i;
                        $b2 = 'btnDeleteDoc'.$i;

                        $test = 'testDoc'.$i;



                        echo "
                            <tr>
                            <form action='admin.php' method='get'>
                                <td id='$n1'>$row->id</td>
                                <td id='$n2' contenteditable='true'>$row->first_name $row->second_name $row->third_name $row->last_name</td>
                                <td id='$n3' contenteditable='true'>$row->phone_number</td>
                                <td id='$n4' contenteditable='true'>$row->email</td>
                                <td id='$n5' contenteditable='true'>$row->city - $row->street</td>
                                
                                <td>
                                <input id='$test' type='text' name='$test' style='display: none'>
                                    <button type='submit' onclick='fillDataDoc($res->num_rows, $i)' id='$b1' name='$b1' class='updateB'>Update</button>
                                    <button type='submit' onclick='fillDataDoc($res->num_rows, $i)' id='$b2' name='$b2' class='deleteB'>Delete</button>
                                </td>
                                </form>
                            </tr>
                        ";
                    }

                    $db->close();

                }catch (Exception $exception){
                    echo $exception;
                }

                ?>

                <?php

                try {
                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $select = "SELECT * FROM doctor";
                    $res0 = $db->query($select);

                    $n = $res0->num_rows;

                    for ($i = 0 ; $i < $n ; $i++){
                        if(isset($_GET['btnDeleteDoc'.$i])){
                            $user = $_GET['testDoc'.$i];

                            $array = explode('*', $user, 5);
                            $id = $array[0];


                            $sql = "DELETE FROM doctor WHERE id= '$id'";
                            $res = $db->query($sql);


                        }

                        if (isset($_GET['btnUpdateDoc'.$i])){

                            $user = $_GET['testDoc'.$i];
                            $array = explode('*', $user, 5);

                            $name = explode(' ', $array[1], 4);
                            $address = explode('-', $array[4], 2);

                            try{
                                $db = new mysqli('localhost', 'root', '123456', 'project');

                                $sql = "UPDATE user SET city = '$address[0]', street = '$address[1]',
                phone_number = '$array[2]', first_name = '$name[0]', second_name = '$name[1]', third_name = '$name[2]',
                last_name = '$name[3]', phone_number = '$array[2]', email = '$array[3]' WHERE id = '$array[0]'";

                                $res = $db->query($sql);
                            }catch (Exception $exception){
                                echo $exception;
                            }
                        }

                        $db->commit();
                    }

                    $db->close();
                }catch (Exception $exception){
                    echo $exception;
                }



                ?>

            </table>
            </div>
        </div>
        <div class="table-n7 in-container in-container-sch" id="schedule">
            <h1 id="schedule1" style="color: white">Schedule</h1>
            <form action="admin.php" method="post">
            <div class="donor">
                <div class="content">

                    <label for="donorname" class="sch-label">Donor Name</label>
                    <div class="inputbox1">
                    <input type="text" name="donorname" id="donorname" class="sch-field" placeholder="Enter Donor Name"><br>
                    </div>
                    <label for="donorid" class="sch-label">ID</label>
                     <div class="inputbox1">
                         <input type="text" name="donorid" id="donorid" class="sch-field" placeholder="Enter Donor ID"><br></div>
                </div>
            </div>
            <div class="recipient">

                    <div class="content">
                        <label for="recipientname" class="sch-label" >Recipient Name</label>
                        <div class="inputbox1">
                            <input type="text" name="recipientname" id="recipientname" class="sch-field" placeholder="Enter Recipient Name"><br></div>
                        <label for="recipientid" class="sch-label">ID</label>
                        <div class="inputbox1">
                            <input type="text" name="recipientid" id="recipientid" class="sch-field" placeholder="Enter Recipient ID"><br></div>
                    </div>

            </div>
            <div class="other-Data" >
                <label for="date" class="sch-label" >Date</label>
                <div class="inputbox1">
                <input type="date" name="date" id="date" class=""><br>
                </div>
                <label for="hos" class="sch-label" >Hospital</label>
                <div class="inputbox1">
                    <input type="text" name="hos" id="hos" class="sch-field" placeholder="Enter Hospital Name"><br></div>
                <label for="sur" class="sch-label" >Surgeon</label>
                <div class="inputbox1">
                <input type="text" name="sur" id="sur" class="sch-field" placeholder="Enter Surgeon Name"><br>
                </div>
                <br>
                <br>
                <br>
                <br>
                <label style="margin-left: -90%">Organ</label>
                <br>

                <div class="organsClass "
                     style="margin-top: 1% ; ">

                    <select id="Organs-admin" name="Organs-admin">
                        <option>Heart</option>
                        <option>Kidney</option>
                        <option>Liver</option>
                        <option>Retina</option>
                        <option>Lungs</option>
                    </select>
                </div>
            </div>

                <button type="submit" value="Done" name="done" id="done">Done</button>
            </form>
        </div>



        <?php

            if (isset($_POST['done'])){
                $donorName = $_POST['donorname'];
                $donorId = $_POST['donorid'];

                $recipientID = $_POST['recipientid'];
                $recipientName = $_POST['recipientname'];

                $date = $_POST['date'];
                $hospitalName = $_POST['hos'];
                $surgeon = $_POST['sur'];
                $organ = $_POST['Organs-admin'];


                try{

                    $db = new mysqli('localhost', 'root', '123456', 'project');
                    $sql = "INSERT INTO surgery (surgery_date, organ, result, hospital_name, recipient_id, donor_id, surgent_name)
VALUES (str_to_date('$date','%Y-%m-%d'), '$organ', 'Success', '$hospitalName', '$recipientID', '$donorId', '$surgeon');" ;

                    $res = $db->query($sql);
                    $db->commit();
                    $db->close();
                }catch (Exception $exception){
                    echo $exception;
                }
            }


        ?>


    </div>
    <div class="nav-slider" id="ns">
        <div class="table-s1 in-container-slider"  onclick="manageContent(0)">
            <h1 class="h11">Donors</h1>
            <table class="tables-s">
                <tr>
                    <th>Donor ID</th>
                    <th>Name</th>
                    <th>Blood type</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                </tr>


            </table>
        </div>
        <div class="table-s2 in-container-slider" onclick="manageContent(1)">
            <h1 class="h11">Recipients</h1>
                <table class="tables-s">
                    <tr>
                        <th>Recipient ID</th>
                        <th>Name</th>
                        <th>Blood type</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                    </tr>

                </table>
        </div>
        <div class="table-s3 in-container-slider"  onclick="manageContent(2)">
            <h1 class="h11">Surgeons</h1>
                <table class="tables-s">
                    <tr>
                        <th>Surgeon ID</th>
                        <th>Surgeon Name</th>
                        <th>Hospital Name</th>
                        <th>Action</th>
                    </tr>
                </table>
        </div>
        <div class="table-s4 in-container-slider"  onclick="manageContent(3)">
            <h1 class="h11">Hospitals</h1>
            <table class="tables-s">
                <tr>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                </tr>
            </table>
        </div>
        <div class="table-s5 in-container-slider"  onclick="manageContent(4)">
            <h1 class="h11">Surgeries</h1>
            <table class="tables-s">
                <tr>
                    <th>Surgery Number</th>
                    <th>Donor Id</th>
                    <th>Recipient Id</th>
                    <th>Date</th>
                    <th>Result</th>
                </tr>
            </table>
        </div>
        <div class="table-s6 in-container-slider"  onclick="manageContent(5)">
            <h1 class="h11">Doctors</h1>
            <table class="tables-s">
                <tr>
                    <th>Doctor ID</th>
                    <th>Doctor Name</th>
                    <th>Phone number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>

                </tr>
            </table>
        </div>
        <div class="table-s7 in-container-slider"  onclick="manageContent(6)">
            <h1 class="h11">Schedule</h1>

        </div>

    </div>

</div>
    <div class="above-full" id="ccall">
    <button class="backMain" onclick="document.getElementById('ccall').style.display= 'none';
    document.getElementById('doctor-add-from').style.display= 'none';
    document.getElementById('hospital-add-from').style.display= 'none';
    document.getElementById('surgeon-add-from').style.display= 'none'">back</button>

    <div class="forms-container">

        <div class="hospital-add" id="hospital-add-from" style="position: absolute; top:1%; left:36%;">
<div class="hos-cont">
    <div class="whiteHos">
            <div style="text-align: center; margin-top: 0px">
                <br>
                <h1 style="color:black;">New Hospital</h1>
                <i class="fa-solid fa-hospital fa-3x" style="color:black;"></i>
            </div>

            <form action="admin.php" method="post">

                <table style="width: 90%;  text-align: left; font-size: 24px; margin: 20px auto;">
                    <tr>


                            <td style="width: 30%;">
                                <label for="hos-name" class="label1 details" >Hospital Name</label></td></tr>
                    <tr>

                        <td style="width: 70%">     <div class="inputbox"><input type="text" name="hos-name" id="hos-name" required class="textfield" placeholder="Enter the Hospital Name"></div></td>
                    </tr>


        <tr><td><label for="hos-address" class="label1 details">City</label></td></tr>
        <tr>
            <td> <div class="inputbox"><input type="text" name="hos-address" id="hos-address" required class="textfield" placeholder="Enter Hospital City"></div></td>
        </tr>

        <tr><td><label for="hos-street" class="label1 details">Street</label></td></tr>
        <tr>
            <td> <div class="inputbox"><input type="text" name="hos-street" id="hos-street" required class="textfield" placeholder="Enter Hospital Street"></div></td>
        </tr>



        <tr><td><label for="hos-phone" class="label1 details">Phone Number</label></td></tr>
        <tr>

            <td> <div class="inputbox"><input type="text" name="hos-phone" id="hos-phone" required class="textfield" placeholder="123-1234567"></div></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Add" class="sub-button" id="hos-add-btn" name="hos-add-btn" ></td>

        </tr>
        </table>

        </form>
        <?php
        if (isset($_POST['hos-add-btn'])){
            //page1
            $hospitalName = $_POST['hos-name'];
            $city = $_POST['hos-address'];
            $street = $_POST['hos-street'];
            $phone = $_POST['hos-phone'];;

            //now we need to insert the data to our database
            try{
                $db = new mysqli('localhost', 'root', '123456', 'project');

                //insert into user
                $queryStr = "INSERT INTO hospital VALUES ('$hospitalName', '$street', '$city', '$phone', 'Yes');";
                $res = $db->query($queryStr);
                $db->commit();

                //end of insertion
                $db->close();

            }catch (Exception $exception){
                echo $exception;
            }
        }
        ?>
    </div>
    </div>
        </div>
    </div>
    <div class="Surgeon-add" id="surgeon-add-from" style="position: absolute; top:1%; left:36%">
<div class="serg-cont">
    <div class="whiteCont">
        <div style="text-align: center; margin-top: 0px;color:black;">
            <br>
            <h1 style="color:black;">New Surgeon</h1>
            <i class="fa-solid fa-user-nurse fa-3x"></i>
        </div>

        <form action="admin.php" method="post">

            <table style="width: 90%;  text-align: left; font-size: 24px; margin: 20px auto;">
                <tr><td style="width: 30%;"><label for="doc-name" class="label1 details">Surgeon Name</label></td></tr>
                <tr>

                    <td style="width: 70%"><div class="inputbox"><input type="text" name="doc-name" id="doc-name" required class="textfield" placeholder="Enter Surgeon Name"></div> </td>
                </tr>

                <tr><td><label for="doc-id" class="label1 details">Surgeon ID</label></td></tr>
                <tr>
                    <td><div class="inputbox"><input type="text" name="doc-id" id="doc-id" required class="textfield" placeholder="Enter Surgeon ID"></div></td>
                </tr>
                <tr><td><label for="doc-phone" class="label1 details">Phone Number</label></td></tr>
                <tr>

                    <td><div class="inputbox"><input type="text" name="doc-phone" id="doc-phone" required class="textfield" placeholder="123-1234567"></div>  </td>
                </tr>
                <tr><td><label for="doc-hos-name" class="label1 details">Hospital</label></td></tr>
                <tr>

                    <td><div class="inputbox"><input type="text" name="doc-hos-name" id="doc-hos-name" required class="textfield" placeholder="Enter Hospital Name"></div></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Add" class="sub-button" id="doc-add-btn" name="doc-add-btn"></td>

                </tr>
            </table>

        </form>
        <?php
        if (isset($_POST['doc-add-btn'])){
            //page1
            $surgeonName = $_POST['doc-name'];
            $phone = $_POST['doc-phone'];
            $id = $_POST['doc-id'];
            $hospitalName = $_POST['doc-hos-name'];

            $name = explode(' ', $surgeonName, 4);

            //now we need to insert the data to our database
            try{
                $db = new mysqli('localhost', 'root', '123456', 'project');

                //insert into surgeon
                $queryStr = "INSERT INTO surgent (hospital_name, first_name, second_name, third_name, last_name, id) VALUES ('$hospitalName', '$name[0]', '$name[1]', '$name[2]', '$name[3]', '$id')";
                $res = $db->query($queryStr);
                $db->commit();

                //end of insertion
                $db->close();

            }catch (Exception $exception){
                echo $exception;
            }
        }
        ?>
    </div>
</div>
</div>
    <div class="doctor-add" id="doctor-add-from" style="position: absolute; top:1%; left:36%;">

            <div class="container2" >

                <form  action="admin.php" method="post">
                    <div class="inputbox" >

                        <label for="FN2" class="FN2 details" >First Name</label>
                        <input type="text" id="FN2" class="check2" name="FN2" required placeholder="Enter First Name">

                    </div>
                    <div class="inputbox">

                        <label for="SN2" class="SN2 details" >Second Name</label>
                        <input type="text" id="SN2" class="check2" name="SN2" required placeholder="Enter Second Name">
                    </div>
                    <div class="inputbox">

                        <label for="TN2" class="TN2 details">Third Name</label>
                        <input type="text" id="TN2" class="check2" name="TN2" required placeholder="Enter Third Name"><br><br>
                    </div>
                    <div class="inputbox">

                        <label for="LN2" class="LN2 details">Last Name</label>
                        <input type="text" id="LN2" class="check2" name="LN2" required placeholder="Enter Last Name"><br><br>
                    </div>
                    <div class="inputbox">

                        <label for="BD2" class="BD2 details" class="check2" required>BirthDate</label>
                        <input id="BD2" type="date" class="check2" name="BD2" required>

                    </div>
                    <div class="inputbox">

                        <label for="IDP2" class="IDP2 details" >ID</label>
                        <input id="IDP2" class="check2" type="text" name="IDP2" required placeholder="Enter Doctor ID">
                    </div>
                    <div class="inputbox">
                        <label for="ADC2" class="ADC2 details" >Address</label>
                        <input type="text" id="ADC2" class="check2" name="ADC2" placeholder="City" required>
                        <input type="text" id="ADS2" class="check2" name="ADS2" placeholder="Street" required>
                    </div>

                    <div class="gender-details">
                        <label class="Gender2 details">Gender</label>
                        <div class="category">
                            <input type="radio" id="GM2" class="check2" name="G2" value="male" required><label for="GM2" style="color:black;">Male</label>
                            <input type="radio" id="GF2" class="check2" name="G2" value="female"><label for="GF2" style="color:black;">Female</label>
                        </div>
                    </div>

                    <br><br>
                    <div class="inputbox">

                        <label for="Email2" class="Email2 details" >Email</label>
                        <input type="email" id="Email2" class="check2" name="Email2" placeholder="example@mail.com" required>
                    </div>
                    <div class="inputbox">

                        <label for="PN2" class="PN2 details">Phone Number</label>
                        <input type="tel" id="PN2" class="check2" name="PN2" placeholder="123-123456789" required>
                    </div>
                    <div class="inputbox">

                        <label for="usernameR" class="details">Username</label>
                        <input type="text" required id="usernameR" name="usernameR" placeholder="Enter UserName">
                    </div>
                    <div class="inputbox">

                        <label for="passwordR" class="details" style="margin-left: 20px;">Password</label>
                        <input type="password" name="passwordR" id="passwordR" style="margin-left: 20px;" required placeholder="Enter Password">
                    </div>
                    <br>

                    <input id="newDoc" class="check2" type="submit" onclick="hideDivPersonal2()" name="newDoc" value="Add">

            </div>
        </form>
        <?php
        if (isset($_POST['newDoc'])){
            //page1
            $firstName = $_POST['FN2'];
            $secondName = $_POST['SN2'];
            $thirdName = $_POST['TN2'];
            $lastName = $_POST['LN2'];
            $date = $_POST['BD2'];
            $id = $_POST['IDP2'];
            $city = $_POST['ADC2'];
            $street = $_POST['ADS2'];
            $gender = $_POST['G2'];
            $email = $_POST['Email2'];
            $phone = $_POST['PN2'];

            $username = $_POST['usernameR'];
            $password = $_POST['passwordR'];

            //now we need to insert the data to our database
            try{
                $db = new mysqli('localhost', 'root', '123456', 'project');

                //insert into user
                $queryStr1 = "INSERT INTO user (id, first_name, second_name, third_name, last_name, phone_number, gender, email, birthdate, blood_type, city, street, username, password) VALUES ('$id', '$firstName', '$secondName', '$thirdName', '$lastName', '$phone',  '$gender', '$email', str_to_date('$date','%Y-%m-%d'),  'A-', '$city', '$street',  '$username', '$password'); ";
                $res1 = $db->query($queryStr1);
                $db->commit();

                $queryStr = "INSERT INTO doctor (id) VALUES ('$id');";
                $res = $db->query($queryStr);
                $db->commit();

                //end of insertion
                $db->close();

            }catch (Exception $exception){
                echo $exception;
            }
        }
        ?>

    </div>
</div>
</div>

</div>

</body>
</html>

</div>

</body>
</html>



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

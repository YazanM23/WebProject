<?php
session_start();
if (isset($_SESSION['isDoctor'])){
if ($_SESSION['isDoctor'] == 1){

try{
    $db = new mysqli('localhost', 'root', '123456', 'project');

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








<?php
try {
    $db = new mysqli('localhost','root','123456','project');

    $query1 = "select * from recipient";
    $res = $db->query($query1);
    $n1 = $res->num_rows;

    $query2 = "select * from message";
    $res2 = $db->query($query2);
    $n2 = $res2->num_rows;

    $query3 = "select * from message where answered = 'Yes'";
    $res3 = $db->query($query3);
    $n3 = $res3->num_rows;

    $query4 = "select * from surgery where result = 'successful'";
    $res4 = $db->query($query4);
    $n4 = $res4->num_rows;

    $query5 = "select * from surgery";
    $res5 = $db->query($query5);
    $n5 = $res5->num_rows;




    if($n4 != 0){
        $n4 = ($n4 / $n5) * 100;

    }
    $db->close();


}catch (Exception $e) {
    echo $e;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PAODT</title>
    <?php
    echo "<link rel='stylesheet' type='text/css' href='styles/doctorStyle.css'>
            <link rel='stylesheet' type='text/css' href='styles/doctorCards.css'>
            <link href='fontawesome-free-6.2.1-web/css/fontawesome.css' rel='stylesheet'>
            <link href='fontawesome-free-6.2.1-web/css/brands.css' rel='stylesheet'>
            <link href='fontawesome-free-6.2.1-web/css/solid.css' rel='stylesheet'>
            <script src='javascripts/doctorHandler.js'></script>
           
            ";
    ?>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Comfortaa&display=swap" rel="stylesheet">



</head>
<body>
<div class="navBar">

    <a id="titleD" href="doctor.php">DOCTOR</a>
    <div class="menu-close">
        <i class="fa-solid fa-bars fa-3x" onclick="showNav()"></i>
    </div>
    <ul class="navList" id="navList1">
        <li class="navItem"><span><a class = "navLink"  id="idWorks" href="#line-div" >States</a></span></li>
        <li class="navItem"><a class = "navLink" href="#POSTH">Post</a></li>
        <li class="navItem"><a class = "navLink" href="#titleM1">Messages</a></li>
        <li
        <li class="navItem"><a class = "navLink" style="margin-left: 20px;" href="index.php">Logout</a></li>

    </ul>
</div>
<br>
<br>

<div class="big-container">
    <div class="line1-div">
        <div id="line-div">
            <div class="first-line-card first-line-card-mid first-card" >

                <table class="first-line-table">
                    <tr>
                        <td rowspan="2" style="text-align: center"><i class="fa-solid fa-user fa-3x" style="color: white ; width: 40%"></i></td>
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
                        <td rowspan="2" style="text-align: center"><i class="fa-solid fa-message fa-3x" style="color:  white; width: 40%; text-align: center"></i></td>
                        <td style="font-size: 25px;text-align: left;width: 60% ">Messages</td>
                    </tr>
                    <tr>
                        <td id="donorCount" style="font-size: 35px;text-align: left"><?php echo $n2 ?></td>
                    </tr>
                </table>

            </div>

            <div class="first-line-card first-line-card-mid" >
                <table class="first-line-table">
                    <tr>
                        <td rowspan="2" style="text-align: center"><i class="fa-solid fa-circle-check fa-3x" style="color:  white; width: 40%; text-align: center"></i></td>
                        <td style="font-size: 25px;text-align: left;width: 60% ">Answered</td>
                    </tr>
                    <tr>
                        <td id="donorCount" style="font-size: 35px;text-align: left"><?php echo $n3 ?></td>
                    </tr>
                </table>

            </div>

            <div class="first-line-card" >
                <table class="first-line-table">
                    <tr>
                        <td rowspan="2" style="text-align: center"><i class="fa-solid fa-percent fa-3x" style="color: white; width: 40%; text-align: center"></i></td>
                        <td style="font-size: 25px;text-align: left;width: 60% ">Success</td>
                    </tr>
                    <tr>
                        <td id="donorCount" style="font-size: 35px;text-align: left"><?php echo "$n4%" ?></td>
                    </tr>
                </table>

            </div>

        </div>



    </div>
    <div class="line2-div" >
        <div class="post-div" >
            <form action="doctor.php" method="post" autocomplete="off">

                <div class="post-header" id="POSTH">
                    <div class="post-line11" >
                        <input type="text" name="postTitle" id="postTitle" placeholder="Title" class="post-title">
                    </div>
                    <div class="post-line12">
                        <button type="submit" id="addPost" name="addPost" value="post" class="post-post" onmouseover="document.getElementById('ttt2').style.zIndex = '6';">
                            <span class="btn-txt" id="ttt2">Post</span>
                            <span class="one"></span>
                            <span class="two"></span>
                            <span class="three"></span>
                            <span class="four"></span>
                        </button>
                    </div>
                </div>
                <div class="post-body">
                    <textarea name="postBody" id="postBody"  class="post-body-area" placeholder="Type your post here .."></textarea>
                </div>



            </form>
            <?php
                if(isset($_POST['addPost'])) {
                    try {
                        $db = new mysqli('localhost','root','123456','project');
                        $postBody = $_POST['postBody'];
                        $title = $_POST['postTitle'];
                        $docid = $_SESSION['doctor_id'];


                        $postquery = "INSERT INTO post (post_content, post_title, doctor_id) values ('$postBody','$title',$docid)";
                        $resa = $db->query($postquery);

                        $db->commit();
                        $db->close();
                    }catch (Exception $e1)
                    {
                        echo $e1;
                    }


                }

            ?>


        </div>


        <h1 class="titleM" id="titleM1" style="color: white;margin-left:1.5%; margin-bottom: 2%; margin-top: 5%">Messages</h1>
    </div>
    <div class="line3-div">

        <?php
        try {
            $db = new mysqli('localhost','root','123456','project');

            if (isset($_POST['send-btn'])){
                $reply = $_POST['msgAnswer'];
                $theID = $_POST['MID'];

                $querystr22 = "UPDATE  message SET reply = '$reply', answered = 'yes' WHERE message_number = '$theID' ;";
                $res11 = $db->query($querystr22);
                $db->commit();

            }


            $querystr = "SELECT * FROM message WHERE answered = 'no';";
            $answered1 = $db->query($querystr);

            $notAnsweredCount = $answered1->num_rows;

            $querystr1 = "SELECT * FROM message WHERE answered = 'yes';";
            $answered2 = $db->query($querystr1);


            $answeredCount = $answered2->num_rows;




            for($i = 0;$i < $notAnsweredCount; $i++) {
                $row = $answered1->fetch_object();
                $messageTitle = $row->title;

                $querystr2 = "SELECT * FROM recipient WHERE recipient_id = '$row->recipient_id';";
                $recipient = $db->query($querystr2);
                $recipientrow = $recipient->fetch_object();

                $querystr3 = "SELECT * FROM user WHERE id = '$recipientrow->id';";
                $user = $db->query($querystr3);

                $userrow = $user->fetch_object();


                $recipientName = $userrow->first_name . ' ' . $userrow->second_name . ' ' . $userrow->third_name . ' ' . $userrow->last_name;
                $messageContent= $row->content;
                $y = $row->message_number;
                echo
                "
        <div class='message-container'>
            <div class='message-header'>
                <table class='message-table'>
                    <tr>
                        <td id='message-title' style='width: 95%' >$messageTitle</td>
                        <td rowspan='2' style='width: 5%;'>
                            <div class='message-open'>
                            <a href='#msgAnswer' style=' color:rgba(72, 149, 223);;
    text-decoration: none; '>
                                <i class='fa-solid fa-plus fa-2x' onclick='openMessage($i)' style='margin-right: 20px;'></i>
                                </a>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td id='recipient-name'>$recipientName</td>
                    </tr>
                </table>
            </div>

            <div class='msg-content' id='messageContent$i'>
                <p>$messageContent</p>
                <div class='message-answer'>
                <form action='doctor.php' method='post'>
                <textarea name='msgAnswer' id='msgAnswer' cols='30' rows='5' ></textarea>
                  <button type='submit' value='Send' name='send-btn' id='send-btn' class='post-post' style='background: rgba(72, 149, 223); ' onmouseover='document.getElementById('ttt2').style.zIndex = '6';'>
                            <span class='btn-txt' id='ttt2'>SEND</span>
                            <span class='one'></span>
                            <span class='two'></span>
                            <span class='three'></span>
                            <span class='four'></span>
                        </button>
                <input type='text' name='MID' id='MID'  value='$y' style='visibility: hidden'>
                </form>
                </div>
            </div>
        
        
        ";

            }

//        for  answered messages
            for($i = $notAnsweredCount;$i < $answeredCount + $notAnsweredCount; $i++) {
                $row = $answered2->fetch_object();
                $messageTitle = $row->title;

                $querystr2 = "SELECT * FROM recipient WHERE recipient_id = '$row->recipient_id';";
                $recipient = $db->query($querystr2);
                $recipientrow = $recipient->fetch_object();

                $querystr3 = "SELECT * FROM user WHERE id = '$recipientrow->id';";
                $user = $db->query($querystr3);

                $userrow = $user->fetch_object();


                $recipientName = $userrow->first_name . ' ' . $userrow->second_name . ' ' . $userrow->third_name . ' ' . $userrow->last_name;
                $messageContent= $row->content;
                echo
                "
        <div class='message-container'>
            <div class='message-header2'>
                <table class='message-table'>
                    <tr>
                        <td id='message-title' style='width: 95%' >$messageTitle</td>
                        <td rowspan='2' style='width: 5%;'>
                            <div class='message-open'>
                                <i class='fa-solid  fa-check fa-2x' onclick='openMessage($i)' ></i>
                                
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td id='recipient-name'>$recipientName</td>
                    </tr>
                </table>
            </div>

            <div class='msg-content2' id='messageContent$i'>
                <p>$messageContent</p>
            </div>
        
        
        ";





        }
            $db->close();

}catch (Exception $e2){
    echo $e2;
}







        ?>

        </div>


    </div>



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
<?php
session_start();

include_once '../controller/ControllerNote.php';
$noteController = new ControllerNote();


//FUTURE FIX: MAKE SURE TO USE A SUB CONTROLLER TO CONTROLL THE REGITARION BECAUSE EACH REFRESH MAKE A NEW NOTE AND IT WILL BE A MESS
$listofInfo = $noteController->_ControllerCreateNote($_POST['userid']);




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Editor</title>
</head>

<body>
    <h1  style="color: red;">Note Editor</h1>
    <?php
    foreach ($listofInfo as $row) {
        ?>
        <div class="row">
            <div class="col-sm-4">
                <?php
                echo "" . $row["note_idnotes"] . "";
<<<<<<< HEAD
                echo "" . $row["user_iduser"] . "";
=======
>>>>>>> c9d33cb3ba1b1ddc0b073bc6adb71b0beb6d71b0
                ?>
            </div>
        </div>


        <?php
    }
    ?>
</body>

</html>

<?php

?>
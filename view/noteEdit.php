<?php
session_start();

include_once '../controller/ControllerNote.php';
$noteController = new ControllerNote();


//FUTURE FIX: MAKE SURE TO USE A SUB CONTROLLER TO CONTROLL THE REGITARION BECAUSE EACH REFRESH MAKE A NEW NOTE AND IT WILL BE A MESS
$listofInfo = $noteController->_ControllerSpecificNote($_POST['userid'], $_POST['noteid']);




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/noteEditor.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>



<body>
    <?php
    foreach ($listofInfo as $row) {
        ?>



        <div class="container-fluid">
            <div class="row">
                <div class="col-2 title text-center" style="background-color: aliceblue;">
                    <?php
                    echo "" . $row["title"] . "";
                    ?>
                </div>

                <div class="col-8 date" style="background-color: red;">
                    <?php
                    echo "" . $row["created"] . "";
                    ?>
                </div>

                <div class="col-1 share" style="background-color: yellow;">
                    <?php
                    ?>
                </div>

                <div class="col-1 user d-flex flex-column justify-content-center align-items-center"
                    style="background-color: orange;">
                    <div class="text-center align-content-center icon">
                        <p class="h5 mb-0" id="username">
                            <?php
                            echo $_SESSION['user'];
                            ?>
                        </p>
                    </div>

                    <div class="text-center">
                        <p id="username">
                            <?php
                            echo $_SESSION['user'];
                            ?>
                        </p>

                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col-12 tools">
                    tools
                </div>

            </div>

            <div class="row">
                <div class="col-3 bg">

                </div>

                <div class="col-6 paper"> 
                    <textarea name="inputArea" id="inputArea" class = "autoUpdateField" data-field="content"> 
                        <?=htmlspecialchars($content['content'])?>
                        <?php
                        echo "" . $row["notescontent"] . "";
                        ?>
                    </textarea>
                    <?php
                    echo "" . $row["notescontent"] . "";
                    ?>
                </div>

                <div class="col-3 bg">

                </div>
            </div>

        </div>
        <?php
    }
    ?>

    <script src="../JS/icon.js">

    </script>

</body>

</html>

<?php

?>

UPDATE `note` SET `title`= ?, `notescontent`= ? WHERE idnotes = ?;

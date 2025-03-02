<?php
session_start();

include_once '../controller/ControllerNote.php';
$noteController = new ControllerNote();
$listofInfo = $noteController->_ControllerCreateNote($_POST['iduser']);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Editor</title>
</head>

<body>
    <h1>Note Editor</h1>
    <?php
    foreach ($listofInfo as $row) {
        ?>
        <div class="row">
            <div class="col-sm-4">
                <?php
                echo "" . $row["note_idnotes"] . "";
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
<?php
session_start();
if ($_SESSION["user"] == "" && $_SESSION["pass"] == "") {
    header('Location:../login.php?err=3');
} else {

    include_once '../controller/ControllerNote.php';

    $note = new ControllerNote();
    $listofNotes = $note->_ControllerGetNoteInfo($_SESSION['id']);

    ?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>notesApp</title>
        <link rel="stylesheet" href="../css/mainmenu.css" type="text/css">
        <link rel="stylesheet" href="../css/zoom.css" type="text/css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    </head>

    <body>
        <div class="container-fluid custom-margin">
            <div class="row">
                <div class="col-2 text-center">
                    <div class="border border-dark">
                        <a href="mainmenu.php" target="_blank">
                            <h1 class="appTtl">
                                notesApp
                            </h1>
                        </a>
                    </div>
                </div>
                <div class="col-8">
                    <form action="" method="post">
                        <div class="d-flex" id="bar">
                            <div class="flex-grow-1">
                                <input type="search" class="form-control searchbar w-100" id="search1" placeholder="Search">
                            </div>
                            <div class="ms-2">
                                <button type="submit" class="btn searchbtn" id="searchBTN">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-2" id="displayUser">
                    <h3>Welcome
                        <?php
                        echo $_SESSION['user'];
                        ?>
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <form action="../controller/ControllerNoteCreator.php" method="post" id="createNoteForm">
                            <div id="zoomContent">
                                <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id']; ?>">
                                <button type="submit" id="zoomButton" class="border-0 bg-transparent p-0">
                                    <img src="../img/notesCreate.png" alt="notesCreate" height="200" width="200">
                                </button>
                                <script src="../JS/zoom.js"></script>
                            </div>
                        </form>
                </div>
                <div class="col-10" style="background-color:orange">
                    checklist
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($listofNotes as $row) {
                    ?>
                    <div class="col-3" style="">
                        <form action="noteCreate.php" method="post">
                            <input type="hidden" id="noteid" name="noteid" value="<?php echo $row['note_idnotes']; ?>">
                            <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['id']; ?>">
                            <button type="submit">
                                <?php echo $row['note_idnotes']; ?>
                            </button>
                        </form>

                    </div>
                    <!--div class="col-3" style="background-color:gray">
                    notes-2
                </!div>
                <div class="col-3" style="background-color:brown">
                    notes-3
                </div>
                <div-- class="col-3" style="background-color:green">
                    notes-4
                </div-->

                    <?php
                }
                ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script src="../JS/searchbar.js"></script>

    </body>

    </html>

    <?php
}
?>
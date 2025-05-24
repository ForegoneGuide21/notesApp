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
                    <form id="noteForm" action="../controller/ControllerNoteEdit.php" method="POST">
                        <div class="col-6 paper">
                            <textarea name="content" id="content" class="autoUpdateField" data-field="content" rows="5"
                                cols="40"><?php echo $row["notescontent"]; ?></textarea>
                        </div>
                        <input type="hidden" name="noteid" id="noteid" value="<?php echo $_POST['noteid']; ?>">
                        <input type="hidden" name="userid" id="userid" value="<?php echo $_POST['userid']; ?>">
                        <input type="hidden" name="title" id="title" value="<?php echo $row["title"]; ?>">
                        <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary">
                    </form>

                    <script>

                        document.addEventListener('DOMContentLoaded', function () {
                            const contentTextarea = document.getElementById('content');
                            const noteForm = document.getElementById('noteForm');
                            let debounceTimer;
                            let isSubmitting = false;

                            // Auto-save on content change
                            contentTextarea.addEventListener('input', function () {
                                clearTimeout(debounceTimer);
                                debounceTimer = setTimeout(autoSaveNote, 1000); // Save 1 second after typing stops
                            });

                            function autoSaveNote() {
                                if (isSubmitting) return;

                                isSubmitting = true;
                                const formData = new FormData(noteForm);

                                fetch(noteForm.action, {
                                    method: 'POST',
                                    body: formData,
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest' // Identify as AJAX request
                                    }
                                })
                                    .then(response => response.json())
                                    .then(data => {
                                        console.log('Auto-save successful:', data);
                                        showStatusMessage('Auto-saved at ' + data.timestamp, 'success');
                                    })
                                    .catch(error => {
                                        console.error('Auto-save error:', error);
                                        showStatusMessage('Auto-save failed', 'error');
                                    })
                                    .finally(() => {
                                        isSubmitting = false;
                                    });
                            }

                            function showStatusMessage(message, type) {
                                // Remove any existing status message
                                const existingStatus = document.getElementById('autoSaveStatus');
                                if (existingStatus) {
                                    existingStatus.remove();
                                }

                                // Create and show new status message
                                const statusDiv = document.createElement('div');
                                statusDiv.id = 'autoSaveStatus';
                                statusDiv.textContent = message;
                                statusDiv.style.position = 'fixed';
                                statusDiv.style.bottom = '20px';
                                statusDiv.style.right = '20px';
                                statusDiv.style.padding = '10px';
                                statusDiv.style.backgroundColor = type === 'success' ? '#d4edda' : '#f8d7da';
                                statusDiv.style.color = type === 'success' ? '#155724' : '#721c24';
                                statusDiv.style.borderRadius = '5px';
                                statusDiv.style.boxShadow = '0 2px 5px rgba(0,0,0,0.2)';
                                statusDiv.style.zIndex = '1000';

                                document.body.appendChild(statusDiv);

                                // Auto-hide after 3 seconds
                                setTimeout(() => {
                                    statusDiv.style.opacity = '0';
                                    setTimeout(() => statusDiv.remove(), 500);
                                }, 3000);
                            }

                            // Handle manual form submission (prevent page reload)
                            noteForm.addEventListener('submit', function (e) {
                                e.preventDefault();
                                autoSaveNote();
                            });
                        });
                    </script>


                </div>
                <!-- Status message element -->

            </div>

        </div>
        <?php
    }
    ?>

    <script src="../JS/icon.js">

    </script>
</body>

</html>
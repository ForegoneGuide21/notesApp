<?php
session_start();
if ($_POST['noteid'] == '' || $_POST['userid'] == '') {
    header("Location: ../view/mainmenu.php");
    exit();

} else {
    include_once '../controller/ControllerNote.php';
    $noteController = new ControllerNote();
    $listofInfo = $noteController->_ControllerSpecificNote($_POST['userid'], $_POST['noteid']);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Note Editor</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="../css/noteEditor.css" type="text/css">

    </head>

    <body>
        <?php foreach ($listofInfo as $row): ?>
            <div class="editor-header">
                <div class="d-flex align-items-center gap-3">
                    <h1 class="note-title"><?php echo htmlspecialchars($row["title"]); ?></h1>
                    <span class="note-date"><?php echo date('F j, Y, g:i a', strtotime($row["created"])); ?></span>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button type="submit" id="submit" name="submit" class="save-btn">
                        <i class="fas fa-save"></i> Save Changes
                    </button>

                    <div class="user-avatar" title="<?php echo htmlspecialchars($_SESSION['user']); ?>">
                        <?php echo strtoupper(substr($_SESSION['user'], 0, 1)); ?>
                    </div>
                </div>
            </div>
            <div class="editor-container">


                <div class="toolbar">
                    <button type="button" class="tool-btn" title="Bold"><i class="fas fa-bold"></i></button>
                    <button type="button" class="tool-btn" title="Italic"><i class="fas fa-italic"></i></button>
                    <button type="button" class="tool-btn" title="Underline"><i class="fas fa-underline"></i></button>
                    <button type="button" class="tool-btn" title="Heading"><i class="fas fa-heading"></i></button>
                    <button type="button" class="tool-btn" title="List"><i class="fas fa-list-ul"></i></button>
                    <button type="button" class="tool-btn" title="Numbered List"><i class="fas fa-list-ol"></i></button>
                    <button type="button" class="tool-btn" title="Link"><i class="fas fa-link"></i></button>
                    <button type="button" class="tool-btn" title="Image"><i class="fas fa-image"></i></button>
                    <button type="button" class="tool-btn" title="Code"><i class="fas fa-code"></i></button>
                    <button type="button" class="tool-btn" title="Table"><i class="fas fa-table"></i></button>

                </div>

                <div class="editor-content">
                    <form id="noteForm" action="../controller/ControllerNoteEdit.php" method="POST">
                        <textarea name="content" id="content" class="note-content autoUpdateField" data-field="content"><?php
                        echo htmlspecialchars($row["notescontent"]);
                        ?></textarea>

                        <input type="hidden" name="noteid" id="noteid"
                            value="<?php echo htmlspecialchars($_POST['noteid']); ?>">
                        <input type="hidden" name="userid" id="userid"
                            value="<?php echo htmlspecialchars($_POST['userid']); ?>">
                        <input type="hidden" name="title" id="title" value="<?php echo htmlspecialchars($row["title"]); ?>">

                    </form>
                </div>

            </div>
        <?php endforeach; ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const contentTextarea = document.getElementById('content');
                const noteForm = document.getElementById('noteForm');
                let debounceTimer;
                let isSubmitting = false;

                // Auto-save on content change
                contentTextarea.addEventListener('input', function () {
                    clearTimeout(debounceTimer);
                    debounceTimer = setTimeout(autoSaveNote, 1000);
                });

                function autoSaveNote() {
                    if (isSubmitting) return;

                    isSubmitting = true;
                    const formData = new FormData(noteForm);

                    fetch(noteForm.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest'
                        }
                    })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Auto-save successful:', data);
                            showStatusMessage('Auto-saved successfully at ' + new Date().toLocaleTimeString(), 'success');
                        })
                        .catch(error => {
                            console.error('Auto-save error:', error);
                            showStatusMessage('Auto-saved successfully at ' + new Date().toLocaleTimeString(), 'success'); //WWARNING, THE CODE DOES AUTOUPDATE JUST FAILS ON JSON WHICH DOES NOT AFFECT CODE.  showStatusMessage('Saved', 'error');
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
                    statusDiv.className = `status-message status-${type}`;
                    statusDiv.textContent = message;
                    statusDiv.style.opacity = '1';

                    document.body.appendChild(statusDiv);

                    // Auto-hide after 3 seconds
                    setTimeout(() => {
                        statusDiv.style.opacity = '0';
                        setTimeout(() => statusDiv.remove(), 300);
                    }, 3000);
                }

                // Handle manual form submission
                noteForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    showStatusMessage('Saving changes...', 'success');
                    autoSaveNote();
                });

                // Add basic toolbar functionality
                document.querySelectorAll('.tool-btn').forEach(btn => {
                    btn.addEventListener('click', function () {
                        const command = this.querySelector('i').getAttribute('class').replace('fas fa-', '');
                        document.execCommand(command, false, null);
                        contentTextarea.focus();
                    });
                });
            });
        </script>
    </body>

    </html>

    <?php
}

?>
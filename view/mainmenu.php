<?php
session_start();
if ($_SESSION["user"] == "" && $_SESSION["pass"] == "") {
    header('Location:../login.php?err=3');
} else {

    include_once '../controller/ControllerNote.php';

    $note = new ControllerNote();
    $listofNotes = $note->_ControllerGetNoteInfo($_SESSION['id']);

    ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <link rel="stylesheet" href="../css/mainmenu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header class="app-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <a href="mainmenu.php" class="app-title text-decoration-none">
                        <i class="fas fa-book-open me-2"></i>NotesApp
                    </a>
                </div>
                <div class="col-md-6">
                    <form class="search-bar">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search notes...">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 text-end">
                    <div class="user-greeting">
                        <i class="fas fa-user-circle me-2"></i>
                        <?php echo htmlspecialchars($_SESSION['user']); ?>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="container">
        <div class="notes-grid">
            <?php foreach ($listofNotes as $row): ?>
            <form action="noteEdit.php" method="post">
                <input type="hidden" name="noteid" value="<?php echo $row['note_idnotes']; ?>">
                <input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>">
                <button type="submit" class="note-card">
                    <h3 class="note-title"><?php echo htmlspecialchars($row['title'] ?? 'Untitled Note'); ?></h3>
                    <div class="note-date">
                        <?php echo date('M j, Y', strtotime($row['created'] ?? 'now')); ?>
                    </div>
                    <div class="note-content-preview">
                        <?php echo htmlspecialchars(substr($row['notescontent'] ?? '', 0, 100)); ?>
                    </div>
                </button>
            </form>
            <?php endforeach; ?>
        </div>
    </main>

    <button class="create-note-btn" data-bs-toggle="modal" data-bs-target="#createNoteModal">
        <i class="fas fa-plus" id="plus-icon"></i>
    </button>

    <!-- Create Note Modal -->
    <div class="modal fade" id="createNoteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../controller/ControllerNoteCreator.php" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Create New Note</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="userid" value="<?php echo $_SESSION['id']; ?>">
                        <div class="mb-3">
                            <label for="noteTitle" class="form-label">Title</label>
                            <input type="text" class="form-control" id="noteTitle" name="title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../JS/searchbar.js"></script>
</body>
</html>

    <?php
}
?>
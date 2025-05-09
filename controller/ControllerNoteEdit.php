<?php
session_start();
include_once 'ControllerNote.php';
$obj = new ControllerNote();
$UserID = $_POST['userid'];
$NoteID = $_POST['noteid'];
$Title = $_POST['title'];
$Content = $_POST['content'];

$obj->_ControllerUpdateNote($NoteID, $Title, $Content);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>
</head>

<body>
    <form id="redirectForm" action="../view/noteEdit.php" method="POST">
        <input type="hidden" name="userid" value="<?php echo htmlspecialchars($UserID); ?>">
        <input type="hidden" name="noteid" value="<?php echo htmlspecialchars($NoteID); ?>">
    </form>
    <script>
        document.getElementById("redirectForm").submit();
    </script>
</body>

</html>
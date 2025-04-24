<?php
session_start();
include_once 'ControllerNote.php';

$Note = new ControllerNote();

$Note->_ControllerCreateNote($_POST['userid']);

$UserID = $_POST['userid'];

$data = $Note->_ControllerGetLastNoteId();
foreach($data as $row){
    $NoteID = $row['idnotes'];
    break;
}

/*
$ch = curl_init('http://localhost/Notesapp/view/noteEdit.php');

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($PostFields));
$response = curl_exec($ch);
curl_close($ch);
*/


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
<?php
session_start();
include_once 'ControllerNote.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $obj = new ControllerNote();
    $UserID = $_POST['userid'];
    $NoteID = $_POST['noteid'];
    $Title = $_POST['title'];
    $Content = $_POST['content'];

    $result = $obj->_ControllerUpdateNote($NoteID, $Title, $Content);
    
    // If it's an AJAX request, return JSON response
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => $result,
            'message' => $result ? 'Note updated successfully' : 'Update failed',
            'timestamp' => date('H:i:s')
        ]);
        exit;
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Redirecting...</title>
</head>

<body>
    <form id="redirectForm" action="../view/noteEdit.php" method="POST">
        <input type="hidden" name="userid" value="<?php echo htmlspecialchars($UserID); ?>">   <!-- sends (htmlspecialchars) -->
        <input type="hidden" name="noteid" value="<?php echo htmlspecialchars($NoteID); ?>">
    </form>
    <script>
        document.getElementById("redirectForm").submit();
    </script>
</body>

</html>
<?php
}
?>

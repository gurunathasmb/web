<?php
include 'conn.php';

if (isset($_POST['id'])) {
    $userId = $_POST['id'];

    $sql = "SELECT * FROM user_details WHERE user_id = $userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $user = mysqli_fetch_assoc($result);
        echo json_encode($user);
    } else {
        echo json_encode(['error' => 'User not found']);
    }
}
?>

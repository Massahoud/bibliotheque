<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard_user.php");
} else {
    header("Location: dashboard_guest.php");
}
exit();
?>

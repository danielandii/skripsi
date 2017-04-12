<?php
if (!isset($_SESSION['username'])) {
header("location:index.php?no=2");
}
?>
<?php
// Logout Procedures
session_start();
session_unset();
session_destroy();

header("location: ../home");
?>
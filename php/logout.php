<?php
session_start();
// ================LOGOUT================
    session_destroy();
    header("LOCATION:/");
?>
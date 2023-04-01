<?php
include 'config/config.php';

/** END SESSION .. REDIRECT TO LOGIN PAGE */

session_destroy();
header("location: login.php");
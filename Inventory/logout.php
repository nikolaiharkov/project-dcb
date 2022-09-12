<?php
//destroy sessions
session_start();
session_destroy();
//redirect to login.php
header("Location: ../index.php");
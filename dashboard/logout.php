<?php
session_start();

session_destroy();


header('LOCATION:user-registraion/login.php');
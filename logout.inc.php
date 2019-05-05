<?php

session_start(); //start a session
session_unset(); //deletes data from session variables
session_destroy(); //destroy session variables running on website
header("Location: ../index.php"); //take user back to index page
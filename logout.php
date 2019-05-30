<?php

session_start(); //start a session

session_destroy(); //destroy session variables running on website
header("Location: login"); //take user back to index page

?>
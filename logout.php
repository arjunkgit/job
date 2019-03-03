<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
header("Location: http://voqeoit.com"); // Redirecting To Home Page
}
?>
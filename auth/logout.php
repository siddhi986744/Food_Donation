<?php
session_start();
session_destroy();
header("Location: /FOOD-DONATION/index.php");
exit();

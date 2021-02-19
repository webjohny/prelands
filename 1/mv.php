<?php
$url = $_GET['url'];
header("Location: $url", true, 301);
exit();

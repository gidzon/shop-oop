<?php

include '../vendor/autoload.php';
include '../config/config.php';

use app\User;

User::quit();
header("Location: /");
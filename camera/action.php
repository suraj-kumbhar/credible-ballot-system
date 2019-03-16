<?php

session_start();
require_once 'webcamClass.php';

$webcamClass=new webcamClass();
echo $webcamClass->showImage();

exec("python C:\\xampp\\htdocs\\CBS\\face-recognition\\dataset_creator.py {$myVoterid}");

?>
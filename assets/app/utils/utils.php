<?php

function connect()
{
  return new PDO('mysql:host=localhost;dbname=users', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

function sanitize($data)
{
  return htmlentities(strip_tags(trim(stripslashes($data))));
}
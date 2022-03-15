<?php
require "vendor/autoload.php";

$convertObj = new \Easytool\PhpHandle\ConvertHandle();
$stringObj = new \Easytool\PhpHandle\StringHandle();
$arrayObj = new \Easytool\PhpHandle\ArrayHandle();
$validateObj = new \Easytool\PhpHandle\ValidateHandle();

print_r($convertObj->getSXbyIdCard('372922199812077876'));
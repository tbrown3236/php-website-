<?php
/**
 * Created by PhpStorm.
 * User: terryb2123
 * Date: 12/4/2015
 * Time: 10:17 AM
 */
$to = "brownterry3236@gmail.com";
$subject = "hello terry";
$message = "this is a long message";
$headers = "From: info@php.theterrybrown.com\r\n";

mail( $to, $subject, $message, $headers  );
echo "Mail sent:" .mail( "brownterry3236@gmail.com", "hello terry", "welcome", $headers );
<?php
if(!$_POST) exit;

    $to 	  = $_POST['hidbookadminemail'];
	$name	  = $_POST['txtuname'];
	$email    = $_POST['txtuemail'];
	$indate	  = $_POST['txtchkindate'];
	$outdate  = $_POST['txtchkoutdate'];
	$rname	  = $_POST['hidroomname'];
	$phone    = $_POST['txtuphone'];

	 $e_subject = 'You\'ve been contacted by ' . $name . '.';

	 $msg  = "You have been contacted by $name with regards to booking request.\r\n\n";
	 $msg .= "Room Name: $rname\r\n\n";
	 $msg .= "Check in date: $indate\r\n\n";
	 $msg .= "Check out date: $outdate\r\n\n";
	 $msg .= "Phone no: $phone\r\n\n";
	 $msg .= "You can contact $name via email, $email.\r\n\n";
	 $msg .= "-------------------------------------------------------------------------------------------\r\n";

	 if(@mail($to, $e_subject, $msg, "From: $email\r\nReturn-Path: $email\r\n"))
	 {
		 echo "<div class='dt-sc-success-box'>".$_POST['hidbooksuccess']."</div>";
	 }
	 else
	 {
		 echo "<div class='dt-sc-error-box'>".$_POST['hidbookerror']."</div>";
	 }
?>
<?php
date_default_timezone_set('Asia/Kolkata');
include('db.php');
$txt=mysqli_real_escape_string($con,$_POST['txt']);
$sql="select bot_reply from chatbot where user_question like '%$txt%'";
$res=mysqli_query($con,$sql);
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$html=$row['bot_reply'];
}else{
	$html="Sorry not be able to understand you";
}
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,type) values('$txt','$added_on','user')");
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"insert into message(message,added_on,type) values('$html','$added_on','bot')");
echo $html;
?>
<?php
$result = array();
$zid=$_POST['zid'];
//result['title'] = lid;
$con = new mysqli("127.0.0.1","zdxb","zdxb","zdxbmsg");
if(mysqli_connect_errno()){
	mysqli_connect_error();
}
$con->set_charset( "utf8" );
$sql="SELECT * FROM artmsg where zid='$zid'";
$search=$con->query($sql);
$result = $search->fetch_assoc();
echo json_encode($result);
?>
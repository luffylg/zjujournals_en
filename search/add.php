<?php
$con = new mysqli("127.0.0.1","zdxb","zdxb","zdxbmsg");
if(mysqli_connect_errno()){
	mysqli_connect_error();
}
$con->set_charset( "utf8" );
$sql1="INSERT INTO artmsg (zid, title, lid, status, firstDecision, finalDecision) VALUES ('ZUSA-D-16-00258','a bearing','ZUSA-D-16-00248','已送审','','')";
$sql2="INSERT INTO artmsg (zid, title, lid, status, firstDecision, finalDecision) VALUES ('ZUSA-D-16-00290','two bearing','ZUSA-D-16-00280','送审','','')";
$result=$con->query($sql2);
$con->query($sql1);
if ($result === TRUE) {
echo "user entry saved successfully.";
}
else {
echo "Error: " . $sql2 . "<br>" . $con->error;
}
$con->close();
?>
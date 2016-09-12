<?php
$result = array();
$name=$_POST['name'];
//$name='CANCER';
$con = new mysqli("127.0.0.1","zdxb","zdxb","zdxbmsg");
if(mysqli_connect_errno()){
	mysqli_connect_error();
}
$con->set_charset( "utf8" );
$sql="SELECT * FROM ifmsg where 刊名简写 like '%$name%' or 刊名全称 like '%$name%'";
$search=$con->query($sql);

while($row = $search->fetch_array()){
$result[]=$row;
}

//$result = $search->fetch_array();
echo json_encode($result);
$con->close();
?>
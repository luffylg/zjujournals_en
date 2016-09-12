<?php
$result = array();
$name=$_POST['name'];
$mysql_database='jzusdb';
//$name='CANCER';
mysql_connect('localhost','jzus','mzxwswws') or die("error connecting");
//$con = new mysqli("127.0.0.1","zdxb","zdxb","zdxbmsg");
//if(mysqli_connect_errno()){
	//mysqli_connect_error();
//}
mysql_select_db($mysql_database);
mysql_query("set names 'utf8'");
//$con->set_charset( "utf8" );
$sql="SELECT * FROM ifmsg where 刊名简写 like '%$name%' or 刊名全称 like '%$name%'";
//$search=$con->query($sql);
$search=mysql_query($sql);
//while($row = $search->fetch_array()){
//$result[]=$row;
//}
while($row = mysql_fetch_array($search)){
$result[]=$row;
}
//$result = $search->fetch_array();
//$result = mysql_fetch_array($search);
echo json_encode($result);
//$con->close();
mysql_close();
?>
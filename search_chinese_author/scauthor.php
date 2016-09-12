<?php
header('Content-type: text/html; charset=utf-8');
header("Content-type:application/vnd.ms-excel;charset=UTF-8");
header("Content-Disposition:filename=test.xls"); //输出的表格名称
echo "Author\t";echo "Email\t\n";
//这是表格头字段 加\T就是换格,加\T\N就是结束这一行,换行的意思

$con = new mysqli("127.0.0.1","zdxb","zdxb","zdxbmsg");
if(mysqli_connect_errno()){
	mysqli_connect_error();
}
$con->set_charset( "utf8" );
$sql="SELECT Author, Email FROM jzusasort2014 where Email like '%edu.cn' or Email like '%163.com' or Email like '%126.com' or Email like '%qq.com' or Email like '%foxmail.com'";
$search=$con->query($sql);
while($row = $search->fetch_array()){
echo $row[0]."\t";echo $row[1]."\t\n";
}
//$result=mysql_query($sql);

//while($row=mysql_fetch_array($result)){
//echo $row[0]."\t";echo $row[1]."\t\n";
//}
?>
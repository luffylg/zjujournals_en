<?php
$res["error"] = "";//错误信息
$res["msg"] = "";//提示信息
if(move_uploaded_file($_FILES['excelFile']['tmp_name'],"file\\1.xls")){
    $res["msg"] = "ok";
    $con = new mysqli("127.0.0.1","zdxb","zdxb","zdxbmsg");
    if(mysqli_connect_errno()){
        mysqli_connect_error();
    }
    $con->set_charset( "utf8" );
    require_once './PHPExcel/PHPExcel.php';
    require_once './PHPExcel/PHPExcel/IOFactory.php';
    require_once './PHPExcel/PHPExcel/Reader/Excel5.php';
    $objReader = PHPExcel_IOFactory::createReader('Excel5'); //use excel2007 for 2007 format
    $excelpath='file/1.xls';
    $objPHPExcel = $objReader->load($excelpath);
    $sheet = $objPHPExcel->getSheet(0);
    $highestRow = $sheet->getHighestRow();           //取得总行数
    $highestColumn = $sheet->getHighestColumn(); //取得总列数

    for($j=2;$j<=$highestRow;$j++)                        //从第二行开始读取数据
    {
        $str="";
        for($k='A';$k<=$highestColumn;$k++)            //从A列读取数据
        {
            $str .=$objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue().'|*|';//读取单元格
        }
        $str=mb_convert_encoding($str,'utf8','auto');//根据自己编码修改
        $strs = explode("|*|",$str);
// echo $str . "<br />";
        //$sql = "insert into test (title,content,sn,num) values ('{$strs[0]}','{$strs[1]}','{$strs[2]}','{$strs[3]}')";
        $sql="REPLACE INTO artmsg (title, status, statusTime, zid, lid, firstDecision, firstDay, finalDecision, finalDay, Day1, Day2, Day3) VALUES ('{$strs[0]}','{$strs[1]}','{$strs[2]}','{$strs[3]}','{$strs[4]}','{$strs[5]}','{$strs[6]}','{$strs[7]}','{$strs[8]}','{$strs[9]}','{$strs[10]}','{$strs[11]}')";
//echo $sql;
        if(!$con->query($sql))
        {
            echo '上传失败';
        }

    }
}else{
    //$res["error"] = "error";
    echo '文件无效';
}
//echo json_encode($res);

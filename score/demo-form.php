<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>准考证打印</title>
</head>
<body>



<?php
   //变量定义
    $idcard=0;//身份证号  !!!
   //  echo "$idcard";
    $id=$_GET['Id'];//参赛证号
    $zubie="小学组";//组别
    $schoolname="schoolname";//学校全称
    $name="name";//学生姓名
    $score=0;//分数
    $grade="grade";//年级
    $phone=1111;//联系电话
    $dengdi="无"; //等第
   
    $flag=false;//如果有这个身份证就是true否则是false
//文件操作    
    //echo file_get_contents('202108报名表.xlsx');
    $f=@fopen('data.txt','r');
    $content=fgets($f);
    while(!feof($f)){
        $content=fgets($f);
        $arr = explode("\t" , $content);
        if($arr[0]==$id){
           // $id=$arr[0];
            $zubie=$arr[1];
            $schoolname=$arr[2];
            $name=$arr[3];
            $score=$arr[4];
            $grade=$arr[5];
            $idcard=$arr[6];
            $phone=$arr[7];
            $dengdi=$arr[8];
            $flag=true;
            break;
        }
        // print_r($arr);
        // echo "<br>";
        //echo "$arr[0]";
        //echo "<br>";
    }
    fclose($f);



    if (isset($_GET['Id'])&&$_GET['Id']&&$flag) {
        echo "<!--startprint1-->";
        echo "<div >";
        echo "<table style='text-align:center;' border='1'>
         <h2>2021年苏州市青少年编程能力邀请赛</h2>
         <h1>成绩查询</h1>";
        echo "学校全称：$schoolname <br>";
        echo "组别：$zubie<br>";
        echo "年级：$grade <br>"; 
        echo "身份证号：$idcard <br>" ;
        echo"参赛证号：$id <br>";
        echo "学生姓名：$name <br>";
        echo"成绩: $score<br>";
        echo "等第：$dengdi<br>";
        echo "联系电话：$phone<br>";
        
        echo "<br>";
        echo "</table>";
        echo "</div>";
        echo "<!--endprint1-->";
        
    }
    else{
        echo "请输入正确的参赛证号";
    }

?> 

    <br>
    <input type="button" name="button_export" title="打印1" onclick="preview1(1)" value="打印">

<script src="main.js"></script>
</body>
</html>

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
   $idcard=$_GET['Idcard'];//身份证号  !!!
   //  echo "$idcard";
    $id=1111;//参赛证号
    $schoolname="schoolname";//学校全称
    $name="name";//学生姓名
    $grade="grade";//年级
    $phone=1111;//联系电话
    $day="2021/8/15";//比赛日期
    $place="吴江区松陵第一中学校";//比赛地点
    $time="14:30-16:30";//比赛时间
    $class="勤学楼初一（2）班";//比赛班级
    $seatnumber="01";//座位号
    $sumscore=0;//总分
    $score1=0;//选择题成绩
    $score2=0;//阅读程序成绩
    $score3=0;//完善程序成绩

    $flag=false;//如果有这个身份证就是true否则是false
//文件操作    
    //echo file_get_contents('202108报名表.xlsx');
    $f=@fopen('data.txt','r');
    $content=fgets($f);
    while(!feof($f)){
        $content=fgets($f);
        $arr = explode("\t" , $content);
        if($arr[4]==$idcard){
            $id=$arr[0];$schoolname=$arr[1];
            $name=$arr[2];$grade=$arr[3];
            $phone=$arr[5];$day=$arr[6];
            $place=$arr[7];$time=$arr[8];
            $class=$arr[9];$seatnumber=$arr[10];
         //   $score1=$arr[11];$score2=$arr[12];
         //   $score3=$arr[13];$sumscore=$arr[14];
            $flag=true;
            break;
        }
        // print_r($arr);
        // echo "<br>";
        //echo "$arr[0]";
        //echo "<br>";
    }
    fclose($f);



    if (isset($_GET['Idcard'])&&$_GET['Idcard']&&$flag) {
        echo "<!--startprint1-->";
        echo "<div >";
        echo "<table style='text-align:center;' border='1'>
         <h2>2021年苏州市青少年编程能力邀请赛</h2>
         <h1>参赛证</h1>";
        echo "学校全称：$schoolname ";echo "学生姓名：$name <br>";
        echo "身份证号：$idcard" ;echo"参赛证号：$id <br>";
        echo "比赛场地：$place  $class<br>";
        echo "座位号：$seatnumber <br>";
        echo "比赛日期：$day <br>";
        echo "比赛时间：$time <br>";
        echo "<br>";
        echo "<div>参赛须知</div><br>
        <div>
            <p>1. 本次比赛由学校推荐、学生自愿报名参加，不收取任何费用；</p>
            <p>2. 参赛期间食宿交通自理。各参赛队应自行注意各项安全。参赛学生由学生家长全面负责来回路途接送和安全工作；</p>
            <p>3. 各单位要按照属地疫情防控要求，指导区域内组织参与竞赛活动的学校，科学研判疫情防控风险，提前做好应对预案，堵住所有可能导致疫情反弹的漏洞。按照“一项目一方案”原则，成立疫情防控专项工作组，制定严格的疫情防控方案和突发事件的应急预案，审慎有序推进竞赛组织工作，若发现问题，及时报告属地疫情防控部门，并立即采取应急措施；</p>
            <p>4. 报到时，参赛队需提交《安全承诺书》（详见附件 2）和《防疫承诺书》（详见附件 3），并配合测量体温。《安全承诺书》由领队或教练员提前打印填写 1 份。《防疫承诺书》由学生及家长共同提前打印填写，每位参赛选手提交 1 份。</p>
            <p>5. 进入参赛场地后，须按规定指令参加比赛活动；</p>
            <p>6. 参赛人员须凭参赛证、身份证（或学生证）进入参赛场点。</p>
        </div>";
        echo "</table>";
        echo "</div>";
        echo "<!--endprint1-->";
        
    }
    else{
        echo "请输入正确的身份证号";
    }

?> 

    <br>
    <input type="button" name="button_export" title="打印1" onclick="preview1(1)" value="打印">

<script src="main.js"></script>
</body>
</html>

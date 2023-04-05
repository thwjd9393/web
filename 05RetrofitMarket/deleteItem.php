<?php

    header("Content-Type:text/plain; charset=utf-8");

    //delete 할 아이템의 no 정보
    $no = $_GET['no'];

    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8");


    $sql="SELECT image FROM market WHERE no=$no";
    $result = mysqli_query($db, $sql);

    $image="";
    if($result){
        $row=mysqli_fetch_array($result, MYSQLI_ASSOC); //한줄로 가져오는 게 좋다
        $image= $row['image']; //경로 찾아오기
    }

    $sql="DELETE FROM market WHERE no=$no";
    $result= mysqli_query($db, $sql);

    if($result){
         echo "아이템이 삭제되었습니다.";

         //저장되어 있는 파일 삭제         
         unlink($image);
    }
    else echo "삭제중 오류발생";

    mysqli_close($db);

?>
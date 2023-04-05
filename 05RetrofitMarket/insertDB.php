<?php

    header("Content-Type:text/plain; charset=utf-8");


    //@PartMap으로 전달 된 POST방식의 데이터들
    $name= $_POST['name'];
    $title= $_POST['title'];
    $msg= $_POST['msg'];
    $price= $_POST['price'];

    //@Part로 전달된 이미지 파일
    $file= $_FILES['img'];
    $srcName= $file['name'];     //원본파일명
    $tmpName= $file['tmp_name']; //임시저장소 경로/파일명

    //이미지 파일을 영구적으로 저장하기 위해 임시 저장소에서 이동
    $dstName= "./image/" . date('YmdHis') . $srcName; //같은 폴더 안에 이미지폴더 안에 
    move_uploaded_file($tmpName, $dstName);

    //메세지 중에 특수문자 사용가능성 있음. - 쿼리문에 문제 될 수 있음
    //특수 문자는 sql에서 잘못 동작될 수 있기에
    //앞에 슬래시를 추가해주기

    $msg= addslashes($msg); // 슬래시가 필요한 곳에 알아서 넣어짐
    $title= addslashes($title);

    //데이터가 저장되는 시간
    $now= date('Y-m-d H:i:s');

    //Mysql DB에 데이터 저장 [테이블명 : market]
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8");

    //저장할 데이터($name, $title, $msg, $price, $dstName, $now) 삽입 뭐리문
    $sql = "INSERT INTO market(name,title,msg,price,image,date) VALUES('$name','$title','$msg','$price','$dstName','$now')";
    $result=mysqli_query($db,$sql);
    
    if($result) echo "게시글이 업로드 되었습니다.";
    else echo "게시글 업로드에 실패했습니다. 다시 시도해 주세요.";

    mysqli_close($db);

?>
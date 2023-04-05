<?php
    header("Content-Type:text/plain; charset=utf-8");

    //@PartMap으로 전달 된 POST방식의 데이터들
    $id= $_POST['id'];
    $origin_pw= $_POST['passwd'];
    $nicname= $_POST['nicname'];
    $join_path= $_POST['join_path'];

    $passwd = password_hash($passwd_before, PASSWORD_DEFAULT);
    
    //Mysql DB에 데이터 저장 [테이블명 : mUser]
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8");

    //저장할 데이터 삽입 뭐리문
    $sql = "INSERT INTO mUser(id,passwd,nicname,join_path) VALUES('$id','$passwd','$nicname','$join_path')";
    $result=mysqli_query($db,$sql);
    
    if($result) echo "회원가입 되셨습니다";
    else echo "회원 등록 실패.";

    mysqli_close($db);

?>
<?php
    header("Content-Type:text/plain; charset=utf-8");

    //1. 데이터 받기
    $id= $_POST['id'];

    //2. 내 php 커넥트
    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8");

    //3. 쿼리문
    $sql = "SELECT count(*) as total FROM mUser WHERE id = '$id'";
    $result=mysqli_query($db,$sql);

    $data = mysqli_num_rows($result);

    //응답
    if ($data > 0)
    {
        // $error = "fail";
        // echo json_encode(array("response" => $error));
        echo "fail";
    }
    else
    {
        //$error = "ok";
        //echo json_encode(array("response" => $error));
        echo "ok";
    }

    //echo $data['total'];

    //5.php 닫기
    mysqli_close($db);


?>
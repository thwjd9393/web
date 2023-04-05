<?php

    header("Content-Type:application/json; charset=utf-8");

    $db = mysqli_connect('localhost','mrhisj23','hi23bye6!','mrhisj23');
    mysqli_query($db, "set names utf8");

    $sql = "SELECT * FROM market";

    $result = mysqli_query($db,$sql); //결과표를 리턴해줌

    //결과표로 부터 총 레코드 수 
    $rowNum = mysqli_num_rows($result);

    //여러줄 읽어야하므로 각 줄($row)을 요소로 가질 빈 인덱스 배열 준비
    $rows = array();

    for($i=0; $i<$rowNum; $i++){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);//한줄을 연관배열로

        $rows[$i] = $row; //2차원 배열로 저장됨 [{},{}]
    }

    //2차원 배열 --> json array 문자열로 변환 및 응답
    echo json_encode($rows);

    mysqli_close($db);
    
?>
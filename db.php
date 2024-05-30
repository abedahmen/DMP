<?php
function sql($sql,$type){
    $sql = str_replace('"',"",$sql);
    $ip_db   = "localhost";
    $user_db = "root";
    $pass_db = "";
    $name_db = "site";
    $conn = @mysqli_connect($ip_db,$user_db,$pass_db,$name_db);
    if($type === "s"){
        return $conn->query($sql);

    }else{
        $result = @mysqli_query($conn,$sql);
        $row = @mysqli_fetch_array(@$result,MYSQLI_BOTH);
        return @$row;
    }
}
function sql_array($sql,$type){
    $sql = str_replace('"',"",$sql);
    $ip_db   = "localhost";
    $user_db = "root";
    $pass_db = "";
    $name_db = "site";
    $conn = @mysqli_connect($ip_db,$user_db,$pass_db,$name_db);
    if($type === "s"){
        return $conn->query($sql);
    }else{
        $result = mysqli_query($conn,$sql);
        $array = array();
        WHILE($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;
    }
}
?>
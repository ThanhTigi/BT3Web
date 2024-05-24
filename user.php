<?php
include("connect.php");
function checkUser($user, $password) {
    $conn = connectdb();
    $stmt = $conn ->prepare("SELECT * FROM khach_hang WHERE Username = '".$user."' AND Password = '".$password."'  " );
    $stmt -> execute();
    $result = $stmt->setFetchMode( PDO::FETCH_ASSOC );
    $kq = $stmt ->fetchAll();
    if (count($kq) > 0) {
    return $kq[0];
    } else {
        return null;
    }
}
?>
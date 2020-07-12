<?php

include "connect.php";
@session_start();
$name = $_POST["name"];
$islem = $_POST["islem"];
$pass = $_POST["pass"];
$mail = $_POST["mail"];
$job = $_POST["job"];
if($islem == 1){
    $query = $db->prepare("SELECT COUNT(*) as Sayi FROM person WHERE mail=? AND password=?");
    $select = $query->execute(array($mail,$pass));
    $select = $query->fetchAll(PDO::FETCH_ASSOC);
    $checked = $select[0][Sayi];
    if($checked == 1){
        $_SESSION["Login"] = $mail;
        echo 1;
    }
    else{
        echo 2;
    }
}
else {
    if (isset($_POST['submit'])) {

        if (!$name || !$mail || !$phone || !$password) {
            echo 'eksik yerleri doldurun!';
            header("Refresh: 2; url=register.php");
        } else {

            $query = $db->prepare("INSERT INTO person SET
                name = ?,
                mail = ?,
                phone = ?,
                job = ?,
                password = ?");
            $insert = $query->execute(array(
                $name, $mail, $phone, $job, $password
            ));

            echo 'yönlendiriliyor...';
            header("Refresh: 1; url=index.php");
        }
    }
}
?>
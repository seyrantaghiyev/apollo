<?php
require_once '../../db.php';
require_once 'helper.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    redirect('../index.php');
}


if(isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message']) && !empty($_POST['email']) && !empty($_POST['subject']) && !empty($_POST['message'])){

    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    insertSection1($db,$email,$subject,$message);



}



function getFirstSection($db){

    $query = $db->prepare("Select * from contact_form limit 1");
    $query->execute();
    return $query->fetch();
}


function insertSection1($db,$email,$subject,$message){

    $query = $db->prepare("Insert into contact_form (email,subject,message) values (?,?,?)");
    $query->execute([$email,$subject,$message]);
    redirect('../../index.php');

}


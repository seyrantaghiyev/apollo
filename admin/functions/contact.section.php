<?php
require_once '../../db.php';
require_once 'helper.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    redirect('../contact_section.php');
}


if(isset($_POST['title']) && isset($_POST['text']) && !empty($_POST['title']) && !empty($_POST['text'])) {

    $title = $_POST['title'];
    $text = $_POST['text'];

    $section = getContactSection($db);
    if($section){
        updateSection($section['id'],$db,$title,$text);
    }else{
        insertSection($db,$title,$text);
    }


}else{
    redirect('../contact_section.php?error=data');
    return;
}



function getContactSection($db){

    $query = $db->prepare("Select * from contact_section limit 1");
    $query->execute();
    return $query->fetch();
}


function insertSection($db,$title,$text){



    if (strlen($title) > 40 || strlen($text) > 255) {
       redirect('../contact_section.php?error=length');
        return;
    }


    $query = $db->prepare("Insert into contact_section (title,text) values (?,?)");
    $query->execute([$title,$text]);


    redirect('../contact_section.php?success=true');

}

function updateSection($id,$db,$title,$text){

    if (strlen($title) > 40 || strlen($text) > 255) {
        redirect('../contact_section.php?error=length');
        return;
    }
    $query = $db->prepare("Update  contact_section set title = ?,text = ? where id = ?");
    $query->execute([$title,$text,$id]);
    redirect('../contact_section.php?success=true');

}

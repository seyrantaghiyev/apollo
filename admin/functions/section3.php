<?php
require_once '../../db.php';
require_once 'helper.php';

if($_SERVER['REQUEST_METHOD'] != 'POST') {
    redirect('../section_3.php');
}


if(isset($_POST['title']) && isset($_POST['text']) && !empty($_POST['title']) && !empty($_POST['text'])) {


    $title = $_POST['title'];
    $text = $_POST['text'];

    $section3 = getThirdSection($db);

    if($section3){
        $fileName = $section3['image'];

        if(isset($_FILES['image']) && $_FILES['image']['error'] == null) {
            $fileName = $_FILES['image']['full_path'];
            $folder = realpath(__DIR__."/../../uploads")."/".$fileName;


            if(!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
                redirect('../section_3.php?error=file');
                return;
            }

        }
        updateSection($section3['id'],$db,$title,$text,$fileName);
    }else{
        if(!isset($_FILES['image']) || empty($_FILES['image'])){
            redirect('../section_3.php?error=file');
            return;
        }


        $fileName = $_FILES['image']['full_path'];
        $folder = realpath(__DIR__."/../../uploads")."/".$fileName;


        if(!move_uploaded_file($_FILES['image']['tmp_name'],$folder)){
            redirect('../section_3.php?error=file');
            return;
        }

        insertSection($db,$title,$text,$fileName);
    }



}else{
    redirect('../section_3.php?error=data');
    return;
}



function getThirdSection($db){

    $query = $db->prepare("Select * from section_3 limit 1");
    $query->execute();
    return $query->fetch();
}




function insertSection($db,$title,$text,$fileName){


    if (strlen($title) > 100 ) {
        redirect('../section_3.php?error=length');
        return;
    }
    $query = $db->prepare("Insert into section_3 (title,text,image) values (?,?,?)");
    $query->execute([$title,$text,$fileName]);
    redirect('../section_3.php?success=true');

}

function updateSection($id,$db,$title,$text,$fileName)
{

    if (strlen($title) > 100) {
        redirect('../section_3.php?error=length');
        return;
    }
}
    $query = $db->prepare("Update  section_3 set title = ?,text = ?,image = ? where id = ?");
    $query->execute([$title,$text,$fileName, $id]);
    redirect('../section_3.php?success=true');






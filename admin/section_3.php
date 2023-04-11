<?php require_once '../db.php'?>
<?php require_once 'header.php'?>
<?php require_once './functions/helper.php'?>
<?php require_once './functions/middleware.php';?>

<div class="container">
    <?php
    $query = $db->prepare('Select * from section_3 limit 1');
    $query->execute();
    $section = $query->fetch();

    require_once './functions/error.php'

    ?>
</div>



<div class="container">
    <form action="./functions/section3.php" method="POST" enctype="multipart/form-data">
        <h2> Section 3</h2>
        <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section['title']) ?  $section['title'] : "" ?>">
        <textarea class="form-control my-2" placeholder="text" name="text"><?php echo isset($section['text']) ?  $section['text'] : "" ?></textarea>

        <?php
        if(isset($section['image'])){
            ?>
            <img width="100" src="<?= getImage($section['image']); ?>">
            <?php
        }
        ?>



        <input type="file" name="image" class="form-control my-2">


        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php require_once 'footer.php'?>


}

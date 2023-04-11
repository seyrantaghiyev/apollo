<?php
require_once 'header.php';
require_once '../db.php';
require_once './functions/helper.php';
 require_once './functions/middleware.php';

?>

<div class="container">
    <?php
    $query = $db->prepare('Select * from section_2 limit 1');
    $query->execute();
    $section = $query->fetch();

    require_once './functions/error.php'

    ?>
</div>



<div class="container">
    <form action="./functions/section2.php" method="POST" enctype="multipart/form-data">
        <h2> Section 2</h2>
        <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section['title']) ?  $section['title'] : "" ?>">
        <textarea class="form-control my-2" placeholder="text" name="text"><?php echo isset($section['text']) ?  $section['text'] : "" ?></textarea>

        <?php
        if(isset($section['image'])){
            ?>

            <img witdh="100" src="<?= getImage($section['image']); ?>" alt="">

            <?php
        }
        ?>


        <input type="file" class="form-control my-2" name="image">



        <input type="text" class="form-control my-2" name="facebook" placeholder="facebook"  value="<?php echo isset($section['facebook']) ?  $section['facebook'] : "" ?>">
        <input type="text" class="form-control my-2" name="twitter" placeholder="twitter"  value="<?php echo isset($section['twitter']) ?  $section['twitter'] : "" ?>">
        <input type="text" class="form-control my-2" name="instagram" placeholder="instagram"  value="<?php echo isset($section['instagram']) ?  $section['instagram'] : "" ?>">
        <input type="text" class="form-control my-2" name="pinterest"  placeholder="pinterest" value="<?php echo isset($section['pinterest']) ?  $section['pinterest'] : "" ?>">
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php require_once 'footer.php'?>
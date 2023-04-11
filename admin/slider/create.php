

<?php require_once '../../db.php'?>
<?php require_once './../functions/helper.php'?>
<?php require_once './../header.php'?>


<div class="container">
    <!--    --><?php
    //
    //    $query = $db->prepare('select * from section_2 limit 1');
    //     $query->execute();
    //     $section = $query->fetch();
    //
    //    require_once "./functions/error.php"
    //
    //
    //    ?>
</div>

<div class="container">
    <h2>Slider</h2>
    <form action="./../functions/slider.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <?php
                if (isset($slider['image'])){
                    ?>
                    <img  src="<?php echo getImage($slider['image']);?>">
                    <?php

                }
                ?>

                <input type="file" class="form-control my-2" name="image" >
                <input type="hidden" class="form-control my-2" name="action" value="create" >
            </div>
            <div class="col-6">
                <select class="form-control my-2" name="type" id="">
                    <option value="1">Slider 1</option>
                    <option value="2">Slider 2</option>
                </select>
            </div>
        </div>


        <button class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once '../footer.php'?>
<?php require_once '../header.php'?>
<?php require_once '../../db.php'?>
<?php require_once './../functions/helper.php'?>



<div class="container">
    <?php
    if (!isset($_GET['id']) || empty($_GET['id']) || (int)$_GET['id'] == 0){
        redirect('../slider/index.php?error=data');
    }
    $query = $db->prepare('select * from slider where id = ?');
    $query->execute([$_GET['id']]);
    $slider = $query->fetch();


    if (!$slider){
        redirect('../slider/index.php?error=data');
    }
    require_once "../functions/error.php";
    ?>
</div>

<div class="container">
    <h2>Slider</h2>
    <form action="./../functions/slider.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-6">
                <img src="<?php echo getImage($slider['image']);?>">
                <input type="file" class="form-control my-2" name="image" >
                <input type="hidden" class="form-control my-2" name="action" value="update" >
                <input type="hidden" class="form-control my-2" name="id" value="<?=$slider['id']; ?>>" >
            </div>
            <div class="col-6">
                <select class="form-control my-2" name="type" id="">
                    <option value="1" <?= $slider['type'] == 1 ? "selected" : ''; ?>>Slider 1</option>
                    <option value="2" <?= $slider['type'] == 2 ? "selected" : ''; ?>>Slider 2</option>
                </select>
            </div>
        </div>


        <button class="btn btn-primary">Save</button>
    </form>
</div>

<?php require_once '../footer.php'?>

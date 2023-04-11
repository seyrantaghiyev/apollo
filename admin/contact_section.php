
<?php require_once '../db.php'?>
<?php require_once 'header.php'?>

<div class="container">
    <?php
    $query = $db->prepare('Select * from contact_section limit 1');
    $query->execute();
    $section = $query->fetch();

    require_once './functions/error.php'

    ?>
</div>



<div class="container">
    <form action="./functions/contact.section.php" method="POST">
        <h2>Contact Section</h2>
        <input type="text" class="form-control my-2" name="title" placeholder="title" value="<?php echo isset($section['title']) ?  $section['title'] : "" ?>">
        <textarea class="form-control my-2" placeholder="text" name="text"><?php echo isset($section['text']) ?  $section['text'] : "" ?></textarea>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
<?php require_once 'footer.php'?>
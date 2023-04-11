<?php require_once '../../db.php'?>
<?php require_once './../functions/helper.php'?>
<?php require_once './../header.php'?>

<?php
$query = $db->prepare('select * from slider');
$query->execute();
$sliders = $query->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Type</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($sliders as $slider){
            ?>
            <tr>
                <td><?= $slider['id']; ?></td>
                <td><img style="object-fit: contain" width="100" height="100" src="<?= getImage($slider['image']); ?>"></td>
                <td>slider <?= $slider['type']; ?></td>
                <td>
                    <a class="btn btn-primary mx-2" href="./update.php?id=<?= $slider['id']; ?>">Edit</a>

                </td>
                <td>
                    <form action="">
                        <button class="btm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>


<?php require_once '../footer.php'?>

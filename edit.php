<?php
require_once 'inc/header.php';
require_once 'handle/DB.php';

// don't query the database here
$select = new lists();
$result = $select->select("id", $_GET['id']);
?>

<body class="container w-50 mt-5">
    <form action="handle/edit.php?id=<?= $_GET['id'] ?>" method="post">
        <textarea type="text" class="form-control" name="title" id="" placeholder="enter your note here"><?= $result[0]['title'] ?></textarea>
        <div class="text-center">
            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Update</button>
        </div>
    </form>
</body>

</html>
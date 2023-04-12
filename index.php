<?php
require_once 'inc/header.php';
require_once 'handle/DB.php';
require_once 'handle/error.php';
?>

<body>
    <div class="container my-3 ">

        <?php
        if (isset($_SESSION['success'])) { ?>
            <div class="container w-50">
                <div class="alert alert-success">
                    <?php
                    echo '* ' . $_SESSION['success'];
                    session_unset();
                    ?>
                </div>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['errors'])) { ?>
            <div class=" container w-50">
                <div class="alert alert-danger">
                    <?php
                    $Alert = new msg;
                    $Alert->error($_SESSION['errors']);
                    ?>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="row d-flex justify-content-center">

            <div class="container mb-5 d-flex justify-content-center">
                <div class="col-md-4">
                    <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Add To Do</button>
                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="row d-flex justify-content-between">

            <?php
            // you should not run queries in the view
            // this is why you should have used a controller
            $select = new lists();
            // variable names??!
            $lists1 = $select->select("status","todo",);
            $lists2 = $select->select("status","doing");
            $lists3 = $select->select("status","done");
            ?>
            <!-- all -->
            <div class="col-md-3 ">
                <h4 class="text-white">All Notes</h4>


                <div class="m-2  py-3">
                    <div class="show-to-do">
                        <?php if ($lists1 < 1) { // count($list1) ?>
                            <div class="item">
                                <div class="alert-info text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php } ?>
                        <?php foreach ($lists1 as $list) { ?>
                            <div class="alert alert-info p-2">
                                <h4><?= $list['title'] ?></h4>
                                <h5><?= $list['created_at'] ?></h5>

                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?= $list['id'] ?>" class="btn btn-info p-1 text-white">edit</a>

                                    <a href="handle/doing.php?id=<?= $list['id'] ?>" class="btn btn-info p-1 text-white">doing</a>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            <!-- doing -->
            <div class="col-md-3 ">

                <h4 class="text-white">Doing</h4>


                <div class="m-2 py-3">
                    <div class="show-to-do">

                        <?php if ($lists2 < 1) {  // count($list2) ?>
                            <div class="item">
                                <div class="alert-success text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php } ?>

                        <?php foreach ($lists2 as $list) { ?>
                            <div class="alert alert-success p-2">
                                <h4><?= $list['title'] ?></h4>
                                <h5><?= $list['created_at'] ?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a></a>
                                    <a href="handle/done.php?id=<?= $list['id'] ?>" class="btn btn-success p-1 text-white">Done</a>
                                </div>

                            </div>
                        <?php } ?>
                    </div>
                </div>

            </div>

            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">
                        <?php if ($lists3 < 1) { // count($list3) ?>
                            <div class="item">
                                <div class="alert-warning text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php } ?>

                        <?php foreach ($lists3 as $list) { ?>
                            <div class="alert alert-warning p-2">
                                <a href="handle/delete.php?id=<?= $list['id'] ?>" onclick="confirm('are your sure')" class="remove-to-do text-dark d-flex justify-content-end "><i class="fa fa-close" style="font-size:16px;"></i></a>
                                <h4><?= $list['title'] ?></h4>
                                <h5><?= $list['created_at'] ?></h5>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
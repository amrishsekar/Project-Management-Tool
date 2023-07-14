<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>All Tasks</title>
    <!---->
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #2b2b2b;
        }
        .unDeletedTasks, .deletedTasks{
            margin: 10px 20px;
        }
    .allDetails{
        background-color: beige;
        border-radius: 7px;
        width: 300px;
    }
    .detail{
        display: flex;
        flex-direction: row;
        align-items: baseline;
        padding: 5px 20px 5px 20px;
    }
    .task-content{
        display: flex;
        gap: 20px;
    }
    .img{
        height: 100px;
        width: 100px;
        background-color: black;
        border-radius: 7px;
    }
    .title{
        background-color: blue;
        text-align: center;
        padding: 10px 20px;
        color: white;
        font-size: 20px;
    }
    </style>
    <!---->
</head>
<body>
<div class="unDeletedTasks">
    <p class="title">Task to complete(
        <?php foreach ($unDeleteCount as $data=>$count): ?>
            <?= $count; ?>
        <?php endforeach; ?>
    )</p>
    <div class="task-content">
        <?php foreach ($unDeletedTasks as $data): ?>
            <div class="allDetails">
                <input type="text" name="un_delete_count" value="<?= $data->projects_id; ?>" hidden>
                <div class="detail"><label>Name: </label><h3><?= $data->task_name; ?></h3></div>
                <div class="detail"><label>Allocated Person: </label><h5><?= $data ->allocated_person; ?></h5></div>
                <div class="detail"><label>Description: </label><h5><?= $data->description; ?></h5></div>
                <div class="detail"><label>Image: </label><img class="img" src="<?php echo $data->image; ?>"></div>
                <div class="detail"><label>Status: </label><h5><?= $data->status ?></h5></div>
                <div class="detail">
                <form action="/deleteTask" method="post">
                    <input type="text" name="task_id" value="<?= $data->id ?>" hidden>
                    <button style="background-color: deepskyblue; padding: 3px 12px; color: #fff; border-radius: 7px; border: none" name="targetId">Delete</button>
                </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="deletedTasks">
    <p class="title">Delete Count (
        <?php foreach ($deleteCount as $data=>$count): ?>
            <?= $count; ?>
        <?php endforeach; ?>
    )</p>
    <div class="task-content">
    <?php foreach ($deletedTasks as $data): ?>
        <div class="allDetails">
            <input type="text" name="delete_count" value="<?= $data->projects_id; ?>" hidden>
            <div class="detail"><label>Name: </label><h3><?= $data->task_name; ?></h3></div>
            <div class="detail"><label>Allocated Person: </label><h5><?= $data ->allocated_person; ?></h5></div>
            <div class="detail"><label>Description: </label><h5><?= $data->description; ?></h5></div>
            <div class="detail"><label>Image: </label><img class="img" src="<?php echo $data->image; ?>"></div>
            <div class="detail"><label>Status: </label><h5><?= $data->status ?></h5></div>
            <div class="detail">
                <form action="/restoreTask" method="post">
                    <input type="text" name="task_id" value="<?= $data->id ?>" hidden>
                    <button style="background-color: deepskyblue; padding: 3px 12px; color: #fff; border-radius: 7px; border: none" name="targetId">Restore</button>
                </form>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<br>
<a class="btn btn-primary" href="/home">Back</a>
</body>
</html>
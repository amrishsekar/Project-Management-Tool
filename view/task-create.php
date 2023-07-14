<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Create Task page</title>
    <!---->
    <style>
        .form-control{
            width: 20em;
        }
        body{
            background-color: #2b2b2b;
            display: grid;
            place-items: center;
        }
        form{
            background-color: white;
            border: 3px solid deepskyblue;
            width: 25em;
            padding: 25px;
        }
        a.btn.btn-primary {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <!---->
</head>
<body>
<form action="/createTask" method="post" enctype="multipart/form-data">
    <input type="text" name="project_id" value="<?= $projectId; ?>" hidden>
    <div class="mb-3">
        <label>Task Name</label>
        <input type="text" name="task-name" class="form-control" placeholder="Enter task name" required>
    </div>
    <div class="mb-3">
        <label>Allocated Person</label>
        <input type="text" name="allocated-person" class="form-control" placeholder="Enter name" required>
    </div>
    <div class="mb-3">
        <label>Description</label>
        <input type="text" name="description" class="form-control" placeholder="Enter description" required>
    </div>
    <div class="mb-3">
        <label>Image</label>
        <input type="file" name="image" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Status</label>
        <select class="status" name="status">
            <option value="not_yet">Not Yet</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Task</button>
    <br><br>
    <a class="btn btn-primary" href="/home">Back</a>
</form>
</body>
</html>
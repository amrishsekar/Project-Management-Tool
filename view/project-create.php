<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Create Project page</title>
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
<form action="/createProject" method="post">
    <div class="mb-3">
        <label>Project Name</label>
        <input type="text" name="project-name" class="form-control" placeholder="Enter project name" required>
    </div>
    <div class="mb-3">
        <label>Manager</label>
        <input type="text" name="manager" class="form-control" placeholder="Enter manager name" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <br><br>
    <a class="btn btn-primary" href="/home">Back</a>
</form>
</body>
</html>
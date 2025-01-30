<?php 
require 'config.php';
if ($_POST){
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = 'INSERT INTO todo(title, description) VALUES(:title, :description)';
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title' => $title,
            ':description' => $desc
        )
    );
    if ($result){
        echo "<script>alert('New todo is added');window.location.href='index.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create new</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create new Todo</h2>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" id="" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="80" rows="8" class="form-control"></textarea>

                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="SUBMIT">
                    <a href="index.php" class="btn btn-default" name="">Back</a>

                </div>
            </form>
        </div>
    </div>
           
    
</body>
</html>
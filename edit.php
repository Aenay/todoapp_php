<?php 
require 'config.php';
if ($_POST){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $pdostatement = $pdo->prepare("UPDATE todo SET  title='$title', description ='$desc' WHERE id='$id' ");
    $result = $pdostatement->execute();
    if ($result){
        echo "<script>alert('New todo is updated');window.location.href='index.php';</script>";
    }
}else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
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
            <h2>edit new Todo</h2>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control" name="title" id="" value="<?php echo $result[0]['id']?>" required>
                </div>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="" cols="80" rows="8" class="form-control"><?php echo $result[0]['description']?></textarea>

                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                    <a href="index.php" class="btn btn-default" name="">Back</a>

                </div>
            </form>
        </div>
    </div>
           
    
</body>
</html>
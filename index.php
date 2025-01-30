<?php 
require 'config.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <?php 
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();


    
    ?>
    <div class="card">
        <div class="card-body">
            <h2>To do home page</h2>
            <div>
                <a href="add.php" class="btn btn-success">Create New</a>
            </div><br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result){
                        $i = 1;
                        foreach($result as $value){
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['title']; ?></td>
                                <td><?php echo $value['description']; ?></td>
                                <td><?php echo date('Y-m-d',strtotime($value['created_at'])); ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $value['id']; ?>" class="btn btn-warning">edit</a>
                                    <a href="delete.php?id=<?php echo $value['id']; ?>" class="btn btn-danger">delete</a>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</html>
<?php
require("./config.php");
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index Page</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <?php
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    // execute လုပ်လိုက်ရင် data တွေရလာပြီ ပြန်ပြဖို့ fetch လုပ်ဖို့လိုမယ်
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
    ?>


    <div class="card">
        <div class="card-body">
            <h2 class="mb-3">Todo Home Page</h2>
            <a type="button" href="create.php" class="btn btn-success">Create New</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created_at</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $i = 1;
                    if ($result) {
                        // echo "<pre>";
                        // var_dump($result);
                        foreach ($result as $key => $value) {
                    ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value["title"] ?></td>
                                <td><?php echo $value["description"] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($value["created_at"])) ?></td>
                                <td>
                                    <a type="button" class="btn btn-warning" href="edit.php?id=<?php echo $value["id"] ?>">Edit</a>
                                    <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $value["id"] ?>">Delete</a>
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

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
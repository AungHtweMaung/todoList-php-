<?php
require("./config.php");
if ($_POST) {
    // echo "post action";
    $title = $_POST["title"];
    $desc = $_POST["description"];
    $id = $_POST["id"];

    $pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description='$desc' WHERE id='$id'");
    $result = $pdostatement->execute();

    if ($result) {
        echo "<script>alert('$title is edited');window.location.href='index.php'</script>";

    }
} else {
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=" . $_GET["id"]);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();

}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit todo</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <div class="p-3">
        <h2 class="mb-3">Edit Todo</h2>
        <hr>
        <form method="post">
            <!-- update လုပ်ချင်တဲ့ id ရှိမှ ရမှာမလို့  input hidden နဲ့ပို့လိုက်တာ -->
            <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
            <div class="mb-2">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $result[0]["title"] ?>" id="title">
            </div>
            <div class="mb-2">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" value="" id="description" cols="30" rows="10"><?php echo $result[0]["description"] ?></textarea>
            </div>
            <div class="mb-2">
                <input type="submit" class="btn btn-success" value="Edit">
                <a href="index.php" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
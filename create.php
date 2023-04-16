<?php
include("./config.php");

// mysqli_query သုံးရင် query ရေးပြီး တစ်ခါတည်း execute or perform လုပ်လို့ရတယ်
// PDO has 3 stages.
// 1 => write sql query, 2 => prepare လုပ်, 3 => execute လုပ် 


if ($_POST) {
    $title = $_POST["title"];
    $desc = $_POST["description"];
    echo $title . $desc;

    // pdo ရဲ့ သဘောတရားက database ထဲကို data တိုက်ရိုက်မထည့်ဘူး။ sql injection ကို ကာတဲ့အနေနဲ့ binding para ကို : နဲ့ ထည့်ပေးတယ်
    $sql = 'INSERT INTO todo(title, description) VALUES(:title, :description)';
    $pdostatement = $pdo->prepare($sql);    // preparing query
    $result = $pdostatement->execute(       // return bool
        array(
            ":title" => $title,
            ":description" => $desc,
        )
    );
    if ($result) {
        echo "<script>alert('New todo is added');window.location.href='index.php'</script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create todo</title>
    <!-- bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>



    <div class="p-3">
        <h2 class="mb-3">Create Todo</h2>
        <hr>
        <form method="post">
            <div class="mb-2">
                <label for="title">Name</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-2">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-2">
                <input type="submit" class="btn btn-success" name="" value="Create">
                <a href="index.php" class="btn btn-warning">Back</a>
            </div>
        </form>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>
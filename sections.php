<?php

require 'connection.php';

function createSection($name){
    // CONNECTION
    $conn = dbConnect();

    // SQL
    $sql = "INSERT INTO sections (`name`) VALUE ($name)";

    // EXECUTION
    if($conn->query($sql)){
        // SUCCESS
        header('refresh: 0');
    } else {
        die('Error adding new section: '. $conn->error);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Sections</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <h2 class="fw-light mb-3">Sections</h2>

                <!-- FORM -->
                <div class="mb-3">
                    <form action="" method="post">
                        <div class="row gx-2">
                            <div class="col">
                                <input type="text" name="name" placeholder="Add a new section here.." class="form-control" max="50" required>
                                <div class="col-auto">
                                    <button type="submit" name="btn_add" class="btn btn-info w-100 fw-bold">
                                        <i class="fa-solid fa-plus"></i> Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php
                        if(isset($_POST['btn_add'])){
                            $name = $_POST['name'];
                            createSection($name);
                        }
                    ?>
                </div>

                <!-- TABLE -->
            </div>
        </div>
    </main>
</body>
</html>
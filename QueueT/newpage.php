<?php
require 'Database_Controler.php';
$Q = new Queue();
$id = '';
$name = '';
?>
<?php
if (isset($_GET['ADD']) && isset($_GET['name']) && isset($_GET['Choose'])) {
    $Q->Add_customer($_GET['name'], $_GET['Choose']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Queue</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <script src="./js/bootstrap.min.js"></script>
</head>

<body>
    <h1 class="text-center text-secondary m-4">Queue Company</h1>
    <div class="m-md-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="./img/Zain-Logo-2007.png" class="card-img-top" alt="Zain pic" width="300" height="200" />
                    <h5 class="card-title text-center">Zain</h5>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input name="Show--A" type="submit" class="btn btn-outline-primary m-2" value="Next">
                        </form>
                        <?php
                        if (isset($_POST['Show--A'])) {
                            $res = $Q->POP_customer("A");
                            if ($res != 0) {
                                $id = $res['id'];
                                $name = $res['name'];
                        ?>
                        <h3 class="text-center text-primary h-1"><?php echo $id; ?>
                            <br /><?php echo $name; ?>
                        </h3>
                        <?php } else { ?>
                        <h3 class="text-center text-primary h-1">Queue Empty</h3>
                        <?php }
                        } ?>
                        <table class="table table-bordered table-responsive-lg table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $row = $Q->Select_All("A");
                                for ($i = 0; $i < count($row); $i++) {
                                    if (!empty($row[$i])) {
                                ?>
                                <tr>
                                    <td> <?php echo $row[$i]["id"]; ?> </td>
                                    <td> <?php echo $row[$i]["name"]; ?> </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="./img/Asiacell_logo.jpg" class="card-img-top" alt="Asiacell logo" width="300"
                        height="200" />
                    <h5 class="card-title text-center">AsiaCell</h5>
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                            <input name="Show--B" type="submit" class="btn btn-outline-primary m-2" value="Next">
                        </form>
                        <?php
                        if (isset($_POST['Show--B'])) {
                            $res = $Q->POP_customer("B");
                            if ($res != 0) {
                        ?>
                        <h3 class="text-center text-primary h-1">
                            <?php echo $res['id']; ?>
                            <br />
                            <?php echo $res['name']; ?>
                        </h3>
                        <?php } else { ?>
                        <h3 class="text-center text-primary h-1">Queue Empty</h3>
                        <?php }
                        } ?>
                        <table class="table table-bordered table-responsive-lg table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $row = $Q->Select_All("B");
                                for ($i = 0; $i < count($row); $i++) {
                                    if (!empty($row[$i])) {
                                ?>
                                <tr>
                                    <td> <?php echo $row[$i]['id']; ?> </td>
                                    <td> <?php echo $row[$i]['name']; ?> </td>
                                </tr>
                                <?php
                                    }
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="./img/a.webp" class="card-img-top" alt="korek" width="300" height="200" />
                    <h5 class="card-title text-center">Korek</h5>
                    <div class="card-body">
                        <form action="./newpage.php" method="post">
                            <button id="nextButton" type="submit" name="Show--C"
                                class="btn btn-outline-primary m-2">Next</button>
                        </form>
                        <?php

                        if (isset($_POST['Show--C'])) {
                            $res = $Q->POP_customer("C");
                            if ($res != 0) {
                        ?>

                        <h3 class="text-center text-primary h-1"><?php echo $res['id']; ?>
                            <br /><?php echo $res['name']; ?>
                        </h3>

                        <?php } else { ?>
                        <h3 class="text-center text-primary h-1">Queue Empty</h3>
                        <?php }
                        } ?>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-responsive-lg table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody id="customerTableBody">
                                <?php
                                $row = $Q->Select_All("C");
                                for ($i = 0; $i < count($row); $i++) {
                                    if (!empty($row[$i])) {
                                ?>
                                <tr>
                                    <td> <?php echo $row[$i]['id']; ?> </td>
                                    <td> <?php echo $row[$i]['name']; ?> </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid m-5">
        <form id="i" class="row g-3" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
            <div class="col-4">
                <label for="inputPassword2" class="visually-hidden">Name</label>
                <input type="text" class="form-control mb-3 col-auto p-lg-2" id="inputPassword2" placeholder="Name"
                    name="name" />
            </div>
            <div class="col-4">
                <select class="form-select form-select-sm p-2 mb-3" aria-label=".form-select-lg example" name="Choose">
                    <option selected>Open this select menu</option>
                    <option value="A">Zain</option>
                    <option value="B">Asiacell</option>
                    <option value="C">Korek</option>
                </select>
            </div>
            <div class="col-4">
                <input name="ADD" value="submit" type="submit" class="btn btn-primary mb-3">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script>
    $(document).ready(function() {
        $('#i').submit(function(event) {
            event.preventDefault(); // Prevent form submission

            // Get form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                type: 'GET',
                url: './newpage.php',
                data: formData,
                success: function(response) {
                    // Handle the server response here
                    // Update the page content dynamically
                    alert("inset secondary");
                },
                error: function(xhr, status, error) {
                    // Handle error if the request fails

                }
            });
        });
    });
    </script> -->

</body>

</html>

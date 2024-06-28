<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php
    $style = __DIR__ . '/../public/css/style.css';
    echo '<link rel="stylesheet" type="text/css" href="' . $style . '">';
    ?>
</head>
<title><?php echo $title ?></title>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="?action=home" method="post">
                            <div class="form-group mb-4
                        <?php
                        if (isset($error) && $error == "Login failed") {
                            echo 'has-error';
                        }
                        ?>">
                                <label for="username" class="mb-2">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                            </div>
                            <div class="form-group mb-4
                        <?php
                        if (isset($error) && $error == "Login failed") {
                            echo 'has-error';
                        }
                        ?>">
                                <label for="password" class="mb-2">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</html>
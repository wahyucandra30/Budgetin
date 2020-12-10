<?php
    include 'phpscripts/connect.php';

    session_start();

    $id = $_SESSION['currentid'];

    $selectUser = "SELECT * FROM `users` WHERE `account_id` = '$id'";

    $userQuery = $connection->query($selectUser);

    if ($userQuery->num_rows > 0) {
        $row = $userQuery->fetch_assoc();
        
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $birth = $row['birth_date'];
        $email = $row['email_address'];
        $username = $row['username'];
        $password = $row['password'];
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="img/icons/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/icons/favicon.ico" type="image/x-icon">
        <title>Account Settings | Budgetin</title>
        <meta name="description" content="Budgetin Account Settings Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style-global-app.css">
        <link rel="stylesheet" type="text/css" href="css/style-app-acc.css">
        <script defer type="text/javascript" src="js/validation-edit.js"></script>
    </head>
    <body>
        <div class="wrapper">
<!-- ----------------------------------------------SIDEBAR------------------------------------------------- -->
            <div class="container-sidebar">
                <div class="container-sidebar-logo">
                    <a href="" class="logo-sidebar">BUDGETIN</a>
                </div>
                <div class="nav-and-acc">
                    <ul>
                        <li>
                            <button onclick="location.href='dashboard.php'" class="btn-sidebar">
                                <img src="img/icons/bar-chart.png" class="icons-sidebar">Dashboard</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='transaction.html'" class="btn-sidebar">
                                <img src="img/icons/payment.png" class="icons-sidebar">Transaction</a>
                            </button>
                        </li>
                        <li>
                            <button class="btn-sidebar btn-sidebar-active">
                                <img src="img/icons/user-active.png" class="icons-sidebar">Account</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='landing.html'" class="btn-sidebar">
                                <img src="img/icons/logout.png" class="icons-sidebar">Sign Out</a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
<!-- ----------------------------------------------CONTENT------------------------------------------------- -->
            <div class="container-content">
                <div class="content-middle">
                    <div class="container-content-title">
                        <h2>Account Settings</h2>
                        <p>View and edit your registered account information.</p>
                    </div>
                    <div class="pane-content">
                        <div class="container-content-data">
                            <h2>Personal Information</h2>
                        </div>
                        <form id="form_personal" action="phpscripts/users_edit_personal.php" method="POST" name="form_personal" autocomplete="off">
                            <ul>
                                <li>
                                    <div class="div-l">
                                        <label>First Name</label>
                                        <input type="text" value="<?php echo ($fname); ?>" id="fname" name="fname" placeholder="First name" class="textfield">
                                    </div>
                                    <div class="div-r">
                                        <label>Last Name</label>
                                        <input type="text" value="<?php echo ($lname); ?>" id="lname" name="lname" placeholder="Last name" class="textfield">                                        
                                    </div>
                                </li>
                                <li>
                                    <label>Date of Birth</label>
                                    <input type="date" value="<?php echo ($birth); ?>" id="birth" name="birth" placeholder="Date of birth" class="textfield">
                                </li>
                                <li>
                                    <input type="submit" class="btn-save" value="Apply">
                                    <div id="error1"></div>
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="pane-content">
                        <div class="container-content-data">
                            <h2>Account Details</h2>
                        </div>
                        <form id="form_account" action="phpscripts/users_edit_account.php" method="POST" name="form_account" autocomplete="off">
                            <ul>
                                <li>
                                    <label>Email Address</label>
                                    <input type="text" value="<?php echo ($email); ?>" id="email" name="email" placeholder="Email address" class="textfield">
                                </li>
                                <li>
                                    <label>Username</label>
                                    <input type="text" value="<?php echo ($username); ?>" id="username" name="username" placeholder="Username" class="textfield">
                                </li>
                                <li>
                                    <label>Password</label>
                                    <input type="password" value="<?php echo ($password); ?>" id="password" name="password" placeholder="Password" class="textfield">
                                </li>
                                <li>
                                    <input type="submit" class="btn-save" value="Apply">
                                    <div id="error2"></div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </body>
</html>
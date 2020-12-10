<?php
    include 'phpscripts/connect.php';

    session_start();

    $id = $_SESSION['currentid'];

    $selectTransaction = "SELECT * FROM `transactions` WHERE `account_id` = '$id'";

    $userQuery = $connection->query($selectTransaction);

    $addedPanes = array();
    
    if ($userQuery->num_rows > 0) {
        while($row = $userQuery->fetch_assoc()){
            $name = $row['name'];
            $type = $row['type'];
            $income = $row['total_income'];
            $expense = $row['total_expense'];
            $date = $row['date_added'];
            $addedElement = "<li>
                                <div class='pane-content'>
                                    <div class='container-content-data'>
                                        <h2>$name</h2>
                                        <table id='tb-transaction' cellpadding='10' cellspacing='0'>
                                            <tr>
                                                <th class='type'>Type</th>
                                                <th class='income'>Income</th>
                                                <th class='expense'>Expense</th>
                                            </tr>

                                            <tr id=>
                                                <td>$type</td>
                                                <td style='color: #089908'>Rp $income</td>
                                                <td style='color: #ff0000'>Rp $expense</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <h3>Date added: <span class='unbold'>$date</span></h3>
                                </div>
                            <li>";
            
            $addedPanes[] = $addedElement;
        }

    }
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="img/icons/favicon.ico" type="image/x-icon">
        <link rel="icon" href="img/icons/favicon.ico" type="image/x-icon">
        <title>Dashboard | Budgetin</title>
        <meta name="description" content="Budgetin Dashboard Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style-global-app.css">
        <link rel="stylesheet" type="text/css" href="css/style-app-dashboard.css">
        <link rel="stylesheet" type="text/css" href="css/style-app-dashboard.css">
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
                            <button class="btn-sidebar btn-sidebar-active">
                                <img src="img/icons/bar-chart-active.png" class="icons-sidebar">Dashboard</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='transaction.html'" class="btn-sidebar">
                                <img src="img/icons/payment.png" class="icons-sidebar">Transaction</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='account.php'" class="btn-sidebar">
                                <img src="img/icons/user.png" class="icons-sidebar">Account</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='landing.html'" class="btn-sidebar b">
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
            <h2>Dashboard</h2>
            <p>Overview of your transactions.</p>
        </div>
        <h2><?php if($userQuery->num_rows == 0){echo "You haven't made any transactions.";}?></h2>
        <ul class="list-transactions">
            <?php foreach($addedPanes as $display){echo $display;} ?>
        </ul>
        
    </div>
    <!-- <div class="content-right">
        <div class="pane-content">
            <img src="img/piechart.png" id="img-piechart">
            <table>
                <tr>
                    <th id="plan2">Planned</th>
                    <th id="spent">Spent</th>
                    <th id="remain">Remaining</th>
                </tr>

                <tr>
                    <td id="var">Transportation</td>
                    <td>Rp 500.000</td>
                    <td id="persen">10%</td>
                </tr>

                <tr>
                    <td id="var">Electric Bill</td>
                    <td>Rp 750.000</td>
                    <td id="persen">15%</td>
                </tr>

                <tr>
                    <td id="var">Health</td>
                    <td>Rp 1.500.000</td>
                    <td id="persen">30%</td>
                </tr>

                <tr>
                    <td id="var">Debt</td>
                    <td>Rp 250.000</td>
                    <td id="persen">5%</td>
                </tr>

                <tr>
                    <td id="var">Food</td>
                    <td>Rp 2.000.000</td>
                    <td id="persen">40%</td>
                </tr>
            </table>
        </div>

    </div> -->
</div>      
    </body>
</html>
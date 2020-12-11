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
    </head>
    <body>
    <?php
        include 'phpscripts/connect.php';

        session_start();

        $id = $_SESSION['currentid'];

        $selectTransaction = "SELECT * FROM `transactions` WHERE `account_id` = '$id'";

        $userQuery = $connection->query($selectTransaction);

        $addedPanes = array();
        $chartData = array();
        $typeList = array();
        
        if ($userQuery->num_rows > 0) {
            while($row = $userQuery->fetch_assoc()){
                $name = $row['name'];
                $type = $row['type'];
                $income = $row['total_income'];
                $expense = $row['total_expense'];
                $date = $row['date_added'];

                $typeList[] = $type;

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
            
            $chartData = array_count_values($typeList);
            $chartCasting = array();
            foreach($chartData as $x => $x_value)
            {
                $chartCasting[] = array($x, $x_value);
            }
            echo "<script>
                    var chartArray = ".json_encode($chartCasting)."
                </script>";
        }
    ?>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(draw_my_chart);

            function draw_my_chart() {
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Type');
                data.addColumn('number', 'Count');
                for(i = 0; i < chartArray.length; i++){
                    data.addRow([chartArray[i][0], chartArray[i][1]]);
                }

                var options = {title:'Transactions Distribution',
                            titleTextStyle: {fontSize:18},
                            width:360,
                            height:390,
                            pieHole: 0.6,
                            legend: {position: 'bottom', maxLines: 10,textStyle: {fontSize: 12}},
                            };

                var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
        <div class="wrapper">
<!-- ----------------------------------------------SIDEBAR------------------------------------------------- -->
            <div class="container-sidebar">
                <div class="container-sidebar-logo">
                    <a href="" class="logo-sidebar">BUDGETIN</a>
                </div>
                <div class="nav-and-acc">
                    <ul>
                        <li>
                            <button onclick="location.href='dashboard.php'" class="btn-sidebar btn-sidebar-active">
                                <img src="img/icons/bar-chart-active.png" class="icons-sidebar">Dashboard</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='transaction.html'" class="btn-sidebar">
                                <img src="img/icons/payment.png" class="icons-sidebar">Transaction</a>
                            </button>
                        </li>
                        <li>
                            <button class="btn-sidebar">
                                <img src="img/icons/user.png" class="icons-sidebar">Account</a>
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
            <h2>Dashboard</h2>
            <p>Overview of your transactions.</p>
        </div>
        <h2><?php if($userQuery->num_rows == 0){echo "You haven't made any transactions.";}?></h2>
        <ul class="list-transactions">
            <?php foreach($addedPanes as $display){echo $display;} ?>
        </ul>
        
    </div>
    <div class="content-right">
        <div class="pane-content">
            <div id="chart_div"></div>
        </div>
    </div>
</div>      
    </body>
</html>
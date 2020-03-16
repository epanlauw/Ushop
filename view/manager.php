<?php 
    require_once("../include/auth.php");
    require_once("../controller/item_controller.php");
    $controller = new ItemController();
    $result = $controller->showData();
?>
<!DOCTYPE html>
<html>
<head>
    <title> UShop - Toko Kita Semua </title>
        <!-- Bootstrap -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- DataTable -->
        <Script src="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap.min.css"></script>
        <script>
            $(document).ready(function() {
                    $('#data_table').DataTable({
                    });
                } );
        </script>
        <style>
            /* Remove the navbar's default rounded borders and increase the bottom margin */ 
            .navbar {
            margin-bottom: 50px;
            border-radius: 0;
            }
            
            /* Remove the jumbotron's default bottom margin */ 
            .jumbotron {
            margin-bottom: 0;
            }
        
            /* Add a gray background color and some padding to the footer */
            footer {
            background-color: #f2f2f2;
            padding: 25px;
            }
        </style>
    </head>
    <body>
    <div class="jumbotron">
            <div class="container text-center">
                <h1>UShop</h1>      
                <p>NGEDAB, NGEDAB & NGEDAB</p>
            </div>
        </div>

        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="#">UShop</a>
                    </div>
                    <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                        <li><a href="#">Page 1-1</a></li>
                        <li><a href="#">Page 1-2</a></li>
                        <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="profil"><span class="glyphicon glyphicon-user"></span><?php echo ' '. $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></a></li>
                    <li><a href="logout.php" onclick="return confirm('Masih Mau Log Out?')"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <h1><center>Manager</center></h1>
                <a href='manager_add.php' class='btn btn-success'>Add</a>
                <table class="table table-bordered" id="data_table"> 
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Stocks</th>
                        <th>Price</th>
                        <th>Detail</th>
                    </thead>
                    <tbody>
                        <?php 
                            while ($row = $result->fetch_assoc()){
                                echo "<tr>";
                                    echo "<td>" . $row['item_id'] . "</td>";
                                    echo "<td>" . $row['item_name'] . "</td>";
                                    echo "<td>" . $row['item_stock'] . "</td>";
                                    echo "<td>" . $row['item_price'] . "</td>";
                                    echo '<td>' . "<a href='manager_edit.php?item_id=$row[item_id]' class='btn btn-primary'>Edit</a>".
                                                  "<a href='manager_delete.php?item_id=$row[item_id]' class='btn btn-danger' onclick=\"return confirm('Yakin Hapus Item?')\">Delete</a>" 
                                                . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <footer class="container-fluid text-center">
            <p>Wibu Copyright</p>  
        </footer>
    </body>
</html>
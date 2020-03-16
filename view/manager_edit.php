<?php 
    require_once('../include/auth.php');
    require_once('../controller/item_controller.php');
    $controller = new ItemController();
    $result = $controller->showDatadetail();
    $controller->updateItemManager();
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
        <header>
            <div class="jumbotron">
                <div class="container text-center">
                    <h1>UShop</h1>      
                    <p>NGEDAB, NGEDAB & NGEDAB</p>
                </div>
            </div>

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
                    <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span><?php echo ' '. $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']; ?></a></li>
                    <li><a href="logout.php" onclick="return confirm('Masih Mau Log Out?')"><span class="glyphicon glyphicon-log-in"></span> Logout </a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <div class="container">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" required="required"  name="nama" value="<?php echo $result['item_name'];?>">
                </div>
                <div class="form-group">
                    <label>ID Barang</label>
                    <input type="text" class="form-control"  name="id" value="<?php echo $result['item_id'];?>" disabled>
                </div>
                <div class="form-group">
                    <label>Stock Barang</label>
                    <input type="text" class="form-control" required="required" placeholder="Stock" name="stock" value="<?php echo $result['item_stock'];?>">
                </div>
                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" class="form-control" required="required" placeholder="Price" name="price" value="<?php echo $result['item_price'];?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi Barang</label>
                    <input type="text" class="form-control" required="required" placeholder="Description" name="desc" value="<?php echo $result['item_desc'];?>">
                </div>
                <input type="submit" class="btn btn-primary" value="Update" name="update">
                <a href="manager.php" class="btn btn-danger">Back</a>
            </form>
        </div>
        <br/>
        <footer class="container-fluid text-center">
            <p>Wibu Copyright</p>  
        </footer>
    </body>
</html>
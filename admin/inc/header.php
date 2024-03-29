<?php
    include('../lib/session.php');
    Session::checkSession();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiệm bánh</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="//cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <style>
        a {
            text-decoration:none;
        }
        span.error
        {
            margin: 8px 0 0 0;
            padding: 0;
            height: 1%;
            
            color: #FF0000;
        }
        span.success
        {
            margin: 8px 0 0 0;
            padding: 0;
            height: 1%;
            color: #7b912b;
        }
    </style>
</head>
<body class="container-fluid">
        <div class="row mt-4 ">
            <div class="col-1 d-flex" style="margin-right: 111px">
                <h1><img  class="ms-4"src="../img/logo/logo.png"/></h1>
            </div>
            <div class="col-10">
                <nav class="navbar navbar-expand-lg bg-primary bg-opacity-25 bg-gradient border rounded">
                    <div class="container-fluid text-uppercase fw-bold fst-italic " >
                        <a class="nav-link active" aria-current="page" href="index.php">Trang Chủ</a>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent" >
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="../index.php">Xem trang web</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <ul>
                                <!-- Thông tin Admin -->
                                <li style="list-style-type:none;">Hello 
                                    <?php
                                        echo Session::get('adminName');
                                    ?>
                                </li>
                                <?php
                                    if(isset($_GET['action']) && $_GET['action'] == 'logout') { //Tồn tại và kiểm tra giá trị
                                        Session::destroy();
                                    }
                                ?>
                                <!-- Kiểm tra giá trị -->
                                <li style="list-style-type:none;"><a class="text-decoration-none" href="?action=logout">Đăng xuất</a></li> 
                            </ul>
                        </div>
                    </div>   
                </nav>        
            </div>
        </div>
       <br>
        
       


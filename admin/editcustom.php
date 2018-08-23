<?php
	include "../includes/init.php";
    include "../includes/_inc.php";
    include "ck_user.php";
    include "ck_admin.php"; 

    if(!isset($_GET['id'])){
        header('Location: customs.php');
    }
    $onesql = "SELECT * FROM customs WHERE id = ? ";
    $oneProject = $db->rawQuery($onesql,array($_GET['id']));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>寶台建設後台</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
       
        <?php  include('menu.php');?>
        <!-- PAGE CONTAINER-->
        <div class="page-container">
           <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            編輯會員資料
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            <a class="js-acc-btn" ><?=$_SESSION['user_name']?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>登出</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="projectname" class=" form-control-label">會員名稱</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="projectname"  placeholder="請輸入會員名稱" value="<?=$oneProject[0]['name']?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="projectlevel" class=" form-control-label">會員分類</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <select id="projectlevel" class="form-control">
                                                        <option value="potential" <?php if($oneProject[0]['level']=="potential") echo 'selected'?> >潛在客戶</option>
                                                        <option value="order" <?php if($oneProject[0]['level']=="order") echo 'selected'?>>已訂客</option>
                                                        <option value="buy" <?php if($oneProject[0]['level']=="buy") echo 'selected'?>>已購客</option>
                                                        <option value="refund" <?php if($oneProject[0]['level']=="refund") echo 'selected'?>>退戶</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="projecttel" class=" form-control-label">會員電話</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="projecttel"  placeholder="請輸入會員電話" value="<?=$oneProject[0]['tel']?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="projectmobile" class=" form-control-label">會員手機</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="projectmobile"  placeholder="請輸入會員手機" value="<?=$oneProject[0]['mobile']?>" class="form-control">
                                                </div>
                                            </div>
                                             <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="projectaddress" class=" form-control-label">會員地址</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="projectaddress"  placeholder="請輸入會員地址" value="<?=$oneProject[0]['address']?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="projectmemo" class=" form-control-label">備註</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                     <textarea id="projectmemo" rows="9"  class="form-control"><?=$oneProject[0]['memo']?></textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <input type="hidden" id="projectid" value="<?=$oneProject[0]['id']?>">
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="add" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> 確定修改
                                        </button>
                                        <button type="submit"  class="btn btn-primary btn-sm" onclick="location = 'manager.php'">
                                            <i class="fa fa-dot-circle-o"></i> 取消
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
     <script type="text/javascript">
    $(document).on("click", "#add", function() {
        var obj = {};
        if($("#projectname").val().length ==0 || $("#projectname").val() === null){
            alert('請輸入會員名稱');
            return false;
        }
        if($("#projectmobile").val().length ==0 || $("#projectmobile").val() === null){
            alert('請輸入會員手機');
            return false;
        }

        obj['name'] = $("#projectname").val();
        obj['mobile'] = $("#projectmobile").val();
        obj['tel'] = $("#projecttel").val();
        obj['address'] = $("#projectaddress").val();
        obj['level'] = $("#projectlevel").val();
        obj['memo'] = $("#projectmemo").val();
        obj['id'] =  $("#projectid").val();
        console.log(obj);
        $.ajax({
            url: '../edit_custom.php',
            cache: false,
            dataType: 'html',
            type: 'POST',
            data: obj,
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('HTTP status code: ' + jqXHR.status + '\n' +
                'textStatus: ' + textStatus + '\n' +
                'errorThrown: ' + errorThrown);
                console.log('HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText);
            },
            success: function(response) {
                var xx = JSON.parse(response);
                if(xx.message == "success"){
                    alert('修改成功');
                    // location.reload();
                    location.href = 'customs.php';
                }else if(xx.message == "failure"){
                    alert('修改失敗');
                }
                
            }
        });
    });
    </script>
</body>

</html>
<!-- end document-->

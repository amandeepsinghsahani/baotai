<?php
	include "../includes/init.php";
    include "../includes/_inc.php";
    include "ck_user.php"; 
    $pid = 1;
    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
    }
    $psql = "SELECT * FROM project ORDER BY id DESC";
    $projectlists = $db->rawQuery($psql);
    print_r($projectlists );
    $sql = "SELECT visit.* ,customs.name as cname , manager.name as mname
    FROM visit , customs , manager
    WHERE visit.project = ? AND visit.manager = manager.id AND visit.c_id = customs.id  
    ORDER BY visit.date DESC";
    $lists = $db->rawQuery($sql,array($pid));

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
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
                            來訪記錄列表
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
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <select onchange="location = this.value;">
                                    <?php
                                        foreach ($projectlists as $list){ 
                                            if($pid == $list['id'])
                                                echo '<option value="visits.php?pid='.$list['id'].'" selected>'.$list['name'].'</option>';
                                            else
                                                echo '<option value="visits.php?pid='.$list['id'].'" >'.$list['name'].'</option>';
                                        }
                                    ?>
                                </select>
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>客戶姓名</th>
                                                <th>來訪日期</th>
                                                 <th>經手業務專員</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                                $i = 1;
                                                foreach ($lists as $list){ 
                                                    echo '<tr>';
                                                    echo '<td>'.$i.'</td>';
                                                    echo '<td> <button type="button" class="btn btn-secondary mb-1 info" data-toggle="modal" data-target="#mediumModal" id="info_'.$list['c_id'].'">
                                                                '.$list['cname'].'
                                                            </button></td>';
                                                    echo '<td>'.$list['date'].'</td>';
                                                    echo '<td>'.$list['mname'].'</td>';
                                                    echo '</tr>';
                                                    $i++;
                                                }
                                            ?>
                                           
                                            </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                </div>
            </div>
            <!-- modal medium -->
			<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">客戶詳細資料</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            姓名:<span id="cname"></span><br>
                            分類:<span id="clevel"></span><br>
                            市話:<span id="ctel"></span><br>
                            手機:<span id="cmobile"></span><br>
                            住址:<span id="caddress"></span><br>
                            備註:<span id="cmemo"></span><br>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">確定</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal medium -->
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
    $(document).on("click", ".info", function() {
        var obj = {};
        obj['id'] = $(this).prop("id").split("_")[1];
        $.ajax({
            url: '../get_cus_info.php',
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
                $("#cname").text(xx.name);
                $("#clevel").text(xx.level);
                $("#ctel").text(xx.tel);
                $("#cmobile").text(xx.mobile);
                $("#ctitle").text(xx.title);
                $("#caddress").text(xx.address);
                $("#cmemo").text(xx.memo);
            }
        });
    });
    </script>
</body>

</html>
<!-- end document-->

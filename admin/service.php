<?php
	include "../includes/init.php";
    include "../includes/_inc.php";
    $sid = "漏水";
    $search = "";
    if(isset($_GET['sid'])){
        $sid = $_GET['sid'];
    }
    if(isset($_GET['search'])){
        $search = $_GET['search'];
    }
    $ff = array(array("name"=>"漏水"),array("name"=>"地磚"),array("name"=>"壁磚"),array("name"=>"設備"),array("name"=>"油漆"));

    if(empty($search)){
        $sql = "SELECT service.* ,customs.name as cname
        FROM service , customs
        WHERE service.stype = ? AND service.from_custom = customs.id
        ORDER BY service.id DESC";
    }else{
         $sql = "SELECT service.* ,customs.name as cname
        FROM service , customs
        WHERE service.stype = ? AND customs.name like '%".$search."%'  AND service.from_custom = customs.id
        ORDER BY service.id DESC";
    }
    
    $lists = $db->rawQuery($sql,array($sid));

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
                            客服紀錄列表
                            <form class="form-header" action="service.php" method="GET">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="搜尋客服對象(輸入名字任何一個字)" value="<?=$search?>" />
                                <input  type="hidden" name="sid"  value="<?=$sid?>" />
								<button class="au-btn--submit" >
									<i class="zmdi zmdi-search"></i>
								</button>
							</form>
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
                                        foreach ($ff as $list){ 
                                            if($sid == $list['name'])
                                                echo '<option value="service.php?sid='.$list['name'].'&search='.$search.'" selected>'.$list['name'].'</option>';
                                            else
                                                echo '<option value="service.php?sid='.$list['name'].'&search='.$search.'" >'.$list['name'].'</option>';
                                        }
                                    ?>
                                </select>
                                
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>項目</th>
                                                <th>內容</th>
                                                <th>客服對象</th>
                                                <th>回應紀錄</th>
                                                <th>新增問題處理</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php
                                                $i = 1;
                                                foreach ($lists as $list){ 
                                                    echo '<tr>';
                                                    echo '<td>'.$i.'</td>';
                                                    echo '<td>'.$list['sitem'].'</td>';
                                                    echo '<td>'.$list['content'].'</td>';
                                                    echo '<td> <button type="button" class="btn btn-secondary mb-1 info" data-toggle="modal" data-target="#mediumModal" id="info_'.$list['from_custom'].'">
                                                                '.$list['cname'].'
                                                            </button></td>';
                                                    echo '<td> <button type="button" class="btn btn-secondary mb-1 res_info" data-toggle="modal" data-target="#mediumModal2" id="res_'.$list['id'].'_'.$list['sitem'].'_'.$list['content'].'">
                                                                點我查看
                                                            </button></td>';
                                                    echo '<td> <button type="button" class="btn btn-secondary mb-1 add_response" data-toggle="modal" data-target="#mediumModal1" id="addres_'.$list['id'].'">新增</button></td>';
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
                            頭銜:<span id="ctitle"></span><br>
                            市話:<span id="ctel"></span><br>
                            手機:<span id="cmobile"></span><br>
                            住址:<span id="caddress"></span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">確定</button>
						</div>
					</div>
				</div>
			</div>
            <!-- end modal medium -->
            <!-- modal medium1 -->
			<div class="modal fade" id="mediumModal1" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">新增客服處理</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">問題處理</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea  id="textarea-input" rows="9" placeholder="請填入內容..." class="form-control"></textarea>
                                </div>
                            </div>
                            <input type="hidden" id="res_s_id" value="">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal" id="add_res_btn">確定</button>
						</div>
					</div>
				</div>
			</div>
            <!-- end modal medium1 -->
            <!-- modal medium2 -->
			<div class="modal fade" id="mediumModal2" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="mediumModalLabel">客服處理紀錄</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                            類別:<span ><?=$sid?></span><br>
                            項目:<span id="res_item"></span><br>
                            客服內容:<span id="res_q_content"></span><br>
                           <table class="table table-borderless table-data2">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>處理內容</th>
                                        <th>處理時間</th>
                                    </tr>
                                </thead>
                                <tbody id="res_table">
                                       
                                 </tbody>
                            </table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">確定</button>
						</div>
					</div>
				</div>
			</div>
			<!-- end modal medium2 -->
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
                //console.log(response);
                var xx = JSON.parse(response);
                $("#cname").text(xx.name);
                $("#ctel").text(xx.tel);
                $("#cmobile").text(xx.mobile);
                $("#ctitle").text(xx.title);
                $("#caddress").text(xx.address);
            }
        });
    });
    $(document).on("click", ".add_response", function() {
        $("#res_s_id").val($(this).prop("id").split("_")[1]);
    });
    $(document).on("click", "#add_res_btn", function() {
        var obj = {};
        obj['sid'] = $("#res_s_id").val();
        obj['content'] = $("#textarea-input").val();
        // console.log(obj);
        // $("#textarea-input").val("");
        $.ajax({
            url: '../add_response.php',
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
                //console.log(response);
                var xx = JSON.parse(response);
                if(xx.message == "success"){
                    alert('新增成功');
                    $("#textarea-input").val("");
                }else if(xx.message == "failure"){
                    alert('新增失敗');
                }
            }
        });
    });
    $(document).on("click", ".res_info", function() {
        $("#res_item").text($(this).prop("id").split("_")[2]);
        $("#res_q_content").text($(this).prop("id").split("_")[3]);
        var obj = {};
        obj['sid'] = $(this).prop("id").split("_")[1];
        $.ajax({
            url: '../get_response.php',
            cache: false,
            dataType: 'json',
            type: 'POST',
            data: obj,
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('HTTP status code: ' + jqXHR.status + '\n' +
                'textStatus: ' + textStatus + '\n' +
                'errorThrown: ' + errorThrown);
                console.log('HTTP message body (jqXHR.responseText): ' + '\n' + jqXHR.responseText);
            },
            success: function(response) {
                console.log(response);
                var tr = "";
                var iii = 1;
                response.forEach(function(element) {
                    tr += '<tr><td >'+iii+'</td><td >'+element.content+'</td><td>'+element.date+'</td><tr>';
                    iii++;
                });
                $("#res_table").html(tr);
            }
        });
    });
    </script>
</body>

</html>
<!-- end document-->

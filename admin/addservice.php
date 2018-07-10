<?php
	include "../includes/init.php";
    include "../includes/_inc.php";

    $sql = "SELECT * FROM manager ORDER BY id DESC";
    
    $managers = $db->rawQuery($sql);
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
    <link href='js/chosen.min.css' rel='stylesheet'>   
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
                            新增建案
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
                                                    <label for="multiple-select" class=" form-control-label">請選分類&項目</label>
                                                </div>
                                                <div class="col col-md-9">
                                                    <select id="country" class="dept_select"></select>
                                                    <select id="province" class="dept_select"></select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="add" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> 確定新增
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
    <script type="text/javascript" src="js/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="js/area_chs.js"></script>
     <script type="text/javascript">
    $(document).on("click", "#add", function() {
        var getSelect = $("#multiple-select").val();
        var selectStr = "";
        for (var i in getSelect) {
            if(i == 0)
                selectStr += getSelect[i];
            else
                selectStr += ","+getSelect[i];
        }
        var obj = {};
        obj['name'] = $("#projectname").val();
        obj['team'] =  selectStr;
        $.ajax({
            url: '../add_project.php',
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
                    alert('新增成功');
                    location.reload();
                }else if(xx.message == "repeat"){
                    alert('已有同名稱之專案');
                }else if(xx.message == "failure"){
                    alert('新增失敗');
                }
                
            }
        });
    });
    </script>
    <script type="text/javascript">
var areaObj = [];
function initLocation(e){
	var a = 0;
	for (var m in e) {
		areaObj[a] = e[m];
		var b = 0;
		for (var n in e[m]) {
			areaObj[a][b++] = e[m][n];
		}
		a++;
	}
}
</script>

<script type="text/javascript" src="js/location_chs.js"></script>
<script type="text/javascript">
	var country = '';
	for (var a=0;a<=_areaList.length-1;a++) {
		var objContry = _areaList[a];
 		country += '<option value="'+objContry+'" a="'+(a+1)+'">'+objContry+'</option>';
	}
	$("#country").html(country).chosen().change(function(){
		var a = $("#country").find("option[value='"+$("#country").val()+"']").attr("a");
		var _province = areaObj[a];
		var province = '';
		for (var b in _province) {
			var objProvince = _province[b];
			if (objProvince.n) {
				province += '<option value="'+objProvince.n+'" b="'+b+'">'+objProvince.n+'</option>';
			}
		}
		if (!province) {
			province = '<option value="0" b="0">------</option>';
		}
		$("#province").html(province).chosen().change(function(){
			var b = $("#province").find("option[value='"+$("#province").val()+"']").attr("b");
			
			$(".dept_select").trigger("chosen:updated");
		});
		$("#province").change();
		$(".dept_select").trigger("chosen:updated");
	});
	$("#country").change();
	$("button").click(function(){
		alert($("#country").val()+$("#province").val());
	});
</script>
</body>

</html>
<!-- end document-->

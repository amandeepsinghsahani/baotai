<?php
	include "../includes/init.php";
    include "../includes/_inc.php";
    include "ck_user.php"; 
    if(!isset($_GET['id'])){
        header('Location: project.php');
    }
    $onesql = "SELECT * FROM project WHERE id = ? ";
    $oneProject = $db->rawQuery($onesql,array($_GET['id']));
    

    $sql = "SELECT * FROM manager ORDER BY id DESC";
    $managers = $db->rawQuery($sql);

    $alreadySelectArray = explode(",",$oneProject[0]['team']);
    
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
                            編修建案
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
                                                    <label for="projectname" class=" form-control-label">專案名稱</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="projectname"  placeholder="請輸入專案名稱" value="<?=$oneProject[0]['name']?>" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="multiple-select" class=" form-control-label">請選擇專案業務</label>
                                                </div>
                                                <div class="col col-md-9">
                                                     <table>
            <tr>
                <td class="selectbox">
                    業務列表:<br>
                    <select multiple id="select1" >
                        <?php
                        foreach ($managers as $list){
                            if(!in_array($list['id'], $alreadySelectArray))
                                echo '<option value="'.$list['id'].'">'.$list['name'].'</option>';
                        }
                    ?>
                    </select>
                </td>
                <td class="selectbox">
                    <input type="button" class="add1" id="add1_all" value="&gt;&gt;" style="width: 60px" /><br />
                    <input type="button" class="remove1" id="remove1_all" value="&lt;&lt;" style="width: 60px" /><br />
                    <input type="button" class="add1" id="add1_one" value="&gt;" style="width: 60px" /><br />
                    <input type="button" class="remove1" id="remove1_one" value="&lt;" style="width: 60px" /><br />
                    <input type="hidden" id="Mult_SelectListBox1" value="" />
                </td>               
                <td class="selectbox">
                    已選業務:<br>
                    <select multiple id="select2"> 
                          <?php
                        foreach ($managers as $list){
                            if(in_array($list['id'], $alreadySelectArray))
                                echo '<option value="'.$list['id'].'">'.$list['name'].'</option>';
                        }
                    ?>
                    </select>
                </td>
            </tr>
        </table>
                                                    <!-- <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                                    
                                                    </select> -->
                                                </div>
                                            </div>
                                            <input type="hidden" id="projectid" value="<?=$oneProject[0]['id']?>">
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="add" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> 確定修改
                                        </button>
                                         <button type="submit"  class="btn btn-primary btn-sm" onclick="location = 'project.php'">
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
    $(".add1").click(function () {
                var id = $(this).attr('id').split('_');
                if (id[1] == 'all') {
                    $('#select1 option').remove().appendTo('#select2');
                } else {
                    $('#select1 option:selected').remove().appendTo('#select2');
                }
                var Mult_SelectListBox = $('#select2 option').map(function () { return $(this).val(); }).get().join(',');
                $("#Mult_SelectListBox1").attr('value', Mult_SelectListBox);
                return false;
            });
            $(".remove1").click(function () {
                var id = $(this).attr('id').split('_');
                if (id[1] == 'all') {
                    $('#select2 option').remove().appendTo('#select1');
                } else {
                    $('#select2 option:selected').remove().appendTo('#select1');
                }
                var Mult_SelectListBox = $('#select2 option').map(function () { return $(this).val(); }).get().join(',');
                $("#Mult_SelectListBox1").attr('value', Mult_SelectListBox);
                return false;
            });
            //============================================================
            
    $(document).on("click", "#add", function() {
        var selectStr = $("#Mult_SelectListBox1").attr('value');
        // var selectStr = "";
        // for (var i in getSelect) {
        //     if(i == 0)
        //         selectStr += getSelect[i];
        //     else
        //         selectStr += ","+getSelect[i];
        // }
        //console.log(getSelect);
        var obj = {};
        obj['name'] = $("#projectname").val();
        obj['team'] =  selectStr;
        obj['id'] =  $("#projectid").val();
        $.ajax({
            url: '../edit_project.php',
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
                    //location.reload();
                    location.href = 'project.php';
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

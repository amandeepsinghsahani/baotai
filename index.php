<?php
	include "includes/init.php";
    include "includes/_inc.php";

     $sql = "SELECT team
    FROM project
    WHERE id = ?";
    
    $ids = $db->rawQuery($sql,array(1));

    $sql = "SELECT *
    FROM manager
    WHERE id in (".$ids[0]['team'].")";

    $managers = $db->rawQuery($sql);
    //print_r($managers );
?>

<!DOCTYPE html>
<html>
<title>寶台建設</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
 <script type="text/javascript" src="js/jquery-latest.min.js"></script>   
 <script type="text/javascript" src="js/jquery-latest.min.js"></script>   
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 700px; width:1280px}

.bgimg {
    background-image: url('BT-bg1.png');
    min-width: 80%;
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
#q1 {
    width: 56%;
    padding: 8px;
    position: absolute;
    top: 252px;
    height:260px;
    overflow: scroll;
}
input[type=text] {
    width: 70%;
    padding: 5px 5px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
#add_btn {
    width: 25%;
    padding: 8px;
    position: absolute;
    top: 518px;
    opacity:0.05;
}
#add_page {
    width: 10%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 590px;
    left: 180px;
    opacity:0.05;
}
#search_page {
   width: 10%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 590px;
    left: 310px;
    opacity:0.05;
}
#form_page {
     width: 10%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 590px;
    left: 440px;
    opacity:0.05;
}
#service_page {
    width: 10%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 590px;
    left: 570px;
    opacity:0.05;
}
#inva_time {
    width: 10%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 245px;
    left: 790px;
    color: red;
}
#user_data1 {
    width: 20%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 245px;
    left: 410px;
    color: black;
    display:none;
}
#user_data2 {
    width: 20%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 275px;
    left: 410px;
    color: black;
    display:none;
}
#user_data3 {
    width: 20%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 305px;
    left: 410px;
    color: black;
    display:none;
}
#record{
    color: black;
    position: absolute;
    top: 400px;
    left: 730px;
}
.first{
    width: 200px;
    height: 50px;
}

</style>
<script type="text/javascript">
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
    $(document).on("click", "#add_btn", function() {
        if($("#name").val().length == 0){
            alert("請填寫姓名");
            return false;
        }
        if($("#tel").val().length == 0){
            alert("請填寫市話");
            return false;
        }
         if($("#mobile").val().length == 0){
            alert("請填寫手機");
            return false;
        }
        var obj = {};
        obj['name'] = $("#name").val();
        obj['tel'] = $("#tel").val();
        obj['mobile'] = $("#mobile").val();
        obj['title'] = $("#title").val();
        obj['address'] = $("#address").val();
        obj['sel_mg'] = $("#sel_mg").val();
        $.ajax({
            url: 'add_custom.php',
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
                    $( "#add_btn1" ).trigger( "click" );
                }else if(xx.message == "repeat"){
                    alert('已有市話或是電話');
                }else if(xx.message == "failure"){
                    alert('新增失敗');
                }
            }
        });
        $(document).on("click", "#add_btn1", function() {
            console.log('123');
            var obj = {};
            obj['name'] = $("#name").val();
            obj['tel'] = $("#tel").val();
            obj['mobile'] = $("#mobile").val();
            $.ajax({
                url: 'get_custom.php',
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
                    if(response['custom'].length != 0){
                        $("#get_custom_id").val(response['custom'][0].id);
                        $("#user_data1").text("姓名:"+response['custom'][0].name);
                        $("#user_data2").text("電話:"+response['custom'][0].tel);
                        $("#user_data3").text("手機:"+response['custom'][0].mobile);
                        $("#user_data1").show();
                        $("#user_data2").show();
                        $("#user_data3").show();
                        var tr = "";
                        response['visit'].forEach(function(element) {
                            tr += '<tr><td class="first">'+element.date+'</td><td class="first">'+element.pname+'</td><td class="first">'+element.mname+'</td><tr>';
                        });
                        $("#record").html(tr);
                        $("#inva_time").text(response['visit'].length);
                    }else{
                        $("#user_data1").text("查無會員");
                        $("#user_data1").show();
                        $("#user_data2").hide();
                        $("#user_data3").hide();
                    }
                    
                }
            });
        });
    });
</script>
<body>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <h3 id="user_data1"></h3>
    <h3 id="user_data2"></h3>
    <h3 id="user_data3"></h3>
    <h3 id="inva_time">0</h3>
  <form id="q1">
    <span style="color:black;">日期:</span><input type="text" id="datepicker"><br>
    <span style="color:black;">姓名:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">性別:</span><select><option value="男">男</option><option value="女">女</option></select><br>
    <span style="color:black;">年齡:</span><select>
        <option value="30歲以下">30歲以下</option>
        <option value="31~40">31~40</option>
        <option value="41~50">41~50</option>
        <option value="51~60">51~60</option>
        <option value="61歲以上">61歲以上</option>
    </select><br>
    <span style="color:black;">電話:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">行動電話:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">區域:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">地址:</span><input type="text" id="address"  placeholder="住址"><br>
    <span style="color:black;">購屋動機:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">希望坪數:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">希望格局:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">購屋預算:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">自備金額:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">消息來源:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">職業:</span><input type="text" id="name"  placeholder="姓名"><br>
    <span style="color:black;">訪談內容:</span><input type="text" id="name"  placeholder="姓名"><br>
  </form>
    <input type="hidden" id="get_custom_id" value="0"/>
    <input type="button" id="add_btn" />
    <input type="button" id="add_btn1" style="display:none"/>
    <div id="table-scroll">
        <table cellspacing="0" cellpadding="0" id="record"></table>
    </div>
</div>
<div class="menu">
    <input type="button" id="add_page" onclick="javascript:location.href='index.php'"/>
    <input type="button" id="search_page"  onclick="javascript:location.href='search.php'"/>
    <input type="button" id="form_page" />
    <input type="button" id="service_page" />
</div>
</body>
</html>

<?
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
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 700px; width:1230px}

.bgimg {
    background-image: url('bt_bg2.png');
    min-width: 90%;
    min-height: 100%;
    background-position: center;
    background-size: cover;
}
#q1 {
    width: 40%;
    padding: 8px;
    position: absolute;
    top: 252px;
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
#add_v_btn {
    width: 23%;
    padding: 8px;
    position: absolute;
    top: 305px;
    left: 710px;
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
tbody {
 height: 10px;
 overflow: auto;
}
.first{
    width: 200px;
    height: 50px;
}

</style>
<script type="text/javascript">
    $(document).on("click", "#add_v_btn", function() {
        if($("#get_custom_id").val() != 0){
            var obj = {};
            obj['cid'] = $("#get_custom_id").val();
            obj['sel_mg'] = $("#sel_mg").val();
            $.ajax({
                url: 'add_visit.php',
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
                    console.log(response.message);
                    $( "#add_btn" ).trigger( "click" );
                }
            });
        }else{
            alert("請先搜尋會員");
        }        
    });
    $(document).on("click", "#add_btn", function() {
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
</script>
<body>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
    <h3 id="user_data1"></h3>
    <h3 id="user_data2"></h3>
    <h3 id="user_data3"></h3>
    <h3 id="inva_time">0</h3>
    <form id="q1">
        <input type="text" id="name" name="firstname" placeholder="姓名">
        <input type="text" id="tel" name="lastname" placeholder="電話">
        <input type="text" id="mobile" name="lastname" placeholder="手機">
        <span style="color:black;">經手人:</span><select id="sel_mg">
        <?php
                foreach ($managers as $list){ 
                    echo '<option value="'.$list['id'].'">'.$list['name'].'</option>';
                }
            ?>
    </select>
    </form>
    <input type="hidden" id="get_custom_id" value="0"/>
    <input type="button" id="add_btn" />
    <input type="button" id="add_v_btn" />
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

<!DOCTYPE html>
<html>
<title>憲兵司令部</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
 <script type="text/javascript" src="js/jquery-latest.min.js"></script>   
 <script type="text/javascript" src="js/jquery-latest.min.js"></script>   
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 700px; width:1180px}

.bgimg {
    background-image: url('cc.jpg');
    min-width: 100%;
    min-height: 100%;
    left:35px;
    background-position: center;
    background-size: cover;
}
#q1 {
    width: 18%;
    padding: 8px;
    position: absolute;
    top: 288px;
    left:200px;
}

#add_page {
    width: 220px;
    height: 9%;
    padding: 8px;
    position: absolute;
    top: 55px;
    left: 37px;
    opacity:0.02;
    color:gray
}
#add_page1 {
    width: 220px;
    height: 9%;
    padding: 8px;
    position: absolute;
    top: 55px;
    left: 240px;
    opacity:0.02;
    color:gray
}

#inva_time {
    width: 50%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 245px;
    left: 690px;
}
#inva_time1 {
    width: 50%;
    height: 12%;
    padding: 8px;
    position: absolute;
    top: 285px;
    left: 690px;
}
#gg{
    width: 940px;
    position: absolute;
    top: 140px;
    left: 70px;
    color: white;
}
</style>
<script type="text/javascript">
    // function ShowHello() {
    //     setTimeout(function(){ 
    //         $("#add_page").css('opacity', '0.9');
    //         $("#name").text("201專案");
    //         $("#tel").text("陳主席");
    //         $("#mobile").text("203旅");
    //         $("#inva_time").text("ID: 9292856");
    //          $("#inva_time1").text("姓名: 陳上校");
    //          setTimeout(function(){ 
    //          alert("感應報到成功");
    //           }, 500);
    //      }, 3000);
    // }
</script>
<body onload="ShowHello()">

<div class="bgimg w3-display-container w3-animate-opacity ">
    <h3 id="inva_time"></h3>
    <h3 id="inva_time1"></h3>
    <form id="q1">
        <h4 id="name"></h4>
        <h4 id="tel"></h4>
        <h4 id="mobile"></h4>
    </form>
</div>

<div class="menu">
     <input type="button" id="add_page" onclick="javascript:location.href='c2.php'"/>
     <input type="button" id="add_page1" onclick="javascript:location.href='c3.php'"/>
</div>
</body>
</html>

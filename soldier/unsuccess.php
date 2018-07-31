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
body, html {height: 700px; width:1080px}

.bgimg {
    background-image: url('k2.png');
    min-width: 80%;
    min-height: 100%;
    left: 80px;
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

#add_v_btn {
    width: 23%;
    padding: 8px;
    position: absolute;
    top: 305px;
    left: 710px;
    opacity:0.05;
}
#add_page {
    width: 19.5%;
    height: 9%;
    padding: 8px;
    position: absolute;
    top: 628px;
    left: 920px;
    opacity:0.05;
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
    function ShowHello() {
        setTimeout(function(){ 
            $("#add_page").css('opacity', '0.9');
            $("#inva_time").text("ID 9292666");
             $("#inva_time1").text("姓名: 謝上校");
             setTimeout(function(){ 
             alert("非會議與會名單 報到失敗");
              }, 500);
         }, 3000);
    }
</script>
<body onload="ShowHello()">

<div class="bgimg w3-display-container w3-animate-opacity ">
<marquee id="gg" direction="left" height="30" scrollamount="5" behavior="alternate">306專案召集 . 643專案召集 . 629專案召集 . 001專案召集</marquee>
    <h3 id="inva_time"></h3>
    <h3 id="inva_time1"></h3>
    <form id="q1">
        <h4 id="name"></h4>
        <h4 id="tel"></h4>
        <h4 id="mobile"></h4>
    </form>
</div>

<div class="menu">
    <input type="button" id="add_page" />
</div>
</body>
</html>

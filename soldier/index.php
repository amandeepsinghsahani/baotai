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
    background-image: url('b2.png');
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
    top: 272px;
    left:210px;
}

#add_page {
    padding: 8px;
    position: absolute;
    top: 585px;
    left: 900px;
    opacity:1;
    color:gray
}

#inva_time {
    display: none;
    padding: 8px;
    position: absolute;
    top: 265px;
    left: 645px;
}

#gg{
    width: 940px;
    position: absolute;
    top: 140px;
    left: 70px;
    color: white;
}

#t1 {
    display: none;
    position: absolute;
    top: 453px;
    left: 230px;
    font-size: 26px;
}
#t2 {
    display: none;
    position: absolute;
    top: 453px;
    left: 345px;
    font-size: 26px;
}
#t3 {
    display: none;
    position: absolute;
    top: 453px;
    left: 440px;
    font-size: 26px;
}
</style>
<script type="text/javascript">
    function ShowHello() {
        setTimeout(function(){ 
            $("#add_page img").prop('src', 'bt2.jpg');
           
             setTimeout(function(){ 
                $("#name").text("201專案");
                $("#tel").text("陳主席");
                $("#mobile").text("203旅");
                $("#t1").show();
                $("#t2").show();
                $("#t3").show();
                $("#inva_time").show();
              }, 1500);
         }, 3000);
    }
</script>
<body onload="ShowHello()">

<div class="bgimg w3-display-container w3-animate-opacity ">
<marquee id="gg" direction="left" height="30" scrollamount="5" behavior="alternate">306專案召集 . 643專案召集 . 629專案召集 . 001專案召集</marquee>
   <img id="inva_time" src="info.png" style="width: 290px">
    <form id="q1">
        <h4 id="name"></h4>
        <h4 id="tel"></h4>
        <h4 id="mobile"></h4>
    </form>
</div>
<span id="t1">120</span>
<span id="t2">100</span>
<span id="t3">20</span>
<div class="menu">
    <a id="add_page"><img src="bt1.jpg" style="width: 250px;"></a>
</div>
</body>
</html>

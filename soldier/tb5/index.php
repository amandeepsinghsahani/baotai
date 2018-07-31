<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>憲兵司令部</title>
      <link rel="stylesheet" href="css/style.css">
<style>
body, html {height: 700px; width:1240px; margin:0;}

.bgimg {
    background-image: url('cc.jpg');
    min-width: 100%;
    min-height: 100%;
    left:35px;
    background-size: cover;
}
</style>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  
  <script type="text/javascript">
    function ShowHello() {
      console.log('1');
      // $(document).on("trigger","#ooo",function() {
      //   $("#ooo" ).trigger( "click" );

    }
</script>
</head>

<body onload="ShowHello()">
  <div class="bgimg">
  <div class="wrap">
  
  <ul class="tabs group">
    <li id="oo1"><a class="active" href="#/one">座位表</a></li>
    <li id="oo2"><a href="#/two">會議行事曆</a></li>
    <li id="oo3"><a href="#/three">管理公告</a></li>
  </ul>
  
  <div id="content">
    <p id="one" ><img src="b2.png" style="width:800px"> </p>
    <p id="two" style="display:none"><img src="b3.png" style="width:800px"></p>
    <p id="three" style="display:none"><img src="b1.png" style="width:900px"></p>
  </div>
  
</div>
</div>
  <script src="js/index.js"></script>

</body>
</html>

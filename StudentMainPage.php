<?php
 require 'required.php';
?>
<head>
<title>
		Main Page
	</title>
			<meta charset="utf-8">

			<meta name="viewport" content="width=device-width, initial-scale=1">
	
			<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	
			<!-- Latest compiled and minified JavaScript -->
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>		
	
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="js/bootstrap.min.js"></script>
	
			<!--for offline css-->
			<link href="css/bootstrap.min.css" rel="stylesheet">
			
			<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<style>

	
.navbar-custom {
  background-color: orange ;
  border-color: black; 
   <!--it is color of bg and border if nav-->
}

.navbar-custom .navbar-nav > li > a {
  color: black;<!-- this is the color of  content if nav features about register-->
}
 
.navbar-custom .navbar-nav > li > .dropdown-menu {
  background-color: orange; <!-- this is the dropdown backgrd color-->
}
.navbar-custom .navbar-nav > li > .dropdown-menu > li > a {
  color: #363223; <!--this is the text color of dropdown contents-->
}
.navbar-custom .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-custom .navbar-nav > li > .dropdown-menu > li > a:focus {
  color:white;
  background-color: grey; <!--this is the color of dropdown and its backgrd on select -->
}

.navbar-custom .navbar-nav > .active > a, .navbar-custom .navbar-nav > .active > a:hover, .navbar-custom .navbar-nav > .active > a:focus {
  color: white;
  background-color: #ff8000; <!--this is the color of home -->
}
.navbar-custom .navbar-nav > .open > a, .navbar-custom .navbar-nav > .open > a:hover, .navbar-custom .navbar-nav > .open > a:focus {
  color: #f4f4ed;
  background-color: grey; <!--this is the color when features about register is selected-->
}

strong {
  font-weight: 600;
}



strong {
  font-weight: 400;
}
.tile.red {
 position: absolute;
    right: 70px;
 top:-200px;
 width: 400px;
  height:140px;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.orange {
 position: absolute;
    right: -10px;
top:-200px;  
width: 400px;
  height:140px;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.grey{
 position: absolute;
    right: -80px;
 top:-200px;
 width: 400px;
  height:140px;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.green {
 position: absolute;
top:-3px;
    right:70px ;
 width: 400px;
  height:140px;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.blue{
position: absolute;
top:-3px;
    right: -10px;
 width: 400px;
  height:140px;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.purpel{
 position: absolute;
top:-3px;
    right:-80px ;
 width: 400px;
  height:140px;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile .title {
  margin-top: 0px;
}
 .tile.blue, .tile.red, .tile.orange, .tile.green,.tile.yellow,.tile.purpel {
  color: #fff;
}

.tile.red {
  background: #ac193d;
}
.tile.red:hover {
  background: #7f132d;
}
.tile.green {
  background: #00a600;
}
.tile.green:hover {
  background: #007300;
}
.tile.blue {
  background: #2672ec;
}
.tile.blue:hover {
  background: #125acd;
}
.tile.orange {
  background: #dc572e;
}
.tile.orange:hover {
  background: #b8431f;
}
.tile.grey{
  background:#605885;
}
.tile.grey:hover {
  background: #433b67;
}
.tile.purpel {
  background:#7027c3;
}
.tile.purpel:hover {
  background: #800080;
}

.adv{
border-style: solid  ;
        border-width: 4px;
        border-color:grey;
        background-color:grey;
        margin: 80px 300px 40px 300px;
        padding:50px;
}
.famebox{
text-align:center;
}
.blink {
			 border-style:    dotted ;
			 border-width: 4px;
			 border-color: yellow;
			 background-color:orange;
font-size:40px;
cursor:pointer;
margin 40px 40px 40px 40px;
}
.blink:hover{
background-color:#dc572e;
border-color:orange;
} 
#promo{
font-size:30px;
color:white;
}

#hf{
font-size:30px;
text-align:center;
color:white;
}
#hof{
font-size:30px;
color:orange;
}
.footer{
font-size:20px;
text-align:center
}
#footer{
	color:orange;
}
table {
   
    border-collapse:collapse;
    width:100%
    
}
<!--
n
-->

		</style>
</head>
<body bgcolor="#E6E6FA">
	<nav class=" navbar-custom">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display 
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>-->
				<a class="navbar-brand" href="#"><img height="29" width="100" src="studentcorner.jpg"></a>
			<!--</div>
			<!-- Collect the nav links, forms, and other content for toggling 
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="#">Home <span class="sr-only">(current)</span></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Features <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">Papers</a></li>
							<li><a href="#">MCQ's</a></li>
							<li><a href="#">Discussion forum</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-left" role="search">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Search" size="65">
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Register<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
							<li><a href="#"><span class="glyphicon glyphicon-user"></span> Register</a></li>
							<li><a href="#">Something else here</a></li>
						</ul>
					</li>
				</ul>
			<!--</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	
		<!--CAROUSEL-->
		<div class="carousel">
			<div id="myCarousel" class="carousel slide" data-ride="carousel"> 
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0"></li>
				  <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>
				<br><br>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item">
						<img src="book.jpg"  width="360" height="345">
					</div>
					<div class="item active">
						<div class="row">
							<div class="col-md-4 col-md-offset-2">
								<img src="default-user.png" height="250px" width="250px">
							</div>
							<div class="col-md-5">
								<!--percentage and rank-->
								<div class="row">
									<div class="col-md-4">
										<h1><div id="rank">1st</div></h1>
									</div>
								</div>
								<!--name-->
								<div class="row">
									<div class="col-md-4">
										<h1>Srikanth</h1>
									</div>
								</div>
								<!--subject-->
								<div class="row">
									<div class="col-md-8">
										<h3>Computer Networks</h3>
									</div>
									<div class="col-md-2">
										<h2>65%</h2>
									</div>
								</div>
								<br><br>
							</div>
						</div>
					</div>
				  
					<div class="item">
						<img src="mcqs.jpg" alt="Flower" width="360" height="345">
					</div>

					<div class="item">
						<img src="sm.png" alt="Flower" width="360" height="360">
					</div>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<br><Br><br><Br><br><Br><br><Br><br><Br><br><Br><br><Br>	
		
		
	<!--tiles -->

<div class="container">
  <br/>
  <div class="row">
    
    <div class="col-sm-4">
      <div class="tile red">
	  <a href="#">
        <font color="white"><h3 class="title">MCQ'S</h3>
        <p>Hello, Solve MCQ's and earn the Hall Of Fame.</p>
		</font> </a>
   
	 </div>
    </div>
    <div class="col-sm-4">
      <div class="tile orange">
	<a href="#">	
	<font color="white">  <h3 class="title">Upload</h3>
        <p>Hey,register with us and upload your choice of Question.</p>
    </font>  </a>  </div>
    </div>
	<div class="col-sm-4">
      <div class="tile grey">
	  <a href="#">
        <font color="white"><h3 class="title">Contact-us</h3>
        <p>Contact us so we can build a bond.</p>
		</font> </a>
   
	 </div>
    </div>
	
  </div>
  <div class="row">
    <div class="col-sm-4">
      <div class="tile green">
       <a href="#"> 
	   <font color="white"><h3 class="title">PAPERS</h3>
        <p>Get the University papers absolutly Free.</p>
      </font> </a>  </div>
    </div>
	
    <div class="col-sm-4">
      <div class="tile blue">
	  <a href="#">
      <font color="white">  <h3 class="title">HALL OF FAME</h3>
        <p>Hey,Check Hall of fame .</p>
	  </font> </a>	
      </div>
    </div> 
		<div class="col-sm-4">
      <div class="tile purpel">
       <a href="#"> 
	   <font color="white"><h3 class="title">Feedback</h3>
        <p>Hey please feed us back so we can improve us.</p>
      </font> </a>  </div>
    </div>
  </div>
</div>
</br></br>
</br></br>
</br></br>
		<div class="adv">
			<div class="famebox">
				<h3 id="hof"><b>HALL OF FAME</b></h3>
				<hr>
				
				<h4><i><marquee style=" bottom:0; height: 100%; text-align="middle" scrollamount="2" direction="up" loop="true">
				<p id="hf">
				<ul>
				<img src="sri.png"  width="50" height="50">Srikanth SCORE 76! Rank 1 in Computer Networks</font><br/><br/>
				<img src="skdhuka.jpg"  width="50" height="50">Saifali SCORE 76! Rank 1 in Web Technology</font><br/><br/>
				<img src="kc.png"  width="50" height="50">keyur SCORE 76! Rank 1 in SOAD</font>
				</ul>
				</p></marquee></i></h4>
				</hr>
				<p><h4 id="promo">Get your Name into the Golden words in Hall of fame By simply solving the Online MCQ's!!!<h4></p>
				<br/>
				<div class="blink"><h1><a href="">Join US!!!</a><h2></div>
				
			</div>
		</div>
	<div class="footer">
	<hr/ id="footer">
		<table>
		
	<tr><td>© 2016 Copyright SKD</td>
	
	<td>Terms of Service Agreement</br>
	privacy policy </td>
	
	<td>Contact-us</br>
	Feedback</td> 
	
	<td>Design & Develop by S-K-D</td>
	</tr>
		</table>
	</div>	
		
		
		

</body>
<!--.carousel{
width;
}

}	
.navbar-custom {
  background-color: orange ;
  border-color: black; 
   <!--it is color of bg and border if nav-->

<!--
.navbar-custom .navbar-nav > li > a {
  color: black;<!-- this is the color of  content if nav features about register-->

 <!--
.navbar-custom .navbar-nav > li > .dropdown-menu {
  background-color: orange; <!-- this is the dropdown backgrd color-->
<!--}
.navbar-custom .navbar-nav > li > .dropdown-menu > li > a {
  color: #363223; <!--this is the text color of dropdown contents-->
<!--}
.navbar-custom .navbar-nav > li > .dropdown-menu > li > a:hover,
.navbar-custom .navbar-nav > li > .dropdown-menu > li > a:focus {
  color:white;
  background-color: grey; <!--this is the color of dropdown and its backgrd on select -->
<!--}

.navbar-custom .navbar-nav > .active > a, .navbar-custom .navbar-nav > .active > a:hover, .navbar-custom .navbar-nav > .active > a:focus {
  color: white;
  background-color: #ff8000; <!--this is the color of home -->
<!--}
.navbar-custom .navbar-nav > .open > a, .navbar-custom .navbar-nav > .open > a:hover, .navbar-custom .navbar-nav > .open > a:focus {
  color: #f4f4ed;
  background-color: grey; <!--this is the color when features about register is selected-->
<!--}
	
		
		.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
				width: 40%;
				height: 20%;
				margin: auto;
			}
			 
<!--

strong {
  font-weight: 600;
}

h1, h2, h3, h4, h5, h6 {
  font-family: "Open Sans", "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
  line-height: 1.5em;
  font-weight: 300;
}

strong {
  font-weight: 400;
}

.tile.red {
 position: absolute;
    right: -150px;

width: 100%;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.orange {
 position: absolute;
    right: -220px;
 width: 100%;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.green {
 position: absolute;

    right:-150px ;
width: 100%;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile.blue{
position: absolute;

    right: -220px;
 width: 100%;
  display: inline-block;
  box-sizing: border-box;
  background: #fff;
  padding:20px;
  margin-bottom: 10px;
}
.tile .title {
  margin-top: 0px;
}
 .tile.blue, .tile.red, .tile.orange, .tile.green {
  color: #fff;
}

.tile.red {
  background: #ac193d;
}
.tile.red:hover {
  background: #7f132d;
}
.tile.green {
  background: #00a600;
}
.tile.green:hover {
  background: #007300;
}
.tile.blue {
  background: #2672ec;
}
.tile.blue:hover {
  background: #125acd;
}
.tile.orange {
  background: #dc572e;
}
.tile.orange:hover {
  background: #b8431f;
}
.adv{
border-style: dotted solid solid ;
        border-width: 4px;
        border-color:grey;
        background-color: orange;
        margin: 50px 300px 40px 300px;
        padding:50px;
}
.famebox{
text-align:center;
}
-->
<?php
 include 'required.php';
 include 'theme.php';
 
 
 if(isset($_POST['comment']) && !empty($_POST['comment']))	{
	$comment = mysql_real_escape_string($_POST['comment']);
	$time = time();
	$query = "insert into `feedback` values(NULL,'$comment','$l_id','$time')";
	if(!(mysql_query($query)))
		echo mysql_error();
	else
		echo '<script> window.location.href="home.php?msg=2";	</script>';
		//$string = "your comment and rating has been stored successfully";
 } 
 
 //to extract all feedbacks
 $query = "select * from `feedback` order by `timestamp` desc";
 $i = 0;
 if($query_run = mysql_query($query))	{
	while($array = mysql_fetch_assoc($query_run))	{
		$feedback[$i]['response'] = $array['feedback'];
		$feedback[$i]['timestamp'] = $array['timestamp'];
		$username[$i] = get_field('login', 'username', 'L_id', $array['L_id']);
		$i++;
	}
 } else {
	echo mysql_error();
 }
?>
<head>
        <style>

		.carousel-inner 
		.blink {
			 border-style:    dotted ;
			 border-width: 4px;
			 border-color: yellow;
			 background-color: orange;
			 margin: 20px 20px 4px 40px;
	
			}	

			.rate {
			 border-style:solid;
			 border-width: 14px;
			 border-color: orange;
			 background-color: white;
			 margin: 30px 0px 10px 400px;
			}
			.detailBox {
			 border-style:solid;
			 border-width: 5px;
			 border-color: orange;
			 background-color: white;
			 margin: 30px 30px 100px 40px;
			}
			.wrapper {
                padding: 20px;
                margin: 10px auto;
                width: 400px;
                min-height: 70px;
                border-radius: 1px;
                box-shadow: 0 0 10px rgba(0,0,0,.1);
                background-color: #fff;
            }
            .rating{
                overflow: hidden;
                vertical-align: bottom;
                display: inline-block;
                width: auto;
                height: 30px;
            }
            .rating > input{
                opacity: 0;
                margin-right: -100%;
            }
            .rating > label{
                position: relative;
                display: block;
                float: right;
                background: url('star-off-big.png');
                background-size: 30px 30px;
            }
            .rating > label:before{
                display: block;
                opacity: 0;
                content: '';
                width: 30px;
                height: 30px;
                background: url('star-on-big.png');
                background-size: 30px 30px;
                transition: opacity 0.2s linear;
            }
            .rating > label:hover:before,
            .rating > label:hover ~ label:before,
            .rating:not(:hover) > :checked ~ label:before{
                opacity: 1;
            }
<!-- this is of comment section -->
		.detailBox{
			width:320px;
			border:1px solid orange;
			margin:50px;
		}
		.titleBox {
			background-color:;
			padding:100px;
		}



		.commentBox .form-group:first-child, .actionBox .form-group:first-child {
			width:50%;
		}
		.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
			width:7%;
		}
		.actionBox .form-group * {
			width:100%;
			height:35;
		}

		.commentList {
			padding:0%;
			list-style:none;
			max-height:200px;
			overflow:auto;
		}
		.commentList li {
			margin:0;
			margin-top:100px;
		}
		.commentList li > div {
			display:table-cell;
		}
		.commenterImage {
			width:30px;
			margin-right:0px;
			height:15%;
			float:left;
		}
		.commenterImage img {
			width:100%;
			border-radius:50%;
		}
		.commentText p {
			margin:0%;
		}
		.sub-text {
			color:#aaa;
			font-family:verdana;
			font-size:10px;
		}
		.actionBox {
			border-top:1px solid orange;
			padding:0px;
		}
</style>
	<script type="text/javascript">
		function store_rating(value)	{
			if(window.XMLHttpRequest)	{
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			
			xmlhttp.onreadystatechange = function()	{
			}
			
			xmlhttp.open('GET', 'rating_store.php?rating=' + value, true);
			xmlhttp.send();
		}
		/*function open_comments()	{
			if(window.XMLHttpRequest)	{
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
			}
			
			xmlhttp.onreadystatechange = function()	{
				if(xmlhttp.readyState == 4 && xmlhttp.status == 200)	{
					document.getElementById('comments').innerHTML = xmlhttp.responseText;
				}
			}
			
			xmlhttp.open('GET', 'comment.php', true);
			xmlhttp.send();			
		}*/
	</script>
</head>
	<div class="rate">
		<center><h1><font color="orange">Please Rate US!! </font></h1></center>
        <div class="wrapper">
            <span class="rating">
                <input id="rating5" type="radio" name="rating" 
				value="5" onClick="store_rating(5); open_comments();">
                <label for="rating5">5</label>
                <input id="rating4" type="radio" name="rating" value="4" Checked onClick="store_rating(4); open_comments();">
                <label for="rating4">4</label>
                <input id="rating3" type="radio" name="rating" value="3" onClick="store_rating(3); open_comments();">
                <label for="rating3">3</label>
                <input id="rating2" type="radio" name="rating" value="2" onClick="store_rating(2); open_comments();">
                <label for="rating2">2</label>
                <input id="rating1" type="radio" name="rating" value="1" onClick="store_rating(1); open_comments();">
                <label for="rating1">1</label>
            </span>
        </div>
		<center><div class="detailBox">
			<div class="actionBox">
				<ul class="commentList">
<?php 					for($j=0;$j<$i;$j++)	{		?>
						<li>
							<div class="username"><font color="orange">
<?php								echo $username[$j];	?>
							</font></div>
							<br/>				
							<div class="commentText">
								<p class="">
<?php									echo $feedback[$j]['response'];	?>
								</p>
								<span class="date sub-text">
<?php									echo 'on '.date('M jS, Y',$feedback[$j]['timestamp']); //feb 5th, 2016	?>
								</span>
							</div>
						</li>
<?php					}		?>
				</ul>
				<form class="form-inline"  method="POST" action="feedback.php"	>
					<div class="form-group">
						<input class="form-control" type="text" name="comment" placeholder="Type your comment here" />
					</div>
					<button type="submit"><font color="orange" size="3px">Add</font></button>
				</form>
				<br>
			</div>
		</div></center>
	</div>
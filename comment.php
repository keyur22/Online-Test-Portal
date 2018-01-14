<?php

require 'required.php';

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
</head>
<body>
	<center> 
		<div class="detailBox">
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
		</div>
		<div class="form-group">

		</div>
	</center>
</body>
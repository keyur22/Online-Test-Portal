<?php

require 'required.php';

if(isset($l_id))
	include 'theme.php';

?>


<head>
<style>
.contact  {	 
        border-style: dotted solid solid ;
        border-width: 4px;
        border-color:grey;
        background-color: orange;
        margin: 50px 150px 40px 300px;
        padding:50px;
	}
td{
padding:15px;		
}	
</style>
<title>
contact-us
</title>
</head>
<body>
<div class="contact">
<font size="7px" color="blue"><center>CONTACT US</center></font>
<font size="5px" color="black"><center><i>Getting in touch is easy!</i></center></font>

<table style="width:100%">
  <tr>
    <td>
	
	<form action="report.php" method="POST">
    	
	<?php if(!logged_in()) {?>
	<I><font size="4px" color="black">Name:</font></I><br><input type="text" name="name" value="" size="48" required></br>
	</br>
	<I><font size="4px" color="black">Email-id:</font></I><br><input type="text" name="eid" value="" size="48" required></br><br>
	<?php  }?>
	
<i><font size="4px" color="black">Message!!! </font></i><br><br><textarea name="message" rows="10" type="text" cols="50" required></textarea>

<br></br>
<center><input type="submit" id="submitbtn"
		 class="btn btn-primary btn-lg" value="SEND">
</center>
</form>
	</td>
    
	<td>
	
	
	<font size="4px" color="black">
	If you have any <i>Problem</i> or want to <i>suggest</i> something feel free to contact us<br>
	you can reach us here:<br><br>
	</font>
	
	
	
	
    <ul style="list-style-type:none">
	<li>
	<img src="<?php echo $logo.'cno.jpg' ?>"  height="20" width="20">&nbsp&nbspContactno
	</li><br>
	
	
	<li>
	<img src="<?php echo $logo.'gmail.png' ?>"  height="20" width="20">&nbsp&nbspsaifalidhukagmail.com
	</li><br>
	
	<li>
	<img src="<?php echo $logo.'gmail.png' ?>" height="20" width="20" >&nbsp&nbspemailid@gmail.com
	</li><br>
	
	<li>
	<img src="<?php echo $logo.'linkedin.png' ?>" height="20" width="20">&nbsp&nbsplinkedIn	
	</li><br>
	
	</ul>

	</td>		
    
	
  </tr>
</table>
</div>
</body>
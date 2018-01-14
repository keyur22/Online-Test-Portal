<?php

require 'required.php';
include 'theme.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
<style>

	body {
		padding-top: 0px; 
		background-color:#464b54; 
	}

	.img-center {
		margin: 0 auto;
	}

	footer {
		margin: 50px 0;
	}
	
	.page-header{
		color:orange;
		padding:5px;
		font: 40px times new roman, sans-;
	}
	
	p{
		color:white;
		padding:0px;
		font: 20px TIMES NEW ROMAN, sans-    serif;
	}
	
	h5{
		color:#f4df53;
		font-style:italic;
	}
	
	h3{
		color:#f4df53;
		
	}
	
	

</style>
    

</head>

<body>

    

    <!-- Page Content -->
    <div class="container">

        <!-- Introduction Row -->
        <div class="row">
            <div class="col-lg-12">
                <center><h1 class="page-header">About This Site</h1></center>
                
				<p>This website is a MCQ based test system wherein the users can take tests of various subjects and also upload MCQs
				in subjects of their expertise. The MCQs uploaded by the users are used to dynamically create question papers. Result of the each 
				test is stored and the performance of the user in each subject is evaluated. The site also provides the option to download
				university papers of different streams.</p>		
			</div>				
       </div>

        <!-- Team Members Row -->
        <div class="row">
            <div class="col-lg-12">
                <center><h2 class="page-header">Our Team</h2></center>
            
			
			<p>
			We are currently pursuing B.E. in Computer Science from Rizvi College of Engineering.We thought of doing something innovative and beneficial
			to the students in our vacation and came up with this website.We hope this website helps students to improve their knowledge and 
			academics.The website will be updated from time to time as per the requirement.       <b>  Have a nice day!!!!!!</b>
            <br></div>
			
			<div class="col-lg-4 col-sm-6 text-center" style = "background-color:" ><br>
                <img class="img-circle img-responsive img-center" src="<?php echo $image_folder.'SRI.jpg'?>" 
						style="width: 200px; height:200px; max-width: 100% " alt="No image available">
                <h3>Srikanth Pisharody<br>
                    <h5>B.E. Student</h5>
                </h3>
                
            </div>
			<div class="col-lg-4 col-sm-6 text-center"><br>
                <img class="img-circle img-responsive img-center" src="<?php echo $image_folder.'KC1.jpg'?>" 
						style="width: 200px; height:200px; max-width: 100% " alt="No image available">
                <h3>Keyur Chaudhari<br>
                    <h5>B.E. Student</h5>
                </h3>
                
            </div>
            <div class="col-lg-4 col-sm-6 text-center"><br>
                <img class="img-circle img-responsive img-center" src="<?php echo $image_folder.'sk.jpg'?>" 
						style="width: 200px; height:200px; max-width: 100% " alt="No image available">
                <h3>Saif Dhuka<br>
                    <h5>B.E. Student</h5>
                </h3>
                
            </div>
            
            
        </div>

        

        

    </div>
    

</body>

</html>

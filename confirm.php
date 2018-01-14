<?php
include 'required.php';

if(isset($_GET['type']) && !empty($_GET['type']))	{
	$type = $_GET['type'];
	if($type == 1)	{
		$message = "Are you sure that you want to reset your account??";
		$page = 'reset.php';
	} else if ($type == 2)	{
		$message = "Are you sure that you want to delete your account??";
		$page = 'delete.php';
	}

?>


<?php
	if(isset($message))	{	?>
		<div class="col-md-8 col-md-offset-2">
			<div class="alert alert-info alert-dismissable">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h4>
							<?php echo $message;	?>
						</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-1 col-md-offset-8">
						<a href="<?php echo $page;	?>" class="btn btn-default">
							Yes
						</a>
					</div>
					<div class="col-md-1">
						<button type="button" class="btn btn-default" data-dismiss="alert" aria-label="Close">
							Nolksdjlfksjd
						</button>
					</div>
				</div>
			</div>
		</div>
<?php
	}	?>
<?php
}
?>
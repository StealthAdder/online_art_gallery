<?php
    // Restrict URl ACCESS
    session_start();
    if(!isset($_SESSION['auth_name'])) {
        header("Location: /online_art_gallery/auth/index.php?AcessDenied!");
    }
?>
<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/online_art_gallery/auth/dashboard/index.php">Online Art Gallery</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/online_art_gallery/auth/dashboard/index.php">Home</a></li>
                <li><a href="#">Store</a></li>
                <li><a href="#">Page 2</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['auth_name'];?></a></li>
                <li><a href="/online_art_gallery/auth/includes/auth.logout.php"><span class="glyphicon glyphicon-log-in"></span> Logut</a></li>
            </ul>
        </div>
</nav>

<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/style.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/slider.css" />
<link rel="stylesheet" type="text/css" href="/online_art_gallery/css/jquery-ui.css">

<!-- // Javascripts // -->
<script type="text/javascript" src="/online_art_gallery/js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/validation.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/anythingslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/animatedcollapse.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/contentslider.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/ddaccordion.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/acrodin.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/lightbox.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/menu-collapsed.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon-yui.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/trebuchet_ms_400-trebuchet_ms_700-trebuchet_ms_italic_700-trebuchet_ms_italic_400.font.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/cufon.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery.validate.js"></script>
<script type="text/javascript" src="/online_art_gallery/js/jquery-ui.js"></script>
<link href='/online_art_gallery/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
<script src="/online_art_gallery/js/jquery.dataTables.min.js"></script>

<div><br>
</div>

<?php 
	// include_once("../includes/header.php");

    include ("/var/www/html/access/access_art.php");

        $con = mysqli_connect($server, $user, $pass, $db);
        unset($server, $user, $pass, $db);
	if($_REQUEST[product_id])
	{
		$SQL="SELECT * FROM `art`, `Artists`, `type` WHERE product_type_id = type_id AND product_company_id = company_id AND product_id = ".$_REQUEST[product_id];
		$rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
		$data=mysqli_fetch_assoc($rs);
	}

	$SQL="SELECT * FROM `art`, `Artists`, `type` WHERE product_type_id = type_id AND product_company_id = company_id AND type_id = ".$data[type_id];
	$product_rs=mysqli_query($con,$SQL) or die(mysqli_error($con));
?> 
<script>
function goToPage(product_id, product_cost)
{
	location.href = "lib/cart.php?act=save_item&product_id="+product_id+"&cost="+product_cost;
}
</script>
	<!-- <div class="crumb">
    </div>
    <div class="clear"></div> -->
	<div id="content_sec">
		<div class="col1">
			<div class="contact">
				<h4 class="heading colr"><?=$data[product_name]?> Details</h4>
				<?php
				if($_REQUEST['msg']) { 
				?>
				<div class="msg"><?=$_REQUEST['msg']?></div>
				<?php
				}
				?>
				<div id="myrow">
					
				<table>
						<tr>
							<th>Art ID</th>
							<td><?=$data[product_id]?></td>
						</tr>
						<tr>
							<th>Art Name</th>
							<td><?=$data[product_name]?></td>
						</tr>
						<tr>
							<th>Artist Name</th>
							<td><?=$data[artist_name]?></td>
						</tr>
						<tr>
							<th>Artist Id</th>
							<td><?=$data[artist_id]?></td>
						</tr>
						<tr>
							<th>Artist Description</th>
							<td><?=$data[artist_desc]?></td>
						</tr>
						<tr>
							<th>Art Type</th>
							<td><?=$data[type_name]?></td>
						</tr>
						<tr>
							<th>Art Name</th>
							<td><?=$data[product_name]?></td>
						</tr>
						<tr>
							<th>Art Category</th>
							<td><?=$data[company_name]?></td>
						</tr>
						<tr>
							<th>Art Price</th>
							<td><?=$data[product_price]?></td>
						</tr>
						<tr>
							<th>Art Description</th>
							<td><?=$data[product_description]?></td>
						</tr>
					</table>
					<div style="text-align:right; margin-top: 33px;">
						<a href="#" onClick="goToPage(<?=$data[product_id]?>,<?=$data[product_price]?>)" class="button-link">Add to Cart</a>
					</div>
			</div><br><br>
			
			<h4 class="heading colr">All Related Arts</h4>
			<div class="static">
			<table>
					<?php 
					$sr_no=1;
					while($product_data = mysqli_fetch_assoc($product_rs))
					{
					?>
					<tr>
						<td><a href="product-details.php?product_id=<?php echo $product_data[product_id] ?>"><img src="<?=$SERVER_PATH.'/online_art_gallery/uploads/'.$product_data[product_image]?>" style="height:170px; width:150px"></a></td>
						<td style="vertical-align:top">
						<table border="0">
								<tr>
									<td class="tdheading">Art ID</th>
									<td><?=$product_data[product_id]?></td>
								</tr>
								<tr>
									<td class="tdheading">Art Name</th>
									<td><?=$product_data[product_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Art Type</th>
									<td><?=$product_data[type_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Category</th>
									<td><?=$product_data[company_name]?></td>
								</tr>
								<tr>
									<td class="tdheading">Price</th>
									<td><?=$product_data[product_price]?></td>
								</tr>
								<tr>
									<td colspan="2" style="text-align:center; padding:12px;">
										<a href="product-details.php?product_id=<?php echo $product_data[product_id] ?>" class="button-link">View Details</a>
										<a href="#"  onClick="goToPage(<?=$data[product_id]?>,<?=$data[product_price]?>)" class="button-link">Add to Cart</a>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<?php } ?>
					</table>
			</div>
			</div>
		</div>
		<div class="col2">
			<h4 class="heading colr">Art <?=$data['product_name']?></h4>
			<div><img src="<?=$SERVER_PATH.'/online_art_gallery/uploads/'.$data[product_image]?>" style="width: 250px"></div><br>
		</div>
	</div>
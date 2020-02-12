<?php include('filepart/header.php');?>

<!-- Start Banner Section -->

<div class="banner">
	<?php echo stripslashes($comm->get_cms_part('inner_banner'));?>
</div>
<div class="container-fluid">
	<div class="mid_banner">
        <div class="row-fluid">
            <?php echo stripslashes($comm->get_cms_part('get_start'));?>
        </div>
    </div>
    
<!-- Start Conent Section -->
	<div class="content_area">
      	<h2>Wordpress Maker Blog</h2>
     <!--   <h3>Sorry...! We are updating our blog section! Will be back soon...!</h3>-->
    </div>
</div>
<!-- End content Section -->

<?php include('filepart/footer.php');?>

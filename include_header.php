<style type="text/css">
	.navbar-nav li:hover > ul.dropdown-menu {
    display: block;
    margin-top: 7px;
}
.dropdown-submenu {
    position:relative;
}
.dropdown-submenu>.dropdown-menu {
    top: 0;
    left: 100%;
    margin-top:-6px;
}

/* rotate caret on hover */
.dropdown-menu > li > a:hover:after {
    text-decoration: underline;
    transform: rotate(-90deg);
} 

.sticky_header {
	/*background: #db162f;*/
	background-image: linear-gradient(to right, #f5f0e1, #79a7d3, #6883bc);
	/*background: #cfdb16;*/
	padding-top: 4px;
	position: fixed;
	top: 0;
	z-index: 99999999;
 	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#db162f', endColorstr='#d0ac54', GradientType=0 );
	float: left;
	width: 100%;
	height: 78px;
	margin-left: -16px;
    padding-left: 16px;
}

</style>
<?php
  /*------condition-------*/
  $where="isDelete=0 AND isActive=1";
  /*------about_us get Data-------*/
  $category=$db->rp_getData("category","*",$where,"display_order ASC","");
?>

<section class="w3l-header-4 mobile-header">
	<div class="header-tophny">
		<div class="container-fluid">
			<header class="top-headerhny">
				<!--/nav-->
				<nav class="navbar navbar-expand-lg navbar-light">
					<a class="navbar-brand" href="<?=SITEURL?>">
						<img src="<?= LOGO_IMAGE; ?>" alt="Site Logo" style="width: 70%"/></a>
					<!-- if logo is image enable this   
                	<a class="navbar-brand" href="#index.php">
                    <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                	</a> -->
					<button class="navbar-toggler" type="button" data-toggle="collapse"
						data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
						aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="nav navbar-nav ml-auto">
							<li class="dropdown header-dropdown">
								<a class="nav-link" href="<?=SITEURL?>">Home</a>
							</li>
							<li class="dropdown header-dropdown">
								<a class="nav-link" href="<?=SITEURL?>about-us">About-Us</a>
							</li>
							<li class="nav-item dropdown header-dropdown">
				                <a class="nav-link dropdown-toggle" onclick="document.location.href = '<?=SITEURL?>product-list/'" href="<?=SITEURL?>product-list/" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Products </a>
				                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				                	<?php
				                        while ($category_d= mysqli_fetch_assoc($category)) 
				                        {
				                    ?>
				                    <li><a class="dropdown-item" href="<?=SITEURL?>product-list/<?=$category_d['id']?>/"><?= $category_d['name']?></a>
				                    </li>
				                    <?php
				                        }
				                    ?>
				                </ul>
				            </li>
							<li class="dropdown header-dropdown">
								<a class="nav-link" href="<?=SITEURL?>gallery/">Gallery</a>
							</li>
							<li class="dropdown header-dropdown">
								<a class="nav-link" href="<?=SITEURL?>contact-us/">Contact-Us</a>
							</li>
						</ul>
					</div>
				</nav>
				<!--//nav-->
			</header>
		</div>
	</div>
</section>
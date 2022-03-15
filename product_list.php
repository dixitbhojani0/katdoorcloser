<!DOCTYPE html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flowtop-Products</title>
    <!-- include_css start -->
    <?php
        include('include_css.php');
    ?>
    <!-- include_css end -->
    <?php
      $id = @$_GET['id'];
      $sid = @$_GET['sid'];
      /*------condition-------*/
      if($id =="")
      {
        $where ="isDelete=0 AND isActive=1";
      }
      else if($sid!="")
      {
        $where ="isDelete=0 AND isActive=1 AND cid='".$id."' AND sid='".$sid."' "; 
      }
      else 
      {
        $where ="isDelete=0 AND isActive=1 AND cid='".$id."' "; 
      }
      /*------product get Data-------*/
      $product =$db->rp_getData("product","*",$where,0); 
    ?>
</head>
<body>
    <!-- include_header start -->
    <?php
        include('include_header.php');
    ?>
    <!-- include_header end -->
    <!--destinations -->
    <section class="w3l-destinations-1">
        <div class="destionation-innf py-5">
            <div class="container py-lg-5">
                <div class="title-content mb-5">
                    <span class="sub-title">Our Range Of</span>
                    <h3 class="hny-title mb-0">Products</h3>
                    <p>Go Through Wide Range of Porducts</p>
                </div>
                <!--/destinations-grids-->
                <ul class="gallery_agile">
                    <?php
                        while ($product_d = mysqli_fetch_assoc($product)) 
                        {
                        ?>    
                    <li>
                        <div class="">
                            <a href="<?=SITEURL?>product-details/<?=$product_d['id']?>">
                                <img src="<?=SITEURL.PRODUCT.$product_d['image_path']?>" alt=" " class="img-fluid" style="padding: 15%;" />
                            </a>
                        </div>
                        <div class="pro-name">
                            <a href="<?=SITEURL?>product-details/<?=$product_d['id']?>">
                                <h4><?= $product_d['name']?></h4>
                            </a>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
                <!--//destinations-grids-->
            </div>
        </div>
    </section>
    <!-- include_footer start -->
    <?php
    include('include_footer.php');
    ?>
    <!-- include_footer end -->
</body>

</html>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Flowtop-Product-Details</title>
    <!-- include_css start -->
    <?php
    include('include_css.php');
    ?>
    <!-- include_css end -->
    <?php
    $id = $_GET['id'];
    /*------condition-------*/
    $where = "isDelete=0 AND isActive=1";
    $where_a = "isDelete=0 AND isActive=1 AND id = '" . $id . "'  ";

    $where_c = "isDelete=0 AND isActive=1 AND product_id='" . $id . "' ";
    /*------product get Data-------*/
    $product = $db->rp_getData("product", "*", $where_a, 0);
    $product_d = mysqli_fetch_assoc($product);
    /*------Related product get Data-------*/
    $where_b = "isDelete=0 AND isActive=1 AND cid='" . $product_d['cid'] . "' AND id!='" . $id . "'  ";
    $product_a = $db->rp_getData("product", "*", $where_b, "", 0,3);

    $product_b = $db->rp_getData("product", "*", $where, "", 0);
    $product_b_d = mysqli_fetch_assoc($product_b);
    /*------category get Data-------*/
    $category_r = $db->rp_getData("category", "*", $where);
    /*------product_review get Data-------*/
    /*$product_review_r=$db->rp_getData("product_review","*",$where_c);*/
    ?>
</head>

<body>
    <!-- include_header start -->
    <?php
    include('include_header.php');
    ?>
    <!-- include_header end -->
    <!-- =========inner-pages medium content start============-->
    <section class="w3l-destinations-1">
        <div class="destionation-innf py-9">
            <div style="background-color: #fff;" class="full_width padtb_100_20">
                <div class="container">
                    <div class="row">
                        <!-- =========shop left content start============-->
                        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 order-md-1 order-sm-2 order-xs-2 order-2">
                            <div class="full_width mbot30">
                                <h4 class="fnt_25">Product Category</h4>
                                <div class="accordian_nav">
                                    <div class="tabbing">
                                        <?php
                                        while ($category_d = mysqli_fetch_assoc($category_r)) {
                                        ?>
                                            <div class="tabbing_col">
                                                <h2 class="acc_trigger"><a href="<?= SITEURL ?>product-list/<?= $category_d['id'] ?>"><?= $category_d['name'] ?></a>
                                                </h2>
                                                <div class="acc_container">
                                                    <ul class="prd_cat_list">
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- =========shop left content end============-->
                        <!-- =========shop right content start============-->
                        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 col_margin order-md-2 order-sm-1 order-xs-1 order-1" style="margin: 0px!important;">
                            <div class="plft30_">
                                <div class="row mbot75">
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 prd_left_Wdt"><span class="wdt_img"><img src="<?= SITEURL . PRODUCT . $product_d['image_path'] ?>" alt="Product Img"></span></div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 plft45_ prd_detail_desc">
                                        <h3 class="fnt_40 no_after mbot15 letter_spac0"><?= $product_d["name"] ?></h3>
                                        <p><?= $product_d["meta_descr"] ?></p>
                                        <button class="view-all hvr-bounce-to-right shop_add_cart add_cart_second_btn btn-primary" type="submit" data-toggle="modal" data-target="#myModal" style="font-size: 16px;
                                            width: 149px;
                                            height: 54px;
                                            float: left;
                                            /*line-height: 54px;*/
                                            margin: 30px 0px 0px;
                                            color: #fff;
                                            font-weight: 700;
                                            text-transform: uppercase;
                                            text-align: center;
                                            font-family: 'Open Sans', sans-serif;
                                            transform: translateZ(0);
                                            box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                                            backface-visibility: hidden;
                                            transition-duration: 0.5s;
                                            /*background: #5db5ff;*/
                                            background-image: linear-gradient(to right, #f5f0e1, #79a7d3, #6883bc);
                                            border: none;">Inquiry Now
                                        </button>
                                    </div>
                                </div>
                                <div class="full_width panel with-nav-tabs panel-default mbot80">
                                    <div class="panel-heading">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a style="
                                                    position: relative;
                                                    display: block;
                                                    padding: 10px 15px;" href="#tab1default" data-toggle="tab">Descripton</a>
                                            </li>
                                            <li>
                                                <a style="
                                                    position: relative;
                                                    display: block;
                                                    padding: 10px 15px;" href="#tab2default" data-toggle="tab">Specification
                                                </a>
                                            </li>
                                            <li>
                                            <li><a style="
                                                position: relative;
                                                display: block;
                                                padding: 10px 15px;
                                                width: 200px;" href="#tab3default" data-toggle="tab">Installation Video</a></li>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div id="tab1default" class="tab-pane fade in active">
                                                <p class="mbot25"><?= html_entity_decode($product_d["description"]) ?>
                                                </p>
                                            </div>
                                            <div id="tab2default" class="tab-pane fade">
                                                <p><?= html_entity_decode($product_d["add_info"]) ?></p>
                                            </div>
                                            <div id="tab3default" class="tab-pane fade">
                                                <iframe width="100%" height="300" src="<?= $product_d['video_url'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_margin order-md-3 order-sm-3 order-xs-3 order-3" style="margin: 0px!important;">
                            <div class="full_width">
                                <?php
                                if ($product_a > 0) {
                                ?>
                                    <h3>Related Product</h3>
                                    <?php
                                    while ($product_a_d = mysqli_fetch_assoc($product_a)) {
                                    ?>
                                        <div class="prd_list text-center enitre_mouse"><span class="wdt_img shadow_effect effect-apollo mbot25"><a href="<?= SITEURL ?>product-details/<?= $product_a_d['id'] ?>"><img src="<?= SITEURL . PRODUCT . $product_a_d['image_path'] ?>" alt="Material" class="img-responsive"></a></span>
                                            <h5 class="fnt_dark_color_c1 letter_spac0" style="font-size: 100%;"><?= $product_a_d['name']?></h5>
                                        </div>
                                <?php
                                    }
                                } else {
                                }
                                ?>
                            </div>
                        </div>
                        <!-- =========shop right content end============-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- =========inner-pages medium content end============-->
    <!-- include_footer start -->
    <?php
    include('include_footer_2.php');
    ?>
    <!-- include_footer end -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Inquiry Form</h4>
                    <button type="button" class="close cusClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form method="post" id="productform" name="productform" class="default-form">
                        <div class="row clearfix">
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="name">Name<span style="color:red;">*</span></label>
                                <input type="text" name="name" class="form-control" id="name">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="email">Email address<span style="color:red;">*</span></label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="mobile_no">Mobile Number<span style="color:red;">*</span></label>
                                <input type="mobile_no" class="form-control" id="mobile_no" name="mobile_no">

                            </div>
                            <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                <label for="p_quantity">Quantity<span style="color:red;">*</span></label>
                                <input type="number" min="0" class="form-control" id="p_quantity" name="p_quantity">

                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <label for="message">Message<span style="color:red;">*</span></label>
                                <textarea class="form-control" id="message" name="message"></textarea>
                            </div>
                            <input type="hidden" name="pid" value="<?= $id ?>">
                            <div class="form-group col-md-6">
                                <button type="submit" id="submit" name="submit" class="submit btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Modal footer -->
            </div>
        </div>
    </div>
    <!-- <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> -->

    <script type="text/javascript">
        /*------productform validation start-------*/
        $(function() {
            $.validator.addMethod("regex", function(value, element, regexp) {
                    var re = new RegExp(regexp);
                    return this.optional(element) || re.test(value);
                }),
                $("form[name='productform']").validate({
                    rules: {
                        name: {
                            required: true,
                            regex: "^[a-zA-Z]+$"
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        mobile_no: {
                            required: true,
                            regex: "^[0-9]+$",
                            minlength: 10,
                            maxlength: 12
                        },
                        p_quantity: {
                            required: true
                        },
                        message: {
                            required: true
                        },
                    },
                    messages: {
                        name: {
                            required: "<span style='color:red; font-size:14px; font-weight:normal;'>Enter Your Name<span/>",
                            regex: "<b style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Name </b>"
                        },

                        email: {
                            required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Email Address</p>",
                            email: "<p style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Email Address</p>"

                        },
                        mobile_no: {
                            required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Phone Number</p>",
                            regex: "<b style='color:red; font-size:14px; font-weight:normal;'>Please Enter Valid Mobile Number </b>",
                            minlength: "<b style='color:red; font-size:14px; font-weight:normal;'>Mobile Number length at least 10-12 digit.. </b>",
                            maxlength: "<b style='color:red; font-size:14px; font-weight:normal;'>Mobile Number length at least 10-12 digit.. </b>"
                        },
                        p_quantity: {
                            required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Product Quantity</p>"
                        },
                        message: {
                            required: "<p style='color:red; font-size:14px; font-weight:normal;'>Enter Message</p>"
                        }
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
        });
        /*------productform validation end-------*/
        /*------productform submit ajax start-------*/
        $("#productform").on("submit", function(e) {
            e.preventDefault();
            //alert('test');
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $("#productform").serialize();
            var name = $('#name').val();
            var email = $('#email').val();
            var mobile_no = $('#mobile_no').val();
            //var product=$('#product').val();
            var p_quantity = $('#p_quantity').val();
            //var subject=$('#subject').val();
            var pid = $('#pid').val();
            var message = $('#message').val();

            let error = false;
            if (name == '') {
                error = true;
                //$("#warning-name").text('Please enter your name');
            }
            if (email == '') {
                error = true;
                //$("#warning-email").text('Please enter your email');
            }
            if (mobile_no == '') {
                error = true;
                //$("#warning-mobile_no").text('Please enter your mobile number');
            }
            if (p_quantity == '') {
                error = true;
                //$("#warning-mobile_no").text('Please enter your mobile number');
            }
            if (message == '') {
                error = true;
                //$("#warning-product").text('Please select product');
            }
            // console.log(error)
            if (error == false) {
                $.ajax({
                    url: "<?= SITEURL ?>ajax_product_inquiry.php",
                    type: "POST",
                    data: $("#productform").serialize(),

                    beforeSend: function() {},
                    success: function(result) {
                        let jsonData = JSON.parse(result);
                        // console.log(jsonData)
                        if (jsonData.ack == 1) {
                            toastr.success("We Will Contact You Soon...");
                            $("#productform")[0].reset();
                            //$("#warning-subject").text('');
                            $("#warning-name").text('');
                            $("#warning-email").text('');
                            $("#warning-mobile_no").text('');
                            $("#warning-p_quantity").text('');
                            $("#warning-message").text('');
                            //$('#myModal').modal('hide');
                            jQuery('#myModal').modal('hide');
                        } else {
                            toastr.warning("Something Went wrong...");
                            // jQuery(".fail-show").show().text("Something went wrong");
                            // jQuery(".sucess-show").hide();
                        }
                    }
                });
            }
        })
        /*------productform submit ajax end-------*/
    </script>
</body>

</html>
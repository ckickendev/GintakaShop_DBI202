<?php 
    // echo "<pre>";
    // print_r($_SESSION['cart']);
    // print_r($_POST);
    // echo "</pre>";

    
    $id = range('a','z');
    $id = array_merge($id, range('A','Z')); 
    $id = array_merge($id, range('0', '9')); 
    $idstring = implode("", $id);
    $idstring = str_shuffle($idstring);
    $idstring = substr($idstring, 0, 8);

    if(isset($_POST['total_price_order'])){
        $currentdate = date("Y-m-d H:i:s");
        $queryAdd = 'INSERT INTO orderdeal(orderDealId,orderDealIdBuy , orderDealName, orderDealAddress, orderDealPhone, orderDealPrice,orderDealDate, status)
        values ("'.$idstring.'","'.$_SESSION['login']['cusID'].'","'.$_POST['orderName'].'","'.$_POST['orderAddress'].'","'.$_POST['orderPhone'].'","'.$_POST['total_price'].'", "'.$currentdate.'" , 0)';
        excuteQueryWithoutReturn($queryAdd);

        foreach($_SESSION['cart'] as $key => $value){
            $queryAddMore = 'INSERT INTO ordersingle(productId,productNumber,productTotalSingle,productOrderDealId) 
            values ("'.$value['productID'].'","'.$value['number_order'].'","'.($value['number_order']*$value['price']).'","'.$idstring.'")';
            excuteQueryWithoutReturn($queryAddMore);
        }
        unset($_SESSION['cart']);
        header('Location: ../shop/?action=view_list');
        die();
        echo $queryAdd;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../view/style_cart.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="header">
        <div class="contact-header">
            <div class="contact-left">
                <?php 
                    if(isset($_SESSION['login'])){
                        echo '<a href="../view/add_product_by_seller.php" class="btn-contact-left">Add Product</a>';
                        echo '<a href=".?action=shop_seller" class="btn-contact-left">Shoppe seller</a>';
                    }
                    else{
                        echo '<a href=".?action=view_main" class="btn-contact-left">GINTAKA</a>';
                        echo '<a href="#" class="btn-contact-left">Shoppe seller</a>';
                    }
                ?>
                
                
                <p class="btn-contact-left clicktodisplayqrcode">Install app</p>

                <div class="qrcode">
                    <img src="../view/logo/anhqr.png" alt="">
                </div>

                <p class="btn-contact-left">
                    Connect
                    <a href="https://www.facebook.com/lovemyself205/">
                        <div class="icon-contact-left"><img src="../view/logo/facebook-logo.png" alt=""></div>
                    </a>
                    <a href="https://www.instagram.com/the_soona/">
                        <div class="icon-contact-left"><img src="../view/logo/insta.png" alt=""></div>
                    </a>
                </p>
            </div>
            <div class="contact-right">
                <a class=" bell-icon" href="facebook.com">
                    <img src="../view/logo/bell.png" alt="">
                </a>
                <div class="btn-contact-right annoucement-title-contact__right btn-contact-nonegach">
                    <p class="btn-contact-right btn-contact-right-thep annoucement-title-contact__right">
                        Annoucement
                    </p>
                    <div class="annoucement-hidden-contact">
                        <p class="annoucement-title-hidden">New annoucement</p>
                        <a href="" class="annoucement-contact-element">
                            <img src="https://img.kam.vn/images/414x0/0b88045f2d8743b4b163a203e708b882/lazada-sam-tet-tha-ga-deal-chop-nhoang-8k-mien-phi-van-chuyen.jpg" alt="" class="annoucement-element-image">
                            <div class="annoucement-element-info">
                                <h3>Ng??? ng??ng tr?????c Voucher l??n ?????n 100k</h3>
                                <p>Duy nh???t h??m nay, ??i???n t???, Ti??u d??ng, t??m g?? c??ng c??</p>
                            </div>
                        </a>             
                        <a href="" class="annoucement-contact-element">
                            <img src="https://cdn.chanhtuoi.com/uploads/2021/05/w400/anh.jpg.webp" alt="" class="annoucement-element-image">
                            <div class="annoucement-element-info">
                                <h3>Ti???t ki???m h??n v???i h??ng ng??n voucher t??? shoppe</h3>
                                <p>Nhi???u m?? ??ang ch??? b???n, ?????ng b??? qua n?? nh??</p>
                            </div>
                        </a>
                        <a href="" class="annoucement-contact-element">
                            <img src="https://ss-images.saostar.vn/w700/pc/1618391580640/saostar-5xe4hhnwm23barbs.jpg" alt="" class="annoucement-element-image">
                            <div class="annoucement-element-info">
                                <h3>3 ti???ng ph??t cu???i ch???t deal ch??? t??? 1k</h3>
                                <p>Si??u c?? h???i s??n deal 1k, 9k, v??o ?????p ngay th??i</p>
                            </div>
                        </a>
                        <a href=""   class="annoucement-contact-element">
                            <img src="https://afamilycdn.com/150157425591193600/2021/6/3/photo-1-16227333291301764168069-1622733437080-16227334373151105859744.jpg" alt="" class="annoucement-element-image">
                            <div class="annoucement-element-info">
                                <h3>Ch???t ????n 6/6 v???i 3 voucher</h3>
                                <p>3 m?? freeship trong v??, c??ng h??ng ng??n deal, ch???t ngay th??i n??o!</p>
                            </div>
                        </a>
                    </div>
                </div>
                
                <a class=" bell-icon" href="facebook.com">
                    <img src="../view/logo/right-icon-help.png" alt="">
                </a>
                <p class="btn-contact-right">Support</p>
                <?php
                    if(isset($_SESSION['login'])){
                ?>
                <div class="nav_bar_login">
                    <p class="btn-contact-right btn_contact_right_welcome">WELCOME <?php echo $_SESSION['login']['cusName']; ?> </p>
                    <div class="btn_contact_right_upanddown">
                        <a href=".?action=shop_seller">Visit your shop</a>
                        <a href=".?action=view_list" class="">Buy history</a>
                        <a href=".?action=logout" class="">Log out</a> 
                    </div>
                </div>
                <?php
                    }else{
                ?>
                <p class="btn-contact-right">
                    <a href=".?action=view_register" class="e23dascc">Register</a> 
                </p>
                <p class="btn-contact-right">
                    <a href=".?action=view_signin" class="e23dascc">Sign in</a>
                </p>
                <?php 
                    }
                ?>
            </div>
        </div>
    </header>
    <main class="order">
        <div class="cart_main_header">
            <div class="cart_main_header-left container">
                <a href="../shop/?action=view_main">
                    <img src="../view/logo/logogintaka.png" alt="">
                </a>
                <h3 class="cart_main_header_left_title">X??c nh???n ????n h??ng !</h3>
            </div>
        </div>
        <div class="container-ordermain row justify-content-center" style="margin: 0px;">
            <div class="row container-order" style="width: 80%">
                <h3 class="container-order-title col-md-12">X??c nh???n ????n mua c???a b???n</h3>
                <div class="container-order-confirm-elementfirst row col-md-12 align-items-center text-center">
                    <p class="col-md-1 container-order-confirm-element-img">???nh</p>
                    <p class="col-md-5 container-order-confirm-element-title">T??n s???n ph???m</p>
                    <p class="col-md-2 container-order-confirm-element-number">S??? l?????ng</p>
                    <p class="col-md-2 container-order-confirm-element-unitprice">????n gi??</p>
                    <p class="col-md-2 container-order-confirm-element-total">T???ng</p>
                </div>
                <?php foreach($_SESSION['cart'] as $key => $value ){ ?>
                    <div class="container-order-confirm-element row col-md-12 align-items-center text-center">
                        <img src="<?=$value['productImage']?>" alt="" class="col-md-1 container-order-confirm-element-img ">
                        <p class="col-md-5 container-order-confirm-element-title"><?=$value['describlePro']?></p>
                        <p class="col-md-2 container-order-confirm-element-number"><?=$value['number_order']?></p>
                        <p class="col-md-2 container-order-confirm-element-unitprice"><?=$value['price']?></p>
                        <p class="col-md-2 container-order-confirm-element-total"><?php echo number_format($value['number_order']*$value['price'],0,".",".");?></p>
                    </div>
                <?php } ?>
            </div>
            <form action="" class="form_to_comfirm_order row align-items-center " style="width: 80%" method="POST">
                <div class="form_to_comfirm_order_order col-md-8 row flex-column justify-content-center">
                    <h3 class="container-order-title col-md-12">X??c nh???n th??ng tin c???a b???n</h3>
                    <div class="row">
                        <label for="" class="col-md-5">Nh???p t??n</label>
                        <input type="text" name="orderName" placeholder="<?=$_SESSION['login']['cusName']?>" value="<?=$_SESSION['login']['cusName']?>">
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Nh???p ?????a ch???</label>
                        <input type="text" name="orderAddress" placeholder="<?=$_SESSION['login']['address']?>" value="<?=$_SESSION['login']['address']?>">
                    </div>
                    <div class="row">
                        <label for="" class="col-md-5">Nh???p S??? ??i???n tho???i</label>
                        <input type="text" name="orderPhone" placeholder="<?=$_SESSION['login']['phone']?>" value="<?=$_SESSION['login']['phone']?>">
                    </div>
                </div>
                <div class="row form_to_comfirm_order_submit col-md-4 flex-column justify-content-end align-items-end">
                    <div class="form_to_comfirm_order_submit-price row col-md-12 text-right align-items-center justify-content-end">
                        <input type="hidden" name="total_price" value="<?php echo $_POST['total_price']; ?>">
                        <input type="hidden" name="total_price_order" value="<?php echo $_POST['total_price']; ?>">
                        <p class="col-md-6">Th??nh ti???n: </p>
                        <p class="form_to_comfirm_order_submit-pricene"><?php echo number_format($_POST['total_price'],0,".","."); ?> VND</p>
                    </div>
                    <div class="form_to_comfirm_order_submit-btn col-md-12 row justify-content-end">
                        <input type="submit" value="X??c nh???n ?????t h??ng">
                    </div>
                </div>
            </form>
        </div>
    </main>
    <footer class="footer_main_view">
        <div class="footer_about">
            <div class="takecare_customer">
                <h5 class="footer_main_title">Ch??m s??c kh??ch h??ng</h5>
                <p class="footer_main_takecare">Trung t??m tr??? gi??p</p>
                <p class="footer_main_takecare">Shopee Blog</p>
                <p class="footer_main_takecare">Shopee Mall</p>
                <p class="footer_main_takecare">H?????ng d???n mua h??ng</p>
                <p class="footer_main_takecare">H?????ng d???n b??n h??ng</p>
                <p class="footer_main_takecare">Thanh to??n</p>
                <p class="footer_main_takecare">Shopee Xu</p>
                <p class="footer_main_takecare">V???n chuy???n</p>
                <p class="footer_main_takecare">Tr??? h??ng & Ho??n ti???n</p>
                <p class="footer_main_takecare">Ch??m s??c kh??ch h??ng</p>
                <p class="footer_main_takecare">Ch??nh s??ch b???o h??nh</p>
            </div>
            <div class="about_out_shop">
                <h5 class="footer_main_title">V??? ch??ng t??i</h5>
                <p class="footer_main_about_out_shop">Gi???i thi???u v??? gintaka</p>
                <p class="footer_main_about_out_shop">Tuy???n d???ng</p>
                <p class="footer_main_about_out_shop">??i???u Kho???n gintaka</p>
                <p class="footer_main_about_out_shop">Ch??nh s??ch b???o m???t</p>
                <p class="footer_main_about_out_shop">Ch??nh H??ng</p>
                <p class="footer_main_about_out_shop">K??nh Ng?????i b??n</p>
                <p class="footer_main_about_out_shop">Flash Sales</p>
            </div>
            <div class="follow_us">
                <h5 class="footer_main_title">Theo d??i ch??ng t??i</h5>
                <a href="https://www.facebook.com/lovemyself205" class="follow_us_element">
                    <img src="../view/logo/facebook_logo.png" alt="">
                    <p>Facebook</p>
                </a>
                <a href="https://www.facebook.com/lovemyself205/" class="follow_us_element">
                    <img src="../view/logo/twitter.png" alt="">
                    <p>Twitter</p>
                </a>
                <a href="https://www.messenger.com/t/lovemyself205" class="follow_us_element">
                    <img src="../view/logo/messenger_logo.png" alt="">
                    <p>Messenger</p>
                </a>
            </div>
        </div>
        <div class="footer_banquyen">
            <h3>B???n quy???n c???a: ?????c ?????, sinh vi??n K15 ?????i h???c FPT ???? N???ng</h4>
            <h4>C???m ??n c??c b???n ???? gh?? th??m shop</h5>
        </div>
        
    </footer>
</body>
</html>
<?php
    $price = 0;
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $key => $value){
            $price += $value['price']*$value['number_order'];
        } 
    }
    if(isset($_POST['delete_by_cart'])){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['productID'] == $_POST['delete_by_cart']){
                unset($_SESSION['cart'][$key]);
            }
        }
    }
    if(isset($_POST['total_price'])){
        foreach($_POST as $key => $value){
            foreach($_SESSION['cart'] as $key1 => $value1 ){
                if($key == $value1['productID']){
                    $_SESSION['cart'][$key1]['number_order'] = $value;
                }
            }
        }
        include_once('../view/view_order.php');
        die();
    }
    // echo "<pre>";  
    // print_r($_SESSION['cart']);   
    // print_r($_POST);   
    // echo "</pre>";
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
                        <a href=".?action=view_list" class="">Buy History</a>
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
    <main class="cart_main">
        <div class="cart_main_header">
            <div class="cart_main_header-left">
                <a href="../shop/?action=view_main">
                    <img src="../view/logo/logogintaka.png" alt="">
                </a>
                <h3 class="cart_main_header_left_title">Gi??? H??ng</h3>
            </div>
            <div class="cart_main_wrapper">
                <div class="cart_main_element cart_main_element_header">
                    <h3 class="cart_main_element_title1" style="width: 8%">???nh S???n ph???m</h3>
                    <h3 class="cart_main_element_title" style="width: 25%">S???n Ph???m</h3>
                    <p class="cart_main_element_title_type" style="width: 10%"></p>
                    <p class="cart_main_element_title_price" style="width: 12%">????n gi??</p>
                    <p class="cart_main_element_title_number" style="width: 20%">S??? l?????ng</p>
                    <p class="cart_main_element_title_total" style="width: 10%">T???ng gi??</p>
                    <p class="cart_main_element_title_delete">Xo?? s???n ph???m</p>
                </div>
                <?php
                    // if(isset($_SESSION['cart'])){
                    $total = 0;
                    foreach($_SESSION['cart'] as $key => $value){
                        $total += $value['price']*$value['number_order'];
                ?>
                <div class="cart_main_element">
                    <img src="<?php echo $value['productImage']; ?>" alt="">
                    <h3 class="cart_main_element_title"><?php echo $value['describlePro']; ?></h3>
                    <p class="cart_main_element_title_type"><?php echo $value['proName']; ?></p>
                    <p class="cart_main_element_title_price"><?php echo $value['price']; ?></p>
                    <form action="#" method="POST" id="form<?php echo $value['productID']; ?>" class="cart_main_element_title_number">
                        <div class="">
                            <button type="button" onclick="sub(<?php echo $value['productID'];?>, <?php echo $value['price']; ?>)">-</button>
                            <input type="text" class="input_number" id="<?php echo $value['productID']; ?>" name="" value="<?php echo $value['number_order']; ?>">
                            <button type="button" onclick="add(<?php echo $value['productID'];?>, <?php echo $value['price']; ?>)">+</button>
                        </div>
                        <input type="submit" onclick="return false" id="totalPrice<?php echo $value['productID'];?>" class="cart_main_element_title_total" value="<?php echo $value['price']*$value['number_order']; ?>">
                    </form>
                    <form class="cart_main_element_title_delete" method="POST">
                        <input type="hidden" name="delete_by_cart" value="<?php echo $value['productID']; ?>">
                        <input type="submit" value="DELETE PRODUCT">
                    </form>
                </div>
                <?php
                    }
                ?>
                <div class="cart_main_element row">
                    <form action="" method="POST" class="form_continue_to_order row justify-content-end align-items-center">
                        <h4 class="col-md-2 text-right" >T???ng s??? ti???n: </h4>
                        <?php foreach($_SESSION['cart'] as $key => $value){ ?>
                            <input type="hidden" id="s<?=$value['productID']?>" name="<?=$value['productID']?>" value="<?=$value['number_order']?>" class="form_to_order_element">
                        <?php }?>
                        <input type="hidden" id="total_price_hidden" name="total_price" class="total_price_hidden" value="<?=$total?>">
                        <input type="text" class="col-md-2" value="<?php echo number_format($price,0,".","."); ?>" id="total_price">
                        <input type="submit" class="col-md-2" value="?????t h??ng">
                    </form>
                </div>
            </div>
            
            
        </div>
        <script>
            function sub(id, price){
                var chuoi = '#'+ id;
                if(Number($(chuoi).val())>1){
                    var after = Number($(chuoi).val()) - 1;
                    $(chuoi).val(after);
                    var tonggiaelement = '#totalPrice'+id;
                    var tongtien = after * price;
                    $(tonggiaelement).val(tongtien);

                    var formElement = '#s' + id;
                    var number =  $(chuoi).val();
                    $(formElement).val(number);
                }
                


                update();
            }

            function add(id, price){
                var chuoi = '#'+ id;
                after = Number($(chuoi).val()) + 1;
                $(chuoi).val(after);  
                var tonggiaelement = '#'+'totalPrice'+id;
                var tongtien = after * price;
                $(tonggiaelement).val(tongtien);  

                var formElement = '#s' + id;
                var number =  $(chuoi).val();
                $(formElement).val(number);

                update();
            }

            function update() {
                var classformpricesingle = document.getElementsByClassName("cart_main_element_title_total");
                var arr = Array.prototype.slice.call( classformpricesingle );
                var sum = 0;
                arr.forEach(function(n) {
                    var num = $(n).val();
                    console.log(num);
                    sum += Number(num);
                    console.log(sum);
                });
                $("#total_price").val(Intl.NumberFormat().format(sum));
                $("#total_price_hidden").val(sum);
            }
        </script>
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
<?php
require_once "controller.php";
require_once "connection.php";

$user = $_SESSION['user'];
if ($user == "") {
    header("location: index.html");
}

$sql = "SELECT * FROM ORDER_PRODUCT o,PRO_DETAIL d WHERE user='$user' and o.id=d.id ";

$result = mysqli_query($con, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đang giao</title>
    <link rel="stylesheet" href="css/styleaccount.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="images/icon.jpg">
</head>

<body style="overflow: auto;">
    <div class="header">
        <span><img src="https://icons.iconarchive.com/icons/double-j-design/apple-festival/16/app-phone-icon.png">
            <a href="tel:+0367088853">Hotline: 0367088853</a> </span><span>
            <img src="https://icons.iconarchive.com/icons/toma4025/rumax/16/mails-icon.png"><a href="mailto:lanhdaugau1605@gmail.com"> Email:
                lanhdaugau1605@gmail.com</a></span> <span>
            <img src="https://icons.iconarchive.com/icons/icons8/windows-8/16/Network-Ip-Address-icon.png">
            <a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+h%E1%BB%8Dc+C%C3%B4ng+ngh%E1%BB%87+Th%C3%B4ng+tin+v%C3%A0+Truy%E1%BB%81n+th%C3%B4ng+Vi%E1%BB%87t+-+H%C3%A0n/@15.9750157,108.2510434,17z/data=!3m1!4b1!4m5!3m4!1s0x3142108997dc971f:0x1295cb3d313469c9!8m2!3d15.9750106!4d108.2532374?hl=vi-VN">Địa
                điểm các cửa hàng</a> </span> <span>
            <img src="https://icons.iconarchive.com/icons/google/noto-emoji-objects/16/62894-package-icon.png">Theo
            dõi đơn hàng</span>
    </div>
    <div class="topnav">

        <a href="home.php">Trang chủ</a>
        <a href="sanpham.html">Sản phẩm</a>
        <a href="#contact">Khuyến mãi</a>


    </div>

    <div class="content">
        <div class="item">
            <ul>
                <li onclick="window.open('account.php','_self')">
                    <img src="https://cf.shopee.vn/file/ba61750a46794d8847c3f463c5e71cc4">
                    Tài khoản của tôi
                </li>
                <li class="isSelected">
                    <img src="https://cf.shopee.vn/file/f0049e9df4e536bc3e7f140d071e9078" alt="">
                    Đang giao
                </li>
                <li>
                    <img src="https://cf.shopee.vn/file/e10a43b53ec8605f4829da5618e0717c">
                    Thông báo
                </li>

            </ul>

        </div>
        <div class="item">
            <div class="menubar">
                <ul>
                    <li onclick="window.open('purchase.php','_self')">Tất cả</li>
                    <li>Chờ xác nhận</li>
                    <li>Chờ lấy hàng</li>
                    <li class="selected">Đang giao</li>
                    <li>Đã giao</li>
                    <li>Đã hủy</li>
                </ul>
                <div class="Tfo7DW">
                    <input autocomplete="off" placeholder="Tìm kiếm theo Tên Shop, ID đơn hàng hoặc Tên Sản phẩm" value="">
                </div>

                <div class="product">






                    <table style="text-align: center;" border="1px">
                    <tr>
                                <td >Đơn hàng</td>
                                <td>Ngày mua</td>
                                <td>Trạng thái</td>
                                <td>Số tiền</td>
                                <td>Số lượng</td>
                            </tr>
                        <?php
                        $price_total=0;
                        foreach ($result as $key) {
                            $price_total += ($key['price']*$key['quantity']);
                        ?>

                            
                            <tr>
                                <td style="background-size:
                                cover;width: 10vw;height:10vw;background-image: url('<?php echo $key['image']; ?>');">

                                </td>
                                <td style="width:15vw ;">
                                    <?php
                                  
                                    echo $key['purchase_date'];
                                   ?>
                                </td>
                                <td style="width:15vw ;">Đang giao</td>
                                <td style="width:15vw ;">
                                    <?php
                                     echo number_format($key['price'],0,',',',')." VND";
                                    ?>
                                </td>
                                <td>
                                <?php
                                     echo $key['quantity'];
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                        <br>
                        <div class="total" style="text-align: right;">
                       
                         <span >Số tiền phải chuẩn bị:
                         <span class="price-total">
                         <?php echo  number_format($price_total,0,',',','). " VND"?>
                         </span>
                           
                        </span>
                        
                    </div>

                </div>
            </div>
            <br>



        </div>

    </div>
</body>

</html>
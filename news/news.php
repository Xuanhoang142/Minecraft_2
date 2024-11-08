<?php
    include"../connect.php";
    include"../header.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minecraft - Tin tức</title>
    <link rel="stylesheet" href="news.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <script type="text/javascript" src="jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="news.js"></script>

</head>
<body>
    <div class="container">
        
        <form id="form_select" name="form_select" method="get">
            <div class="menu">
            <?php
                //lay du lieu tu bang loaitin
                $sl1="select * from loaitin";
                $kq1=mysqli_query($link, $sl1);
                $idLoaiTin=0;
                ?>
                <button type="submit" name="loaitin" value="0" class="<?php echo !isset($_GET['loaitin']) || $_GET['loaitin'] == '0' ? 'active':'';?>" >Tất cả</button>
                <?php 
                    while($d1=mysqli_fetch_array($kq1)){
                    ?>
                <button type="submit" name="loaitin" value="<?php echo $d1['idLoaiTin'];?>" 
                    class="<?php echo isset($_GET['loaitin']) && $_GET['loaitin'] == $d1['idLoaiTin'] ? 'active':'';?>"> <?php echo $d1['tenLoaiTin'];?> </button>
            <?php }?>
            </div>
        </form>
        <?php
            if(isset($_GET['loaitin'])){
                $idLoaiTin=$_GET['loaitin'];
            } 
            else {
                $idLoaiTin=0;
            }
        ?>

        <?php
            
            //lay du lieu tu ban tintuc theo idLoaitin
            if($idLoaiTin == 0){
                $sl2="select idTin, tenTin, moTa, urLinks, urlImgages from tintuc";
            }else{
                $sl2="select idTin, tenTin, moTa, urLinks, urlImgages from tintuc where idLoaiTin=$idLoaiTin";
            }
            $kq2=mysqli_query($link, $sl2);
            while($d2=mysqli_fetch_array($kq2)){
                

        ?>
        <div id="<?php echo $d2['idTin'];?>" class="content" data-url="<?php echo $d2['urLinks'];?>">
            <div class="noidung">
                <img src="<?php echo $d2['urlImgages'];?>" alt="<?php echo $d2['tenTin']. "_images";?>">
                <p> <?php echo $d2['moTa']; ?> </p>
            </div>
        </div>
        <?php }?>
    </div>
    <!--duong dan cho tung tin tuc -->
    <script>
        $(document).ready(function(){
            $('.content').click(function(){
                //lay url tu db
                var url = $(this).data('url');

                //chuyen huong den url
                window.location.href=url;
            });
        });
    </script>
</body>
</html>
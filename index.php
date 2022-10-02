<?php include "koneksi.php"; 

$query = mysqli_query($koneksi, "SELECT * FROM product WHERE status = 'up' GROUP BY id DESC LIMIT 2 ");

// var_dump($query);
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'assets/CSS/Style.css'?>
    </style>
</head>
<body>
    <nav>
        <div class="wrap">
            <div class="logo">
                <a href="">Accelleron</a>
            </div>
            <div class="lef">
                <a href="#model">Models</a>
                <a href="#news">News</a>
                <a href="">Contact</a>
                <a href="">FAQ</a>
            </div>            
        </div>
    </nav>

    <?php 
    $no = 1;

    while($data = mysqli_fetch_array($query)) :
    ?>
    <section>
        <!-- hero image -->
        <?php if($no % 2) :?>
        <div class="bigbox fir">
            <?php else :?>
                <div class="bigbox sec">
            <?php endif; ?>
            <div class="sidetxt">
                <img class="txt" src="img/<?=$data['lgo_img']?>" alt="">
                <h6><?=$data['deskripsi']?></h5>
                <?php if($no % 2) :?>
                    <h1 id="iii">
                <?php else :?>
                    <h1 id="eee">
                <?php endif; ?>
                    <?=$data['judul'] ?>
                </h1>
            </div>
            <img class="hero" src="img/<?=$data['img']?>" alt="">
            </div>
        </div>
    </section>
    <?php $no++; endwhile ?>
 
    <div class="sli">
        <div class="whi">
            <h3>Update Info</h2>
        </div>
    </div>
    <?php 
    $da = cek("SELECT * FROM `info` WHERE status='up'  ORDER BY id DESC LIMIT 4");
    $test = count($da);
    if($test == 4):?> 
    <main class="layout4">
    <?php elseif($test == 3):?>
    <main class="layout3">
    <?php elseif($test == 2):?>
    <main class="layout2">
    <?php elseif($test == 1):?>
    <main class="layout">
    <?php endif;
    $row = mysqli_query($koneksi, "SELECT * FROM `info` WHERE status='up'  ORDER BY id DESC LIMIT 4");
    while($all = mysqli_fetch_array($row)) :
    ?>
        <div class="boxevent">
            <img src="img/<?=$all['img']?>" alt="">
            <div class="tex">
                <h2><?=$all['judul']?></h2>
                <h6><?=$all['deskripsi']?></h6>
                <a href="">More</a>
            </div>
        </div>
    <?php endwhile;?>
    </main>
    
    <br><br><br><br><br><br>
    <section>
        <div class="scroll">
            <?php 
            $i = 1;

            $result = mysqli_query($koneksi, "SELECT * FROM product WHERE status = 'up' GROUP BY id DESC");

            while($tampil = mysqli_fetch_array($result)) :
            ?>
            <div class="box">
                <div class="lifo">
                    <h2><?=$tampil['judul']?></h2>
                    <h6>Most people in Florida buy <?=$tampil['judul']?></h6>
                    <a href="detailprdc.php?id=<?=$tampil['id']?>">Learn More</a>
                </div>
                <div class="libo">
                    <img src="img/<?=$tampil['img']?>" alt="">
                </div>
            </div>

            <?php $i++; endwhile ?>
        </div>
    </section>
    <footer>
        <div class="wrf">
            <div class="logo"><a href="">Accelleron</a></div>
            <div class="linet">
                <a href="">Company</a>
                <a href="">Careers</a>
                <a href="">Contact us</a>
                <a href="">sustainbility</a>
                <a href="">media center</a>
            </div>
            <div class="linet">
                <a href="">privacy and legal</a>
                <a href="">cookie setting</a>
                <a href="">sitemap</a>
                <a href="">news letter</a>
            </div>
            <h6>Copyright © 2022 Automobili Accelleron S.p.A. a sole shareholder company part of Sians Group.
                All rights reserved. VAT no. IT 00591801204</h6>
        </div>
    </footer>
</body>
<script>
    <?php include "assets/JS/main.js"?>
</script>
</html>
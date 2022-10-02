<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php include 'assets/CSS/style.css'?>
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo"><a href="">Accelleron</a></div>
            <div class="menu">
                <a href="">Our Product</a>
                <a href="">Event</a>
            </div> 
        </div>
        <div class="for">
            <form action="" enctype="multipart/form-data">
                <div class="cont">
                    <label class="file" for="carimg">
                        Image
                        <input type="file" name="img">
                    </label>
                <div class="co"> 
                    <input type="text" placeholder="Title..." name="judul">                  
                    <textarea placeholder="input here..." name="deskripsi" id=""></textarea>
                </div>
                <!-- button -->
                <input type="submit" name="kirim">                 
                </div>
            </form>

            <?php 
            if(isset($_POST['kirim'])){
                $judul = $_POST['judul'];
                $lgo_img = $_FILES['lgo_img']['name'];
                $img = $_FILES['img']['name'];
                $harga = $_POST['harga'];
                $power = $_POST['power'];
                $top_speed = $_POST['top_speed'];
                $torquee = $_POST['torque'];
                $deskripsi = $_POST['deskripsi'];

                $lgo_tmp = $_FILES['lgo_img']['tmp_name'];
                $img_tmp = $_FILES['img']['tmp_name'];

                move_uploaded_file($lgo_tmp, "img/$lgo_img");
                move_uploaded_file($img_tmp, "img/$img");

                $query = mysqli_query($koneksi, " INSERT INTO product VALUES('', '$judul', '$lgo_img', '$img', '$harga', '$power', '$top_speed', '$torquee', '$deskripsi', 'up')");

                if($query){
                    header("Location: admin-product.php");
                }else{
                    header("Location: create.php?status='gagal'");
                }
            }
            ?>

        </div>   
    </div>
</body>
</html>
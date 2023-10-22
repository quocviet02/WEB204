<main class="catalog  mb ">

    <div class="boxleft">
        <div class="banner">
            <img id="banner" src="./img/anh0.jpg" alt="">
            <button class="pre" onclick="pre()">&#10094;</button>
            <button class="next" onclick="next()">&#10095;</button>
        </div>

        <div class="items">
            <?php foreach ($spnew as $key => $value) {
                extract($value);
                $linkdetailsp = "index.php?act=sanphamct&idsp=" . $id;
                $image_path = $img_path . $img;
                // var_dump($image_path);
                // die;
                echo '
            <div class="box_items">
               <div class="box_items_img">
                  <img src="' . $image_path . '" alt="">
               </div>
                  <a class="item_name" href="' . $linkdetailsp . '">' . $name . '</a>
                  <p class="price">$' . $price . '</p>
                  <form action="index.php?act=addtoCart" method="POST">
                <input type="hidden" name="id" value="' . $id . '">
                <input type="hidden" name="name" value="' . $name . '">
                <input type="hidden" name="img" value="' . $image_path . '">
                <input type="hidden" name="price" value="' . $price . '">
                <input type="submit" name="addCart" value="Thêm giỏ hàng">
            </form>
            </div>
            
            ';
            } ?>
        </div>

    </div>
    <div class="boxright">

        <?php
        include 'boxright.php';
        ?>
    </div>

</main>
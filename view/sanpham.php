<main class="catalog  mb ">

    <div class="boxleft">
      <div class="  mb">
        
        <div class="box_title"> SẢN PHẨM <?=$name?></div>
        <div class="box_content">
        <?php foreach ($dssp as $key => $value) {
            extract($value);
            $linkdetailsp = "index.php?act=sanphamct&idsp=".$id;
            $image_path = $img_path . $img;
            
            echo '
            <div class="box_items">
               <div class="box_items_img">
                  <img src="' . $image_path . '" alt="">
                  <div class="add" href="">ADD TO CART</div>
               </div>
                  <a class="item_name" href="'.$linkdetailsp.'">' . $name . '</a>
                  <p class="price">$' . $price . '</p>
            </div>';
         } ?>
        </div>
      </div>
    </div>
    <div class="boxright">

        <?php
        include 'boxright.php';
        ?>
    </div>

</main>
<main class="catalog  mb ">

	<div class="boxleft">
		<div class="  mb">
			<?php extract($detail); ?>
			<div class="box_title"><?= $name ?></div>
			<div class="box_content">
				<?php

				$img = $img_path . $img;
				echo '
                <img src="' . $img . '">
                ';
				echo $mota;
				?>

			</div>
		</div>

		<div class="mb">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
			<script>
				$(document).ready(function() {
					$("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?=$id?>});
				});
			</script>
			<div class="row" id="binhluan"></div>
			<!-- <div class="box_title">BÌNH LUẬN</div>
			<div class="box_content2  product_portfolio binhluan ">
				<iframe src="view/binhluan/binhluanform.php?idpro=<?= $id ?>" frameborder="0" width="100%" height="300px"></iframe>
				<table>
					<tr>
						<td>Sản phẩm quá đẹp</td>
						<td>Nguyễn Thành A</td>
						<td>20/10/2022</td>
					</tr>
					<tr>
						<td>Sản phẩm quá đẹp</td>
						<td>Nguyễn Thành A</td>
						<td>20/10/2022</td>
					</tr>
				</table>
			</div> -->
			

		</div>
		<div class=" mb">
			<div class="box_title">SẢN PHẨM CÙNG LOẠI</div>
			<div class="box_content">
				<?php
				foreach ($productsameCate as $key => $value) {
					extract($value);
					$linkPCate = "index.php?act=sanphamct&idsp=" . $id;
					echo '<li><a href="' . $linkPCate . '">' . $name . '</a></li>';
				}
				?>
			</div>
		</div>
	</div>
	<div class="boxright">

		<?php
		include 'boxright.php';
		?>
	</div>

</main>
<?php

session_start();

function getTitle() {
	echo 'Catalog';
}

include 'partials/head.php';

$file = file_get_contents('assets/items.json');
$items = json_decode($file, true);

?>

</head>
<body>

	<!-- main header -->
	<?php include 'partials/main_header.php'; ?>

	<!-- wrapper -->
	<main class="wrapper">

		<h1>Catalog Page</h1>

		<div class="itemsWrapper">
		<?php
			foreach ($items as $item) {
				echo '
				<div class="item-container">
				<h3>'.$item['name'].'</h3>
				<img src='.$item['image'].' alt="Mock Data">
				<p>'.$item['price'].'</p>
				<p>'.$item['desciption'].'</p>
				</div>
				';
			}
		 ?>

	 </div>


	</main>

	<!-- main footer -->
	<?php include 'partials/main_footer.php'; ?>

<?php

include 'partials/foot.php';

?>

</body>
</html>

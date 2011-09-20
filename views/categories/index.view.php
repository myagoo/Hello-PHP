<?php foreach($categories as $category){ ?>
	<h1><a href="<?php echo BASE_URL.DS; ?>categories/view/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></h1>
<?php } ?>


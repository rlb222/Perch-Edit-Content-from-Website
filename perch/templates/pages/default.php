<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>

<!-- This is an example of a Master page --> 

<!-- You can insert regionedit.script into a Master Page -->
<!-- or you can insert the line into every *.php page on the root of your site if you don't use Master Pages -->

<?php 
perch_content_create('Pagina Titel', array(
	'template' => 'grotekop.html',
	'multiple' => false,
	'edit-mode' => 'listdetail'
)); 
?>


<!doctype html>
<html lang="en">
<?php perch_layout('cdr.head'); ?>

<!-- This is the line you insert for RegionEdit -->
<?php perch_layout('rlb_editfromwebsite.script'); ?>


<body>
	<header>
		<img src="img/logo_groen.png" alt="Logo Centrum de Rond">
	</header>
	<nav>
        <?php perch_pages_navigation(['levels'=>1]); ?>
	</nav>

	<section>
		<?php perch_content('Pagina Titel'); ?>
	</section>

	<?php perch_layout('cdr.footer'); ?>
</body>
</html>

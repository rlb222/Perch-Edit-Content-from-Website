<?php if (!defined('PERCH_RUNWAY')) include($_SERVER['DOCUMENT_ROOT'].'/perch/runtime.php'); ?>

<?php 
setlocale (LC_TIME, "Dutch");

perch_content_create('Pagina Titel', array(
	'template' => 'grotekop.html',
	'multiple' => false,
	'edit-mode' => 'listdetail'
)); 

perch_content_create('Alinea', array(
	'template' => 'alinea.html',
	'multiple' => true,
	'edit-mode' => 'singlepage'
)); 

perch_content_create('Workshop', array(
	'template' => 'workshop.html',
	'multiple' => true,
	'edit-mode' => 'singlepage'
)); 

?>



<!doctype html>
<html lang="en">
<?php perch_layout('cdr.head'); ?>
<?php perch_get_javascript(); ?>  
<?php perch_layout('regionedit.script'); ?>


<body>
	<header>
		<img src="img/logo_groen.png" alt="Logo Centrum de Rond">
	</header>
	<nav>
        <?php perch_pages_navigation(['levels'=>1]); ?>
	</nav>

	<section>
		<?php perch_content('Pagina Titel'); ?>
		<?php perch_content('Alinea');?>
		<?php perch_content('Workshop');?>
	</section>

	<?php perch_layout('cdr.footer'); ?>
</body>
</html>

<?php
	$presenter = new \IrishBusiness\Presenter\ZemPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<div class="pagination">
	<div class="pagination-buttons">
			<?php echo $presenter->render(); ?>
	</div>
	</div>
<?php endif; ?>
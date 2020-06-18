<?if ($products):?>
<?foreach ($products as $product):?>
	<h3><?=CHtml::link($product->title, array('product/view', 'slug' => $product->slug))?></h3>
	<?=$product->showImages(1, '', array('height' => 100, 'float' => 'left', 'title' => $product->pretitle.$product->title))?><br />

<?endforeach;?>
<?endif;?>
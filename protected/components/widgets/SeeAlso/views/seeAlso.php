<?foreach ($products as $product):?>
<h3><?=CHtml::link($product['title'], array('product/view', 'slug' => $product['slug']))?></h3>
<?endforeach;?>
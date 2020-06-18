<?/*
	$this->beginWidget('zii.widgets.CPortlet', array(
		'title'=>'',
	));
	$this->widget('zii.widgets.CMenu', array(
		'items' => $menuNodes,
		'htmlOptions' => array('class'=>'menu_list'),
		'encodeLabel' => FALSE
	));
	$this->endWidget();
*/?>

		<?php foreach ($menuNodes as $node):?>

		<?php endforeach; exit;?>

<!--
<div class="sidebar" id="sideLeft">
 <div id="menu-left">
  <div class="menu_block">
   <div class="menu_content">
	<ul class="menu_list">
		<li style="line-height:50%;">&nbsp;</li>
		<?foreach ($menuNodes as $node):?>
			<li>
				<?=CHtml::link($node->title,
					array('category/view', 'page_name' => $node->page_name),
					array('class' => 'menu_element level' . $node->level))?>
			</li>
		<?endforeach;?>
	</ul>
	<div id="memu-eft-img">
		<img src="/i/menuleft-bottom.jpg" width="207" height="31" alt="" />
	</div>
   </div>
  </div>
 </div>
</div>
-->
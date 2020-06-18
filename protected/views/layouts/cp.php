<?php $this->beginContent('//layouts/layout_cp'); ?>
<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Операции',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
			
		<?if ($this->id.'/'.$this->action->id == 'cp/products/tree'):?>	
			<div style="width:250px;">
				<?$this->widget('CTreeView', array(
					'animated' => 'fast',
					'url' => CHtml::normalizeUrl('/cp/categories/menu'),
					'unique' => FALSE,
					'persist' => 'location',
					'htmlOptions' => array('class' => 'treeview-famfamfam'))
				)?>
			</div>
		<?endif?>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>

<script type="text/javascript">
	var lastSelectedNode;
	function menuCategorySelect(el, id) {
		if (lastSelectedNode) {
			$(lastSelectedNode).css("font-weight", "inherit");
		}
		$(el).css("font-weight", "bold");
		jQuery.ajax({
			'url':'<?=CHtml::normalizeUrl('/cp/products/ofCategory/category_id/')?>'+id,
			'cache':true,
			'success':function(html) {
				jQuery("#forAjaxRefresh").html(html)
			}
		});
		lastSelectedNode = el;
	}

</script>
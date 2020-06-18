<?if ($news):?>
	<?foreach ($news as $n):?>
		<?$on = News::model()->findByPk($n['id'])?>
		<div>
			<a href="/news/view/id/<?=$on->id?>" >
				<b><?=$on->title?></b>
				<br />
				<?=$on->description?>
				<br />
				<?=$on->showImage(array('height' => 100))?>
			</a>
		</div>
	<?endforeach?>
<?endif?>

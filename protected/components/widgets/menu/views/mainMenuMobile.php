<div class="nav-container-mobile">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sf-menu-block">
                    <div id="menu-icon">Категории</div>
                    <?php $level = 0; $ul = 0; ?>
                    <?php foreach ($menuNodes as $node): ?>
                        <?php if ($node->level == $level): ?>
                                </li>
                        <?php elseif ($node->level > $level): ?>
                            <?php if(!$ul): ?>
                                <ul class="sf-menu-phone">
                                <?php $ul = 1; ?>
                            <?php else: ?>
                                <ul class="level<?=$level-1?>">
                            <?php endif; ?>
                        <?php else: ?>
                            </li>
                            <?php for ($i = $level - $node->level; $i; $i--): ?>
                                </ul>
                                </li>
                            <?php endfor; ?>
                        <?php endif; ?>

                        <li class="level<?=$level-1?> level-top <?php if($level == 0): echo 'parent'; endif;?>">
                        <a href="<?=Yii::app()->createUrl('/category/'.$node->page_name)?>" >
                            <span><?=$node->title?></span>
                        </a>
                        <?php $level = $node->level; ?>
                    <?php endforeach; ?>

                    <?php for ($i = $level; $i; $i--): ?>
                        </li>
                        <?php if($i == 1): ?>
                            <li class="level0 level-top">
                                <a href="<?=Yii::app()->createUrl('/collection/')?>">
                                    <span><?=Yii::t('basic', 'ready_projects');?></span>
                                </a>
                            </li>
                            <li class="level0 level-top parent">
                                <a href="<?=Yii::app()->createUrl('/site/about')?>">
                                    <span><?=Yii::t('basic', 'about_project');?></span>
                                </a>
                                <ul class="level1 level-top">
                                    <li>
                                        <a href="<?=Yii::app()->createUrl('/site/suppliers')?>">
                                        <span><?=Yii::t('basic', 'our_suppliers');?></span>
                                        </a>
                                    </li>
                                    <li class="level1 level-top">
                                        <a href="<?=Yii::app()->createUrl('/site/contact')?>">
                                        <span><?=Yii::t('basic', 'our_contacts');?></span>
                                        </a>
                                    </li>
                                    <li class="level1 level-top">
                                        <a href="<?=Yii::app()->createUrl('/site/rules')?>">
                                        <span><?=Yii::t('basic', 'rules_success_purchase');?></span>
                                        </a>
                                    </li>    
                                    <li class="level1 level-top">
                                        <a href="<?=Yii::app()->createUrl('/site/delivery')?>">
                                        <span><?=Yii::t('basic', 'delivery');?></span>
                                        </a>
                                    </li>                    
                                </ul>                
                            </li>            
                        <?php endif; ?>
                        </ul>
                    <?php endfor; ?>                    
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
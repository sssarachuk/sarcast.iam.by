<div class="nav-container">
    <div class="container">
    <div class="row">
    <div class="col-xs-12">
    <div class="nav">
    <?php $level = 0; $ul = 0; ?>
    <?php foreach ($menuNodes as $node): ?>
        <?php if ($node->level == $level): ?>
                </li>
        <?php elseif ($node->level > $level): ?>
            <?php if(!$ul): ?>
                <ul id="nav" class="grid-full">
                <?php $ul = 1; ?>
            <?php else: ?>
                <ul class="level">
            <?php endif; ?>
        <?php else: ?>
            </li>
            <?php for ($i = $level - $node->level; $i; $i--): ?>
                </ul>
                </li>
            <?php endfor; ?>
        <?php endif; ?>

                <li>
        <a href="<?=Yii::app()->createUrl('/category/'.$node->page_name)?>">
            <div class="thumbnail"></div>

            <span><?=$node->title?></span><span class="spanchildren"></span>
        </a>
        <?php $level = $node->level; ?>
    <?php endforeach; ?>
                    
    <?php for ($i = $level; $i; $i--): ?>
        </li>
        <?php if($i == 1): ?>
            <li>
                <a href="<?=Yii::app()->createUrl('/collection/')?>">
                    <div class="thumbnail"></div>
                    <span><?=Yii::t('basic', 'ready_projects');?></span><span class="spanchildren"></span>
                </a>
            </li>
            <li>
                <a href="<?=Yii::app()->createUrl('/site/about')?>">
                    <div class="thumbnail"></div>
                    <span><?=Yii::t('basic', 'about_project');?></span><span class="spanchildren"></span>
                </a>
                <ul class="level">
                    <li>
                        <a href="<?=Yii::app()->createUrl('/site/suppliers')?>">
                        <div class="thumbnail"></div>
                        <span><?=Yii::t('basic', 'our_suppliers');?></span><span class="spanchildren"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Yii::app()->createUrl('/site/contact')?>">
                        <div class="thumbnail"></div>
                        <span><?=Yii::t('basic', 'our_contacts');?></span><span class="spanchildren"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?=Yii::app()->createUrl('/site/rules')?>">
                        <div class="thumbnail"></div>
                        <span><?=Yii::t('basic', 'rules_success_purchase');?></span><span class="spanchildren"></span>
                        </a>
                    </li>    
                    <li>
                        <a href="<?=Yii::app()->createUrl('/site/delivery')?>">
                        <div class="thumbnail"></div>
                        <span><?=Yii::t('basic', 'delivery');?></span><span class="spanchildren"></span>
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
    </div>
</div> 
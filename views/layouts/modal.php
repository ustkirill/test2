<?php
use yii\helpers\Html;

?>
<?php $this->beginPage() ?>
<?php $this->head() ?>
<div class="modal-dialog">
    <?php $this->beginBody() ?>
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?= Html::encode($this->title) ?></h4>
        </div>
        <div class="modal-body">
            <?=$content;?>
        </div>
    </div>
    <?php $this->endBody() ?>
</div>
<?php $this->endPage() ?>
<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Format'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formats'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="formats form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($format); ?>
    <fieldset>
        <legend><?= __('Add Format') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('slug');
            echo $this->Form->input('movies._ids', ['options' => $movies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movie Ratings'), ['controller' => 'MovieRatings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Rating'), ['controller' => 'MovieRatings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="movies form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($movie); ?>
    <fieldset>
        <legend><?= __('Add Movie') ?></legend>
        <?php
            echo $this->Form->input('title');
            echo $this->Form->input('length');
            echo $this->Form->input('release_year');
            echo $this->Form->input('rating');
            echo $this->Form->input('formats._ids', ['options' => $formats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

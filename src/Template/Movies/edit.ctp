<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?></li>
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
        <legend><?= __('Edit Movie') ?></legend>
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

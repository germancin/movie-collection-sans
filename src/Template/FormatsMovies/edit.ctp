<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit Formats Movie'), ['action' => 'edit', $formatsMovie->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $formatsMovie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $formatsMovie->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New Formats Movie'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Formats Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="formatsMovies form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($formatsMovie); ?>
    <fieldset>
        <legend><?= __('Edit Formats Movie') ?></legend>
        <?php
            echo $this->Form->input('movie_id', ['options' => $movies]);
            echo $this->Form->input('format_id', ['options' => $formats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

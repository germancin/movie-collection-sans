<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('New Movie Rating'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movie Ratings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="movieRatings form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($movieRating); ?>
    <fieldset>
        <legend><?= __('Add Movie Rating') ?></legend>
        <?php
            echo $this->Form->input('movie_id', ['options' => $movies]);
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

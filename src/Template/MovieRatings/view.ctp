<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Movie Rating'), ['action' => 'edit', $movieRating->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie Rating'), ['action' => 'delete', $movieRating->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieRating->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Ratings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Rating'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="movieRatings view col-lg-10 col-md-9 columns">
    <h2><?= h($movieRating->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Movie') ?></h6>
                    <p><?= $movieRating->has('movie') ? $this->Html->link($movieRating->movie->title, ['controller' => 'Movies', 'action' => 'view', $movieRating->movie->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $movieRating->has('user') ? $this->Html->link($movieRating->user->name, ['controller' => 'Users', 'action' => 'view', $movieRating->user->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($movieRating->id) ?></p>
                    <h6 class="subheader"><?= __('Value') ?></h6>
                    <p><?= $this->Number->format($movieRating->value) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Formats Movie'), ['action' => 'edit', $formatsMovie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Formats Movie'), ['action' => 'delete', $formatsMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formatsMovie->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Formats Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Formats Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="formatsMovies view col-lg-10 col-md-9 columns">
    <h2><?= h($formatsMovie->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Movie') ?></h6>
                    <p><?= $formatsMovie->has('movie') ? $this->Html->link($formatsMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $formatsMovie->movie->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Format') ?></h6>
                    <p><?= $formatsMovie->has('format') ? $this->Html->link($formatsMovie->format->name, ['controller' => 'Formats', 'action' => 'view', $formatsMovie->format->id]) : '' ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($formatsMovie->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

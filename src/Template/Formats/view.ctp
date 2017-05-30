<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Format'), ['action' => 'edit', $format->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Format'), ['action' => 'delete', $format->id], ['confirm' => __('Are you sure you want to delete # {0}?', $format->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="formats view col-lg-10 col-md-9 columns">
    <h2><?= h($format->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($format->name) ?></p>
                    <h6 class="subheader"><?= __('Slug') ?></h6>
                    <p><?= h($format->slug) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($format->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Movies') ?></h4>
    <?php if (!empty($format->movies)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Length') ?></th>
                <th><?= __('Release Year') ?></th>
                <th><?= __('Rating') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($format->movies as $movies): ?>
            <tr>
                <td><?= h($movies->id) ?></td>
                <td><?= h($movies->title) ?></td>
                <td><?= h($movies->length) ?></td>
                <td><?= h($movies->release_year) ?></td>
                <td><?= h($movies->rating) ?></td>
                <td><?= h($movies->created) ?></td>
                <td><?= h($movies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Movies', 'action' => 'view', $movies->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Movies', 'action' => 'edit', $movies->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Movies', 'action' => 'delete', $movies->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movies->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>

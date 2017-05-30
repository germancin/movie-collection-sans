<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movie Ratings'), ['controller' => 'MovieRatings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Rating'), ['controller' => 'MovieRatings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="movies index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('length') ?></th>
                <th><?= $this->Paginator->sort('release_year') ?></th>
                <th><?= $this->Paginator->sort('rating') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?= $this->Number->format($movie->id) ?></td>
                <td><?= h($movie->title) ?></td>
                <td><?= h($movie->length) ?></td>
                    <td><?= $this->Number->format($movie->release_year) ?></td>
                    <td><?= $this->Number->format($movie->rating) ?></td>
                <td><?= h($movie->created) ?></td>
                <td><?= h($movie->modified) ?></td>
                    <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $movie->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $movie->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>

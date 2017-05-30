<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('New Formats Movie'), ['action' => 'add']) ?></li>
        <li class="active disabled"><?= $this->Html->link(__('List Formats Movies'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Movies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['controller' => 'Movies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="formatsMovies index col-lg-10 col-md-9 columns">
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('movie_id') ?></th>
                <th><?= $this->Paginator->sort('format_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($formatsMovies as $formatsMovie): ?>
            <tr>
                <td><?= $this->Number->format($formatsMovie->id) ?></td>
                <td>
                    <?= $formatsMovie->has('movie') ? $this->Html->link($formatsMovie->movie->title, ['controller' => 'Movies', 'action' => 'view', $formatsMovie->movie->id]) : '' ?>
                </td>
            <td>
                    <?= $formatsMovie->has('format') ? $this->Html->link($formatsMovie->format->name, ['controller' => 'Formats', 'action' => 'view', $formatsMovie->format->id]) : '' ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $formatsMovie->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $formatsMovie->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $formatsMovie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formatsMovie->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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

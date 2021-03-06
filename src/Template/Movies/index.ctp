<div class="movies index col-lg-10 col-md-9 columns topnav">
    <ul class="nav navbar-nav">
        <li class="active disabled"><?= $this->Html->link(__('List Movies') . ' | ', ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Movie') . ' | ', ['action' => 'add']) ?></li>
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
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?= $this->Number->format($movie->id) ?></td>
                <td><?= h($movie->title) ?></td>
                <td><?= date_format($movie->length,'H:i:s'); ?></td>
                    <td><?= $movie->release_year ?></td>
                    <td><?= $movie->rating ?></td>
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

<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Movie'), ['action' => 'edit', $movie->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movie'), ['action' => 'delete', $movie->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Movies'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Ratings'), ['controller' => 'MovieRatings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Rating'), ['controller' => 'MovieRatings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="movies view col-lg-10 col-md-9 columns">
    <h2><?= h($movie->title) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Title') ?></h6>
                    <p><?= h($movie->title) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($movie->id) ?></p>
                    <h6 class="subheader"><?= __('Release Year') ?></h6>
                    <p><?= $this->Number->format($movie->release_year) ?></p>
                    <h6 class="subheader"><?= __('Rating') ?></h6>
                    <p><?= $this->Number->format($movie->rating) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Length') ?></h6>
                    <p><?= h($movie->length) ?></p>
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($movie->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($movie->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related MovieRatings') ?></h4>
    <?php if (!empty($movie->movie_ratings)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Movie Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movie->movie_ratings as $movieRatings): ?>
            <tr>
                <td><?= h($movieRatings->id) ?></td>
                <td><?= h($movieRatings->movie_id) ?></td>
                <td><?= h($movieRatings->user_id) ?></td>
                <td><?= h($movieRatings->value) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'MovieRatings', 'action' => 'view', $movieRatings->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'MovieRatings', 'action' => 'edit', $movieRatings->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'MovieRatings', 'action' => 'delete', $movieRatings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movieRatings->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related Formats') ?></h4>
    <?php if (!empty($movie->formats)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Slug') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movie->formats as $formats): ?>
            <tr>
                <td><?= h($formats->id) ?></td>
                <td><?= h($formats->name) ?></td>
                <td><?= h($formats->slug) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Formats', 'action' => 'view', $formats->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Formats', 'action' => 'edit', $formats->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Formats', 'action' => 'delete', $formats->id], ['confirm' => __('Are you sure you want to delete # {0}?', $formats->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>

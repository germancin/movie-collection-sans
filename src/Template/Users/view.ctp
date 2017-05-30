<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Movie Ratings'), ['controller' => 'MovieRatings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movie Rating'), ['controller' => 'MovieRatings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Roles'), ['controller' => 'UserRoles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Role'), ['controller' => 'UserRoles', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="users view col-lg-10 col-md-9 columns">
    <h2><?= h($user->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Username') ?></h6>
                    <p><?= h($user->username) ?></p>
                    <h6 class="subheader"><?= __('Facebookid') ?></h6>
                    <p><?= h($user->facebookid) ?></p>
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($user->name) ?></p>
                    <h6 class="subheader"><?= __('Lastname') ?></h6>
                    <p><?= h($user->lastname) ?></p>
                    <h6 class="subheader"><?= __('Email') ?></h6>
                    <p><?= h($user->email) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($user->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Created') ?></h6>
                    <p><?= h($user->created) ?></p>
                    <h6 class="subheader"><?= __('Modified') ?></h6>
                    <p><?= h($user->modified) ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Password') ?></h6>
                    <?= $this->Text->autoParagraph(h($user->password)); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related MovieRatings') ?></h4>
    <?php if (!empty($user->movie_ratings)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Movie Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->movie_ratings as $movieRatings): ?>
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
    <h4 class="subheader"><?= __('Related UserRoles') ?></h4>
    <?php if (!empty($user->user_roles)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Role') ?></th>
                <th><?= __('Slug') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_roles as $userRoles): ?>
            <tr>
                <td><?= h($userRoles->id) ?></td>
                <td><?= h($userRoles->user_id) ?></td>
                <td><?= h($userRoles->role) ?></td>
                <td><?= h($userRoles->slug) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'UserRoles', 'action' => 'view', $userRoles->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'UserRoles', 'action' => 'edit', $userRoles->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'UserRoles', 'action' => 'delete', $userRoles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRoles->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>

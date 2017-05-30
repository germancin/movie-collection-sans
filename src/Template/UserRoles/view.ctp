<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit User Role'), ['action' => 'edit', $userRole->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Role'), ['action' => 'delete', $userRole->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userRole->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List User Roles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Role'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userRoles view col-lg-10 col-md-9 columns">
    <h2><?= h($userRole->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $userRole->has('user') ? $this->Html->link($userRole->user->name, ['controller' => 'Users', 'action' => 'view', $userRole->user->id]) : '' ?></p>
                    <h6 class="subheader"><?= __('Role') ?></h6>
                    <p><?= h($userRole->role) ?></p>
                    <h6 class="subheader"><?= __('Slug') ?></h6>
                    <p><?= h($userRole->slug) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($userRole->id) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

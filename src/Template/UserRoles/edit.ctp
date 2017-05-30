<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li class="active disabled"><?= $this->Html->link(__('Edit User Role'), ['action' => 'edit', $userRole->id]) ?> </li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userRole->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userRole->id), 'class' => 'btn-danger']
            )
        ?></li>
        <li><?= $this->Html->link(__('New User Role'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Roles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userRoles form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($userRole); ?>
    <fieldset>
        <legend><?= __('Edit User Role') ?></legend>
        <?php
            echo $this->Form->input('user_id', ['options' => $users]);
            echo $this->Form->input('role');
            echo $this->Form->input('slug');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

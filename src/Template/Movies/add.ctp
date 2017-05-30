<div class="movies form col-lg-10 col-md-9 columns topnav">
    <ul class="nav navbar-nav">
        <li class="active disabled"><?= $this->Html->link(__('New Movie') . ' | ', ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Movies') . ' | ', ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="movies form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($movie); ?>
    <fieldset>
        <legend><?= __('Add Movie') ?></legend>
        <?php
            echo $this->Form->input('title');
        ?>
        <label><strong>Length*</strong></label>
        
        <div class="panel panel-default">
            <table class="table">
                <tr>
                    <td>
                        <?php $optionsH = range(1, 10); ?>
                        <?php echo $this->Form->input('hours', array('type' => 'select', 'name'=>'length[hour]', 'options' => array_combine($optionsH, $optionsH))); ?>
                        <?php echo $this->Form->error('length'); ?>
                    </td>
                    <td><?php echo $this->Form->input('minutes', array('type' => 'select', 'name'=>'length[minute]', 'options' => range(0, 59)));?></td>
                    <td><?php echo $this->Form->input('seconds', array('type' => 'select', 'name'=>'length[second]', 'options' => range(0, 59)));?></td>
                </tr>
            </table>
        </div>
        <?php
            echo $this->Form->input('release_year');
            echo $this->Form->input('formats._ids', ['options' => $formats]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
    <?= $this->Form->end() ?>
</div>

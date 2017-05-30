<div class="movies form col-lg-10 col-md-9 columns topnav">
        <a class="active disabled" ><?=__('List Movies')?></a>
        <?= $this->Html->link(__('List Movies') . ' | ', ['action' => 'index']) ?>
        <?= $this->Html->link(__('New Movie') . ' | ', ['action' => 'add']) ?>
        <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $movie->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $movie->id), 'class' => 'btn btn-danger']
            )
        ?>
</div>
<div class="movies form col-lg-10 col-md-9 columns">
    <?= $this->Form->create($movie); ?>
    <fieldset>
        <legend><?= __('Edit Movie') ?></legend>
        <?php
            echo $this->Form->input('title');
        ?>
        <label><strong>Length*</strong></label>
        
        <div class="panel panel-default">
            <table class="table">
                <tr>
                    <td>
                        <?php $optionsH = range(1, 10); ?>
                        <?php echo $this->Form->input('hours', ['type' => 'select', 
                                                      'name'=>'length[hour]',
                                                      'options' => array_combine($optionsH, $optionsH),
                                                      'default' => [$length['hrs']]
                                                      ]); 
                        ?>
                        <?php echo $this->Form->error('length'); ?>
                    </td>
                    <td><?php echo $this->Form->input('minutes', ['type' => 'select',
                                                      'name'=>'length[minute]',
                                                      'options' => range(0, 59),
                                                      'default' => [$length['min']]
                                                      ]);
                        ?>
                    </td>
                    <td><?php echo $this->Form->input('seconds', ['type' => 'select',
                                                      'name'=>'length[second]',
                                                      'options' => range(0, 59),
                                                      'default' => [$length['segs']]
                                                      ]);
                        ?>
                    </td>
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

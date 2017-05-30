
<div class = "container">
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">

        		
                <?= $this->Form->create('users', ['url' => ['action' => 'login'],
                                                'class'=>'form-signin'] ); ?>
                    <fieldset>
                        <legend><?= __('Login') ?></legend>
                    <?php
                        echo $this->Form->input('email', ['placeholder' => 'E-mail']);
                        echo $this->Form->input('password', ['placeholder' => 'Password']);
                    ?>
                    </fieldset>
                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary btn-lg btn-block']) ?>
                    <a href="/users/add">Signup</a>
                <?= $this->Form->end() ?>
        		
        		
        		
            </div>
            <div class="col-sm"></div>
        </div>  
</div>

<?php echo $this->Facebook->initJsSDK(); ?>
<div class = "container">
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <form name="Login_Form" class="form-signin">       
        		    <h3 class="form-signin-heading">Facebook Login</h3>
        			  <hr class="colorgraph"><br>
        			  <!--<a href="<?php  echo htmlspecialchars($loginUrl)?>" class="btn btn-primary btn-lg btn-block" >-->
        			  <!--    Login with Facebok-->
        			  <!--</a>-->
        			  <?php echo $this->Facebook->loginLink($options = [
													  'id'=>'face', 
													  'title'=>'Realizar Encuesta', 
													  'label'=>'<div> 
													  			  <img src="/img/facebook-login.png" width="100%">	
													  			</div>',
													  

													  ]); ?>
        		</form>	
            </div>
            <div class="col-sm"></div>
        </div>  
</div>

<hr/>
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

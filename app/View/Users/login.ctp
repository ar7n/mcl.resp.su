<div class="users login">
    <h2>Вход</h2>
    <div class="form-wrap">
        <div class="intro">Вы можете зайти, используя свой акаунт на resp.su</div>
        <div class="login-form">
            <?php echo $this->Form->create('User'); ?>
                <? echo $this->Form->input('email', array('label' => 'Электронная почта'));?>
                <? echo $this->Form->input('password',  array('label' => 'Пароль'));?>
                <div class="form-row clearfix">
                    <div class="form-col1"></div>
                    <div class="form-col2">
                        <a href="http://resp.su/users/forgot">Забыли пароль?</a>
                    </div>
                </div>
                <div class="form-row clearfix">
                    <div class="form-col1"></div>
                    <div class="form-col2">
                        <? echo $this->Session->flash('auth'); ?>
                    </div>
                </div>
                <div class="form-row clearfix">
                    <div class="form-col1"><a href="/registration">Регистрация</a></div>
                    <div class="form-col2">
                        <?php echo $this->Form->input('Войти', array('type' => 'submit', 'label' => false)); ?>
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
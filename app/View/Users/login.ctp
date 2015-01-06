<div class="users login">
    <h2>Вход</h2>
    <div class="form-wrap">
        <div class="login-form">
            <?php echo $this->Form->create('User'); ?>
                <? echo $this->Form->input('email', array('label' => 'Электронная почта'));?>
                <? echo $this->Form->input('password',  array('label' => 'Пароль'));?>
                <div class="form-row clearfix">
                    <div class="form-col1"></div>
                    <div class="form-col2">
                        <a href="/">Забыли пароль?</a>
                    </div>
                </div>
                <div class="form-row clearfix">
                    <div class="form-col1"></div>
                    <div class="form-col2">
                        <? echo $this->Session->flash('auth'); ?>
                    </div>
                </div>
                <div class="form-row clearfix">
                    <div class="form-col1"><a href="/">Регистрация</a></div>
                    <div class="form-col2">
                        <?php echo $this->Form->input('Войти', array('type' => 'submit', 'label' => false)); ?>
                    </div>
                </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
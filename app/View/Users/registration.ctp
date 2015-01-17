<div class="users registration">
    <h2>Регистрация</h2>
    <div class="form-wrap">
        <div class="login-form">
            <?php echo $this->Form->create('User'); ?>
            <?
            echo $this->Form->input('surname', array('label' => 'Фамилия', 'autofocus' => 'autofocus'));
            echo $this->Form->input('name', array('label' => 'Имя'));
            echo $this->Form->input('fathername', array('label' => 'Отчество'));
            $attributes = array(
                'minYear' => date('Y') - 70,
                'maxYear' => date('Y') - 10,
                'empty' => true,
                'dateFormat'=>'DMY',
                'label' => 'День рождения'
            );
            echo $this->Form->input('birthday',$attributes);

            echo $this->Form->input('sex',array(
                'type'=>'select',
                'options'=>array(""=>"не выбран","male"=>"Мужской","female"=>"Женский"),
                'label' => 'Пол',
                'style' => 'width:230px',
                'empty' => false,
            ));
            echo $this->Form->input('nick', array('label' => 'Ник', 'autofocus' => 'autofocus'));
            echo $this->Form->input('email', array('label' => 'E-mail'));
            echo $this->Form->input('password', array('type' => 'password', 'label' => 'Пароль', 'value' => ''));
            echo $this->Form->input('repeat_password', array('type' => 'password', 'label' => 'Повторите пароль', 'value' => ''));
            echo $this->Form->input('AvatarFile.file', array('type' => 'file', 'label' => 'Аватар'));
            echo $this->Form->hidden('AvatarFile.id', array('value' => '0'));
            echo $this->Form->input('geo_country_id',array(
                'type'=>'select',
                'label' => 'Страна',
                'empty' => true,
            ));
            echo $this->Form->input('phone', array('label' => 'Телефонный номер'));

            ?>
            <div class="form-row clearfix">
                <div class="form-col1"></div>
                <div class="form-col2">
                    <? echo $this->Session->flash('auth'); ?>
                </div>
            </div>
            <div class="form-row clearfix">
                <div class="form-col1"></div>
                <div class="form-col2">
                    <?php echo $this->Form->input('Продолжить', array('type' => 'submit', 'label' => false)); ?>
                </div>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
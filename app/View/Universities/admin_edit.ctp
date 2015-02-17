<div class="universities form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo 'Редактирование университета'; ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Действия</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Удалить'), array('action' => 'delete', $this->Form->value('University.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('University.id'))); ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('University', array('role' => 'form', 'type' => 'file')); ?>

			<div class="form-group">
				<?php echo $this->Form->input('id', array('class' => 'form-control', 'label' => 'Id'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('title', array('class' => 'form-control', 'label' => 'Название'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('logo', array('class' => 'form-control', 'type' => 'file', 'label' => 'Логотип'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('small_logo', array('class' => 'form-control', 'type' => 'file', 'label' => 'Иконка'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('division', array('class' => 'form-control', 'label' => 'Дивизион'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('city_id', array('class' => 'form-control', 'label' => 'Город'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('managers', array('class' => 'form-control', 'label' => 'Управляющие'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('team_dota2', array('class' => 'form-control', 'label' => 'Команда Dota 2'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('team_csgo', array('class' => 'form-control', 'label' => 'Команда CS:GO'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('team_fifa14', array('class' => 'form-control', 'label' => 'Команда Fifa 15'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->submit(__('Сохранить'), array('class' => 'btn btn-default')); ?>
			</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

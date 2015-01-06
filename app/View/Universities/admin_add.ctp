<div class="universities form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add University'); ?></h1>
			</div>
		</div>
	</div>



	<div class="row">
		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Universities'), array('action' => 'index'), array('escape' => false)); ?></li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New City'), array('action' => 'add'), array('escape' => false)); ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('University', array('role' => 'form', 'type' => 'file')); ?>

			<div class="form-group">
				<?php echo $this->Form->input('title', array('class' => 'form-control', 'placeholder' => 'Title'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('logo', array('type' => 'file', 'class' => 'form-control', 'placeholder' => 'Logo'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('division', array('class' => 'form-control', 'placeholder' => 'Division'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('city_id', array('class' => 'form-control', 'placeholder' => 'City Id'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('managers', array('class' => 'form-control', 'placeholder' => 'Managers'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('team_dota2', array('class' => 'form-control', 'placeholder' => 'Team dota 2'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('team_csgo', array('class' => 'form-control', 'placeholder' => 'Team cs:go'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->input('team_fifa14', array('class' => 'form-control', 'placeholder' => 'Team fifa 14'));?>
			</div>
			<div class="form-group">
				<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
			</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

<div class="parties form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Add Party'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Parties'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Tournaments'), array('controller' => 'tournaments', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Tournament'), array('controller' => 'tournaments', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Universities'), array('controller' => 'universities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New University'), array('controller' => 'universities', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Slots'), array('controller' => 'slots', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Slot'), array('controller' => 'slots', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Party', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('tournament_id', array('class' => 'form-control', 'placeholder' => 'Tournament Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('user_id', array('class' => 'form-control', 'placeholder' => 'User Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('clan_id', array('class' => 'form-control', 'placeholder' => 'Clan Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('university_id', array('class' => 'form-control', 'placeholder' => 'University Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('approved', array('class' => 'form-control', 'placeholder' => 'Approved'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('approved_time', array('class' => 'form-control', 'placeholder' => 'Approved Time'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('eliminated', array('class' => 'form-control', 'placeholder' => 'Eliminated'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Name'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('group', array('class' => 'form-control', 'placeholder' => 'Group'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('basket', array('class' => 'form-control', 'placeholder' => 'Basket'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('points', array('class' => 'form-control', 'placeholder' => 'Points'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('place', array('class' => 'form-control', 'placeholder' => 'Place'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('scores', array('class' => 'form-control', 'placeholder' => 'Scores'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('rating', array('class' => 'form-control', 'placeholder' => 'Rating'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('statistics', array('class' => 'form-control', 'placeholder' => 'Statistics'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('users_party_count', array('class' => 'form-control', 'placeholder' => 'Users Party Count'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('deleted', array('class' => 'form-control', 'placeholder' => 'Deleted'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('deleted_date', array('class' => 'form-control', 'placeholder' => 'Deleted Date'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('country_id', array('class' => 'form-control', 'placeholder' => 'Country Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('geo_country_id', array('class' => 'form-control', 'placeholder' => 'Geo Country Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('mcl_university', array('class' => 'form-control', 'placeholder' => 'Mcl University'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('User', array('class' => 'form-control', 'placeholder' => 'Mcl University'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>

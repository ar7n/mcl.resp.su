<div class="universities view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('University'); ?></h1>
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
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit University'), array('action' => 'edit', $university['University']['id']), array('escape' => false)); ?> </li>
							<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete University'), array('action' => 'delete', $university['University']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $university['University']['id'])); ?> </li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New University'), array('action' => 'add'), array('escape' => false)); ?> </li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New City'), array('controller' => 'cities', 'action' => 'add'), array('escape' => false)); ?> </li>
						</ul>
					</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
					<th><?php echo __('Id'); ?></th>
					<td>
						<?php echo h($university['University']['id']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('Title'); ?></th>
					<td>
						<?php echo h($university['University']['title']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('Logo'); ?></th>
					<td>
						<?php echo h($university['University']['logo']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('Division'); ?></th>
					<td>
						<?php echo h($university['University']['division']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('City'); ?></th>
					<td>
						<?php echo $this->Html->link($university['City']['title'], array('controller' => 'cities', 'action' => 'view', $university['City']['id'])); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('Managers'); ?></th>
					<td>
						<?php echo h($university['University']['managers']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('Team Dota2'); ?></th>
					<td>
						<?php echo h($university['University']['team_dota2']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('Team Csgo'); ?></th>
					<td>
						<?php echo h($university['University']['team_csgo']); ?>
						&nbsp;
					</td>
				</tr>
				<tr>
					<th><?php echo __('Team Fifa14'); ?></th>
					<td>
						<?php echo h($university['University']['team_fifa14']); ?>
						&nbsp;
					</td>
				</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>


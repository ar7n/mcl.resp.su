<div class="posts form">
<?php echo $this->Form->create('Post'); ?>
	<fieldset>
		<legend><?php echo __('Add Post'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('hub_id');
		echo $this->Form->input('title');
		echo $this->Form->input('text');
		echo $this->Form->input('to_main');
		echo $this->Form->input('approved_to_main');
		echo $this->Form->input('deleted');
		echo $this->Form->input('deleted_date');
		echo $this->Form->input('show_first_pic');
		echo $this->Form->input('show_bottom_pics');
		echo $this->Form->input('picked_up');
		echo $this->Form->input('picked_up_priority');
		echo $this->Form->input('rubric');
		echo $this->Form->input('shared');
		echo $this->Form->input('comments_disallow');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hubs'), array('controller' => 'hubs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hub'), array('controller' => 'hubs', 'action' => 'add')); ?> </li>
	</ul>
</div>

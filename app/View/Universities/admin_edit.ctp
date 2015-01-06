<div class="mclUniversities form">
<?php echo $this->Form->create('MclUniversity'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Mcl University'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('logo');
		echo $this->Form->input('division');
		echo $this->Form->input('city_id');
		echo $this->Form->input('managers');
		echo $this->Form->input('team-dota-2');
		echo $this->Form->input('team-cs-go');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MclUniversity.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('MclUniversity.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mcl Universities'), array('action' => 'index')); ?></li>
	</ul>
</div>

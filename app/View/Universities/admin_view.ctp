<div class="mclUniversities view">
<h2><?php echo __('Mcl University'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Logo'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['logo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['division']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City Id'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['city_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Managers'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['managers']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team-dota-2'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['team-dota-2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team-cs-go'); ?></dt>
		<dd>
			<?php echo h($mclUniversity['MclUniversity']['team-cs-go']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mcl University'), array('action' => 'edit', $mclUniversity['MclUniversity']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mcl University'), array('action' => 'delete', $mclUniversity['MclUniversity']['id']), array(), __('Are you sure you want to delete # %s?', $mclUniversity['MclUniversity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mcl Universities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mcl University'), array('action' => 'add')); ?> </li>
	</ul>
</div>

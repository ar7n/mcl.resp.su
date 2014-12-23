<div class="posts index">
	<h2><?php echo __('Posts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hub_id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('text'); ?></th>
			<th><?php echo $this->Paginator->sort('to_main'); ?></th>
			<th><?php echo $this->Paginator->sort('approved_to_main'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted'); ?></th>
			<th><?php echo $this->Paginator->sort('deleted_date'); ?></th>
			<th><?php echo $this->Paginator->sort('show_first_pic'); ?></th>
			<th><?php echo $this->Paginator->sort('show_bottom_pics'); ?></th>
			<th><?php echo $this->Paginator->sort('picked_up'); ?></th>
			<th><?php echo $this->Paginator->sort('picked_up_priority'); ?></th>
			<th><?php echo $this->Paginator->sort('rubric'); ?></th>
			<th><?php echo $this->Paginator->sort('shared'); ?></th>
			<th><?php echo $this->Paginator->sort('comments_disallow'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($posts as $post): ?>
	<tr>
		<td><?php echo h($post['Post']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($post['Hub']['title'], array('controller' => 'hubs', 'action' => 'view', $post['Hub']['id'])); ?>
		</td>
		<td><?php echo h($post['Post']['title']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['text']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['to_main']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['approved_to_main']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['created']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['modified']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['deleted']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['deleted_date']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['show_first_pic']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['show_bottom_pics']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['picked_up']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['picked_up_priority']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['rubric']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['shared']); ?>&nbsp;</td>
		<td><?php echo h($post['Post']['comments_disallow']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $post['Post']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $post['Post']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hubs'), array('controller' => 'hubs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hub'), array('controller' => 'hubs', 'action' => 'add')); ?> </li>
	</ul>
</div>

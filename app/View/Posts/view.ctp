<div class="posts view">
<h2><?php echo __('Post'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($post['Post']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['User']['name'], array('controller' => 'users', 'action' => 'view', $post['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hub'); ?></dt>
		<dd>
			<?php echo $this->Html->link($post['Hub']['title'], array('controller' => 'hubs', 'action' => 'view', $post['Hub']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($post['Post']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Text'); ?></dt>
		<dd>
			<?php echo h($post['Post']['text']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('To Main'); ?></dt>
		<dd>
			<?php echo h($post['Post']['to_main']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Approved To Main'); ?></dt>
		<dd>
			<?php echo h($post['Post']['approved_to_main']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($post['Post']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($post['Post']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted'); ?></dt>
		<dd>
			<?php echo h($post['Post']['deleted']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Deleted Date'); ?></dt>
		<dd>
			<?php echo h($post['Post']['deleted_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Show First Pic'); ?></dt>
		<dd>
			<?php echo h($post['Post']['show_first_pic']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Show Bottom Pics'); ?></dt>
		<dd>
			<?php echo h($post['Post']['show_bottom_pics']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picked Up'); ?></dt>
		<dd>
			<?php echo h($post['Post']['picked_up']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Picked Up Priority'); ?></dt>
		<dd>
			<?php echo h($post['Post']['picked_up_priority']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rubric'); ?></dt>
		<dd>
			<?php echo h($post['Post']['rubric']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shared'); ?></dt>
		<dd>
			<?php echo h($post['Post']['shared']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comments Disallow'); ?></dt>
		<dd>
			<?php echo h($post['Post']['comments_disallow']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Post'), array('action' => 'edit', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Post'), array('action' => 'delete', $post['Post']['id']), array(), __('Are you sure you want to delete # %s?', $post['Post']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Posts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Post'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hubs'), array('controller' => 'hubs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hub'), array('controller' => 'hubs', 'action' => 'add')); ?> </li>
	</ul>
</div>

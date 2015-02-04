<div class="parties view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Party'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Party'), array('action' => 'edit', $party['Party']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Party'), array('action' => 'delete', $party['Party']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $party['Party']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Parties'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Party'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tournaments'), array('controller' => 'tournaments', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tournament'), array('controller' => 'tournaments', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Universities'), array('controller' => 'universities', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New University'), array('controller' => 'universities', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Slots'), array('controller' => 'slots', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Slot'), array('controller' => 'slots', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($party['Party']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Tournament'); ?></th>
		<td>
			<?php echo $this->Html->link($party['Tournament']['title'], array('controller' => 'tournaments', 'action' => 'view', $party['Tournament']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($party['User']['nick'], array('controller' => 'users', 'action' => 'view', $party['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Clan Id'); ?></th>
		<td>
			<?php echo h($party['Party']['clan_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('University Id'); ?></th>
		<td>
			<?php echo h($party['Party']['university_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Approved'); ?></th>
		<td>
			<?php echo h($party['Party']['approved']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Approved Time'); ?></th>
		<td>
			<?php echo h($party['Party']['approved_time']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Eliminated'); ?></th>
		<td>
			<?php echo h($party['Party']['eliminated']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($party['Party']['name']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Group'); ?></th>
		<td>
			<?php echo h($party['Party']['group']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Basket'); ?></th>
		<td>
			<?php echo h($party['Party']['basket']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Points'); ?></th>
		<td>
			<?php echo h($party['Party']['points']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Place'); ?></th>
		<td>
			<?php echo h($party['Party']['place']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Scores'); ?></th>
		<td>
			<?php echo h($party['Party']['scores']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rating'); ?></th>
		<td>
			<?php echo h($party['Party']['rating']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Statistics'); ?></th>
		<td>
			<?php echo h($party['Party']['statistics']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Users Party Count'); ?></th>
		<td>
			<?php echo h($party['Party']['users_party_count']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($party['Party']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($party['Party']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Deleted'); ?></th>
		<td>
			<?php echo h($party['Party']['deleted']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Deleted Date'); ?></th>
		<td>
			<?php echo h($party['Party']['deleted_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Country Id'); ?></th>
		<td>
			<?php echo h($party['Party']['country_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Geo Country Id'); ?></th>
		<td>
			<?php echo h($party['Party']['geo_country_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Mcl University'); ?></th>
		<td>
			<?php echo h($party['Party']['mcl_university']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Slots'); ?></h3>
	<?php if (!empty($party['Slot'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Party Id'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Games'); ?></th>
		<th><?php echo __('Scores'); ?></th>
		<th><?php echo __('Results Entered'); ?></th>
		<th><?php echo __('Winner'); ?></th>
		<th><?php echo __('Disqualified'); ?></th>
		<th><?php echo __('Free'); ?></th>
		<th><?php echo __('Statistics'); ?></th>
		<th><?php echo __('Seed'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('Grid Position'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($party['Slot'] as $slot): ?>
		<tr>
			<td><?php echo $slot['id']; ?></td>
			<td><?php echo $slot['match_id']; ?></td>
			<td><?php echo $slot['party_id']; ?></td>
			<td><?php echo $slot['place']; ?></td>
			<td><?php echo $slot['rating']; ?></td>
			<td><?php echo $slot['games']; ?></td>
			<td><?php echo $slot['scores']; ?></td>
			<td><?php echo $slot['results_entered']; ?></td>
			<td><?php echo $slot['winner']; ?></td>
			<td><?php echo $slot['disqualified']; ?></td>
			<td><?php echo $slot['free']; ?></td>
			<td><?php echo $slot['statistics']; ?></td>
			<td><?php echo $slot['seed']; ?></td>
			<td><?php echo $slot['position']; ?></td>
			<td><?php echo $slot['grid_position']; ?></td>
			<td><?php echo $slot['created']; ?></td>
			<td><?php echo $slot['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'slots', 'action' => 'view', $slot['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'slots', 'action' => 'edit', $slot['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'slots', 'action' => 'delete', $slot['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $slot['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Slot'), array('controller' => 'slots', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($party['User'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Geo Country Id'); ?></th>
		<th><?php echo __('Geo Area Id'); ?></th>
		<th><?php echo __('Geo City Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Clan Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Surname'); ?></th>
		<th><?php echo __('Fathername'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Nick'); ?></th>
		<th><?php echo __('Clan Tag'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Congratulation'); ?></th>
		<th><?php echo __('Last Visit'); ?></th>
		<th><?php echo __('Last Ip'); ?></th>
		<th><?php echo __('Online'); ?></th>
		<th><?php echo __('Player'); ?></th>
		<th><?php echo __('Judge'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Avatar Id'); ?></th>
		<th><?php echo __('Photo Id'); ?></th>
		<th><?php echo __('School Id'); ?></th>
		<th><?php echo __('School Role'); ?></th>
		<th><?php echo __('Skype'); ?></th>
		<th><?php echo __('Icq'); ?></th>
		<th><?php echo __('Phone'); ?></th>
		<th><?php echo __('Allow Messages'); ?></th>
		<th><?php echo __('Allow New Message Emails'); ?></th>
		<th><?php echo __('Allow Newsletters'); ?></th>
		<th><?php echo __('Allow Friends'); ?></th>
		<th><?php echo __('Allow Teams'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Visability Fields'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Self Registered'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Blocked'); ?></th>
		<th><?php echo __('Fcs Member'); ?></th>
		<th><?php echo __('Card Number'); ?></th>
		<th><?php echo __('Activation Code'); ?></th>
		<th><?php echo __('Activation Code Date'); ?></th>
		<th><?php echo __('Activation Date'); ?></th>
		<th><?php echo __('Activation Function'); ?></th>
		<th><?php echo __('Activation New Mail'); ?></th>
		<th><?php echo __('Last Email Sent'); ?></th>
		<th><?php echo __('Avatar Small'); ?></th>
		<th><?php echo __('Avatar Medium'); ?></th>
		<th><?php echo __('Avatar Big'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Forum Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Deleted Date'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Last Attempt Time'); ?></th>
		<th><?php echo __('Blocked Until Time'); ?></th>
		<th><?php echo __('Remain Attempts'); ?></th>
		<th><?php echo __('Addination Contacts'); ?></th>
		<th><?php echo __('Old Nick'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($party['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['geo_country_id']; ?></td>
			<td><?php echo $user['geo_area_id']; ?></td>
			<td><?php echo $user['geo_city_id']; ?></td>
			<td><?php echo $user['location_id']; ?></td>
			<td><?php echo $user['country_id']; ?></td>
			<td><?php echo $user['clan_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td><?php echo $user['surname']; ?></td>
			<td><?php echo $user['fathername']; ?></td>
			<td><?php echo $user['sex']; ?></td>
			<td><?php echo $user['nick']; ?></td>
			<td><?php echo $user['clan_tag']; ?></td>
			<td><?php echo $user['birthday']; ?></td>
			<td><?php echo $user['congratulation']; ?></td>
			<td><?php echo $user['last_visit']; ?></td>
			<td><?php echo $user['last_ip']; ?></td>
			<td><?php echo $user['online']; ?></td>
			<td><?php echo $user['player']; ?></td>
			<td><?php echo $user['judge']; ?></td>
			<td><?php echo $user['email']; ?></td>
			<td><?php echo $user['avatar_id']; ?></td>
			<td><?php echo $user['photo_id']; ?></td>
			<td><?php echo $user['school_id']; ?></td>
			<td><?php echo $user['school_role']; ?></td>
			<td><?php echo $user['skype']; ?></td>
			<td><?php echo $user['icq']; ?></td>
			<td><?php echo $user['phone']; ?></td>
			<td><?php echo $user['allow_messages']; ?></td>
			<td><?php echo $user['allow_new_message_emails']; ?></td>
			<td><?php echo $user['allow_newsletters']; ?></td>
			<td><?php echo $user['allow_friends']; ?></td>
			<td><?php echo $user['allow_teams']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['visability_fields']; ?></td>
			<td><?php echo $user['rating']; ?></td>
			<td><?php echo $user['self_registered']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['blocked']; ?></td>
			<td><?php echo $user['fcs_member']; ?></td>
			<td><?php echo $user['card_number']; ?></td>
			<td><?php echo $user['activation_code']; ?></td>
			<td><?php echo $user['activation_code_date']; ?></td>
			<td><?php echo $user['activation_date']; ?></td>
			<td><?php echo $user['activation_function']; ?></td>
			<td><?php echo $user['activation_new_mail']; ?></td>
			<td><?php echo $user['last_email_sent']; ?></td>
			<td><?php echo $user['avatar_small']; ?></td>
			<td><?php echo $user['avatar_medium']; ?></td>
			<td><?php echo $user['avatar_big']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['forum_status']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['modified']; ?></td>
			<td><?php echo $user['deleted']; ?></td>
			<td><?php echo $user['deleted_date']; ?></td>
			<td><?php echo $user['slug']; ?></td>
			<td><?php echo $user['last_attempt_time']; ?></td>
			<td><?php echo $user['blocked_until_time']; ?></td>
			<td><?php echo $user['remain_attempts']; ?></td>
			<td><?php echo $user['addination_contacts']; ?></td>
			<td><?php echo $user['old_nick']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'users', 'action' => 'view', $user['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>

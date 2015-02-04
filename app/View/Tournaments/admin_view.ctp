<div class="tournaments view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Tournament'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Tournament'), array('action' => 'edit', $tournament['Tournament']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Tournament'), array('action' => 'delete', $tournament['Tournament']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $tournament['Tournament']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Tournaments'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Tournament'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New User'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Competitions'), array('controller' => 'competitions', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Competition'), array('controller' => 'competitions', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Matches'), array('controller' => 'matches', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Match'), array('controller' => 'matches', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Parties'), array('controller' => 'parties', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Party'), array('controller' => 'parties', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Hubs Tournaments'), array('controller' => 'hubs_tournaments', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Hubs Tournament'), array('controller' => 'hubs_tournaments', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Hubs'), array('controller' => 'hubs', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Hub'), array('controller' => 'hubs', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($tournament['Tournament']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Title'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['title']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Description'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['description']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Online'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['online']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rating'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['rating']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rank'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['rank']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('User'); ?></th>
		<td>
			<?php echo $this->Html->link($tournament['User']['nick'], array('controller' => 'users', 'action' => 'view', $tournament['User']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Competition'); ?></th>
		<td>
			<?php echo $this->Html->link($tournament['Competition']['name'], array('controller' => 'competitions', 'action' => 'view', $tournament['Competition']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Event Id'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['event_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Prev Tournament Id'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['prev_tournament_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Organization Id'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['organization_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Visible'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['visible']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Min Party Size'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['min_party_size']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Max Party Size'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['max_party_size']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Max Party Reserve Size'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['max_party_reserve_size']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Allow Substitution'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['allow_substitution']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Min Parties Num'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['min_parties_num']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Max Parties Num'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['max_parties_num']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Prize Fund'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['prize_fund']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Rules'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['rules']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Closed Registration'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['closed_registration']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Registration Start'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['registration_start']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Registration Finish'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['registration_finish']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Contest Start'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['contest_start']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Confirmation Period'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['confirmation_period']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Match Duration'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['match_duration']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Age Limit'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['age_limit']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Statictics'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['statictics']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Type'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['type']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Playoff Grid Size'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['playoff_grid_size']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Max Games Num'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['max_games_num']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Allow Games'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['allow_games']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Match Parameter'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['match_parameter']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Match Parameter Value'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['match_parameter_value']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Allow Game Standoff'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['allow_game_standoff']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Standoff Game Scores'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['standoff_game_scores']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Allow Match Standoff'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['allow_match_standoff']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Allow Add Games'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['allow_add_games']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Se Allow Third Place Match'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['se_allow_third_place_match']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('De Full Final'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['de_full_final']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('De Smart Final'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['de_smart_final']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('De Auto Arrangement'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['de_auto_arrangement']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('De Allow Fifth Place Match'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['de_allow_fifth_place_match']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('De Allow Seventh Place Match'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['de_allow_seventh_place_match']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Groups Num'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['groups_num']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Group Parties Num'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['group_parties_num']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Group Parties Out Num'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['group_parties_out_num']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Match Victory Scores'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['match_victory_scores']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Match Loss Scores'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['match_loss_scores']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Match Standoff Scores'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['match_standoff_scores']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Approve Notice Sent'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['approve_notice_sent']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Modified'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['modified']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['created']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Deleted'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['deleted']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Deleted Date'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['deleted_date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Maps Tours'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['maps_tours']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Stream'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['stream']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Root Tournament Id'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['root_tournament_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Html Head'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['html_head']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Html Sidebar Partner'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['html_sidebar_partner']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Comments'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['comments']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Ss Reliable Places'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['ss_reliable_places']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Approved'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['approved']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Division'); ?></th>
		<td>
			<?php echo h($tournament['Tournament']['division']); ?>
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
	<h3><?php echo __('Related Matches'); ?></h3>
	<?php if (!empty($tournament['Match'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Blocked'); ?></th>
		<th><?php echo __('Results Entered'); ?></th>
		<th><?php echo __('Accomplished'); ?></th>
		<th><?php echo __('Conflict'); ?></th>
		<th><?php echo __('Allow Games'); ?></th>
		<th><?php echo __('Game Count'); ?></th>
		<th><?php echo __('Game Max Count'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Statistics'); ?></th>
		<th><?php echo __('Start Time'); ?></th>
		<th><?php echo __('Finish Time'); ?></th>
		<th><?php echo __('Tour'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('Group'); ?></th>
		<th><?php echo __('Stage'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Deleted Date'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($tournament['Match'] as $match): ?>
		<tr>
			<td><?php echo $match['id']; ?></td>
			<td><?php echo $match['tournament_id']; ?></td>
			<td><?php echo $match['user_id']; ?></td>
			<td><?php echo $match['parent_id']; ?></td>
			<td><?php echo $match['blocked']; ?></td>
			<td><?php echo $match['results_entered']; ?></td>
			<td><?php echo $match['accomplished']; ?></td>
			<td><?php echo $match['conflict']; ?></td>
			<td><?php echo $match['allow_games']; ?></td>
			<td><?php echo $match['game_count']; ?></td>
			<td><?php echo $match['game_max_count']; ?></td>
			<td><?php echo $match['status']; ?></td>
			<td><?php echo $match['description']; ?></td>
			<td><?php echo $match['statistics']; ?></td>
			<td><?php echo $match['start_time']; ?></td>
			<td><?php echo $match['finish_time']; ?></td>
			<td><?php echo $match['tour']; ?></td>
			<td><?php echo $match['position']; ?></td>
			<td><?php echo $match['group']; ?></td>
			<td><?php echo $match['stage']; ?></td>
			<td><?php echo $match['created']; ?></td>
			<td><?php echo $match['modified']; ?></td>
			<td><?php echo $match['deleted']; ?></td>
			<td><?php echo $match['deleted_date']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'matches', 'action' => 'view', $match['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'matches', 'action' => 'edit', $match['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'matches', 'action' => 'delete', $match['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $match['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Match'), array('controller' => 'matches', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Parties'); ?></h3>
	<?php if (!empty($tournament['Party'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Clan Id'); ?></th>
		<th><?php echo __('University Id'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Approved Time'); ?></th>
		<th><?php echo __('Eliminated'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Group'); ?></th>
		<th><?php echo __('Basket'); ?></th>
		<th><?php echo __('Points'); ?></th>
		<th><?php echo __('Place'); ?></th>
		<th><?php echo __('Scores'); ?></th>
		<th><?php echo __('Rating'); ?></th>
		<th><?php echo __('Statistics'); ?></th>
		<th><?php echo __('Users Party Count'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Deleted Date'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Geo Country Id'); ?></th>
		<th><?php echo __('Mcl University Id'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($tournament['Party'] as $party): ?>
		<tr>
			<td><?php echo $party['id']; ?></td>
			<td><?php echo $party['tournament_id']; ?></td>
			<td><?php echo $party['user_id']; ?></td>
			<td><?php echo $party['clan_id']; ?></td>
			<td><?php echo $party['university_id']; ?></td>
			<td><?php echo $party['approved']; ?></td>
			<td><?php echo $party['approved_time']; ?></td>
			<td><?php echo $party['eliminated']; ?></td>
			<td><?php echo $party['name']; ?></td>
			<td><?php echo $party['group']; ?></td>
			<td><?php echo $party['basket']; ?></td>
			<td><?php echo $party['points']; ?></td>
			<td><?php echo $party['place']; ?></td>
			<td><?php echo $party['scores']; ?></td>
			<td><?php echo $party['rating']; ?></td>
			<td><?php echo $party['statistics']; ?></td>
			<td><?php echo $party['users_party_count']; ?></td>
			<td><?php echo $party['created']; ?></td>
			<td><?php echo $party['modified']; ?></td>
			<td><?php echo $party['deleted']; ?></td>
			<td><?php echo $party['deleted_date']; ?></td>
			<td><?php echo $party['country_id']; ?></td>
			<td><?php echo $party['geo_country_id']; ?></td>
			<td><?php echo $party['mcl_university_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'parties', 'action' => 'view', $party['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'parties', 'action' => 'edit', $party['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'parties', 'action' => 'delete', $party['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $party['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Party'), array('controller' => 'parties', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Hubs Tournaments'); ?></h3>
	<?php if (!empty($tournament['HubsTournament'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hub Id'); ?></th>
		<th><?php echo __('Tournament Id'); ?></th>
		<th><?php echo __('Weight'); ?></th>
		<th><?php echo __('Use Design'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($tournament['HubsTournament'] as $hubsTournament): ?>
		<tr>
			<td><?php echo $hubsTournament['id']; ?></td>
			<td><?php echo $hubsTournament['hub_id']; ?></td>
			<td><?php echo $hubsTournament['tournament_id']; ?></td>
			<td><?php echo $hubsTournament['weight']; ?></td>
			<td><?php echo $hubsTournament['use_design']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'hubs_tournaments', 'action' => 'view', $hubsTournament['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'hubs_tournaments', 'action' => 'edit', $hubsTournament['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'hubs_tournaments', 'action' => 'delete', $hubsTournament['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $hubsTournament['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Hubs Tournament'), array('controller' => 'hubs_tournaments', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Hubs'); ?></h3>
	<?php if (!empty($tournament['Hub'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Begining'); ?></th>
		<th><?php echo __('Closing'); ?></th>
		<th><?php echo __('Location'); ?></th>
		<th><?php echo __('Approved'); ?></th>
		<th><?php echo __('Approved Time'); ?></th>
		<th><?php echo __('Website'); ?></th>
		<th><?php echo __('Clan Tag'); ?></th>
		<th><?php echo __('Domain'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('User Hub Count'); ?></th>
		<th><?php echo __('Hub Tournament Count'); ?></th>
		<th><?php echo __('Party Count'); ?></th>
		<th><?php echo __('Post Count'); ?></th>
		<th><?php echo __('Child Hub Count'); ?></th>
		<th><?php echo __('Allow Comments'); ?></th>
		<th><?php echo __('Comments'); ?></th>
		<th><?php echo __('Html Description'); ?></th>
		<th><?php echo __('Html Head'); ?></th>
		<th><?php echo __('Html Sidebar'); ?></th>
		<th><?php echo __('Logo File Id'); ?></th>
		<th><?php echo __('Background Color'); ?></th>
		<th><?php echo __('Links Color'); ?></th>
		<th><?php echo __('Background File Id'); ?></th>
		<th><?php echo __('Tile Background'); ?></th>
		<th><?php echo __('Show In List'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Hub Count'); ?></th>
		<th><?php echo __('Event Count'); ?></th>
		<th><?php echo __('Deleted'); ?></th>
		<th><?php echo __('Old Title'); ?></th>
		<th><?php echo __('Redirect'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($tournament['Hub'] as $hub): ?>
		<tr>
			<td><?php echo $hub['id']; ?></td>
			<td><?php echo $hub['type']; ?></td>
			<td><?php echo $hub['title']; ?></td>
			<td><?php echo $hub['description']; ?></td>
			<td><?php echo $hub['begining']; ?></td>
			<td><?php echo $hub['closing']; ?></td>
			<td><?php echo $hub['location']; ?></td>
			<td><?php echo $hub['approved']; ?></td>
			<td><?php echo $hub['approved_time']; ?></td>
			<td><?php echo $hub['website']; ?></td>
			<td><?php echo $hub['clan_tag']; ?></td>
			<td><?php echo $hub['domain']; ?></td>
			<td><?php echo $hub['parent_id']; ?></td>
			<td><?php echo $hub['user_hub_count']; ?></td>
			<td><?php echo $hub['hub_tournament_count']; ?></td>
			<td><?php echo $hub['party_count']; ?></td>
			<td><?php echo $hub['post_count']; ?></td>
			<td><?php echo $hub['child_hub_count']; ?></td>
			<td><?php echo $hub['allow_comments']; ?></td>
			<td><?php echo $hub['comments']; ?></td>
			<td><?php echo $hub['html_description']; ?></td>
			<td><?php echo $hub['html_head']; ?></td>
			<td><?php echo $hub['html_sidebar']; ?></td>
			<td><?php echo $hub['logo_file_id']; ?></td>
			<td><?php echo $hub['background_color']; ?></td>
			<td><?php echo $hub['links_color']; ?></td>
			<td><?php echo $hub['background_file_id']; ?></td>
			<td><?php echo $hub['tile_background']; ?></td>
			<td><?php echo $hub['show_in_list']; ?></td>
			<td><?php echo $hub['created']; ?></td>
			<td><?php echo $hub['modified']; ?></td>
			<td><?php echo $hub['hub_count']; ?></td>
			<td><?php echo $hub['event_count']; ?></td>
			<td><?php echo $hub['deleted']; ?></td>
			<td><?php echo $hub['old_title']; ?></td>
			<td><?php echo $hub['redirect']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'hubs', 'action' => 'view', $hub['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'hubs', 'action' => 'edit', $hub['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'hubs', 'action' => 'delete', $hub['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $hub['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Hub'), array('controller' => 'hubs', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>

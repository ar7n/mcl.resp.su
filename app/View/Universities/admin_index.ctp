<div class="universities index">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Universities'); ?></h1>
			</div>
		</div><!-- end col md 12 -->
	</div><!-- end row -->



	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
					<div class="panel-body">
						<ul class="nav nav-pills nav-stacked">
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New City'), array('action' => 'add'), array('escape' => false)); ?></li>
							<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New University'), array('controller' => 'universities', 'action' => 'add'), array('escape' => false)); ?> </li>
						</ul>
					</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('id'); ?></th>
					<th><?php echo $this->Paginator->sort('title'); ?></th>
					<th><?php echo $this->Paginator->sort('logo'); ?></th>
					<th><?php echo $this->Paginator->sort('division'); ?></th>
					<th><?php echo $this->Paginator->sort('city_id'); ?></th>
					<th><?php echo $this->Paginator->sort('managers'); ?></th>
					<th><?php echo $this->Paginator->sort('team-dota-2'); ?></th>
					<th><?php echo $this->Paginator->sort('team-cs-go'); ?></th>
					<th class="actions"></th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($universities as $university): ?>
					<tr>
						<td><?php echo h($university['University']['id']); ?>&nbsp;</td>
						<td><?php echo h($university['University']['title']); ?>&nbsp;</td>
						<td><?php echo h($university['University']['logo']); ?>&nbsp;</td>
						<td><?php echo h($university['University']['division']); ?>&nbsp;</td>
						<td><?php echo h($university['University']['city_id']); ?>&nbsp;</td>
						<td><?php echo h($university['University']['managers']); ?>&nbsp;</td>
						<td><?php echo h($university['University']['team_dota2']); ?>&nbsp;</td>
						<td><?php echo h($university['University']['team_csgo']); ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', array('action' => 'view', $university['University']['id']), array('escape' => false)); ?>
							<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $university['University']['id']), array('escape' => false)); ?>
							<?php echo $this->Form->postLink('<span class="glyphicon glyphicon-remove"></span>', array('action' => 'delete', $university['University']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $university['University']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<p>
				<small><?php echo $this->Paginator->counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));?></small>
			</p>

			<?php
			$params = $this->Paginator->params();
			if ($params['pageCount'] > 1) {
				?>
				<ul class="pagination pagination-sm">
					<?php
					echo $this->Paginator->prev('&larr; Previous', array('class' => 'prev','tag' => 'li','escape' => false), '<a onclick="return false;">&larr; Previous</a>', array('class' => 'prev disabled','tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag' => 'li','currentClass' => 'active','currentTag' => 'a'));
					echo $this->Paginator->next('Next &rarr;', array('class' => 'next','tag' => 'li','escape' => false), '<a onclick="return false;">Next &rarr;</a>', array('class' => 'next disabled','tag' => 'li','escape' => false));
					?>
				</ul>
			<?php } ?>

		</div> <!-- end col md 9 -->
	</div><!-- end row -->


</div><!-- end containing of content -->
<div class="posts index">
	<? //debug($posts); ?>

	<?php foreach ($posts as $post): ?>
		<div class="post clearfix">

			<? if (isset($post['Picture'][0]['thumb_path'])){?>
				<div class="post-image">
					<a href="/posts/view/<?= $post['Post']['id'];?>">
						<img src="http://resp.su/<?= $post['Picture'][0]['big_path']?>" width="200" height="200">
					</a>
				</div>
			<? } ?>

			<div class="post-text">
				<div class="post-time"><? echo rdate('j M Y в G:i', mysqlTimestamp($post['Post']['created'])); ?></div>
				<div class="post-title">
					<a href="/posts/view/<?= $post['Post']['id'];?>">
						<? echo $post['Post']['title']; ?>
					</a>
				</div>
				<div class="post-intro">
				<?
				$post['Post']['text'] = unserialize($post['Post']['text']);
				echo strip_tags($post['Post']['text']['preview'], '<br><p><a>');
				?>
				</div>
				<div class="post-actions">
					<a href="/posts/view/<?= $post['Post']['id'];?>">Читать далее</a>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

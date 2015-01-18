<div class="posts view post">
	<? if (isset($post['Picture'][0]['thumb_path'])){?>
		<div class="post-image">
			<img src="http://resp.su/<?= $post['Picture'][0]['big_path']?>" width="200" height="200">
		</div>
	<? } ?>

	<div class="post-text">
		<div class="post-time"><? echo rdate('j M Y в G:i', mysqlTimestamp($post['Post']['created'])); ?></div>
		<div class="post-title">
			<? echo $post['Post']['title']; ?>
		</div>
		<div class="post-intro">
			<?
			$post['Post']['text'] = unserialize($post['Post']['text']);
			echo $post['Post']['text']['text'];
			?>
		</div>
		<div class="post-actions">

		</div>
	</div>

	<? echo $this->element('SocialLikes'); ?>
	<div id="post-comments" class="comments">
		<?php $this->CommentWidget->options(array('allowAnonymousComment' => false, 'subtheme' => 'resp'));?>
		<?php echo $this->CommentWidget->display();?>
	</div>
</div>

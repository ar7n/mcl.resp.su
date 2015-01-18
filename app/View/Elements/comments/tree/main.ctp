<?php
/**
 * Copyright 2009 - 2013, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2009 - 2013, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="comments">
	<a name="comments"></a>
	<h3><?php echo "Комментарии"; ?></h3>
	<hr/>
	<?php

//		echo $this->CommentWidget->element('paginator');
		echo $this->Tree->generate(${$viewComments}, array(
			'callback' => array($this->CommentWidget, 'treeCallback'),
			'model' => 'Comment',
			'class' => 'tree-block'));

		if ($allowAddByAuth):
			if (1 || $isAddMode && $allowAddByAuth): ?>
				<div class="add-comment">
				Добавление нового комментария
				<?php
				echo $this->CommentWidget->element('form', array('comment' => (!empty($comment) ? $comment : 0)));
				?>
				</div>
			<? else:
				if (empty($this->request->params[$adminRoute]) && $allowAddByAuth):
					echo $this->CommentWidget->link(__d('comments', 'Add comment'), am($url, array('comment' => 0)));
				endif;
			endif;
		else: ?>
			<div class="add-comment">
				<?php echo sprintf('Для того чтобы писать комментарии вам необходимо %s', $this->Html->link('авторизоваться', array('controller' => 'users', 'action' => 'login', 'prefix' => $adminRoute, $adminRoute => false))); ?>
			</div>
		<? endif;
	?>
</div>
<?php echo $this->Html->image('/comments/img/indicator.gif', array('id' => 'busy-indicator',
 'style' => 'display:none;')); ?>

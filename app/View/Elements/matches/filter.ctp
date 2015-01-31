<?php
$this->set('title', 'Фильтр');
$params = $this->Paginator->params();
$options = $params['options'];
?>
<?= $this->Form->create(null, array('url' => array('action' => 'index'), 'type' => 'get')); ?>  
Сортировать по:
<?= $this->Form->select('sort', $paginateOptionLabels['sort'], key($options['order']), array('empty' => false)); ?>
<?= $this->Form->button('Применить'); ?>
<?= $this->Form->end(); ?>
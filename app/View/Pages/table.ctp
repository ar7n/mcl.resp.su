<?
$divisions = array();
for ($i=0; $i<8; $i++) {
    $divisions[chr(ord('A') + $i)] = array();
}
//foreach ($universities as $university){
//    $divisions[$university['University']['division']][] = $university;
//}
?>

<div class="pages table">
    <div id="table-tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
        <ul class="main-tabs main-tabs ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
            <? if ($tabname == 'playoff'){ ?>
                <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active">
                    <a href="/table/playoff" class="ui-tabs-anchor">Плейофф</a>
                </li>
            <? } else { ?>
                <li class="ui-state-default ui-corner-top">
                    <a href="/table/playoff"  class="ui-tabs-anchor">Плейофф</a>
                </li>
            <? } ?>
            <li><span class="title main-title">Дивизионы</span></li>
            <? foreach ($divisions as $divisionName => $division){ ?>
                <?
                $class = '';
                if ($tabname == $divisionName){
                    $class =  "ui-tabs-active ui-state-active";
                }
                ?>
                <li class="ui-state-default ui-corner-top <?= $class; ?>">
                    <a href="/table/<?= $divisionName; ?>" class="ui-tabs-anchor"><?= $divisionName; ?></a>
                </li>
            <? } ?>
        </ul>
        <div class="scheme">
            <h2>Таблица</h2>
            <? echo $this->element('/matches/scheme', $tournament); ?>
        </div>
        <div class="matches">
            <h2>Матчи</h2>
            <? if (!empty($tournament['Match'])):?>
                <table class="matches-table">
                <col width="145">
                <col>
                <col width="60">
                <col width="60">
                <col width="60">
                <col>
                <col width="82">
                <thead>
                    <tr>
                        <th class="time">Время проведения</th>
                        <th class="party1"></th>
                        <th class="game1">Dota 2</th>
                        <th class="game2">CS:GO</th>
                        <th class="game3">FIFA 15</th>
                        <th class="party2"></th>
                        <th class="status">Статус</th>
                    </tr>
                </thead>
                <tbody>
                    <? foreach ($tournament['Match'] as $match) { ?>
                        <?
                        $dota = '';
                        if (isset($match['Game'][0]['statistics'])) {
                            $dota = unserialize($match['Game'][0]['statistics']);
                        }
                        if (!empty($dota)) {
                            $dota = $dota['Slot'][0]['scores'] . ":" . $dota['Slot'][1]['scores'];
                        }
                        $csgo = '';
                        if (isset($match['Game'][1]['statistics'])) {
                            $csgo = unserialize($match['Game'][1]['statistics']);
                        }
                        if (!empty($dota)) {
                            $csgo = $csgo['Slot'][0]['scores'] . ":" . $csgo['Slot'][1]['scores'];
                        }
                        $fifa = '';
                        if (isset($match['Game'][2]['statistics'])) {
                            $fifa = unserialize($match['Game'][2]['statistics']);
                        }
                        if (!empty($fifa)) {
                            $fifa = $fifa['Slot'][0]['scores'] . ":" . $fifa['Slot'][1]['scores'];
                        }
                        $party1 = '';
                        if (isset($match['Slot'][0]['Party'])){
                            $party1 = $this->element('parties/item', array('item' => $match['Slot'][0]['Party']));
                        }
                        $party2 = '';
                        if (isset($match['Slot'][1]['Party'])){
                            $party2 = $this->element('parties/item', array('item' => $match['Slot'][1]['Party']));
                        }
                        if ($party1 && $party2){
                        ?>
                            <tr>
                                <td class="time"><?= $match['start_time'] ? rdate('j.m.y в G:i', mysqlTimestamp($match['start_time'])) : '' ?></td>
                                <td class="party1"><?= $party1 ?></td>
                                <td class="game1"><?= $dota ?></td>
                                <td class="game2"><?= $csgo ?></td>
                                <td class="game3"><?= $fifa ?></td>
                                <td class="party2"><?= $party2 ?></td>
                                <td class="status"><?= $match['accomplished'] ? 'завершен' : 'предстоит' ?></td>
                            </tr>
                        <? } ?>
                    <? } ?>
                </tbody>
            </table>
            <? else: ?>
                <p>Матчи будут объявлены позднее</p>
            <? endif; ?>
        </div>
    </div>
    <? echo $this->element('SocialLikes');?>
</div>
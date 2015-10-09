<div style="word-wrap: break-word">
    <?=$this->html->link('Download', array('controller' => 'pokemon', 'action' => 'download', 'id' => $pokemon->_id));?><br />
    Nickname: <?=$pokemon->nickname?><br />
    Species: <?=$pokemon->getSpecies()?><br />
    Date Met: <?=$pokemon->dateMet->toDateTime()->format("Y-m-d")?>
</div>
<pre>
    <?=print_r($pokemon)?>
</pre>
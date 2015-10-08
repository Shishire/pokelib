<div style="word-wrap: break-word">
    <?=$this->html->link('Download', array('controller' => 'pokemon', 'action' => 'download', 'id' => $pokemon->_id));?><br />
    Nickname: <?=$pokemon->nickname?><br />
    Dex Id: <?=$pokemon->dexId?>
</div>
<pre>
    <?=print_r($pokemon)?>
</pre>
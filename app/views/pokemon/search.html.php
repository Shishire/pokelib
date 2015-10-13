<fieldset>
    <legend>Search</legend>
    <?= $this->form->create(); ?>
        <?= $this->form->field('query'); ?>
        <?= $this->form->submit('Search'); ?>
    <?= $this->form->end(); ?>
</fieldset>
<?php foreach($pokemon as $poke){ ?>
<?=$this->html->link($poke->getNickname(), array('controller' => 'pokemon', 'action' => 'view', 'id' => $poke->_id))?><br />
<?php } ?>
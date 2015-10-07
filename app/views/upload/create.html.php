<?=$this->form->create($model,array("type" => "file"));?>
<?=$this->form->field('file',array('type' => 'file'));?><br />
<?=$this->form->submit('Upload');?>
<?=$this->form->end();?>

<pre>
	<?=print_r($uploadData)?>
</pre>
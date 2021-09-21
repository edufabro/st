<?php echo $this->include('Vinicial_header'); ?>
<style>
</style>
<div id="main">
	<h2><?php echo $titulo; ?></h2>
	<form method="post">
		<input type="hidden" name="tipo" value="<?php echo(isset($tipo)?$tipo->id_tipo:'');?>">
		<p>
			Descrição do Tipo de Cliente: 
			<input type="text" name="descricao" 
			 value="<?php echo(isset($tipo)?$tipo->descricao:'');?>" 
			 onKeyPress="document.getElementById('msg').innerHTML='';"
			 <?php if($acao=="Excluir") {echo " disabled ";}?>/>
		</p>
		<p><input type="submit" value="<?php echo $acao; ?>" /> 
		   <input type="button" value="Voltar" onClick="location.href='<?php echo base_url('public/Ctipo/');?>/'" /></p>
		<p><div id="msg" style="color:red;font-weight: bold;"><?php echo $msg;?></div></p>
	</form>
</div>
<?php echo $this->include('Vinicial_footer'); ?>
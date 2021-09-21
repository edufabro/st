<?php echo $this->include('Vinicial_header'); ?>
<div id="main">
	<h2><?php echo $titulo; ?></h2>
	<form method="post">
		<input type="hidden" name="id_cliente" value="<?php echo(isset($cliente)?$cliente->id_cliente:'');?>">
		<p>
			Nome do Cliente: 
			<input type="text" name="nome" 
			 value="<?php echo(isset($cliente)?$cliente->nome:'');?>" 
			 onKeyPress="document.getElementById('msg').innerHTML='';"
			 <?php if($acao=="Excluir") {echo " disabled ";}?>/>
		</p>
		<p>
			Tipo do Cliente: 
			<?php echo $comboTipos; ?>
		</p>
		<p><input type="submit" value="<?php echo $acao; ?>" /> 
		   <input type="button" value="Voltar" onClick="location.href='<?php echo base_url('public/Ccliente/');?>/'" /></p>
		<p><div id="msg" style="color:red;font-weight: bold;"><?php echo $msg;?></div></p>
	</form>
</div>
<?php echo $this->include('Vinicial_footer'); ?>
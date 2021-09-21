<?php echo $this->include('Vinicial_header'); ?>
<div id="main">
	<h2><?php echo $titulo; ?></h2>
	<table class="tabela">
		<tr>
			<td style="font-weight: bold;">Código do Tipo</td>
			<td style="font-weight: bold;">Descrição do Tipo</td>
			<td style="font-weight: bold;">Excluir</td>
		</tr>
		<?php foreach($listaDeTipos as $tipoCliente) {?>
			<tr>
			<td><?php echo($tipoCliente->id_tipo);?></td>
			<td>
				<a href="<?php echo base_url('public/index.php/Ctipo/editar')."/".$tipoCliente->id_tipo;?>">
				<?php echo($tipoCliente->descricao);?></a>
			</td>
			<td><div style="text-align:center;">
				<a href="<?php echo base_url('public/index.php/Ctipo/excluir')."/".$tipoCliente->id_tipo;?>" style="color:red;font-weight:bold;">X</a></div>
			</td>
			</tr>
		<?php }?>
	</table>
		<p><input type="button" value="Inserir novo Tipo" onClick="location.href='<?php echo base_url('public/index.php/Ctipo/inserir');?>/'"/> 
		   <input type="button" value="Voltar" onClick="location.href='<?php echo base_url('public/index.php/');?>/'" /></p>
</div>
<?php echo $this->include('Vinicial_footer'); ?>
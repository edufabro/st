<?php echo $this->include('Vinicial_header'); ?>
<div id="main" class="main">
	<h2><?php echo $titulo; ?></h2>
	<table class="tabela">
		<tr>
			<td style="font-weight: bold;">Código do Cliente</td>
			<td style="font-weight: bold;">Nome do Cliente</td>
			<td style="font-weight: bold;">Tipo de Cliente</td>
			<td style="font-weight: bold;">Excluir</td>
		</tr>
		<?php foreach($listaDeClientes as $cliente) {?>
			<tr>
			<td><?php echo($cliente->id_cliente);?></td>
			<td>
				<a href="<?php echo base_url('public/index.php/Ccliente/editar')."/".$cliente->id_cliente;?>">
				<?php echo($cliente->nome);?></a>
			</td>
			<td><?php echo($cliente->texto_tipo_cliente);?></td>
			<td><div style="text-align:center;">
				<a href="<?php echo base_url('public/index.php/Ccliente/excluir')."/".$cliente->id_cliente;?>" style="color:red;font-weight:bold;">X</a></div>
			</td>
			</tr>
		<?php }?>
	</table>
		<p><input type="button" value="Inserir novo Cliente" onClick="location.href='<?php echo base_url('public/index.php/Ccliente/inserir');?>/'"/> 
		   <input type="button" value="Voltar" onClick="location.href='<?php echo base_url('public/index.php/');?>/'" /></p>
</div>
<?php echo $this->include('Vinicial_footer'); ?>
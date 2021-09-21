<?php namespace App\Models;

use CodeIgniter\Model;

class Mcliente extends Model {
	protected $table = 'cliente';
	protected $primaryKey = 'id_cliente';
	protected $allowedFields = ['nome','id_tipo_cliente'];
	protected $returnType = 'object';
}
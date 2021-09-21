<?php namespace App\Models;

use CodeIgniter\Model;

class Mtipo extends Model {
	protected $table = 'tipo';
	protected $primaryKey = 'id_tipo';
	protected $allowedFields = ['descricao'];
	protected $returnType = 'object';
}
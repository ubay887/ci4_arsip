<?php

namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $register = [
		'username' => [
			'rules' => 'required|min_length[3]',
		],
		'password' => [
			'rules' => 'required',
		],
		'repeatPassword' => [
			'rules' => 'required|matches[password]',
		],
	];
	public $register_errors = [
		'username' => [
			'required' => '{field} harus diisi.',
			'min_length' => '{field} minimal 3 karakter',
		],
		'password' => [
			'required' => '{field} harus diisi.',
		],
		'repeatPassword' => [
			'required' => '{field} harus diisi.',
			'matches' => '{field} tidak match dengan password',
		],
	];

	public $login = [
		'username' => [
			'rules' => 'required|min_length[3]',
		],
		'password' => [
			'rules' => 'required',
		],
	];
	public $login_errors = [
		'username' => [
			'required' => '{field} harus diisi.',
			'min_length' => '{field} minimal 3 karakter',
		],
		'password' => [
			'required' => '{field} harus diisi.',
		],
	];
}

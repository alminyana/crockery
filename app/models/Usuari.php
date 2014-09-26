<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuari extends Eloquent implements UserInterface, RemindableInterface {
	/**
	 * La BD utilizada por el modelo
	 *
	 * @var string
	 */
	protected $table = 'usuaris';
	protected $fillable = ['nom','rol','mail','password'];
	/**
	* Reglas de validación del servidor del formmulario Registro Usuario
	*/
	public static $rules = array(
		'nom'=>'required|alpha|min:2',
		'mail'=>'required|email|unique:usuaris',
		'password'=>'required|between:6,12|confirmed',
    	'password_confirmation'=>'required|between:6,12',
	);
	
	/**
	 * Atributos que son ocultos y no se mostrarán.
	 *
	 * @var array
	 */
	protected $hidden = array('password');
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->mail;
	}

}
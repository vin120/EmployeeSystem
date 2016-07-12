<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class ProfileForm extends Model
{
	public $employee_code;
	public $cn_name;
	public $department;
	public $work;
	public function rules()
	{
		
	}
}

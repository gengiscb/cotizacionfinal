<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    
    private $_id;
	public function authenticate()
	{
	$user = Usuario::model()->find(array(
        'condition' => 'usuario = :usuario',
        'params' => array(
        ':usuario' => $this->username,
        ),
        )); //select * from usuarios where usuario= $this->username limit 1
                
        if($user === NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif(crypt ($this->password, $user->contrasena) !== $user->contrasena)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
                        $this->_id=$user->id;
			$this->errorCode=self::ERROR_NONE;
                        $this->setState('roles',$user->textRoles);
                }
		return !$this->errorCode;
	}
        
        public function getId()
    {
        return $this->_id;
    }
    }

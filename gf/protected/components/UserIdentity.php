<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_usuario;
	private $idEmpresa;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		 Yii::log("[UserIdentity][authenticate] - Login para el usuario: ".$this->username, 'info');

                $criteria = new CDbCriteria;
                $criteria->condition = "usuario_='".strtolower($this->username)."'";

                $user=Usuarios::model()->find($criteria);

                if($user===null) {
                        $this->errorCode=self::ERROR_USERNAME_INVALID;

                        Yii::log("[UserIdentity][authenticate] - Login incorrecto para el usuario: ".$this->username, 'info');

                } else if(($this->password)!==$user->clave_) {
                //else if(md5($this->password)!==$user->password)
                        $this->errorCode=self::ERROR_PASSWORD_INVALID;

                        Yii::log("[UserIdentity][authenticate] - Login incorrecto para el usuario: ".$user->usuario_, 'info');
                } else if(($this->password)===$user->clave_) {
//                		$sesion=new Sesiones;
//                		$sesion->fechaIngresa=time();
//                		$sesion->idUsuario=$user->idUsuario;
//                		$sesion->save();
                		
                		
                        $this->_id=$user->idUsuario;
                        $this->username=$user->usuario_;
                        $this->setState('idUsuario', $user->idUsuario);
                        $this->setState('usuario_', $user->usuario_);
                        $this->setState('nombre', $user->nombre);
                        $this->setState('email', $user->email);
                        $this->setState('idEmpresa', $this->idEmpresa);
                        //$this->setState('idSesion', $sesion->idSesion);
                        $this->setState('rutaImagen', $user->rutaImagen);
                        $this->setState('idArea', $user->idAreaUsuario);
                        $this->_usuario=$user;
                        
                        
                        $this->errorCode=self::ERROR_NONE;
                        
						Yii::log("[UserIdentity][authenticate] - ID Usuario: ".$user->idUsuario, 'info');
                        Yii::log("[UserIdentity][authenticate] - Usuario: ".$user->nombre, 'info');	
                        Yii::log("[UserIdentity][authenticate] - Login correcto para el usuario: ".$user->usuario_, 'info');
                        
//                       / $this->setSesionChat();
                        
                }
                return !$this->errorCode;
	}
	private function setSesionChat()
	{
		session_start();
		$users['userid'] = $this->_id;
	
		$_SESSION['userid'] = $users['userid']; // Modify to suit requirements
	}
 public function getId()
        {
                return $this->_id;
        }
         public function usuario()
        {
                return $this->_usuario;
        }
}
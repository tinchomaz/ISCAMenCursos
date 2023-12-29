<?php
if(Config::DISPLAY_ERROR){
	ini_set('display_errors','On');
	error_reporting(E_ALL);
}else{
	ini_set('display_errors','Off');
}
require_once("ConfigMail.php");
require_once("app/mailer/PHPMailer.php");

class ManagerMail {
    
    private $port = SMTP_PORT; // set the SMTP server port
    private $host = SMTP_HOST; // SMTP server
    private $username = SMTP_USER_NAME; // SMTP server username
    private $password = SMTP_PASSWORD; // SMTP server password
    private $from = SMTP_EMAIL;  
            
   
	public function envioMailConsulta($nombre, $telefono, $email, $asunto, $mensaje){ 
	
		try {
       		$mail = new PHPMailer(true); 
			$mail->SMTPSecure = "ssl";
			$mail->IsHTML(true);
            $mail->Port = $this->port; 
            $mail->Host = $this->host; 
            $mail->Username = $this->username; 
            $mail->Password = $this->password;
			$mail->From = $this->from;
			$mail->IsSMTP(); 
            $mail->SMTPAuth = true;             
            $mail->IsSendmail(); 
			$mail->FromName = $fromName;
			$mail->Subject = $subject;
								
            $mail->AddAddress(CORREO_GERARDO,'ISCAMEN');
			$mail->AddCC(CORREO_GERARDO,'ISCAMEN');
			$mail->WordWrap = 200; // set word wrap
            
            $mail->Mailer = "smtp";
             
			$body = "<html>
						<style type='text/css'>
						<!--
						body {
							background-color: #F2F2F2;
							color: #000000;
							padding: 0px 0 0 0px;
							width: 70%;						
							text-align: left;
						}
						.text{
							color: #1A5387;
						    font-family: 'MuseoSans500',sans-serif;
						    font-size: 14px;
						    line-height: 28px;
						    margin-top: 10px;
						    text-shadow: 1px 1px 0 #FFFFFF;
						    text-align: left;
						}					
						-->
						</style>
						<body>
						<form>
						<table width='400' border='0' align='center' cellpadding='0' cellspacing='0'>
							<tr>
							    <td colspan='2' height='150' align='left' valign='top'>
									<img src='".Config::URL_BASE_ISCAMEN."/img/solo-logo.png' width='108' height='83' alt='ISCAMEN'  longdesc='ISCAMEN'>
								</td>
						   	</tr>
							<tr>
								<td><br></td>
								<td><br></td>
							</tr>
							<tr>
								<td width='30%' style='font-weight:bold;' class='text' >Nombre</td>
								<td width='70%' class='text' >". $nombre ."</td>
							</tr>
							<tr>
								<td><br></td>
								<td><br></td>
							</tr>
							<tr>
								<td width='30%' style='font-weight:bold;' class='text'>Telefono</td>
								<td width='70%' class='text'>". $telefono ."</td>
							</tr>
							<tr>
								<td><br></td>
								<td><br></td>
							</tr>
							<tr>
								<td width='30%' style='font-weight:bold;' class='text'>E-mail</td>
								<td width='70%' class='text'> ". $email ."</td>
							</tr>
							<tr>
								<td><br></td>
								<td><br></td>
							</tr>
							<tr>
								<td width='30%' style='font-weight:bold;' class='text'>Asunto</td>
								<td width='70%' class='text'>". $asunto ."</td>
							</tr>
							<tr>
								<td><br></td>
								<td><br></td>
							</tr>
							<tr>
								<td colspan='2' width='100%' style='font-weight:bold;' class='text'>Consulta:</td>
							</tr>
							<tr>
								<td colspan='2' width='100%' class='text'>  ".$mensaje."</td>
							</tr>
							<tr>
								<td><br></td>
								<td><br></td>
							</tr>"; 
							
							
						$body.="</table>
									</form>
								</body>
								</html>";
       
		$mail->MsgHTML($body); 
        $intentos = 1; 
		while((!$exito) && ($intentos < 5) && ($mail->ErrorInfo != "SMTP Error: Data not accepted")) {
   			sleep(5);
 	   	
 	   		$exito = $mail->Send();
 	   		$intentos++;
		}
		
        }catch(phpmailerException $e) {
            echo $e->errorMessage();
        }	
     	echo 'OK.';
	
	}       
	
}
?>

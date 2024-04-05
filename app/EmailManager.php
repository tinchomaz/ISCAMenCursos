<?php


class EmailManager {
	
	private $port = "25"; // set the SMTP server port
    private $host = "iscamen.com.ar"; // SMTP server
    private $username = "administrador@iscamen.com.ar"; // SMTP server username
    private $password = "4dm1n1str4d0r"; // SMTP server password
    
	
	public function envioMailIscamen($nombre, $email, $asunto, $mensaje){ 
       try {
       		
			$mail = new PHPMailer(true); 
			$mail->SMTPSecure = "ssl";
			$mail->IsHTML(true);
            $mail->Port = $this->port; 
            $mail->Host = $this->host; 
            $mail->Username = $this->username; 
            $mail->Password = $this->password;
			$mail->From = $email;
			$mail->IsSMTP(); 
            $mail->SMTPAuth = true;             
            $mail->IsSendmail(); 
			$mail->FromName = "ISCAMEN";
			$mail->Subject = $asunto;
								
            $mail->AddAddress("gerardo.magni@iscamen.com.ar",'ISCAMEN');
			$mail->AddCC("gerardo.magni@gmail.com",'GerardoMagni');
			//$mail->AddCC("isca",'ISCAMEN');
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
										<img src='".Config::getURLBaseApacheIscamen()."img/logo.jpg' width='255' height='69' alt='ISCAMEN' longdesc='ISCAMEN'>
									</td>
							   	</tr>
								<tr>
									<td><br></td>
									<td><br></td>
								</tr>
							   <tr>
									<td width='30%' style='font-weight:bold;' class='text' >Estancia</td>
									<td width='70%' class='text' >". $asunto ."</td>
								</tr>
								<tr>
									<td><br></td>
									<td><br></td>
								</tr>
								<tr>
									<td colspan='2' height='150' align='left' valign='top'>". $mensaje ."
									</td>
								</tr>
								<tr>
									<td><br></td>
									<td><br></td>
								</tr>
							</table>
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
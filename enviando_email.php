<?php
  //$Nome   = $_POST["Nome"]; // Pega o valor do campo Nome
  //$Fone   = $_POST["Fone"]; // Pega o valor do campo Telefone
  //$Email    = $_POST["Email"];  // Pega o valor do campo Email
  //$Mensagem = $_POST["Mensagem"]; // Pega os valores do campo Mensagem

  $Nome = "Ronaldo";
  $Fone = "99999999";
  $Email = "jeffersonluis.reis@gmail.com";
  $Mensagem = "ophduiasgu8doasgudiasgduiasgyudgyudsagiydasgusadudus";

  // Variável que junta os valores acima e monta o corpo do email

  $Vai = "Nome: $Nome\n\nE-mail: $Email\n\nTelefone: $Fone\n\nMensagem: $Mensagem\n";

  require_once("C:/wamp64/apps/PHPMailer_5.2.4/class.phpmailer.php");

  define('GUSER', 'jeffersonluis.reis@gmail.com');  // <-- Insira aqui o seu GMail
  define('GPWD', 'ayjeff3335');    // <-- Insira aqui a senha do seu GMail

  function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
    global $error;
    $mail = new PHPMailer();
    $mail->IsSMTP();    // Ativar SMTP
    $mail->SMTPDebug = 0;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;   // Autenticação ativada
    $mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.gmail.com'; // SMTP utilizado
    $mail->Port = 587;      // A porta 587 deverá estar aberta em seu servidor
    $mail->Username = GUSER;
    $mail->Password = GPWD;
    $mail->SetFrom($de, $de_nome);
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    if(!$mail->Send()) {
      $error = 'Mail error: '.$mail->ErrorInfo; 
      return false;
    } else {
      $error = 'Mensagem enviada!';
      return true;
    }
  }

  // Insira abaixo o email que irá receber a mensagem, o email que irá enviar (o mesmo da variável GUSER), 
  // o nome do email que envia a mensagem, o Assunto da mensagem e por último a variável com o corpo do email.
                   #recebe                         #enviador gmail
   if (smtpmailer('jeffersonluis.reis@gmail.com', 'jeffersonluis.reis@gmail.com', 'Vestibulando', 'Venha Vestibular', $Vai));

    //Header("location:http://www.dominio.com.br/obrigado.html"); // Redireciona para uma página de obrigado.

  if (!empty($error)) echo $error;
?>
<?php

require_once '../vendor/autoload.php';

$nome = trim($_POST['name']);
$email = trim($_POST['email']);
$assunto = trim($_POST['subject']);
$mensagem = trim($_POST['message']);

$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'empilhateste@gmail.com';
$mail->Password = 'empilhafoz';
$mail->Port = 587;

$mail->setFrom('empilhateste@gmail.com', 'Empilha Foz');
$mail->addAddress('empilhafoz@hotmail.com');
#$mail->addCC('email@email.com.br', 'Cópia');
#$mail->addBCC('email@email.com.br', 'Cópia Oculta')

$mail->IsHTML(true);

$mail->Body = "
      <!DOCTYPE html>
      <html>
      <head>
        <meta charset='utf-8'>
      <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th, td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {background-color: #f2f2f2;}
      </style>
      </head>
      <body>
      <br>
      <hr>
      <h3><span> Ambiente {} </span></h3>
      <table>
        <tr>
          <th>Solicitante</th>
          <th>Cliente</th>
          <th>E-mail</th>
          <th>Assunto</th>
          <th>Mensagem</th>
        </tr>
        <tr>
          <td>{$nome}</td>
          <td>{$email}</td>
          <td>{$assunto}</td>
          <td>{$mensagem}</td>
        </tr>
      </table>

      <hr>
        <br>
        <strong>Lista:  </strong>


      <hr>
      <div class='inline' align='center'><a href='#'></a></div>
      <div class='inline' align='center'></div>
      <hr>




      <span><a href=''>Clique aqui para vizualizar no sistema</a>
      <h6  align='right'><span><span></h6>

      </body>
      </html>
      ";

      if (!$mail->send()) {
        echo "Erro: " . $mail->ErrorInfo;
      } else {
        echo "Mensagem enviada!";
      }
?>
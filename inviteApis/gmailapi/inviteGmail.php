<?php
  $emails = @$_POST['emails'];
  if(empty($emails)) 
  {
    echo("You didn't select any email.");
  } 
  else 
  {
    $n = count($emails);

    echo("You have invited $n friend(s) to use Lugattj: ");
    for($i=0; $i < $n; $i++)
    {
      	echo($emails[$i] . "<br>");
      	
		$sendTo = "{$emails[$i]}";
		$subject = "Lugattj.Com";
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-Type: text/plain;charset=charset=utf-8\n";
		$headers = "From: Lugattj.Com <admin@lugattj.com>\r\n";
		$headers .= "Reply-To: noreply@lugattj.com\r\n";
		$headers .= "Return-path: noreply@lugattj.com";
		$message .= 'Hi,
		
		You are invited to use our lugattj.com.
		
		Lugattj.com provides four direction dictionary of Tajik language.
		
		Administrator
		
		Lugattj.com
		
		';
		
		mail($sendTo, $subject, $message, $headers);
    }
  }
?>

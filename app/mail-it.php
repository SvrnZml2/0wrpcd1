<?php
if(isset($_POST['submit']))
{
	$secretKey = "6Lfa_2sUAAAAAHP9uhDxFCUaFKELObg31Y6Vu70k";
	$responseKey = $_POST['g-recaptcha-response'];
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey";
	$response = file_get_contents($url);
	$response = json_decode($response);
	if($response->success)
	echo "Vérification valide";
	else
	echo "Vérification invalide";
}
/* Gestion du formulaire de contact */

$send_to = "contact@warp-code.fr";
$send_subject = "Message contact www.warp-code.fr";



$f_name = cleanupentries($_POST["name"]);
$f_email = cleanupentries($_POST["email"]);
$f_message = cleanupentries($_POST["message"]);
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];

function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);

	return $entry;
}

$message = "Ce mail a été transmis le " . date('d-m-Y') . 
"\n\nNom de l'expéditeur: " . $f_name . 
"\n\nE-Mail de l'expéditeur: " . $f_email . 
"\n\nMessage: \n" . $f_message . 
"\n\n\nDétails technique du mail reçu:\n" . $from_ip . "\n" . $from_browser;

$send_subject .= " - {$f_name}";

$headers = "From: " . $f_email . "\r\n" .
    "Reply-To: " . $f_email . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

if (!$f_email) {
	echo "Aucun E-mail";
	exit;
}else if (!$f_name){
	echo "Aucun Nom";
	exit;
}else{
	if (filter_var($f_email, FILTER_VALIDATE_EMAIL)) {
		mail($send_to, $send_subject, $message, $headers);
		echo "true";
	}else{
		echo "E-mail invalide !";
		exit;
	}
}

?>
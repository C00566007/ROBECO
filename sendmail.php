<?php

//////////////////////////////////////////////////////////////////////////////////////
//
// configuration variables
//
//////////////////////////////////////////////////////////////////////////////////////

// List all domains, including posible subdomains (e.g. www.) that are allowed to submit
// requests to this script and the domains of any posible recipient email address.

$validReferrers = array('www.gmail.com','gmail.com','aol.com','www.aol.com','ascotproducts.com','www.robecoinc.com','susansconsignmentjewelry.com','www.susansconsignmentjewelry.com');

// Use the this array (or create new arrays with a different association) to replace
// setting fields in the form. Don't delete the 'default' array.


$formAction['default'] = array(
	'recipient' => 'susan123westlake@gmail.com',
	'subject' => 'Message from robeco.com',
	'redirect' => 'http://www.robecoinc.com/NEW-SITE/index.php',
	'email' => 'susan123westlake@gmail.com',
	'realname' => 'Website Message',
	'required' => '',
	'format' => 'text',
	'sesrep_max_items' => '15',
);

// If set to 0, the form can set the email recipient. For security reasons you should
// set this variable to 1.

$disableFormRecipients = 1;

//////////////////////////////////////////////////////////////////////////////////////
//
// Start of code
// Don't edit below this line
//
//////////////////////////////////////////////////////////////////////////////////////

$pageHdr = "<html><head><style>td {font: x-small, verdana, arial, helvetica, sans-serif;} h1 {font-size: medium;} .err {color: #EE0000; font-weight: bold;}</style></head><body bgcolor=#FFFFFF><table width='500' align=center><tr><td>";
$pageFtr = "</td></tr>\n</body></html>";



$HTTP_REF = getenv('HTTP_REFERER');
$a = preg_replace("/https?:\/\//","",$HTTP_REF);
$a = explode("/",$a);
$a = array_shift($a);

if(!in_array($a,$validReferrers)) {
	print "$pageHdr<p class=err>Invalid Referrer '$a'</p><p>Referrer does not have permission to access this Script.<p>$pageFtr";
	exit;
}

if(($_POST['form_action'] == '') || ($formAction[$_POST['form_action']]['recipient'] == '')) {
	$fAIndex = 'default';
} else {
	$fAIndex = $_POST['form_action'];
}

$recipient  = (!$disableFormRecipients && ($_POST['recipient'] != '')) ? $_POST['recipient'] : $formAction[$fAIndex]['recipient'];
$subject  = ($_POST['subject'] != '') ? $_POST['subject'] : $formAction[$fAIndex]['subject'];
$redirect = ($_POST['redirect'] != '') ? $_POST['redirect'] : $formAction[$fAIndex]['redirect'];
$email = ($_POST['email'] != '') ? $_POST['email'] : $formAction[$fAIndex]['email'];
$realname = ($_POST['realname'] != '') ? $_POST['realname'] : $formAction[$fAIndex]['realname'];
$recipient_cc  = (!$disableFormRecipients && ($_POST['recipient_cc'] != '')) ? $_POST['recipient_cc'] : $formAction[$fAIndex]['recipient_cc'];
$recipient_bcc  = (!$disableFormRecipients && ($_POST['recipient_bcc'] != '')) ? $_POST['recipient_bcc'] : $formAction[$fAIndex]['recipient_bcc'];
$format = ($_POST['format'] != '') ? $_POST['format'] : $formAction[$fAIndex]['format'];
$required  = ($_POST['required'] != '') ? $_POST['required'] : $formAction[$fAIndex]['required'];
$sesrep_max_items  = ($_POST['sesrep_max_items'] != '') ? $_POST['sesrep_max_items'] : $formAction[$fAIndex]['sesrep_max_items'];
$recipient_secured  = ($_POST['recipient_secured'] != '') ? $_POST['recipient_secured'] : $formAction[$fAIndex]['recipient_secured'];

$a = explode("@",$recipient);
$a = array_pop($a);
if(!in_array($a,$validReferrers)) {
	print "$pageHdr<p class=err>Invalid Referrer '$a'</p><p>Referrer does not have permission to access this Script.<p>$pageFtr";
	exit;
}


$rccArray = explode(",",$recipient_cc);
$recipient_cc = '';
if($rccArray[0] != '') {
	foreach($rccArray as $rcc) {
		$a = explode("@",$rcc);
		$a = array_pop($a);
		if(in_array($a,$validReferrers)) {
			$recipient_cc .= "$rcc,";
		}
	}
}
$recipient_cc = substr($recipient_cc,0,-1);

$rbccArray = explode(",",$recipient_bcc);
$recipient_bcc = '';
if($rbccArray[0] != '') {
	foreach($rbccArray as $rbcc) {
		$a = explode("@",$rbcc);
		$a = array_pop($a);
		if(in_array($a,$validReferrers)) {
			$recipient_bcc .= "$rbcc,";
		}
	}
}
$recipient_bcc = substr($recipient_bcc,0,-1);

$a = explode(",",$required);
if($a[0] != '') {
	foreach($a as $req) {
		if($_POST[$req] == '') {
			print "$pageHdr<p class=err>Required Field '$req' is missing!</p><p> You must input a value for this field before submitting<p align=center><a href=\"".$HTTP_REFERER."\">back to form</a>$pageFtr";
			exit;
		}
	}
}


$htmlFormat = (strtolower(substr($format,0,1)) == 'h');

$msg = '';
if($htmlFormat) {
	$msg = "<html><head><style>td {font: x-small, verdana, arial, helvetica, sans-serif;} .fldname {font-weight:bold;font-size:x-small;} .flddata {font-size:x-small;} .tblhdr { font-size:x-small;font-weight:bold;color:#FFFFFF;background-color=#000088}</style></head><body>\n";
	$msg .= "<table border=0 cellspacing=0 cellpadding=0 width=640>\n";
	$msg .= "<tr><td colspan=3 class='tblhdr'>Message from your web site:</td></tr>\n";
} else {
	$msg = "Form data\n\n";
}

$bl0 = '';
$bl1 = '';
$ld = ' ';
$el = "\n\n";

$creditStrAdd = '';

if($htmlFormat) {
	$bl0 = '<tr bgcolor=#E8E8FF><td class="fldname" valign=top>';
	$bl1 = '<tr bgcolor=#FFFFFF><td class="fldname" valign=top>';
	$ld = '</td><td> &nbsp; </td><td width=80% class="flddata">';
	$el = "</td></tr>\n";
}
$i = 0;
foreach($_POST as $k => $v) {
	if($htmlFormat) {
		$v = str_replace("\n","<br>\n",$v);
	}
	if($i) {
		$msg .= "$bl0$k:$ld$v$el";
	} else {
		$msg .= "$bl1$k:$ld$v$el";
	}
	$i = !$i;
}


if($htmlFormat) {
	$msg .= "<tr><td colspan=3>&nbsp;</td></tr><tr><td colspan=3 align=center>Generated by<br>robeco.com<td></tr></table></body></html>\n";
} else {
	$msg .= "\n\nGenerated by Website$creditStrAdd\n";
}

//**********************************************

function strip_newlines($var) {

$var = preg_replace("/\r/", "", $var);
$var = preg_replace("/\n/", "", $var);

return $var;
}

//**********************************************

if (! preg_match("/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i", $recipient, $result)) {echo "Invalid recipient"; exit;}
if (strlen($recipient) > 80 or strlen($recipient_cc) > 200 or strlen($recipient_bcc) > 200) {exit;}
if(stristr($subject, "Bcc:") or stristr($subject, "cc:")) {echo "Invalid content in subject"; exit;}
if(stristr($msg, "Bcc:") or stristr($msg, "cc:")) {echo "Invalid content in message"; exit;}
if(stristr($realname, "Bcc:") or stristr($realname, "cc:")) {echo "Invalid content"; exit;}
if(stristr($email, "Bcc:") or stristr($email, "cc:")) {echo "Invalid content"; exit;}


$extraHeaders = "";
if($email != '') { $extraHeaders .= "From: \"".addslashes($realname)."\" <". strip_newlines($email) .">\r\n"; }
if($realname != '') { $extraHeaders .= "Reply-To:" . strip_newlines($email) ."\r\n"; }
if($htmlFormat == 'h') { $extraHeaders .= "Content-type: text/html\r\n"; }
if($recipient_cc != '') { $extraHeaders .= "Cc: ". strip_newlines($recipient_cc) ."\r\n"; }
if($recipient_bcc != '') { $extraHeaders .= "Bcc: ". strip_newlines($recipient_bcc) ."\r\n"; }

$success = 1;
$success = mail($recipient,$subject,$msg,$extraHeaders);


//print "mail($recipient,$subject,$msg,$extraHeaders)";
//print "$msg";

//header("Location: $redirect");

echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('Thanks for the message! Please hit back on your browswer to return.');self.close();</script>";

?>
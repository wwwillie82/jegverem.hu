<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- written by Voov (www.voov.hu), copyright 2011 -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sputnik by Voov</title>
    <meta name="title" content="Sputnik by Voov"/>
    <meta name="Keywords" lang="HU" content="" />
    <meta name="Description" lang="HU" content="" />
    <meta name="Revisit-After" content="3 days"/>
    <meta name="Expires" content="3 days"/>
    <meta http-equiv="Content-Language" content="HU"/>
    <meta http-equiv="Cache-Control" content="no-cache"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta name="Robots" content="index,follow"/>
    <meta http-equiv="Imagetoolbar" content="no"/>
    <meta name="Owner" content="Voov Kft. (www.voov.hu)"/>
    <meta name="Copyright" content="Copyright (c) 2011 Voov Kft., All Rights Reserved"/>
    <meta name="Author" content="Voov Kft. (www.voov.hu)"/>
    <meta name="Designer" content="Voov Kft. (www.voov.hu)"/>

    <link href="favicon.ico" rel="shortcut icon"/>
    <link href="apple-touch-icon.png" rel="apple-touch-icon"/>
	<link href="/css/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/css/main_admin.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/css/uniform.admin.css" rel="stylesheet" type="text/css" media="screen"/>

	<!--[if IE]>
    <link href="/css/ie_fix.css" rel="stylesheet" type="text/css" media="screen"/>
    <![endif]-->

    <!--[if IE 6]>
    <link href="/css/ie6_fix.css" rel="stylesheet" type="text/css" media="screen"/>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

	<script src="/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="/ckeditor/adapters/jquery.js" type="text/javascript"></script>

	<script type="text/javascript" src="/js/externalload.js"></script>
	<script type="text/javascript" src="/js/sessiontimer.js"></script>

    <script src="/js/cufon-yui.js" type="text/javascript"></script>
    <script src="/js/breuer-headline.js" type="text/javascript"></script>
    <script src="/js/breuer-text.js" type="text/javascript"></script>
    <script src="/js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/jquery.tipsy.js" type="text/javascript"></script>
    <script src="/js/sputnik.js" type="text/javascript"></script>
	<script src="/js/jquery.tmpl.js" type="text/javascript"></script>
    <script type="text/javascript">

	    function DeleteRow() {
		    return confirm('<?= Localization::_("Biztosan szeretnéd törölni?") ?>');
	    }

    	$(document).ready(function(){
    		$('#tipsy-title,#tipsy-short').tipsy({gravity: 's'});
    	});
    </script>

    <!--[if IE 6]>
    <script src="/js/browser_upgrade_notification.js" type="text/javascript" charset="utf-8"></script>
    <![endif]-->
</head>
<body>

<!-- container -->
<div id="container">
	<!-- position -->
	<div id="position">
		<!-- header -->
		<div id="header">
			<div class="logo">
				<h1><a href="/admin">Jégverem</a></h1>
				<h2><a href="/admin">Sputnik by Voov</a></h2>

				<a href="/" class="btn_view_site">Oldal megtekintése</a>
				<br class="clearfix" />
			</div>

			<div class="usermenu">
				<?= Localization::_("Mi újság") ?>,
				<span><?= Auth::GI()->GetUserSession()->GetUsername() ?>?</span>

				<a href="<?= URI::MakeURL("admin/index", array("user_logout" => "true")) ?>"><?= Localization::_("Kijelentkezés") ?></a>
			</div>

			<div class="timelock">
				<?= Localization::_("Időzár") ?><br /><span id="session_timer">10:00</span>
				<a href="#" class="btn_refresh" onclick="RefreshSession(); return false;"><?= Localization::_("Frissítés") ?></a>
			</div>
		</div>
		<!-- eof header -->

		<!-- middle -->
		<div id="middle">
			<div class="top">
				<h2><?= implode(" &gt; ", ModuleHelper::GetBreadcrumb()) ?></h2>

				<div class="language">
					<?= Localization::_("Szerkesztett nyelv") ?>
					<div class="select">
						<select onchange="GoToURL(this, '/admin/changelanguage/');">
							<? foreach($lang_select as $lang): ?>
							<option value="<?= $lang->id ?>" <? if($lang->selected == true): ?> selected="selected" <? endif; ?>><?= $lang->name ?></option>
							<? endforeach; ?>
						</select>
					</div>
				</div>
			</div>

			<!-- content -->
			<div class="content">
				<!-- sidebar -->
				<div class="sidebar">
					<div class="menu">
						<ul>
							<? foreach($root_menu->GetMenuItems() as $MenuItem): ?>
								<? if($MenuItem->IsActive()): ?>
									<li><a href="<?= $MenuItem->GetLink() ?>" class="on"><?= $MenuItem->GetName() ?></a>
									
									<? if(count($MenuItem->GetMenuItems()) > 0):
											$submenuCounter=0;
											?>
										<ul>
											<? foreach($MenuItem->GetMenuItems() as $SubMenuItem): ?>
											<?

												$class =  array();
												if($SubMenuItem->IsActive()) $class[] = "on";
												if(count($MenuItem->GetMenuItems()) == $submenuCounter+1) $class[] = "last";
												$submenuCounter++;
											?>

											<li><a href="<?= $SubMenuItem->GetLink() ?>" class="<?= implode(" ", $class) ?>"><?= $SubMenuItem->GetName() ?></a></li>
											<? endforeach; ?>
										</ul>
									<? endif; ?>
									</li>
								<? else: ?>
									<li><a href="<?= $MenuItem->GetLink() ?>"><?= $MenuItem->GetName() ?></a></li>
								<? endif; ?>
							<? endforeach; ?>
						</ul>
					</div>

					<div class="bugreport">
						<a href="mailto:office@voov.hu" class="btn_hibajelentes">Hibabejelentés</a>
					</div>

					<div class="stat">
						<p>Sputnik Framework<br />
						&copy; Copyright Voov Ltd.<br />
						All rights reserved.</p>

						<p>Loaded: <?= round(microtime(true) - $load_time, 3) ?>s<br />
						SQL: <?= Db::GetInstance()->GetQueryCount(); ?> queries<br />
						build: v.<?= SPUTNIK_VERSION ?></p>
					</div>
				</div>
				<!-- eof sidebar -->

				<!-- main -->
				<div class="main">
					<? if(Sessions::GetInstance()->GetFlashdata("acl_error")): ?>
					<div class="status warning"><?= Sessions::GetInstance()->GetFlashdata("acl_error") ?></div>
					<? endif; ?>

					<?= $load ?>
				</div>
				<!-- eof main -->

				<br class="clearfix" />
			</div>
			<!-- eof content -->
			<div class="bottom"></div>
		</div>
		<!-- eof middle -->
	</div>
	<!-- eof position -->
</div>
<!-- eof container -->

</body>
</html>
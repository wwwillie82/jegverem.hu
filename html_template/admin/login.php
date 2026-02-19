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
    <meta name="Robots" content="noindex,nofollow"/>
    <meta http-equiv="Imagetoolbar" content="no"/>
    <meta name="Owner" content="Voov Kft. (www.voov.hu)"/>
    <meta name="Copyright" content="Copyright (c) 2011 Voov Kft., All Rights Reserved"/>
    <meta name="Author" content="Voov Kft. (www.voov.hu)"/>
    <meta name="Designer" content="Voov Kft. (www.voov.hu)"/>

    <link href="favicon.ico" rel="shortcut icon"/>
    <link href="apple-touch-icon.png" rel="apple-touch-icon"/>
    <link href="/css/main_admin.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="/css/uniform.admin.css" rel="stylesheet" type="text/css" media="screen"/>

	<!--[if IE]>
    <link href="/css/ie_fix.css" rel="stylesheet" type="text/css" media="screen"/>
    <![endif]-->
    
    <!--[if IE 6]>
    <link href="/css/ie6_fix.css" rel="stylesheet" type="text/css" media="screen"/>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js" type="text/javascript"></script>
    <script src="/js/cufon-yui.js" type="text/javascript"></script>
    <script src="/js/breuer-headline.js" type="text/javascript"></script>
    <script src="/js/breuer-text.js" type="text/javascript"></script>
    <script src="/js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/sputnik.js" type="text/javascript"></script>
    
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
		<div id="header_login">
			<div class="logo">
				<h1><a href="/admin">Jégverem</a></h1>
				<h2><a href="/admin">Sputnik by Voov</a></h2>
				
				<a href="/" class="btn_view_site">Oldal megtekintése</a>
				<br class="clearfix" />
			</div>
		</div>
		<!-- eof header -->
		
		<!-- login -->
		<div id="login">
			<div class="icon"></div>
			<h2>Bejelentkezés</h2>
			
			<div class="form">
				<?= Form::StartForm("authentication", $_SERVER["HTTP_REFERER"]) ?>
					<div class="item">
						<label>Felhasználónév</label>
						<input type="text" name="username" value="" class="field" />
						<br class="clearfix" />
					</div>
			
					<div class="item">
						<label>Jelszó</label>
						<input type="password" name="password" value="" class="field" />
						<br class="clearfix" />
					</div>
					
					<div class="submit_holder">
						<input type="submit" name="submitLogin" value="Belépés" class="submit" />	
					</div>
				<?= Form::EndForm() ?>
				
				<div class="lost_password">
					<!-- <a href="#">Elfelejtett jelszó</a> -->
					<?= Sessions::GetInstance()->GetFlashdata("authentication_statustext") ?>
				</div>
			</div>
		</div>
		<!-- eof login -->
	</div>
	<!-- eof position -->	
</div>
<!-- eof container -->

</body>
</html>
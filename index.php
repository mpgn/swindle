<?php
require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_YouTubeAnalyticsService.php';
require_once 'google-api-php-client/src/contrib/Google_YouTubeService.php';
require_once 'google-api-php-client/src/contrib/Google_Oauth2Service.php';

// Set your cached access token. Remember to replace $_SESSION with a
// real database or memcached.
session_start();


if( isset($_SESSION['compteur']) ) {
	$_SESSION['compteur']++;
} else {
	$_SESSION['compteur'] = 1;
}

$client = new Google_Client();
$client->setApplicationName('Google+ PHP Starter Application');
// Visit https://code.google.com/apis/console?api=plus to generate your
// client id, client secret, and to register your redirect uri.
$client->setClientId('51738669390-3fn163catmb90mg77gjc7nfv2daq2pu1.apps.googleusercontent.com');
$client->setClientSecret('R9da4BTPZoli_npWbVpIUPLD');
$client->setRedirectUri('http://localhost/swindle-api/index.php');
$client->setDeveloperKey('AIzaSyArvWv0qpLy30RbKKLpjWXge1y8B0u5vWc');
$youtube = new Google_YouTubeAnalyticsService($client);
$service = new Google_YouTubeService($client);
$auth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate();

  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
}

if ($client->getAccessToken()) {

	$step = 1;
	/***************USER YOUTUBE ID********************/

  	$data = $service->channels->listChannels('snippet', array('mine' => 'true',));
  	$idde = $data['items'][0]['id'];

  	/***************USER YOUTUBE ID********************/

  	/***************USER INFO********************/
	$userauth = $auth2->userinfo->get();

	$channelName = $userauth['name'];
	$firstName = $userauth['given_name'];
	$lastName = $userauth['family_name'];
	$email = $userauth['email'];

	/***************USER INFO********************/


	/***************USER STATS********************/
	$today = date("Y-m-d");
	$datePast = date('Y-m-d', strtotime("-1 month"));
  	$activities = $youtube->reports->query('channel=='.$idde.'', $datePast , $today, 'views', array('dimensions' => 'day'));
  
	$average = 0;
  	foreach ($activities['rows'] as $value) {
  		$average += $value[1];
  	}
  	$average = $average/count($activities['rows']);


  	/***************USER STATS********************/

  $_SESSION['token'] = $client->getAccessToken();
} else {


  $step = 0;
  $authUrl = $client->createAuthUrl();

}
?>

<!DOCTYPE html>
<html>
  <head>
	<title>Project Swindle API</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
  </head>
<body>

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Swindle Porject</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">

    	<ul class="nav nav-pills">
		  	<li class="active"><h4><span class="label label-default">Youtube Connection <span class="glyphicon glyphicon-zoom-out"></span></span></h4></li>
		  	<li><h4><span class="label label-default">Verify Information <span class="glyphicon glyphicon-pencil"></span></span></h4></li>
		  	<li><h4><span class="label label-default">Welcome to Ferox <span class="glyphicon glyphicon-star"></span></span></h4></li>
		</ul>

    	<?php if($_SESSION['compteur'] == 1): ?>

		    <!-- Main component for a primary marketing message or call to action -->
		    <div id="home">
			    <div class="well">
			        <h2>Connection to YouTube</h2>
			        <p>Thank you for deciding to join ... Network, to get started with the application process please authorize our system with your YouTube/Google account.</p>
					<p>When you connect your account to our system, our web platform will analyze your analytics on your account and review if you meet our set requirements. The system also gets your channels basic contact information like name and email address. Our system utilzies the YouTube & Google API system so that all of your information is secure.</p>
					<p>	Our system will retrive the following information from your account:</p>
					<ul>
						<li>Full Name</li>
						<li>Username</li>
						<li>Email Address</li>
						<li>Analytic Reports</li>
					</ul>
					<div style="text-align:center;">
			        	<a href="<?php echo $authUrl; ?>" class="btn btn-lg btn-primary pagination-centered" role="button">Connect to YouTube</a>
			        </div>
			    </div>
		    </div>

		<?php endif; ?>
		<?php if($_SESSION['compteur'] == 3):?>

			<div id="verify">
			    <!-- Main component for a primary marketing message or call to action -->
			    <div class="well">
			        <h2>Verify Information </h2>

			        <h3>Process Channel </h3>
			        <p>Information about your YouTube Channel :</p>
					<ul>
						<li>Full Name : <?php echo $firstName . " " . $lastName; ?></li>
						<li>Username : <?php echo $channelName; ?></li>
						<li>Email Address : <?php echo $email; ?></li>
						<li>Analytic Reports Average : <?php echo round($average). " views per day for one months"; ?></li>
					</ul>
					<?php 
						if(round($average) > 150)
							echo '<h3 style="text-align:center;">You can apply for a partnership  <span class="glyphicon glyphicon-ok"></span></h3>				
							<div style="text-align:center;">
			        			<a href="index.php" class="btn btn-lg btn-primary pagination-centered" role="button">Next Step</a>
			        		</div>';
						else
							echo '<p>Thank you for interest in partnering with ..., but unfortunately your account is not currently eligible to partner with our YouTube Network.
									<p>We\'re sorry but your current YouTube channel is not eligible to partner with our network. You can try again with another YouTube account you feel may meet our requirements by clicking "Disconnect your account" at the bottom of this page. We hope that you will apply again in the coming months and hopefully you will be eligible then, we thank you for your interest with Ferox and good luck with your YouTube venture. </p>
									<p>Once again we wish you all the best with your YouTube channel, and we hope to see you again soon.</p>
								<div style="text-align:center;">
			        				<a class="btn btn-lg btn-primary pagination-centered" disabled="disabled" role="button">Next Step</a>
			        			</div>';
					?>
			    </div>
		    </div>

		<?php endif; ?>
		<?php if($_SESSION['compteur'] > 3):?>

			<div id="finally">
			    <!-- Main component for a primary marketing message or call to action -->
			    <div class="well">
			        <h2>Welcome to Ferox Network</h2>
					 	
			    </div>
		    </div>

		<?php unset($_SESSION['count']); endif; ?>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <script type="text/javascript">


    </script>
  </body>

</html>
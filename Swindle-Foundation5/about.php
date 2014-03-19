<!doctype html>
<html class="no-js" lang="en">
  	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	    <title>Swindle-API</title>
	    <link rel="stylesheet" href="stylesheets/foundation.css" />
	    <link rel="icon" type="image/png" href="images/logo.png" />
	    <script src="bower_components/modernizr/modernizr.js"></script>
  	</head>

  	<body>
        <div class="contain-to-grid">
            <nav class="top-bar" data-topbar>
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="index.php">Swindle-API</a></h1>
                    </li>
                    <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
                </ul>

              <section class="top-bar-section">
                <!-- Left Nav Section -->
                <ul class="left">
                    <li class="divider"></li>
                    <li><a href="index.php">Home</a></li>
                    <li class="divider"></li>
                    <li class="active"><a href="about.php">About</a></li>
                    <li class="divider"></li>
                </ul>
                <!-- Right Nav Section -->
                <ul class="right">

                </ul>
              </section>
            </nav>
        </div>  	

  		<div class="row">
  			<div class="panel">
  				<p>Application Swindle-API is under <a href="https://github.com/martialdidit/swindle-api/blob/master/LICENSE">Licence MIT</a> created by @martialdidit & @LuminusDev with Youtube API V3 and YouTube Analytics API<br>
  				</p>
		        <ul>
		          <li><p>Follow this application on <a href="https://github.com/martialdidit/swindle-api">Github</a>. </p></li>
		          <li><p>For any help, creat your own issue on <a href="https://github.com/martialdidit/swindle-api/issues">Swindle-api Issues</a></p></li>
		        </ul>

		        <hr>
		        <ul>
					<li>
						<p>Using this application, requires creating your own application on <a href="https://cloud.google.com/console#/project">Google console</a> 
			          	, You also need to generate your client id, client secret, and to register your redirect uri. - <small><a href="https://developers.google.com/console/help/new/"> more informations</a></small>. 
			          	Place this information in the file <code>inc.config.php</code>
			        	</p>
				       	<p>
				            <code>
					            $client->setClientId('client_id');<br>
					            $client->setClientSecret('client_secret');<br>
					            $client->setRedirectUri('redirect_uri');<br>
					            $client->setDeveloperKey('developer_key');<br>
				            </code>
				        </p>
			        </li>
			        <li>
				        <p>You also need to create a database. Run the script <code>swindle.sql</code> to install her. Enter informations in the file <code>adduser.php </code></p>
				        <p>
					        <code>
				                $host = "your_host";<br>
				                $dbname = "db_name";<br>
				                $user = "user";<br>
				                $password = "your_pass";<br>
			            	</code>
						</p>
					</li>
					<li>
						<p>Finally, enter the requirement to enter in the network :</p>
						<p>
							<code>
			                    $nbView = 100;<br>
			                    $nbSubscriber = 10; <br>
			                    $nbVideo = 100;<br>
			                    $period = 30; //days<br>
			                <br>
		            		</code>
		            	</p>
		            </li>
	            </ul>
	            <hr>
            	<p>Hope this application help you in your project ! <small> - Team Swindle </small></p>
		  	</div>
		  	<p class="text-right"><b>&copy; Team Swindle 2013</b></p>
		  </div>
	      
  	
	    <script src="bower_components/jquery/jquery.js"></script>
	    <script src="bower_components/foundation/js/foundation.min.js"></script>
	    <script src="js/app.js"></script>
  	</body>
</html>
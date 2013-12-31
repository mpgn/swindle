<!DOCTYPE html>
<html>
  <head>
  <title>Project Swindle API</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="img/logo.png" />

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
          <a class="navbar-brand" href="index.php">Swindle-API <span class="glyphicon glyphicon-send"></span></a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li class="active"><a href="about.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="well">
        <p>Application Swindle-API created by @martialdidit & @LuminusDev with Youtube API V3 and YouTube Analytics API</p>
        <ul>
          <li><p>Follow this application on <a href="https://github.com/martialdidit/swindle-api">Github</a>. </p></li>
          <li><p>For any help, creat your own issue on <a href="https://github.com/martialdidit/swindle-api/issues">Swindle-api Issues</a></p></li>
        </ul>

        <div class="alert alert-danger" style="background-color:white">

          <p style='font-size: 18px;'><span class="glyphicon glyphicon-warning-sign" style='font-size: 30px'></span><span style="color:black">&nbsp Using this application, requires creating your own application on <a href="https://cloud.google.com/console#/project">Google console</a> 
          , You also need to generate your client id, client secret, and to register your redirect uri. - <small><a href="https://developers.google.com/console/help/new/"> more informations</a></small>. Place this information in the file <code>api.php</code></span>
          </p>

          <p>
          <br>
            <code>
              ...<br>
              $client->setClientId('client_id');<br>
              $client->setClientSecret('client_secret');<br>
              $client->setRedirectUri('redirect_uri');<br>
              $client->setDeveloperKey('developer_key');<br>
              ...<br>
            </code>
          </p>
        
        <p style='font-size: 18px;'><span style="color:black">You also need to create a database. Run the script <b>swindle.sql</b> to install her. Enter informations in the file <b>adduser.php</b></span></p>
        <code>
          ...<br>
          $host = "yout_host";<br>
          $dbname = "db_name";<br>
          $user = "user";<br>
          $password = "your_pass";<br>
        </code>
        </div>

      <p>Hope this application help you in your project ! <small style="color:grey"> - Team Swindle </small></map></p>
      </div>
      <p class="text-right"><b>&copy; Team Swindle <span class="glyphicon glyphicon-send"></span> 2013</b></p>
    </div>

  </body>
</html>

<?php
    //verification du fichier de configuration inc.config.php
    try {
        if (!file_exists('inc.config.php')) {
            throw new Exception ('functions.php does not exist');
        }
        else {
            require_once 'inc.config.php';
            require_once 'api.php';
        }
    } catch(Exception $e) {  
        header('Location: error.php');  
        exit;
    }
?>
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
          <a class="navbar-brand" href="#"> Swindle-API <span class="glyphicon glyphicon-send"></span> </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a>Home</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
            <div class="progress">
                <div class="progress_1 progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                Youtube Connection <span class="glyphicon glyphicon-zoom-out">
                </div>
            <div class="progress_2 progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 35%">
                Verify Information <span class="glyphicon glyphicon-pencil"></span>
            </div>
            <div class="progress_3 progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                Welcome to Kevin Corporation <span class="glyphicon glyphicon-star"></span>
            </div>
        </div>

        <?php if(!isset($_SESSION['token'])): ?>
            <!-- Main component for a primary marketing message or call to action -->
            <div id="home">
                <div class="well">
                    <h2>Connection to YouTube</h2>
                    <p>Thank you for deciding to join the Kevin Corporation, to get started with the application process please authorize our system with your YouTube/Google account.</p>
                    <p>When you connect your account to our system, our web platform will analyze your analytics on your account and review if you meet our set requirements. The system also gets your channels basic contact information like name and email address. Our system utilzies the YouTube & Google API system so that all of your information is secure.</p>
                    <p> Our system will retrive the following information from your account:</p>
                    <ul>
                        <li>Full Name</li>
                        <li>Username</li>
                        <li>Email Address</li>
                        <li>Analytic Reports</li>
                    </ul>
                    <div style="text-align:center;">
                        <a href="<?php echo $authUrl; ?>" class="btn btn-lg btn-info pagination-centered" role="button">Connect to YouTube <span class="glyphicon glyphicon-log-in"></span></a>
                    </div>
                </div>
            </div>

        <?php else: ?>
            <div id="verify">
                <!-- Main component for a primary marketing message or call to action -->
                <div class="well">

                    <h2>Verify Information </h2>
                    <p>Information about your YouTube Channel :</p>
                    <ul>
                        <li>Full Name : <?php echo $_SESSION['username'] = $firstName . " " . $lastName; ?></li>
                        <li>Username : <?php echo $_SESSION['fullname'] = $channelName; ?></li>
                        <li>Email Address : <?php echo $email; ?> </li>
                        <li>Analytic Reports Average : <?php $_SESSION['stats'] = round($average); echo round($average). " views per day"; ?></li>
                    </ul>
                    <?php if(round($average) >= $nbView && $nbVideoCount >= $nbVideo && $nbSubscriberCount >= $nbSubscriber): ?>
                            <hr>
                            <h3 style="text-align:center; color:green">Congratulation ! </h3>
                            <p>
                                Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.
                            </p>    
                            <hr>    
                            <form method="post" action="#" id="forminfo">
                                <?php 
                                    if(!strpos($email, '@pages.plusgoogle.com')) {
                                        $_SESSION['email'] = $email;
                                    }
                                    else {
                                        echo "<p style='margin-left: 14.5%''><span style='color:red'>Your email seems to be wrong, enter new email : </span><input type='text' name='email'/><p>";
                                    }
                                ?>
                                <p style="margin-left: 35%"><span style="color:red">Your skype : </span><input type="text" name="skype"/><p>
                                <div style="text-align:center">
                                    <button type="submit" class="change btn btn-lg btn-info">
                                        Apply Now <span class="glyphicon glyphicon-send"></span>
                                    </button>
                                    <div class="erreur alert alert-danger" style="display:none"></div>
                                </div>
                            </form>
                    <?php else: ?>
                            <hr>
                            <p>Thank you for interest in partnering with Kevin Corporation, but unfortunately your account is not currently eligible to partner with our YouTube Network.
                                    <p>We\'re sorry but your current YouTube channel is not eligible to partner with our network. You can try again with another YouTube account you feel may meet our requirements by clicking "Disconnect your account" at the bottom of this page. We hope that you will apply again in the coming months and hopefully you will be eligible then, we thank you for your interest with Ferox and good luck with your YouTube venture. </p>
                                    <p>Once again we wish you all the best with your YouTube channel, and we hope to see you again soon.</p>
                            <hr>
                            
                            <div style="text-align:center;">
                                <a class="btn btn-lg btn-info pagination-centered" disabled="disabled" role="button">Apply</a>
                            </div>
                            
                    <?php endif; ?>
                </div>
            </div>


            <div id="finally" style="display:none">
                <!-- Main component for a primary marketing message or call to action -->
                <div class="well">
                    <h2>Welcome to Ferox Network</h2>

                    <p>
                        Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.
                    </p>
                    <p>
                        Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.
                    </p>                    
                        
                </div>
            </div>
        <?php endif; ?>

        <a href="deco.php" class="btn btn-default pull-left" role="button">Disconnect YouTube</a>

        <p class="text-right"><b>&copy; Team Swindle <span class="glyphicon glyphicon-send"></span> 2013</b></p>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){

            $("#forminfo").submit(function(){
                email = $(this).find("input[name=email]").val();
                skype = $(this).find("input[name=skype]").val();
                $.post("adduser.php", {email: email, skype: skype}, function(data) { 
                    alert(data);   
                    if(data != "ok"){
                        $(".erreur").show();
                        $(".erreur").empty().append(data);
                    }
                    else
                    {
                        $("#verify").hide();
                        $("#finally").show();
                    }

                });
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            if($("#verify").is(":visible"))
            {
                $('.progress_2').removeClass("progress-bar-success");
                $('.progress_2').addClass("progress-bar-info");
            }


            $( ".change" ).click(function() {
              $('.progress_3').removeClass("progress-bar-success");
                $('.progress_3').addClass("progress-bar-info");
            });

        });
   </script>
  </body>

</html>

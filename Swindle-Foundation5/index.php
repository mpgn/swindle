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

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Swindle-API</title>
    <link rel="stylesheet" href="stylesheets/app.css" />
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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="divider"></li>
                    <li><a href="about.php">About</a></li>
                    <li class="divider"></li>
                </ul>
                <!-- Right Nav Section -->
                <ul class="right">

                </ul>
              </section>
            </nav>
        </div>

    <div class="row">
        <h1>Welcome to Kevin Corporation</h1>
    </div>
    
    <div class="row ">
        <div id="step1" class="large-3 medium-3 columns panel callout text-center">
            <h4>Step 1</h4>
            <p>Connect your channel to YouTube</p>
        </div>
        <div id="step2" class="large-3 medium-3 columns panel text-center">
            <h4>Step 2</h4>
            <p>Verify the information from your Youtube Channel</p>
        </div>
        <div id="step3" class="large-3 medium-3 columns panel text-center">
            <h4>Step 3</h4>
            <p>Accept the Review Agreement</p>
        </div> 
        <div id="step4" class="large-3 medium-3 columns panel text-center">
            <h4>Step 4</h4>
            <p>Welcom into  Kevin Corporation</p>
        </div>   
    </div>

    <div class="row">
        <div class="progress large-12 success round">
          <span class="meter" style="width: 25%"></span>
        </div>
    </div>

    <?php if(!isset($_SESSION['token'])): ?>
        <div id="home">
            <div class="row">
                <div class="panel">
                    <h3>Connection to YouTube !</h3>
                    <p class="text-justify">Thank you for deciding to join Kevin Corporation, to get started with the application process please authorize our system with your YouTube/Google account.
                    When you connect your account to our system, our web platform will analyze your analytics on your account and review if you meet our set requirements. The system also gets your channels basic contact information like name and email address. Our system utilzies the YouTube & Google API system so that all of your information is secure.
                    </p>
                    <p class="text-justify">Our system will retrive the following information from your account:</p>
                    <ul>
                        <ul class="disc">
                            <li>Full Name</li>
                            <li>Username</li>
                            <li>Email Address</li>
                            <li>Analytic Reports</li>
                        </ul>
                    </ul>
                    <p class="text-center">
                        <a href="<?php echo $authUrl; ?>" class="button" role="button">Connect to YouTube </a><br/>
                    </p>
                </div>
                <a href="deco.php" class="button left secondary" role="button">Disconnect YouTube</a>
                <p class="text-right"><b>&copy; Team Swindle 2013</b></p>
            </div>
        </div>
    <?php 
    else:
    ?>
        <div id="verify">
            <div class="row">
                <div class="panel">
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
                            <h3 class="text-center">Congratulation ! </h3>
                            <p class="text-justify">
                                Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.
                            </p>     
                            <div data-alert class="erreur alert-box warning" style="display:none"></div>
                            
                            <div class="large-6 small-6 columns">
                                <label>Your skype :</label>
                                <input type="text" placeholder="Your skype" id="skype" name='skype'/>
                            </div>
                            <div class="large-6 small-6 columns">
                                <label>Your email :</label>
                                <input type="text" placeholder="<?php echo $email;?>" id="email" name='email'/>
                            </div>
                            <p class="text-center">
                                <button type="submit" class="change button success">Apply Now</button>
                            </p>
                            
                            </div>
                            <a href="deco.php" class="button left secondary" role="button">Disconnect YouTube</a>
                            <p class="text-right"><b>&copy; Team Swindle 2013</b></p>
                        </div>
                    </div>

                        <div id="agreement" class="hide">
                            <div class="row">
                                <div class="panel">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis, cum, eveniet, aut, magnam illo autem enim aliquam optio expedita velit dicta tempora numquam reiciendis voluptates natus porro quas magni doloremque!</p>
                                    <p>Explicabo, reprehenderit, laudantium, accusamus dolorum suscipit pariatur repellat eaque laborum doloribus officiis ipsum in voluptas porro cumque accusantium officia exercitationem assumenda magni quam temporibus illum quaerat neque perferendis nulla nobis.</p>
                                    <p>Perferendis, inventore, accusamus saepe consequuntur architecto officiis sunt voluptas expedita praesentium dolor deleniti aut voluptatem in illo illum. Dolorum, quas, saepe aliquam accusamus minus recusandae ullam dolor necessitatibus illum aspernatur.</p>
                                    <p>Accusantium, at aliquid sapiente vitae eos aspernatur molestiae nam amet fuga ipsa similique quidem quasi quod. Ratione, illum, non, nihil, saepe iste voluptatem inventore cumque eaque magnam doloremque voluptatum libero!</p>
                                    <p>Itaque, veritatis, maxime, doloremque labore numquam eum blanditiis id alias sit fuga quo nisi esse dolor error magni pariatur corporis. Cupiditate iure obcaecati explicabo inventore voluptas dolore eius ad dolor.</p>
                                    <p>Perspiciatis, quisquam magnam repudiandae rem reprehenderit esse ipsam sequi illo labore possimus. Molestiae, adipisci molestias aut harum dolorem architecto laboriosam officiis porro! Consequuntur repudiandae modi minima placeat. Vero, temporibus, vel?</p>
                                    
                                    <div data-alert class="erreur2 alert-box warning" style="display:none"></div>
                                    
                                    <form method="post" action="#" id="forminfo">
                                        <input type="checkbox" class="check"><label for="checkbox"><h3>I accept the review agreement</h3></label>
                                        <button type="submit" class="button join">Let's Go !</button>
                                    </form>
                                </div>
                                <a href="deco.php" class="button left secondary" role="button">Disconnect YouTube</a>
                                <p class="text-right"><b>&copy; Team Swindle 2013</b></p>
                            </div>
                        </div>
                        <div id="finally" class="hide">
                            <div class="row">
                                <div class="panel">
                                    <h2>Welcome to Kevin Corporation !</h2>
                                    <p class="text-justify">
                                        Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.
                                    </p>
                                    <p class="text-justify">
                                        Constituendi autem sunt qui sint in amicitia fines et quasi termini diligendi. De quibus tres video sententias ferri, quarum nullam probo, unam, ut eodem modo erga amicum adfecti simus, quo erga nosmet ipsos, alteram, ut nostra in amicos benevolentia illorum erga nos benevolentiae pariter aequaliterque respondeat, tertiam, ut, quanti quisque se ipse facit, tanti fiat ab amicis.
                                    </p> 
                                </div>                
                                <a href="deco.php" class="button left secondary" role="button">Disconnect YouTube</a>
                                <p class="text-right"><b>&copy; Team Swindle 2013</b></p>
                            </div>                                                      
                        </div>                      

                    <?php else: ?>
                        <hr>
                        <p class="text-justify">Thank you for interest in partnering with ..., but unfortunately your account is not currently eligible to partner with our YouTube Network.
                                We\'re sorry but your current YouTube channel is not eligible to partner with our network. You can try again with another YouTube account you feel may meet our requirements by clicking "Disconnect your account" at the bottom of this page. We hope that you will apply again in the coming months and hopefully you will be eligible then, we thank you for your interest with Ferox and good luck with your YouTube venture. 
                                Once again we wish you all the best with your YouTube channel, and we hope to see you again soon.
                        </p>
                        <p class="text-center">
                            <a class="button" disabled="disabled" role="button">Apply</a>
                        </p> 
                    </div>
                    <a href="deco.php" class="button left secondary" role="button">Disconnect YouTube</a>
                    <p class="text-right"><b>&copy; Team Swindle 2013</b></p>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?> 

    <script src="bower_components/jquery/jquery.js"></script>
    <script src="bower_components/foundation/js/foundation.min.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript">

        $(function(){

            $("#forminfo").submit(function(){
                email = $("#email").val();  
                skype = $("#skype").val(); 
                if($('.check').is(":checked") && $('#email').val().length != 0 && $('#skype').val().length != 0){
                    $.post("adduser.php", {email: email, skype: skype, verifyUser: true}, function(data) {  
                        if(data != "ok"){
                            $(".erreur2").show();
                            $(".erreur2").html("<p>Error something went wrong with the database. Chek your inc.conf.php...</p>");
                        }
                        else
                        {
                            $("#agreement").hide("slow");                   
                            $("#finally").show("slow");
                            $('#step4').addClass("callout");
                            $('.meter').animate({ width: "100%" }, 'slow');
                        }
                    });
                }
                else
                {
                    $(".erreur2").show();
                    $(".erreur2").html("<p>Error review agreement not checked...</p>");
                }
                return false;
            });
        });
        $(document).ready(function() {

            if($("#verify").is(":visible"))
            {
                $('#step2').addClass("callout");
                $('.meter').animate({ width: "50%" }, 'slow');
            }
            $( ".change" ).click(function() {
                if (($('#email').val().length != 0) && ($('#skype').val().length != 0))
                {
                    $('#step3').addClass("callout");
                    $('.meter').animate({ width: "75%" }, 'slow');
                    $('#verify').hide("slow");
                    $("#agreement").show("slow"); 
                }
                else {
                    $(".erreur").show();
                    $(".erreur").html("<p>Error empty fields...</p>");
                }

            });
        });
   </script>
  </body>
</html>

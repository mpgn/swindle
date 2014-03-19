Swindle-api
===========

/!\ I don't recommand to use swindle-foundation version. Swindle-bootstrap is an old version not updated. You can use it for inspiration off the design but she is not updated since a long time. Also you can use swindle-foundation and creat your own design with boostrap if you want.


Application Swindle-API created by [@martialdidit](https://github.com/martialdidit) & [@LuminusDev](https://github.com/LuminusDev) with Youtube API V3 and YouTube Analytics API

  + For any help, creat your own issue on <a href="https://github.com/martialdidit/swindle-api/issues">Swindle-api Issues</a></p></li>
  
![swindle-API](http://gyazo.com/ee745be6fee436f9aa39ab400b4cab57.png "Application Swindle-API")

***

/!\ Using this application, requires creating your own application on [Google console](https://cloud.google.com/console#/project) 
, You also need to generate your client id, client secret, and to register your redirect uri. - [more informations](https://developers.google.com/console/help/new/) more informations. 

1) Remplace the file `inc.config.php-template` by `inc.config.php`

2) Place this information in the file `inc.config.php`

   
    $client->setClientId('client_id');
    $client->setClientSecret('client_secret');
    $client->setRedirectUri('redirect_uri');
    $client->setDeveloperKey('developer_key');
      

***

3) You also need to create a database. Run the script `swindle.sql` to install her.
   Enter informations in the file `inc.config.php`
```
	$host = "your_host";
	$dbname = "db_name";
	$user = "user";
	$password = "your_pass";
```

3) Finally, enter the requirement to enter in the network.
```
  $nbView = 100;
  $nbSubscriber = 10; 
  $nbVideo = 100;
  $period = 30; //days
```

Hope this application help you in your project ! - Team Swindle 

[swindle-API Licence MIT](http://opensource.org/licenses/MIT)


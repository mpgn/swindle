Swindle-api
===========

## Requirements

  * Ruby 1.9+
  * [Node.js](http://nodejs.org)
  * [compass](http://compass-style.org/): `gem install compass`
  * [bower](http://bower.io): `npm install bower -g`
  * [grunt](http://gruntjs.com/) `npm install grunt-cli -g`
  
```
bower install
npm install
```

  
Then when you're working on your project, just run the following command:

```bash
grunt compass
```

## Upgrading

If you'd like to upgrade to a newer version of Foundation down the road just run:

```bash
bower update
```

## Distribution version

If you just want a distribution version use :

```bash
grunt distribution
```

And check the directory "dist"

Application Swindle-API created by [@martialdidit](https://github.com/martialdidit) & [@LuminusDev](https://github.com/LuminusDev) with Youtube API V3 and YouTube Analytics API

  + For any help, creat your own issue on <a href="https://github.com/martialdidit/swindle-api/issues">Swindle-api Issues</a></p></li>
  
![swindle](http://gyazo.com/de431ab0c2b7c902c4abcbffd74bbae3.png "Application Swindle")

***

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

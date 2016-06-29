<?php

use lib\Config;

// DB Config
Config::write('db.host', '54.94.211.79');
Config::write('db.port', '3306');
Config::write('db.basename', 'API_TUTORIAL');
Config::write('db.user', 'root');
Config::write('db.password', 'impsta');

// Project Config
Config::write('path', 'http://localhost/api/');
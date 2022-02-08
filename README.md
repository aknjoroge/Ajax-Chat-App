# Ajax XMLHttpRequest Chat System

### Not to be used for PRODUCTION - use socket.io for chat systems

---

### SETUP

#### 1. Config file located in : php\config.php

```PHP
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "test19";
```

#### 2. SQL database statement located in : php\chat_original.sql

```SQL
CREATE TABLE `notifications` (
  `id` int(32) NOT NULL,
  `touser` varchar(32) NOT NULL,
  `fromid` varchar(32) NOT NULL,
  `message` varchar(128) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(12) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

#### 3. PHP mailer config located in `php\Mail\credential.php`

```php

<?php
define('Email','info@example.com');
define('Pass','XXXXXXXXXXXXXXX');
?>
```

---

- @link https://github.com/PHPMailer/PHPMailer/

<?php

define('REGEX_STR_NO_NUMBER','/^[A-Za-z-éèêëàâäôöûüç\' ]+$/');
define('REGEX_DATE',"/^\d{1,4}-\d{2}-\d{2}$/");
define('REGEX_PHONE', '/^(01|02|03|04|05|06|07|08|09)[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}[ \.\-]?[0-9]{2}$/');
define('REGEX_MAIL','/^[a-z0-9][a-z0-9._-]*@[a-z0-9_-]{2,}(\.[a-z]{2,4}){1,2}$/');
define('REGEXP_DATE_HOUR',"/^\d{4}-\d{2}-\d{1,2}(T| )\d{2}:\d{2}$/");

define('REGEXP_NUMBER',"/^[0-9]+$/");



?>
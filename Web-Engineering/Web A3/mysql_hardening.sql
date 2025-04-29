ALTER USER 'root'@'localhost' IDENTIFIED BY 'ComplexP@$$w0rd!2025';

DELETE FROM mysql.user WHERE User='';

DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');

DROP DATABASE IF EXISTS test;
DELETE FROM mysql.db WHERE Db='test' OR Db='test\\_%';

CREATE USER 'app_user'@'localhost' IDENTIFIED BY 'AppUserP@$$2025';
GRANT SELECT, INSERT, UPDATE, DELETE ON myapplication.* TO 'app_user'@'localhost';

SET GLOBAL query_cache_type = 1;
SET GLOBAL query_cache_size = 16777216;

FLUSH PRIVILEGES;

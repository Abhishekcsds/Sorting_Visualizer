#!/bin/bash
echo "-----> Starting PHP server"
which php
php -v
exec php -S 0.0.0.0:$PORT -t public
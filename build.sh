#!/bin/bash
echo "-----> Preparing PHP application"
if ! command -v php &> /dev/null; then
    echo "ERROR: PHP not found!"
    exit 1
fi
php -v
#!/usr/bin/env bash

rsync -avP commerce_theme.info css favicon.ico generated_files images layouts logo.png screenshot.png scripts template.php templates theme-settings.php plantation:public_html/sites/all/themes/commerce_theme

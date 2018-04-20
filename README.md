# viola-first

## Custom css

Use LESS css for fast and sustainable development. 

[Guide of LESS css](http://lesscss.org/#)

### Update

1. Develop on [custom.less](css/custom.less).
2. Pre-compile (to speed up the website) LESS css to [custom.css](css/compiled/custom.css).
3. Copy and paste the content of [custom.css](css/compiled/custom.css) to **Appearance->Edit css->Additional css** page of wordpress admin backend.

## functions.php (Child theme)

Enqueue stylesheets in [functions.php](php/functions.php).

*Do NOT use `import *.css` in `style.css`, which will slow down the website.*

### Update

* Copy and paste the content of [functions.php](php/functions.php) to **Appearance->Editor->functions.php** page of wordpress admin backend.
* OR sync [functions.php](php/functions.php) to the remote server (viola-wang.com:/var/www/html/wp-content/themes/dt-the7-child/functions.php) directly.
  * You can use `rsync` to sync the file.
  * Pay attention to the ownership and mod of the synced file.

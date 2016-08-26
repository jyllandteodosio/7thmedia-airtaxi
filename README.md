# **Genesis Starter Kit** #
An extension kit of Wordpress Starter with Genesis Framework. This kit is to be used as a base for wordpress projects that requires the use of Genesis Framework. This includes the framework, sample Genesis theme and standard plugins. 



## Themes Installed ##
### Parent Theme ###
1. Genesis Framework (current version: 2.3.0)
### Child Theme ###
1. Sample Genesis Child Theme



## Genesis Child Themes We Can Use ##
### Recommended Genesis Child Themes ###
1. Altitude
2. Magazine Pro
3. Parallax Pro
4. Showcase Pro
5. Executive Pro

### Other Child Themes That We Can Use ###
1. Sample Child Theme (may be used as the theme for custom websites)
2. Agency Pro
3. Agentpress Pro
4. Cafe Pro
5. Enterprise Pro
6. Workstation Pro
7. Interior Pro

### Where to get the themes? ###
https://drive.google.com/a/7thmedia.com/folderview?id=0BykQVxNZmtqeTUJGcXZxU2M4ZjQ&usp=sharing_eid&ts=57514b10

*(If a Genesis Child Theme that you need is offered by StudioPress but is currently not in the drive, ask the Project Manager to know if the said theme is available for us to use.)*



## Plugins Installed and Plugin Status on this build ##
### Must-Use Plugin/s ###
1. **Website Specific Functions Plugin** - This plugin should hold all the functions to extend Wordpress core. This is to keep away on using the theme's function.php file if the contents and functionality not directly dependent on the Theme. This will make content integrity and compatibility better even when the user switched theme. 

**UPDATE:** Once WP-STARTER is installed, please go to "path/to/your/project/wp-content/mu-plugins/site-specific-functions.php". Please update this line `wp_redirect(get_bloginfo('home').'/trade-access');` to `wp_redirect(get_bloginfo('home').'/');`. This code is used to redirect to a custom URL once the user logged out. This is to ensure that, if the current site is hiding the WP-ADMIN url, the user is redirected back to a valid URL. If you don't change the WP-ADMIN URL, you can completely delete the entire hook.

### Standard Plugins ###
1. **Wordfence** - *Initially deactivated* Once WP Starter is installed, navigate to Plugins and Activate Wordfence, this will create it's table to the database. *Initial Status of this has been changed to deactivated to prevent database migration errors due to case-sensitive database table names.*  Please use this settings token to import previous setting: `e6598c917bb97794c380dc3392c1a6f7c220ddf29b8a36de4e1bbcc067fbf4010f3fe21b71602d033554da0ebb0c583c84a551297597d6de990eb2d1fcf6cf75`. Go to Wordfence > Options and locate import settings field on the very bottom of the page. 
2. **Advanced Custom Fields** - *Pre-activated*. Provided initially to get basic custom fields and implementation of General Site Settings. Included addons that are also pre-activated: ACF Repeater, ACF Options Page and ACF Contact Form Field.
3. **Advanced Excerpt** - *Pre-activated*. To maximize and organize excerpts in better way by characters, words or sentences count. 
4. **Contact Form 7** - *Pre-activated*. Our standard Contact Form plugin.
5. **UpdraftPlus** - Backup/Resore - *Pre-activated*. This will insure scheduled database back up. For files, this is Git integrated and we should maximize the use of Git from Development to Production. UpdraftPlus will only serve as the lower level back up system for less technical personnel like clients and content managers. 
6. **Custom Post Type UI** - *Pre-activated*. Used to easily manage and add Custom Post Type and Taxonomies. 
7. **Admin Menu Editor** - *Pre-activated*. Used when you have added Custom Post Type and you need to further customize your Dashboard Menu and Titles. Also helps re-arranging Dashboard Menus. 
8. **Title and Nofollow For Links** - *Pre-activated*. Used to add a ```rel="nofollow"``` on links.
9. **Autoptimize** - *Initially deactivated*. Deactivated by default during installation and development phases and should be enabled once gone into Pre-production state and production deployment of the project.
10. **MailChimp Forms** - *Initially deactivated*. Activate if Newsletter function is required for the project. 
11. **W3 Total Cache** - *Initially deactivated*. Please activate if a more advanced caching mechanism is required for the project. The *Wordpfence* had an integrated caching plugin with it, the *Falcon Cache*. 
12. **YOAST SEO** - *Initially deactivated*. Enable once on the production and if the client requires/avail SEO service from us. 
13. **PODS** - *Initially deactivated*. This is a more advanced Content Management Plugin. If Advanced Custom Fields can do the job. Leave this plugin as deactivated. 
14. **Akismet** - *Initially deactivated*. Enable once on live.
15. **Wordpress Importer** - *Pre-activated*. Wordpress to Wordpress default importer. 
16. **Flexible Post Widget** - *Initially deactivated*. Recommended to use when Genesis Featured Post widget can’t achieve the layout of the design and also if posts are a different post type. May also use for other functions if needed.



## Working with the Genesis Starter Theme ##
1. Please use the **Website Specific Functions Plugin** for Site specific function extends instead of the theme's functions.php file. If the you need to add function that is Theme specific, keep it on the functions.php file.
2. Do not edit Genesis Framework (Parent Theme)
3. Install a Genesis Child Theme or create a new one.
4. If website is custom but fits Genesis Framework, use the Sample Child Theme as base.
5. Change the theme name folder to the company/client name. 
6. Rename the theme name in style.css and functions.php to the name of the company/client.
7. For inserting new css and javascript files, you may add the source in functions.php by adding in the functions the wp_enqueue_style or wp_enqueue_script.
8. For customizing the look of an existing child theme, you may edit in style.css file.
9. To edit the function of the theme, edit functions.php file.



## What to keep in mind? ##
1. Please update the **WP-CONFIG.PHP** file database details. Update database name, database user and password that corresponds to your server settings. 
2. Please make sure that you use the initial database included on this Repository under ```db/genesis_starter_0.sql```. This SQL only contains table. Please create your own database on your server and import these tables on it. 
3. Once the installation is done, please update the Site Details like Site Name, Site Description under the Settings page on the WP Dashboard. 
4. If you might need to install it in a different directory other than using the default ```genesis-starter-0```, please take a look at your ```.htaccess``` file and update it. The default htaccess looks like this: 
```
# BEGIN WordPress
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /wp-starter-0/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /wp-starter-0/index.php [L]
</IfModule>

# END WordPress

```
Replace the ``` wp-starter-0 ``` with your folder. On production server, RewriteBase is just ``` RewriteBase / ``` and RewriteRule is ``` /index.php [L] ```



##Your Project Specific Changes##

1. Do a Search and Replace for ``http://localhost/genesis-starter-0`` and change it to your current directory location for your localhost setup or if it is on a sub-domain, use your sudbdomain full url including http://.

2. Here is the default Admin Credentials for this build. Username: `@dm1n1str@t0r` and password: `jG*#D7Cot*@86!!$op`. **Please update the password immediately after the installation and import of database to make sure that your project is not using our generic password.** If needed, you may want to add a new admin user with full admin capability and defer using the default user. Default credential is meant only for accessing the dashboard for this WP Starter build. 

*More information to follow*

Happy coding guys! Cheers!
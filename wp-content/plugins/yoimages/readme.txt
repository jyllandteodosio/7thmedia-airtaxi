=== YoImages ===
Contributors: ferrbea, fagia
Donate link: sirulli.org/yoimages
Tags: images, image, SEO, enhancement, crop, tool
Requires at least: 3.9
Tested up to: 4.8
Stable tag: 0.1.7
License: GPL2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Better image handling capabilities for Wordpress. YoImages adds functional enhancements to the Wordpress admin interface: image cropping and image SEO

== Description ==

Better image handling capabilities for Wordpress.
All you need to handle your images in Wordpress in one plugin.
YoImages adds functional enhancements to the Wordpress admin interface:

* *Image cropping tools:* no more images cropped wrong, you can choose now what to display and even replace the entire image for a specific crop size if the orginal image doesn't fit. Crop at a lower quality to speed up page loading. Create croppings in retina format too.
* *Image SEO hooks:* images are important for SEO but are never optimized enough. With YoImages you can automatically optimize images for Search Engines. No more alt tag missing or non informative titles or file names. Google can't see the image (yet) but, can read its attributes.
* *Free stock photos search:* Search and upload royalty free photos from the web directly into the Wordpress Admin interface.



= Image cropping tools =

[youtube https://www.youtube.com/watch?v=nGkn7A8gA6M]

YoImages' cropping tools let you crop manually each cropping format that your theme defines: this feature gives you full control on how cropped versions of your images will look like.
You can choose to replace the source image for some specific formats.
From the image cropping interface you can change the image quality for each cropped format.
YoImages cropping is retina friendly: if you are using a retina plugin that uses the standard @2x as file naming convention when creating retina images from source (e.g. [WP Retina 2x](https://wordpress.org/plugins/wp-retina-2x/ "")) you can enable the retina friendly cropping option in YoImages' settings page and the manual crops will be created in retina format too.

= Image SEO hooks =

[youtube https://www.youtube.com/watch?v=ZMv4Pqp4HQA]

YoImages' SEO hooks automate image metadata (title, alt and filename) filling on image upload and on post (or page) saving.
Each image SEO hook can be enabled or disabled individually and it works on any image that is child of a post or page such as the featured image and images or galleries added into the post WYSIWYG area.
You are free to define metadata values by using fixed texts and the following variables from the post/page that contains an image:

* parent post title
* parent post type
* parent post tags
* parent post categories
* parent post author username
* parent post author first name
* parent post author last name
* site name


*Note:* you can add your own [custom hooks](https://github.com/sirulli/yoimages#adding-your-own-custom-hooks) and your own [custom variables](https://github.com/sirulli/yoimages#adding-your-own-custom-variables).



= Free stock photos search =

[youtube https://www.youtube.com/watch?v=QH9uzQ2hE_c]

YoImages' free stock photos search feature lets you perform a free term search directly from the Wordpress admin interface in the following databases:
* [splashbase.co](http://www.splashbase.co/)
* [unsplash.com](https://unsplash.com/)

The photos you select are uploaded into your Wordpress site and optimized with YoImages' crop and SEO tools.
Photos from splashbase.co and unsplash.com are hi-res and free to use, but we recommend checking copyright details for each photo you choose.


*Note:* you can also add other [search providers](https://github.com/sirulli/yoimages#adding-new-free-stock-photos-search-providers).



= Languages supported =

* Primary: English
* Translations: Italian, German, Dutch, French, Polish

Translations are managed with [poeditor.com](https://poeditor.com/projects/view?id=25799 "").


= Future features =

Future features to implement:

* simple built-in image editor (effects, editing, color optimization)
* image gallery templates
* ...


Feel free to report bugs or request new features [here](https://github.com/sirulli/yoimages/issues).

= How to contribute =

[http://sirulli.org/yoimages/#contribute](http://sirulli.org/yoimages/#contribute)

= Credits =

Thanks to Fengyuan Chen for his [jQuery Image Cropper](http://fengyuanchen.github.io/cropper/) plugin.
Thanks to [wp-fred](https://profiles.wordpress.org/wp-fred-1/) for the Dutch translations of the plugin and for suggesting and designing the "user-friendly names" feature for crop formats.
Thanks to [Maxime Lafontaine](http://www.maximelafontaine.net/) for the French translations of the plugin.
Thanks to [Thomas Meyer](https://github.com/tmconnect/) for code contributions and fixes to the German translations.
Thanks to [Robert Vermeulen](https://github.com/robert388) for adding better support for metadata, support for WP-CLI commands and making YoImages compatible with Regenerate Thumbnails plugin.
Thanks to [Elliot Coad](https://github.com/ecoad) for adding the firing of an action after cropping.
Thanks to [odie2](https://github.com/odie2/) for code contributions and for the Polish translations of the plugin.
Thanks to [Ben Bowler](https://github.com/benbowler) for his code contributions.

= Source code =

YoImages source code is hosted on [GitHub](https://github.com/sirulli/yoimages).

== Installation ==

1. Install YoImages either via the WordPress.org plugin directory, or by uploading the files to your server.
2. Activate the plugin through the 'Plugins' menu in WordPress


== Screenshots ==

1. custom crop
2. choose crop quality
3. custom metadata value on post
4. custom metadata values even on gallery creation
5. free stock photos search

== Changelog ==

= 0.1.7 =
* Bugfixes
* Tested up to Wordpress 4.8

= 0.1.6 =
* New feature: Cache-bust newly cropped images so that they are updated in external caches and CDNs, thanks to [Ben Bowler](https://github.com/benbowler)
* Tested up to Wordpress 4.7.5

= 0.1.5 =
* Tested up to Wordpress 4.7.1
* Bugfixes

= 0.1.4 =
* New feature: "user-friendly names" for crop formats, thanks to [wp-fred](https://profiles.wordpress.org/wp-fred-1/) for suggesting and designing it
* Tested up to Wordpress 4.6.1
* Bugfixes

= 0.1.3 =
* Bugfixes, thanks to [odie2](https://github.com/odie2/)

= 0.1.2 =
* New search provider: [Unsplash](https://unsplash.com/)
* Adding support for new [search providers](https://github.com/sirulli/yoimages#adding-new-free-stock-photos-search-providers)
* Polish translations, thanks to [odie2](https://github.com/odie2/)
* Tested up to Wordpress 4.4
* Bugfixes

= 0.1.1 =
* Translations updated
* Firing an action after cropping, thanks to [Elliot Coad](https://github.com/ecoad)
* Fixed issue https://wordpress.org/support/topic/yoimages-media-editor-issues-with-a-lot-of-custom-image-sizes
* Tested up to Wordpress 4.3.1

= 0.1.0 =
* Added new feature: free stock photos search
* Tested up to Wordpress 4.2.2
* Better support for custom metadata handling, thanks to [Robert Vermeulen](https://github.com/robert388)
* Compatiblity with Regenerate Thumbnails plugin, thanks to [Robert Vermeulen](https://github.com/robert388)
* Support for WP-CLI commands, thanks to [Robert Vermeulen](https://github.com/robert388)
* Bugfixes

= 0.0.7 =
* Showing translated image size names, thanks to [Thomas Meyer](https://github.com/tmconnect/)
* Corrections to the German translations, thanks to [Thomas Meyer](https://github.com/tmconnect/)

= 0.0.6 =
* Bugfix: avoiding undefined index notice while saving settings and avoiding "crop retina is smaller" warning when retina crop isn't enabled

= 0.0.5 =
* French translations, thanks to [Maxime Lafontaine](http://www.maximelafontaine.net/)
* Tested up to Wordpress 4.1.1

= 0.0.4 =
* Added SEO expressions related to the post author metadata: username, first name and last name
* Minor fixes on UX and on default translations

= 0.0.3 =
* Support for retina cropping: integration with the [WP Retina 2x plugin](https://wordpress.org/plugins/wp-retina-2x/)
* Bugfix: avoid undefined index error notice

= 0.0.2 =
* Dutch translations, thanks to [wp-fred](https://profiles.wordpress.org/wp-fred-1/)
* Bugfix: SEO expressions replacement in any languange (not only in the language currently enabled)

= 0.0.1 =
* initial version

=== Tagline Shuffle ===
Contributors: fireballmonkey
Donate link: http://kwitcherbitchen.org/
Tags: tagline, random
Requires at least: 2.0.2
Tested up to: 2.7
Stable tag: 1.0

Picks a random tagline from a list every time a page is loaded.

== Description ==

Picks a random tagline from a list every time a page is loaded. You can place a tagline anywhere in a template using
the included function, but you also have the option of automatically replacing all instances of the built-in static
tagline with random ones.

== Installation ==

1. Upload `tagline-shuffle.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Create a list of taglines through the 'Settings->Tagline Shuffle' menu
 * Select if you would like to automatically replace all tagline instances with random taglines
1. Place `<?php insert_random_tagline(); ?>` in your templates anywhere you would like random taglines
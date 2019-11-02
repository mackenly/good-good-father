<?php
/**
 * @package Good Good Father
 * @version 1.6
 */
/*
Plugin Name: Good Good Father
Plugin URI: http://wordpress.org/extend/plugins/good-good-father/
Description: This is not just a plugin, it symbolizes the hope and enthusiasm of an entire generation summed up in a few words sung most famously by Chris Tomlin: Good Good Father. When activated you will randomly see a lyric from <cite>Good Good Father</cite> in the upper right of your admin screen on every page.
Author: Mackenly Jones
Version: 1.0
Author URI: http://tricitiesmediagroup.com/
*/

function good_good_father_get_lyric() {
	/** These are the lyrics to Good Good Father */
	$lyrics = "Good Good Father
I've heard a thousand stories of what they think you're like
But I've heard the tender whispers of love in the dead of night
And you tell me that you're pleased
And that I'm never alone
You're a good good father
It's who you are, it's who you are, it's who you are
And I'm loved by you
It's who I am, it's who I am, it's who I am
I've seen many searching for answers far and wide
But I know we're all searching
For answers only you provide
'Cause you know just what we need
Before we say a word
You're a good good father
It's who you are, it's who you are, it's who you are
And I'm loved by you
It's who I am, it's who I am, it's who I am
Because you are perfect in all of your ways
You are perfect in all of your ways
You are perfect in all of your ways to us
You are perfect in all of your ways
You are perfect in all of your ways
You are perfect in all of your ways to us
Oh, it's love so undeniable
I, I can hardly speak
Peace so unexplainable
I, I can hardly think
As you call me deeper still
As you call me deeper still
As you call me deeper still
Into love, love, love
You're a good good father
It's who you are, it's who you are, it's who you are
And I'm loved by you
It's who I am, it's who I am, it's who I am
You're a good good father
It's who you are, it's who you are, it's who you are
And I'm loved by you
It's who I am, it's who I am, it's who I am
You're a good good father
It's who you are, it's who you are, it's who you are
And I'm loved by you
It's who I am, it's who I am, it's who I am
You're a good good father
You are perfect in all of your ways
It's who you are, it's who you are, it's who you are
And I'm loved by you
You are perfect in all of your ways
It's who I am, it's who I am, it's who I am";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function good_good_father() {
	$chosen = good_good_father_get_lyric();
	echo "<p id='father'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'good_good_father' );

// We need some CSS to position the paragraph
function father_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#dolly {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'father_css' );

?>

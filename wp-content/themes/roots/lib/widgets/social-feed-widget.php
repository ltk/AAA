<?php

class Jake_Social_Feed_Widget extends WP_Widget {
	private $username;
	private $count;

	function flush_widget_cache() {
		wp_cache_delete('Jake_Social_Feed_Widget', 'widget');
	}
	
	function Jake_Social_Feed_Widget() {
		$widget_ops = array('classname' => 'Jake_Social_Feed_Widget', 'description' => __('Use this widget to display a feed of your most recent activity from Facebook or Twitter.', 'roots'));
		
		$this->WP_Widget('Jake_Social_Feed_Widget', __('Social Feed Widget', 'roots'), $widget_ops);
		$this->alt_option_name = 'Jake_Social_Feed_Widget';

		add_action('save_post', array(&$this, 'flush_widget_cache'));
		add_action('deleted_post', array(&$this, 'flush_widget_cache'));
		add_action('switch_theme', array(&$this, 'flush_widget_cache'));
	}

	function tweets() {
		//SETUP FEED
		include_once( ABSPATH . WPINC . '/feed.php' );
		$twitter_rss = "http://api.twitter.com/1/statuses/user_timeline.rss?screen_name=".$this->username."&count=".$this->count;
		$rss = fetch_feed($twitter_rss);

		if ( is_wp_error( $rss ) ) {
			$wholetweet = 'The connection to twitter has returned an error. Please try again later.<br />';
		} else {

			$maxitems = $rss->get_item_quantity($this->count);
			$rss_items = $rss->get_items(0, $maxitems);
			return $rss_items;
		}
	}

	function get_relative_time( $tweet ) {
		$tprefix = '';
		$tsecs = 'seconds';
		$tmin = 'minutes';
		$tmins = 'minutes';
		$thour = 'hour';
		$thours = 'hours';
		$tday = 'day';
		$tdays = 'days';
		$tsuffix = 'ago';


		$now = time();
		
		$when = ($now - strtotime($tweet->get_date()));
		$posted = "";
		
		if ($when < 60) {
			$posted = $tprefix." ".$when." ".$tsecs." ".$tsuffix;
		}
		if (($posted == "") & ($when < 3600)) {
			$posted = $tprefix." ".(floor($when / 60))." ".$tmins." ".$tsuffix;
		}
		if (($posted == "") & ($when < 7200)) {
			$posted = $tprefix." 1 ".$thour." ".$tsuffix;
		}
		if (($posted == "") & ($when < 86400)) {
			$posted = $tprefix." ".(floor($when / 3600))." ".$thours." ".$tsuffix;
		}
		if (($posted == "") & ($when < 172800)) {
			$posted = $tprefix." 1 ".$tday." ".$tsuffix;
		}
		if ($posted == "") {
			$posted = $tprefix." ".(floor($when / 86400))." ".$tdays." ".$tsuffix;
		}
		
		return $posted;
	}

	function widget( $args, $instance ) {
		$this->network  = isset( $instance['network'] )	  ? esc_attr( $instance['network'] )   : '';
		$this->username = isset( $instance['user'] )	  ? esc_attr( $instance['user'] )      : 'firststreet';
		$this->count    = isset($instance['itemnumber']) ? esc_attr($instance['itemnumber']) : 1;

?>
<!-- 		<div class="widget large social-feed-widget">
			<img src="<?php echo get_template_directory_uri(); ?>/img/twitter-icon.png" alt="Twitter" class="feed-logo" />
			<div class="feed-info">
				<?php
				$tweets = $this->tweets();
				foreach($tweets as $tweet) {
					$tweet_text = preg_replace("/(@[^\s]+)/i", "<span class='feed-user'>$1</span>", $tweet->get_title());
					$tweet_text = preg_replace("/(#[^\s]+)/i", "<span class='feed-meme'>$1</span>", $tweet_text);
					$tweet_text = preg_replace("/(http:\/\/[^\s]+)/i", "<a class='feed-link' href='$1' target='_blank'>$1</a>", $tweet_text);
					echo "<div class='feed-info pull-left'>" . $this->when($tweet) . " / <a href='http://twitter.com/home?status=RT " . str_replace($this->username . ": ", "@" . $this->username . " ", $tweet->get_title()) . "' target='_blank'>retweet</a><span></div><p class='tweet'>" . str_replace($this->username . ': ', '', $tweet_text) . "</p>";
				}
				?>
			</div>
		</div> -->
		<div class="widget large social-feed-widget container group">
			<div class='feed-info pull-left'>
				<a href="#">September 1, 2011.</a>
			</div>
			<p class="pull-left feed">
				Save Chad 10 months old! Will be put to sleep today! Can anyone foster him??
			</p>
			<a class="feed-link pull-right">
				{ Visit Facebook }
			</a>

		</div>
<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['user']        = strip_tags($new_instance['user']);
		//$instance['password']  = strip_tags($new_instance['password']);
		$instance['itemnumber'] = strip_tags($new_instance['itemnumber']);

		$this->flush_widget_cache();

		$alloptions = wp_cache_get('alloptions', 'options');
		if (isset($alloptions['Jake_Social_Feed_Widget'])) {
			delete_option('Jake_Social_Feed_Widget');
		}

		return $instance;
	}

	function form($instance) {
		$network     = isset($instance['network']) ? esc_attr($instance['network']) : '';
		$user        = isset($instance['user']) ? esc_attr($instance['user']) : '';
		$password    = isset($instance['password']) ? esc_attr($instance['password']) : '';
		$itemnumber = isset($instance['itemnumber']) ? esc_attr($instance['itemnumber']) : '';

	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('network')); ?>"><?php _e('Network', 'roots'); ?></label>
			<select name="<?php echo esc_attr($this->get_field_name('network')); ?>" id="<?php echo esc_attr($this->get_field_id('network')); ?>">
				<option value="facebook">Facebook</option>
				<option value="twitter">Twitter</option>
			</select>
		</p>


		<p>
			<label for="<?php echo esc_attr($this->get_field_id('user')); ?>"><?php _e('Username:', 'roots'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('user')); ?>" name="<?php echo esc_attr($this->get_field_name('user')); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id('itemnumber')); ?>"><?php _e('# of items:', 'roots'); ?></label>
			<select name="<?php echo esc_attr($this->get_field_name('itemnumber')); ?>" id="<?php echo esc_attr($this->get_field_id('itemnumber')); ?>">
			<?php
				for ( $i = 1; $i <= 5; $i++ ) {
					echo sprintf('<option value="%s" %s>%s</option>',
						$i,
						tjg_input_check($itemnumber, $i, 'select'),
						$i
					);
				}
			?>
			</select>
		</p>
	<?php
	}
}

?>
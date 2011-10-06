<?php require(WEBROOT.DS.'head.php'); ?>
<?php if(isset($this->session)){
	$this->session->flash();
} ?>
<div class="row">
	<div class="span12 columns">
		<?php echo $content_for_layout; ?>
	</div>
	<div class="span4 columns">
		<?php if(!empty($twitter['tweets']) && !isset($twitter['tweets']['error'])){ ?>
			<h4>Last tweets from
			<?php
				echo $this->html->anchor('http://twitter.com/#!/'.$twitter['user']['screen_name'], '@'.$twitter['user']['screen_name']);
				echo $this->html->img($twitter['user']['profile_image_url'], array('title' => $twitter['user']['screen_name']));
			?>
			</h4>
			<ul>
				<?php foreach($twitter['tweets'] as $tweet){ ?>
						<li><?php echo $tweet['text']; ?></li>
				<?php } ?>
			</ul>
		<?php } ?>
		<h3>Another Sidebar</h3>
		<ul>
			<li><a href="#">Nav...</a></li>
			<li><a href="#">Nav...</a></li>
			<li><a href="#">And nav...</a></li>
		</ul>
	</div>
</div>
<?php require(WEBROOT.DS.'foot.php'); ?>

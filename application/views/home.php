<!DOCTYPE html>
<html lang='en'>
<head>
	<meta class="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>churro - free blog service</title>
	<link rel='stylesheet' href='css/style.css' />
</head>
<body>
	<!-- Hero(extended) navbar -->
	<div class="navbar navbar--extended">
		<nav class="nav__mobile"></nav>
		<div class="container">
			<div class="navbar__inner">
				<a href="index.html" class="navbar__logo"><img class="logo" src="<?php echo base_url('images/light_logo.png') ?>" alt="">churro</a>
				<nav class="navbar__menu">
					<ul>
                        <?php if ($this->ion_auth->logged_in()): ?>
                            <li><a href="<?php echo base_url('posts') ?>">Admin</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo base_url('signup') ?>">Sign Up</a></li>
                            <li><a href="<?php echo base_url('login') ?>">Log In</a></li>
                        <?php endif ?>
					</ul>
				</nav>
				<div class="navbar__menu-mob"><a href="" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
			</div>
		</div>
	</div>
	<!-- Hero unit -->
	<div class="hero">
		<div class="hero__overlay hero__overlay--gradient"></div>
		<div class="hero__mask"></div>
		<div class="hero__inner">
			<div class="container">
				<div class="hero__content">
					<div class="hero__content__inner" id='navConverter'>
						<h1 class="hero__title">Customizeable free blog service</h1>
						<p class="hero__text">Churro is an open-source blog and home page service where you can create custom pages and completely customize the CSS - all for free.</p>
						<a href="<?php echo base_url('signup') ?>" class="button button__accent">Get Started</a>
						<a href="<?php echo base_url('~tom3') ?>" target="_blank" class="button hero__button">View demo</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="hero__sub">
		<span id="scrollToNext" class="scroll">
			<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" class='hero__sub__down' fill="currentColor" width="512px" height="512px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path d="M256,298.3L256,298.3L256,298.3l174.2-167.2c4.3-4.2,11.4-4.1,15.8,0.2l30.6,29.9c4.4,4.3,4.5,11.3,0.2,15.5L264.1,380.9c-2.2,2.2-5.2,3.2-8.1,3c-3,0.1-5.9-0.9-8.1-3L35.2,176.7c-4.3-4.2-4.2-11.2,0.2-15.5L66,131.3c4.4-4.3,11.5-4.4,15.8-0.2L256,298.3z"/></svg>
		</span>
	</div>
	<!-- Steps -->
	<div class="steps landing__section">
		<div class="container">
			<h2>Churro's features</h2>
			<p>Things are kept simple, but there's plenty of ways to make it yours.</p>
		</div>
		<div class="container">
			<div class="steps__inner">
				<div class="step">
					<div class="step__media">
                        <img src="./images/undraw_responsive.svg" class="step__image">
					</div>
					<h4>Custom Pages</h4>
					<p class="step__text">Creating pages on your blog is as easy as creating posts, and will appear in your menu.</p>
				</div>
				<div class="step">
					<div class="step__media">
                        <img src="./images/undraw_designer.svg" class="step__image">
					</div>
					<h4>Custom CSS</h4>
					<p class="step__text">For those who want to completely customize the look, you can put in your own CSS code.</p>
				</div>
				<div class="step">
					<div class="step__media">
						<img src="./images/undraw_creation.svg" class="step__image">
					</div>
					<h4>Simple URL</h4>
					<p class="step__text">Your new blog URL will be based on your username - e.g. coco.lat/c/~username</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Expanded sections -->
	<div class="expanded landing__section">
		<div class="container">
			<div class="expanded__inner">
				<div class="expanded__media">
					<img src="./images/together.svg" class="expanded__image">
				</div>
				<div class="expanded__content">
					<h2 class="expanded__title">Easy-to-use admin interface</h2>
					<p class="expanded__text">Churro's admin interface makes it easy to create and edit all your posts and pages. The settings page can be used to change your blog properties at any time.</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Call To Action -->
	<div class="cta cta--reverse">
		<div class="container">
			<div class="cta__inner">
				<h2 class="cta__title">Get started now</h2>
				<p class="cta__sub cta__sub--center">Sign up and get your blog started for free</p>
				<a href="<?php echo base_url('signup') ?>" class="button button__accent">Create My Blog</a>
			</div>
		</div>
	</div>
	<!-- Footer -->
	<div class="footer footer--dark">
		<div class="container">
			<div class="footer__inner">
				<a href="index.html" class="footer__textLogo">Churro</a>
				<div class="footer__data">
					<div class="footer__data__item">
						<div class="footer__row">
							Part of the <a href="https://coco.lat" target="_blank" class="footer__link">coco.lat</a> network
						</div>
					</div>
					<div class="footer__data__item">
					<div class="footer__row">
						<a href="https://github.com/tomual/mini-blog" target="_blank" class="footer__link">Source Code</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src='js/app.min.js'></script>
</body>
</html>
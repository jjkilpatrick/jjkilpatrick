<?php
	include("_medium/fetch.php");

	function titleParse($title){
        $title = $title;
        $pos = strpos($title, '" in');
        if($pos){
            $title = substr($title, 0, $pos);
            $title = str_replace('"', '', $title);
        }
        return $title;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<title>John Kilpatrick - Creative Technologist / Inventive Hacker</title>
	<link rel="shortcut icon" href="_includes/images/favicon.png">
	<!-- Include CSS Files -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lato:300,400,700,900&subset=latin,latin-ext">
	<link rel="stylesheet" href="_includes/css/slick.css"/>
	<link rel="stylesheet" href="_includes/css/revolution-slider.css">
	<link rel="stylesheet" href="_includes/css/bootstrap.css">
	<link rel="stylesheet" href="_includes/css/min/font-awesome.min.css">
	<link rel="stylesheet" href="_includes/css/global.css">
	<link rel="stylesheet" href="_includes/css/components.css">
	<link rel="stylesheet" href="_includes/css/widgets.css">
	<!-- /Include CSS Files -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-57832208-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body class="nav-default nav-sticky nav-scroll">
	<div class="site">

		<!-- SVGs -->
		<?php include '_svg.php'; ?>
		<!-- /SVGs -->

		<!-- Preloader-->
		<div class="preloader">
			<svg>
				<use xlink:href="#shape-logo"></use>
			</svg>
		</div>
		<!-- /Preloader -->

		<!-- Header -->
		<header class="site-header">
			<div class="nav-row">
				<div class="container">
					<!-- Logo
					You can replace the SVG with a standard <img> element or
					change the "inline" SVG logo to your own.
					-->
					<a href="index.html" class="site-logo">
						<svg>
							<use xlink:href="#shape-logo"></use>
						</svg>
					</a>
					<!-- /Logo -->
					<!-- Open/Close Navigation (required) -->
					<button class="nav-toggle">
						<svg>
							<use xlink:href="#shape-nav"></use>
						</svg>
					</button>
					<!-- /Open/Close Navigation -->
				</div>
			</div>
			<!-- Main Navigation Links
			You can use the URLs to point to sub pages (about.html),
			or add anchor links  that point to a sectionon a page (#about).
			Don't forget to add an ID on the element you want the anchor to
			point to.
			-->
			<nav class="nav-menu" role="navigation">
				<ul>
					<li><a href="index.html#top">Home</a></li>
					<li><a href="index.html#medium">Medium</a></li>
					<li><a href="index.html#hacks">Hacks & Projects</a></li>
					<li><a href="index.html#skills">Skills</a></li>
					<li><a href="index.html#portfolio">Portfolio</a></li>
					<li><a href="index.html#instagram">Instagram</a></li>
				</ul>
			</nav>
			<!-- /Main Navigation Links -->
			<!-- Social links -->
			<ul class="nav-social">
				<li><a href="https://www.facebook.com/johnjameskilpatrick"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://twitter.com/jjkilpatrick"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://bitbucket.org/jjkilpatrick"><i class="fa fa-bitbucket"></i></a></li>
				<li><a href="https://github.com/jjkilpatrick"><i class="fa fa-github"></i></a></li>
				<li><a href="https://dribbble.com/jjkilpatrick"><i class="fa fa-dribbble"></i></a></li>
				<li><a href="http://instagram.com/jjkilpatrick"><i class="fa fa-instagram"></i></a></li>
			</ul>
			<!-- /Social links -->
		</header>
		<!-- /Header -->

		<!-- Hero Slider -->	
		<?php $introArticle = $xml->channel->item[0]; ?>

		<section id="top">
			<div id="rev-slider-1-wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="background-color: #e6e6e6;">
				<div id="rev-slider-1" class="rev_slider fullwidthabanner" style="display:none;">
					<ul>
						<!-- First Slide -->
						<li data-transition="fade">
							<?php echo $introArticle->description ?>
							<!-- Background Image -->
							<img class="header-image" src=""  alt="slidebg1" data-lazyload="" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
							<!-- /Background Image -->
							<!-- Large Text -->
							<div class="tp-caption rev-heading-lg text-center lfb"
								data-x="center"
								data-y="center" data-voffset="-100"
								data-speed="1000"
								data-start="1200"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
					 			data-endspeed="1000"
								style="z-index: 10; max-width: auto; max-height: auto; white-space: nowrap;">
								<?= titleParse($introArticle->title); ?>
							</div>
							<!-- /Large Text -->
							<!-- Small Text -->
							<div class="tp-caption rev-heading-sm text-center lfb tp-resizeme"
								data-x="center"
								data-y="center" data-voffset="-30"
								data-speed="1000"
								data-start="1000"
								data-easing="Power3.easeInOut"
								data-splitin="none"
								data-splitout="none"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
					 			data-endspeed="1000"
								style="z-index: 9; max-width: auto; max-height: auto; white-space: nowrap;">
							</div>
							<!-- /Small Text -->
							<!-- Read article button -->
							<a class="tp-caption lfb btn btn-lg" href="<?= $introArticle->link; ?>"
								data-x="center"
								data-y="center" data-voffset="50"
								data-speed="1000"
								data-start="1400"
								data-easing="Power3.easeInOut"
								data-elementdelay="0.1"
								data-endelementdelay="0.1"
					 			data-endspeed="1000"
								style="z-index: 8;">
								Continue reading on Medium »
							</a>
							<!-- /Read article button -->
						</li>
						<!-- /First Slide -->
					</ul>
				</div>
			</div>
		</section>
		<!-- /Hero Slider -->

		<!-- Recent mediums title -->
		<section id="medium" class="element element-spacing-small">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title-small">More from medium</h3>
					</div>
				</div>
			</div>
		</section>
		<!-- /Recent mediums title -->

		<!-- Recent mediums -->
		<section>
			<div class="recent-posts">
				<?php
			
					$i = 0;
					foreach ($xml->channel->item as $val) {
						$i++;
						if ($i === 1 || $i > 9) continue;
			
				        echo '
				        <article class="medium-post">
				        	'.$val->description.'
							<a href="'.$val->link.'" title="'.$val->title.'">
								<div class="container">
									<div class="row">
										<div class="col-md-12">
											<time datetime="2014-09-16 19:00">September 16, 2014</time>
											<h3>'.$val->title.'</h3>	
											<span class="author"></span>					
										</div>
									</div>
								</div>
							</a>
						</article>
						';
					};
				
				?>
				<a href="https://medium.com/@jjkilpatrick" class="blog-more">Read more on Medium</a>
			</div>
		</section>
		<!-- /Recent mediums -->

		<!-- Featured Hacks Title -->
		<section id="hacks" class="element element-spacing-small">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title-small">Featured hacks &amp; projects</h3>
					</div>
				</div>
			</div>
		</section>
		<!-- /Featured Hacks Title -->

		<!-- Featured Hack -->
		<section>
			<div class="projects">
				<div style="background-image: url('_includes/images/projects/env-sensor.jpg'); background-position: top;">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="title">Office<br/>Environment Sensor</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<p>Inspired by the <a href="https://nest.com/uk/smoke-co-alarm/life-with-nest-protect/" title="Nest Protect">Nest Protect</a>, this project aims to monitor the office environment from 5 different sensor units positioned around the office. One unit is an external unit which will be used to monitor local weather including temperature, wind direction, wind speed and rainfall.</p>
								<p>Each internal unit monitors temperature, humidity, barometric pressure, methane, smoke, sound, light and motion.</p>
								<!-- <a href="index.html#" class="btn btn-md">View Project</a> -->
							</div>
							<div class="col-md-6">
								<p>All of the units stream data to a central unit which collates and pushes data into the cloud for later use. An API is also being developed which will allow the data to be used in conjunction with libraries such as D3.js or Processing.js to produce some dynamic interactions.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Featured Hack -->

		<!-- Hacks and Projects -->
		<section class="element element-spacing">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<article class="blog-posts">
							<header>
								<a class="blog-post-image" href="http://www.dulux.co.uk/rooms" style="background-image: url(_includes/images/projects/dulux-rooms-3.png);"></a>
								<div class="blog-post-author">
									<div class="blog-post-author-image">
										<img src="_includes/images/projects/dulux.jpg" alt="Dulux">
									</div>
									<div class="blog-post-author-details">By <span class="author-name">John Kilpatrick</span> on <time datetime="2015-01-22 09:00">Jan 22nd, 2015</time></div>
								</div>
								<h2 class="blog-post-title">Dulux Room Collections</h2>
							</header>
							<p class="blog-post-content">Lead a team of 2 developers at Analogfolk to rebuild the rooms collection to enable customers to find inspiration easier.</p>
							<h4 class="blog-post-subtitle">Tech</h4>
							<ul>
								<li>Backbone</li>
								<li>Python</li>
								<li>HTML5</li>
								<li>JavaScript</li>
								<li>JQuery</li>
								<li>Grunt </li>
								<li>Sass</li>
							</ul>
							<footer>
								<a href="http://www.dulux.co.uk/rooms" class="more">Visit site</a>
							</footer>
						</article>
					</div>
					<div class="col-md-4 col-xs-6">
						<article class="blog-posts">
							<header>
								<a class="blog-post-image" href="http://www.analogfolk.com" style="background-image: url(_includes/images/projects/analogfolk.png);"></a>
								<div class="blog-post-author">
									<div class="blog-post-author-image">
										<img src="_includes/images/projects/af.jpg" alt="AnalogFolk">
									</div>
									<div class="blog-post-author-details">By <span class="author-name">John Kilpatrick</span> on <time datetime="2015-01-23 09:00">Jan 23rd, 2015</time></div>
								</div>
								<h2 class="blog-post-title">AnalogFolk</h2>
							</header>
							<p class="blog-post-content">Lead a team of 2 developers at Analogfolk to rebuild the AnalogFolk global website.</p>
							<h4 class="blog-post-subtitle">Tech</h4>
							<ul>
								<li>PHP</li>
								<li>HTML5</li>
								<li>JavaScript</li>
								<li>JQuery</li>
								<li>Grunt</li>
								<li>Sass</li>
							</ul>
							<footer>
								<a href="http://www.analogfolk.com" class="more">Visit site</a>
							</footer>
						</article>
					</div>
					<div class="col-md-4 col-xs-6">
						<article class="blog-posts">
							<header>
								<a class="blog-post-image" href="http://www.dulux.co.uk" style="background-image: url(_includes/images/projects/dulux-1.png);"></a>
								<div class="blog-post-author">
									<div class="blog-post-author-image">
										<img src="_includes/images/projects/dulux.jpg" alt="Dulux">
									</div>
									<div class="blog-post-author-details">By <span class="author-name">John Kilpatrick</span> on <time datetime="2015-01-28 09:00">Jan 28th, 2015</time></div>
								</div>
								<h2 class="blog-post-title">Dulux</h2>
							</header>
							<p class="blog-post-content">Worked as part of a large team of developers at Analogfolk to rebuild the Dulux UK website.</p>
							<h4 class="blog-post-subtitle">Tech</h4>
							<ul>
								<li>Java</li>
								<li>HTML5</li>
								<li>JavaScript</li>
								<li>Sass</li>
							</ul>
							<footer>
								<a href="http://www.dulux.co.uk" class="more">Visit site</a>
							</footer>
						</article>
					</div>
				</div>
			</div>
		</section>
		<!-- /Hacks and Projects -->

		<!-- Featured Hack -->
		<section>
			<div class="projects">
				<div style="background-image: url('_includes/images/projects/musical-bottles.jpg'); background-position: top;">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="title">Musical<br/>Bottles</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<p>The aim of this project was to rapidly prototype three different approaches to make a musical bottle. The first prototype was built using an arduino mini pro, an mp3 shield, speaker and simple circuit which when broken triggers a mp3 to play. The circuit was built into the screw cap so the music was activated when removing the bottle top. </p>
								<p>The second prototype made use of near field communication tags (NFC) which were stuck to the inside of the bottle top. When a user tapped their phone against the bottle it would open a browser, open a link encoded onto the tag and open the correct webpage. The page consists of branding and a HTML5 audio player. Depending on the hash in the url the player will load the correct mp3 for the user to play.</p>
								<!-- <a href="index.html#" class="btn btn-md">View Project</a> -->
							</div>
							<div class="col-md-6">
								<p>The final prototype is very similar to the NFC approach but makes use of RFID. When a tag (which is attached to the inside of the bottle top) is scanned it sends the tag id through to a node server which plays the correct mp3 through a laptop speaker.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Featured Hack -->

		<!-- Portfolio -->
		<section id="portfolio" class="element element-spacing">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3 class="section-title">I'm a passionate Senior Creative Technologist working at AnalogFolk. Mentoring a small team of talented developers who regularly ship exciting projects across for a wide variety of clients.<br /><span class="smaller">Using languages and tools such as JavaScript, Sass, CasperJS, PHP, Node, and Grunt, I like to rapidly prototype technically creative products and ideas.</span></h3>
					</div>
				</div>
			</div>
		</section>
		<!-- /Portfolio -->

		<!-- Instagram -->
		<section>
			<div id="instagram" class="instagram statement">
				<ul class="instagram-images">
					
				</ul>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="instagram-author-photo"></div>
							<h5>Find me on Instagram</h5>
							<div class="instagram-tags"></div>
							<div class="instagram-author-tag"></div>
							<ul class="instagram-meta">
								<li class="num-photos">
									<span></span>
									<strong>Photos</strong>
								</li>
								<li class="num-followers">
									<span></span>
									<strong>Followers</strong>
								</li>
								<li class="num-likes">
									<span></span>
									<strong>Likes</strong>
								</li>
							</ul>
							<a target="_blank" href="index.html#" class="btn btn-lg instagram-follow">Follow</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- /Instagram -->

		<!-- Footer -->
		<footer class="site-footer">
			<div class="footer-content">
				<ul class="contact-info">
					<li>
						<svg class="phone">
							<use xlink:href="#shape-phone"></use>
						</svg>
						<span>07921074943</span>
					</li>
					<li>
						<svg class="mail">
							<use xlink:href="#shape-mail"></use>
						</svg>
						<a href="mailto:me@gjohnjameskilpatrick.co.uk">me@johnjameskilpatrick.co.uk</a>			
					</li>
				</ul>
			</div>
			<div class="copyright">Copyright <?php echo date("Y"); ?> © All Rights Reserved.</div>
		</footer>
		<!-- /Footer -->

	</div>
	
	<!-- Scripts -->
	<script src="_includes/js/libraries/jquery.min.js"></script>
	<script src="_includes/js/libraries/isotope.min.js"></script>
	<script src="_includes/js/libraries/imagesloaded.min.js"></script>
	<script src="_includes/js/libraries/jquery.parallax.min.js"></script>
	<script src="_includes/js/libraries/jquery.mb.YTPlayer.js"></script>
	<script src="_includes/js/libraries/slick.min.js"></script>
	<script src="_includes/js/libraries/smoothScroll.min.js"></script>
	<script src="_includes/js/libraries/jquery.validate.min.js"></script>
	<script src="_includes/js/libraries/waypoints.min.js"></script>
	<script src="_includes/js/libraries/color-thief.min.js"></script>
	<script src="_includes/js/theme.js"></script>
	<script src="_includes/js/libraries/jquery.themepunch.tools.min.js"></script>
	<script src="_includes/js/libraries/jquery.themepunch.revolution.min.js"></script>
	<script src="_includes/js/libraries/instagram.min.js"></script>
	<!-- /Scripts -->
  	<script type="text/javascript">
  		function componentToHex(c) {
		    var hex = c.toString(16);
		    return hex.length == 1 ? "0" + hex : hex;
		}

	    function rgbToHex(r, g, b) {
		    return "#" + componentToHex(r) + componentToHex(g) + componentToHex(b);
		}

		function invertColor(hexTripletColor) {
		    var color = hexTripletColor;
		    color = color.substring(1);           // remove #
		    color = parseInt(color, 16);          // convert to integer
		    color = 0xFFFFFF ^ color;             // invert three bytes
		    color = color.toString(16);           // convert to hex
		    color = ("000000" + color).slice(-6); // pad with leading zeros
		    color = "#" + color;                  // prepend #
		    return color;
		}

		jQuery(document).ready(function($) {

			var intro = $('#rev-slider-1 ul li:first'),
			image = intro.find('.medium-feed-image img').attr('src'),
			image = image.replace(/^.+\/([^\/]*)$/,'$1'),
			image = '_includes/images/headers/' + image;

			var img = document.createElement("img");

		    img.onload = function () {
		        colorThief = new ColorThief();
		        color = colorThief.getColor(img);
		        hex = rgbToHex(color[0], color[1], color[2]);
		        invert = invertColor(hex)
		    };

		    img.src = image;

		   	$('#rev-slider-1').show().revolution({
				delay: 9000,
				startwidth: 1170,
				startheight: 500,
				hideThumbs: 200,
				fullScreen: "on",
				fullWidth: "off",
				touchenabled: "on",
				onHoverStop: "on",
				autoHeight:"off",						
				forceFullWidth:"off",
				navigationType: "none",
				hideTimerBar:"on",
			});
			$('#instagram').instagram({
				userId: '8839675',
				accessToken: '8839675.2569dcb.defbb2c8208e4a47a16d2b991a3167f1',
				clientId: '2569dcb6aba84a208a6ea05aef2647e2',
				count: '999',
				updateInterval: 960*60*2,
				image_size: 'standard_resolution'
			});
		});
	</script>
</body>
</html>
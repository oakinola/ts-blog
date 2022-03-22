<!-- START common/header-nav.php -->
<?php global $pagename; ?>
<!---<nav class="navbar navbar-expand-lg navbar-light jad-header bg-light no-box-shadow"> -->

<nav id="mainnav" class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
	<div class="container">
		<div>
			<a class="navbar-brand" href="/">
				<img src="<?php echo get_template_directory_uri()?>/assets/img/tunjaksolutions_logo.svg" class="img-fluid" alt="tunjak solutions logo">
			</a>
		</div>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
			<!--<ul class="navbar-nav mb-2 mr-1 mb-lg-0"> -->
			<ul class="navbar-nav mr-auto">

				<li class="nav-item <?php echo ($pagename == 'about') ? 'active' : '' ?>">
                    <a class="nav-link" href="/aboutus" <?php echo ( $pagename == "about" ) ?  "aria-current='page'" : "" ?> >Who We are
						<?php echo ( $pagename == "about" ) ?  '<span class="sr-only">(current)</span>' : "" ?> 
                    </a>
                </li>

				<li class="nav-item <?php echo ($pagename == 'services') ? 'active' : '' ?>">
                    <a class="nav-link" href="/services" <?php echo ( $pagename == "services" ) ?  "aria-current='page'" : "" ?> >What We Do
						<?php echo ( $pagename == "services" ) ?  '<span class="sr-only">(current)</span>' : "" ?> 
                    </a>
                </li>

				<li class="nav-item <?php echo ( $pagename == "blog" ) ?  "active" : "" ?>">
					<a class="nav-link" href="/blog" <?php echo ( $pagename == "blog" ) ?  "aria-current='page'" : "" ?> >
						<?php echo ( $pagename == "blog" ) ?  '<span class="sr-only">(current)</span>' : "" ?>  blog
					</a>
				</li>

				<li class="nav-item <?php echo ( $pagename == "training" ) ?  "active" : "" ?>">
					<a class="nav-link" href="/training" <?php echo ( $pagename == "training" ) ?  "aria-current='page'" : "" ?> >
						<?php echo ( $pagename == "training" ) ?  '<span class="sr-only">(current)</span>' : "" ?>  training
					</a>
				</li>

				<li class="nav-item <?php echo ( $pagename == "contact" ) ?  "active" : "" ?>">
					<a class="nav-link" href="/#contact" <?php echo ( $pagename == "contact" ) ?  "aria-current='page'" : "" ?> >
						<?php echo ( $pagename == "contact" ) ?  '<span class="sr-only">(current)</span>' : "" ?>  Contact
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- END common/header-nav.php -->
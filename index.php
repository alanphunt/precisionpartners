<?php
	const V = "1.0.4";
	require('handler.php');
	if (strpos($partner, "/") !== false) redirect(PARTNERS_URL . explode("/", $partner)[0]);
	if ($partner && !$partnerConfig[$partner]) redirect(PARTNERS_URL);
?>
<html lang="EN">
<head>
	<title>Precision Planting Partners | <?= $partnerConfig[$partner]['name']; ?></title>
	<meta charset="UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="precision planting, bullseye seed tubes, keeton seed firmer, seed lubricants, seed, planting, seedsense, airforce, planter, rowflow, wavevision, metermax, meter, planter technology institute, precision planting dealer, precision planting catalog, metermax ultra, precision planting support, precision planting tools, improving depth control, poor planter performance, metermax meter calibration, precision finger meters, eset, vaccum meters, fix planter problems, row control">
	<meta name="Description" content="Precision Planting is the place for new ideas and technology that help you achieve the best possible control of depth, spacing and germination.">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
	<link rel="stylesheet" href="/partners/css/original.css">
	<link rel="stylesheet" href="/partners/css/styles.css?<?=V?>">
	<script src="/partners/js/scripts.js?<?=V?>" defer></script>
</head>
<body>
<div id="modal">
	<i class="material-icons modalclose">close</i>
	<div class="wrapper">
		<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
		<h2 id="modalh2"></h2>
		<div class="modalgrid"></div>
	</div>
</div>

<header>
	<div class="header__fixed-container">
		<nav class="eyebrow" aria-label="Eyebrow">
			<div class="eyebrow__gutterize">
				<ul class="eyebrow__nav-list">
					<li class="eyebrow__nav-item">
						<a class="eyebrow__nav-list-link" href="https://www.precisionplanting.com/about">
							<span class="eyebrow__nav-list-link-text">About</span>
							<span class="eyebrow__nav-list-link-icon">
                	<svg class="info-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
    							<path fill="inherit" fill-rule="nonzero" d="M8 16A8 8 0 1 1 8 0a8 8 0 0 1 0 16zm0-2A6 6 0 1 0 8 2a6 6 0 0 0 0 12zm0-8a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm0 1a1 1 0 0 1 1 1v3a1 1 0 0 1-2 0V8a1 1 0 0 1 1-1z"></path>
</svg>
								</span>
						</a>
					</li>
					<li class="eyebrow__nav-item">
						<a class="eyebrow__nav-list-link" href="<?=$site_url?>products/" target="_blank" rel="noopener">
							<span class="eyebrow__nav-list-link-text">Support</span>
							<span class="eyebrow__nav-list-link-icon">
                            <svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
    <path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
</svg>                        </span>
						</a>
					</li>
					<li class="eyebrow__nav-item">
						<button class="eyebrow__search-button js-search-button-toggle" type="button" aria-pressed="false">
								<span class="eyebrow__search-button-inner">
                	<span class="eyebrow__search-button-text">Search</span>
                  <span class="eyebrow__search-button-icon">
                  	<svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
    <path fill="inherit&quot;" fill-rule="nonzero" d="M6 12A6 6 0 1 1 6 0a6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5.293 2.707a1 1 0 0 1 1.414-1.414l3 3a1 1 0 0 1-1.414 1.414l-3-3z"></path>
										</svg>
									</span>
								</span>
						</button>
					</li>
				</ul>
			</div>
		</nav>

		<form class="search-collapsible js-search-collapsible" inert="" aria-expanded="false" action="https://www.precisionplanting.com/search" method="get">
			<div class="search-collapsible__privacy-notice">
				<a class="privacy-notice privacy-notice--on-dark" href="https://www.agcocorp.com/ccpa-notice-at-collection.html">California Consumer Privacy Act (CCPA) Notice At Collection</a>        </div>
			<div class="search-collapsible__form">
				<div class="search-field">
					<label class="search-field__label">
						<span class="search-field__text">Search</span>
						<input class="search-field__input" id="header-search-input" type="text" name="q" value="">
					</label>
				</div>
				<div class="search-submit-button">
					<button class="background-slide-button background-slide-button--on-dark  " type="submit">
								<span class="background-slide-button__inner background-slide-button__inner--on-dark ">
								<span class="background-slide-button__text">
									Search
								</span>
									<span class="background-slide-button__icon ">
										<svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
											<path fill="inherit&quot;" fill-rule="nonzero" d="M6 12A6 6 0 1 1 6 0a6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5.293 2.707a1 1 0 0 1 1.414-1.414l3 3a1 1 0 0 1-1.414 1.414l-3-3z"></path>
										</svg>
									</span>
								</span>
					</button>
				</div>
			</div>
		</form>
		<div class="header__mobile-navbar">
			<div class="mobile-navbar">
				<a class="mobile-navbar__home-link" href="https://www.precisionplanting.com">
					<img class="mobile-navbar__plant" src="images/plant.svg" alt="" role="presentation">
					<img class="mobile-navbar__text" src="images/precision-text.svg" alt="" role="presentation">
					<span class="mobile-navbar__home-link-text">Home</span>
				</a>
				<div class="mobile-navbar__menu-toggle">
					<button class="mobile-menu-button js-toggle-menu" type="button" aria-controls="mobile-menu" aria-pressed="false">
    <span class="mobile-menu-button__text">
        Main navigation
    </span>
						<span class="mobile-menu-button__icon">
        <svg class="hamburger" width="30" height="30" viewBox="0 0 30 30" xmlns="http://www.w3.org/2000/svg">
    <g fill="inherit" fill-rule="evenodd">
        <path class="hamburger__bar-one" d="M1 4h28v4H1z"></path>
        <path class="hamburger__bar-two" d="M1 13h28v4H1z"></path>
        <path class="hamburger__bar-three" d="M1 22h28v4H1z"></path>
    </g>
</svg>    </span>
					</button>
				</div>
			</div>
		</div>

		<div class="header__navbar js-navbar">
			<div class="header__navbar-brand">
				<a class="logo-with-text-and-plant " href="https://www.precisionplanting.com">
					<img class="logo-with-text-and-plant__plant-logo" src="images/plant.svg" alt="Precision Planting">
					<img class="logo-with-text-and-plant__text-logo logo-with-text-and-plant__text-logo--big-only" src="images/precision-text.svg" alt="" role="presentation">
				</a>
			</div>

			<nav class="main-navigation" aria-label="Main">
				<ul class="main-navigation__nav-list">
					<li class="main-navigation__nav-item">
						<a class="main-navigation__nav-link" href="https://www.precisionplanting.com/agronomy/">
							<span class="main-navigation__nav-link-text">Agronomy</span>
						</a>
					</li>
					<li class="main-navigation__nav-item">
						<a class="main-navigation__nav-link" href="https://www.precisionplanting.com/products/">
							<span class="main-navigation__nav-link-text">Products</span>
						</a>
					</li>
					<li class="main-navigation__nav-item">
						<a class="main-navigation__nav-link" href="https://www.precisionplanting.com/events">
							<span class="main-navigation__nav-link-text">Events</span>
						</a>
					</li>
				</ul>
			</nav>

			<div class="header__dealer-locator-link-container">
				<a class="background-slide-link  background-slide-link--dealer  background-slide-link--on-dark " href="https://www.precisionplanting.com/dealerlocator">
					<span class="background-slide-link__text">Find dealer</span>
					<span class="background-slide-link__icon background-slide-link__icon--marker">
                            <svg class="marker" xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
    <path fill="inherit" fill-rule="evenodd" d="M2.292 15C.75 12.75 0 11.305 0 9a9 9 0 1 1 18 0c0 2.305-.75 3.75-2.292 6L9 24l-6.708-9zM9 13.5a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9z"></path>
</svg>
                    </span>
				</a>                </div>
		</div>
	</div>
	<div class="mobile-navigation" id="mobile-menu" aria-expanded="false">
		<div class="mobile-navigation__dealer-call-to-action">
			<a class="background-slide-link  background-slide-link--dealer  background-slide-link--on-dark " href="https://www.precisionplanting.com/dealerlocator">
				<span class="background-slide-link__text">Find dealer</span>
				<span class="background-slide-link__icon background-slide-link__icon--marker">
                            <svg class="marker" xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 18 24">
    <path fill="inherit" fill-rule="evenodd" d="M2.292 15C.75 12.75 0 11.305 0 9a9 9 0 1 1 18 0c0 2.305-.75 3.75-2.292 6L9 24l-6.708-9zM9 13.5a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9z"></path>
</svg>
                    </span>
			</a>        </div>
		<nav class="main-mobile-navigation" aria-label="Main">
			<ul class="main-mobile-navigation__link-list">
				<li class="main-mobile-navigation-item">
					<div class="main-mobile-navigation-item__link-toggle-container">
						<a class="main-mobile-navigation-item__link " href="https://www.precisionplanting.com/agronomy/">
							Agronomy
							<svg class="chevron-right-small" xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
								<path fill="inherit" fill-rule="nonzero" d="M3.354 5L.274 8.293a1.05 1.05 0 0 0 0 1.414c.365.39.958.39 1.323 0L6 5 1.597.293a.893.893 0 0 0-1.323 0 1.05 1.05 0 0 0 0 1.414L3.354 5z"></path>
							</svg>        </a>
					</div>
					<ul class="main-mobile-navigation-item__children-list" aria-expanded="false" id="main-nav-item-children-agronomy">
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/agronomy/research">
								Fundamentals
							</a>
						</li>
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/agronomy/news">
								News
							</a>
						</li>
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/agronomy/pti">
								Precision Technology Institute Farm
							</a>
						</li>
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/special-event/winterconference">
								Winter Conference 2020 – January 21, 22, 23 and 24
							</a>
						</li>
					</ul>
				</li>                    	<li class="main-mobile-navigation-item">
					<div class="main-mobile-navigation-item__link-toggle-container">
						<a class="main-mobile-navigation-item__link " href="https://www.precisionplanting.com/products/">
							Products
							<svg class="chevron-right-small" xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
								<path fill="inherit" fill-rule="nonzero" d="M3.354 5L.274 8.293a1.05 1.05 0 0 0 0 1.414c.365.39.958.39 1.323 0L6 5 1.597.293a.893.893 0 0 0-1.323 0 1.05 1.05 0 0 0 0 1.414L3.354 5z"></path>
							</svg>        </a>
					</div>
					<ul class="main-mobile-navigation-item__children-list" aria-expanded="false" id="main-nav-item-children-products">
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/products/all-products">
								All Products
							</a>
						</li>
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/products/testimonials">
								Grower Testimonials
							</a>
						</li>
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/products/videos">
								Videos
							</a>
						</li>
					</ul>
				</li>
				<li class="main-mobile-navigation-item">
					<div class="main-mobile-navigation-item__link-toggle-container">
						<a class="main-mobile-navigation-item__link " href="https://www.precisionplanting.com/about">
							About
							<svg class="chevron-right-small" xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
								<path fill="inherit" fill-rule="nonzero" d="M3.354 5L.274 8.293a1.05 1.05 0 0 0 0 1.414c.365.39.958.39 1.323 0L6 5 1.597.293a.893.893 0 0 0-1.323 0 1.05 1.05 0 0 0 0 1.414L3.354 5z"></path>
							</svg>        </a>
					</div>
					<ul class="main-mobile-navigation-item__children-list" aria-expanded="false" id="main-nav-item-children-about">
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/about">
								About
							</a>
						</li>
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/newsletter/subscribe">
								Newsletters
							</a>
						</li>
						<li class="main-mobile-navigation-item__children-item ">
							<a class="main-mobile-navigation-item__children-link" href="https://www.precisionplanting.com/newsletter/unsubscribe">
								Unsubscribe
							</a>
						</li>
					</ul>
				</li>
				<li class="main-mobile-navigation-item">
					<div class="main-mobile-navigation-item__link-toggle-container">
						<a class="main-mobile-navigation-item__link " href="https://www.precisionplanting.com/events">
							Events
							<svg class="chevron-right-small" xmlns="http://www.w3.org/2000/svg" width="6" height="10" viewBox="0 0 6 10">
								<path fill="inherit" fill-rule="nonzero" d="M3.354 5L.274 8.293a1.05 1.05 0 0 0 0 1.414c.365.39.958.39 1.323 0L6 5 1.597.293a.893.893 0 0 0-1.323 0 1.05 1.05 0 0 0 0 1.414L3.354 5z"></path>
							</svg>
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<div class="mobile-navigation__region-support-container">

			<a class="mobile-navigation__support-link" href="<?=$site_url?>products/" target="_blank" rel="noopener">
				Support
				<span class="mobile-navigation__support-link-icon">
                    <svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
    <path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
</svg>                </span>
			</a>
		</div>

		<div class="mobile-navigation__bottom-container">
			<div class="mobile-navigation__privacy-notice">
				<a class="privacy-notice privacy-notice--on-dark" href="https://www.agcocorp.com/ccpa-notice-at-collection.html">California Consumer Privacy Act (CCPA) Notice At Collection</a>                </div>
			<form class="mobile-navigation__search-form" action="https://www.precisionplanting.com/search" method="get">
				<div class="mobile-navigation__search-field-container">
					<div class="search-field">
						<label class="search-field__label">
							<span class="search-field__text">Search</span>
							<input class="search-field__input" id="header-search-input" type="text" name="q" value="">
						</label>
					</div>                </div>
				<div class="search-submit-button">
					<button class="background-slide-button background-slide-button--on-dark  " type="submit">

    <span class="background-slide-button__inner background-slide-button__inner--on-dark ">
        <span class="background-slide-button__text">
            Search
        </span>
			<span class="background-slide-button__icon ">
				<svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
					<path fill="inherit&quot;" fill-rule="nonzero" d="M6 12A6 6 0 1 1 6 0a6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5.293 2.707a1 1 0 0 1 1.414-1.414l3 3a1 1 0 0 1-1.414 1.414l-3-3z"></path>
				</svg>
			</span>
		</span>
					</button>
				</div>
			</form>
		</div>

	</div>
</header>

<main>
	<div class="hero">
		<h1 class="h1">Precision Planting Partnership</h1>
		<div id="skewwrapper">
			<div id="skewcontent" class="container">
				<div>
					<?=$partnerConfig[$partner]["logo"]
						? "<img src='{$partnerConfig[$partner]['logo']}' alt='{$partnerConfig[$partner]['name']}'>"
						: "<h3>Your logo here!</h3>"
					?>
				</div>
				<div>
					<img src="images/pp.png" alt="Precision Planting">
				</div>
			</div>
			<div id="left"></div>
			<div id="right"></div>
		</div>
		<div id="herobubble" class="container" >
			<h3 class="marg-bot">As a partner, you gain access to a number of great resources that
				will help you market and sell to your customers and provide the
				support they need.</h3>
			<div class="cirlogo">
				<svg class="precision-circle" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
					<path fill="inherit" fill-rule="evenodd" d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16-7.163 16-16 16zm-4.13-18.034c.374 3.259 5.319 12.415 5.319 12.415l.426 1.048s.964-4.514 2.902-9.044c1.479-3.452 8.921-9.31 4.245-9.136-3.646.138-5.465 5.98-6.356 10.926a11.817 11.817 0 0 0-.272-2.37c-.994-4.337.375-7.153-1.53-9.564-1.357-1.715-.753 6.083-.103 12.22-1.14-5.163-3.66-11.634-9.167-11.73-8.086-.135 4.111 1.516 4.536 5.235z"></path>
				</svg>
				<div class="heroanimation">
					<div class="line">
						<div class="heroline"></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<section class="title">
		<div class="cir"></div>
		<div>
			<h2 class='sectionh2'>
				<?= ($partner == "" ? "Search for a Partner" : "Resources")?>
			</h2>
		</div>
	</section>

	<div id="gridwrapper">
		<!--<div class="gridcontainer container">-->
		<?php
			populateHomepageGrid($files);
		?>
		<!--</div>-->
	</div>
</main>

<footer class="footer">
	<div class="footer__gutterized">
		<div class="footer__logo-container">
			<a class="logo-with-text-and-plant " href="https://www.precisionplanting.com">
				<img class="logo-with-text-and-plant__plant-logo" src="images/plant.svg" alt="Precision Planting">
				<img class="logo-with-text-and-plant__text-logo " src="images/precision-text.svg" alt="" role="presentation">
			</a>
			<div class="footer__social-media-container">
				<div class="social-media">
					<a class="social-media__link" href="https://facebook.com/precisionplanting" title="Precision Planting on Facebook">
						<svg class="social-media__icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="12" height="24" viewBox="0 0 16 32">
							<title>Precision Planting on Facebook</title>
							<path d="M10.64 32H3.545V15.998H0v-5.514h3.545v-3.31c0-4.498 2-7.174 7.688-7.174h4.734v5.516H13.01c-2.214 0-2.36.77-2.36 2.208l-.01 2.76H16l-.628 5.514h-4.734V32h.002z"></path>
						</svg>
					</a>
					<a class="social-media__link" href="https://twitter.com/precisionplant" title="Precision Planting on Twitter">
						<svg class="social-media__icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 28 24">
							<title>Precision Planting on Twitter</title>
							<path d="M24.702 3.794a6.014 6.014 0 0 0 2.524-3.35 11.14 11.14 0 0 1-3.65 1.47C22.533.734 21.04 0 19.387 0c-3.173 0-5.743 2.713-5.743 6.058 0 .475.047.938.146 1.38-4.774-.253-9.006-2.663-11.84-6.33a6.3 6.3 0 0 0-.778 3.047c0 2.1 1.014 3.955 2.555 5.044a5.54 5.54 0 0 1-2.603-.76v.076c0 2.936 1.98 5.385 4.61 5.94-.483.142-.99.213-1.515.213-.37 0-.733-.037-1.08-.108.73 2.406 2.85 4.16 5.365 4.207C6.538 20.394 4.06 21.36 1.37 21.36c-.463 0-.92-.026-1.37-.083C2.542 22.995 5.562 24 8.806 24 19.373 24 25.15 14.768 25.15 6.762c0-.264-.005-.525-.016-.784A12.008 12.008 0 0 0 28 2.84a11.01 11.01 0 0 1-3.298.954z"></path>
						</svg>
					</a>
					<a class="social-media__link" href="https://youtube.com/user/PrecisionPlanting" title="Precision Planting on YouTube">
						<svg class="social-media__icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="26" height="18" viewBox="0 0 34 24">
							<title>Precision Planting on YouTube</title>
							<path d="M34 18.11V5.89S34 0 28.14 0H5.858S0 0 0 5.89v12.22S0 24 5.857 24H28.14S34 24 34 18.11m-10.4-6.093l-11.13 6.57V5.445l11.13 6.573"></path>
						</svg>
					</a>
				</div>
			</div>
		</div>
		<div class="footer__link-lists">
			<div class="footer__link-list-container">
				<div class="footer__link-list-container-line"></div>
				<ul class="footer-link-list">
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.precisionplanting.com/contact">
								<span class="footer-link__text">
               		Contact us
            		</span>
						</a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://careers.agcocorp.com/search/?q=%22Precision+Planting%22" target="_blank" rel="noopener"><span class="footer-link__text">
                Careers
            </span><span class="footer-link__external-icon"><svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path></svg></span></a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="http://precisionplanting.corpmerchandise.com" target="_blank" rel="noopener">
								<span class="footer-link__text">
                	Clothing store
            		</span>
							<span class="footer-link__external-icon">
									<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
										<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
									</svg>
								</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="footer__link-list-container">
				<div class="footer__link-list-container-line"></div>
				<ul class="footer-link-list">
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.precisionplanting.com/newsletter/subscribe">
								<span class="footer-link__text">
                	Newsletters
								</span>
						</a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.precisionplanting.com/newsletter/unsubscribe">
								<span class="footer-link__text">
                	Unsubscribe
								</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="footer__link-list-container">
				<div class="footer__link-list-container-line"></div>
				<ul class="footer-link-list">
					<li class="footer-link-list__item">
						<a class="footer-link" href="<?=$site_url?>login" target="_blank" rel="noopener">
								<span class="footer-link__text">
                	Cloud login
            		</span>
							<span class="footer-link__external-icon">
									<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
										<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
									</svg>
								</span>
						</a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.agcocorp.com/legal.html" target="_blank" rel="noopener">
								<span class="footer-link__text">
                	Terms of use
            		</span>
							<span class="footer-link__external-icon">
									<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
										<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
									</svg>
								</span>
						</a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.agcocorp.com/privacy.html" target="_blank" rel="noopener">
								<span class="footer-link__text">
                	Privacy
            		</span>
							<span class="footer-link__external-icon">
									<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
										<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
									</svg>
								</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="footer__link-list-container">
				<div class="footer__link-list-container-line"></div>
				<ul class="footer-link-list">
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.agcocorp.com/cookies.html" target="_blank" rel="noopener">
								<span class="footer-link__text">
               		Cookie policy
            		</span>
							<span class="footer-link__external-icon">
									<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
										<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
									</svg>
								</span>
						</a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.agcocorp.com/do-not-sell-my-information.html" target="_blank" rel="noopener">
								<span class="footer-link__text">
                	Do Not Sell My Info
            		</span>
							<span class="footer-link__external-icon">
									<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
										<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
									</svg>
								</span>
						</a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.agcocorp.com/ccpa-notice-at-collection.html" target="_blank" rel="noopener"><span class="footer-link__text">
                California Notice at Collection
            </span>
							<span class="footer-link__external-icon">
									<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
										<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
									</svg>
								</span>
						</a>
					</li>
					<li class="footer-link-list__item">
						<a class="footer-link" href="https://www.precisionplanting.com/trademarks">
								<span class="footer-link__text">
                	Trademarks
            		</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="footer__link-list-container">
				<div class="footer__link-list-container-line"></div>
				<div class="footer__contacts">
					<div class="footer__contact">
						<div class="footer__contact-heading">
							<a class="footer-link" href="https://eu.precisionplanting.com" target="_blank" rel="noopener">
									<span class="footer-link__text">
                		Western Europe
            			</span>
								<span class="footer-link__external-icon">
										<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
											<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
										</svg>
									</span>
							</a>
						</div>
						<div class="footer__contact-phone">
							<a class="footer-link" href="tel:+3 (363) 114-5197">
									<span class="footer-link__text">
										+3 (363) 114-5197
									</span>
							</a>
						</div>
						<a class="footer-link" href="mailto:benoit.blateyron@precisionplanting.com">
								<span class="footer-link__text">
                	Email
            		</span>
							<span class="footer-link__envelope-icon">
									<svg class="envelope" width="16" height="12" viewBox="0 0 16 12" xmlns="http://www.w3.org/2000/svg">
										<path d="M14.5 0A1.5 1.5 0 0116 1.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 010 10.5v-9A1.5 1.5 0 011.5 0h13zm0 1.5h-13v1.275c.7.57 1.818 1.458 4.206 3.328C6.232 6.517 7.275 7.512 8 7.5c.725.011 1.768-.983 2.294-1.397 2.388-1.87 3.505-2.757 4.206-3.328V1.5zm-13 9h13V4.7c-.716.57-1.732 1.37-3.28 2.583C10.516 7.838 9.335 9.007 8 9c-1.342.007-2.538-1.18-3.22-1.717A533.147 533.147 0 011.5 4.7v5.8z" fill="inherit" fill-rule="nonzero"></path>
									</svg>
								</span>
						</a>
					</div>
					<div class="footer__contact">
						<div class="footer__contact-heading">
							<a class="footer-link" href="https://precisionplanting.com.ar" target="_blank" rel="noopener">
									<span class="footer-link__text">
                		Argentina
									</span>
								<span class="footer-link__external-icon">
										<svg class="external-link-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
											<path fill="inherit" fill-rule="evenodd" d="M12.586 2H10a1 1 0 1 1 0-2h6v6a1 1 0 0 1-2 0V3.414l-8.293 8.293a1 1 0 1 1-1.414-1.414L12.586 2zM2 14h10V9a1 1 0 0 1 2 0v7H0V2h7a1 1 0 1 1 0 2H2v10z"></path>
										</svg>
									</span>
							</a>
						</div>
						<div class="footer__contact-phone">
							<a class="footer-link" href="tel:+54 237 485 8100">
									<span class="footer-link__text">
										+54 237 485 8100
									</span>
							</a>
						</div>
						<a class="footer-link" href="mailto:argentina@precisionplanting.com">
								<span class="footer-link__text">
									Email
								</span>
							<span class="footer-link__envelope-icon">
									<svg class="envelope" width="16" height="12" viewBox="0 0 16 12" xmlns="http://www.w3.org/2000/svg">
										<path d="M14.5 0A1.5 1.5 0 0116 1.5v9a1.5 1.5 0 01-1.5 1.5h-13A1.5 1.5 0 010 10.5v-9A1.5 1.5 0 011.5 0h13zm0 1.5h-13v1.275c.7.57 1.818 1.458 4.206 3.328C6.232 6.517 7.275 7.512 8 7.5c.725.011 1.768-.983 2.294-1.397 2.388-1.87 3.505-2.757 4.206-3.328V1.5zm-13 9h13V4.7c-.716.57-1.732 1.37-3.28 2.583C10.516 7.838 9.335 9.007 8 9c-1.342.007-2.538-1.18-3.22-1.717A533.147 533.147 0 011.5 4.7v5.8z" fill="inherit" fill-rule="nonzero"></path>
									</svg>
								</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<script src="/partners/js/runtime.js"></script>
<script src="/partners/js/main.js"></script>
</body>
</html>

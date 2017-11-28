<?php

/**
 * @file
 * Adaptivetheme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * Adaptivetheme supplied variables:
 * - $site_logo: Themed logo - linked to front with alt attribute.
 * - $site_name: Site name linked to the homepage.
 * - $site_name_unlinked: Site name without any link.
 * - $hide_site_name: Toggles the visibility of the site name.
 * - $visibility: Holds the class .element-invisible or is empty.
 * - $primary_navigation: Themed Main menu.
 * - $secondary_navigation: Themed Secondary/user menu.
 * - $primary_local_tasks: Split local tasks - primary.
 * - $secondary_local_tasks: Split local tasks - secondary.
 * - $tag: Prints the wrapper element for the main content.
 * - $is_mobile: Mixed, requires the Mobile Detect or Browscap module to return
 *   TRUE for mobile.  Note that tablets are also considered mobile devices.
 *   Returns NULL if the feature could not be detected.
 * - $is_tablet: Mixed, requires the Mobile Detect to return TRUE for tablets.
 *   Returns NULL if the feature could not be detected.
 * - *_attributes: attributes for various site elements, usually holds id, class
 *   or role attributes.
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Core Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * Adaptivetheme Regions:
 * - $page['leaderboard']: full width at the very top of the page
 * - $page['menu_bar']: menu blocks placed here will be styled horizontal
 * - $page['secondary_content']: full width just above the main columns
 * - $page['content_aside']: like a main content bottom region
 * - $page['tertiary_content']: full width just above the footer
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see adaptivetheme_preprocess_page()
 * @see adaptivetheme_process_page()
 */
?>
<div id="page-wrapper">
  <div id="page" class="container <?php print $classes; ?>">

    <!-- !Leaderboard Region -->
    <?php print render($page['leaderboard']); ?>

    <header<?php print $header_attributes; ?>>

      <?php if ($site_logo || $site_name || $site_slogan): ?>
        <!-- !Branding -->
        <div<?php print $branding_attributes; ?>>

          <?php if ($site_name || $site_slogan): ?>
            <!-- !Site name and Slogan -->
            <div<?php print $hgroup_attributes; ?>>

              <?php if ($site_name): ?>
                <h1<?php print $site_name_attributes; ?>><?php print $site_name; ?></h1>
              <?php endif; ?>

              <?php if ($site_slogan): ?>
                <h2<?php print $site_slogan_attributes; ?>><?php print $site_slogan; ?></h2>
              <?php endif; ?>

            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <!-- !Header Region -->
      <?php /* print render($page['header']); */ ?>
      <div class="region region-header">
        <div class="region-inner clearfix">
          <div id="block-delta-blocks-logo" class="block block-delta-blocks">
            <?php if ($site_logo): ?>
              <div class="logo-img">
                <?php print $site_logo; ?>
              </div>
            <?php endif; ?>
			<div class='below_logo'>604 Bel Air Blvd. Mobile, AL <span><a href="tel://1-251-470-9961">(251) 470-9961</a></span>
				<span>Hours 10AM-5PM Tuesday-Saturday</span>
			</div>
          </div>
          <nav id="block-system-main-menu" role="navigation">
            <?php print render($page['menu_bar']); ?>
            <?php if ($primary_navigation): print $primary_navigation; endif; ?>
            <?php if ($secondary_navigation): print $secondary_navigation; endif; ?>
          </nav>
          <div id="block-search-form" class="block block-search" role="search">
            <?php
            $block = module_invoke('search', 'block_view', 'form');
            print render($block['content']);
            ?>
          </div>
          <div id="block-block-6" class="block custom-show-menu">
            <div class="block-inner">
              <div class="mobile-menu-button">
                <a href="#">&nbsp;</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <?php if ($page['region_slider']): ?>
      <div id="region_slider" class="region_slider">
        <?php print render($page['region_slider']); ?>
      </div> <!-- /region_logo -->
    <?php endif; ?>

    <!-- !Messages and Help -->
    <?php print $messages; ?>
    <?php print render($page['help']); ?>

    <!-- !Secondary Content Region -->
    <?php print render($page['secondary_content']); ?>
    <?php if ($is_mobile && !$is_tablet) :?>
      <div id="columns" class="columns mobile clearfix">
    <?php endif;?>
    <?php if (($is_mobile && $is_tablet) || !$is_mobile) :?>
      <div id="columns" class="columns clearfix">
    <?php endif;?>
      <main id="content-column" class="content-column" role="main">
        <div class="content-inner">

          <!-- !Highlighted region -->
          <?php print render($page['highlighted']); ?>

          <<?php print $tag; ?> id="main-content">

            <?php print render($title_prefix); ?> <!-- Does nothing by default in D7 core -->

            <!-- !Main Content Header -->
            <?php if ($title || $primary_local_tasks || $secondary_local_tasks || $action_links = render($action_links)): ?>
              <header<?php print $content_header_attributes; ?>>

                <?php if ($title): ?>
                  <h1 id="page-title">
                    <?php print $title; ?>
                  </h1>
                <?php endif; ?>

                <?php if ($primary_local_tasks || $secondary_local_tasks || $action_links): ?>
                  <div id="tasks">

                    <?php if ($primary_local_tasks): ?>
                      <ul class="tabs primary clearfix"><?php print render($primary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($secondary_local_tasks): ?>
                      <ul class="tabs secondary clearfix"><?php print render($secondary_local_tasks); ?></ul>
                    <?php endif; ?>

                    <?php if ($action_links = render($action_links)): ?>
                      <ul class="action-links clearfix"><?php print $action_links; ?></ul>
                    <?php endif; ?>

                  </div>
                <?php endif; ?>

              </header>
            <?php endif; ?>

            <!-- !Main Content -->
            <?php if ($content = render($page['content'])): ?>
              <div id="content" class="region">
                <?php print $content; ?>
              </div>
            <?php endif; ?>

            <!-- !Feed Icons -->
            <?php print $feed_icons; ?>

            <?php print render($title_suffix); ?> <!-- Prints page level contextual links -->

          </<?php print $tag; ?>><!-- /end #main-content -->

          <!-- !Content Aside Region-->
          <?php print render($page['content_aside']); ?>

        </div><!-- /end .content-inner -->
      </main><!-- /end #content-column -->

      <!-- !Sidebar Regions -->
      <?php $sidebar_first = render($page['sidebar_first']); print $sidebar_first; ?>
      <?php $sidebar_second = render($page['sidebar_second']); print $sidebar_second; ?>

    </div><!-- /end #columns -->

    <!-- !Tertiary Content Region -->
    <?php print render($page['tertiary_content']); ?>

    <!-- !Footer -->
    
      <footer<?php print $footer_attributes; ?>>
<?php if ($page['footer'] || $attribution): ?>
        <?php print render($page['footer']); ?>
 <?php endif; ?>
        <?php print $attribution; ?>
        <div class="copyright"><!-- <p>Drupal DEMO Store. Copyright ©&nbsp;2015 Themes by <a href="http://adcisolutions.com/" title="drupal development">ADCI solutions</a>. All Rights Reserved.</p> -->
          <ul class="footer__list"><li>Copyright ©&nbsp;2017</li> 
            <li>Plantation Antique Galleries</li>
            
            <li>604 Bel Air Blvd, Mobile AL 36606</li>
            <li><a href="tel://1-251-470-9961">(251) 470-9961</a></li>
            <li><a href="mailto:info@plantationgalleries.com">info@plantationgalleries.com</a></li>
          </ul>
        </div>
      </footer>
	   <script type="application/ld+json">
		{
		 "@context": "http://schema.org",
		 "@type": "LocalBusiness",
		 "address": {
		   "@type": "PostalAddress",
		   "addressLocality": "Mobile",
		   "addressRegion": "AL",
		   "streetAddress": "604 Bel Air Blvd",
		   "postalCode": "36606"
		 },
		 "description": "We are proud to offer Gulf Coast's largest selection of fine Oriental rugs, quality antiques of the 18th and 19th centuries, unique vintage lighting, and fine decorator accessories, all curated to suit the look of today's perfect mix of old and new, modern and Old World.",
		 "name": "Plantation Antique Galleries",
		 "telephone": "12514709961",
		 "image": "http://plantationgalleries.com/sites/default/files/logo-1.png"
		}
		</script>
		<script type="application/ld+json">
		{
		 "@context": "http://schema.org",
		 "@type": "Store",
		 "address": {
		   "@type": "PostalAddress",
		   "addressLocality": "Mobile",
		   "addressRegion": "AL",
		   "streetAddress": "604 Bel Air Blvd",
		   "postalCode": "36606"
		 },
		 "description": "We are proud to offer Gulf Coast's largest selection of fine Oriental rugs, quality antiques of the 18th and 19th centuries, unique vintage lighting, and fine decorator accessories, all curated to suit the look of today's perfect mix of old and new, modern and Old World.",
		 "name": "Plantation Antique Galleries",
		 "telephone": "12514709961",
		 "image": "http://plantationgalleries.com/sites/default/files/logo-1.png"
		}
		</script>

  </div>
</div>

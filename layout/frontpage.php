<?php  //require the theme lib.php file - but check first whether the theme location has been set in moodle config.php
if (!empty($CFG->themedir) and file_exists("$CFG->themedir/krystle")) {
    require_once ($CFG->themedir."/krystle/lib.php");
} else {
    require_once ($CFG->dirroot."/theme/krystle/lib.php");
}

$hasheading = ($PAGE->heading);
$hasnavbar = (empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar());
$hasfooter = (empty($PAGE->layout_options['nofooter']));

// $PAGE->blocks->region_has_content('region_name') doesn't work as we do some sneaky stuff 
// to hide nav and/or settings blocks if requested
$blocks_side_pre = trim($OUTPUT->blocks_for_region('side-pre'));
$hassidepre = strlen($blocks_side_pre);
$blocks_side_post = trim($OUTPUT->blocks_for_region('side-post'));
$hassidepost = strlen($blocks_side_post);

$topsettings = $this->page->get_renderer('theme_krystle','topsettings');
$awesome_nav = $topsettings->navigation_tree($this->page->navigation);
$awesome_settings = $topsettings->settings_tree($this->page->settingsnav);

$custommenu = $OUTPUT->custom_menu();
$hascustommenu = (empty($PAGE->layout_options['nocustommenu']) && !empty($custommenu));

// Course call backs - for Moodle2.4
$courseheader = $coursecontentheader = $coursecontentfooter = $coursefooter = '';
if (empty($PAGE->layout_options['nocourseheaderfooter'])) {  //Check if we're displaying course specific headers and footers
    $courseheader = method_exists($OUTPUT, "course_header") ? $OUTPUT->course_header() : NULL; //Course header - Backward compatible for <2.4
    $coursecontentheader = method_exists($OUTPUT, "course_content_header") ? $OUTPUT->course_content_header() : NULL; //Course content header - Backward compatible for <2.4
    if (empty($PAGE->layout_options['nocoursefooter'])) { //Chekc if we're displaying course footers
        $coursefooter = method_exists($OUTPUT, "course_footer") ? $OUTPUT->course_footer() : NULL; //Course footer - Backward compatible for <2.4
      $coursecontentfooter = method_exists($OUTPUT, "course_content_footer") ? $OUTPUT->course_content_footer() : NULL; //Course Content Footer - Backward compatible for <2.4
    }
}

//Call function to initialise awesomebar
krystle_initialise_awesomebar($PAGE);

//Set body classes for various functions and layouts
$bodyclasses = array();

if(!empty($PAGE->theme->settings->useeditbuttons) && $PAGE->user_allowed_editing()) {
    krystle_initialise_editbuttons($PAGE);
    $bodyclasses[] = 'krystle_with_edit_buttons';
}

if ($hassidepre && !$hassidepost) {
    $bodyclasses[] = 'side-pre-only';
} else if ($hassidepost && !$hassidepre) {
    $bodyclasses[] = 'side-post-only';
} else if (!$hassidepost && !$hassidepre) {
    $bodyclasses[] = 'content-only';
}

if(!empty($PAGE->theme->settings->persistentedit) && $PAGE->user_allowed_editing()) {
    if(property_exists($USER, 'editing') && $USER->editing) {
        $OUTPUT->set_really_editing(true);
    }
    $USER->editing = 1;
    $bodyclasses[] = 'krystle_persistent_edit';
}

//Custom footnote in settings?
if (!empty($PAGE->theme->settings->footnote)) {
    $footnote = $PAGE->theme->settings->footnote;
} else {
    $footnote = '<!-- There was no custom footnote set -->';
}

// Tell IE to use the latest engine (no Compatibility mode), if the user is using IE.
$ie = false;
if (class_exists('core_useragent')) {
    if (core_useragent::check_ie_version()) {
        $ie = true;
    }
} else if (check_browser_version("MSIE", "0")) {
    $ie = true;
}
if ($ie) {
    header('X-UA-Compatible: IE=edge');
}

//Settings for responsive design taken from Zebra theme
$userespond = ($PAGE->theme->settings->userespond); //Check the theme settings to see if respond.js should be called
$usecf = ($PAGE->theme->settings->usecf); //Check the theme settings to see if Chrome Frame should be called
$cfmaxversion = ($PAGE->theme->settings->cfmaxversion); //Check the theme settings to see which versions of IE get prompted for Chrome Frame
$ieversion = strpos($PAGE->bodyclasses, $cfmaxversion);
$usingie = strpos($PAGE->bodyclasses, 'ie ie'); //Check if the user is using IE
$usingie9 = strpos($PAGE->bodyclasses, 'ie9'); //Make sure the user isn't using IE9 because it can use @media declarations natively
$usingios = (preg_match('/iPhone|iPod|iPad/i', $_SERVER['HTTP_USER_AGENT']));
$requiresrespond = ($userespond && $usingie && !$usingie9); //Check all the options necessary to print respond.js
$requirescf = ($usecf && $usingie && $ieversion); // Check all the options necessary to print chrome frame

//Settings for profilebar taken from Aardvark
$hasemailurl = (!empty($PAGE->theme->settings->emailurl));
$hasprofilebarcustom = (!empty($PAGE->theme->settings->profilebarcustom));

//Standard Moodle top of file - doctype/html etc
echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes() ?>>
<head>
    <?php if ($usecf) { ?><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><?php } ?>
    <title><?php echo $PAGE->title ?></title>
    <meta name="description" content="<?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="<?php echo $OUTPUT->pix_url('favicon/favicon', 'theme'); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $OUTPUT->pix_url('favicon/h/apple-touch-icon-precomposed', 'theme'); ?>">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $OUTPUT->pix_url('favicon/m/apple-touch-icon-precomposed', 'theme'); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $OUTPUT->pix_url('favicon/l/apple-touch-icon-precomposed', 'theme'); ?>">

    <?php echo $OUTPUT->standard_head_html() ?>
    
    <!--Scroll to top button script-->
    <script type="text/javascript">
    YUI().use('node', function(Y) {
        window.thisisy = Y;
    	Y.one(window).on('scroll', function(e) {
    	    var node = Y.one('#back-to-top');

    	    if (Y.one('window').get('docScrollY') > Y.one('#page-content-wrapper').getY()) {
    		    node.setStyle('display', 'block');
    	    } else {
    		    node.setStyle('display', 'none');
    	    }
    	});

    });
    </script>
</head>

<body id="<?php p($PAGE->bodyid) ?>" class="<?php p($PAGE->bodyclasses.' '.join(' ', $bodyclasses)) ?>">
<?php echo $OUTPUT->standard_top_of_body_html();

//Awesome bar - at top of page
if (empty($PAGE->layout_options['noawesomebar'])) { ?>
    <div id="awesomebar" class="krystle-awesome-bar">
        <?php
            if( $this->page->pagelayout != 'maintenance' // Don't show awesomebar if site is being upgraded
                && !(get_user_preferences('auth_forcepasswordchange') && !session_is_loggedinas()) // Don't show it when forcibly changing password either
              ) {
                echo $awesome_nav;
                if ($hascustommenu && !empty($PAGE->theme->settings->custommenuinawesomebar) && empty($PAGE->theme->settings->custommenuafterawesomebar)) {
                    echo $custommenu;
                }
                echo $awesome_settings;
                if ($hascustommenu && !empty($PAGE->theme->settings->custommenuinawesomebar) && !empty($PAGE->theme->settings->custommenuafterawesomebar)) {
                    echo $custommenu;
                }
                echo $topsettings->settings_search_box();
            }
        ?>
    </div>
<?php } ?>

<!-- Main page div -->
<div id="page">

<?php if ($hasheading || $hasnavbar) { ?>

    <div id="page-header">
		<div id="page-header-wrapper">
	        
	        <?php if ($hasheading) { ?>
		    	<h1 class="headermain"><?php echo $PAGE->heading ?></h1>
    		    <div class="headermenu">
        			<?php
        	            include('profileblock.php') //ProfileBlock is included as a separate php file to make future editing easier
        			?>
	        	</div>
	        <?php } ?>        
        	
	    </div>
    </div>
    
    <!-- Add custom menu if its not included in awesomebar already -->
    <?php if ($hascustommenu && empty($PAGE->theme->settings->custommenuinawesomebar)) { ?>
      <div id="custommenu" class="krystle-awesome-bar"><?php echo $custommenu; ?></div>
 	<?php } ?>
 	
    <!-- Add breadcumbs -->
    <?php if ($hasnavbar) { ?>
	    <div class="navbar clearfix">
    	    <div class="breadcrumb"><?php echo $OUTPUT->navbar(); ?></div>
            <div class="navbutton"> <?php echo $PAGE->button; ?></div>
        </div>
    <?php } ?>

<?php } ?>
<!-- END OF HEADER -->
<div id="page-content-wrapper" class="clearfix">
    <div id="page-content">
        <div id="region-main-box">
            <div id="region-post-box">
            
                <div id="region-main-wrap">
                    <div id="region-main">
                        <div class="region-content">
                        	<?php    include('bxslider.php'); //BoxSlider is included as a separate php file to make future editing easier ?>
                        
                            <!--course callback contents for certain course types in 2.4-->
                            <?php if (!empty($courseheader)) { ?>
                                 <div id="course-header"><?php echo $courseheader; ?></div>
                            <?php } ?>
                            <?php echo $coursecontentheader; ?>
                            
                            <!--Main Content for page -->
                            <?php echo method_exists($OUTPUT, "main_content")?$OUTPUT->main_content():core_renderer::MAIN_CONTENT_TOKEN ?>
                            
                            <!--course callback contents for certain course types in 2.4-->
                            <?php echo $coursecontentfooter; ?>
                            
                        </div>
                    </div>
                </div>
                
                <!--SidePre region content - usually left-->
                <?php if ($hassidepre) { ?>
                <div id="region-pre" class="block-region">
                    <div class="region-content">
                        <?php echo $blocks_side_pre ?>
                    </div>
                </div>
                <?php } ?>
                
                <!--SidePost region content - usually right-->
                <?php if ($hassidepost) { ?>
                <div id="region-post" class="block-region">
                    <div class="region-content">
                        <?php echo $blocks_side_post ?>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>

<!-- START OF FOOTER -->
    <!-- Course footer as per 2.4 callbacks-->
    <?php     if (!empty($coursefooter)) { ?>	
       <div id="course-footer"><?php echo $coursefooter; ?></div>
    <?php } ?>
    
    <!--Main theme footer-->
    <?php if ($hasfooter) { ?>
    <div id="page-footer" class="clearfix">
		<div class="footnote"><?php echo $footnote; ?></div>
        <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')) ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </div>
    <?php } ?>
</div>
    <!-- Responsive scripts - called as required from theme settings -->
    <?php if ($requirescf) {
	$PAGE->requires->js(new moodle_url('http://ajax.googleapis.com/ajax/libs/chrome-frame/1/CFInstall.min.js')); ?>
	<script>
	    //<![CDATA[
		window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})
	    //]]>
	</script>
    <?php }
    	
    if ($requiresrespond) {
        if (!empty($CFG->themedir) and file_exists("$CFG->themedir/krystle")) {
	    $PAGE->requires->js($CFG->themedir.'/krystle/yui/respond.js');
	    } else {
	    $PAGE->requires->js($CFG->dirroot.'/theme/krystle/yui/respond.js');
	    }
    }
    if ($usingios) { //Check if the user is using iOS and serve a JS to fix a viewport re-flow bug
        if (!empty($CFG->themedir) and file_exists("$CFG->themedir/krystle")) {
	    $PAGE->requires->js($CFG->themedir.'/krystle/yui/iOS-viewport-fix.js');
	    } else {
	    $PAGE->requires->js($CFG->dirroot.'/theme/krystle/yui/iOS-viewport-fix.js');
	    }
    } ?>
<!--Standard bottom of page-->      
<?php echo $OUTPUT->standard_end_of_body_html() ?>

<!--Scroll to top arrow - see script in header-->
<div id="back-to-top"> 
    <a class="arrow" href="#">▲</a> 
    <a class="text" href="#">Back to Top</a> 
</div>
</body>
</html>

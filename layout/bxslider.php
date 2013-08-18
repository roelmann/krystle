<!-- START BXSLIDER -->
<?php
/* Determine if any slides are used */
$slides=0;
if (!empty($PAGE->theme->settings->bxtext1)) {
$slides+=1; }
if (!empty($PAGE->theme->settings->bxtext2)) {
$slides+=1; }
if (!empty($PAGE->theme->settings->bxtext3)) {
$slides+=1; }
if (!empty($PAGE->theme->settings->bxtext4)) {
$slides+=1; }
if (!empty($PAGE->theme->settings->bxtext5)) {
$slides+=1; }
if (!empty($PAGE->theme->settings->bxtext6)) {
$slides+=1; }
if (!empty($PAGE->theme->settings->bxtext7)) {
$slides+=1; }
if (!empty($PAGE->theme->settings->bxtext8)) {
$slides+=1; }
/* if slides=0 then no headings are in place and no need to run file. If slides >0 then run file to display all slides with headings

/* Only run file if any slides are used */
if ($slides!=0) {

/* Set image files */
if (!empty($PAGE->theme->settings->bximage1)) {
        $image1 = $PAGE->theme->settings->bximage1;
    } else {
        $image1 = $OUTPUT->pix_url('bxslider/image1', 'theme');
    }
if (!empty($PAGE->theme->settings->bximage2)) {
        $image2 = $PAGE->theme->settings->bximage2;
    } else {
        $image2 = $OUTPUT->pix_url('bxslider/image2', 'theme');
    }
if (!empty($PAGE->theme->settings->bximage3)) {
        $image3 = $PAGE->theme->settings->bximage3;
    } else {
        $image3 = $OUTPUT->pix_url('bxslider/image3', 'theme');
    }
if (!empty($PAGE->theme->settings->bximage4)) {
        $image4 = $PAGE->theme->settings->bximage4;
    } else {
        $image4 = $OUTPUT->pix_url('bxslider/image4', 'theme');
    }
if (!empty($PAGE->theme->settings->bximage5)) {
        $image5 = $PAGE->theme->settings->bximage5;
    } else {
        $image5 = $OUTPUT->pix_url('bxslider/noimage', 'theme');
    }
if (!empty($PAGE->theme->settings->bximage6)) {
        $image6 = $PAGE->theme->settings->bximage6;
    } else {
        $image6 = $OUTPUT->pix_url('bxslider/noimage', 'theme');
    }
if (!empty($PAGE->theme->settings->bximage7)) {
        $image7 = $PAGE->theme->settings->bximage7;
    } else {
        $image7 = $OUTPUT->pix_url('bxslider/noimage', 'theme');
    }
if (!empty($PAGE->theme->settings->bximage8)) {
        $image8 = $PAGE->theme->settings->bximage8;
    } else {
        $image8 = $OUTPUT->pix_url('bxslider/noimage', 'theme');
    }
?>

<!-- BEGIN MAIN CONTENT FOR BOX SLIDER -->
<div style="clear:both;"></div>
<div id="bx-container">
<div id="bx-outer">
  <div id="bx-wrap">
    <ul id="slider1">
<?php if (!empty($PAGE->theme->settings->bxtext1)) { ?>
       <li>
        <img src="<?php echo $image1?>" alt="" />
        <div class="content">

<?php        $bxtext1 = $PAGE->theme->settings->bxtext1;
echo $bxtext1; ?>

        </div>
        <div class="clear"></div>
       </li>
<?php }
if (!empty($PAGE->theme->settings->bxtext2)) { ?>
        <li>
        <img src="<?php echo $image2?>" alt="" />
        <div class="content">

<?php        $bxtext2 = $PAGE->theme->settings->bxtext2;
echo $bxtext2; ?>

        </div>
        <div class="clear"></div>
        </li>
<?php }
if (!empty($PAGE->theme->settings->bxtext3)) { ?>
        <li>
        <img src="<?php echo $image3?>" alt="" />
        <div class="content">

<?php        $bxtext3 = $PAGE->theme->settings->bxtext3;
echo $bxtext3; ?>

        </div>
        <div class="clear"></div>
        </li>
<?php }
if (!empty($PAGE->theme->settings->bxtext4)) { ?>
        <li>
        <img src="<?php echo $image4?>" alt="" />
        <div class="content">

<?php        $bxtext4 = $PAGE->theme->settings->bxtext4;
echo $bxtext4; ?>

        </div>
        <div class="clear"></div>
        </li>
<?php }
if (!empty($PAGE->theme->settings->bxtext5)) { ?>
        <li>
        <img src="<?php echo $image5?>" alt="" />
        <div class="content">

<?php        $bxtext5 = $PAGE->theme->settings->bxtext5;
echo $bxtext5; ?>

        </div>
        <div class="clear"></div>
        </li>
<?php }
if (!empty($PAGE->theme->settings->bxtext6)) { ?>
        <li>
        <img src="<?php echo $image6?>" alt="" />
        <div class="content">

<?php        $bxtext6 = $PAGE->theme->settings->bxtext6;
echo $bxtext6; ?>

        </div>
        <div class="clear"></div>
        </li>
<?php }
if (!empty($PAGE->theme->settings->bxtext7)) { ?>
        <li>
        <img src="<?php echo $image7?>" alt="" />
        <div class="content">

<?php        $bxtext7 = $PAGE->theme->settings->bxtext7;
echo $bxtext7; ?>

        </div>
        <div class="clear"></div>
        </li>
<?php }
if (!empty($PAGE->theme->settings->bxtext8)) { ?>
        <li>
        <img src="<?php echo $image8?>" alt="" />
        <div class="content">

<?php        $bxtext8 = $PAGE->theme->settings->bxtext8;
echo $bxtext8; 

?>

        </div>
        <div class="clear"></div>
        </li>
<?php } ?>
    </ul>
  </div>
</div>
</div>
<?php } ?>
<!-- END BXSLIDER -->

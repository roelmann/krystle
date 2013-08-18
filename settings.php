<?php

/**
 * Settings for the krystle theme
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

    // Background colour setting
    $name = 'theme_krystle/backgroundcolor';
    $title = get_string('backgroundcolor','theme_krystle');
    $description = get_string('backgroundcolordesc', 'theme_krystle');
    $default = '#006';
    $previewconfig = array('selector'=>'html', 'style'=>'backgroundColor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $settings->add($setting);
    
    //Set the path to the logo image
    $name = 'theme_krystle/logourl';
    $title = get_string('logourl','theme_krystle');
    $description = get_string('logourldesc', 'theme_krystle');
    $default = 'logo';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_URL);
    $settings->add($setting);
    
    // Menu Background colour setting
    $name = 'theme_krystle/menubackgroundcolor';
    $title = get_string('menubackgroundcolor','theme_krystle');
    $description = get_string('menubackgroundcolordesc', 'theme_krystle');
    $default = '#004';
    $previewconfig = array('selector'=>'html', 'style'=>'menubackgroundColor');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, $previewconfig);
    $settings->add($setting);
    
    // Custom CSS file
    $name = 'theme_krystle/customcss';
    $title = get_string('customcss','theme_krystle');
    $description = get_string('customcssdesc', 'theme_krystle');
    $setting = new admin_setting_configtextarea($name, $title, $description, '');
    $settings->add($setting);

    // Foot note setting
    $name = 'theme_krystle/footnote';
    $title = get_string('footnote','theme_krystle');
    $description = get_string('footnotedesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

    // Enable edit buttons (replace rows of icons)
    $name = 'theme_krystle/useeditbuttons';
    $title = get_string('useeditbuttons','theme_krystle');
    $description = get_string('useeditbuttonsdesc', 'theme_krystle');
    $default = 1;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Enable "persistent editing mode" (no need to turn on/off edit mode)
    $name = 'theme_krystle/persistentedit';
    $title = get_string('persistentedit','theme_krystle');
    $description = get_string('persistenteditdesc', 'theme_krystle');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Hide Settings block
    $name = 'theme_krystle/hidesettingsblock';
    $title = get_string('hidesettingsblock','theme_krystle');
    $description = get_string('hidesettingsblockdesc', 'theme_krystle');
    $default = 0;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Hide Navigation block
    $name = 'theme_krystle/hidenavigationblock';
    $title = get_string('hidenavigationblock','theme_krystle');
    $description = get_string('hidenavigationblockdesc', 'theme_krystle');
    $default = 0;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
    
    // Show user profile picture
    $name = 'theme_krystle/showuserpicture';
    $title = get_string('showuserpicture','theme_krystle');
    $description = get_string('showuserpicturedesc', 'theme_krystle');
    $default = 1;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Add custom menu to Awesomebar
    $name = 'theme_krystle/custommenuinawesomebar';
    $title = get_string('custommenuinawesomebar','theme_krystle');
    $description = get_string('custommenuinawesomebardesc', 'theme_krystle');
    $default = 0;
    $choices = array(1=>'Yes', 0=>'No');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);

    // Place custom menu after Awesomebar
    $name = 'theme_krystle/custommenuafterawesomebar';
    $title = get_string('custommenuafterawesomebar','theme_krystle');
    $description = get_string('custommenuafterawesomebardesc', 'theme_krystle');
    $default = 0;
    $choices = array(0=>'No', 1=>'Yes');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting);
  
//Settings brought across from Zebra
    //This is the descriptor for the following browser compatibility settings
    $name = 'theme_krystle/compatibilityinfo';
    $heading = get_string('compatinfo', 'theme_krystle');
    $information = get_string('compatinfodesc', 'theme_krystle');
    $setting = new admin_setting_heading($name, $heading, $information);
    $settings->add($setting);

    //Enable inclusion of respond.js in the footer
    $name = 'theme_krystle/userespond';
    $visiblename = get_string('userespond', 'theme_krystle');
    $title = get_string('userespond', 'theme_krystle');
    $description = get_string('useresponddesc', 'theme_krystle');
    $setting = new admin_setting_configcheckbox($name, $visiblename, $description, 1);
    $settings->add($setting);

    //Enable prompt of Google Chrome Frame
    $name = 'theme_krystle/usecf';
    $visiblename = get_string('usecf', 'theme_krystle');
    $title = get_string('usecf', 'theme_krystle');
    $description = get_string('usecfdesc', 'theme_krystle');
    $setting = new admin_setting_configcheckbox($name, $visiblename, $description, 1);
    $settings->add($setting);

    //Set maximum version for Chrome Frome prompt
    $name = 'theme_krystle/cfmaxversion';
    $title = get_string('cfmaxversion','theme_krystle');
    $description = get_string('cfmaxversiondesc', 'theme_krystle');
    $default = 'ie8';
    $choices = array('ie6'=>'6', 'ie7'=>'7', 'ie8'=>'8');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $settings->add($setting); 
    
// Profilebar Email url setting

$name = 'theme_krystle/emailurl';
$title = get_string('emailurl','theme_krystle');
$description = get_string('emailurldesc', 'theme_krystle');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);
   
// Profilebar custom block title setting

$name = 'theme_krystle/profilebarcustomtitle';
$title = get_string('profilebarcustomtitle','theme_krystle');
$description = get_string('profilebarcustomtitledesc', 'theme_krystle');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$settings->add($setting);

// Profilebar custom block setting

$name = 'theme_krystle/profilebarcustom';
$title = get_string('profilebarcustom','theme_krystle');
$description = get_string('profilebarcustomdesc', 'theme_krystle');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$settings->add($setting);

/**** BOX SLIDER ****/

//INSTRUCTIONS
$name = 'theme_krystle/instructions';
$title=get_string('instruction_title','theme_krystle');
$description = get_string('instructions', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider1';
$title=get_string('divider1','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 1st Screen image
    $name = 'theme_krystle/bximage1';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);

    // 1st Screen content
    $name = 'theme_krystle/bxtext1';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider2';
$title=get_string('divider2','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 2nd Screen image
    $name = 'theme_krystle/bximage2';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);


    // 2nd Screen content
    $name = 'theme_krystle/bxtext2';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider3';
$title=get_string('divider3','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 3rd Screen image
    $name = 'theme_krystle/bximage3';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);

    // 3rd Screen content
    $name = 'theme_krystle/bxtext3';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider4';
$title=get_string('divider4','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 4th Screen image
    $name = 'theme_krystle/bximage4';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);

    // 4th Screen content
    $name = 'theme_krystle/bxtext4';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider5';
$title=get_string('divider5','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 5th Screen image
    $name = 'theme_krystle/bximage5';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);

    // 5th Screen content
    $name = 'theme_krystle/bxtext5';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider6';
$title=get_string('divider6','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 6th Screen image
    $name = 'theme_krystle/bximage6';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);

    // 6th Screen content
    $name = 'theme_krystle/bxtext6';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider7';
$title=get_string('divider7','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 7th Screen image
    $name = 'theme_krystle/bximage7';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);

    // 7th Screen content
    $name = 'theme_krystle/bxtext7';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

// Slide Divider
$name = 'theme_krystle/divider8';
$title=get_string('divider8','theme_krystle');
$description = get_string('dividerdesc', 'theme_krystle');
$setting = new admin_setting_configtext($name, $title, $description, '');
$settings->add($setting);

    // 8th Screen image
    $name = 'theme_krystle/bximage8';
    $title = get_string('bximage','theme_krystle');
    $description = get_string('bximagedesc', 'theme_krystle');
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $settings->add($setting);

    // 8th Screen content
    $name = 'theme_krystle/bxtext8';
    $title = get_string('bxtext','theme_krystle');
    $description = get_string('bxtextdesc', 'theme_krystle');
    $setting = new admin_setting_confightmleditor($name, $title, $description, '');
    $settings->add($setting);

}

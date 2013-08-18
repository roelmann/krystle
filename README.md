Creating Krystle

Krystle is a 'ground up' rewrite of the Krystle2 theme – itself a development of the original Krystle theme. I have reverted to the original naming without numbers and kept the numbering for the version file :) This particular rewrite, then will be Krystle v3.0

I have tried to stay true to the original premise of the first krystle theme, which was not to create a completely new theme, but to take my favourite parts of a number of other themes and build them into a single entity. Originally this meant taking the layouts and features of Shaun Daubney's original aardvark theme (as developed at the time for Moodle2 by Mary Evans) with the awesomebar features of Leai Zhang's Decaf theme.

For this rewrite, I have attempted to combine the features from the themes below:
Decaf – awesomebar, hidden edit buttons, developer info (credit Lei Zhang/Paul Nichols)
Zebra – hidden edit buttons, responsive layouts (credit Danny Wahl)
Aardvark – profile bar (credit Shaun Daubney/Mary Evans)
Lagomorph – replacement icon set, based on the fugue iconset by Yusuke Kamiyamane (Creative Commons Attribution)
I was also keen to implement the multiple additional block areas as I previously did in Lagomorph and as seen in a number of other Moodle2.2 themes. However, there appear to be issues with this in Moodle2.3 so this may not be implemented.


Starting Point

Clone decaf theme – I did not want to create krystle as a child theme of a non-core parent, although this will mean having to maintain any upstream developments manually
I used Jerry Waller's linux command line template to achieve the renaming – although there are still one or two areas that need to be renamed, such as the language file
	grep -rl “wrong” /home/jerrywaller  | xargs sed -i ‘s|wrong|right|g’

With a working clone of decaf (renamed as krystle) I moved the customcss setting into a separate file to ensure it stayed as the final css command. I also set up a separate krystle.css file to hold all my development settings. [[At a later stage these will be consolidated]]


Icons and Krystle look and feel

Copying the icons from the lagomorph theme into the krystle theme meant they were picked up automatically by the Moodle system.
I also added the blockheader icons and css file from lagomorph to give icons at the left of the block headings on side blocks and dock bar
CSS features were adapted from the Krystle2 and applied in the krystle.css file to maintain the krystle look and feel [[Note: this css will need to be consolidated with the other css before final release]]


Responsive Layouts

Adding the responsive layouts from Danny's Zebra theme proved straightforward in the first instance – simply add the pagelayout.css file from Zebra into Krystle and reference it into the config.php file – at the same time, exclude the pagelayout files from the parent themes.
I removed all references to settings in the pagelayout.css file, replacing them with the default values from Danny's settings page (These can be reinstated when I build the krystle settings page, but currently are not needed during development/testing). I also removed all references to colour schemes from page layout as I want to handle these separately for the time being.
There are, though settings which ARE needed and these must be transferred to the new theme as part of this process and will need to be incorporated into layout files – as well as moving several javascript files. This will allow the responsive design to be used in older browsers.


ProfileBar

Copy the profilebar.php and upcoming.php files from the latest version of aardvark, incorporating Mary's custom note section of the profilebar (I also used Mary's icons in preference to the plain white ones used in Shaun's profilebar as I felt they fitted better with this theme). As with other sections, the styling for this went into a separate css file referenced between core and krystle in the config file. Several settings relating to the profile bar had to be moved into the krystle settings page and also needed to be referenced in the general.php file. The existing profile section was commented out of the general.php file with the new profilebar called using an include command.


Essentially then the outline of the theme is now complete.
The css files will need to be consolidated and then the appropriate settings created as required – although the key ones are already in place. But krystle now exists as a workable theme!

ReadMe file to be completed!

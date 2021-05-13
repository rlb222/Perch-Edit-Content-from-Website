
# Perch Edit Content from the Website   
Jump from the website frontend directly to the correct content edit page in [Perch CMS](http://grabaperch.com).

## What's it for  
This addon makes it possible for a user to do the following   
1. go to a page on their website
2. press a shortcut key to show the hidden edit button and 
3. click the button to take them directly to the edit page in Perch. 
  
(Not tested on Runway.) 
  
<img src="/screenshot/Screenshot_EditMode.png" width="200">



https://user-images.githubusercontent.com/10956492/118098209-e9634300-b3d3-11eb-9206-c2b1a2e6a0c8.mp4




## Installation Quick overview
1. Install the Perch filter and the Perch template layout from this repository
2. Include 'regionedit.script.php' in every page you want to make editable 
3. Inside your content template, choose a field to add the filter to. This will add the edit icon next to that field.


## Usage Quick overview
1. Press Shift-Alt-E on the frontend of the webpage.
2. An edit button will appear next to every region that is made editable
3. The user clicks the edit button, which will jump directly to the edit page of that particular region
4. If the user is not logged in the login screen appears. After login the user will be shown edit page. 
  
  
## How to install -detailed
0. Download the repository, it contains a Perch-like folder structure
1. Install the filter    
1-1. In the Perch config file /perch/config/config.php add this line:    
`    // Enable filters in Perch ` 
`    define('PERCH_TEMPLATE_FILTERS', true);`  
1-2. Add this line to the file perch/addons/templates/filters.php :   
`    include('filters/rlb_editfromwebsite.class.php');`  
1-3. Add this file to the folder perch/addons/templates/filters/   
`    rlb_editfromwebsite.class.php`   
2. Copy the template `'rlb_editfromwebsite.script.php'` to folder: perch/templates/layouts/ and   
add the edit-image to your front-end images (img/pen.png). To change the folder of pen.png see 5.   
3. Include a javascript snippet into every (master)page you want to make editable: 
`<?php perch_layout('rlb_editfromwebsite.script'); ?>`
4. Add a filter 'insertedit' to a field within the Region you want to make editable. You can choose every field in the Region. Next to this field the edit icon will appear.
~~~    
  <!-- Example use of insertedit filter -->
  <perch:content filter="insertedit" id="alineakop" type="text" label="Alinea Kop" required="true" title="true" order="1"/>
~~~
5. You can change the appearance of the edit pen in the CSS part of ``rlb_editfromwebsite.script.php``. You can also change the folder of the pen.png. And to reduce redundancy of CSS lines a bit you can move the CSS part into your frontend CSS. 
  
    
### Change the placement of the Edit icon  
You can change the look and placement of the edit-button in two ways:
1. By selecting which field should have the button next to it. (how to install 4.)
2. Edit the CSS to alter the place on screen or the appearance of the edit-icon (how to install 3.)


## Todo   
- In some situations the regionID and itemID are not fetchable. I haven't found yet why this is, or how to change this. This causes the edit button not to work.
- Make a cleaner install, if you have suggestions, please let me know.
- Test it with blocks. Its tested for regions (including a repeater). 
- Test for Runway.


## Example use in your Perch template file 
Ad 'how to install 4.'
~~~
<!-- Perch Content Template which resides in /perch/templates/content/<mytemplate>.html -->

<h2>
  <!-- the filter 'insertedit' is added to the first field within the Region -->
  <perch:content filter="insertedit" id="alineakop" type="text" label="Alinea Kop" required="true" title="true" />
</h2>

<perch:if exists="alineaimage">
	<img class="foto" src="<perch:content id="alineaimage" type="image" label="Foto" />" 
	alt="<perch:content id="FotoOms" type="text" label="Foto Omschrijving" />" />
</perch:if>
~~~


## Example use in your Perch Master template file
Ad 'how to install 3.'
~~~
<!-- This is an example of a Perch Master Template which resides in /perch/templates/pages/<myMasterTemplate>.php -->
<!-- 
    only the line 
    <?php perch_layout('rlb_editfromwebsite.script'); ?>
    is inserted into the Master Template
-->

<!-- 
  You can also place this line in your *.php pages in the root, if you don't use Perch master pages 
  Another good spot is to add this line into a layout file which contains the head section. That is my prefered way. So in this case the line could be put in the cdr.head.php layout
-->

<!doctype html>
<html lang="en">
<?php perch_layout('cdr.head'); ?>

<!-- for RegionEdit Shift-Alt-E support -->
<?php perch_layout('rlb_editfromwebsite.script'); ?>

<!-- The rest is just left here as an example -->
<body>
	<section>
		<?php perch_content('Pagina Titel'); ?>
	</section>
	<?php perch_layout('cdr.footer'); ?>
</body>
</html>
~~~



## Technical Explanation 
Steps whichs explain how it works, this will all be taken care of the installed code.

a.  
It's possible to directly edit a region in Perch with the url:   
`www.mydomain.com/perch/core/apps/content/edit/?id=regionID&itm=itemID`

b.  
From within a template you can get the regionID and the itemID:  
`<perch:content id="regionID" type="hidden" />`    
and  
`<perch:content id="itemID" type="hidden" />`  
  

c.  
In the template for a region you can add an edit link or button, just like in the Perch Ctrl-E code:
~~~
<span class="rlb_editfromwebsite hide_this" 
	  onclick="var cms_path='/perch/core/apps/content/edit/?id=<perch:content id="regionID" type="hidden" />  
    &itm=<perch:content id="itemID" type="hidden" />';window.open(cms_path, 'cmsedit');">  
</span>
~~~  
  
d.
You don't want to show these edit-buttons to your normal website-visitor. Only to an administrator or editor.
So I've hidden them behind the key command Shift-Alt-E, the same way Ctrl-E works now.
Shift-Alt-E will toggle these edit-buttons.


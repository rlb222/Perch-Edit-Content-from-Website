# Perch Edit Regions from Frontend (RegionEdit)   

This Solution for [Perch CMS](http://grabaperch.com) makes it possible for administrators to go to the editpage for a region directly from the frontpages of the website. 
You go to the page you want to modify, you type Shift-Alt-E to show the editable parts on the page. Click one of the revealed edit-buttons to go directly to the region-edit page. 

## The basis of this method
a.  
It's possible to go directly to edit a region in Perch. The direct url to edit a region is   
`www.mydomain.com/perch/core/apps/content/edit/?id=regionID&itm=itemID`

b.  
From within a template you have the regionID and the itemID with the commands:  
`<perch:content id="regionID" type="hidden" />` and `<perch:content id="itemID" type="hidden" />`
  
  
In the template for a region you can add an edit link or button, just like in the Perch Ctrl-E code:
~~~
<span class="region_editor hide_this" 
	  onclick="var cms_path='/perch/core/apps/content/edit/?id=<perch:content id="regionID" type="hidden" />&itm=<perch:content id="itemID" type="hidden" />';window.open(cms_path, 'cmsedit');">
</span>
~~~  
  
c.
You don't want to show these edit-buttons to your normal website-visitor. Only to an administrator or editor.
So I've hidden them behind the key command Shift-Alt-E, the same way Ctrl-E works now.
Shift-Alt-E will toggle these edit-buttons.


### Current Ctrl-E in Perch
With standard Perch CMS you can [add the functionality](https://docs.grabaperch.com/video/v/perch-editing-shortcuts/) to edit pages with Ctrl-E. You have to click to the right region-type and then to the correct region to edit it.  
This region-edit solution makes it possible to directly edit the region content from the front-page.
  
  

## How to install
0. Download the repository, it contains a Perch-like folder structure
1. Include the CSS (from css/style.css) into your front-end CSS (for the showing and hiding of edit buttons)
2. Add the edit-image to your front-end images (img/pen.png)   
3. Copy the template 'regionedit.template.php' to perch/templates/layouts/
4. Copy the template 'regionedit.script.php' to perch/templates/layouts/
5. Include a javascript snippet into every page you want to make editable (or in your referenced master pages) with 
`<?php perch_layout('regionedit.script'); ?>`
6. Insert an extra line into every template (=region) you want to make editable (in 'perch/templates/content') 
`<perch:template path="layouts/regionedit.template.php" />`


### How it works
A bit [like Ctrl-E in the docs](https://docs.grabaperch.com/video/v/perch-editing-shortcuts/), but here the keycombination shows edit-icons next to regions. Clicking these will open the region edit-page.

In every region you made editable (see install 6.) there now is a hidden link to the editpage of this region (via regionID and itemID, see code).
The javascript snippet (4. and 5.) wil look for the keypress Shift-Alt-E. If the user presses Shift-Alt-E, the CSS class will show an edit-button (2.) beside regions (from 1.) on the frontend page. 
The user can now click on the edit icon and the Perch page 'edit region' will be opened.   
If the user is not logged in, the loginpage is shown first. 


### How it looks on the web pages
You can change how the edit-button looks in two ways:
1. Select the place in the region template where you put the edit-button link (see install 6.)
2. Edit the CSS to change the place on screen or the appearance of the edit-button (As in install 1.)


### Todo   
- Make a cleaner install, if you have suggestions, please let me know.
- Test it with blocks. Its tested for regions (including a repeater)
- pen.png is a bit too big in bytes


### Example use in your Perch template file
~~~
<!-- Perch Content Template which resides in /perch/templates/content/<mytemplate>.html -->

<h2>
	<perch:content id="alineakop" type="text" label="Alinea Kop" required="true" title="true" />
</h2>

<!-- just below the region title field: title="true" is a nice spot to place this RegionEdit-icon code -->
<perch:template path="layouts/region_editor.php" />

<perch:if exists="alineaimage">
	<img class="foto" src="<perch:content id="alineaimage" type="image" label="Foto" />" 
	alt="<perch:content id="FotoOms" type="text" label="Foto Omschrijving" />" />
</perch:if>
~~~


### Example use in your Perch Master template file
~~~
<!-- This is an exmaple of a Perch Master Template which resides in /perch/templates/pages/<myMasterTemplate>.php -->
<!-- 
    only the line 
    <?php perch_layout('regionedit.script'); ?>
    is inserted into the Master Template
-->

<!-- You can also place this line in your *.php pages in the root, if you don't use Perch master pages -->


<!doctype html>
<html lang="en">
<?php perch_layout('cdr.head'); ?>

<!-- for Perch's Ctrl-E support -->
<?php perch_get_javascript(); ?>  
<!-- for RegionEdit Shift-Alt-E support -->
<?php perch_layout('regionedit.script'); ?>

<!-- The rest is just left here as an example -->
<body>
	<header>
	</header>
	<nav>
        <?php perch_pages_navigation(['levels'=>1]); ?>
	</nav>

	<section>
		<?php perch_content('Pagina Titel'); ?>
	</section>

	<?php perch_layout('cdr.footer'); ?>
</body>
</html>
~~~


### Add this CSS to your frontend CSS file.
This code is also in the file /css/style.css of this repository. 

~~~
<!-- This is a snippet CSS to be added to (for example): /css/frontend-style.css -->

/* Styles for Region Editor */

/* Editing this snippet you can alter the way the edit-icon is displayed on your front-end pages */ 

span.region_editor { 
  position: relative;
  top: -41px;
  left: -39px;
  margin-bottom: -30px;
  background-image: url('../img/pen.png'); /* The edit image */
  background-size: 30px 30px;
  background-repeat: no-repeat;
  height: 30px;
  width: 30px;
  display: block;
}

span.region_editor.hide_this {
  display: none;
}

span.region_editor:hover {
  cursor: pointer;
}
~~~


### Screenshot of the appearing edit-icons 
Shift-Alt-E toggles the edit buttons next to the region titles.
![Screenshots Region Edit icons](/screenshot/Screenshot_EditMode.png?raw=true "Shift-Alt-E shows the region edit buttons")

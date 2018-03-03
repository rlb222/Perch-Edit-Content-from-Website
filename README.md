# Perch Edit Regions from Frontend (RegionEdit)   

This Solution for [Perch CMS](http://grabaperch.com) makes it possible for administrators to go to the editpage for a region directly from the frontpages of the website. 
You go to the page you want to modify, you type Shift+Alt+E to show the editable parts on the page. Click one of the revealed edit-icons to go directly to the region-edit page. 

###Ctrl-E Enhanced
With standard Perch CMS you can add the functionality to edit pages from the front-end by pressing Ctrl-E. You have to click to the right region-type and then to the correct region to edit it.

This solution makes it possible to edit the region content directly from the front-page. In the same way Ctrl-E works to edit the page screen.    



### How to install - overview
1. Include some CSS into your front-end CSS (css/style.css) 
2. Add an edit image to your site images (img/pen.png)   
3. Copy the template 'regionedit.template.php' to perch/templates/layouts/
4. Copy the template 'regionedit.script.php' to perch/templates/layouts/
5. Include a javascript snippet into every page you want to make editable (or in your referenced master pages) with `<perch:template path="layouts/regionedit.script" />` 
6. Insert an extra line into every template (=region) you want to make editable (in 'perch/templates/content') 
`<perch:template path="layouts/regionedit.template" />`


### How it works
Just [like Ctrl-E in the docs](https://docs.grabaperch.com/video/v/perch-editing-shortcuts/), but with an extra step: the keycombination will show some edit-icons, pressing these icons will lead to the correct region-edit page.

In every region you made editable (with 6.) there now is a hidden link to the editpage of this region (via regionID and itemID, see code).
The javascript snippet (from 4. and 5.) wil look for the keypress Shift+Alt+E. If the user presses Shift+Alt+E, the CSS class will show an edit icon (2.) in front of every region (from 1.) on his frontend website page. 
The user can now click on the edit link for this region and the Perch page 'edit region' will be opened. If the user is not logged in, the loginpage is shown first. 

### TODO   
- Make a cleaner install
- pen.png is a bit too big


## Example use in your Perch template file
~~~
<!-- This is a Perch Template which resides in /perch/templates/content/<mytemplate>.html -->

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


## Example use in your Perch Master template file
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


## Add this CSS to your frontend CSS file.  
~~~
<!-- This is a snippet CSS to be added to (for example): /css/style.css -->


/* Styles for Region Editor */

/* Editing this snippet you can alter the way the edit-icon is displayed on your front-end pages */ 
/* It requires an edit image in /img/ */

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
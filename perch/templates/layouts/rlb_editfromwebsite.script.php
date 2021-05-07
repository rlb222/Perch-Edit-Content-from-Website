<style>
/* Editor */
a.region_editor {
  position: absolute;
  margin-left: -60px;
  background-image: url(../img/pen.png);
  background-size: 30px 30px;
  background-position: 0.5rem 0.4rem;
  background-repeat: no-repeat;
  height: 55px;
  width: 60px;
  display: inline;
  z-index: 100; }
a.region_editor.hide_this {
  display: none; }
a.hide_this {
  display: none; }
a.region_editor:hover {
  cursor: pointer; }

</style>
<script>
	CMS_RegionEditor = function() {
    document.addEventListener("keydown", function(e) {
        if (e.keyCode == 69 && e.shiftKey && e.altKey) {
            e.preventDefault();
			document.querySelectorAll('.region_editor').forEach(function(editPen) {
				editPen.classList.toggle("hide_this");
			});
        }
    }, false);
}();
</script>

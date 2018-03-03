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
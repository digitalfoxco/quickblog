

<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckfinder/ckfinder.js"></script>




<td><textarea id="body1" name="body1"></textarea></td>

<script language="JavaScript" type="text/javascript">
window.onload = function() {
  var editor = CKEDITOR.replace('body1', {customConfig: "../ckeditor_config.js"});
  CKFinder.SetupCKEditor( editor, '/ckfinder/' );
};
</script>
<form action="<?php echo $this->createUrl('/test/upload/');?>" method="post" enctype="multipart/form-data">
<input type="file" name="file" />
<input type="hidden" name="dir" value="test"/>
<input type="submit" value="Upload Image"/>
</form>
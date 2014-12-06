	<section id="uploadForm">
    <h1>Upload CSV file</h1>
    <form method="post" action="" id="upload_file" enctype="multipart/form-data">
	<?php /*echo form_open_multipart('upload/do_upload', array('id'=>'upload_file'));*/?>
        <label for="userfile">File</label>
        <input type="file" name="userfile" id="userfile" size="20" />
 
        <input type="submit" name="submit" value="Upload" id="submit" class="btn btn-small btn-success dropdown-toggle" />
    </form>
	<div id="uploadMessage" class="text-error"></div>
	</section>
	
    <!-- h2>Files</h2>
    <div id="files"></div -->

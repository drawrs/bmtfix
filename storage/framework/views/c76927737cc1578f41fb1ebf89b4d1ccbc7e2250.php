<!DOCTYPE html>
<html>
<head>
    <title>Upload</title>
</head>
<body>

<form action="<?php echo e(route('upload')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <input type="file" name="photo">
    <button type="submit">Upload</button>
</form>
</body>
</html>
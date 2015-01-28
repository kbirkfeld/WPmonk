<?php
    include'tools.php';
    $options = Tools::getAllBlogsAsOptions();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wordpress to Monk API Export</title>
    </head>
    <body>

    <h2>Submit Wordpress XML file here:</h2>
    <form action="import-submit.php" method="post">
        <p>
            Select blog you want to post to:<br />
            <select name="blogs">
                <?php foreach ($options as $val => $title): ?>
                    <option value="<?= $val ?>"><?= $title ?></option>
                <?php endforeach; ?>
            </select>     
        </p>
        <p>
            Click below to locate your export:<br />
            <input type="file" name="WPfile">
        </p>
        <input type="submit" value="Submit">
    </form>
        
    </body>
</html>

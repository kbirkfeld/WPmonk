<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wordpress to Monk API Export</title>
    </head>
    <body>
        <a href="http://localhost:8888/WPmonk/import.php">Home</a><br />
    <p>
    <?php
    include 'tools.php';
    include 'wptools.php';
    include 'blog.php';
    include 'blogpost.php';

    $blogId = (int)$_POST['blogs'];
    $fileName = $_POST['WPfile'];
    $items = getWpPosts($fileName);
    $convertedItems = BlogPost::convert_wp_blogpost($items, $blogId);

    foreach($convertedItems as $convertedItem) {
        $posts .= BlogPost::create($blogId, $convertedItem);
    }

    if (isset($posts)){
        echo "Your import was successful";
    } else {
        header('Location: import.php');
    }
    ?>
    </p>
        
    </body>
</html>
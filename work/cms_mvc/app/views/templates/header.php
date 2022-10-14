<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog Home - Start Bootstrap Template</title>

      <!-- Font Awesome-->
    <link href="<?php echo ASSET_ROOT;?>/public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo ASSET_ROOT;?>/public/css/bootstrap.css" rel="stylesheet">
    
    <!-- Bootswatch -->
    <link href="<?php echo ASSET_ROOT;?>/public/css/bootswatch.css" rel="stylesheet"> 

    <!-- Custom styles for this template -->    
    <link href="<?php echo ASSET_ROOT;?>/public/css/blog-home.css" rel="stylesheet">


    <link href="<?php echo ASSET_ROOT;?>/public/css/styles.css" rel="stylesheet">

    <?php 

    $categories = $data['categories'];

    if(isset($data['posts'])){
        $posts = $data['posts'];
    }
    if(isset($data['count'])){
        $count = $data['count'];
    } 
    if(isset($data['comments'])){
        $comments = $data['comments'];
    }
    if(isset($data['post_id'])){
        $post_id = $data['post_id'];
    }


    ?>

  </head>

  <body>
<?php
 require_once ('./Post.php');
 require_once ('./Category.php');

 /* $d = Post::getDate(1);
 $datePost = $d->published_at;
 //$d =intval($d);
//$datePost= strftime('%A,$u,%B,%Y',$d);
$datePost = ucfirst(strftime('%A,le %d',strtotime($datePost)));
$datePost .=ucfirst(strftime('%B %Y',strtotime($datePost)));
setlocale(LC_TIME,['fr','fra','fr_FR']);
//$datePost=date('%a',$datePost);
var_dump($datePost);
 */


 $categories = Category::trouver($_GET['id']);

 if($categorie === false){
      App::notFound('index');
 }
 $posts = Post::lastByCategory($_GET['id']);

 $categories = Category::tout();

 //dans categorie.php
 $categorie = Category::trouver($_GET['id']);
//var_dump($categorie);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo App::setTitle($posts->title); ?></title>
</head>
<body>
    <h2><?=$categorie->name?></h2>
    <div>
        <?php foreach($posts as $post ): ?>

            <h3><?php echo $post->id.':'.$post->title?></h3>
            <p><?=$post->content?></p>
        <?php endforeach;?>

    </div>
</body>
</html>


<!--mes article --?>
<?php

 echo '<h1> bonjour mes cheres article </h1><br/>';
 $post = Post::trouver($_GET['id']);
 if($post === false){
     App::notFound('index');
 }
var_dump(Table::$table);
 $categorie = Category::trouver($post->category_id);
 //test pour notre date

 ?>


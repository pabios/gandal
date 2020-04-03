<?php
    session_start();
    require_once ('lib/flash.php');
   
    /**
    * Fichier totalement en Procedurales
    */
    $pdo = new PDO('mysql:host=localhost;dbname=pabios;charset=UTF8','pabios','pabios');
    $reqPost = $pdo->query('SELECT id,title,content,published_id FROM post');

    //$reqSup = $pdo->prepare(' SELECT id FROM post'); 
    
    $reqPostEdit = $pdo->prepare('SELECT id,title,content FROM post WHERE id=?');
    
    $reqSup = $reqPost;
    
     if(isset($_POST['supprimer']) || isset($_POST['modifier'])){
         
         $reqSup = $pdo->prepare('DELETE FROM post WHERE id = ?');
        
        
     }
      
     if(isset($_POST['publier'])){
        $content =   htmlspecialchars($_POST['editContent']);
        $title =   htmlspecialchars($_POST['editTitle']);
        
        $i = $pdo->exec(sprintf('UPDATE post SET title="%s",content=%s WHERE id=%s', $pdo->quote($title), $pdo->quote($content), $id));
         
        }
     
    
    
     
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include('_head.php') ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <title>pabios-admin</title>
    <?php include('_head.php') ?>
  </head>
  <?php if(!empty($_POST['publier'])){  ?>
  <body class="text-center" id="divRecharge">
    <?php }else{  ?>
  <body class="text-center">
    <?php }?>
   
  
  <?php include('_header.php')?>  
  <?php
        if(isset($_POST['modifier'])){
               add_flash('success','descend puis click sur Edition Article pour Editer ton Ardicle');
               show_flash();
        }else if(isset($_POST['supprimer'])){
            add_flash('success',' Votre Article a bien ete Supprimer');
            show_flash();
        }
  ?>

<!--collapse-->
<div class="accordion" id="accordionExample" >
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
           Liste des Articles
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                <thead>
                    <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>date d'ajout</th>
                    <th> pour Modifier </th>
                    <th> pour supprimer </th>
                    </tr>
                </thead>
                <tbody>
                <?php
                 
                    $posts = $reqPost->fetchAll();
                    if(isset($_POST['modifier'])){
                          
                          $_SESSION['id'] =$_POST['monId'];
                            
                        }
                    foreach($posts as $post):
                        $reqSup->execute(array($post['id']));
                    ?>
                    <form action="" method="post">
                        <tr>
                            <td width="5%"> <input readonly class="form-control-plaintext" type ="text" name ="monId" value=" <?=$post['id']?>"/></td>
                            <td> <input readonly class="form-control-plaintext" type ="text" name ="monTitre" value=" <?=$post['title']?>"/></td>
                            <td> <input readonly class="form-control-plaintext" type ="text" name ="monTitre" value=" <?=$post['published_at']?>"/></td>
                            <td><input  class="btn btn-success" type="submit" name ="modifier" value="modifier"></td>
                            <td ><input type="submit" class="btn btn-danger" name = "supprimer" value="supprimer"></td>
                        </tr>
                    </form>
                    <?php endforeach;?>
                </tbody>
                </table>
            </div>
            </main>
        </div>
        </div>
       </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Edition d'article
        </button>
      </h2>
    </div>
    <?php 
        if(isset($_POST['monId'])): 
        $reqPostEdit->execute(array($_POST['monId'])); 
        foreach($reqPostEdit as $reqEdit):
    ?>

    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body" >
             <!-- wisiwig editeur just pour le fun-->
            <div class="container">
                    <div class="col-sm-12">
                        <div id="emailMsg"></div>
                        <form id="emailFrom" method="post"  >
                            <input type="hidden" name="sendEmail" value="ok" />
                            <div class="form-group">
                                <label> <?=$reqEdit['title'] ?> </label>
                                <input type="text" name="editTitle" id="to" class="form-control-lg form-control" value ="<?=$reqEdit['title']?>" />
                            </div>
                             
                            <div class="form-group">
                                <textarea name="editContent" value ="" id="txtEditor"><?=$reqEdit['content']?></textarea>
                            </div>
                             <div class="form-group">
                                <input  class="btn btn-success" type="submit" name ="publier" value="publier"/>
                            </div>

                        </form>
                    </div>
                </div>
       </div>
    </div>
  </div>
     <?php endforeach; endif; ?>
   
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('textarea').summernote({
                height: 300,   //set editable area's height
            });
        });
    </script>
    <script>
       setInterval(recharge(),10);
      function recharge(){
        $('#divRecharge').load('./adminEdit.php');
      }
    </script>
<?php include('_footer.php') ?>
  </body>
</html>

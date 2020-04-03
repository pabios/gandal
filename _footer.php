
<style>
/*
* Permet de mettre le footer tout en bas de page en eliminant les matges initiaux
*/
html{
  position:relative;
  min-height: 100%;
}
  #footer{
    position:absolute;
    bottom:0;
    width: 100%;
    
  }
  #footCon{
    margin-top:10em;
  }

</style>
<div id="footCon">
    <footer class="bg-info text-white mt-4 pt-4 pb-4" id="footer">
    <div class="container" >
      <div class="row">
          <div class="col-sm">
            &copy;  <a class="text-white" href="index.php"><?php echo 'Pabiosoft'; ?></a> - 2020
            <span class="badge badge-primary">Ismaila Baldé</span>
            <a href="admin.php" class="text-white">admin</a>
            <a href="user-admin.php" class="text-white">| user-admin</a>
          </div>
          <div class="col-sm text-right">
            <?php echo sprintf('Cette page a été générée en %f microsecondes.', (microtime(true)-$begin_time)*1000*1000) ?>
          </div>
      </div>
    </div>
  </footer>
</div>
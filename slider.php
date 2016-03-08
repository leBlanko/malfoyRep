<div id="container">

      <!--  Outer wrapper for presentation only, this can be anything you like -->
      <div id="banner-fade">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">

          <?php

          $res=mysql_query("SELECT * FROM articles");

          while($data=mysql_fetch_array($res))
          {
            ?> <li><div> <?php
            $id=$data['id'];
            echo '<h3>'.htmlspecialchars($data['titre']).'</h3>'.'<br>';
    
            $chemin=dirname(__FILE__).'/data/img/'.$id.'.jpg';
            if(file_exists($chemin))
            {
              //affiche la vignette apres verification
                ?>
                <img src="vignette.jpg.php?id=<?php echo $id ?>" class="img-rounded pull-left" style="margin-right:10px;">
      
                <?php
                //positionnement img http://code.makery.ch/library/more-html-css/image-bootstrap/
            }
    
            echo '<p>'.nl2br(htmlspecialchars($data['contenu'])).'</p>';
            echo gmdate('d M Y H:i', $data['date']);
          ?> </div></li> <?php
          } ?> 

        </ul>
        <!-- end Basic jQuery Slider -->

      </div>
      <!-- End outer wrapper -->

      <script class="secret-source">
        jQuery(document).ready(function($) {

          $('#banner-fade').bjqs({
            height      : 320,
            width       : 620,
            responsive  : true
          });

        });
      </script>
    </div>
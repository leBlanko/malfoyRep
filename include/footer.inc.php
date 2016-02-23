</div>
          
          <nav class="span4">
            <h2>Menu</h2>
            
            <ul id="menuUL">
                <li><a href="index.php">Accueil</a></li>
				
				<?php
				include("include/verif_util.inc.php");
				if($connecte==true) { ?>

                <li><a href="article.php">Rédiger un article</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
				
                <?php  } else { $connecte=""; ?>
				
				<li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>

				<?php } ?>

        <!-- La barre de recherche -->
        <form action="index.php" method="post">
          <div class="row">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Recherche... ">
                <span class="input-group-btn">
                  <INPUT type="submit" class="btn btn-primary" value="Go">
                </span>
              </div><!-- /input-group -->
          </div><!-- /.row -->
        </form>
        <!-- End barre de recherche -->	
                
            </ul>
            
          </nav>
        </div>
        
      </div>

      <footer>
        <p>&copy; Nilsine & ULCO 2015</p>

      </footer>

    </div>

    <script>
      $(document).ready(function()
      {
        $('.span4').mouseenter(function()
        {
          $('#menuUL').slideDown(100);
        });

        $('.span4').mouseleave(function()
        {
          $('#menuUL').slideUp(100);
        });


      });

    </script>

  </body>
</html>

</div>
          
          <nav class="span4">
            <h2>Menu</h2>
            
            <ul>
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
                
            </ul>
            
          </nav>
        </div>
        
      </div>

      <footer>
        <p>&copy; Nilsine & ULCO 2015</p>

      </footer>

    </div>

  </body>
</html>

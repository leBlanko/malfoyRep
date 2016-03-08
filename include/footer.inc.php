</div>
          
          <nav class="span4">
            <h3>Menu ≡</h3>
            
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


         <!-- La barre de newsletter -->
        <div id="divNews" class="alert">
          <button type="button" id="close" class="close" data-dismiss="alert">&times;</button>
          <span id="labelNews"></span>
        </div>

        <div class="row">
          <div class="input-group">
            <input type="text" id="newsletterEmail" name="newsletterEmail" class="form-control" placeholder="Newsletter email ">
              <span class="input-group-btn">
                <input type="button" id="newSubmit" class="btn btn-primary" value="S'abonner">
              </span>
          </div><!-- /input-group -->
        </div><!-- /.row -->
        <!-- End barre de newsletter --> 
                
            </ul>
            
          </nav>
        </div>
        
      </div>

      <footer>
        <p>&copy; Nilsine & ULCO 2015</p>

      </footer>

    </div>

    <!-- Script pour le menu qui apparait et qui disparait -->
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

      $('#divNews').slideUp(100);


      });
    </script>


    <!-- Script pour l'inscription a la newsletter -->
    <script type="text/javascript">
      $("#newSubmit").click(function(e)
      {
        sendToNews(); //on appelle la fonction pour communiquer avec la page newsletter
      });


      $("#newsletterEmail").keypress(function (event)
      {
        var keycode = (event.keycode ? event.keycode : event.which);
        if(keycode == '13') //13 correspond a la touche entrée
        {
          sendToNews(); //meme chose avec le fait de cliquer sur la touche entrée
        }
      });

      $("#close").click(function(e)
      {
        $('#divNews').slideUp(100); //On remonte tout lorsque la fenetre d'info est fermée
      });


      function sendToNews()
      {
        $.ajax({
          type: "POST",
          url: "newsletter.php",
          data:
              {
                newsletterEmail: $("#newsletterEmail").val()
              },
          success: function(response)
          {
            //fonction qui va etre se lancer si l ajout se passe bien
            $("#labelNews").text(response); //renvoi directement ce qui a ete recuperer dans newsletter.php
            //On remonte les elements
            $('#divNews').slideDown(100);
            //On met en vert si cela a reussi
            if(response=="Inscrit à la newsletter")
            {
              $('#divNews').css("background-color","green");
            }
            else //sinon on met en rouge
            {
              $('#divNews').css("background-color","red");
            }
          }

        });
        $("#newsletterEmail").val(''); //On reini la valeur
      }


    </script>

  </body>
</html>

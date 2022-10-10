function edition()
    {
    options = "Width=700,Height=700" ;
    window.open( "edition.php", "edition", options ) ;
    }

//A mettre dans le head comme une fonction classique 

Le lien 
<a href="edition.php" onclick="edition();return false;">Edition</a>

//le lien fontionnera même si JS est desactivé 

//Et Juste avant le </body> de la page edition.php 
	<script type="text/javascript">
		window.print() ;
	</script>

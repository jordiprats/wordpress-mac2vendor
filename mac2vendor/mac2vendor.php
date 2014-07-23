<?php
/**
 * @package mac2vendor
 * @version 1.0
 */
/*
Plugin Name: mac2vendor
Plugin URI: http://systemadmin.es
Description: Traduim MAC a fabricant
Author: Jordi Prats
Version: 1.0
Author URI: http://systemadmin.es
*/

function mac2vendor_printform()
{
	?>

	<form method=get>
	<input type=text   id="s"            name="mac2vendor_mac">
	<input type=submit id="searchsubmit" value="enviar">
	</form>

	<?php
}

function mac2vendor($atts)
{
	?>


	<p>Esta herramienta permite traducir la direcci&oacute;n MAC de tu dispositivo a su fabricante. Introduce en el formulario la MAC del dispositivo a buscar:</p>

	<!-- hola <?php echo date("F j, Y, g:i a"); ?> -->
	
	<?php

	mac2vendor_printform();

	?>

	<?php


	if(isset($_REQUEST['mac2vendor_mac']))
	{
		?>
			<h2>Resultado de la b&uacute;squeda:</h2>
		<?php
		//echo $_REQUEST['mac2vendor_mac'].'<br>';
		$macvendor_prefix=strtoupper(preg_replace('/^[^0-9a-f]*([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f]).*/i','\1\2\3\4\5\6',$_REQUEST['mac2vendor_mac']));
		//echo $macvendor_prefix;
		$macvendor_filtered=strtoupper(preg_replace('/^[^0-9a-f]*([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f])[^0-9a-f]?([0-9a-f]).*/i','\1\2:\3\4:\5\6:\7\8:\9\10:\11\12',$_REQUEST['mac2vendor_mac']));
		//echo $macvendor_filtered;
		if((strlen($macvendor_prefix)!=6)||(strlen($macvendor_filtered)!=17))
		//if(!((strlen($macvendor_prefix)==6)&&((strlen($macvendor_filtered)==17)||(strlen($macvendor_filtered)==17))))
		//if(strlen($macvendor_prefix)!=6)
		{
	                if(strpos($_REQUEST['mac2vendor_mac'],"../../../")!==false)
	                {
				?>
              			<center><img src="/wp-content/error403/hi_loser.jpg" width="100%"></center>
				<ul>
				<li>Necesitas una <a href="/2009/10/cerveza-hacker">cerveza hacker</a> para mejorar tus skills.</li>
				</ul>
				<?php
               		}
			else
			{
				?>
				<p>La MAC introducida no es valida</p>
				<?php
			}
		}
		else
		{
			include_once 'ouis.php';
			//http://en.wikipedia.org/wiki/Multicast_address#Ethernet
			// + ff:ff:ff:ff:ff:ff
			if(isset($mac2vendor_arr[$macvendor_prefix]))
			{
				echo "<p>La MAC <strong>";
				echo htmlentities($macvendor_filtered);
				echo "</strong> corresponde a la empresa <strong>";
				echo htmlentities($mac2vendor_arr[$macvendor_prefix]);
				echo "</strong></p>";
				?>

			<p><strong>Recurda</strong>: La MAC de un equipo puede ser modificada por lo que el fabricante mostrado no es necesariamente el fabricante real del dispositivo.</p>
				<?php

			}
			else
			{
				?>
				<p>No se ha encontrado la MAC en la base de datos</p>
				<?php
			}
		}
	
		?>
		
<center>

        <span class="alignright">
        <!-- g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone -->
        <!-- -->
        <a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>" class="twitter-share-button" data-lang="en">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </span>


<div style="margin: 25px 0 5px 0;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- quadrat lateral 2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-1180418533818744"
     data-ad-slot="6797426160"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>


</center>
			
		<?php

		//<h2>Puedes repetir la b&uacute;squeda</h2>
		//<p>Introduce otra MAC para repetir la b&uacute;squeda:</p>	
		//mac2vendor_printform();
	}
	else
	{
	?>

        <span class="alignright">
        <!-- g:plusone size="medium" href="<?php echo get_permalink(); ?>"></g:plusone -->
        <!-- -->
        <a href="https://twitter.com/share?url=<?php echo get_permalink(); ?>" class="twitter-share-button" data-lang="en">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </span>

<center>

<div style="margin: 25px 0 5px 0;">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-1180418533818744";
/* per pagines lateral */
google_ad_slot = "9480877052";
google_ad_width = 300;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

</center>


	<?php
	}
}

add_shortcode('show_mac2vendor', 'mac2vendor');

?>

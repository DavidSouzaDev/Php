<?php
	/*.
		**Plugin Name: Frame Renderization.
		**Description: This Plugin has the mission to render any web system within a wordpress page of your choice, it can be used to show an ERP system within your website for example, or another website that you would like to display within your wordpress website, use and abuse this plugin.
		**Author: David Cristiano de Souza
		**Author URI:https://www.linkedin.com/in/david-cristiano-de-souza-588927121/
		**Version: 1.0.0
	*/
		function renderContent(){		
			$ipTextNow = get_option('ipText');
			$portTextNow = get_option('portText');			
			$heightNow = get_option('heightText');
			$widthNow = get_option('widthText');
			$renderContentPage = "						
				<iframe allowfullscreen=true height=$heightNow width=$widthNow src=$ipTextNow:$portTextNow></iframe>			
			";
			return $renderContentPage;
		}

		add_shortCode('renderContentPage', 'renderContent');

		function myMenu(){
			add_menu_page('', 'Frame Renderization', 'manage_options', 'Frame Renderization', 'externalPage', '', 200);
		}

		add_action('admin_menu', 'myMenu');

		function externalPage(){
			if(array_key_exists('buttonOk', $_POST))
			{
				update_option('ipText',$_POST['ipText']);
				update_option('portText',$_POST['portText']);	
				update_option('heightText',$_POST['heightText']);
				update_option('widthText',$_POST['widthText']);	
				echo '<div class=notice notice-access is-dismissible>
							<p><strong>Save with success!</strong></p>
							<button type=button class=notice-dismiss>
							<span class=screen-reader-text>fechar. </span>
							</button>
					 </div>';		
			}
			
			echo '
				<div class=wrap>
					<h2>Welcome to Frame Renderization!</h2>			

					<form method=post>
						<label>
							<label>Type here the full address (link) of the page you want to insert in the frame:</label>
						</br >

						<label>Link:</label>
						<input name=ipText type=text class=width-input-ip value='.$ipTextNow = get_option('ipText').'></input>					
						</br >

						<label>Port:</label>
						<input name=portText type=text class=width-input-port value='.$portTextNow = get_option('portText').'></input>
						</br >
						</br >				

						<label>Type her the size of the form you want to configure:</label>
						</br >	

						<label>Height:</label>
						<input name=heightText type=text class=width-input-size value='.$heightNow = get_option('heightText').'></input>px or %.		
						</br >

						<label for="widthText">Width:</label>
						<input name=widthText type=text class=width-input-size value='.$widthNow = get_option('widthText').'></input>px or %.
						</br >

						<input name=buttonOk type=submit value="Configure" class=button button-primary style=margin-top:10px></button>
					</form>
				</div>
				';
		}
?>

<style>
.width-input-ip{
	width: 325px;
	margin: 5px;
}	
.width-input-port{
	width: 80px;
	margin: 5px;
}		
.width-input-size{
	width: 80px;
	margin: 5px;
}
</style>
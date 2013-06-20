<?php

function is_firefox() {
	$agent = '';
	// old php user agent can be found here
	if (!empty($HTTP_USER_AGENT))
		$agent = $HTTP_USER_AGENT;
	// newer versions of php do have useragent here.
	if (empty($agent) && !empty($_SERVER["HTTP_USER_AGENT"]))
		$agent = $_SERVER["HTTP_USER_AGENT"];
	if (!empty($agent) && preg_match("/firefox/si", $agent))
		return true;
	return false;
}

function is_windows() {
	$agent = '';
	// old php user agent can be found here
	if (!empty($HTTP_USER_AGENT))
		$agent = $HTTP_USER_AGENT;
	// newer versions of php do have useragent here.
	if (empty($agent) && !empty($_SERVER["HTTP_USER_AGENT"]))
		$agent = $_SERVER["HTTP_USER_AGENT"];
	if (!empty($agent) && preg_match("/windows/si", $agent))
		return true;
	return false;
}

/*

Theme Switcher v.1.0
Created By George Baker @ http://themeforest.net/user/phoenix - http://twitter.com/dabluephoenix

*/

## get current theme name

$current_theme = '';
if(isset($_GET['theme'])) {
$current_theme = $_GET['theme'];
}
$theme_found = false;

## build theme data array

/* $theme_array = array (

array ("id" => "digitalic",
       "url" => "http://digitalic.wpbootstrap.net",
	   "themeforest" => "http://themeforest.net/item/adventure-a-unique-photography-wordpress-theme/155571?ref=USERNAME"
	  ),
array ("id" => "attique",
	   "url" => "http://labs.burntfeathers.com/attique",
	   "themeforest" => "http://themeforest.net/item/attique-a-stylish-multi-purpose-wordpress-theme/168724"
	  )

); */

//Theme Array
$theme_array = array (
 
array (
"id" => "Agility",
'type'	=> "Responsive HTML5",
"url" => "http://agility-html.sevenspark.com",
"themeforest" => "http://themeforest.net/item/agility-responsive-minimal-html5/1054063",
"preview"	=> "agility_html.jpg",
"mobile_redirect" => true,
),
'UberMenu'	=> array(
"id" => "UberMenu - Mega Menu",
"type"	=> "WP Plugin",
"url" => "http://wpmegamenu.com",
"themeforest" => "http://codecanyon.net/item/ubermenu-wordpress-mega-menu-plugin/154703",
"preview"	=> "http://0.s3.envato.com/files/1967560/megamenupreview.1.1.2.jpg"
),
'ScrollCheckpoint' => array(
"id" => "Scroll Checkpoint",
"type"	=> "WP Plugin",
"url" => "http://scrollcheckpoint.sevenspark.com",
"themeforest" => "http://codecanyon.net/item/scroll-checkpoint-animated-content-panel-plugin/234882",
"preview"	=> "scroll_checkpoint.jpg",
),
'MenuManager'	=> array(
"id" => "Menu Management Enhancer",
"type"	=> "WP Plugin",
"url" => "http://menumanager.sevenspark.com",
"themeforest" => "http://codecanyon.net/item/menu-management-enhancer-for-wordpress/529353",
"preview"	=> "menu_manager.jpg",
),
);
$redirect = '';
if (!$redirect) :

## get current theme data
//var_dump($theme_array);
foreach ($theme_array as $i => $theme) :

	if ($theme['id'] == $current_theme) :
	
		$current_theme_name = ucfirst($theme['id']);
		$current_theme_url = $theme['url'];
		$current_theme_purchase_url = $theme['themeforest'];
		
		$theme_found = true;
	
	endif;

endforeach;

/* if ($theme_found == false) :

	$current_theme_name = $theme_array[0]['id'];
	$current_theme_url = $theme_array[0]['url'];
	$current_theme_purchase_url = $theme_array[0]['themeforest'];	

endif; */
if ($theme_found == false) :

	$current_theme_name = ucfirst($theme['id']);
	$current_theme_url = ucfirst($theme['url']);
	$current_theme_purchase_url = $theme['themeforest'];	

endif;

?>

<!DOCTYPE HTML>

<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Phoenix | Theme: <?php if ($theme_found == false) : echo $current_theme_name; else: echo $current_theme_name; endif; ?></title>
		
		<link  href="http://fonts.googleapis.com/css?family=Kreon:300,400,700" rel="stylesheet" type="text/css" >
        
        <link href="selector/styles.css" rel="stylesheet" media="all" />
        
		<!--[if IE]>
			
			<style type="text/css">
			
				li.purchase a {
					padding-top: 5px;
					background-position: 0px -4px;
				}
				
				li.remove_frame a {
					padding-top: 5px;
					background-position: 0px -3px;
				}
				
				#theme_select {
					padding: 8px 8px;
				}
				
				#theme_list {
					margin-top: 2px;
				}
			
			</style>
			
		<![endif]--> 
		
		<style type="text/css">
		
		<?php 
		
		if (is_firefox() && is_windows()) :
		
		?>
		
	
		li.purchase {
			padding-top: 18px;
		}
		
		li.purchase a {
		
		padding-top: 5px;
		background-position: 0px -3px;
		
		}
		
		li.remove_frame {
			padding-top: 18px;
		}
		
		li.remove_frame a {
		
		padding-top: 5px;
		background-position: 0px -2px;
		
		}
				
		#theme_select {
			padding: 7px 8px;
		}
		
		<?php 
		
		endif;
		
		?>
		
		</style>
	        
        <script type="text/javascript" src="selector/jquery-1.4.2.min.js"></script>
        
        <script type="text/javascript">
        
        var theme_list_open = false;
        
        $(document).ready(function () {
        
        	function fixHeight () {
        	
        	var headerHeight = $("#switcher").height();
        	        	
        	$("#iframe").attr("height", (($(window).height() - 10) - headerHeight) + 'px');
        	
        	}
        	
        	$(window).resize(function () {
               	
        		fixHeight();
        	
        	}).resize();
        	
        	$("#theme_select").click( function () {
        	
        		if (theme_list_open == true) {
        	
        		$(".center ul li ul").hide();
        		
        		theme_list_open = false;
        		
        		} else {
        		
        		$(".center ul li ul").show();         		
        		
        		theme_list_open = true;
        		
        		}
        		
        		return false;
        	
        	});
        	
        	$("#theme_list ul li a").click(function () {
        	
        	var theme_data = $(this).attr("rel").split(",");
        	        	
        	$("li.purchase a").attr("href", theme_data[1]);
        	$("li.remove_frame a").attr("href", theme_data[0]);
        	$("#iframe").attr("src", theme_data[0]);
        	
        	$("#theme_list a#theme_select").text($(this).text());
        	
        	$(".center ul li ul").hide();

        	theme_list_open = false;
        	
        	return false;
			//fix remove frame open current theme location
			/* $('.remove_frame').delegate('a','click',bind(function(){
				top.location.href=$('#iframe')[0].contentWindow.location.href;
				return false;
			}); */
        	
        	});
        
        });
        
        </script>
         
</head>

<body>

	<div id="switcher">
	
		<div class="center">
		
		<ul>
		
		<li><img src="selector/logo.png" alt="" /></li>
		
		<li id="theme_list"><a id="theme_select" href="#"><?php if ($theme_found == false) : echo "Select A Theme..."; else: echo $current_theme_name; endif; ?></a>
		
			<ul>
			
				<?php
			
				/* foreach ($theme_array as $i => $theme) :
				
				echo '<li><a href="#" rel="' . $theme['url'] . ',' . $theme['themeforest'] . '">' . ucfirst($theme['id']) . '</a></li>';
				
				endforeach; */
				foreach ($theme_array as $i => $theme) :
					echo '<li><a href="#" rel="' . $theme['url'] . ',' . $theme['themeforest'] . '?ref=sevenspark">' .
					ucfirst($theme['id']) .
					' <span class="product-type">'.$theme['type'].'</span>';
					if(isset($theme['preview'])){
					echo '<span class="product-preview"><img src="';
					if(strpos($theme['preview'], 'http://') === false){
					echo 'product_previews/'.$theme['preview'];
					}
					else echo $theme['preview'];
					echo '" /></span>';
					}
					echo '</a></li>';
				endforeach;
				
				?>
				
			</ul>
		
		</li>	
		
		<li class="purchase" rel="<?php echo $current_theme_purchase_url; ?>"><a href="<?php echo $current_theme_purchase_url; ?>">Purchase</a></li>		
		<li class="remove_frame" rel="<?php echo $current_theme_url; ?>"><a href="<?php echo $current_theme_url; ?>">Remove Frame</a></li>		
		
		</div>
		
		</ul>
	
	</div>
	
    <iframe id="iframe" src="<?php echo $current_theme_url; ?>" frameborder="0" width="100%"></iframe>
    
</body>

</html>

<?php

endif;

?>
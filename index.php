<?php 

require_once ('statistician/statistician.php');

$sObj = new STATISTICIAN();
$serverObj = $sObj->getServer();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">

<head>
  <title><?php echo (SERVER_NAME); ?> :: Statistician</title>
  <link href="statistician.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="jquery-1.5.min.js"></script>
</head>

<script type="text/javascript">
	$(window).load(function(){
		/* Keep the template looking great :) */
		$('#content').height($('#content').height() - 200);
	});
</script>

<body>
	<div id="topLeadBar"><div id="titleMain"></div><div id="creeper"></div></div>
	<div id="content">
        <div id="listTitle"><a href="./?view=main"><?php echo (SERVER_NAME); ?></a></div>
		<?php
			if (!isset($_GET['view'])) {
                $_GET['view'] = 'main';
 		    }

			switch ($_GET['view']) {
				case 'player':
				include('player_view.php');
				break;
				case 'playerBlock':
				include ('player_blocks.php');
				break;
				case 'playerItems':
				include ('player_items.php');
				break;
				case 'playerList':
				include('player_list.php');
				break;
				case 'playerKills':
				include('player_kills.php');
				break;
				case 'globalBlocks':
				include('global_blocks.php');
				break;
				case 'globalItems':
				include('global_items.php');
				break;
				case 'globalKills':
				include ('global_kills.php');
				break;
				case 'main':
				default:
                include ('server_page.php');
				break;
			}
		?>
	</div>
	<br />
	<div id="copyright">Statistician by ChaseHQ :: <?php echo(STRING_MISC_RUNNING_DATABASE_VERSION); ?> <?php echo($sObj->getDatabaseVersion()); ?>
        <br />
        <?php echo (STRING_MISC_TRANSLATED_TO_BY); ?> <?php if (TRANSLATOR_CONTACT != '') { ?> <a href="<?php echo (TRANSLATOR_CONTACT); ?>"> <?php } echo(TRANSLATOR_NAME); ?><?php if (TRANSLATOR_CONTACT != '') { ?> </a> <?php } ?>
        <br />
        <?php echo(STRING_MISC_PORTAL_VERSION); ?> 1.3.2</div>
</body>
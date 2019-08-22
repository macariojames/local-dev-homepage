<!DOCTYPE html>
	<?php require('config.php'); ?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Local Dev Homepage | Macario James</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="public/css/main.css">
</head>

    <body>
	    <div class="canvas">
		    <header>
			    <h1>My Local Projects</h1>
			    <nav>
			        <ul>
					<?php
						foreach ( $important_links as $imp ) {
							printf( '<li><a href="%1$s">%2$s</a></li>', $imp['url'], $imp['name'] );
						}
					?>
			        </ul>
			    </nav>

		    </header>

			<div class="">
				<ol class="project-listing">
				<?php
					// Using glob to grab every directory that doesn't start with '.' (hidden) and directories that start with '_' (i like to start directories with '_' when i want them to be at the top when listed); notice the GLOB_ONLYDIR flag'

					// For some reason when trying to use GLOB_BRACE flag w/ multiple patterns, the directories returned would be duplicated. I couldn't figure out why, but it didn't do so if i split the glob calls into two separate calls. ~mj
					$dirs = glob("[!.?]*", GLOB_ONLYDIR);
					$dirs = glob('[!_?]*', GLOB_ONLYDIR);

					foreach ($dirs as $dir) {
						//echo $dir;
						$dirname = basename($dir);
						$clean_link = explode('.', $dirname);
						$new_link = $protocol . $clean_link[0] . '.' . $local_tld;
						$favicon = $local_root . "/" . $default_icon;

						if( file_exists( $dir . '/favicon.ico') )
							$favicon = $dir . "/favicon.ico";

						if (in_array($dirname, $exclude_sites) ) 
							continue;
						echo "<li><img src='$favicon' class='icon' /><a href='$new_link'>$clean_link[0]</a></li>";
					}
					
					/*$d = dir('.');
					while(false !== ($entry = $d->read())) {
						if (is_dir($entry) && ($entry != '.') && ($entry != '..')) {
							echo "<li><a href='{$entry}'>{$entry}</a></li>";
						}
					} 

					foreach (new DirectoryIterator('/Applications/MAMP/htdocs') as $item) {
						$filename = $item->getFileName();
						if( !$item->isDot() && !$item->isFile() && (glob('.'.$filename) ) )
							echo "<li><a href='{$filename}'>{$filename}</a></li>";
					} */
				?>
				</ol>
				<pre>
				<?php echo print_r($dirs, 1); ?>
				</pre>
			</div>

	<footer class="cf" style="text-align: center;">
	<p>&copy; <?php echo date('Y') . " Macario James DeLaCruz"; ?></p>
	</footer>

</div>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
		</div>





		<div id="listarea">
			<ul id="musiclist">
				<?php 
		
				$playlist = $_REQUEST[playlist];


				function getfilesize($file){
					return filesize($file)<1024 ? filesize($file)."b" : round(filesize($file)/1024)."kb";
				}

		
				if (empty($playlist)) {
		
				$files = scandir("songs");
				$files = array_diff($files, [".",".."]);
		
		
		
				foreach ($files as $value) {
					strpos($value, ".mp3") ? $mp3s[] = $value : NULL;
				}		
		
				foreach ($files as $value) {
					strpos($value, ".txt") ? $txts[] = $value : NULL;
				}

		
		 		?>


				<? foreach ($mp3s as $songs) { ?>
				<li class="mp3item">
					<a href="songs/<?=$songs ?>" download><?=$songs ?></a>
					(<?=getfilesize("songs/$songs") ?>)
				</li>
				<? } ?>				


				<? foreach ($txts as $txt) { ?>
				<li class="playlistitem">
					<a href="songs/<?=$txt ?>" download><?=$txt ?></a>
					(<?=getfilesize("songs/$txt") ?>)
				</li>
				<? } ?>


				<? }
		
				else{
		
					$playlist = file("songs/$playlist");
					


					foreach ($playlist as $song) {
		
				 ?>
					<li class="playlistitem">
						<a href="songs/<?=$song ?>" download><?=$song ?></a>
						(<?=getfilesize("songs/$song") ?>)
					</li>
				<? 
					} 
				} 
				?>

			</ul>
		</div>







	</body>
</html>

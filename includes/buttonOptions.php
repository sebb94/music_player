<nav class="optionsMenu">
    <input type="hidden" class="songId">
        <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername());?>
        <div class="item" onclick="removeFromPlaylist(this, '<?php echo $playlistId;?>')">Remove from playlist</div>
</nav>
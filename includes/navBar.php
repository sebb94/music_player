    <nav class="navbar">
                    <span role="link" tab-index="0" onclick="openPage('index.php')" class="logo" ;>
                        <i class="fa fa-microphone" aria-hidden="true"></i>
                    </span>

                    <div class="group">
                        <div class="navItem">
                               <span role="link" tab-index="0" onclick="openPage('search.php')" class="navItemLink">Search 
                                   <i class="fa fa-search"
                                    aria-hidden="true"></i>
                                </span>
                        </div>

                    </div>
                    <div class="group">
                        <div class="navItem">
                            <span role="link" tab-index="0" onclick="openPage('browse.php')"  class="navItemLink">Browse</span>
                        </div>
                        <div class="navItem">
                            <span role="link" tab-index="0" onclick="openPage('yourMusic.php')"  class="navItemLink">Your music</span>
                        </div>
                        <div class="navItem">
                            <span role="link" tab-index="0" onclick="openPage('settings.php')"  class="navItemLink"><?php echo $userLoggedIn->getFirstAndLastName();?></span> 
                        </div>
                    </div> 

                </nav>

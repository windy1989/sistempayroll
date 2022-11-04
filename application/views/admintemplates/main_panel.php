			<nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand">
							<button class="btn btn-just-icon btn-simple" onClick="window.history.back();">
								<i class="material-icons">keyboard_arrow_left</i>
							</button> 
							<?=ucwords(str_replace('_',' ',$judul))?> 
						</a>
						
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="<?=base_url('notifikasi')?>">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification" id="jumnotif">0</span>
                                    <p class="hidden-lg hidden-md">
                                        Notifications
                                        <b class="caret"></b>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
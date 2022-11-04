	<nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=base_url()?>">Sistem Payroll PT. XYZ</a>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page login-page">
        <div class="full-page login-page" filter-color="black" data-image="<?=base_url()?>assets/img/login_new.jpg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form id="form-login">
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="rose">
                                        <h4 class="card-title">Login</h4>
                                        <div class="social-line">
                                            <a href="#eugen" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-google"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nama User</label>
                                                <input type="text" class="form-control" name="uname" id="uname" autocomplete="">
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Kata Sandi</label>
                                                <input type="password" class="form-control" name="pw" id="pw" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <button type="submit" class="btn btn-rose btn-simple btn-wd btn-lg">Masuk</button>
										<div align="center" id="my-signin3" class="g-signin2 mt-3" data-width="200" data-longtitle="true" data-onsuccess="onMasuk"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="<?=base_url()?>">All Rights Reserved PT. XYZ</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
	
	<script src="https://apis.google.com/js/platform.js?hl=id" async defer></script>
	<script src="<?=base_url()?>assets/js/oauth.js" type="text/javascript"></script>
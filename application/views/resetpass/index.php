<div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" style=""></div>
    <div class="content">
      <div class="container">
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" method="" action="">
              <div class="card-header text-center">
                <div class="logo-container">
                  <img src="../assets/img/sbs.PNG" alt="">
                </div>
              </div>
              <div class="card-body">
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons ion-key"></i>
                    </span>
                  </div>
                  <input type="password" placeholder="Password Baru" class="form-control" name="pass" id="pass">
                </div>
				<div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons ion-key"></i>
                    </span>
                  </div>
                  <input type="password" placeholder="Ulangi Password Baru" class="form-control" name="confirmpass" id="confirmpass">
                </div>
              </div>
              <div class="card-footer text-center">
                <button class="btn btn-primary btn-round btn-lg btn-block" data-kode="<?=$user_data['KODE_RESET']?>" id="btn_confirm_reset">Reset</button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
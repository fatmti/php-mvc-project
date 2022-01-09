<div class="container m15top">
    <div class="row">
        <div class="col-sm-6">
            <?php
            if (strlen($data['errors']) > 1) {
                ?>
                <div class="alert alert-warning">
                    <?php echo $data['errors'] ?>
                </div>
            <?php } ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    ورود به بخش پرسش و پاسخ سایت
                </div>
                <div class="panel-body">
                    <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="usernamelogin"
                                   placeholder="یوزر نیم خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwordlogin" class="form-control"
                                   placeholder="پسورد خود را وارد نمایید">
                        </div>
                        <button class="btn btn-primary btn-block" name="btnlogin">ورود</button>
                    </form>
                </div>
                <div class="panel-footer text-center">
                   از این قسمت وارد شوید
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <?php
            if (strlen($data['errorsregister']) > 1) {
                ?>
                <div class="alert alert-warning">
                    <?php echo $data['errorsregister'] ?>
                </div>
            <?php } ?>
            <?php
            if (strlen($data['registersuccess']) > 1) {
                ?>
                <div class="alert alert-warning">
                    <?php echo $data['registersuccess'] ?>
                </div>
            <?php } ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    ثبت نام در سایت پرسش و پاسخ
                </div>
                <div class="panel-body">
                    <form method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="usernameregister"
                                   placeholder="یوزر نیم خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwrodregister" class="form-control"
                                   placeholder="پسورد خود را وارد نمایید">
                        </div>
                        <div class="form-group">
                            <input type="password" name="rpasswrodregister" class="form-control"
                                   placeholder="پسورد خود را مجددا وارد نمایید">
                        </div>
                        <button class="btn btn-success btn-block" name="btnregister">ثبت نام</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<!--p


-->
<div class="container m15top">
    <div class="row">
        <div class="col-sm-6">
            <?php
            if (strlen($data['message']) > 1) {
                ?>
                <div class="alert alert-info">
                    <?php echo $data['message'] ?>
                </div>
            <?php } ?>
            <div class="panel panel-info">
                <div class="panel-heading">ثبت تیکیت | ایجاد پرسش در مورد موضوع موردنظر</div>
                <div class="panel-body">
                    <form method="post" action="<?php echo htmlentities($_SERVER['REQUEST_URI']); ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" name="title"
                                   placeholder="عنوان پرسش خود را در این قسمت وارد نمایید">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="6" name="content"
                                      placeholder="پرسش خود را در این قسمت وارد نمایید"></textarea>
                        </div>

                        <button type="submit" name="btn" class="btn btn-block btn-info">ارسال تیکیت</button>
                        <button type="submit" name="btnexit" class="btn btn-block btn-info">خروج از پنل</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-info">
                <div class="panel-heading">لیست تیکیت های موجود</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php
                        if (!empty($data['readtitleticket'])) {
                            foreach ($data['readtitleticket'] as $value) { ?>
                                <li class="list-group-item" style="padding: 20px;">
                                <a href="<?php echo Address . 'panel/view/' . $value['id']; ?>"><?php echo $value['title']; ?></a>
                                <?php
                                if ($value['status'] == 0) { ?>
                                    <a class="pull-left" style="color: rgb(231, 76, 60);">پاسخ داده نشده</a>
                                <?php } else { ?>
                                    <a class="pull-left" style="color: rgb(46,69,231);">پاسخ داده شده</a>
                                <?php }
                            }
                            ?>




                            </li>
                        <?php } else {
                            echo '<div class="alert alert-warning">تیکیتی وجود ندارد</div>';
                        } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
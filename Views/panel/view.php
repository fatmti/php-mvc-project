<div class="container m15top">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading">
                    عنوان تیکیت :
                    <?php echo $data['dataticket']['title']; ?>
                </div>
                <div class="panel-body">

                    <?php
                    if (isset($_POST['btnanswer'])) {
                        $data['answer']->answerticket($_POST['content'], $data['dataticket']['id'], $_SESSION['userid']);
                        header('location:http://localhost/mvc/panel/view/' . $data['dataticket']['id']);

                    }

                    ?>
                    <form method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="6" name="content"
                                      placeholder="پاسخ خود را در این قسمت وارد نمایید"></textarea>
                        </div>

                        <button type="submit" name="btnanswer" class="btn btn-block btn-info">ارسال پاسخ</button>
                    </form>

                    <p class="m15top">لیست پرسش و پاسخ های انجام شده در مورد این موضوع :</p>

                    <div class="media" style="border: 2px solid #eee;padding: 18px;">
                        <div class="media-body">
                            <p style="color: #2a6496">
                                اولین پرسش از طرف کاربر

                                <Br/> <Br/>
                                <?php echo $data['dataticket']['content']; ?></p>
                        </div>
                    </div>
                    <?php
                    if (!empty($data['answer']->readticket($data['dataticket']['id']))) {
                        foreach ($data['answer']->readticket($data['dataticket']['id']) as $value) { ?>
                            <div class="media" style="border: 2px solid #eee;padding: 18px;">
                                <div class="media-body">

                                    <p style="color: #5e5e5e">
                                        از طرف
                                        <?php if ($value['username'] != 'admin') {
                                            echo 'کاربر : ';
                                        } else {
                                            echo 'مدیر';
                                        } ?>
                                        <Br/> <Br/>
                                        <?php echo $value['content']; ?>

                                    </p>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
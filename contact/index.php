<?php 
$title = "Contact | I Am Hwawon";
?>
<!-- head -->
<?php include('../common/parts/head.php'); ?>
<body>
    <!-- header -->
    <?php include('../common/parts/header.php'); ?>

    <!-- main -->
    <main>
       <!-- contact -->
       <section id="contact_detail" class="sec_padding">
        <div class="container">
            <div class="detail_title">
                <h2>contact</h2>           
            </div>

            <div class="contact_form">
                <p>制作のお見積もりやご依頼・その他ご相談等ありましたら<br class="pc-only1">お気軽にお問い合わせください。</p>
                
                <form action="/contact/mail.php" method="POST">
                    <dl>
                        <dt>name<span>*</span></dt>
                        <dd><input type="text" name="name" value="" placeholder="park hwa won" class="rq js-characters-change"></dd>
                    </dl>

                    <dl>
                        <dt>tel<span>*</span></dt>
                        <dd><input type="tel" name="tel" value="" placeholder="080-1234-5678" class="rq js-characters-change"></dd>
                    </dl>

                    <dl>
                        <dt>email<span>*</span></dt>
                        <dd><input type="email" name="email" value="" placeholder="yourEmail@gamil.com" class="rq js-characters-change"></dd>
                    </dl>

                    <dl>
                        <dt>message<span>*</span></dt>
                        <dd><textarea name="message" cols="30" rows="10" value="" placeholder="contact message" class="rq js-characters-change"></textarea></dd>
                    </dl>

                    <div class="btn">
                        <input type="submit" value="contact">
                    </div>
                </form>
            </div>
        </div>
       </section>
    </main>

    <!-- footer -->
    <?php include('../common/parts/footer.php'); ?>
</body>
<script src="/common/js/common.js"></script>
<script src="./js/page.js"></script>
</html>
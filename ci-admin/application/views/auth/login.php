<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="" method="post">
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <h2><?= $this->session->flashdata('flasher'); ?></h2>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="email">Email address</label>
                            <input type="text" id="email" name="email">
                            <?= form_error('email', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password">
                            <?= form_error('password', '<p class="text-danger">', '</p>'); ?>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-8 text-right">
                                <a href="#">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
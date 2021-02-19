<?php
    require_once "../start.php";

    list($type, $slug) = initPreland();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta id="vp" name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-52M7DF7');</script>
        <!-- End Google Tag Manager -->

        <title>Best-bride quiz</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css" />

        <script>
            if (screen.width < 550) {
                var mvp = document.getElementById("vp");
                mvp.setAttribute("content", "width=550");
            }
        </script>
        <style>
            a {
                text-decoration: none !important;
            }
            ul {
                list-style: none;
                margin: 0;
                padding: 0;
            }
            input[type="date"],
            input[type="email"],
            input[type="number"],
            input[type="password"],
            input[type="search"],
            input[type="text"] {
                height: 40px;
                border-radius: 4px;
                border: 1px solid #aaa;
                padding: 7px;
            }
            .toUppercase{
                text-transform: uppercase;
            }
            .df {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
            }
            .aic {
                -ms-align-items: center;
                align-items: center;
            }
            .jcc {
                justify-content: center;
            }
            .btn-skip{
                color: #fff;
                background-color: #af54ac;
                border-color: #af54ac;
            }
            .btn-skip:hover{
                color: #fff;
                background-color: #af29aa;
                border-color: #af29aa;
            }
            .marked {
                color: #cf1616;
                font-weight: bold;
            }
            .wrapper {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -webkit-flex-direction: column;
                -moz-flex-direction: column;
                -ms-flex-direction: column;
                -o-flex-direction: column;
                flex-direction: column;
                min-height: 100vh;
            }
            header {
                background: #fff;
            }
            .header {
                height: 50px;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                justify-content: space-between;
            }
            .header__logo {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -ms-align-items: center;
                align-items: center;
            }
            .header__logo img {
                width: 100px;
            }
            .header__menu {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -ms-align-items: center;
                align-items: center;
                position: relative;
            }
            .sign-in-box {
                display: none;
                position: absolute;
                max-width: 300px;
                min-width: 200px;
                width: 100%;
                right: 0px;
                top: 70px;
                background: rgba(0, 0, 0, 0.8);
                padding: 20px;
                text-align: center;
            }
            .sign-in-box.active {
                display: block;
            }
            .sign-in-box:before {
                content: "";
                position: absolute;
                margin: -30px 0 0 0px;
                right: 15px;
                width: 0;
                height: 0;
                border-style: solid;
                border-width: 0 10px 10px;
                border-color: transparent transparent rgba(0, 0, 0, 0.8);
            }
            .sign-in-box .form-group {
                margin-bottom: 20px;
            }
            #form-forgotPass .additional {
                color: #fff;
                font-size: 14px;
            }
            .sign-in-box .additional-link {
                color: #ffd300;
            }
            .sign-in-box__item.js-hidden {
                display: none;
            }
            main {
                background: #ccc;
                flex: 1;
                padding: 20px;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -ms-align-items: center;
                align-items: center;
                justify-content: center;
                background: url(images/bg2.jpg);
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }
            footer {
                background: #000;
                height: 50px;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -ms-align-items: center;
                align-items: center;
                justify-content: center;
            }
            .footer__link {
                margin: 0 15px;
                color: #ccc;
            }
            .step-box {
                display: none;
                flex: 1;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 10px;
                overflow: hidden;
            }
            .step-content {
                background: rgba(255, 255, 255, 0.9);
                width: 100%;
                height: 100%;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
            .quiz-box {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                overflow: hidden;
            }

            .quiz-box .step:first-child,
            .quiz-box .step.visible {
                display: block;
                opacity: 1;
            }

            .quiz-box .step-box {
                width: 700px;
                min-height: 300px;
            }
            .quiz-box .step-content {
            }

            .quiz-box .step-content .title {
                height: 50px;
                line-height: 1;
                background: #af54ac;
                color: #fff;
                text-align: center;
                font-size: 22px;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -ms-align-items: center;
                align-items: center;
                justify-content: center;
            }
            .quiz-box .step-content .additional {
                text-align: center;
                font-size: 18px;
                color: #9c9c9c;
            }
            .quiz-box .step-content .info {
                font-size: 20px;
                padding: 20px 20px 0;
            }
            .quiz-box .step-content .btns-box {
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -ms-align-items: center;
                align-items: center;
                justify-content: center;
            }
            .quiz-box .step-content .btns-box .btn {
                margin: 20px;
                min-width: 150px;
            }
            .quiz-box .step-content .btns-box .btn-simple {
                background: #ffd300;
            }
            .info-img img {
                margin: 20px auto;
                display: block;
                max-width: 300px;
            }
            .form-register {
                display: none;
                width: 600px;
                min-height: 250px;
                /* background: #fff; */
                padding: 10px;
            }
            .form-register .mainTitleForm,
            .form-register .head.head-title
            {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 50px;
                line-height: 1;
                background: #af54ac;
                color: #fff;
                text-align: center;
                font-size: 22px;
                display: -webkit-flex;
                display: -moz-flex;
                display: -ms-flex;
                display: -o-flex;
                display: flex;
                -ms-align-items: center;
                align-items: center;
                justify-content: center;
            }
            .form-register .head.head-title{
                height: 60px;
            }
            .form-register .mainTitleForm + .head{
                margin-top: 50px;
            }
            .form-register .head.head-title + .title{
                margin-top: 60px;
            }

            .form-register .step:first-child,
            .form-register .step.visible {
                display: block;
                opacity: 1;
            }
            .form-register .step {
                text-align: center;
            }
            .form-register .step-content {
                position: relative;
                padding: 20px;
            }
            .form-register .head {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0 10px 0 0;
                position: relative;
            }
            .form-register .head .counter {
                color: #ffffff;
                position: absolute;
                right: 20px;
                top: 20px;
                font-size: 16px;
            }
            .form-register .title {
                font-size: 22px;
                margin: 10px 0;
            }
            .form-register .info {
                margin-bottom: 15px;
            }
            .form-register .date-selects .select-box {
                width: 120px;
                margin: 0 5px;
            }
            .form-register .date-selects .select-box .select2-container {
                width: 100% !important;
            }
            .form-register .terms-checkbox label {
                margin: 0 0 0 5px;
                font-size: 14px;
            }
            .select2-container .select2-selection--single {
                height: 40px;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 40px;
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow {
                height: 40px;
            }
            .text.text-inner{
                font-size: 20px;
                margin-bottom: 10px;
            }
            @media (max-width: 992px) {
                main {
                    padding: 100px 20px;
                    background: url(images/bg-mobile.jpg);
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                }
            }
            @media (max-width: 768px) {
                .step,
                .form-register {
                    width: 100%;
                }
            }
            @media (max-height: 600px) {
                .wrapper {
                    min-height: 700px;
                }
                main {
                    -ms-align-items: flex-start;
                    align-items: flex-start;
                }
            }
            form label.error,
            label.error {
                color: red;
                font-style: italic;
                display: block;
            }

            .answers{
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
            }
            .answers .answer{
                text-align: center;
                margin-bottom: 10px;
            }
            .answers .answer .title-type{
                display: block;
                margin-top: -10px;
            }
            .custom-checkbox {
                display: none;
            }

            .custom-checkbox-label {
                border: 1px solid #fff;
                padding: 10px;
                display: block;
                position: relative;
                margin: 10px;
                cursor: pointer;
                -webkit-touch-callout: none;
                -webkit-user-select: none;
                -khtml-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            .custom-checkbox-label::before {
                background-color: white;
                color: white;
                content: " ";
                display: block;
                border-radius: 50%;
                border: 1px solid grey;
                position: absolute;
                top: -5px;
                left: -5px;
                width: 20px;
                height: 20px;
                text-align: center;
                font-size: 14px;
                line-height: 20px;
                transition-duration: 0.4s;
                transform: scale(0);
            }

            .custom-checkbox-label img {
                height: 110px;
                width: 110px;
                object-fit: cover;
                transition-duration: 0.2s;
                transform-origin: 50% 50%;
            }

            :checked+.custom-checkbox-label {
                border-color: #ddd;
            }

            :checked+.custom-checkbox-label::before {
                content: "✓";
                background-color: grey;
                transform: scale(1);
            }

            :checked+.custom-checkbox-label img {
                transform: scale(0.9);
                box-shadow: 0 0 5px #333;
                z-index: -1;
            }
            .addInfoImages{
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
                margin-bottom: 5px;
            }
            .addInfoImages-item{
                width: 150px;
                height: 150px;
                margin: 10px;
            }
            .addInfoImages-item img{
                width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52M7DF7"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
        <div class="wrapper">
            <main>
                <!-- QUIZ -->
                <div class="quiz-box">
                    <div class="step-box step step-base" data-step="base">
                        <div class="step-content">
                            <div class="title">A website where you may find someone special!</div>
                            <div class="info">
                                <div class="info-img">
                                    <img src="/images/base.gif" alt="girl" />
                                </div>
                                <div class="question text-center ml-5 mr-5 mb-1">
                                    <span class="marked">Hello! Nice to meet you</span><br>
                                    <span class="toUppercase">Hot girls are waiting for you</span><br>
                                </div>
                            </div>
                            <div class="btns-box">
                                <a href="javascript:void(0);" data-btn-status="ok" data-btn-step="base" class="btn btn-lg btn-simple js-btn-continue js-btn-quiz toUppercase" id="btn-continue-base">Chat now</a>
                            </div>
                        </div>
                    </div>
					<div class="step-box step step-checkboxes step-startQuiz"  data-step="1">
						<div class="step-content">
							<div class="title">Question 1 of 2</div>
                            <div class="info">
                                <div class="question text-center ml-5 mr-5">
                                    What type of meeting do you prefer?
                                </div>
                                <ul class="answers ml-3 mr-3 mt-2">
                                    <li class="answer">
                                        <input id="cb-dating" type="checkbox" class="checkbox custom-checkbox" value="Dating">
                                        <label for="cb-dating" class="custom-checkbox-label"><img src="images/dating.gif" alt="Dating" /></label>
                                        <span class="title-type">Dating</span>
                                    </li>
                                    <li class="answer">
                                        <input id="cb-communication" type="checkbox" class="checkbox custom-checkbox" value="Сommunication">
                                        <label for="cb-communication" class="custom-checkbox-label"><img src="images/communication.gif" alt="Сommunication" /></label>
                                        <span class="title-type">Сommunication</span>
                                    </li>
                                    <li class="answer">
                                        <input id="cb-meet" type="checkbox" class="checkbox custom-checkbox" value="Meet">
                                        <label for="cb-meet" class="custom-checkbox-label"><img src="images/meet.gif" alt="Meet" /></label>
                                        <span class="title-type">Meet</span>
                                    </li>
                                    <li class="answer">
                                        <input id="cb-sex" type="checkbox" class="checkbox custom-checkbox" value="Sex">
                                        <label for="cb-sex" class="custom-checkbox-label"><img src="images/sex.gif" alt="Sex" /></label>
                                        <span class="title-type">Sex</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="btns-box">
                                <a href="javascript:void(0);" data-btn-status="continue" data-btn-step="1" class="btn btn-lg btn-simple js-btn-continue js-btn-quiz toUppercase" id="btn-continue-step-1">Continue</a>
                            </div>
						</div>
					</div>
					<div class="step-box step step-checkboxes step-finishQuiz"  data-step="finishQuiz">
						<div class="step-content">
							<div class="title">Question 2 of 2</div>
							<div class="info">
								<div class="question text-center ml-5 mr-5">
									What girls do you like?
								</div>
								<ul class="answers ml-3 mr-3 mt-2">
							      	<li class="answer">
                                        <input id="cb-skinny" type="checkbox" class="checkbox custom-checkbox" value="Skinny">
                                        <label for="cb-skinny" class="custom-checkbox-label"><img src="images/skinny.gif" alt="Skinny"  /></label>
                                        <span class="title-type">Skinny</span>
                                    </li>
                                    <li class="answer">
                                        <input id="cb-regular" type="checkbox" class="checkbox custom-checkbox" value="Regular">
                                        <label for="cb-regular" class="custom-checkbox-label"><img src="images/regular.gif" alt="Regular" /></label>
                                        <span class="title-type">Regular</span>
                                    </li>
                                    <li class="answer">
                                        <input id="cb-plus-size" type="checkbox" class="checkbox custom-checkbox" value="Plus-size">
                                        <label for="cb-plus-size" class="custom-checkbox-label"><img src="images/plus-size-2.gif" alt="Plus-size"  /></label>
                                        <span class="title-type">Plus-size</span>
                                    </li>
                                    <li class="answer">
                                        <input id="cb-model-type" type="checkbox" class="checkbox custom-checkbox" value="Model type">
                                        <label for="cb-model-type" class="custom-checkbox-label"><img src="images/model.gif" alt="Model type" /></label>
                                        <span class="title-type">Model type</span>
                                    </li>
							    </ul>
							</div>
							<div class="btns-box">
                                <a href="javascript:void(0);" data-btn-status="continue" data-btn-step="finishQuiz" class="btn btn-lg btn-simple js-btn-continue js-btn-quiz toUppercase" id="btn-continue-step-2">Continue</a>
							</div>
						</div>
					</div>
                </div>
                <!-- REGISTER -->
                <div class="form-register" id="form-register">

                    <form class="step-box step mini-reg-form register-step-1" data-step="email" data-final="true">
                        <div class="step-content">
                            <div class="mainTitleForm">Girls are waiting for you</div>
                            <div class="head">
                                <a href="/mv.php?url=<?php echo urlencode(OWN_DOMAIN . '/sign-up'); ?>" class="header__logo df">
                                    <img src="images/logo.png" alt="BestBride Online Dating Site with Best Looking Women" class="logo-image img-fluid" />
                                </a>
                            </div>

                            <div class="info">
                                <div class="info-img">
                                    <img src="images/beckons-2.gif" alt="girl" />
                                </div>
                                <div class="text text-inner">Please enter your valid email</div>
                                <input type="email" name="email" class="input input-reg-email input-group-lg" placeholder="email" required />
                            </div>
                            <div class="btns-box">
                                <button data-btn-step="register-step-1" data-btn-status="sign up" class="btn btn-lg btn-success" id="btn-continue-reg-finish">Continue</button>
                            </div>
                        </div>
                    </form>

                    <div class="step-box step register-step-end">
                        <div class="step-content">
                            <div class="title">
                                <div class="marked">Congratulations</div>
                                you have access to a large number of companions
                            </div>
                            <div class="info">
                                <div class="info-img">
                                    <img src="images/congratulation.gif" alt="" />
                                </div>
                            </div>
<!--                            <div class="btns-box">-->
<!--                                <a href="https://best-bride.com/profile" class="btn btn-lg btn-success">Go to profile</a>-->
<!--                            </div>-->
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                <nav class="footer__nav">
                    <a href="/mv.php?url=<?php echo urlencode(OWN_DOMAIN . '/terms-and-conditions'); ?>" class="footer__link">Terms and conditions</a>
                    <a href="/mv.php?url=<?php echo urlencode(OWN_DOMAIN . '/anti-scamming-policy'); ?>" class="footer__link">Anti-Scam Policy</a>
                    <a href="/mv.php?url=<?php echo urlencode(OWN_DOMAIN . '/online-dating-services'); ?>" class="footer__link">Our services</a>
                </nav>
            </footer>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
        <script>
            console.log("DONT TOUCH THE CONSOLE!!")
            function getUrlParams(search) {
                let hashes = search.slice(search.indexOf('?') + 1).split('&')
                return hashes.reduce((params, hash) => {
                    let [key, val] = hash.split('=')
                    return Object.assign(params, {[key]: decodeURIComponent(val)})
                }, {})
            }

            function makePassword() {
                let password = '';
                let chars = 'abcdefghijQWERTYUIOPASDFGHJKLZXCVBNMklmnopqrstuvwxyz0123456789';
                for (i = 1; i <= 8; i++) {
                    let c = Math.floor(Math.random() * chars.length);
                    password += chars.charAt(c)
                }
                return password;
            }
            let newPass = makePassword()

            function makeName(email) {
                let name = '';
                let cutedEmail = email.split('@')[0]
                let chars = 'abcdefghijklmnopqrstuvwxyz';
                for (i = 1; i < 3; i++) {
                    let c = Math.floor(Math.random() * chars.length);
                    name += chars.charAt(c)
                }
                cutedEmail = cutedEmail.replace(/[\-\.\_]+/img, " ")
                return cutedEmail+name;
            }

            var _GET = getUrlParams(location.href);
            if(_GET.uid) {
                $.ajax({
                    url: "<?php echo OWN_DOMAIN; ?>/api/preland-info",
                    method: "POST",
                    dataType: "json",
                    data: {
                        click: true,
                        uid: _GET.uid
                    }
                })
            }

            /*sign in - forgot pass*/
            let $btnSignIn = $(".btn-sign-in");
            let $signInBox = $(".sign-in-box");

            $btnSignIn.on("click", function () {
                $signInBox.fadeToggle(300);
                $signInBox.toggleClass("active");
            });

            $(document).mouseup(function (e) {
                if (!$btnSignIn.is(e.target) && !$signInBox.is(e.target) && $btnSignIn.has(e.target).length === 0 && $signInBox.has(e.target).length === 0) {
                    $signInBox.removeClass("active");
                    $signInBox.fadeOut();
                }
            });


            $("#form-signIn").on("submit", function (e) {
                e.preventDefault();
                let $form = $(this);
                let data = $form.serialize();
                $.ajax({
                    url: $form.attr("action"),
                    method: "POST",
                    dataType: "json",
                    data: data,
                    success: (output) => {
                        if (output.status) {
                        	Msg.success("Success logined");/*Add redirect to BB page as logined??*/
                        } else {
                            Msg.error(output.error);
                        }
                    },
                    error: () => {
                        Msg.error("response_error");
                    },
                });
            });

            $("#form-forgotPass").on("submit", function (e) {
                e.preventDefault();
                let $form = $(this);
                let data = $form.serialize();
                $.ajax({
                    url: $form.attr("action"),
                    method: "POST",
                    dataType: "json",
                    data: data,
                    success: (output) => {
                        if (output.status) {
							Msg.success("A recovery email has been sent to your email");
                        } else {
                            Msg.error(output.error);
                        }
                    },
                    error: () => {
                        Msg.error("response_error");
                    },
                });
            });

            $(".additional-link").on("click", function (e) {
                $(".sign-in-box__item").removeClass("js-hidden");
                $(this).closest($(".sign-in-box__item")).addClass("js-hidden");
            });


			/*next step open, previous close*/
            $(".js-btn-continue").on("click", function (e) {
                e.preventDefault();
                let $this = $(this);
                if ($this.data("btn-step") == "finishQuiz") {
                    $this.closest(".step").fadeOut(200);
                    $(".form-register").delay(200).fadeIn(200);
                } else {
                    $this.closest(".step").fadeOut(200);
                    $this.closest(".step").next().delay(200).fadeIn(200);
                }
            });

			/*registration steps forms validate and submit*/
            $(".mini-reg-form").on("submit", function (e) {
                e.preventDefault();
                let $this = $(this);

                let step = $this.data("step");
                let final = $this.data("final");
                let question = $this.find(".title").text().trim();
                let data = {
                    ip: "<?php echo $_SERVER['REMOTE_ADDR']; ?>",
                    uid: _GET.uid,
                    step, question, answer: "",
                };
                if(final){
                    data.finish = true
                }

                $this.removeClass("error");

                if ($this.hasClass("register-step-1")) {
                    data.answer = $(".input-reg-email").val();
                    data.question = "email"
                }

                if ($this.hasClass("error")) {
                    return false;
                } else {
                    let link = new URL("<?php echo OWN_DOMAIN; ?>/api/preland-info")
                    if(_GET.utm_source) {
                        // link.searchParams.set("utm_source", _GET.utm_source);
                        // link.searchParams.set("utm_medium", _GET.utm_medium);
                        // link.searchParams.set("utm_campaign", _GET.utm_campaign);
                        // link.searchParams.set("utm_content", _GET.utm_content);
                        // link.searchParams.set("utm_term", _GET.utm_term);
                    }
                    link.searchParams.set("utm_source", "email");
                    link.searchParams.set("utm_medium", "email");
                    link.searchParams.set("utm_campaign", "SMTP");
                    if(final) {
                        $.ajax({
                            url: link,
                            method: "POST",
                            dataType: "json",
                            data: {
                                ip: data.ip,
                                step: "password",
                                question: "password",
                                answer: makePassword(),
                            },
                        });
                        setTimeout(() => {
                            $.ajax({
                                url: link,
                                method: "POST",
                                dataType: "json",
                                data: {
                                    ip: data.ip,
                                    step: "name",
                                    question: "name",
                                    answer: makeName(data.answer),
                                },
                            });
                        }, 100);
                    }
                    setTimeout(() => {
                        $.ajax({
                            url: link,
                            method: "POST",
                            dataType: "json",
                            data /*$this.serialize*/,
                            success(output){
                                $this.closest(".step").fadeOut(200);
                                $this.closest(".step").next().delay(200).fadeIn(200);
                                if(output.link){
                                    location = output.link
                                }
                            },
                            error(){
                                Msg.error("response_error");
                            },
                        });
                    }, final ? 300 : 0)
                }
            });

            /* Quiz steps submit */
            $(".js-btn-quiz").on("click", function () {
                let $this = $(this);

                let step = $this.data("btn-step");
                let question = $this.closest(".step").find(".question").text().trim();
                let answer = $this.data("btn-status");
                let checkArray = [];
                let data = {
                    ip: "<?php echo $_SERVER['REMOTE_ADDR']; ?>",
                    uid: _GET.uid,
                    step, question, answer
                };

                if ($this.closest(".step").hasClass("step-checkboxes")) {
                    let checkboxes = $this.closest(".step").find(".checkbox");
                    checkboxes.each(function (i, item) {
                        if ($(this).prop("checked") == true) {
                            checkArray.push($(this).val());
                        }
                    });
                    if (Array.isArray(checkArray) && checkArray.length) {
                        data.question = checkArray;
                        console.log(checkArray);
                    }
                }

                $.ajax({
                    url: "<?php echo OWN_DOMAIN; ?>/api/preland-info" /*@todo change fake link*/,
                    method: "POST",
                    dataType: "json",
                    data,
                    success(data){
                        console.log(data);
                    },
                    error(){
                        Msg.error("response_error");
                    },
                });
            });

            window["Msg"] = {
                success(message) {
                    let obj = typeof message === "object" ? message : { message };

                    if (window.iziToast) {
                        if (!obj.position) {
                            obj.position = "topRight";
                        }
                        iziToast.success(obj);
                    }
                },

                message(message) {
                    let obj = typeof message === "object" ? message : { message };

                    if (window.iziToast) {
                        obj = $.extend(
                            {
                                theme: "dark",
                                layout: 2,
                                displayMode: 2,
                                imageWidth: 100,
                                image: location.origin + "/images/avatar.jpg",
                                title: "User",
                                message: "What would you like to add?",
                                buttons: {},
                            },
                            obj
                        );
                        iziToast.show(obj);
                    }
                },

                error(message) {
                    let obj = typeof message === "object" ? message : { message };

                    if (window.iziToast) {
                        if (!obj.position) {
                            obj.position = "topRight";
                        }
                        iziToast.error(obj);
                    }
                },

                warning(message) {
                    let obj = typeof message === "object" ? message : { message };

                    if (window.iziToast) {
                        if (!obj.position) {
                            obj.position = "topRight";
                        }
                        iziToast.warning(obj);
                    }
                },

                info(message) {
                    let obj = typeof message === "object" ? message : { message };

                    if (window.iziToast) {
                        if (!obj.position) {
                            obj.position = "topRight";
                        }
                        iziToast.info(obj);
                    }
                },

                displayFromData(output) {
                    if (output.error) {
                        this.showAlert(output.error, "error");
                    } else if (output.warning) {
                        this.showAlert(output.warning, "warning");
                    } else if (output.info) {
                        this.showAlert(output.info, "info");
                    } else if (output.success) {
                        this.showAlert(output.success, "success");
                    } else if (output.errors) {
                        for (let key in output.errors) {
                            let val = output.errors[key];
                            this.showAlert(val, "error");
                        }
                    }

                    if (output.redirect) {
                        if (!output.timeout) {
                            window.location.replace(output.redirect);
                        } else {
                            setTimeout(() => {
                                window.location.replace(output.redirect);
                            }, output.timeout);
                        }
                    }
                },

                showAlert(msgs, type) {
                    let fn = Msg[type];
                    if (typeof msgs === "object") {
                        for (let i = 0; i < msgs.length; i++) {
                            let msg = msgs[i];
                            if (typeof fn === "function") {
                                if (__LANG__[msg]) {
                                    msg = __LANG__[msg];
                                }
                                fn(msg);
                            }
                        }
                    } else {
                        if (typeof fn === "function") {
                            if (__LANG__[msgs]) {
                                msgs = __LANG__[msgs];
                            }
                            fn(msgs);
                        }
                    }
                },
            };
        </script>
    </body>
</html>

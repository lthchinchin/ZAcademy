<?php 
    if(is_user_logged_in()) 
		wp_redirect( get_home_url() );
?>

<?php get_header(); ?>

<main class="page-register">
    <div class="container">
        <div class="box">
            <div class="row">
                <div class="col-7">
                    <div class="title">CHÀO MỪNG BẠN ĐẾN VỚI TRANG ĐĂNG KÝ CỦA HỌC VIỆN Z</div>
                    <form id="register-form" method="post">
                        <?php wp_nonce_field( 'registed_user' ); ?>
                        <p class="register-name">
                            <label for="fullname">Họ và tên</label>
                            <input id="fullname" class="fullname" name="fullname" type="text" placeholder="Nhập họ và tên đầy đủ của bạn" autofocus>
                        </p>
                        <p class="register-username">
                            <label for="username">Tên đăng nhập</label>
                            <input id="username" class="username" name="username" type="text" placeholder="Tên đăng nhập từ 6 đến 24 kí tự, không chứa kí tự đặc biệt">
                        </p>
                        <p class="register-password">
                            <label for="password">Mật khẩu</label>
                            <input id="password" class="password" name="password" type="password" placeholder="Nhập mật khẩu của bạn">
                        </p>
                        <p class="register-re-password">
                            <label for="re-password">Xác nhận mật khẩu</label>
                            <input id="re-password" class="re-password" name="re-password" type="password" placeholder="Nhập lại mật khẩu của bạn">
                        </p>
                        <p class="register-phone">
                            <label for="phone">Số điện thoại</label>
                            <input id="phone" class="phone" name="phone" type="text" placeholder="Nhập số điện thoại">
                        </p>
                        <p class="register-otp">
                            <label for="otp">Xác thực OTP</label>
                            <input id="otp" class="otp" name="otp" type="number" placeholder="Nhập mã OTP gửi về sdt">
                            <button class='d-flex justify-content-center align-items-center get-otp'>Gửi mã</button>
                        </p>
                        <p class="register-agree">
                            <label>
                                <input type="checkbox">
                                Tôi đồng ý với các quy định của Học viện Z
                            </label>
                        </p>
                        <p class="register-submit">
                            <button type="submit" id="submit" class="d-flex justify-content-center align-items-center submit">
                                Đăng ký
                            </button>
                        </p>
                    </form>
                    <div class="text-danger error"></div>
                </div>
                <div class="col-5">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/login-logout/page_login-logo.png"
                        alt="Logo">
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>

<script>
(function($) {




    function checkValueFormRegister_Fullname() {
        let flag = true;
        let check = $(".fullname").val();
        if (!check) {
            error_text = "Vui lòng nhập Họ và tên !";
            flag = false;
            $(".fullname").focus();
        }
        return flag;
    }

    function checkValueFormRegister_Username() {
        let flag = true;
        let check = $(".username").val();
        if (!check) {
            error_text = "Vui lòng nhập Tên đăng nhập !";
            flag = false;
            $(".username").focus();
        } else if (check.length < 6 || check.length > 24) {
            error_text = "Tên đăng nhập phải từ 6 - 24 kí tự !";
            flag = false;
            $(".username").focus();
        }
        return flag;
    }

    function checkValueFormRegister_Password() {
        let flag = true;
        let check = $(".password").val();
        if (!check) {
            error_text = "Vui lòng nhập Mật khuẩu !";
            flag = false;
            $(".password").focus();
        }
        return flag;
    }

    function checkValueFormRegister_Repassword() {
        let flag = true;
        let check1 = $(".password").val();
        let check2 = $(".re-password").val();
        if (!check2) {
            error_text = "Vui lòng nhập Xác nhân mật khuẩu !";
            flag = false;
            $(".re-password").focus();
        } else if (check1 != check2) {
            error_text = "Xác nhận mật khẩu không đúng !";
            flag = false;
            $(".re-password").focus();
        }
        return flag;
    }

    function checkValueFormRegister_Phone() {
        let flag = true;
        let check = $(".phone").val();
        if (!check) {
            error_text = "Vui lòng nhập Số điện thoại !";
            flag = false;
            $(".phone").focus();
        } else {
            const regexPhoneNumber = /^((\+)84|0)[1-9](\d{2}){4}$/;
            if (!check.match(regexPhoneNumber)) {
                error_text = "Số điện thoại không hợp lệ !";
                flag = false;
                $(".phone").focus();
            }
        }
        return flag;
    }

    function checkValueFormRegister_OTP() {
        let flag = true;
        let check = $(".otp").val();
        if (!check) {
            error_text = "Vui lòng nhập OTP !";
            flag = false;
            $(".otp").focus();
        }else{
            if ( ! $('.otp').is('[readonly]') ) { 
                error_text = "Nhập sai OTP !";
                flag = false;
                $(".otp").focus();
            }
        }
        return flag;
    }

    function checkValueFormRegister_All() {

        return (
            checkValueFormRegister_Fullname() &&
            checkValueFormRegister_Username() &&
            checkValueFormRegister_Password() &&
            checkValueFormRegister_Repassword() &&
            checkValueFormRegister_Phone() &&
            checkValueFormRegister_OTP()
        );
    }

    /** [Start action]	Handle submit */
    $(".page-register .submit").click(function(e) {
        e.preventDefault();
        if (checkValueFormRegister_All()) {
            $(".page-register .error").html("");
		    let uiFormData = $("#register-form").serialize();
            
			$.ajax({
				type: "POST",
				dataType: "json",
				url: ajaxUrl,
				data: {
					action: "register_user",
					data: uiFormData,
				},
				beforeSend: function () {
					$(".page-register .get-otp").prop("disabled", true);
					$("#register-form .register-submit #submit").html(
						'Đang xử lý <div class="spinner-border spinner-border-sm text-light ms-2" role="status"></div>'
					);
				},
				success: function (response) {
					$(".page-register .get-otp").prop("disabled", false);
					$("#register-form .register-submit #submit").html("Đăng ký");
					if ( ! response.success ) {
						if (response.data.includes("username")) {
                            $(".username").focus();
                            $(".page-register .error").html("Tên đăng nhập đã tồn tại");
						} else {
                            $(".page-register .error").html("");
						}
					} else {
						setTimeout(function () {
							location.reload();
						}, 1000);
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log(
						"The following error occured: " + textStatus,
						errorThrown
					);
				},
			});
        } else {
            $(".page-register .error").html(error_text);
        }
    })
    /** [End action]	Handle submit */




    //  Acccount Biti
    let ACCOUNT_SID = 'AC717febc2f6f291c8e8d0eb6afe028074';
    let AUTH_TOKEN = '9ef54ffa6fd9a80d4b4692f2433e5c3f';
    let SERVICE_SID = 'VA3e5ee9be3da08b9bebe9ad236bd99d15';
    let CHANNEL = 'sms';


    /** [Start action]	Handle send OTP */
    $(".page-register .get-otp").click(function(e) {
        e.preventDefault();
        let phoneNumberTo = $(".page-register .phone").val();

		if ( ! checkValueFormRegister_Phone()) {
            $(".page-register .error").html(error_text);
		} else {
            $(".page-register .error").html("");
        	phoneNumberTo = phoneNumberTo.charAt(0) == '0' ? '+84' + phoneNumberTo.substring(1) : phoneNumberTo;

        	// Convert data to Body -> x-www--form-urlencoded
        	let details = {
        		'To': phoneNumberTo,
        		'Channel': CHANNEL
        	};

        	var formBody = [];
        	for (let property in details) {
        		let encodedKey = encodeURIComponent(property);
        		let encodedValue = encodeURIComponent(details[property]);
        		formBody.push(encodedKey + "=" + encodedValue);
        	}
        	formBody = formBody.join("&");

        	$.ajax({
        		// Link document: https://www.twilio.com/docs/verify/api#
        		type: "POST",
        		url: 'https://verify.twilio.com/v2/Services/' + SERVICE_SID + '/Verifications',
        		data: formBody,
        		// Authorization: username (ACCOUNT_SID) + password (AUTH_TOKEN)
        		headers: {
        			'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
        			"Authorization": "Basic " + btoa(ACCOUNT_SID + ":" + AUTH_TOKEN)
        		},
        		beforeSend: function () {
					$(".page-register .get-otp").prop("disabled", true);
					$(".page-register .phone").prop("readonly", true);

        			$(".get-otp").html(
        				'Đang gửi mã ... 	<div class="spinner-border spinner-border-sm m-1" role="status"></div>'
        			);
        		},
        		success: function () {
					let seconds = 20;
					Id = setInterval(function() {
						if (seconds <= 0) {
							clearInterval(Id);
							$(".page-register .get-otp").prop("disabled", false);
					        $(".page-register .phone").prop("readonly", false);
							$(".page-register .get-otp").text("Gửi OTP");
						} else {
							seconds--;
                            seconds <= 9 ?
							$(".page-register .get-otp").text("Thử lại sau: 0" + seconds + " s"):
							$(".page-register .get-otp").text("Thử lại sau: " + seconds + " s");
						}
					}, 1000);

        		},
        		error: function (jqXHR, textStatus, errorThrown) {
        			console.log(
        				"The following error occured: " + textStatus,
        				errorThrown
        			);
        		},
        	});
        }
    })
    /** [End action]	Handle send OTP */

    /** [Start action]	Handle check OTP */
    $( ".page-register .otp" ).change(function() {
        let phoneNumber = $(".page-register .phone").val();
        phoneNumber = phoneNumber.charAt(0) == '0' ? '+84' + phoneNumber.substring(1) : phoneNumber;
        let otpCodeInput = $( ".page-register .otp" ).val();
        // Convert data to Body -> x-www--form-urlencoded
        let details = {
            'To': phoneNumber,
            'Code': otpCodeInput
        };
        var formBody = [];
        for (let property in details) {
            let encodedKey = encodeURIComponent(property);
            let encodedValue = encodeURIComponent(details[property]);
            formBody.push(encodedKey + "=" + encodedValue);
        }
        formBody = formBody.join("&");

        $.ajax({
            // Link document: https://www.twilio.com/docs/verify/api#
            type: "POST",
            url: 'https://verify.twilio.com/v2/Services/' + SERVICE_SID + '/VerificationCheck',
            data: formBody,
            // Authorization: username (ACCOUNT_SID) + password (AUTH_TOKEN)
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8',
                "Authorization": "Basic " + btoa(ACCOUNT_SID + ":" + AUTH_TOKEN)
            },
            success: function (data) {
                clearInterval(Id);
                $(".get-otp").html( '<i class="fal fa-check"></i>' );
                $(".get-otp").addClass( 'bg-success' );
                $(".page-register .get-otp").prop("disabled", true);
                $(".page-register .phone").prop("readonly", true);
                $(".page-register .otp").prop("readonly", true);
            },
            error: function (error) {
                $(".page-register .get-otp").prop("disabled", false);
                $(".page-register .phone").prop("readonly", false);
                $(".page-register .otp").prop("readonly", false);
            }
            
        });


    });
    /** [End action]	Handle check OTP */




})(jQuery);
</script>
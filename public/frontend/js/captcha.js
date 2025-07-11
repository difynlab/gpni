$(document).ready(function() {
    let mathCaptchaValid = false;
    let hcaptchaCompleted = false;

    function updateSubmitButtonState() {
        if(mathCaptchaValid && hcaptchaCompleted) {
            $('.submit-button').attr('disabled', false).addClass('active');
        }
        else {
            $('.submit-button').attr('disabled', true).removeClass('active');
        }
    }

    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    var randomNum1 = getRandomNumber(1, 98);
    var randomNum2 = getRandomNumber(1, 98 - randomNum1 + 1);
    $('.captcha .number-1').text(randomNum1);
    $('.captcha .number-2').text(randomNum2);

    $('.captcha .verify-button').click(function() {
        var number1 = parseInt($('.number-1').text().trim());
        var number2 = parseInt($('.number-2').text().trim());
        var expectedSum = number1 + number2;
        var sumValue = $('.sum-value');

        if(sumValue.val().trim() === '') {
            sumValue[0].setCustomValidity('Please enter a value');
            sumValue[0].reportValidity();
            mathCaptchaValid = false;
        }
        else if(parseInt(sumValue.val().trim()) !== expectedSum) {
            sumValue[0].setCustomValidity('Incorrect value. Please try again');
            sumValue[0].reportValidity();
            mathCaptchaValid = false;
        }
        else {
            sumValue[0].setCustomValidity('');
            mathCaptchaValid = true;

            $(this).removeClass('verify-button').addClass('verified-button').html('Verified');
        }

        updateSubmitButtonState();
    });

    $('.captcha .sum-value').on('input', function() {
        this.setCustomValidity('');
        mathCaptchaValid = false;
        updateSubmitButtonState();
    });

    window.hcaptchaCallback = function(token) {
        if(token && token.length > 0) {
            hcaptchaCompleted = true;
            updateSubmitButtonState();
        }
    };
});

$(function () {
  var $isScrolling = 0;
  var $timeoutId;

  $(document).on('scroll', function () {
    $isScrolling = 1;
    // スクロールを停止して200ms後に終了とする
    clearTimeout($timeoutId);
    $timeoutId = setTimeout(function () {
      $isScrolling = 0;
    }, 200);
  });

  var clickEventType = window.ontouchstart !== null ? 'click' : 'touchend';

  $(document).on(clickEventType, '.l-header__icon', function () {
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      var obj = document.getElementById('open').style;
      if (obj.display == 'none') {
        obj.display = 'block';
        $(this).attr('src', './assets/images/moon.png').attr('alt', '月');
        $(this).css('animation', '0');
        $('span').css('visibility', 'hidden');
      } else {
        obj.display = 'none';
        $(this).attr('src', './assets/images/sun.png').attr('alt', '太陽');
        $(this).css('animation', '6s linear infinite rotation');
        $('span').css('visibility', 'visible');
      }
      return false;
    }
  });

  $(document).on(clickEventType, '.l-header__menu', function () {
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      var obj = document.getElementById('open').style;
      if (obj.display == 'none') {
        obj.display = 'none';
        $(this).attr('src', './assets/images/moon.png').attr('alt', '月');
        $(this).css('animation', '0');
        $('span').css('visibility', 'hidden');
      } else {
        obj.display = 'none';
        $('.l-header__icon')
          .attr('src', './assets/images/sun.png')
          .attr('alt', '太陽');
        $('.l-header__icon').css('animation', '6s linear infinite rotation');
        $('span').css('visibility', 'visible');
      }
      return false;
    }
  });

  $(document).on(clickEventType, '.l-header__menu--top', function () {
    var obj = document.getElementById('open').style;
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      location.href = '#container';
      obj.display = 'none';
      $('.l-header__icon')
        .attr('src', './assets/images/sun.png')
        .attr('alt', '太陽');
      $('.l-header__icon').css('animation', '6s linear infinite rotation');
      $('span').css('visibility', 'visible');
    }
    return false;
  });

  $(document).on(clickEventType, '.l-header__menu--vision', function () {
    var obj = document.getElementById('open').style;
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      location.href = '#ourVision';
      obj.display = 'none';
      $('.l-header__icon')
        .attr('src', './assets/images/sun.png')
        .attr('alt', '太陽');
      $('.l-header__icon').css('animation', '6s linear infinite rotation');
      $('span').css('visibility', 'visible');
    }
    return false;
  });

  $(document).on(clickEventType, '.l-header__menu--whatWeDo', function () {
    var obj = document.getElementById('open').style;
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      location.href = '#whatWeDo';
      obj.display = 'none';
      $('.l-header__icon')
        .attr('src', './assets/images/sun.png')
        .attr('alt', '太陽');
      $('.l-header__icon').css('animation', '6s linear infinite rotation');
      $('span').css('visibility', 'visible');
    }
    return false;
  });

  $(document).on(clickEventType, '.l-header__menu--company', function () {
    var obj = document.getElementById('open').style;
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      location.href = '#company';
      obj.display = 'none';
      $('.l-header__icon')
        .attr('src', './assets/images/sun.png')
        .attr('alt', '太陽');
      $('.l-header__icon').css('animation', '6s linear infinite rotation');
      $('span').css('visibility', 'visible');
    }
    return false;
  });

  $(document).on(clickEventType, '.l-header__menu--contact', function () {
    var obj = document.getElementById('open').style;
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      location.href = '#contact';
      obj.display = 'none';
      $('.l-header__icon')
        .attr('src', './assets/images/sun.png')
        .attr('alt', '太陽');
      $('.l-header__icon').css('animation', '6s linear infinite rotation');
      $('span').css('visibility', 'visible');
    }
    return false;
  });

  $(document).on(clickEventType, '.l-footer__icon', function () {
    //スクロールしていないときに、クリックorタッチイベントを実行する
    if ($isScrolling === 0) {
      location.href = '#contact';
    }
    return false;
  });

  $(window).on('load scroll', function () {
    var winScroll = $(window).scrollTop();
    var winHeight = $(window).height();
    var scrollPos = winScroll + winHeight * 0.95;
    $('.show').each(function () {
      if ($(this).offset().top < scrollPos) {
        $(this).css({ opacity: 1, transform: 'translate(0, 0)' });
      }
    });
  });

  $('#contact form button.c-btn').on('click', function () {
    var message_DOM = $('#message');

    var form = $(this).closest('form');

    var name = $(form).find('[name="name"]').val();
    var email = $(form).find('[name="email"]').val();
    var message = $(form).find('[name="message"]').val();

    $.ajax({
      url: './send.php',
      type: 'POST',
      dataType: 'json',
      data: {
        name: name,
        email: email,
        message: message,
      },
    })
      .done(function (response) {
        message_DOM.text(response['complete_msg']);
        if (message_DOM.hasClass('error')) message_DOM.removeClass('error');
        message_DOM.addClass('success');
      })
      .fail(function (response) {
        console.log(response.responseJSON);
        $('#message').text(response.responseJSON['err_msg']);
        if (message_DOM.hasClass('success')) message_DOM.removeClass('success');
        message_DOM.addClass('error');
      });
  });

  $(document).ready(function () {
    $(document).on('click', '#wantedly-btn', function () {
      $(this).addClass('active');

      setTimeout(() => {
        $(this).removeClass('active');
      }, 300);

      window.open('https://www.wantedly.com/companies/company_6206023', '_blank', 'noopener,noreferrer');
    });
  });

  $(document).on('contextmenu', function (e) {
    return false;
  });
});

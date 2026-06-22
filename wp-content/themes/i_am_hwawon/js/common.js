$(function () {
  const $window = $(window);
  const $body = $("body");
  const $scrollTop = $("#scrollTop");
  const $footer = $("footer");

  /************************
   * hamburger menu
   ************************/
  $(".hamburger").on("click", function () {
    $(this).toggleClass("active");
    $(".nav_menu").toggleClass("active");
    $("body").toggleClass("active");
    $("#scrollTop").toggleClass("display");
  });
  
  $(".nav_menu a").on("click", function () {
    $(".hamburger").removeClass("active");
    $(".nav_menu").removeClass("active");
    $("body").removeClass("active");
    $("#scrollTop").removeClass("display");
  });

  /************************
   * scroll top
   ************************/
  $scrollTop.hide();

  $scrollTop.on("click", function () {
    $("html, body").animate(
      {
        scrollTop: 0,
      },
      800
    );

    return false;
  });

  /************************
   * import line
   ************************/
  const expansionSwitch = [];

  /************************
   * scroll event
   ************************/
  $window.on("scroll", function () {
    const scrollTop = $window.scrollTop();
    const windowHeight = $window.height();

    /* page top button show/hide */
    if (scrollTop > 100) {
      $scrollTop.fadeIn();
    } else {
      $scrollTop.fadeOut();
    }

    /* footer overlap */
    const scrollHeight = $(document).height();
    const scrollPosition = windowHeight + scrollTop;
    const footerHeight = $footer.innerHeight();

    if (scrollHeight - scrollPosition <= footerHeight) {
      $scrollTop.css({
        position: "absolute",
        top: "-17px",
        bottom: "auto",
      });
    } else {
      $scrollTop.css({
        position: "fixed",
        bottom: "20px",
        top: "auto",
      });
    }

    /* import line */
    $(".import_line_before").each(function (i) {
      const rect = this.getBoundingClientRect();

      if (window.innerHeight > rect.top + 200 && expansionSwitch[i] !== "on") {
        $(this).addClass("import_line_after");
        expansionSwitch[i] = "on";
      }
    });

    /* fadeUp + progress bar */
    $(".fadeUp").each(function () {
      const elementTop = $(this).offset().top;

      if (scrollTop + windowHeight > elementTop) {
        $(this).addClass("fadeUp_show");

        $(this)
          .find(".progress-bar")
          .each(function () {
            $(this).css("width", `${$(this).attr("aria-valuenow")}%`);
          });
      }
    });
  });

  /************************
   * smooth scroll
   ************************/
  $('a[href^="#"]').on("click", function () {
    const href = $(this).attr("href");
    const target = $(href === "#" || href === "" ? "html" : href);

    $("html, body").animate(
      {
        scrollTop: target.offset().top,
      },
      550,
      "swing"
    );

    return false;
  });

  /************************
   * work category menu
   ************************/
  if (location.pathname === "/work/") {
    $("ul .cat-item-all a").css({
      backgroundColor: "#000000",
      color: "#fff",
    });
  }
});
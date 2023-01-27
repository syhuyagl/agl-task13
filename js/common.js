$(document).ready(function () {
  $(".js-slider").bxSlider({
    infiniteLoop: true,
    pager: false,
    auto: true,
  });

  $(".js-imglink").each(function () {
    var src_no = $(this).attr("src");
    var src_on = src_no.replace("_no.", "_on.");
    $(this).mouseover(function () {
      $(this).attr("src", src_on);
    });
    $(this).mouseout(function () {
      $(this).attr("src", src_no);
    });
  });
  $("#select").change(function () {
    var choices = {};
    var form = $("#select");
    $(".c-listpost li").remove();
    $(".c-listpost").empty();
    if (!choices.hasOwnProperty(this.name)) choices['term_id'] = this.value;
    $.ajax({
      url: form.data("url"),
      type: "POST",
      data: {
        action: "call_post",
        choices: choices,
      },
      success: function (result) {
        $(".c-listpost").append(result);
        // console.log(result);
      },
      error: function (err) {
        console.log(err);
      },
    });
  });
});

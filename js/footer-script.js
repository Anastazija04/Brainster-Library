$(function () {
  $.get("https://api.quotable.io/random", function (data) {
    var quote = data.content;
    var paragraph = $(".quote");
    paragraph.html(quote);
  });
});

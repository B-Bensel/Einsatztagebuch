$(document).ready(function() {
  $(".openPopup").on("click", function() {
    var dataURL = $(this).attr("data-href");
    $(".modal-body").load(dataURL, function() {
      $("#myModal").modal({ show: true });
    });
  });
});

$("#myModal").on("show.bs.modal", function(event) {
  var button = $(event.relatedTarget);
  var address = button.data("href");
  var title = button.data("title");
  var modal = $(this);
  modal.find(".modal-title").text(title);
  var modal = $(this);
  $(".modal-body").load(address, function() {
    $("#myModal").modal({ show: true });
  });
});

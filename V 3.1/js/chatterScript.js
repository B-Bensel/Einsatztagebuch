function getUrlVars() {
  var vars = {};
  var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(
    m,
    key,
    value
  ) {
    vars[key] = value;
  });
  return vars;
}

function Chatter() {
  this.getMessage = function(callback, lastTime) {
    var t = this;
    var latest = null;
    var id = getUrlVars()["ID"];

    $.ajax({
      url: "chatterEngine.php",
      type: "post",
      dataType: "json",
      data: {
        mode: "get",
        lastTime: lastTime,
        id: id
      },
      timeout: 120000,
      cache: false,
      success: function(result) {
        if (result.result) {
          callback(result.message);
          latest = result.latest;
        }
      },
      error: function(e) {
        console.log(e);
      },
      complete: function() {
        t.getMessage(callback, latest);
      }
    });
  };

  this.postMessage = function(user, text, callback, id) {
    $.ajax({
      url: "chatterEngine.php",
      type: "post",
      dataType: "json",
      data: {
        mode: "post",
        user: user,
        text: text,
        id: id,
        status: "0"
      },
      success: function(result) {
        callback(result);
      },
      error: function(e) {
        console.log(e);
      }
    });
  };
}

var c = new Chatter();

$(document).ready(function() {
  $("#formPostChat").submit(function(e) {
    e.preventDefault();

    var user = $("#postUsername");
    var text = $("#postText");
    var err = $("#postError");
    var id = getUrlVars()["ID"];

    c.postMessage(
      user.val(),
      text.val(),
      function(result) {
        if (result) {
          text.val("");
        }
        err.html(result.output);
      },
      getUrlVars()["ID"]
    );

    return false;
  });

  c.getMessage(function(message) {
    var chat = $("#Lagemeldungen").empty();

    for (var i = 0; i < message.length; i++) {
      var date = new Date(message[i].time);
      chat.append(
        '<div class="card m-2">' +
          ' <h6 class="card-header"><span class="badge badge-info">' +
          (i + 1) +
          ".</span> " +
          ("0" + date.getDate()).slice(-2) +
          "." +
          ("0" + (date.getMonth() + 1)).slice(-2) +
          "." +
          date.getFullYear() +
          " " +
          ("0" + date.getHours()).slice(-2) +
          ":" +
          ("0" + date.getMinutes()).slice(-2) +
          " - " +
          message[i].user +
          "</h6><div class='card-body'>" +
          ' <p class="card-text">' +
          message[i].text +
          "</p>" +
          "</div></div>"
      );
    }

    $("#Lagemeldungen").scrollTop($("#Lagemeldungen")[0].scrollHeight);
  });
});

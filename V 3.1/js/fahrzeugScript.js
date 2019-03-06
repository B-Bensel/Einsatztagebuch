/**
 * AJAX long-polling
 *
 * 1. sends a request to the server (without a timestamp parameter)
 * 2. waits for an answer from server.php (which can take forever)
 * 3. if server.php responds (whenever), put data_from_file into #response
 * 4. and call the function again
 *
 * @param timestamp
 */
function getContent(timestamp) {
  var id = getUrlVars()["ID"];
  var queryString = { timestamp: timestamp, id: id };

  $.ajax({
    type: "GET",
    url: "fahrzeugEngine.php",
    data: queryString,
    success: function(data) {
      // put result data into "obj"
      var obj = jQuery.parseJSON(data);
      // put the data_from_file into #response
      //$('#FahrzeugTabelle').html(obj.data_from_file);
      document.getElementById("FahrzeugTabelle").innerHTML = obj.data_from_file;
      // call the function again, this time with the timestamp we just got from server.php
      getContent(obj.timestamp);
    }
  });
}

// initialize jQuery
$(function() {
  getContent();
});

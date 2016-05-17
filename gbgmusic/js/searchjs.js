$(function () {
  $("#searchbutton").click(function() {
    //window.alert("TOMT");
  var sfield = $("#sfield").val();
  var dataString = 'sfield='+ sfield;

if(sfield=='')
{
  $("#results").append("Type in a bandname");
  $('#modalSearch').modal('show'); 
}
else
{
  $.ajax({
    type: "POST",
    url: "search2.php",
    data: dataString,
    beforeSend: function(html) { 
        $("#results").html(''); 
        $("#searchresults").show();
    },
    success: function(response){
        //window.alert("fetl");
        $("#results").show();
        $("#results").append(response);
        $('#modalSearch').modal('show'); 
        //window.alert(response);
        //$('table#resultTable tbody').html(response);
    }
  });
}
return false;
});
});

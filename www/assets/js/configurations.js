$(document).ready(function()
{
  //initialize the javascript
  App.init();
});

$(function()
{
	$("#appoint-date").on("click", function(){
		$("#appoint_form").submit();
	});

	$("#appointment-close").on("click", function(){
		$("#appoint_form").modal(false);
	});

	$("#status-finish").on("click", function(){
		$("#finish_form").submit();
	});
})
$(document).ready(function(){
  var picker = new Pikaday({ field: document.getElementById('datepicker') });
  var endTime = $('#endTime');
  endTime.clockpicker({
    autoclose: true
  });
  var startTime = $('#startTime');
  startTime.clockpicker({
    autoclose: true
  });
});

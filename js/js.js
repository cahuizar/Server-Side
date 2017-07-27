$(document).ready(function(){
    const picker = new Pikaday({
  field: document.getElementById('datepicker')
 ,onSelect: date => {
    const year = date.getFullYear()
         ,month = date.getMonth() + 1
         ,day = date.getDate()
         ,formattedDate = [
            year
           ,month < 10 ? '0' + month : month
           ,day < 10 ? '0' + day : day
          ].join('-')
    document.getElementById('datepicker').value = formattedDate
  }
})
  var endTime = $('#endTime');
  endTime.clockpicker({
    autoclose: true
  });
  var startTime = $('#startTime');
  startTime.clockpicker({
    autoclose: true
  });
});

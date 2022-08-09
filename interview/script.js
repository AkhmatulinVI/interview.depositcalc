$(document).ready(function() {

   
    
    $('#chk').on('change', function(){

       if($('#chk').prop('checked')){
          $('#sumP').prop('disabled', false);
          $('#sumP').focus();
       }else{
          $('#sumP').prop('value', 0);
          $('#sumP').prop('disabled', true);   
       }
     })
     $("#f1").validate({
        rules:{
           sumV:{
             required: true,
             min: 1000,
             max: 3000000,
           },
           depT:{
             required: true,
             min: 1,
             max: 60,
           },
           perc:{
             required: true,
             min: 3,
             max: 100,
           },
           sumP:{
             min: 0,
             max: 3000000,
           },
        },
        message:{
          sumV:{
            required: "Это поле обязательно для заполнения",
            min: "Минимальная сумма вклада 1000",
            max: "Максимальная сумма вклада 3000000",
              },
             depT:{
             required: "Это поле обязательно для заполнения",
             min: "Минимальный срок вклада 1 месяц",
             max: "Максимальный срок вклада 60 месяцев",
             },
             perc:{
             required: "Это поле обязательно для заполнения",
             min: "Минимальная процентная ставка 3%",
             max: "Минимальная процентная ставка 100%",
             },
             sumP:{
            required: "Это поле обязательно для заполнения",
            min: "Минимальная сумма пополнения вклада 0",
            max: "Максимальная сумма пополнения вклада 3000000",
        },
        }
     });
    $('#f1').submit(function() {
       var startDate = $('input.datepicker').val();
       var sum = $('input.sumV').val();
       var term = $('input.depT').val();
       var percent = $('input.perc').val();
       var sumAdd = $('input.sumP').val();
       var evMon = $('input.chk').val();

           $.ajax({
                method: "POST",
                url: "calc.php",
                
                data: { startDate: startDate, sum: sum, term: term, percent: percent, sumAdd: sumAdd, evMon: evMon },
                success: function(response)
                {
                   var jsonData = JSON.parse(response);
                   
                   document.getElementById("result").innerHTML = jsonData.sumN;
                   
                }
                })
    })

    document.getElementById('bttn').onclick = function() {
        document.getElementById('preres').hidden = false;
        document.getElementById('rubSign').hidden = false;
      }
 })
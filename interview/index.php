<html>
 <head>
   <meta charset="UTF-8">
   <title>Deposit Calculator</title>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker({dateFormat: "dd-mm-yy"});
        
    } );
    </script>
  
 </head>
 <body>
   <header><div id="headerTitle">Deposit Calculator</div></header>
   <div id="main">
   <div id="title1">Депозитный калькулятор</div>
   <div id="title2">Калькулятор депозитов позволяет рассчитать ваши доходы после внесения суммы на счет в банке по опредленному тарифу.</div>
   <form class="f1" id = "f1" onsubmit="return false">
      <p><input type="text" class="datepicker" id="datepicker" placeholder="Дата открытия"></p>
      <input type = "number" class="sumV" placeholder="Сумма вклада" min="1000" max="3000000">
      
      <input type = "number" class="depT"  placeholder="Срок вклада в месяцах" min="1" max="60">
      <input type = "number" class="perc" placeholder="Процентная ставка, % годовых" min="3" max="100">
         <input type = "checkbox" class="chk" id="chk" checked><div id="lab">Ежемесячное пополнение вклада</div>
      <input type = "number" class="sumP" id="sumP" placeholder="Сумма пополнения вклада" min="0" max="3000000">
      <button type="submit" class="bttn" id="bttn" value="Рассчитать">Рассчитать</button>
   </form>
   <script type="text/javascript" src="script.js"></script>
  <div id="preres" hidden>Сумма к выплате <br> </div><div id="mainRes"><div id="rubSign" hidden>&#8381 </div><div id="result"></div> </div>
   </div> 
</body>
</html>
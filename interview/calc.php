<?php 
function validate(int $sum, int $sumAdd, int $term, int $percent, string $startDate ){
    if ($sum < 1000)
    throw new Exception("Минимальная сумма вклада 1000");
    if ($sum > 3000000)
    throw new Exception("Максимальная сумма вклада 3000000");
    if ($term < 1)
    throw new Exception("Минимальный срок вклада 1 месяц");
    if ($term > 60)
    throw new Exception("Максимальный срок вклада 60 месяцев");
    if ($percent < 3)
    throw new Exception("Минимальная процентная ставка 3%");
    if ($percent > 100)
    throw new Exception("Минимальная процентная ставка 100%");
    if ($sumAdd < 0)
    throw new Exception("Минимальная сумма пополнения вклада 0");
    if ($sumAdd > 3000000 )
    throw new Exception("Максимальная сумма пополнения вклада 3000000");
    if ($startDate == null )
    throw new Exception("введите дату");
    if ($sum == null )
    throw new Exception("Введите сумму вклада");
    if ($term == null )
    throw new Exception("Введите срок вклада");
    if ($percent == null )
    throw new Exception("Введите процентную ставку");

 };
try{
    $startDate = $_POST['startDate'];
    $sum = $_POST['sum'];
    $term = $_POST['term'];
    $percent = $_POST['percent'];
    $sumAdd = $_POST['sumAdd'];
    $evMon = $_POST['evMon'];

    

    validate($sum, $sumAdd, $term, $percent, $startDate);

    $sumN = $sum;
    $sumN1 = 0;
    $curDate = $startDate;
    $isLeapYear = 0;
    $percent = $percent/100;

    $sumAdd = ($evMon == null) ? 0 : $sumAdd;
    

for ($i = 1; $i <= $term; $i++)
    {
        $uxdt = strtotime($curDate);
        $daysM = date('t', $uxdt );
        $isLeapYear = date('L', $uxdt);

        $daysInYear = $isLeapYear ? 366 : 365;

        $curDate = date('d-m-yy', strtotime("+1 months", strtotime($curDate)));

        $sumN1 = $sumN + $sumAdd;
        $sumN = $sumN1 + ($sumN1 + $sumAdd) * $daysM * ($percent / $daysInYear);
        
    }
    $sumN = round($sumN, 2);
  
 echo json_encode(array(sumN =>  $sumN));
 }
 catch (Exception $e) {
    $res= $e->getMessage();
    echo json_encode(array(sumN =>  $res));
    
  }
 
?>
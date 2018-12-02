<?php

if (is_numeric($_POST['summ']) && !empty($_POST['date']) && !empty($_POST['time']) && !empty($_POST['isCap']))
	{
	$percent = 0.1;
	$summ = $_POST['summ'];
	$date = $_POST['date'];
  $time = $_POST['time'];
  $isCap = $_POST['isCap'];

  if($isCap=='yes'  && is_numeric($_POST['summadd']) ){
     $summadd = $_POST['summadd'];
  }

  else {
     $summadd = 0;
    }

	$startDate = new DateTime($date);
  $endDate = new DateTime($date);
  
	switch ($time)
		{
	case '1':
		$endDate->modify("+1 year");
		break;

	case '2':
		$endDate->modify("+2 year");
		break;

	case '3':
		$endDate->modify("+3 year");
		break;

	case '4':
		$endDate->modify("+4 year");
        break;
    
        case '5':
		$endDate->modify("+5 year");
		break;
    }
    

    function getNumDays($year)
      {
      if (($year % 4 == 0 && ($year % 100 != 0 || $year % 400 == 0)))
        {
        return 366;
        }
        else
        {
        return 365;
        }
      }

	$period = new DatePeriod($startDate, new DateInterval('P1M') , $endDate);
 	
	foreach($period as $date)
		{
		$month = date_format($date, "n"); 
		$year = date_format($date, "Y"); 
		$daysn = cal_days_in_month(0, $month, $year);
		$days = getNumDays($year);
		//$summ += ($summ + $summadd) * $daysn * ($percent / $days);
		$summ += $summadd + ($summ + $summadd) * $daysn * ($percent / $days);
		}

	$money = round($summ);
  echo number_format($money, '0', '.', ' ') . " руб.";
	}
  else
	{
	echo "Данные введены некорректно";
	}

die;


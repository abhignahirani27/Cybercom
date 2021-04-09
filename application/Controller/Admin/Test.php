<?php 
namespace Controller\Admin;

class Test extends \Controller\Core\Admin{
    protected $array = [];

    public function lcmAction()
    {
        $number = 36;
        $factor = 2;
             
        while ($number != 1) 
        {
            if($number % $factor == 0)
            {
                $number = $number/$factor;
                array_push($this->array,$factor);
            }
            else
            {
                $factor++;
            }
        }
        
        print_r($this->array);
    }

    public function divisionAction()
    {     
        $num1 = 4567;
        $num2 = 6;
        $totalReminder=0;

        $dividandArr = str_split($num1,1);
        $quotientArr = [];
        $n = sizeof($dividandArr);
        $dividand = $num1;
        $divisor = $num2;
        $quotient = 1;
        $remainder = 0;
        $dividandIndex = 0;
        $buffer = $dividandArr[$dividandIndex];
        // print_r($buffer); die;
        while($dividandIndex < $n)
        {
          if($buffer >= $divisor)
          {
            //print_r($buffer); die;
            $quotient= 0;
            $remainder =0;
            $totalRemainder = 0;

            while($buffer >= $divisor)
            {
              $buffer = $buffer - $divisor;
              //print_r($buffer); die;
              $quotient ++;
            }

            array_push($quotientArr, $quotient);

            $quotient = 1;
            if($buffer > 0)
            {
              $remainder = $buffer;
              $totalRemainder = $remainder;
            }
            $buffer = $remainder;
    
          }
          else{
            $dividandIndex++;
            if($dividandIndex == $n)
            {
              if($buffer < $divisor)
              {
                $totalRemainder =$buffer;
              }
            }
            else
            {
              $buffer = ($buffer*10) + $dividandArr[$dividandIndex];
              if($buffer < $divisor)
              {
                array_push($quotientArr,0);

              }
              
            }
          }
        }
        $ans = implode("" , $quotientArr);
        print_r($ans);

      } 

}

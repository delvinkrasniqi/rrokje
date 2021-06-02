<?php

 //numrimi i karaktereve
 $shkronjat = array(
    array(
        'shkronja'=>'a',
        'numri'=>0
    ),
    array(
     'shkronja'=>'b',
     'numri'=>0
    ),
    array(
     'shkronja'=>'c',
     'numri'=>0
    ),
    array(
     'shkronja'=>'ç',
     'numri'=>0
    ),
    array(
     'shkronja'=>'d',
     'numri'=>0
    ),
    array(
     'shkronja'=>'e',
     'numri'=>0
    ),
    array(
     'shkronja'=>'ë',
     'numri'=>0
    ),
    array(
     'shkronja'=>'f',
     'numri'=>0
    ),
    array(
     'shkronja'=>'g',
     'numri'=>0
    ),
    array(
     'shkronja'=>'h',
     'numri'=>0
    ),
    array(
     'shkronja'=>'i',
     'numri'=>0
    ),
    array(
     'shkronja'=>'j',
     'numri'=>0
    ),
    array(
     'shkronja'=>'k',
     'numri'=>0
    ),
    array(
     'shkronja'=>'l',
     'numri'=>0
    ),
    array(
     'shkronja'=>'m',
     'numri'=>0
    ),
    array(
     'shkronja'=>'n',
     'numri'=>0
    ),
    array(
     'shkronja'=>'o',
     'numri'=>0
    ),
    array(
     'shkronja'=>'p',
     'numri'=>0
    ),
    array(
     'shkronja'=>'q',
     'numri'=>0
    ),
    array(
     'shkronja'=>'r',
     'numri'=>0
    ),
    array(
     'shkronja'=>'s',
     'numri'=>0
    ),
    array(
     'shkronja'=>'t',
     'numri'=>0
    ),
    array(
     'shkronja'=>'u',
     'numri'=>0
    ),
    array(
     'shkronja'=>'v',
     'numri'=>0
    ),
    array(
     'shkronja'=>'x',
     'numri'=>0
    ),
    array(
     'shkronja'=>'y',
     'numri'=>0
    ),
    array(
     'shkronja'=>'z',
     'numri'=>0
    )
 );

        if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['text'])){
            //variablat
            $zanoret = ['a','e','ë','i','o','u','y'];
            $zanoreCount = 0;
            $bashktinglloreCount = 0;
            $hapura = 0;
            $mbyllura = 0;
            $identic = 0;
            $simbole = ['?','!',',','.',':','-'];
            $numerat = ['1','2','3','4','5','6','7','8','9','0'];

            //nese uploadohet file texti merret nga contenti perndryshe nga inputi
            if(isset($_FILES['file']) && $_FILES['file']['size'] !== 0){
                $file = $_FILES['file']['tmp_name'];
                $text = file_get_contents($file);
            }
            else{
               $text = $_POST['text'];
            }
            
           
            $text =  mb_strtolower($text);
            
            //konvertojme stringun si array
            $textArray = mb_str_split($text);

           //Gjeni te mbyllura ose te hapura
           $fjalet = explode(" ", $text);

        
            //kalojme ne unaze ne cdo fjale dhe e marrim vleren e fundit
            //kontrollojme nese shkronja e fundit gjendet tek array zanoret
           foreach($fjalet as $fjala){
              $lastChar = substr($fjala,-1);
              if(in_array($lastChar,$zanoret)){
                  $hapura++;
              }
              else{
                  $mbyllura++;
              }
           }

           //kalojme ne cdo element mbrenda array dhe e marrim karakterin(shkronjen)
           foreach($textArray as $key => $char){
               //kontrollojme nese dy shkronja jane identike te njepasnjeshme
               if($key >= 1 ){
                    $previous = $textArray[$key - 1];
                    if($char == $previous){
                        $identic++;
                    }
               }
              //kontrollojme nese karakteri eshte simbol
              if (in_array($char, $simbole)) {
                $bashktinglloreCount--;
             }
             if(in_array($char,$numerat)){
                 $bashktinglloreCount--;
             }
            
               
               for($i=0; $i<count($shkronjat); $i++){
                  if($char == $shkronjat[$i]['shkronja']){
                      $shkronjat[$i]['numri']+=1;
                  }
                  
               }

               //krahasojme karakterin me nje sete vlerash mbrenda switch
               switch($char){
                    case 'a':
                        $zanoreCount++;
                        break;
                    case 'e':
                        $zanoreCount++;
                        break;
                    case 'ë':
                        $zanoreCount++;
                        break;
                    case 'i':
                        $zanoreCount++;
                        break;
                    case 'o':
                        $zanoreCount++;
                        break;
                    case 'u':
                        $zanoreCount++;
                        break;
                    case 'y':
                        $zanoreCount++;
                        break;
                    default:
                        $bashktinglloreCount++;
                        break;
               }
           }
        };



       

        
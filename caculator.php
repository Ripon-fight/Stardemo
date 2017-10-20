<?php
/**
 * Created by PhpStorm.
 * User: xingwei
 * Date: 2017/10/20
 * Time: 下午6:54
 */

    $expression = htmlspecialchars($_GET['expression']);
    $operation = strpbrk($expression,"+-*/");
    if($operation != ''){$operation = substr($operation,0,1);}
    $expression = explode($operation,$expression,2);
    switch ($operation)
    {
        case '+':
            $result = $expression[0] + $expression[1];
            break;
        case '-':
            $result = $expression[0] - $expression[1];
            break;
        case '*':
            $result = $expression[0] * $expression[1];
            break;
        case '/':
            $result = $expression[0] / $expression[1];
            break;
        default:
            echo "ERROR!!!!!";
            break;
    }


    $resultfile = fopen("result.html","a") or die("Unable to open file!");
    fwrite($resultfile, "Expression: ".$expression[0].' '.$operation.' '.$expression[1]."<br>\n".
                                "Result: ".$result."<br>\n".
                                "Date: ".date("Y/m/d")."<br>\n------------------<br>\n");
    echo file_get_contents("result.html");
//    fclose($resultfile);




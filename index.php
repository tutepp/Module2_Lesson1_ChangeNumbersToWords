<!DOCTYPE HTML>
<html>
<head>
    <style>
        input[type=number] {
            width: 300px;
            font-size: 16px;
            border: 2px solid #ccc;
            border-radius: 4px;
            padding: 12px 10px 12px 10px;
        }
        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }
    </style>
</head>
<body>
<?php

    function changeNumber1($number)
    {
        $array1 = ["zero", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten"];
        return $array1[$number];
    }

    function changeNumber2($number) {
        $array2 = [10 => "ten", 11 => "eleven", 12 => "twelve", 13 => "thirteen", 14 => "fourteen", 15 => "fifteen",
            16 => "sixteen", 17 => "seventeen", 18 => "eighteen", 19 => "nineteen", 20 => "twenty"];
        $array3 = [2 => "twenty", 3 => "thirty", 4 => "fourty", 5 => "fifty", 6 => "sixty", 7 => "seventy", 8 => "eighty",
            9 => "ninety"];
        if ($number <= 20) {
            return $array2[$number];
        } else {
            if ($number[1] == 0) {
                return $array3[$number[0]];
            }
            return $array3[$number[0]] . " " . changeNumber1($number[1]);
        }
    }
    function changeNumber3($number)
    {
        if ($number % 100 == 0) {
            return changeNumber1($number[0]) . "" . "hundered";
        }
            if ($number[1] == 0) {
                return changeNumber1($number[0]) . " " . "hundered" ." ". "and". " " . changeNumber1($number[2]);
                } else
                    return changeNumber1($number[0]) . " " . "hundered" . " " . changeNumber2($number[1].$number[2]);
        }

    function changeToWord($number)
    {
        $result = "";
        $number = (string)intval($number);
        switch (strlen($number)) {
            case 1:
                $result = changeNumber1($number);
                break;
            case 2:
                $result = changeNumber2($number);
                break;
            case 3:
                $result = changeNumber3($number);
                break;
            default:
                $result = "Change fail";
        }
                 return $result;
    }
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $number = $_POST['number'];;
    $submit = $_POST['submit'];
    if (isset($submit)) {
        echo(changeToWord($number));
    }
}
?>
<form method="post">
    <input type="number" id="num" name="number" placeholder="Nhap so cua ban">
    <button type="submit" name="submit" id="submit">Check</button>
</form>

</body>
</html>

<?php
namespace Easytool\PhpHandle;

class ConvertHandle
{
    /**
     * 通过身份号获取性别
     * @param $idCard:身份证号
     * @return int
     */
    public function getSexByIdCard($idCard)
    {
        $sex = substr($idCard,16,1);
        return $sex % 2 === 0 ? 1 : 2;
    }

    /**
     * 通过身份证获取生肖
     * @param $idCard:身份证号
     * @return string
     */
    public function getSXbyIdCard($idCard)
    {
        $start = 1901;
        $end = substr($idCard,6,4);
        $x = ($start - $end) % 12;
        $value = "";
        if($x == 1 || $x == -11){$value = "鼠";}
        if($x == 0) {$value = "牛";}
        if($x == 11 || $x == -1){$value = "虎";}
        if($x == 10 || $x == -2){$value = "兔";}
        if($x == 9 || $x == -3){$value = "龙";}
        if($x == 8 || $x == -4){$value = "蛇";}
        if($x == 7 || $x == -5){$value = "马";}
        if($x == 6 || $x == -6){$value = "羊";}
        if($x == 5 || $x == -7){$value = "猴";}
        if($x == 4 || $x == -8){$value = "鸡";}
        if($x == 3 || $x == -9){$value = "狗";}
        if($x == 2 || $x == -10){$value = "猪";}
        return $value;
    }
}
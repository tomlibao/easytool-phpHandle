<?php
namespace Easytool\PhpHandle;

class ConvertHandle
{
    /**
     * ͨ����ݺŻ�ȡ�Ա�
     * @param $idCard:���֤��
     * @return int
     */
    public function getSexByIdCard($idCard)
    {
        $sex = substr($idCard,16,1);
        return $sex % 2 === 0 ? 1 : 2;
    }

    /**
     * ͨ�����֤��ȡ��Ф
     * @param $idCard:���֤��
     * @return string
     */
    public function getSXbyIdCard($idCard)
    {
        $start = 1901;
        $end = substr($idCard,6,4);
        $x = ($start - $end) % 12;
        $value = "";
        if($x == 1 || $x == -11){$value = "��";}
        if($x == 0) {$value = "ţ";}
        if($x == 11 || $x == -1){$value = "��";}
        if($x == 10 || $x == -2){$value = "��";}
        if($x == 9 || $x == -3){$value = "��";}
        if($x == 8 || $x == -4){$value = "��";}
        if($x == 7 || $x == -5){$value = "��";}
        if($x == 6 || $x == -6){$value = "��";}
        if($x == 5 || $x == -7){$value = "��";}
        if($x == 4 || $x == -8){$value = "��";}
        if($x == 3 || $x == -9){$value = "��";}
        if($x == 2 || $x == -10){$value = "��";}
        return $value;
    }
}
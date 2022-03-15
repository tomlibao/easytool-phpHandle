<?php
namespace Easytool\PhpHandle;

class ArrayHandle
{
    /**
     * ���ܣ�������Ҷ�ά���飨ԭ�е�key���䣩
     * @author tomluckin
     * @param $doubleArray:��ά����
     * @return array|mixed
     */
    public function shuffleDoubleArray($doubleArray)
    {
        if (!is_array($doubleArray)) {
            return $doubleArray;
        }
        $keys = array_keys($doubleArray);
        shuffle($keys);
        $random = array();
        foreach ($keys as $key) {
            $random[$key] = $doubleArray[$key];
        }
        return $random;
    }

    /**
     * ���ܣ��Զ�ά�����ĳ���н��� ����������
     * @author tomluckin
     * @param $doubleArray:��ά����
     * @param $keys:��Ҫ��������� key
     * @param int $sort:����ʽ��Ĭ�� SORT_DESC����SORT_ASC����С��������SORT_DESC���Ӵ�С����
     * @return mixed
     */
    public function arraySort($doubleArray, $keys, $sort = SORT_DESC)
    {
        $keysValue = [];
        foreach ($doubleArray as $k => $v) {
            $keysValue[$k] = $v[$keys];
        }
        array_multisort($keysValue, $sort, $doubleArray);
        return $doubleArray;
    }

    /**
     * ��ȡ����ĳһ�У���ֵ�У����ܺ�
     * @author tomluckin
     * @param $doubleArray
     * @param $field
     * @return float|int
     */
    public function getArrFieldSum($doubleArray, $field)
    {
        $array = array_column($doubleArray, 'price');
        return array_sum($array);
    }

}
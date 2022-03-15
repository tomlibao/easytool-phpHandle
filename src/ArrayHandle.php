<?php
namespace Easytool\PhpHandle;

class ArrayHandle
{
    /**
     * 功能：随机打乱多维数组（原有的key不变）
     * @author tomluckin
     * @param $doubleArray:多维数组
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
     * 功能：对二维数组的某个列进行 正倒序排列
     * @author tomluckin
     * @param $doubleArray:二维数组
     * @param $keys:需要进行排序的 key
     * @param int $sort:排序方式（默认 SORT_DESC），SORT_ASC：从小到大正序，SORT_DESC：从大到小倒叙
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
     * 获取数组某一列（数值列）的总和
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
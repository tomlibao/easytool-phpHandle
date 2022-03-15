<?php
namespace Easytool\PhpHandle;

class StringHandle
{
    /**
     * 功能：判断一个字符串是否包含某些字符
     * @author tomluckin
     * @param $string:完整的字符串
     * @param $content:字符串内容
     * @return bool
     */
    public function isContain($string, $content)
    {
        if (strpos($string, $content) !== false){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 功能：判断一个字符串是否全部都是中文
     * @param $string:目标字符串
     * @return bool
     */
    public function isAllContainChinese($string)
    {
        if (preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $string)>0){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 功能：判断字符串中是否包含中文
     * @param $string:目标字符串
     * @return bool
     */
    public function isContainChinese($string)
    {
        if (preg_match("/[\x7f-\xff]/", $string)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 功能：是否包含合法字符串（数字、字母、下划线）
     * @param $string:目标字符串
     * @return bool
     */
    public function isLegalString($string)
    {
        if (preg_match('/^[A-Za-z0-9_]+$/u',$string)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 功能：获取指定长度的随机字符串
     * @param $length:要获取的字符串的长度
     * @return string
     */
    public function getRandStrByLength($length)
    {
        $str =  sprintf(
                '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff)
            ).sprintf(
                '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0x0fff) | 0x4000,
                mt_rand(0, 0x3fff) | 0x8000,
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff),
                mt_rand(0, 0xffff));
        $str = str_replace('-','',$str);
        return mb_substr($str,0,$length);
    }

    /**
     * 功能：去除数字字符串中的前导 0
     * @param $string:目标字符串
     * @return string
     */
    public function getRemoveHeadZero($string)
    {
        return ltrim($string, '0');
    }
}
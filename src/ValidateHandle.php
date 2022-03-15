<?php
namespace Easytool\PhpHandle;

class ValidateHandle
{
    /**
     * 验证手机号是否合法
     * @param $phone:手机号
     * @return bool
     */
    public function isLegalPhone($phone)
    {
        if(!preg_match("/^1[345678]{1}\d{9}$/",$phone))
        {
            return false;
        }
        return true;
    }

    /**
     * 验证邮箱是否合法
     * @param $email:邮箱地址
     * @return bool
     */
    public function isLegalMail($email)
    {
        $para = "/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*\.)+[a-zA-Z]*)$/u";
        if(preg_match($para, $email)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * 验证固定电话是否合法
     * @param $telePhone:固定电话
     * @return bool
     */
    public function isLegalTelephone($telePhone)
    {
        if (!preg_match("/^([0-9]{3,4}-)?[0-9]{7,8}$/", $telePhone))
        {
            return false;
        }
        return true;
    }



}
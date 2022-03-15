# 关于该组件

这是一个PHP常用字符串操作、数组操作、常规验证、业务常用转化的组件，里面提供了很多业务中能使用到的场景。

# 使用

`composer require easytool/php-handle`

# 功能简介

## 一、php常用字符串操作

### 1.1 判断一个字符串是否包含某些字符

包含的话则返回true，不包含的话则返回false。

```php
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\StringHandle();
$res1 = $obj->isContain('hello world', 'llo');
$res2 = $obj->isContain('hello world', 'haha');
var_dump($res1);
var_dump($res2);
```
输出：

```text 
bool(true)
bool(false)
```

### 1.2 判断一个字符串是否全部都是中文

全部是中文则返回true，否则返回false。

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\StringHandle();
$res1 = $obj->isAllContainChinese('我爱你中国');
$res2 = $obj->isAllContainChinese('我爱你，中国');
var_dump($res1);
var_dump($res2);
```

输出：

```text
bool(true)
bool(false)
```

### 1.3 判断字符串中是否包含中文

包含中文则返回true，不包含中文则返回false。

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\StringHandle();
$res1 = $obj->isContainChinese('hello');
$res2 = $obj->isContainChinese('hello啊');
var_dump($res1);
var_dump($res2);
```

输出：

```text 
bool(false)
bool(true)
```

### 1.4 是否包含合法字符串（数字、字母、下划线）

合法则返回true，不合法则返回false。

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\StringHandle();
$res1 = $obj->isLegalString('hello_123');
$res2 = $obj->isLegalString('hello_123_%#');
var_dump($res1);
var_dump($res2);
```

输出：

```text
bool(true)
bool(false)
```

### 1.5 获取指定长度的随机字符串

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\StringHandle();
$res1 = $obj->getRandStrByLength(10);
$res2 = $obj->getRandStrByLength(8);
var_dump($res1);
var_dump($res2);
```

输出：

```text
string(10) "9d7dd5a08c"
string(8) "9a94a08d"
```

### 1.6 去除数字字符串中的前导 0

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\StringHandle();

$res1 = $obj->getRemoveHeadZero('008812');
$res2 = $obj->getRemoveHeadZero('00101');
var_dump($res1);
var_dump($res2);
```
输出：

```text
string(4) "8812"
string(3) "101"
```



## 二、php常用数组操作

### 2.1 随机打乱多维数组（原有的key不变）

示例：

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\ArrayHandle();

$towArr = [
    '0' => [
        'name' => '沪上阿姨',
        'price' => '15',
        'course' => [
            '语文','数学','英语'
        ]
    ],
    '1' => [
        'name' => '阿水大杯茶',
        'price' => '12',
        'course' => [
            '地理','历史','政治'
        ]
    ],
    '2' => [
        'name' => '蜜雪冰城',
        'price' => '10',
        'course' => [
            '生物','化学','物理'
        ]
    ],
    '3' => [
        'name' => '张亮麻辣烫',
        'price' => '9',
        'course' => [
            '体育','音乐','美术'
        ]
    ],
];
$res1 = $obj->shuffleDoubleArray($towArr);
print_r($res1);
```

输出：

```php 
Array
(
    [1] => Array
        (
            [name] => 阿水大杯茶
            [price] => 12
            [course] => Array
                (
                    [0] => 地理
                    [1] => 历史
                    [2] => 政治
                )

        )

    [0] => Array
        (
            [name] => 沪上阿姨
            [price] => 15
            [course] => Array
                (
                    [0] => 语文
                    [1] => 数学
                    [2] => 英语
                )

        )

    [2] => Array
        (
            [name] => 蜜雪冰城
            [price] => 10
            [course] => Array
                (
                    [0] => 生物
                    [1] => 化学
                    [2] => 物理
                )

        )

    [3] => Array
        (
            [name] => 张亮麻辣烫
            [price] => 9
            [course] => Array
                (
                    [0] => 体育
                    [1] => 音乐
                    [2] => 美术
                )

        )

)
```

PS：这个操作只会随机调整多维数组顺序，原有的 key 不变，如果想要重新整合 key（从0开始排列）就 array_value 一下即可。

### 2.2 对二维数组的某个列进行 正倒序排列

示例：

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\ArrayHandle();

$towArr = [
    '0' => [
        'name' => '沪上阿姨',
        'price' => '15',
        'course' => [
            '语文','数学','英语'
        ]
    ],
    '1' => [
        'name' => '阿水大杯茶',
        'price' => '12',
        'course' => [
            '地理','历史','政治'
        ]
    ],
    '2' => [
        'name' => '蜜雪冰城',
        'price' => '10',
        'course' => [
            '生物','化学','物理'
        ]
    ],
    '3' => [
        'name' => '张亮麻辣烫',
        'price' => '9',
        'course' => [
            '体育','音乐','美术'
        ]
    ],
];

$res1 = $obj->arraySort($towArr, 'price', SORT_DESC);

print_r($res1);
```

输出：

```php 
Array
(
    [0] => Array
        (
            [name] => 沪上阿姨
            [price] => 15
            [course] => Array
                (
                    [0] => 语文
                    [1] => 数学
                    [2] => 英语
                )

        )

    [1] => Array
        (
            [name] => 阿水大杯茶
            [price] => 12
            [course] => Array
                (
                    [0] => 地理
                    [1] => 历史
                    [2] => 政治
                )

        )

    [2] => Array
        (
            [name] => 蜜雪冰城
            [price] => 10
            [course] => Array
                (
                    [0] => 生物
                    [1] => 化学
                    [2] => 物理
                )

        )

    [3] => Array
        (
            [name] => 张亮麻辣烫
            [price] => 9
            [course] => Array
                (
                    [0] => 体育
                    [1] => 音乐
                    [2] => 美术
                )

        )

)
```

### 2.3 获取二维数组某一数值列的总和

示例：

```php 
<?php
require "vendor/autoload.php";

$obj = new \Easytool\PhpHandle\ArrayHandle();

$towArr = [
    '0' => [
        'name' => '沪上阿姨',
        'price' => '15',
        'course' => [
            '语文','数学','英语'
        ]
    ],
    '1' => [
        'name' => '阿水大杯茶',
        'price' => '12',
        'course' => [
            '地理','历史','政治'
        ]
    ],
    '2' => [
        'name' => '蜜雪冰城',
        'price' => '10',
        'course' => [
            '生物','化学','物理'
        ]
    ],
    '3' => [
        'name' => '张亮麻辣烫',
        'price' => '9',
        'course' => [
            '体育','音乐','美术'
        ]
    ],
];

$res1 = $obj->getArrFieldSum($towArr, 'price');

print_r($res1);
```

输出：

```php 
46
```

## 三、php常用验证




## 四、php常用转化

### 4.1 通过身份证号获取性别

女性返回1，男性返回2

```php 
<?php
require "vendor/autoload.php";

$convertObj = new \Easytool\PhpHandle\ConvertHandle();
//$stringObj = new \Easytool\PhpHandle\StringHandle();
//$arrayObj = new \Easytool\PhpHandle\ArrayHandle();
//$validateObj = new \Easytool\PhpHandle\ValidateHandle();

print_r($convertObj->getSexByIdCard('372922198712078787'));
```

输出：

```txt
1
```

### 4.2 通过身份证号获取生肖

```php
<?php
require "vendor/autoload.php";

$convertObj = new \Easytool\PhpHandle\ConvertHandle();
//$stringObj = new \Easytool\PhpHandle\StringHandle();
//$arrayObj = new \Easytool\PhpHandle\ArrayHandle();
//$validateObj = new \Easytool\PhpHandle\ValidateHandle();

print_r($convertObj->getSXbyIdCard('372922198712078787'));
```

输出：

```text
兔
```
<?php
/**
 * PHP Version 5
 *
 * @package
 * @author    "Yury Kozyrev" <urakozz@gmail.com>
 * @copyright 2015 "Yury Kozyrev"
 * @license   MIT
 * @link      https://github.com/urakozz/php-instagram-client
 */

namespace Kozz\Misc;


class DLC
{

    protected $rsa;

    public function __construct()
    {
        $this->rsa = new \Crypt_RSA();
    }

    public function encrypt($keyPath = "~/.ssh/id_rsa.pub"){
        $path = str_replace("~", getenv("HOME"), $keyPath);
        $this->rsa->loadKey(file_get_contents($path));
        file_put_contents(__DIR__."/DLCEnc.php.enc", $this->rsa->encrypt(file_get_contents(__DIR__."/DLCEnc.php")));
    }

    public function decrypt($keyPath)
    {
        $path = str_replace("~", getenv("HOME"), $keyPath);
        $this->rsa->loadKey(file_get_contents($path));
        $content = $this->rsa->decrypt(file_get_contents(__DIR__."/DLCEnc.php.enc"));
//        var_dump($content);
//        file_put_contents(__DIR__."/DLCEnc.php", $content);
    }


}
<?php

class Captcha
{
private $width;
private $height;
private $linenum;
private $stringnum;
private $pixelnum;
private $string;
    public function __construct()
    {
        $this->initParams();
    }

    private function initParams()
    {
        $this->width = isset($GLOBALS['conf']['Captcha']['width'])? $GLOBALS['conf']['Captcha']['width'] : 80 ;
        $this->height =isset($GLOBALS['conf']['Captcha']['height'])?$GLOBALS['conf']['Captcha']['height']:32 ;
        $this->linenum =isset($GLOBALS['conf']['Captcha']['linenum'])? $GLOBALS['conf']['Captcha']['linenum']: 3 ;
        $this->stringnum =isset($GLOBALS['conf']['Captcha']['stringnum'])?$GLOBALS['conf']['Captcha']['stringnum']:2 ;
        $this->pixelnum =isset($GLOBALS['conf']['Captcha']['pixelnum'])?$GLOBALS['conf']['Captcha']['pixelnum']:0.03 ;
    }

    public function generate()
    {
        $img = imagecreatetruecolor($this->width, $this->height);
        $backcolor = imagecolorallocate($img, mt_rand(200, 255), mt_rand(150, 255), mt_rand(200, 255));
        imagefill($img, 0, 0, $backcolor);
        $this->string = $this->getString();
        $span = floor($this->width / ($this->stringnum + 1));
        for ($i = 1; $i <= $this->stringnum; $i++) {
            $stringcolor = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 100), mt_rand(0, 80));
            imagestring($img, 3, $i * $span, ($this->height / 2) - 8, $this->string[$i - 1], $stringcolor);
        }
        for ($i = 1; $i <= $this->linenum; $i++) {
            $linecolor = imagecolorallocate($img, mt_rand(0, 150), mt_rand(30, 250), mt_rand(200, 255));
            $x1 = mt_rand(0, $this->width - 1);
            $y1 = mt_rand(0, $this->height - 1);
            $x2 = mt_rand(0, $this->width - 1);
            $y2 = mt_rand(0, $this->height - 1);
            imageline($img, $x1, $y1, $x2, $y2, $linecolor);
        }
        for ($i = 1; $i <= $this->width * $this->height * $this->pixelnum; $i++) {
            $pixelcolor = imagecolorallocate($img, mt_rand(100, 150), mt_rand(0, 120), mt_rand(0, 255));
            $x = mt_rand(0, $this->width - 1);
            $y = mt_rand(0, $this->height - 1);
            imagesetpixel($img, $x, $y, $pixelcolor);
        }

        header('content-type:image/png');
        ob_clean();
        imagepng($img);
        imagedestroy($img);
    }

    private
    function getString()
    {
        $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));
        shuffle($arr);
        $rand_keys = array_rand($arr, $this->stringnum);
        $str = '';
        foreach ($rand_keys as $value) {
            $str .= $arr[$value];
        }
        @session_start();
        $_SESSION['captcha'] = $str;
        return $str;
    }

    public function checkCaptcha($passcode)
    {
        @session_start();
        if (strtolower($_SESSION['captcha']) === strtolower($passcode)) {
            return true;
        } else {
            return false;
        }
    }
}

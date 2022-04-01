<?php session_start(); ?>
<?php
class Captcha{
    protected string $font="https://fonts.gstatic.com/s/acme/v17/RrQfboBx-C5_bx0.ttf";
    protected int $captchaLen=6;
    protected int $fontSize=25;
    protected ?string $captchaCode=null;

    /**
     * @return string|null
     */
    public function getCaptchaCode(): ?string
    {
        return $this->captchaCode;
    }

    public function __construct()
    {
        $this->captchaCode=strtoupper(substr(sha1(random_bytes(64)),rand(1,25),$this->captchaLen));
    }

    public  function captchaControl($width,$height,$fontSize=null,$length=null,$fontFile=null)
    {
        $fontFile= $fontFile ?? $this->font;
        $length=$length ?? $this->captchaLen;
        $fontSize=$fontSize ?? $this->fontSize;
        $fontFileName=$fontFile;
        //Check if $fontFile is URL or a file
        if (filter_var($fontFile,FILTER_VALIDATE_URL)){
            $font = file_get_contents($fontFile);
            $fontFileName="font.ttf";
            file_put_contents("font.ttf", $font);
        }
        $image = imagecreatetruecolor($width, $height);
        imageantialias($image, true);
        imagealphablending($image,true);
        $colors = [];
        //Color ranges
        $red = rand(125, 175);
        $green = rand(125, 175);
        $blue = rand(125, 175);
        //Text colors
        $black = imagecolorallocate($image, 35, 35, 35);
        $white = imagecolorallocate($image, 220, 220, 220);
        $textColors = [$black, $white];
        for($i = 0; $i < 5; $i++) {
            $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
        }
        imagefill($image, 0, 0, $colors[0]);
        for($i = 0; $i < 15; $i++) {
            imagesetthickness($image, rand(2, 10));
            $rect_color = $colors[rand(1, 4)];
            imagerectangle($image, rand(-10, $width), rand(-10, $width), rand(-10, $width), 10, $rect_color);
        }
        $initial = 15;
        $letter_space = $fontSize-10;
        $randPosition=rand($initial,$width-($letter_space*$length));
        for($i = 0; $i < $length; $i++) {
            imagettftext($image, $fontSize, rand(-15, 15), $randPosition + $i*$letter_space, rand($height/2-5,$height/2+10), $textColors[rand(0, 1)], __DIR__."/$fontFileName", $this->captchaCode[$i]);
        }
        imagejpeg($image,null,100);
        imagedestroy($image);
    }
    //Check if the *captcha* session value equal to the value entered by the user
    public static function checkCaptcha($input): bool
    {
        return strtolower($_SESSION['captcha'])==strtolower($input);
    }
}

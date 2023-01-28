<?php

class RGB
{
    private $red = 0;
    private $green = 0;
    private $blue = 0;

    public function __construct($red, $green, $blue)
    {
        if (!$this->isValid($red) || !$this->isValid($green) || !$this->isValid($blue))
            throw new Exception("Color not valid");

        $this->setColor($red,$green,$blue);
    }

    private function setColor($red, $green, $blue)
    {
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    private function isValid($number): bool
    {
        if (0 <= $number && $number <= 255)
            return true;
        return false;
    }

    public function mixColor(RGB $rgb)
    {
        $this->red = ($this->red + $rgb->getRed()) / 2;
        $this->green = ($this->green + $rgb->getGreen()) / 2;
        $this->blue = ($this->blue + $rgb->getBlue()) / 2;
    }

    public function getRed()
    {
        return $this->red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

}

try {
    $rgb = new RGB(255, 200  , 0);

    $rgb->mixColor((new RGB(255, 100, 255)));

} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<body style="background: rgb(<?php echo $rgb->getRed() ?>,<?php echo $rgb->getGreen() ?>,<?php echo $rgb->getBlue() ?>)">

</body>

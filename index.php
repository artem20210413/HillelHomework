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

        $this->setColor($this->red, $red)->setColor($this->green, $green)->setColor($this->blue, $blue);

    }

    public function mixColor(RGB $rgb)
    {
        $this->red = ($this->red + $rgb->red) / 2;
        $this->green = ($this->green + $rgb->green) / 2;
        $this->blue = ($this->blue + $rgb->blue) / 2;
    }

    private function setColor(&$number, $newNumber): self
    {
        $number = $newNumber;
        return $this;
    }

    private function isValid($number): bool
    {
        if (0 <= $number && $number <= 255)
            return true;
        return false;
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

    echo $rgb->getRed() . "<br>";
    echo $rgb->getGreen() . "<br>";
    echo $rgb->getBlue() . "<br>";

    echo "-----mixColor()-----<br>";
    $rgb->mixColor((new RGB(255, 100, 50)));

    echo $rgb->getRed() . "<br>";
    echo $rgb->getGreen() . "<br>";
    echo $rgb->getBlue() . "<br>";
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<body style="background: rgb(<?php echo $rgb->getRed() ?>,<?php echo $rgb->getGreen() ?>,<?php echo $rgb->getBlue() ?>)">

</body>

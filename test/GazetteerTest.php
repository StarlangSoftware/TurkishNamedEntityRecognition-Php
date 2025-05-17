<?php

use olcaytaner\NamedEntityRecognition\Gazetteer;
use PHPUnit\Framework\TestCase;

class GazetteerTest extends TestCase
{
    public function testContains(): void
    {
        $gazetteer = new Gazetteer("location", "../gazetteer-location.txt");
        $this->assertTrue($gazetteer->contains("bağdat"));
        $this->assertTrue($gazetteer->contains("BAĞDAT"));
        $this->assertTrue($gazetteer->contains("belçika"));
        $this->assertTrue($gazetteer->contains("körfez"));
        $this->assertTrue($gazetteer->contains("KÖRFEZ"));
        $this->assertTrue($gazetteer->contains("küba"));
        $this->assertTrue($gazetteer->contains("KÜBA"));
        $this->assertTrue($gazetteer->contains("varşova"));
        $this->assertTrue($gazetteer->contains("VARŞOVA"));
        $this->assertTrue($gazetteer->contains("krallık"));
        $this->assertTrue($gazetteer->contains("berlin"));
        $this->assertTrue($gazetteer->contains("BERLİN"));
        $this->assertTrue($gazetteer->contains("BELÇİKA"));
        $this->assertTrue($gazetteer->contains("KRALLIK"));
    }
}
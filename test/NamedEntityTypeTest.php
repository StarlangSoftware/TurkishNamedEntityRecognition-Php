<?php

use olcaytaner\NamedEntityRecognition\NamedEntityType;
use olcaytaner\NamedEntityRecognition\NamedEntityTypeStatic;
use PHPUnit\Framework\TestCase;

class NamedEntityTypeTest extends TestCase
{
    public function testNamedEntityType(): void{
        $this->assertEquals(NamedEntityTypeStatic::getNamedEntityType("person"), NamedEntityType::PERSON);
        $this->assertEquals(NamedEntityTypeStatic::getNamedEntityType("Time"), NamedEntityType::TIME);
        $this->assertEquals(NamedEntityTypeStatic::getNamedEntityType("location"), NamedEntityType::LOCATION);
    }
}
<?php

use olcaytaner\NamedEntityRecognition\Slot;
use olcaytaner\NamedEntityRecognition\SlotType;
use PHPUnit\Framework\TestCase;

class SlotTest extends TestCase
{
    public function testSlot(): void
    {
        $slot1 = new Slot("B-depart_date.month_name");
        $this->assertEquals(SlotType::B, $slot1->getType());
        $this->assertEquals("depart_date.month_name", $slot1->getTag());
        $this->assertEquals("B-depart_date.month_name", $slot1->__toString());
        $slot2 = new Slot("O");
        $this->assertEquals(SlotType::O, $slot2->getType());
        $this->assertEquals("O", $slot2->__toString());
        $slot3 = new Slot("I-round_trip");
        $this->assertEquals(SlotType::I, $slot3->getType());
        $this->assertEquals("round_trip", $slot3->getTag());
        $this->assertEquals("I-round_trip", $slot3->__toString());
    }
}
<?php

namespace olcaytaner\NamedEntityRecognition;

class Slot
{
    private SlotType $type;
    private ?string $tag;

    /**
     * Constructor for the Slot object. Slot object stores the information about more specific entities. The slot
     * type represents the beginning, inside or outside the slot, whereas tag represents the entity tag of the
     * slot.
     * @param SlotType $type Type of the slot. B, I or O for beginning, inside, outside the slot respectively.
     * @param string $tag Tag of the slot.
     */
    private function constructor1(SlotType $type, string $tag): void
    {
        $this->type = $type;
        $this->tag = $tag;
    }

    /**
     * Second constructor of the slot for a given slot string. A Slot string consists of slot type and slot tag
     * separated with '-'. For example B-Person represents the beginning of a person. For outside tagging simple 'O' is
     * used.
     * @param string $slot Input slot string.
     */
    private function constructor2(string $slot): void
    {
        if ($slot == "O") {
            $this->type = SlotType::O;
            $this->tag = null;
        } else {
            $type = substr($slot, 0, strpos($slot, "-"));
            $tag = substr($slot, strpos($slot, "-") + 1);
            switch ($type) {
                case "B":
                    $this->type = SlotType::B;
                    break;
                case "I":
                    $this->type = SlotType::I;
                    break;
            }
            $this->tag = $tag;
        }
    }

    public function __construct($typeOrSlot, ?string $tag = null)
    {
        if ($tag != null) {
            $this->constructor1($typeOrSlot, $tag);
        } else {
            $this->constructor2($typeOrSlot);
        }
    }

    /**
     * Accessor for the type of the slot.
     * @return SlotType Type of the slot.
     */
    public function getType(): SlotType
    {
        return $this->type;
    }

    /**
     * Accessor for the tag of the slot.
     * @return string|null Tag of the slot.
     */
    public function getTag(): ?string
    {
        return $this->tag;
    }

    /**
     * toString method of the slot.
     * @return string Type and tag separated with '-'. If the type is outside, it returns 'O'.
     */
    public function __toString(): string
    {
        switch ($this->type) {
            case SlotType::B:
                return "B-" . $this->tag;
            case SlotType::I:
                return "I-" . $this->tag;
            case SlotType::O:
                return "O";
        }
    }
}
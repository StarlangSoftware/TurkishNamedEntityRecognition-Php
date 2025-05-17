<?php

namespace olcaytaner\NamedEntityRecognition;

use olcaytaner\Dictionary\Dictionary\Word;

class NamedEntityWord extends Word
{
    private NamedEntityType $namedEntityType;

    /**
     * A constructor of {@link NamedEntityWord} which takes name and nameEntityType as input and sets the corresponding attributes
     * @param string $name Name of the word
     * @param NamedEntityType $namedEntityType {@link NamedEntityType} of the word
     */
    public function __construct(string $name, NamedEntityType $namedEntityType){
        parent::__construct($name);
        $this->namedEntityType = $namedEntityType;
    }

    /**
     * Accessor method for namedEntityType attribute.
     *
     * @return NamedEntityType namedEntityType of the word.
     */
    public function getNamedEntityType(): NamedEntityType
    {
        return $this->namedEntityType;
    }
}
<?php

use olcaytaner\DataStructure\CounterHashMap;
use olcaytaner\NamedEntityRecognition\NamedEntityTypeStatic;
use olcaytaner\NamedEntityRecognition\NERCorpus;
use PHPUnit\Framework\TestCase;

class NERCorpusTest extends TestCase
{
    public function testNERCorpus(): void
    {
        $nerCorpus = new NERCorpus("../nerdata.txt");
        $this->assertEquals(27556, $nerCorpus->sentenceCount());
        $this->assertEquals(492233, $nerCorpus->numberOfWords());
        $counter = new CounterHashMap();
        for ($i = 0; $i < $nerCorpus->sentenceCount(); $i++) {
            $namedEntitySentence = $nerCorpus->getSentence($i);
            for ($j = 0; $j < $namedEntitySentence->wordCount(); $j++) {
                $namedEntityWord = $namedEntitySentence->getWord($j);
                $counter->put(NamedEntityTypeStatic::getNamedEntity($namedEntityWord->getNamedEntityType()));
            }
        }
        $this->assertEquals(438980, $counter->count("NONE"));
        $this->assertEquals(23874, $counter->count("PERSON"));
        $this->assertEquals(16931, $counter->count("ORGANIZATION"));
        $this->assertEquals(12448, $counter->count("LOCATION"));
    }
}
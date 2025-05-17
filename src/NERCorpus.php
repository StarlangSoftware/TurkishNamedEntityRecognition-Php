<?php

namespace olcaytaner\NamedEntityRecognition;

use olcaytaner\Corpus\Corpus;
use olcaytaner\Corpus\Sentence;

class NERCorpus extends Corpus
{
    /**
     * Another constructor of {@link NERCorpus} which takes a fileName of the corpus as an input, reads the
     * corpus from that file.
     *
     * @param string|null $fileName Name of the corpus file.
     */
    public function __construct(?string $fileName = null){
        parent::__construct();
        if (null !== $fileName) {
            $data = file_get_contents($fileName);
            $lines = explode("\n", $data);
            foreach ($lines as $line) {
                $this->addSentence(new NamedEntitySentence(trim($line)));
            }
        }
    }

    /**
     * addSentence adds a new sentence to the sentences {@link Array}
     * @param Sentence $sentence Sentence to be added.
     */
    public function addSentence(Sentence $sentence): void
    {
        $this->sentences[] = $sentence;
    }
}
<?php

namespace olcaytaner\NamedEntityRecognition;

class Gazetteer
{
    private array $data = [];
    private string $name;

    /**
     * A constructor for a specific gazetteer. The constructor takes name of the gazetteer and file name of the
     * gazetteer as input, reads the gazetteer from the input file.
     * @param string $name Name of the gazetteer. This name will be used in programming to separate different gazetteers.
     * @param string $fileName File name of the gazetteer data.
     */
    public function __construct(string $name, string $fileName)
    {
        $this->name = $name;
        $data = file_get_contents($fileName);
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $this->data[mb_strtolower(trim($line), 'utf-8')] = "1";
        }
    }

    /**
     * Accessor method for the name of the gazetteer.
     * @return string Name of the gazetteer.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * The most important method in {@link Gazetteer} class. Checks if the given word exists in the gazetteer. The check
     * is done in lowercase form.
     * @param string $word Word to be search in Gazetteer.
     * @return bool True if the word is in the Gazetteer, False otherwise.
     */
    public function contains(string $word): bool
    {
        $lowerCase  = mb_strtolower($word, 'UTF-8');
        return isset($this->data[$lowerCase]);
    }
}
<?php

namespace olcaytaner\NamedEntityRecognition;

use olcaytaner\Corpus\Sentence;

class NamedEntitySentence extends Sentence
{
    /**
     * Another constructor of {@link NamedEntitySentence}. It takes input a named entity annotated sentence in string
     * form, divides the sentence with respect to space and sets the tagged words with respect to their tags.
     * @param string|null $sentence sentence Named Entity annotated sentence in string form
     */
    public function __construct(?string $sentence){
        parent::__construct();
        if (null !== $sentence) {
            $type = NamedEntityType::NONE;
            $wordArray = explode(" ", $sentence);
            foreach ($wordArray as $word) {
                if ($word != "") {
                    if ($word != "<b_enamex") {
                        if (str_starts_with($word, "TYPE=\"")){
                            $typeIndexEnd = strrpos($word, "\"", 6);
                            if ($typeIndexEnd !== false) {
                                $entityType = substr($word, 6, $typeIndexEnd - 6);
                                $type = NamedEntityTypeStatic::getNamedEntityType($entityType);
                            }
                            if (str_ends_with($word, "e_enamex>")){
                                $candidate = substr($word, strpos($word, ">") + 1, strpos($word, "<") - strpos($word, ">") - 1);
                                if ($candidate !== ""){
                                    $this->words[] = new NamedEntityWord($candidate, $type);
                                }
                                $type = NamedEntityType::NONE;
                            } else {
                                $candidate = substr($word, strpos($word, ">") + 1);
                                if ($candidate != ""){
                                    $this->words[] = new NamedEntityWord($candidate, $type);
                                }
                            }
                        } else {
                            if (str_ends_with($word, "e_enamex>")){
                                $candidate = substr($word, 0, strpos($word, "<"));
                                if ($candidate !== ""){
                                    $this->words[] = new NamedEntityWord($candidate, $type);
                                }
                                $type = NamedEntityType::NONE;
                            } else {
                                $this->words[] = new NamedEntityWord($word, $type);
                            }
                        }
                    }
                }
            }
        }
    }
}
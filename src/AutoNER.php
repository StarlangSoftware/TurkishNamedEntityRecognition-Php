<?php

namespace olcaytaner\NamedEntityRecognition;

abstract class AutoNER
{
    protected Gazetteer $personGazetteer;
    protected Gazetteer $organizationGazetteer;
    protected Gazetteer $locationGazetteer;

    /**
     * Constructor for creating Person, Organization, and Location gazetteers in automatic Named Entity Recognition.
     */
    public function __construct()
    {
        $this->personGazetteer = new Gazetteer("PERSON", "../gazetteer-person.txt");
        $this->organizationGazetteer = new Gazetteer("ORGANIZATION", "../gazetteer-organization.txt");
        $this->locationGazetteer = new Gazetteer("LOCATION", "../gazetteer-location.txt");
    }
}
<?php

namespace olcaytaner\NamedEntityRecognition;

enum NamedEntityType
{
    case NONE;
    case PERSON;
    case ORGANIZATION;
    case LOCATION;
    case TIME;
    case MONEY;
}
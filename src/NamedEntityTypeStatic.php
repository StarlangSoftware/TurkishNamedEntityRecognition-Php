<?php

namespace olcaytaner\NamedEntityRecognition;

class NamedEntityTypeStatic
{
    /**
     * Static function to convert a string entity type to {@link NamedEntityType} type.
     * @param string $entityType Entity type in string form
     * @return NamedEntityType Entity type in {@link NamedEntityType} form
     */
    static function getNamedEntityType(string $entityType): NamedEntityType
    {
        switch (mb_strtoupper($entityType, 'utf-8')) {
            case "PERSON":
                return NamedEntityType::PERSON;
            case "LOCATION":
                return NamedEntityType::LOCATION;
            case "ORGANIZATION":
                return NamedEntityType::ORGANIZATION;
            case "TIME":
                return NamedEntityType::TIME;
            case "MONEY":
                return NamedEntityType::MONEY;
            default:
                return NamedEntityType::NONE;
        }
    }

    /**
     * Static function to convert a {@link NamedEntityType} to string form.
     * @param NamedEntityType|null entityType Entity type in {@link NamedEntityType} form
     * @return string|null Entity type in string form
     */
    static function getNamedEntity(?NamedEntityType $entityType = null): ?string
    {
        if (null === $entityType) {
            return null;
        }
        switch ($entityType) {
            case NamedEntityType::PERSON:
                return "PERSON";
            case NamedEntityType::LOCATION:
                return "LOCATION";
            case NamedEntityType::ORGANIZATION:
                return "ORGANIZATION";
            case NamedEntityType::TIME:
                return "TIME";
            case NamedEntityType::MONEY:
                return "MONEY";
            default:
                return "NONE";
        }
    }
}
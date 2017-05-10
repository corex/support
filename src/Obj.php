<?php

namespace CoRex\Support;

use Exception;
use ReflectionClass;
use ReflectionProperty;

class Obj
{
    const PROPERTY_PRIVATE = ReflectionProperty::IS_PRIVATE;
    const PROPERTY_PROTECTED = ReflectionProperty::IS_PROTECTED;
    const PROPERTY_PUBLIC = ReflectionProperty::IS_PUBLIC;

    /**
     * Get private properties from object.
     *
     * @param integer $propertyType
     * @param object $object
     * @param string $className Default '' which means from object.
     * @return array
     */
    public static function getPropertiesFromObject($propertyType, $object, $className = '')
    {
        if ($className == '') {
            $className = get_class($object);
        }
        return self::getPropertiesFromStatic($propertyType, $className, $object);
    }

    /**
     * Get private properties from static class.
     *
     * @param integer $propertyType
     * @param string $className
     * @param object $object Default null which means new $className().
     * @return array
     */
    public static function getPropertiesFromStatic($propertyType, $className, $object = null)
    {
        $result = [];
        if ($object === null) {
            $object = new $className();
        }
        $reflectionClass = new ReflectionClass($className);
        $properties = $reflectionClass->getProperties($propertyType);
        if (count($properties) > 0) {
            foreach ($properties as $property) {
                $property->setAccessible(true);
                $result[$property->getName()] = $property->getValue($object);
            }
        }
        return $result;
    }

    /**
     * Get interfaces.
     *
     * @param object $object
     * @return array
     */
    public static function getInterfaces($object)
    {
        return class_implements(get_class($object));
    }

    /**
     * Has interface.
     *
     * @param object $object
     * @param string $interfaceClassName
     * @return boolean
     */
    public static function hasInterface($object, $interfaceClassName)
    {
        return in_array($interfaceClassName, self::getInterfaces($object));
    }

    /**
     * Set property.
     *
     * @param object $object
     * @param string $property
     * @param mixed $value
     * @param string $className Default null which means class from $object.
     * @return boolean
     * @throws Exception
     */
    public static function setProperty($object, $property, $value, $className = null)
    {
        if ($className === null) {
            $className = get_class($object);
        }
        $reflectionClass = new ReflectionClass($className);
        try {
            $property = $reflectionClass->getProperty($property);
            $property->setAccessible(true);
            $property->setValue($object, $value);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * Get property.
     *
     * @param object $object
     * @param string $property
     * @param mixed $defaultValue Default null.
     * @param string $className Default null.
     * @return mixed
     */
    public static function getProperty($object, $property, $defaultValue = null, $className = null)
    {
        if ($className === null) {
            $className = get_class($object);
        }
        $reflectionClass = new ReflectionClass($className);
        try {
            $property = $reflectionClass->getProperty($property);
            $property->setAccessible(true);
            return $property->getValue($object);
        } catch (Exception $e) {
            return $defaultValue;
        }
    }

    /**
     * Set properties.
     *
     * @param object $object
     * @param array $propertiesValues
     * @param string $className Default null which means class from $object.
     * @return boolean
     * @throws Exception
     */
    public static function setProperties($object, array $propertiesValues, $className = null)
    {
        if ($className === null) {
            $className = get_class($object);
        }

        $reflectionClass = new ReflectionClass($className);
        if (count($propertiesValues) == 0) {
            return false;
        }
        try {
            foreach ($propertiesValues as $property => $value) {
                $property = $reflectionClass->getProperty($property);
                $property->setAccessible(true);
                $property->setValue($object, $value);
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}
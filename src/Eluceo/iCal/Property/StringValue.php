<?php

namespace Eluceo\iCal\Property;

class StringValue implements ValueInterface
{
    /**
     * The value
     *
     * @var string
     */
    protected $value;

    function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Return the value of the Property as an escaped string.
     *
     * Escape values as per RFC 2445. See http://www.kanzaki.com/docs/ical/text.html
     *
     * @return string
     */
    public function getEscapedValue()
    {
        $value = (string)$this->value;

        $value = str_replace('\\', '\\\\', $value);
        $value = str_replace('"', '\\"', $value);
        $value = str_replace(',', '\\,', $value);
        $value = str_replace(';', '\\;', $value);
        $value = str_replace("\n", '\\n', $value);

        return $value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
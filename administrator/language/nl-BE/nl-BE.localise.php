<?php

defined('_JEXEC') or die;

abstract class Nl_BELocalise
{
    public static function getPluralSuffixes($count)
    {
        if($count == 0)
        {
            return array('0');
        } elseif($count == 1)
        {
            return array('1');
        } else
        {
            return array('MORE');
        }
    }

    public static function getIgnoredSearchWords()
    {
        return array('en', 'in', 'op', 'bij', 'van', 'door', 'met');
    }

    public static function getLowerLimitSearchWord()
    {
        return 3;
    }

    public static function getUpperLimitSearchWord()
    {
        return 20;
    }

    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
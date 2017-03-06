<?php

function ___($content)
{
    $parts = explode('.', $content);

    if (!is_array($parts)) {
        return $content;
    }

    $translation = \App\Models\Core\Translations::where('locale', '=', strtolower(Session::get('locale')))->where('group', '=', $parts[0])->where('key', '=', $parts[1])->first();

    if (is_null($translation)) {
        return $content;
    }

    return ucfirst($translation->value);
}

function __($content)
{
    $parts = explode('.', $content);

    if (!is_array($parts)) {
        return $content;
    }
    $translation = \App\Models\Core\Translations::where('locale', '=', strtolower(Session::get('locale')))->where('group', '=', $parts[0])->where('key', '=', $parts[1])->first();

    if (is_null($translation)) {
        return $content;
    }

    return $translation->value;
}

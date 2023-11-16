<?php

namespace Artcustomer\EdenAIClient\Enum;

/**
 * @author David
 */
class Provider
{

    public const AMAZON = 'amazon';
    public const ELEVENLABS = 'elevenlabs';
    public const GOOGLE = 'google';
    public const IBM = 'ibm';
    public const LOVOAI = 'lovoai';
    public const MICROSOFT = 'microsoft';

    public const PROVIDERS_LIST = [
        self::AMAZON,
        self::ELEVENLABS,
        self::GOOGLE,
        self::IBM,
        self::LOVOAI,
        self::MICROSOFT
    ];
}

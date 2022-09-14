<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a0f4451fb67b287fb39806f956f3f5d
{
    public static $files = array (
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TrueBV\\' => 7,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Spatie\\Fork\\' => 12,
        ),
        'L' => 
        array (
            'League\\Url\\' => 11,
        ),
        'I' => 
        array (
            'IPv4\\' => 5,
        ),
        'H' => 
        array (
            'Hightemp\\WappNetworkScanner\\' => 28,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TrueBV\\' => 
        array (
            0 => __DIR__ . '/..' . '/true/punycode/src',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Spatie\\Fork\\' => 
        array (
            0 => __DIR__ . '/..' . '/spatie/fork/src',
        ),
        'League\\Url\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/url/src',
        ),
        'IPv4\\' => 
        array (
            0 => __DIR__ . '/..' . '/markrogoyski/ipv4-subnet-calculator/src',
        ),
        'Hightemp\\WappNetworkScanner\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Hightemp\\WappNetworkScanner\\Scanner\\MultiProcessScanner' => __DIR__ . '/../..' . '/src/Scanner/MultiProcessScanner.php',
        'Hightemp\\WappNetworkScanner\\Scanner\\Scanner' => __DIR__ . '/../..' . '/src/Scanner/Scanner.php',
        'IPv4\\SubnetCalculator' => __DIR__ . '/..' . '/markrogoyski/ipv4-subnet-calculator/src/SubnetCalculator.php',
        'IPv4\\SubnetReport' => __DIR__ . '/..' . '/markrogoyski/ipv4-subnet-calculator/src/SubnetReport.php',
        'IPv4\\SubnetReportInterface' => __DIR__ . '/..' . '/markrogoyski/ipv4-subnet-calculator/src/SubnetReportInterface.php',
        'League\\Url\\AbstractUrl' => __DIR__ . '/..' . '/league/url/src/AbstractUrl.php',
        'League\\Url\\Components\\AbstractArray' => __DIR__ . '/..' . '/league/url/src/Components/AbstractArray.php',
        'League\\Url\\Components\\AbstractComponent' => __DIR__ . '/..' . '/league/url/src/Components/AbstractComponent.php',
        'League\\Url\\Components\\AbstractSegment' => __DIR__ . '/..' . '/league/url/src/Components/AbstractSegment.php',
        'League\\Url\\Components\\ComponentArrayInterface' => __DIR__ . '/..' . '/league/url/src/Components/ComponentArrayInterface.php',
        'League\\Url\\Components\\ComponentInterface' => __DIR__ . '/..' . '/league/url/src/Components/ComponentInterface.php',
        'League\\Url\\Components\\Fragment' => __DIR__ . '/..' . '/league/url/src/Components/Fragment.php',
        'League\\Url\\Components\\Host' => __DIR__ . '/..' . '/league/url/src/Components/Host.php',
        'League\\Url\\Components\\HostInterface' => __DIR__ . '/..' . '/league/url/src/Components/HostInterface.php',
        'League\\Url\\Components\\Pass' => __DIR__ . '/..' . '/league/url/src/Components/Pass.php',
        'League\\Url\\Components\\Path' => __DIR__ . '/..' . '/league/url/src/Components/Path.php',
        'League\\Url\\Components\\PathInterface' => __DIR__ . '/..' . '/league/url/src/Components/PathInterface.php',
        'League\\Url\\Components\\Port' => __DIR__ . '/..' . '/league/url/src/Components/Port.php',
        'League\\Url\\Components\\Query' => __DIR__ . '/..' . '/league/url/src/Components/Query.php',
        'League\\Url\\Components\\QueryInterface' => __DIR__ . '/..' . '/league/url/src/Components/QueryInterface.php',
        'League\\Url\\Components\\Scheme' => __DIR__ . '/..' . '/league/url/src/Components/Scheme.php',
        'League\\Url\\Components\\SegmentInterface' => __DIR__ . '/..' . '/league/url/src/Components/SegmentInterface.php',
        'League\\Url\\Components\\User' => __DIR__ . '/..' . '/league/url/src/Components/User.php',
        'League\\Url\\Url' => __DIR__ . '/..' . '/league/url/src/Url.php',
        'League\\Url\\UrlConstants' => __DIR__ . '/..' . '/league/url/src/UrlConstants.php',
        'League\\Url\\UrlImmutable' => __DIR__ . '/..' . '/league/url/src/UrlImmutable.php',
        'League\\Url\\UrlInterface' => __DIR__ . '/..' . '/league/url/src/UrlInterface.php',
        'Spatie\\Fork\\Connection' => __DIR__ . '/..' . '/spatie/fork/src/Connection.php',
        'Spatie\\Fork\\Exceptions\\CouldNotManageTask' => __DIR__ . '/..' . '/spatie/fork/src/Exceptions/CouldNotManageTask.php',
        'Spatie\\Fork\\Fork' => __DIR__ . '/..' . '/spatie/fork/src/Fork.php',
        'Spatie\\Fork\\Task' => __DIR__ . '/..' . '/spatie/fork/src/Task.php',
        'Symfony\\Polyfill\\Mbstring\\Mbstring' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/Mbstring.php',
        'TrueBV\\Exception\\DomainOutOfBoundsException' => __DIR__ . '/..' . '/true/punycode/src/Exception/DomainOutOfBoundsException.php',
        'TrueBV\\Exception\\LabelOutOfBoundsException' => __DIR__ . '/..' . '/true/punycode/src/Exception/LabelOutOfBoundsException.php',
        'TrueBV\\Exception\\OutOfBoundsException' => __DIR__ . '/..' . '/true/punycode/src/Exception/OutOfBoundsException.php',
        'TrueBV\\Punycode' => __DIR__ . '/..' . '/true/punycode/src/Punycode.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a0f4451fb67b287fb39806f956f3f5d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a0f4451fb67b287fb39806f956f3f5d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a0f4451fb67b287fb39806f956f3f5d::$classMap;

        }, null, ClassLoader::class);
    }
}

<?php

declare(strict_types=1);

namespace ClickedTran\libRanks;

use ClickedTran\libRanks\exceptions\MissingProviderDependencyException;
use ClickedTran\libRanks\exceptions\UnknownProviderException;
use ClickedTran\libRanks\providers\BedrockEconomyProvider;
use ClickedTran\libRanks\providers\RankSystemProvider;
use ClickedTran\libRanks\providers\RankProvider;
use ClickedTran\libRanks\providers\PurePermsProvider;

class libRanks
{
    public static bool $hasInitiated = false;

    /**
     * @var string[] $rankProviders
     * @phpstan-var array<class-string<EconomyProvider>>
     */
    public static array $rankProviders;

    public static function init(): void
    {
        if (!self::$hasInitiated) {
            self::$hasInitiated = true;

            self::registerProvider(["ranksystem", "ranks"], RankSystemProvider::class);
            self::registerProvider(["pureperms", "pure", "pp"], PurePermsProvider::class);
        }
    }

    /**
     * @phpstan-param class-string<EconomyProvider> $rankProvider
     */
    public static function registerProvider(array $providerNames, string $rankProvider): void
    {
        foreach ($providerNames as $providerName) {
            if (isset(self::$rankProviders[strtolower($providerName)])) continue;
            self::$rankProviders[strtolower($providerName)] = $rankProvider;
        }
    }

    /**
     * @throws UnknownProviderException
     * @throws MissingProviderDependencyException
     */
    public static function getProvider(array $providerInformation): RankProvider
    {
        if (!isset(self::$rankProviders[strtolower($providerInformation["provider"])])) {
            throw new UnknownProviderException("Provider " . $providerInformation["provider"] . " not found.");
        }
        $provider = self::$rankProviders[strtolower($providerInformation["provider"])];
        if (!$provider::checkDependencies()) {
            throw new MissingProviderDependencyException("Dependencies for provider " . $providerInformation["provider"] . " not found.");
        }
        return new $provider($providerInformation);
    }
}

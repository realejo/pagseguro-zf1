<?php
/**
 * Classe para armazenar e recuperar a versão da biblioteca do Pag Seguro
 *
 * Realejo/PagSeguro (http://realejo.com.br/)
 *
 * @link      http://github.com/realejo/pagseguro-zf1
 * @copyright Copyright (c) 2013 Realejo (http://realejo.com.br)
 * @license   Apache 2.0
 */
class Pagseguro_Version
{
    /**
     * indentificador de versão
     * @see compareVersion()
     */
    CONST VERSION = '0.1';

    /**
     * Última versão estável
     *
     * @var string
     */
    protected static $_latestVersion;

    /**
     * Compara a versão especificada em $version
     * com a versão Pagseguro_Version::VERSION
     *
     * @param  string  $version  A version string (e.g. "0.7.1").
     *
     * @return int              -1 if the $version is older,
     *                           0 if they are the same,
     *                           and +1 if $version is newer.
     */
    public static function compareVersion($version)
    {
        $version = strtolower($version);
        $version = preg_replace('/(\d)pr(\d?)/', '$1a$2', $version);
        return version_compare($version, strtolower(self::VERSION));
    }

    /**
     * Recupera a ultima versão estável
     *
     * @return string
     */
    public static function getLatest($branch = 'master')
    {
        if (null === self::$_latestVersion) {
            self::$_latestVersion = 'not available';

            $handle = fopen("https://raw.github.com/realejo/pagseguro-zf1/$branch/VERSION", 'r');
            if (false !== $handle) {
                self::$_latestVersion = stream_get_contents($handle);
                fclose($handle);
            }
        }

        return self::$_latestVersion;
    }
}

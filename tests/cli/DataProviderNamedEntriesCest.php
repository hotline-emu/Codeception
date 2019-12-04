<?php

class DataProviderNamedEntriesCest
{
    /**
     * @param CliGuy $I
     */
    protected function moveToPath(\CliGuy $I)
    {
        $I->amInPath('tests/data/dataprovider_named_entries');
    }

    /**
     * This looks at only the contents of stdout when there is a failure in parsing a dataProvider annotation.
     * When there is a failure all the useful information should go to stderr, so stdout is left with
     * only the version headers.
     *
     * @param CliGuy $I
     *
     * @before moveToPath
     */
    public function runTestWithDataProvidersFailureStdout(\CliGuy $I)
    {
        /**
         * On windows /dev/null is NUL so detect running OS and return the appropriate string for redirection.
         * As some systems have php_uname and co disabled, we use the DIRECTORY_SEPARATOR constant to
         * figure out if we are running on windows or not.
         */
        $devNull = (DIRECTORY_SEPARATOR === '\\') ? 'NUL' : '/dev/null';
        $I->executeCommand("run -n -v unit DataProviderNamedEntriesCest 2> {$devNull}", false);
        // We should only see the version headers in stdout when there is this kind of failure.
        $I->canSeeShellOutputMatches('/^Codeception PHP Testing Framework v[0-9\.]+\nPowered by PHPUnit .+ by Sebastian Bergmann and contributors\./');
        $I->seeResultCodeIs(1);
    }
}

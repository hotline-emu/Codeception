<?php

class DataProviderNamedEntriesCest
{
    /**
     * @var string
     */
    const FIRST_ENTRY_NAME = 'first entry name';

    /**
     * @var string
     */
    const SECOND_ENTRY_NAME = 'second entry name';

    /**
     * @var string
     */
    const FIRST_ENTRY_VALUE = 'first entry value';

    /**
     * @var string
     */
    const SECOND_ENTRY_VALUE = 'second entry value';

    /**
     * @var array
     */
    const DATA_PROVIDER_MAP = [
        self::FIRST_ENTRY_NAME => self::FIRST_ENTRY_VALUE,
        self:: SECOND_ENTRY_NAME => self::SECOND_ENTRY_VALUE,
    ];

    /**
     * @dataProvider dataProviderWithNamedEntries
     *
     * @return void
     */
    public function testDataProviderName(UnitTester $I, Example $example)
    {
        $I->assertSame($example['value'], self::DATA_PROVIDER_MAP);
    }

    protected function dataProviderWithNamedEntries()
    {
        return [
            self::FIRST_ENTRY_NAME => [
                'value' => self::FIRST_ENTRY_VALUE,
            ],
            self::SECOND_ENTRY_NAME => [
                'value' => self::SECOND_ENTRY_VALUE,
            ],
        ];
    }
}

<?php


namespace MyUnitests\codility;


use PHPUnit\Framework\TestCase;
use Solution\SolutionNegativeAnswer;

class NegativeAnswersTest extends TestCase
{

    public function dataProviderForWhoNeedsHelp()
    {
        return [
            ["Jaelynn Hendrix:NNY,Emmy Choi:YYN,Miley Fritz:YYYY,Calvin Solomon:YNNN,Abby Ig:NNNY", 'Abby',
            ],
            ["Jaelynn Hendrix:NNNY,Emmy Choi:YYN,Miley Fritz:,Calvin Solomon:YNNN,Denise Ig:NNNY",  'Miley Fritz'
            ]
        ];

    }

    /**
     * @dataProvider dataProviderForWhoNeedsHelp
     * @param $data
     * @param $expected
     */
    public function testWhoNeedsMostHelp($data, $expected)
    {
        $solution = new SolutionNegativeAnswer();
        $array = $solution->transformString($data);
        $this->assertEquals($expected, $solution->whoNeedsHelp($array));

    }

}
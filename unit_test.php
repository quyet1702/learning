<?php

class TestWarehouseConfirm extends TestCase
{
    public function __construct()
    {
        
    }

    public function setUp()
    {

    }

    public function tearDown()
    {

    }



    /**
     * @dataProvider headerPickerOkProvider
     */
    public function testOrderHeaderChangeToPickingOK(array $input, array $expected)
    {
        $this->prepareData($input);
        $this->dispatchWarehouseConfirm();
        $this->assertCommandStatus(true, );

        $okPositions = .....//query from database
        $this->assertSame($expected['countPosition'], count($okPositions));

        $orderHeader = ....// get from database
        $this->assertEquals($expected['orderHeaderStatus'], $orderHeader->status->identifier);
    }

    public function headerPickerOkProvider(): \Iterator
    {
        yield 'Order Header without position' => [
            'input' => [
                'countPosition' => 5,
                'alreadyOkPosition' => 5,
            ],
            'expected' => [
                'countPosition' => 5,
                'orderHeaderStatus' => 'PickingOk'
            ],
        ];
        yield 'Order Header with position' => [
            'input' => [
                'countPosition' => 5,
                'alreadyOkPosition' => 4,
            ],
            'expected' => [
                'countPosition' => 5,
                'orderHeaderStatus' => 'PickingOk'
            ],
        ];
    }

    public function prepareData(array $condition): void
    {
        $this->orderHeader = ....;
        for ($condition['countPosition'])
    }
}

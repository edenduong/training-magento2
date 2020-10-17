<?php
namespace Eden\Training\Model;
class FastLoading
{
    protected $slowLoading;

    public function __construct(
        \Eden\Training\Model\SlowLoading $slowLoading
    ){
        $this->slowLoading = $slowLoading;
    }

    public function getFastValue()
    {
        return 'FastLoading value';
    }

    public function getSlowValue()
    {
        return $this->slowLoading->getValue();
    }
}
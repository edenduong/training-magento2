<?php
namespace Eden\Training\Model;
class SlowLoading
{
    public function __construct()
    {
        echo "<br /> SLOW PERFORMANCE WHEN RUN THIS CODE <br />";
        // ... Do something resource intensive
    }

    public function getValue()
    {
        return 'SlowLoading value';
    }
}

<?php

namespace spec\App;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('App\User');
    }

    function it_is_a_behavior() {
        $this->test()->shouldReturn("users");
    }
}

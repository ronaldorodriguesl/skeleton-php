<?php

namespace App\Shared\Abstracts;

use Illuminate\Queue\SerializesModels;

abstract class Event
{
    use SerializesModels;
}

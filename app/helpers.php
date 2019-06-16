<?php

function flashMsg($msg)
{
    return session()->flash('message', $msg);
}

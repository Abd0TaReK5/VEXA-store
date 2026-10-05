<?php

function user_name()
{
    return auth()->user()?->name ?? 'Guest';
}

function format_date($date)
{
    return \Carbon\Carbon::parse($date)->format('Y-m-d');
}
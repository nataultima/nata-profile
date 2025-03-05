<?php

function formField($label, $name, $value = '')
{
    return '
        <div class="mb-3">
            <label class="form-label">' . $label . '</label>
            <input type="text" name="' . $name . '" value="' . esc($value) . '" class="form-control">
        </div>
    ';
}
